<?php
class AntiSpoofTest extends MediaWikiTestCase {

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
	 * Some very basic normalization checks
	 *
	 * @covers AntiSpoof::checkUnicodeString
	 * @dataProvider providePositives
	 */
	public function testCheckUnicodeString( $userName, $spooferName ) {
		$a = AntiSpoof::checkUnicodeString( $userName );
		$b = AntiSpoof::checkUnicodeString( $spooferName );

		$this->assertEquals( 'OK', $a[0] );
		$this->assertEquals( 'OK', $b[0] );

		$this->assertEquals( $a[1], $b[1] );
	}
}
