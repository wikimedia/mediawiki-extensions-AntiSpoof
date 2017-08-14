<?php
class AntiSpoofTest extends MediaWikiTestCase {

	public function providePositives() {
		return [
			/** Format: username -> spoofing attempt */
			[ 'Laura Fiorucci', 'Låura Fiorucci' ],
			[ 'Lucien leGrey', 'Lucien le6rey' ],
			[ 'Poco a poco', 'Poco a ƿoco' ],
			[ 'Sabbut', 'ЅаЬЬцт' ],
			[ 'BetoCG', 'ВетоС6' ],
			[ 'Wanda', 'vv4ndá' ],
			[ 'Mario', 'rnAr10' ]
		];
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
