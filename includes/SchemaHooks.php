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

use MediaWiki\Installer\DatabaseUpdater;
use MediaWiki\Installer\Hook\LoadExtensionSchemaUpdatesHook;

class SchemaHooks implements LoadExtensionSchemaUpdatesHook {
	/**
	 * @param DatabaseUpdater $updater
	 */
	public function onLoadExtensionSchemaUpdates( $updater ) {
		$type = $updater->getDB()->getType();
		$updater->addExtensionTable( 'spoofuser',
			__DIR__ . '/../sql/' . $type . '/tables-generated.sql' );

		if ( $type === 'mysql' ) {
			$updater->renameExtensionIndex( 'spoofuser', 'su_normalized', 'su_normname_idx',
				__DIR__ . '/../sql/mysql/patch-spoofuser-index-su_normname_idx.sql' );
		}
		// MediaWiki 1.41
		$updater->modifyExtensionTable( 'spoofuser',
			__DIR__ . '/../sql/' . $type . '/patch-change-spoofuser-binary.sql' );
	}
}
