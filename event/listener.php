<?php
/**
* phpBB Extension - marttiphpbb scssthemedev
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\scssthemedev\event;

use phpbb\event\data as event;
use phpbb\auth\auth;
use phpbb\config\config;
use phpbb\request\request;
use phpbb\template\twig\twig as template;
use phpbb\user;
use phpbb\language\language;
use phpbb\template\twig\loader;
use phpbb\extension\manager as ext_manager;
use marttiphpbb\scssthemedev\util\scssthemedev_directory;
use marttiphpbb\scssthemedev\util\cnst;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Leafo\ScssPhp\Compiler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $auth;
	protected $config;
	protected $request;
	protected $template;
	protected $user;
	protected $language;
	protected $loader;
	protected $ext_manager;
	protected $container;
	protected $phpbb_root_path;
	protected $php_ext;

	protected $scssthemedev_directory;

	public function __construct(
		language $language,
		auth $auth,
		request $request,
		loader $loader,
		ext_manager $ext_manager,
		ContainerInterface $container,
		string $phpbb_root_path,
		string $php_ext
	)
	{
		$this->language = $language;
		$this->auth = $auth;
		$this->request = $request;
		$this->loader = $loader;
		$this->ext_manager = $ext_manager;
		$this->container = $container;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->php_ext = $php_ext;
	}

	static public function getSubscribedEvents()
	{
		return [
			'core.page_header'		=> 'core_page_header',
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

		$this->language->add_lang('common', cnst::FOLDER);
		$this->scssthemedev_directory = new scssthemedev_directory($this->language, $this->phpbb_root_path);

		if ($this->request->is_set_post('marttiphpbb-scssthemedev-submit'))
		{
			$filename = $this->request->variable('marttiphpbb-scssthemedev-filename', 'zzz.scss');
			$content = $this->request->variable('marttiphpbb-scssthemedev-content', '', true);
			$content = utf8_normalize_nfc($content);
			$content = htmlspecialchars_decode($content);
			$this->scssthemedev_directory->save_to_file($filename, $content);

			$filename_compiled = pathinfo($filename, PATHINFO_FILENAME);
			$filename_compiled .= '.css';
			$scss = new Compiler();
			$compiled = $scss->compile($content);
			$this->scssthemedev_directory->save_to_file($filename_compiled, $compiled);
		}

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
		$context['marttiphpbb_scssthemedev'] = [
			'enable'		=> true,
			'path'			=> cnst::PATH,
			'filename'		=> $this->filename ?? 'zzz.scss',
			'content'		=> $this->content ?? '',
			'filename_compiled'	=> '',
		];

		$event['context'] = $context;
	}
}
