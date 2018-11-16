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

	'ACP_MARTTIPHPBB_THEMECOLORDEV_INCLUDE_EXAMPLE'			=> 'Per includere i propri file aggiungere prima del nome file (fix this)',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EXAMPLE_FILE'				=> 'my_file.html',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_CREATE_FILE'				=> 'Crea file',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE'						=> 'Rimuovi',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE_FILE_NAME'			=> 'Rimuovi %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILES_EXPLAIN'				=> 'I file direttamente inclusi con l’evento template %1$s non possono essere rimossi. Tutti i file risiedono nella cartella %2$s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SIZE'					=> 'Dimensione',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NAME'					=> 'Nome',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_COMMENT'				=> 'Commento',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE'						=> 'File',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EDITOR_ROWS'				=> 'Righe campo di testo',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_CONFIRM'				=> 'Vuoi salvare il file %s?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE'						=> 'Salva',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_PURGE_CACHE'			=> 'Salva e vuota la cache',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SAVE_PURGE_CACHE_CONFIRM'	=> 'Vuoi salvare il file %s e vuotare la cache?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SAVED'					=> 'File %s salvato correttamente!',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SAVED_CACHE_PURGED'	=> 'File %s salvato e cache svuotata correttamente!',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_CREATED'				=> 'Il file %s è stato creato.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILENAME_EMPTY'				=> 'Nome file vuoto.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_CREATED'			=> 'Il file %s non può essere creato.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_ALREADY_EXISTS'		=> 'Un file di nome %s esiste già.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DELETE_FILE_CONFIRM'		=> 'Rimuovere il file %s ?',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_DELETED'				=> 'File %s rimosso.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_DOES_NOT_EXIST'		=> 'Il file %s non esiste.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_DELETED'			=> 'Impossibile rimuovere il file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_OPENED'			=> 'Impossibile aprire il file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_NOT_CLOSED'			=> 'Impossibile chiudere il file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_WRITE_FAIL'			=> 'Impossibile scrivere nel file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_READ_FAIL'				=> 'Impossibile leggere dal file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_TYPE_FAIL'				=> 'Impossibile ottenere il tipo file di %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_SIZE_FAIL'				=> 'Impossibile ottenere la dimensione del file %s.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_EVENT_FILE_INDICATOR'		=> '(E)',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_SHOW_TEMPLATE_EVENTS_LOCATIONS'	=> 'Mostra le posizioni degli eventi template di Custom code',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_NOT_CREATED'		=> 'Impossibile creare la cartella %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_NOT_DELETED'		=> 'Impossibile rimuovere la cartella %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_DIRECTORY_LIST_FAIL'		=> 'Impossibile elencare il contenuto della cartella %s',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_FILE_EXTENSION_NOT_ALLOWED'	=> 'Per motivi di sicurezza, l’estensione file %s non è permessa.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_PHP_NOT_ALLOWED'			=> 'Per motivi di sicurezza, l’inclusione di php non è permessa.',
	'ACP_MARTTIPHPBB_THEMECOLORDEV_INCLUDEPHP_WARNING'			=> 'Attenzione! Per motivi di sicurezza, il codice personalizzato non sarà incluso nei template se è attiva nella board l’inclusione di codice PHP con le istruzioni PHP e INCLUDEPHP. Controllare le proprie %simpostazioni di sicurezza%s per disattivare le istruzioni PHP e INCLUDEPHP.',
]);
