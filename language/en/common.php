<?php

/**
* phpBB Extension - marttiphpbb scssdev
* @copyright (c) 2018 - 2020 marttiphpbb <info@martti.be>
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
	'MARTTIPHPBB_SCSSDEV_NO_FILENAME'
		=> 'No filename was defined.',
	'MARTTIPHPBB_SCSSDEV_FILE_NOT_CREATED'
		=> 'The file %s could not be created.',
	'MARTTIPHPBB_SCSSDEV_FILE_EXISTS'
		=> 'The file %s exists already.',
	'MARTTIPHPBB_SCSSDEV_FILE_DOES_NOT_EXIST'
		=> 'The file %s does not exist.',
	'MARTTIPHPBB_SCSSDEV_FILE_NOT_DELETED'
		=> 'Failed to delete file %s.',
	'MARTTIPHPBB_SCSSDEV_FILE_NOT_OPENED'
		=> 'Failed to open file %s.',
	'MARTTIPHPBB_SCSSDEV_FILE_NOT_CLOSED'
		=> 'Failed to close file %s.',
	'MARTTIPHPBB_SCSSDEV_FILE_WRITE_FAIL'
		=> 'Failed to write to file %s.',
	'MARTTIPHPBB_SCSSDEV_FILE_READ_FAIL'
		=> 'Failed to read from file %s.',
	'MARTTIPHPBB_SCSSDEV_FILE_TYPE_FAIL'
		=> 'Failed to get the file type of %s.',
	'MARTTIPHPBB_SCSSDEV_DIRECTORY_NOT_CREATED'
		=> 'Failed to create the directory %s',
	'MARTTIPHPBB_SCSSDEV_DIRECTORY_NOT_DELETED'
		=> 'Failed to delete the directory %s',
	'MARTTIPHPBB_SCSSDEV_DIRECTORY_LIST_FAIL'
		=> 'Failed to list content of directory %s',
	'MARTTIPHPBB_SCSSDEV_PROCESS_AND_SAVE'
		=> 'Process and Save',
	'MARTTIPHPBB_SCSSDEV_MINIFY'
		=> 'Minify',
	'MARTTIPHPBB_SCSSDEV_NONE'
		=> 'None',
	'MARTTIPHPBB_SCSSDEV_FILE'
		=> 'File',
	'MARTTIPHPBB_SCSSDEV_NEW_FILE'
		=> 'New File (leave out .scss extension)',
	'MARTTIPHPBB_SCSSDEV_SIZE_THRESHOLD'
		=> 'Embed images below kB',
]);
