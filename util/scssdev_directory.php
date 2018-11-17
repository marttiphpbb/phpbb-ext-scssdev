<?php
/**
* phpBB Extension - marttiphpbb scssdev
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\scssdev\util;

use phpbb\language\language;
use marttiphpbb\scssdev\util\cnst;

class scssdev_directory
{
	protected $phpbb_root_path;
	protected $language;

	public function __construct(
		language $language,
		string $phpbb_root_path
	)
	{
		$this->language = $language;
		$this->phpbb_root_path = $phpbb_root_path;

		$this->language->add_lang('common', cnst::FOLDER);
	}

	public function file_exists(string $filename):bool
	{
		return file_exists($this->phpbb_root_path . cnst::DIR . '/' . $filename);
	}

	public function create_file(string $filename):void
	{
		if (!@touch($this->phpbb_root_path . cnst::DIR . '/' . $filename))
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_FILE_NOT_CREATED'),
				$filename), E_USER_WARNING);
		}
	}

	public function save_to_file(string $filename, string $data):void
	{
		if (!($f = @fopen($this->phpbb_root_path . cnst::DIR . '/' . $filename, 'wb')))
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_FILE_NOT_OPENED'),
				$filename), E_USER_WARNING);
		}

		if (@fwrite($f, $data) === false)
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_FILE_WRITE_FAIL'),
				$filename), E_USER_WARNING);
		}

		fclose($f);
	}

	public function file_get_contents(string $filename):string
	{
		$content = @file_get_contents($this->phpbb_root_path . cnst::DIR . '/' . $filename);

		if ($content === false)
		{
			trigger_error(sprintf($this->language->lang(cnst::L . '_FILE_READ_FAIL'), cnst::DIR), E_USER_WARNING);
		}

		return $content;
	}

	public function get_scss_filenames():array
	{
		$ret = [];
		$files = $this->get_filenames();
		$dir = $this->phpbb_root_path . cnst::DIR . '/';

		foreach($files as $f)
		{
			if (filetype($dir . $f) === 'dir')
			{
				continue;
			}

			if (pathinfo($f, PATHINFO_EXTENSION) === 'scss')
			{
				$ret[] = pathinfo($f, PATHINFO_FILENAME);
			}
		}

		return $ret;
	}

	public function get_filenames():array
	{
		$list = @scandir($this->phpbb_root_path . cnst::DIR);

		if ($list === false)
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_DIRECTORY_LIST_FAIL'),
				cnst::DIR), E_USER_WARNING);
		}

		return array_diff($list, ['.', '..', '.htaccess']);
	}

	public function create()
	{
		$dir = $this->phpbb_root_path . cnst::DIR;

		if (!file_exists($dir))
		{
			@mkdir($dir, 0777, true);
			@chmod($dir, 0777);

			if (!is_dir($dir))
			{
				trigger_error(sprintf($this->language->lang(
					cnst::L . '_DIRECTORY_NOT_CREATED'),
					cnst::DIR), E_USER_WARNING);
			}
		}
	}

	public function remove()
	{
		$this->remove_directory($this->phpbb_root_path . cnst::DIR);
	}

	private function remove_directory(string $dir)
	{
		if(!is_dir($dir))
		{
			return;
		}

		$objects = @scandir($dir);

		if ($objects === false)
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_DIRECTORY_LIST_FAIL'),
				$dir), E_USER_WARNING);
		}

		foreach ($objects as $object)
		{
			if ($object == '.' || $object == '..')
			{
				continue;
			}

			$object = $dir . '/' . $object;

			$filetype = filetype($object);

			if ($filetype === false)
			{
				trigger_error(sprintf($this->language->lang(
					cnst::L . '_FILE_TYPE_FAIL'),
					$object), E_USER_WARNING);
			}

			if ($filetype === 'dir')
			{
				$this->remove_directory($object);
			}
			else
			{
				if (!@unlink($object))
				{
					trigger_error(sprintf($this->language->lang(
						cnst::L . '_FILE_NOT_DELETED'),
						$object), E_USER_WARNING);
				}
			}
		}

		if (!@rmdir($dir))
		{
			trigger_error(sprintf($this->language->lang(
				cnst::L . '_DIRECTORY_NOT_DELETED'),
				$dir), E_USER_WARNING);
		}
	}
}
