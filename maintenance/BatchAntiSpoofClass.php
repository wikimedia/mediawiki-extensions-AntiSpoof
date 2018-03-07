<?php

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";

/**
 * Go through all usernames and calculate and record spoof thingies
 */
class BatchAntiSpoof extends Maintenance {

	public function __construct() {
		parent::__construct();

		$this->requireExtension( 'AntiSpoof' );
		$this->setBatchSize( 1000 );
	}

	/**
	 * @param array $items
	 */
	protected function batchRecord( $items ) {
		SpoofUser::batchRecord( $this->getDB( DB_MASTER ), $items );
	}

	/**
	 * @return string
	 */
	protected function getTableName() {
		return 'user';
	}

	/**
	 * @return string
	 */
	protected function getUserColumn() {
		return 'user_name';
	}

	/**
	 * @return string Primary key of the table returned by getTableName()
	 */
	protected function getPrimaryKey() {
		return 'user_id';
	}

	/**
	 * @param string $name
	 * @return SpoofUser
	 */
	protected function makeSpoofUser( $name ) {
		return new SpoofUser( $name );
	}

	protected function waitForSlaves() {
		wfWaitForSlaves();
	}

	/**
	 * Do the actual work. All child classes will need to implement this
	 */
	public function execute() {
		$this->output( "Creating username spoofs...\n" );

		$userCol = $this->getUserColumn();
		$iterator = new BatchRowIterator( $this->getDB( DB_MASTER ),
			$this->getTableName(),
			$this->getPrimaryKey(),
			$this->getBatchSize()
		);
		$iterator->setFetchColumns( [ $userCol ] );

		$n = 0;
		foreach ( $iterator as $batch ) {
			$items = [];
			foreach ( $batch as $row ) {
				$items[] = $this->makeSpoofUser( $row->$userCol );
			}

			$n += count( $items );
			$this->output( "...$n\n" );
			$this->batchRecord( $items );
			$this->waitForSlaves();
		}

		$this->output( "$n user(s) done.\n" );
	}
}
