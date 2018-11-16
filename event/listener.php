<?php
/**
* phpBB Extension - marttiphpbb scssthemedev
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
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
use marttiphpbb\scssthemedev\model\scssthemedev_directory;
use marttiphpbb\scssthemedev\util\cnst;
use Symfony\Component\DependencyInjection\ContainerInterface;
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

	public function __construct(
		auth $auth,
		request $request,
		loader $loader,
		ext_manager $ext_manager,
		ContainerInterface $container,
		string $phpbb_root_path,
		string $php_ext
	)
	{
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
		$this->loader->addSafeDirectory($this->phpbb_root_path . cnst::DIR);
//		$this->template->assign_var('MARTTIPHPBB_SCSSTHEMEDEV_PATH', cnst::PATH . '/');
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
			'enable'	=> true,
		];

		$event['context'] = $context;
	}
}
