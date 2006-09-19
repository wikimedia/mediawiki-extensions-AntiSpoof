<?php

$wgExtensionFunctions[] = 'asSetup';

function asSetup() {
	$base = dirname( __FILE__ );
	
	global $wgAutoloadClasses;
	$wgAutoloadClasses['AntiSpoof'] = "$base/AntiSpoof_body.php";
	$wgAutoloadClasses['SpoofUser'] = "$base/SpoofUser.php";
	
	global $wgHooks;
	$wgHooks['AbortNewAccount'][] = 'asAbortNewAccountHook';
	$wgHooks['AddNewAccount'][] = 'asAddNewAccountHook';
	
	global $wgMessageCache, $wgAntiSpoofMessages;
	require "$base/AntiSpoof_i18n.php";
	foreach( $wgAntiSpoofMessages as $key => $value ) {
		$wgMessageCache->addMessages( $wgAntiSpoofMessages[$key], $key );
	}
}

/**
 * Hook for user creation form submissions.
 * @param User $u
 * @param string $message
 * @return bool true to continue, false to abort user creation
 */
function asAbortNewAccountHook( $user, &$message ) {
	$name = $user->getName();
	$spoof = new SpoofUser( $name );
	if( $spoof->isLegal() ) {
		$conflict = $spoof->getConflict();
		if( $conflict === false ) {
			wfDebugLog( 'antispoof', "PASS new account '$name'" );
			return true;
		} else {
			wfDebugLog( 'antispoof', "CONFLICT new account '$name' spoofs '$conflict'" );
			$message = wfMsg( 'antispoof-name-conflict', $name, $conflict );
			return false;
		}
	} else {
		$error = $spoof->getError();
		wfDebugLog( 'antispoof', "ILLEGAL new account '$name' $error" );
		$message = wfMsg( 'antispoof-name-illegal', $name, $error );
		return false;
	}
}

/**
 * On new account creation, record the username's thing-bob.
 */
function asAddNewAccountHook( $user ) {
	$spoof = new SpoofUser( $user->getName() );
	$spoof->record();
	return true;
}

?>