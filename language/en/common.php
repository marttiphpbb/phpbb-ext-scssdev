<?php

/**
* phpBB Extension - marttiphpbb scssthemedev
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

$lang = array_merge($lang, [

	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_NOT_CREATED'
		=> 'The file %s could not be created.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_DOES_NOT_EXIST'
		=> 'The file %s does not exist.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_NOT_DELETED'
		=> 'Failed to delete file %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_NOT_OPENED'
		=> 'Failed to open file %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_NOT_CLOSED'
		=> 'Failed to close file %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_WRITE_FAIL'
		=> 'Failed to write to file %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_READ_FAIL'
		=> 'Failed to read from file %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE_TYPE_FAIL'
		=> 'Failed to get the file type of %s.',
	'MARTTIPHPBB_SCSSTHEMEDEV_DIRECTORY_NOT_CREATED'
		=> 'Failed to create the directory %s',
	'MARTTIPHPBB_SCSSTHEMEDEV_DIRECTORY_NOT_DELETED'
		=> 'Failed to delete the directory %s',
	'MARTTIPHPBB_SCSSTHEMEDEV_DIRECTORY_LIST_FAIL'
		=> 'Failed to list content of directory %s',
	'MARTTIPHPBB_SCSSTHEMEDEV_PROCESS_AND_SAVE'
		=> 'Process and Save',
	'MARTTIPHPBB_SCSSTHEMEDEV_NONE'
		=> 'None',
	'MARTTIPHPBB_SCSSTHEMEDEV_FILE'
		=> 'File',
	'MARTTIPHPBB_SCSSTHEMEDEV_NEW_FILE'
		=> 'New File (leave out .scss extension)',
]);
