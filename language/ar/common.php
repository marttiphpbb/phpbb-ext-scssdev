<?php

/**
* phpBB Extension - marttiphpbb themecolordev
* @copyright (c) 2014 - 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*
* Translated By : Bassel Taha Alhitary - www.alhitary.net
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
	'MARTTIPHPBB_THEMECOLORDEV_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'إخفاء أماكن أحداث القالب',
	'MARTTIPHPBB_THEMECOLORDEV_INSIDE_HTML_HEAD'				=> '( داخل ترويسة الـ html )',
	'MARTTIPHPBB_THEMECOLORDEV_GITHUB_LINK'					=> '%1$sTheme Color Dev Github link%2$s%3$sTheme Color Dev%4$s',
		// MARTTIPHPBB_THEMECOLORDEV_GITHUB_LINK: This is the example github link in the footer to be loaded on installation.
		// Between %1$s and %2$s is a html comment. Between %3$s and %4$s is the link to the Theme Color Dev repository on Github.
]);
