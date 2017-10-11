<?php

class AntiSpoofHooks {
	/**
	 * @param DatabaseUpdater $updater
	 * @return bool
	 */
	public static function asUpdateSchema( DatabaseUpdater $updater ) {
		$updater->addExtensionTable( 'spoofuser',
			__DIR__ . '/sql/patch-antispoof.' . $updater->getDB()->getType() . '.sql' );
		return true;
	}

	/**
	 * On new account creation, record the username's thing-bob.
	 * Replaces AddNewAccountHook for more modern MediaWiki versions-
	 *
	 * @param User $user
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
	 * @param string $uid
	 * @param string $oldName
	 * @param string $newName
	 * @return bool
	 */
	public static function asAddRenameUserHook( $uid, $oldName, $newName ) {
		$spoof = new SpoofUser( $newName );
		$spoof->update( $oldName );
		return true;
	}

	/**
	 * @param User &$oldUser
	 * @return bool
	 */
	public static function asDeleteAccount( User &$oldUser ) {
		$spoof = new SpoofUser( $oldUser->getName() );
		$spoof->remove();
		return true;
	}
}
