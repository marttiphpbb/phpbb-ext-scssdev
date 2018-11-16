<?php
/**
* phpBB Extension - marttiphpbb Scss Theme Dev
* @copyright (c) 2018 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\scssthemedev\util;

class cnst
{
	const FOLDER = 'marttiphpbb/scssthemedev';
	const DIR = 'store/' . self::FOLDER;
	const ID = 'marttiphpbb_scssthemedev';
	const PREFIX = self::ID . '_';
	const L = 'MARTTIPHPBB_SCSSTHEMEDEV';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const ROOT_PATH = self::TPL . '../../../../../../';
	const PATH = self::ROOT_PATH . self::DIR . '/';
}
