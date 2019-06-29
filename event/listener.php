<?php

/**
 * phpBB Extension - marttiphpbb scssdev
 * @copyright (c) 2018 - 2019 marttiphpbb <info@martti.be>
 * @license GNU General Public License, version 2 (GPL-2.0)
 */

namespace marttiphpbb\scssdev\event;

use phpbb\event\data as event;
use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\request\request;
use phpbb\user;
use phpbb\language\language;
use phpbb\template\twig\loader;
use phpbb\extension\manager as ext_manager;
use phpbb\request\request_interface;
use marttiphpbb\scssdev\util\scssdev_directory;
use marttiphpbb\scssdev\util\cnst;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Leafo\ScssPhp\Compiler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $auth;
	protected $user;
	protected $request;
	protected $language;
	protected $loader;
	protected $ext_manager;
	protected $container;
	protected $phpbb_root_path;

	protected $scssdev_directory;
	protected $content;
	protected $file;
	protected $crc;
	protected $errors = [];
	protected $page_header_en;

	protected $disabled;

	public function __construct(
		language $language,
		user $user,
		config $config,
		auth $auth,
		request $request,
		loader $loader,
		ext_manager $ext_manager,
		ContainerInterface $container,
		string $phpbb_root_path
	) {
		$this->language = $language;
		$this->user = $user;
		$this->config = $config;
		$this->auth = $auth;
		$this->request = $request;
		$this->loader = $loader;
		$this->ext_manager = $ext_manager;
		$this->container = $container;
		$this->phpbb_root_path = $phpbb_root_path;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.page_header'
			=> 'core_page_header',
			'core.twig_environment_render_template_before'
			=> 'core_twig_environment_render_template_before',
		];
	}

	public function core_page_header(event $event)
	{
		if (!$this->auth->acl_get('a_'))
		{
			return;
		}

		$this->disabled = $this->request->is_set('scssdev_disable', request_interface::GET);

		if ($this->disabled)
		{
			return;
		}

		$this->language->add_lang('common', cnst::FOLDER);
		$this->scssdev_directory = new scssdev_directory($this->language, $this->phpbb_root_path);

		$cookie_name = $this->config['cookie_name'];
		$file = $this->request->variable($cookie_name . '_marttiphpbb_scssdev_file', '', false, \phpbb\request\request_interface::COOKIE);
		$crc = $this->request->variable($cookie_name . '_marttiphpbb_scssdev_crc', '', false, \phpbb\request\request_interface::COOKIE);

		$submit_save = $this->request->is_set_post('marttiphpbb_scssdev_save');
		$submit_minify = $this->request->is_set_post('marttiphpbb_scssdev_minify');
		$select_file = $this->request->variable('marttiphpbb_scssdev_file', '');
		$new_file = $this->request->variable('marttiphpbb_scssdev_new', '');

		error_log(json_encode([
			'submit_save' => $submit_save,
			'submit_minify' => $submit_minify,
		]));

		if ($submit_save)
		{
			if ($new_file)
			{
				$exists = $this->scssdev_directory->file_exists($new_file . '.scss');

				if ($exists)
				{
					trigger_error(sprintf(
						$this->language->lang(
							cnst::L . '_FILE_EXISTS'
						),
						$new_file . '.scss'
					), E_USER_WARNING);
				}

				$file = $new_file;
				$process_and_save_file = true;
			}
			else if ($select_file === '')
			{
				$file = $crc = $this->content = '';
			}
			else if ($select_file === $file)
			{
				$process_and_save_file = true;
			}
			else
			{
				$file = $select_file;
				$this->content = $this->scssdev_directory->file_get_contents($file . '.scss');
				$crc = crc32($this->content);
			}

			if (isset($process_and_save_file) && $process_and_save_file)
			{
				$content = $this->request->variable('marttiphpbb_scssdev_content', '', true);
				$content = utf8_normalize_nfc($content);
				$this->content = htmlspecialchars_decode($content);
				$this->scssdev_directory->save_to_file($file . '.scss', $this->content);
				$scss = new Compiler();
				try
				{
					$content_compiled = $scss->compile($this->content);
				}
				catch (\Exception $e)
				{
					$err = $e->getMessage();
					error_log($err);
					$this->errors[] = $err;
					$content_compiled = '';
				}

				$this->scssdev_directory->save_to_file($file . '.css', $content_compiled);
				$crc = crc32($this->content);
			}

			$this->user->set_cookie('marttiphpbb_scssdev_file', $file, 0);
			$this->user->set_cookie('marttiphpbb_scssdev_crc', $crc, 0);
		}
		else if (
			$file
			&& $this->scssdev_directory->file_exists($file . '.scss')
			&& $this->scssdev_directory->file_exists($file . '.css')
		)
		{
			$this->content = $this->scssdev_directory->file_get_contents($file . '.scss');
		}
		else
		{
			$this->content = cnst::PROSILVER_TEMPLATE;
			$file = '';
		}

		$this->file = $file;
		$this->crc = $crc;
		$this->page_header_en = true;

		$this->loader->addSafeDirectory($this->phpbb_root_path . cnst::DIR);

		if ($this->ext_manager->is_enabled('marttiphpbb/codemirror'))
		{
			$load = $this->container->get('marttiphpbb.codemirror.load');
			$load->set_mode('scss');
		}
	}

	public function core_twig_environment_render_template_before(event $event)
	{
		if (!$this->auth->acl_get('a_'))
		{
			return;
		}

		$context = $event['context'];

		error_log($context['$STYLESHEETS']);


		if (!isset($this->page_header_en))
		{
			return;
		}

		if ($this->disabled)
		{
			return;
		}

		$context = $event['context'];

		$context['marttiphpbb_scssdev'] = [
			'enable'	=> true,
			'path'		=> cnst::PATH,
			'files'		=> $this->scssdev_directory->get_scss_filenames(),
			'file'		=> $this->file,
			'content'	=> $this->content,
			'version'	=> $this->crc,
			'errors'	=> $this->errors,
		];

		$event['context'] = $context;
	}
}
