<?php
/**
* phpBB Extension - marttiphpbb scssdev
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\scssdev;

use phpbb\extension\base;
use marttiphpbb\scssdev\util\scssdev_directory;

class ext extends base
{
	public function is_enableable()
	{
		$config = $this->container->get('config');
		return phpbb_version_compare($config['version'], '3.3', '>=')
			&& version_compare(PHP_VERSION, '7.1', '>=');
	}

	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '':
			case '1':
				$phpbb_root_path = $this->container->getParameter('core.root_path');
				$language = $this->container->get('language');
				$scssdev_directory = new scssdev_directory($language, $phpbb_root_path);

				if ($old_state == '')
				{
					$scssdev_directory->create();
					return '1';
				}

				$scssdev_directory->write_prosilver_template();
				return '2';
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
				$scssdev_directory = new scssdev_directory($language, $phpbb_root_path);
				$scssdev_directory->remove();
				return '1';
				break;
			default:
				return parent::purge_step($old_state);
				break;
		}
	}
}
