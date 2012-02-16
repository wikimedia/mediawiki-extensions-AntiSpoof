<?php
// Go through all usernames and calculate and record spoof thingies

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = dirname( __FILE__ ) . '/../../..';
}
require_once( "$IP/maintenance/Maintenance.php" );

class BatchAntiSpoof extends Maintenance {

	/**
	 * @param $items array
	 */
	protected function batchRecord( $items ) {
		SpoofUser::batchRecord( $items );
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
	 * @param $name string
	 * @return SpoofUser
	 */
	protected function makeSpoofUser( $name ) {
		return new SpoofUser( $name );
	}

	/**
	 * Do the actual work. All child classes will need to implement this
	 */
	public function execute() {
		$dbw = $this->getDB( DB_MASTER );

		// $dbw->bufferResults( false );

		$batchSize = 1000;

		$this->output( "Creating username spoofs...\n" );
		$userCol = $this->getUserColumn();
		$result = $dbw->select( $this->getTableName(), $userCol, null, __FUNCTION__ );
		$n = 0;
		$items = array();
		foreach( $result as $row ) {
			if ( $n++ % $batchSize == 0 ) {
				$this->output( "...$n\n" );
			}

			$items[] = $this->makeSpoofUser( $row->$userCol );

			if ( $n % $batchSize == 0 ) {
				$this->batchRecord( $items );
				$items = array();
			}
		}

		$this->batchRecord( $items );
		$this->output( "$n user(s) done.\n" );
	}
}

$maintClass = "BatchAntiSpoof";
require_once( DO_MAINTENANCE );
