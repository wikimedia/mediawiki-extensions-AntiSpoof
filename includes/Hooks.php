<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

namespace MediaWiki\Extension\AntiSpoof;

use MediaWiki\Auth\Hook\LocalUserCreatedHook;
use MediaWiki\RenameUser\Hook\RenameUserCompleteHook;
use User;

class Hooks implements
	LocalUserCreatedHook,
	RenameUserCompleteHook
{
	/**
	 * On new account creation, record the username's thing-bob.
	 * Replaces AddNewAccountHook for more modern MediaWiki versions-
	 *
	 * @param User $user
	 * @param bool $autocreated
	 */
	public function onLocalUserCreated( $user, $autocreated ) {
		if ( !$user->isTemp() ) {
			$spoof = new SpoofUser( $user->getName() );
			$spoof->record();
		}
	}

	/**
	 * On rename, remove the old entry and add the new
	 * (After a successful user rename)
	 *
	 * @param int $uid
	 * @param string $oldName
	 * @param string $newName
	 */
	public function onRenameUserComplete( int $uid, string $oldName, string $newName ): void {
		$spoof = new SpoofUser( $newName );
		$spoof->update( $oldName );
	}
}
