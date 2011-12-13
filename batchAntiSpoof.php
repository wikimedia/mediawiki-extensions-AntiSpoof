<?php
// Go through all usernames and calculate and record spoof thingies

require_once ( getenv( 'MW_INSTALL_PATH' ) !== false
	? getenv( 'MW_INSTALL_PATH' ) . "/maintenance/commandLine.inc"
	: dirname( __FILE__ ) . '/../../maintenance/commandLine.inc' );

$dbw = wfGetDB( DB_MASTER );

$dbw->bufferResults( false );

$batchSize = 1000;

$result = $dbw->select( 'user', 'user_name', null, 'batchAntiSpoof.php' );
$n = 0;
foreach( $result as $row ) {
	if ( $n++ % $batchSize == 0 ) {
		echo "$wgDBname $n\n";
	}

	$items[] = new SpoofUser( $row->user_name );

	if ( $n % $batchSize == 0 ) {
		SpoofUser::batchRecord( $items );
		$items = array();
	}
}

SpoofUser::batchRecord( $items );
echo "$wgDBname $n done.\n";
$dbw->freeResult( $result );
