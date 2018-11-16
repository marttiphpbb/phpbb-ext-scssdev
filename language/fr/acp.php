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
	'ACP_MARTTIPHPBB_THEMECOLORDEV_INCLUDE_EXAMPLE'			=> 'Pour inclure ses propres fichiers, ajouter aux noms des fichiers (fix this)',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_CREATE_FILE'				=> 'Créer un fichier',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE'						=> 'Supprimer',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE_FILE_NAME'			=> 'Supprimer %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILES_EXPLAIN'				=> 'Les fichiers incluant directement des évènements du template %1$s ne peuvent être supprimés. Tous les fichiers présents dans le répertoire %2$s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SIZE'					=> 'Taille',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NAME'					=> 'Nom',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_COMMENT'				=> 'Commentaire',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE'						=> 'Fichier',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EDITOR_ROWS'				=> 'Modificateur de rangées',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_CONFIRM'				=> 'Confirmer la sauvegarde du fichier %s ?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE'						=> 'Sauvegarder',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_PURGE_CACHE'			=> 'Sauvegarder puis vider le cache',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_PURGE_CACHE_CONFIRM'	=> 'Voulez-vous sauvegarder le fichier %s et vider le cache ?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SAVED'					=> 'Le fichier %s a été sauvegardé avec succès !',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SAVED_CACHE_PURGED'	=> 'Le fichier %s a été sauvegardé et le cache a été vidé avec succès !',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_CREATED'				=> 'Le fichier %s a été créé.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILENAME_EMPTY'				=> 'Le nom du fichier était vide.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_CREATED'			=> 'Le fichier %s n’a pas pu être créé.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_ALREADY_EXISTS'		=> 'Le fichier %s existe déjà.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE_FILE_CONFIRM'		=> 'Supprimer le fichier %s ?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_DELETED'				=> 'Le fichier %s a été supprimé.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_DOES_NOT_EXIST'		=> 'Le fichier %s n’existe pas.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_DELETED'			=> 'Impossible de supprimer le fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_OPENED'			=> 'Erreur d’ouverture du fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_CLOSED'			=> 'Erreur de fermeture du fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_WRITE_FAIL'			=> 'Erreur d’écriture du fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_READ_FAIL'				=> 'Erreur de lecture du fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_TYPE_FAIL'				=> 'Erreur pour déterminer le type de fichier de %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SIZE_FAIL'				=> 'Erreur pour déterminer la taille du fichier %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Afficher les emplacements des évènements du template disponibles dans l’extension Theme Color Dev',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_NOT_CREATED'		=> 'Impossible de créer le répertoire %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_NOT_DELETED'		=> 'Erreur de suppression du répertoire %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_LIST_FAIL'		=> 'Erreur pour lister le contenu du répertoire %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_EXTENSION_NOT_ALLOWED'	=> 'L’extension de fichier %s n’est pas autorisée pour des raisons de sécurité.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_PHP_NOT_ALLOWED'			=> 'L’inclusion du language PHP n’est pas autorisé pour des raisons de sécurité.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_INCLUDEPHP_WARNING'			=> 'Attention ! Pour des raisons de sécurité, les codes personnalisés ne seront pas inclus dans les templates lorsque l’analyse du code PHP (via les instructions PHP et INCLUDEPHP) est activée sur le forum. Merci de consulter les %sParamètres de sécurité%s pour désactiver l’option : « Autoriser le PHP dans les templates ».',		
]);
