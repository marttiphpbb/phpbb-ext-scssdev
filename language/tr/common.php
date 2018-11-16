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

	'MARTTIPHPBB_THEMECOLORDEV_LINK_EDIT_TITLE'				=> 'Edit custom code for this location.',
	'MARTTIPHPBB_THEMECOLORDEV_HIDE'							=> 'Hide',
	'MARTTIPHPBB_THEMECOLORDEV_HIDE_TEMPLATE_EVENTS_LOCATIONS' => 'Özel kod şablon olayı konumlarını gizle',
	'MARTTIPHPBB_THEMECOLORDEV_INSIDE_HTML_HEAD'				=> '(html head içinde)',
]);
