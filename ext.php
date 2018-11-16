<?php
/**
* phpBB Extension - marttiphpbb themecolordev
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\themecolordev;

use phpbb\extension\base;
use marttiphpbb\themecolordev\model\themecolordev_directory;

class ext extends base
{
	/**
	 * phpBB 3.2.3+ and PHP 7.1+
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');
		return phpbb_version_compare($config['version'], '3.2.3', '>=') && version_compare(PHP_VERSION, '7.1', '>=');
	}

	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '':
				// create directory
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$language = $this->container->get('language');
				$themecolordev_directory = new themecolordev_directory($language, $phpbb_root_path);
				$themecolordev_directory->create();
				return '1';
				break;
			default:
				return parent::enable_step($old_state);
			break;
		}
	}

	function purge_step($old_state)
	{
		switch ($old_state)
		{
			case '':
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$language = $this->container->get('language');
				$themecolordev_directory = new themecolordev_directory($language, $phpbb_root_path);
				$themecolordev_directory->remove();
				return '1';
				break;
			default:
				return parent::purge_step($old_state);
				break;
		}
	}
}
