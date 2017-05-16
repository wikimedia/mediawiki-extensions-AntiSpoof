<?php

use MediaWiki\Auth\AuthManager;

class AntiSpoofHooks {
	/**
	 * Called after global variables have been set up
	 */
	public static function onRegistration() {
		global $wgDisableAuthManager, $wgAuthManagerAutoConfig;

		if ( class_exists( AuthManager::class ) && !$wgDisableAuthManager ) {
			$wgAuthManagerAutoConfig['preauth'][AntiSpoofPreAuthenticationProvider::class] =
				[ 'class' => AntiSpoofPreAuthenticationProvider::class ];
			Hooks::register( 'LocalUserCreated', 'AntiSpoofHooks::asLocalUserCreated' );
		} else {
			Hooks::register( 'AbortNewAccount', 'AntiSpoofHooks::asAbortNewAccountHook' );
			Hooks::register( 'UserCreateForm', 'AntiSpoofHooks::asUserCreateFormHook' );
			Hooks::register( 'AddNewAccount', 'AntiSpoofHooks::asAddNewAccountHook' );
			Hooks::register( 'APIGetAllowedParams', 'AntiSpoofHooks::onAPIGetAllowedParams' );
			Hooks::register( 'AddNewAccountApiForm', 'AntiSpoofHooks::addNewAccountApiForm' );
		}
	}

	/**
	 * @param $updater DatabaseUpdater
	 * @return bool
	 */
	public static function asUpdateSchema( DatabaseUpdater $updater ) {
		$updater->addExtensionTable( 'spoofuser',
			__DIR__ . '/sql/patch-antispoof.' . $updater->getDB()->getType() . '.sql' );
		return true;
	}

	/**
	 * Can be used to cancel user account creation
	 *
	 * @param $user User
	 * @param $message string
	 * @return bool true to continue, false to abort user creation
	 */
	public static function asAbortNewAccountHook( $user, &$message ) {
		global $wgAntiSpoofAccounts, $wgUser, $wgRequest;

		if ( !$wgAntiSpoofAccounts ) {
			$mode = 'LOGGING ';
			$active = false;
		} elseif ( $wgRequest->getCheck( 'wpIgnoreAntiSpoof' ) &&
				$wgUser->isAllowed( 'override-antispoof' ) ) {
			$mode = 'OVERRIDE ';
			$active = false;
		} else {
			$mode = '';
			$active = true;
		}

		$name = $user->getName();
		$spoof = new SpoofUser( $name );
		if ( $spoof->isLegal() ) {
			$normalized = $spoof->getNormalized();
			$conflicts = $spoof->getConflicts();
			if ( empty( $conflicts ) ) {
				wfDebugLog( 'antispoof', "{$mode}PASS new account '$name' [$normalized]" );
			} else {
				wfDebugLog( 'antispoof', "{$mode}CONFLICT new account '$name' [$normalized] spoofs "
					. implode( ',', $conflicts ) );
				if ( $active ) {
					$numConflicts = count( $conflicts );
					$message = wfMessage( 'antispoof-conflict-top', $name )
						->numParams( $numConflicts )->parse();
					$message .= '<ul>';
					foreach ( $conflicts as $simUser ) {
						$message .= '<li>' . wfMessage( 'antispoof-conflict-item', $simUser )->escaped() . '</li>';
					}
					$message .= '</ul>' . wfMessage( 'antispoof-conflict-bottom' )->parse();
					return false;
				}
			}
		} else {
			$error = $spoof->getError();
			wfDebugLog( 'antispoof', "{$mode}ILLEGAL new account '$name' $error" );
			if ( $active ) {
				$message = wfMessage( 'antispoof-name-illegal', $name, $error )->text();
				return false;
			}
		}
		return true;
	}

	/**
	 * Set the ignore spoof thingie
	 * (Manipulate the user create form)
	 *
	 * @param $template UsercreateTemplate
	 * @return bool
	 */
	public static function asUserCreateFormHook( &$template ) {
		global $wgRequest, $wgAntiSpoofAccounts, $wgUser;

		if ( $wgAntiSpoofAccounts && $wgUser->isAllowed( 'override-antispoof' ) ) {
			$template->addInputItem( 'wpIgnoreAntiSpoof',
				$wgRequest->getCheck( 'wpIgnoreAntiSpoof' ),
				'checkbox', 'antispoof-ignore' );
		}
		return true;
	}

	/**
	 * On new account creation, record the username's thing-bob.
	 * (Called after a user account is created)
	 *
	 * @param $user User
	 * @return bool
	 */
	public static function asAddNewAccountHook( $user ) {
		$spoof = new SpoofUser( $user->getName() );
		$spoof->record();
		return true;
	}

	/**
	 * On new account creation, record the username's thing-bob.
	 * Replaces AddNewAccountHook for more modern MediaWiki versions-
	 *
	 * @param $user User
	 * @return bool
	 */
	public static function asLocalUserCreated( $user ) {
		$spoof = new SpoofUser( $user->getName() );
		$spoof->record();
		return true;
	}

	/**
	 * On rename, remove the old entry and add the new
	 * (After a sucessful user rename)
	 *
	 * @param $uid
	 * @param $oldName string
	 * @param $newName string
	 * @return bool
	 */
	public static function asAddRenameUserHook( $uid, $oldName, $newName ) {
		$spoof = new SpoofUser( $newName );
		$spoof->update( $oldName );
		return true;
	}

	public static function asDeleteAccount( User &$oldUser ) {
		$spoof = new SpoofUser( $oldUser->getName() );
		$spoof->remove();
		return true;
	}

	/**
	 * @param ApiBase $module
	 * @param array $params
	 * @return bool
	 */
	public static function onAPIGetAllowedParams( &$module, &$params ) {
		if ( $module instanceof ApiCreateAccount ) {
			$params['ignoreantispoof'] = [
					ApiBase::PARAM_TYPE => 'boolean',
					ApiBase::PARAM_DFLT => false
			];
		}

		return true;
	}

	/**
	 * Pass API parameter on to the login form when using
	 * API account creation.
	 *
	 * @param ApiBase $apiModule
	 * @param LoginForm $loginForm
	 * @return hook return value
	 */
	public static function addNewAccountApiForm( $apiModule, $loginForm ) {
		global $wgRequest;
		$main = $apiModule->getMain();

		if ( $main->getVal( 'ignoreantispoof' ) !== null ) {
			$wgRequest->setVal( 'wpIgnoreAntiSpoof', '1' );

			// Suppress "unrecognized parameter" warning:
			$main->getVal( 'wpIgnoreAntiSpoof' );
		}

		return true;
	}
}
