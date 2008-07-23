<?php

$wgExtensionCredits['other'][] = array(
	'name' => 'AntiSpoof',
	'svn-date' => '$LastChangedDate$',
	'svn-revision' => '$LastChangedRevision$',
	'url' => 'http://www.mediawiki.org/wiki/Extension:AntiSpoof',
	'author' => 'Brion Vibber',
	'description' => 'Blocks the creation of accounts with mixed-script, confusing and similar usernames',
	'descriptionmsg' => 'antispoof-desc',
);

$wgExtensionMessagesFiles['AntiSpoof'] = dirname(__FILE__) . '/AntiSpoof.i18n.php';

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
 * Allow sysops and bureaucrats to override the spoofing checks
 * and create accounts for people which hit false positives.
 */
$wgGroupPermissions['sysop']['override-antispoof'] = true;
$wgGroupPermissions['bureaucrat']['override-antispoof'] = true;
$wgAvailableRights[] = 'override-antispoof';

$wgExtensionFunctions[] = 'asSetup';

$wgHooks['LoadExtensionSchemaUpdates'][] = 'asUpdateSchema';

function asSetup() {
	$base = dirname( __FILE__ );

	global $wgAutoloadClasses;
	$wgAutoloadClasses['AntiSpoof'] = "$base/AntiSpoof_body.php";
	$wgAutoloadClasses['SpoofUser'] = "$base/SpoofUser.php";

	global $wgHooks;
	$wgHooks['AbortNewAccount'][] = 'asAbortNewAccountHook';
	$wgHooks['UserCreateForm'][] = 'asUserCreateFormHook';
	$wgHooks['AddNewAccount'][] = 'asAddNewAccountHook';
}

function asUpdateSchema() {
	global $wgExtNewTables, $wgDBtype;
	$wgExtNewTables[] = array(
		'spoofuser',
		dirname( __FILE__ ) . '/sql/patch-antispoof.' . $wgDBtype . '.sql' );
	return true;
}

/**
 * Hook for user creation form submissions.
 * @param User $u
 * @param string $message
 * @return bool true to continue, false to abort user creation
 */
function asAbortNewAccountHook( $user, &$message ) {
	global $wgAntiSpoofAccounts, $wgUser, $wgRequest;
	wfLoadExtensionMessages( 'AntiSpoof' );

	if( !$wgAntiSpoofAccounts ) {
		$mode = 'LOGGING ';
		$active = false;
	} elseif( $wgRequest->getCheck('wpIgnoreAntiSpoof') && 
			$wgUser->isAllowed( 'override-antispoof' ) ) {
		$mode = 'OVERRIDE ';
		$active = false;
	} else {
		$mode = '';
		$active = true;
	}

	$name = $user->getName();
	$spoof = new SpoofUser( $name );
	if( $spoof->isLegal() ) {
		$normalized = $spoof->getNormalized();
		$conflict = $spoof->getConflict();
		if( $conflict === false ) {
			wfDebugLog( 'antispoof', "{$mode}PASS new account '$name' [$normalized]" );
		} else {
			wfDebugLog( 'antispoof', "{$mode}CONFLICT new account '$name' [$normalized] spoofs: '" . implode( ', ', $conflict ) . "'" );
			if( $active ) {
				$numConflicts = count( $conflict );
				switch ( $numConflicts ) {
					case 1:
						$message = wfMsg( 'antispoof-name-conflict', $name, 
							wfMsg( 'antispoof-name-conflict1', $conflict['0'] ) );
						break;
					case 2:
						$message = wfMsg( 'antispoof-name-conflict', $name, 
							wfMsg( 'antispoof-name-conflict2', $conflict['0'], $conflict['1'] ) );
						break;
					case 3:
						$message = wfMsg( 'antispoof-name-conflict', $name, 
							wfMsg( 'antispoof-name-conflict3', $conflict['0'], $conflict['1'], $conflict['2'] ) );
						break;
					case 4:
						$message = wfMsg( 'antispoof-name-conflict', $name, 
							wfMsg( 'antispoof-name-conflict4', $conflict['0'], $conflict['1'], 
							$conflict['2'], $conflict['3'] ) );
						break;
					case 5:
						$message = wfMsg( 'antispoof-name-conflict', $name, 
							wfMsg( 'antispoof-name-conflict5', $conflict['0'], $conflict['1'], $conflict['2'], 
							$conflict['3'], $conflict['4'] ) );
						break;
					}

				return false;
			}
		}
	} else {
		$error = $spoof->getError();
		wfDebugLog( 'antispoof', "{$mode}ILLEGAL new account '$name' $error" );
		if( $active ) {
			$message = wfMsg( 'antispoof-name-illegal', $name, $error );
			return false;
		}
	}
	return true;
}

/**
 * Set the ignore spoof thingie
 */
function asUserCreateFormHook( &$template ) {
	global $wgRequest, $wgAntiSpoofAccounts, $wgUser;
	
	wfLoadExtensionMessages( 'AntiSpoof' );
	
	if( $wgAntiSpoofAccounts && $wgUser->isAllowed( 'override-antispoof' ) )
		$template->addInputItem( 'wpIgnoreAntiSpoof', 
			$wgRequest->getCheck('wpIgnoreAntiSpoof'), 
			'checkbox', 'antispoof-ignore' );
	return true;
}

/**
 * On new account creation, record the username's thing-bob.
 */
function asAddNewAccountHook( $user ) {
	$spoof = new SpoofUser( $user->getName() );
	$spoof->record();
	return true;
}
