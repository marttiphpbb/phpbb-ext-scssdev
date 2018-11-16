<?php

/**
*
* Theme Color Dev extension for the phpBB Forum Software package.
* French translation by Galixte (http://www.galixte.com)
*
* @copyright (c) 2015 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*
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
	'MARTTIPHPBB_THEMECOLORDEV_HIDE_TEMPLATE_EVENTS_LOCATIONS'	=> 'Masquer le code personnalisé dans les emplacements des évènements du template',
	'MARTTIPHPBB_THEMECOLORDEV_INSIDE_HTML_HEAD'				=> '(dans l’entête HTML)',
	'MARTTIPHPBB_THEMECOLORDEV_GITHUB_LINK'					=> '%1$sTheme Color Dev Github link%2$s%3$sTheme Color Dev%4$s extension pour phpBB',
		// MARTTIPHPBB_THEMECOLORDEV_GITHUB_LINK: Il s'agit d'un exemple de lien vers GitHub affiché dans le pied de page du forum (footer) lors de l'installation de cette extension.
		// Entre %1$s et %2$s il s'agit d'un commentaire en language HTML. Entre %3$s et %4$s il s'agit du lien vers le dépôt de fichiers de l'extension Theme Color Dev sur GitHub.
]);
