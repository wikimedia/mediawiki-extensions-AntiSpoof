<?php
if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'AntiSpoof' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['AntiSpoof'] = __DIR__ . '/i18n';
	wfWarn(
		'Deprecated PHP entry point used for AntiSpoof extension. ' .
		'Please use wfLoadExtension instead, ' .
		'see https://www.mediawiki.org/wiki/Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the AntiSpoof extension requires MediaWiki 1.25+' );
}

// globals declarations kept here for IDE-friendlyness; this code is never loaded

/**
 * Set this to false to disable the active checks;
 * items will be logged but invalid or conflicting
 * accounts will not be stopped.
 *
 * Logged items will be marked with 'LOGGING' for
 * easier review of old logs' effect.
 *
 * @var bool
 */
$wgAntiSpoofAccounts = null;

/**
 * Blacklisted character codes.
 * defaults:
 *	0x0337 - Combining short solidus overlay
 *	0x0338 - Combining long solidus overlay
 *	0x2044 - Fraction slash
 *	0x2215 - Division slash
 *	0x23AE - Integral extension
 *	0x29F6 - Solidus with overbar
 *	0x29F8 - Big solidus
 *	0x2AFB - Triple solidus binary relation
 *	0x2AFD - Double solidus operator
 *	0xFF0F - Fullwidth solidus
 *
 * @var int[]
 */
$wgAntiSpoofBlacklist = null;
