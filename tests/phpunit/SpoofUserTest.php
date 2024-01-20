<?php

use MediaWiki\Extension\AntiSpoof\SpoofUser;
use MediaWiki\User\User;

/**
 * @covers \MediaWiki\Extension\AntiSpoof\SpoofUser
 * @group Database
 */
class SpoofUserTest extends MediaWikiIntegrationTestCase {

	/** @var string[] */
	private static $usernames = [
		'UserFoo',
		'UserF00',
		'FooBaz',
		'FOOBAZ',
		'F00BAZ',
		'BazFoo',
		'BAZFOO',
		'BazF00',
		'ILIKECAPSLOCKS',
		// Pre-existing non-legal user name, only possible by running the maintenance script on non-empty wiki
		'42',
	];

	public function setUp(): void {
		parent::setUp();

		// Put some stuff in the database
		foreach ( self::$usernames as $user ) {
			$s = new SpoofUser( $user );
			$s->record();
			$user = User::newFromName( $user );
			$user->addToDatabase();
		}

		$s = new SpoofUser( 'NotInTheUserTable' );
		$s->record();
	}

	/**
	 * @covers \MediaWiki\Extension\AntiSpoof\SpoofUser::record
	 */
	public function testRecord() {
		$user = User::newFromName( 'SomeUsername' );
		$user->addToDatabase();
		$s = new SpoofUser( 'SomeUsername' );
		$this->assertTrue( $s->record() );
		// Check that it made it into the database
		$this->assertArrayEquals( [ 'SomeUsername' ], $s->getConflicts() );
	}

	/**
	 * @covers \MediaWiki\Extension\AntiSpoof\SpoofUser::getConflicts
	 * @dataProvider provideGetConflicts
	 */
	public function testGetConflicts( $user, $conflicts ) {
		$s = new SpoofUser( $user );
		$this->assertArrayEquals( $conflicts, $s->getConflicts() );
	}

	public static function provideGetConflicts() {
		return [
			[ 'UserFoo', [ 'UserF00', 'UserFoo' ] ],
			[ 'FooBaz', [ 'F00BAZ', 'FOOBAZ', 'FooBaz' ] ],
			[ 'ILIKECAPSLOCKS', [ 'ILIKECAPSLOCKS' ] ],
			[ 'NotInTheUserTable', [] ],
			[ 'UsErFoO', [ 'UserF00', 'UserFoo' ] ],
			[ '12345', [] ],
		];
	}

	/**
	 * @covers \MediaWiki\Extension\AntiSpoof\SpoofUser::update
	 */
	public function testUpdate() {
		$user = User::newFromName( 'MyNewUserName' );
		$user->addToDatabase();
		$s = new SpoofUser( 'MyNewUserName' );
		$s->update( 'BAZFOO' );
		$this->assertArrayEquals( [ 'MyNewUserName' ], $s->getConflicts() );
		$foobaz = new SpoofUser( 'BAZFOO' );
		$this->assertArrayEquals( [ 'BazF00', 'BazFoo' ], $foobaz->getConflicts() );
	}
}
