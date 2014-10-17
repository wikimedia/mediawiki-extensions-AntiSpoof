<?php
if ( !defined( 'MEDIAWIKI' ) ) {
	exit( 1 );
}

$wgExtensionCredits['antispam'][] = array(
	'path' => __FILE__,
	'name' => 'AntiSpoof',
	'url' => 'https://www.mediawiki.org/wiki/Extension:AntiSpoof',
	'author' => 'Brion Vibber',
	'descriptionmsg' => 'antispoof-desc',
);

/**
 * Set this to false to disable the active checks;
 * items will be logged but invalid or conflicting
 * accounts will not be stopped.
 *
 * Logged items will be marked with 'LOGGING' for
 * easier review of old logs' effect.
 */
$wgAntiSpoofAccounts = true;

/**
 * Blacklisted character codes.
 */
$wgAntiSpoofBlacklist = array(
	0x0337, # Combining short solidus overlay
	0x0338, # Combining long solidus overlay
	0x2044, # Fraction slash
	0x2215, # Division slash
	0x23AE, # Integral extension
	0x29F6, # Solidus with overbar
	0x29F8, # Big solidus
	0x2AFB, # Triple solidus binary relation
	0x2AFD, # Double solidus operator
	0xFF0F  # Fullwidth solidus
);

/**
 * Allow sysops and bureaucrats to override the spoofing checks
 * and create accounts for people which hit false positives.
 */
$wgGroupPermissions['sysop']['override-antispoof'] = true;
$wgGroupPermissions['bureaucrat']['override-antispoof'] = true;
$wgAvailableRights[] = 'override-antispoof';

$dir = __DIR__;

$wgMessagesDirs['AntiSpoof'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['AntiSpoof'] = "$dir/AntiSpoof.i18n.php";

$wgAutoloadClasses['AntiSpoof'] = "$dir/AntiSpoof_body.php";
$wgAutoloadClasses['AntiSpoofHooks'] = "$dir/AntiSpoofHooks.php";
$wgAutoloadClasses['SpoofUser'] = "$dir/SpoofUser.php";
$wgAutoloadClasses['BatchAntiSpoof'] = "$dir/maintenance/batchAntiSpoof.php";

// Register the API method
$wgAutoloadClasses['ApiAntiSpoof'] = "$dir/api/ApiAntiSpoof.php";
$wgAPIModules['antispoof'] = 'ApiAntiSpoof';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'AntiSpoofHooks::asUpdateSchema';
$wgHooks['AbortNewAccount'][] = 'AntiSpoofHooks::asAbortNewAccountHook';
$wgHooks['UserCreateForm'][] = 'AntiSpoofHooks::asUserCreateFormHook';
$wgHooks['AddNewAccount'][] = 'AntiSpoofHooks::asAddNewAccountHook';
$wgHooks['RenameUserComplete'][] = 'AntiSpoofHooks::asAddRenameUserHook';
$wgHooks['DeleteAccount'][] = 'AntiSpoofHooks::asDeleteAccount';
$wgHooks['UnitTestsList'][] = 'AntiSpoofHooks::asUnitTestsList';