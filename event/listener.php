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
use phpbb\extension\manager as ext_manager;
use phpbb\request\request_interface;
use marttiphpbb\scssdev\util\scssdev_directory;
use marttiphpbb\scssdev\util\cnst;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Leafo\ScssPhp\Compiler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use MatthiasMullie\Minify;

class listener implements EventSubscriberInterface
{
	protected $auth;
	protected $user;
	protected $request;
	protected $language;
	protected $ext_manager;
	protected $container;
	protected $phpbb_root_path;

	protected $scssdev_directory;
	protected $content;
	protected $file;
	protected $crc;
	protected $errors = [];
	protected $page_header_en;

	protected $minified;
	protected $scssdev_param;
	protected $size_threshold;

	public function __construct(
		language $language,
		user $user,
		config $config,
		auth $auth,
		request $request,
		ext_manager $ext_manager,
		ContainerInterface $container,
		string $phpbb_root_path
	)
	{
		$this->language = $language;
		$this->user = $user;
		$this->config = $config;
		$this->auth = $auth;
		$this->request = $request;
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

		$this->scssdev_param = $this->request->is_set('scssdev', request_interface::GET);

		if ($this->scssdev_param)
		{
			return;
		}

		$this->language->add_lang('common', cnst::FOLDER);
		$this->scssdev_directory = new scssdev_directory($this->language, $this->phpbb_root_path);

		$cookie_name = $this->config['cookie_name'];
		$file = $this->request->variable($cookie_name . '_' . cnst::ID . '_file', '', false, \phpbb\request\request_interface::COOKIE);
		$crc = $this->request->variable($cookie_name . '_' . cnst::ID . '_crc', '', false, \phpbb\request\request_interface::COOKIE);

		$submit_save = $this->request->is_set_post(cnst::ID . '_save');
		$submit_minify = $this->request->is_set_post(cnst::ID . '_minify');
		$select_file = $this->request->variable(cnst::ID . '_file', 'prosilver');
		$new_file = $this->request->variable(cnst::ID . '_new', '');
		$this->size_threshold = $this->request->variable(cnst::ID . '_size_threshold', 5);

		error_log(json_encode([
			'submit_save' => $submit_save,
			'submit_minify' => $submit_minify,
		]));

		if ($submit_save || $submit_minify)
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
			else if ($select_file === $file
				&& $file !== 'prosilver')
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
				$content = $this->request->variable(cnst::ID . '_content', '', true);
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

			if ($submit_minify)
			{
				$source_path = __DIR__ . '/../../../../' . cnst::DIR . '/' . $file . '.css';
				error_log('source path: ' . $source_path);
				$minifier = new Minify\CSS($source_path);
				$minifier->setMaxImportSize($this->size_threshold);
				$destination_path = $this->scssdev_directory->get_path($file . '.min.css');
				$minifier->minify($destination_path);
				$this->minified = true;
			}

			$this->user->set_cookie(cnst::ID . '_file', $file, 0);
			$this->user->set_cookie(cnst::ID . '_crc', $crc, 0);
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
			$file = 'prosilver';
		}

		$this->file = $file;
		$this->crc = $crc;
		$this->page_header_en = true;

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

		if (!isset($this->page_header_en))
		{
			return;
		}

		if ($this->scssdev_param)
		{
			return;
		}

		$context = $event['context'];

		if (isset($this->minified))
		{
			$context['T_STYLESHEET_LINK'] = cnst::PATH . $this->file . '.min.css?' . $this->crc;
		}
		else
		{
			$context['T_STYLESHEET_LINK'] = cnst::PATH . $this->file . '.css?' . $this->crc;
		}

		$context[cnst::ID] = [
			'enable'			=> true,
			'files'				=> $this->scssdev_directory->get_scss_filenames(),
			'file'				=> $this->file,
			'content'			=> $this->content,
			'errors'			=> $this->errors,
			'size_threshold'	=> $this->size_threshold,
		];

		$event['context'] = $context;
	}
}
