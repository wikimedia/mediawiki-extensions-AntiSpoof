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

use MediaWiki\MediaWikiServices;
use MediaWiki\Status\Status;
use Wikimedia\Rdbms\IDatabase;
use Wikimedia\Rdbms\IReadableDatabase;

class SpoofUser {
	private bool $legal;

	private ?string $normalized;

	private ?Status $error;

	public function __construct(
		private readonly string $name
	) {
		$status = AntiSpoof::checkUnicodeStringStatus( $this->name );
		$this->legal = $status->isOK();
		if ( $this->legal ) {
			$this->normalized = $status->getValue();
			$this->error = null;
		} else {
			$this->normalized = null;
			$this->error = $status;
		}
	}

	/**
	 * Does the username pass Unicode legality and script-mixing checks?
	 */
	public function isLegal(): bool {
		return $this->legal;
	}

	/**
	 * Describe the error.
	 * @since 1.32
	 */
	public function getErrorStatus(): ?Status {
		return $this->error;
	}

	/**
	 * Get the normalized key form
	 */
	public function getNormalized(): ?string {
		return $this->normalized;
	}

	protected function getTableName(): string {
		return 'user';
	}

	protected function getUserColumn(): string {
		return 'user_name';
	}

	/**
	 * Does the username pass Unicode legality and script-mixing checks?
	 *
	 * @return string[] empty if no conflict, or array containing conflicting usernames
	 */
	public function getConflicts(): array {
		if ( !$this->isLegal() ) {
			return [];
		}

		$dbr = $this->getDBReplica();

		// Join against the user table to ensure that we skip stray
		// entries left after an account is renamed or otherwise munged.
		return $dbr->newSelectQueryBuilder()
			->select( [ 'su_name' ] )
			->from( 'spoofuser' )
			->join( $this->getTableName(), null, 'su_name = ' . $this->getUserColumn() )
			->where( [ 'su_normalized' => $this->normalized ] )
			->limit( 5 )
			->caller( __METHOD__ )
			->fetchFieldValues();
	}

	/**
	 * Record the username's normalized form into the database
	 * for later comparison of future names...
	 */
	public function record(): bool {
		return self::batchRecord( $this->getDBPrimary(), [ $this ] );
	}

	private function insertFields(): array {
		return [
			'su_name'       => $this->name,
			'su_normalized' => $this->normalized,
			'su_legal'      => $this->legal ? 1 : 0,
			'su_error'      => $this->error?->getMessage()->text(),
		];
	}

	/**
	 * Insert a batch of spoof normalization records into the database.
	 * @param IDatabase $dbw
	 * @param self[] $items
	 * @return bool
	 */
	public static function batchRecord( IDatabase $dbw, array $items ): bool {
		if ( !count( $items ) ) {
			return false;
		}

		$rqb = $dbw->newReplaceQueryBuilder()
			->replaceInto( 'spoofuser' );
		foreach ( $items as $item ) {
			$rqb->row( $item->insertFields() );
		}
		$rqb->uniqueIndexFields( 'su_name' )
			->caller( __METHOD__ )->execute();
		return true;
	}

	public function update( string $oldName ): void {
		$method = __METHOD__;
		$dbw = $this->getDBPrimary();
		// Avoid user rename triggered deadlocks
		$dbw->onTransactionPreCommitOrIdle(
			function () use ( $dbw, $method, $oldName ) {
				if ( $this->record() ) {
					$dbw->newDeleteQueryBuilder()
						->deleteFrom( 'spoofuser' )
						->where( [ 'su_name' => $oldName ] )
						->caller( $method )->execute();
				}
			},
			$method
		);
	}

	/**
	 * Remove a user from the spoofuser table
	 */
	public function remove(): void {
		$this->getDBPrimary()
			->newDeleteQueryBuilder()
			->deleteFrom( 'spoofuser' )
			->where( [ 'su_name' => $this->name ] )
			->caller( __METHOD__ )->execute();
	}

	/**
	 * Allows overriding the database connection in sub-classes.
	 */
	protected function getDBReplica(): IReadableDatabase {
		return MediaWikiServices::getInstance()->getConnectionProvider()->getReplicaDatabase();
	}

	/**
	 * Allows overriding database connection in sub-classes.
	 */
	protected function getDBPrimary(): IDatabase {
		return MediaWikiServices::getInstance()->getConnectionProvider()->getPrimaryDatabase();
	}
}
