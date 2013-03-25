<?php
class TestSpoof extends MediaWikiTestCase {

	public function providePositives() {
		return array(
			/** Format: username -> spoofing attempt */
			array( 'Laura Fiorucci', 'Låura Fiorucci' ),
			array( 'Lucien leGrey', 'Lucien le6rey' ),
			array( 'Poco a poco', 'Poco a ƿoco' ),
			array( 'Sabbut', 'ЅаЬЬцт'),
			array( 'BetoCG', 'ВетоС6' )
		);
	}

	/**
	 * @dataProvider providePositives
	 * See http://www.phpunit.de/manual/3.4/en/appendixes.annotations.html#appendixes.annotations.dataProvider
	 */
	public function testCheckSpoofing( $userName, $spooferName ) {
		$Alice = new SpoofUser( $userName );
		$Eve = new SpoofUser( $spooferName );

		$this->assertTrue( $Eve->isLegal(),
			"SpoofUser must consider '$spooferName' to be a valid unicode string"
		);

		$this->assertEquals(
			$Alice->getNormalized(),
			$Eve->getNormalized(),
			"Check that '$spooferName' can not spoof account '$userName'"
		);
	}
}
