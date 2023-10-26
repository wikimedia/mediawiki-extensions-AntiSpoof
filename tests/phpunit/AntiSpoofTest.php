<?php

use MediaWiki\Extension\AntiSpoof\AntiSpoof;

/**
 * @covers \MediaWiki\Extension\AntiSpoof\AntiSpoof
 * @group AntiSpoof
 */
class AntiSpoofTest extends MediaWikiIntegrationTestCase {

	public static function providePositives() {
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
	public function testCheckUnicodeStringStatus( $userName, $spooferName ) {
		$a = AntiSpoof::checkUnicodeStringStatus( $userName );
		$b = AntiSpoof::checkUnicodeStringStatus( $spooferName );

		$this->assertStatusOK( $a );
		$this->assertStatusOK( $b );

		$this->assertEquals( $a->getValue(), $b->getValue() );
	}

	public static function provideMixedCharSets() {
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
		$a = AntiSpoof::checkUnicodeStringStatus( $userName );
		$b = AntiSpoof::checkUnicodeStringStatus( $spooferName );

		$this->assertStatusOK( $a );
		$this->assertStatusError( 'antispoof-mixedscripts', $b );
	}
}
