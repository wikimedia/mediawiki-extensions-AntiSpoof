<?php

/**
 * @group Database
 */
class SpoofUserTest extends MediaWikiTestCase {

	private static $usernames = array(
		'UserFoo',
		'UserF00',
		'FooBaz',
		'FOOBAZ',
		'F00BAZ',
		'BazFoo',
		'BAZFOO',
		'BazF00',
		'ILIKECAPSLOCKS',
	);

	public function setUp() {
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

	public function tearDown() {
		$dbw = wfGetDB( DB_MASTER );
		// Clean up the mess we made...
		$dbw->delete( 'user', '*', __METHOD__ );
		$dbw->delete( 'spoofuser', '*', __METHOD__ );
		parent::tearDown();
	}

	/**
	 * @covers SpoofUser::record
	 */
	public function testRecord() {
		$user = User::newFromName( 'SomeUsername' );
		$user->addToDatabase();
		$s = new SpoofUser( 'SomeUsername' );
		$this->assertTrue( $s->record() );
		// Check that it made it into the database
		$this->assertArrayEquals( array( 'SomeUsername' ), $s->getConflicts() );
	}

	/**
	 * @covers SpoofUser::getConflicts
	 * @dataProvider provideGetConflicts
	 */
	public function testGetConflicts( $user, $conflicts ) {
		$s = new SpoofUser( $user );
		$this->assertArrayEquals( $conflicts, $s->getConflicts() );
	}

	public static function provideGetConflicts() {
		return array(
			array( 'UserFoo', array( 'UserF00', 'UserFoo' ) ),
			array( 'FooBaz', array( 'F00BAZ', 'FOOBAZ', 'FooBaz' ) ),
			array( 'ILIKECAPSLOCKS', array( 'ILIKECAPSLOCKS' ) ),
			array( 'NotInTheUserTable', array() ),
			array( 'UsErFoO', array( 'UserF00', 'UserFoo' ) ),
		);
	}

	/**
	 * @covers SpoofUser::update
	 */
	public function testUpdate() {
		$user = User::newFromName( 'MyNewUserName' );
		$user->addToDatabase();
		$s = new SpoofUser( 'MyNewUserName' );
		$s->update( 'BAZFOO' );
		$this->assertArrayEquals( array( 'MyNewUserName' ), $s->getConflicts() );
		$foobaz = new SpoofUser( 'BAZFOO' );
		$this->assertArrayEquals( array( 'BazF00', 'BazFoo' ), $foobaz->getConflicts() );
	}
}
