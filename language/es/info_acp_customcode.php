<?php

/**
* phpBB Extension - marttiphpbb themecolordev
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
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

	'ACP_MARTTIPHPBB_THEMECOLORDEV'							=> 'Código personalizado',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EDIT'						=> 'Editar',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILES'						=> 'Archivos',

]);
