<?php

use MediaWiki\Auth\AuthManager;

/**
 * @covers AntiSpoofPreAuthenticationProvider
 * @group Database
 */
class AntiSpoofPreAuthenticationProviderTest extends MediaWikiTestCase {
	public function setUp() {
		global $wgDisableAuthManager;
		if ( !class_exists( AuthManager::class ) || $wgDisableAuthManager ) {
			$this->markTestSkipped( 'AuthManager is disabled' );
		}

		parent::setUp();
	}

	/**
	 * @dataProvider provideGetAuthenticationRequests
	 */
	public function testGetAuthenticationRequests( $action, $params, $username, $expectedReqs ) {
		$this->setMwGlobals( 'wgAntiSpoofAccounts', false );
		$provider = new AntiSpoofPreAuthenticationProvider( $params );
		$provider->setManager( AuthManager::singleton() );
		$reqs = $provider->getAuthenticationRequests( $action, [ 'username' => $username ] );
		$this->assertEquals( $expectedReqs, $reqs );
	}

	public function provideGetAuthenticationRequests() {
		return [
			[ AuthManager::ACTION_LOGIN, [], null, [] ],
			[ AuthManager::ACTION_CREATE, [],  null, [] ],
			[ AuthManager::ACTION_CREATE, [ 'antiSpoofAccounts' => true ],  null, [] ],
			[ AuthManager::ACTION_CREATE, [], 'UTSysop', [] ],
			[ AuthManager::ACTION_CREATE, [ 'antiSpoofAccounts' => true ], 'UTSysop',
				[ new AntiSpoofAuthenticationRequest() ] ],
			[ AuthManager::ACTION_CHANGE, [], null, [] ],
			[ AuthManager::ACTION_REMOVE, [], null, [] ],
		];
	}

	/**
	 * @dataProvider provideTestForAccountCreation
	 */
	public function testTestForAccountCreation(
		$enabled, $isLegal, $conflicts,  $creator, $reqs, $error
	) {
		$provider = $this->getMockBuilder( AntiSpoofPreAuthenticationProvider::class )
			->setConstructorArgs( [ [ 'antiSpoofAccounts' => $enabled ] ] )
			->setMethods( [ 'getSpoofUser' ] )->getMock();
		$spoofUser = $this->getMockBuilder( SpoofUser::class )
			->disableOriginalConstructor()->getMock();
		$provider->expects( $this->any() )->method( 'getSpoofUser' )->willReturn( $spoofUser );
		/** @var $provider \MediaWiki\Auth\PreAuthenticationProvider */
		$provider->setManager( AuthManager::singleton() );
		$provider->setLogger( new \Psr\Log\NullLogger() );

		$spoofUser->expects( $this->any() )->method( 'isLegal' )->willReturn( $isLegal );
		$spoofUser->expects( $this->any() )->method( 'getConflicts' )->willReturn( $conflicts );

		/** @var StatusValue $status */
		$status = $provider->testForAccountCreation( new User(), $creator, $reqs );

		if ( $error ) {
			$this->assertFalse( $status->isGood() );
			$this->assertEquals( $error, Status::wrap( $status )->getMessage()->getKey() );
		} else {
			$this->assertTrue( $status->isGood() );
		}
	}

	public function provideTestForAccountCreation() {
		$user = new User();
		$sysop = User::newFromName( 'UTSysop' );
		$noSkip = new AntiSpoofAuthenticationRequest();
		$skip = new AntiSpoofAuthenticationRequest();
		$skip->ignoreAntiSpoof = true;

		return [
			// enabled, isLegal, conflicts,  creator, reqs, error
			'no spoofing' => [ true, true, [], $user, [], null ],
			'illegal' => [ true, false, [], $user, [], 'antispoof-name-illegal' ],
			'illegal, inactve' => [ false, false, [], $user, [], null ],
			'illegal, sysop w/o skipping' => [ true, false, [], $sysop, [],
				'antispoof-name-illegal' ],
			'illegal, sysop w/o skipping #2' => [ true, false, [], $sysop, [ $noSkip ],
				'antispoof-name-illegal' ],
			'illegal, sysop skipping' => [ true, false, [], $sysop, [ $skip ], null ],
			// this should never happen but is good for layered defense
			'fake skipping' => [ true, false, [], $user, [ $skip ], 'antispoof-name-illegal' ],
			'conflicts' => [ true, true, [ 'x' ], $user, [], '$1$2$3' ],
			'conflicts w/ skipping' => [ true, true, [ 'x' ], $sysop, [ $skip ], null ],
			'conflicts w/ fake skipping' => [ true, true, [ 'x' ], $user, [ $skip ], '$1$2$3' ],
			'illegal takes priority' => [ true, false, [ 'x' ], $user, [], 'antispoof-name-illegal' ],
		];
	}
}
