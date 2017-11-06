<?php

/**
 * @group AntiSpoof
 */
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
			[ 'Mario', 'rnAr10' ],
			[ 'CEASAR', 'ceasar' ],
			[ 'ceasar', 'CEASAR' ],
			[ 'jimmy wales', 'j1mmy w4l35' ]
		];
	}

	/**
	 * Some very basic normalization checks
	 *
	 * @dataProvider providePositives
	 */
	public function testCheckUnicodeString( $userName, $spooferName ) {
		$a = AntiSpoof::checkUnicodeString( $userName );
		$b = AntiSpoof::checkUnicodeString( $spooferName );

		$this->assertEquals( 'OK', $a[0] );
		$this->assertEquals( 'OK', $b[0] );

		$this->assertEquals( $a[1], $b[1] );
	}

	public function provideMixedCharSets() {
		return [
			/** Format: username -> spoofing attempt */
			[ 'Recursive O Tester', 'Recursive Θ Tester' ],
			[ 'Recursive 0 Tester', 'Recursive Θ Tester' ],
		];
	}

	/**
	 * Test mixed character set strings failure.
	 *
	 * @dataProvider provideMixedCharSets
	 */
	 public function testCheckStringMixedCharSetFailure( $userName, $spooferName ) {
		 $a = AntiSpoof::checkUnicodeString( $userName );
		 $b = AntiSpoof::checkUnicodeString( $spooferName );

		 $this->assertEquals( 'OK', $a[0] );
		 $this->assertEquals( 'ERROR', $b[0] );
		 $this->assertEquals( 'Contains incompatible mixed scripts', $b[1] );
	 }
}
