<?php
/**
* phpBB Extension - marttiphpbb Scss Dev
* @copyright (c) 2018 - 2019 marttiphpbb <info@martti.be>
* @license GNU General Public License, version 2 (GPL-2.0)
*/

namespace marttiphpbb\scssdev\util;

class cnst
{
	const FOLDER = 'marttiphpbb/scssdev';
	const DIR = 'store/' . self::FOLDER;
	const ID = 'marttiphpbb_scssdev';
	const PREFIX = self::ID . '_';
	const L = 'MARTTIPHPBB_SCSSDEV';
	const L_ACP = 'ACP_' . self::L;
	const L_MCP = 'MCP_' . self::L;
	const TPL = '@' . self::ID . '/';
	const ROOT_PATH = self::TPL . '../../../../../../';
	const PATH = self::ROOT_PATH . self::DIR . '/';

	const PROSILVER_TEMPLATE = <<<'EOT'
@import '../../../styles/prosilver/theme/normalize.css';
@import '../../../styles/prosilver/theme/base.css';
@import '../../../styles/prosilver/theme/utilities.css';
@import '../../../styles/prosilver/theme/common.css';
@import '../../../styles/prosilver/theme/links.css';
@import '../../../styles/prosilver/theme/content.css';
@import '../../../styles/prosilver/theme/buttons.css';
@import '../../../styles/prosilver/theme/cp.css';
@import '../../../styles/prosilver/theme/forms.css';
@import '../../../styles/prosilver/theme/icons.css';
@import '../../../styles/prosilver/theme/colours.css';
@import '../../../styles/prosilver/theme/responsive.css';
EOT;
}
