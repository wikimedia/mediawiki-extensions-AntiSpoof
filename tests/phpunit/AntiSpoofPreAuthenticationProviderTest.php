<?php

use MediaWiki\Auth\AbstractPreAuthenticationProvider;
use MediaWiki\Auth\AuthManager;
use MediaWiki\Extension\AntiSpoof\AntiSpoofAuthenticationRequest;
use MediaWiki\Extension\AntiSpoof\AntiSpoofPreAuthenticationProvider;
use MediaWiki\Extension\AntiSpoof\SpoofUser;
use MediaWiki\MediaWikiServices;
use MediaWiki\Tests\Unit\Auth\AuthenticationProviderTestTrait;

/**
 * @covers \MediaWiki\Extension\AntiSpoof\AntiSpoofPreAuthenticationProvider
 * @group Database
 */
class AntiSpoofPreAuthenticationProviderTest extends MediaWikiIntegrationTestCase {
	use AuthenticationProviderTestTrait;

	/**
	 * @dataProvider provideGetAuthenticationRequests
	 */
	public function testGetAuthenticationRequests( $action, $params, bool $useUsername, $expectedReqs ) {
		$this->setMwGlobals( 'wgAntiSpoofAccounts', false );
		$provider = new AntiSpoofPreAuthenticationProvider(
			MediaWikiServices::getInstance()->getPermissionManager(),
			$params
		);
		$this->initProvider( $provider, null, null, $this->getServiceContainer()->getAuthManager() );
		$username = $useUsername ? $this->getTestSysop()->getUserIdentity()->getName() : null;
		$reqs = $provider->getAuthenticationRequests( $action, [ 'username' => $username ] );
		$this->assertEquals( $expectedReqs, $reqs );
	}

	public static function provideGetAuthenticationRequests() {
		return [
			[ AuthManager::ACTION_LOGIN, [], false, [] ],
			[ AuthManager::ACTION_CREATE, [],  false, [] ],
			[ AuthManager::ACTION_CREATE, [ 'antiSpoofAccounts' => true ], false, [] ],
			[ AuthManager::ACTION_CREATE, [], true, [] ],
			[ AuthManager::ACTION_CREATE, [ 'antiSpoofAccounts' => true ], true,
				[ new AntiSpoofAuthenticationRequest() ] ],
			[ AuthManager::ACTION_CHANGE, [], false, [] ],
			[ AuthManager::ACTION_REMOVE, [], false, [] ],
		];
	}

	/**
	 * @dataProvider provideTestForAccountCreation
	 */
	public function testTestForAccountCreation(
		$enabled, $isLegal, $conflicts, $creatorIsSysop, $reqs, $error
	) {
		$provider = $this->getMockBuilder( AntiSpoofPreAuthenticationProvider::class )
			->setConstructorArgs( [
				MediaWikiServices::getInstance()->getPermissionManager(),
				[ 'antiSpoofAccounts' => $enabled ]
			] )
			->onlyMethods( [ 'getSpoofUser' ] )->getMock();
		$spoofUser = $this->getMockBuilder( SpoofUser::class )
			->disableOriginalConstructor()->getMock();
		$provider->expects( $this->any() )->method( 'getSpoofUser' )->willReturn( $spoofUser );
		/** @var $provider AbstractPreAuthenticationProvider */
		$this->initProvider( $provider, null, null, $this->getServiceContainer()->getAuthManager() );

		$spoofUser->expects( $this->any() )->method( 'isLegal' )->willReturn( $isLegal );
		$spoofUser->expects( $this->any() )->method( 'getErrorStatus' )
			->willReturn( Status::newFatal( 'unittest' ) );
		$spoofUser->expects( $this->any() )->method( 'getConflicts' )->willReturn( $conflicts );

		$creator = $creatorIsSysop ? $this->getTestSysop()->getUser() : new User();
		/** @var StatusValue $status */
		$status = $provider->testForAccountCreation( new User(), $creator, $reqs );

		if ( $error ) {
			$this->assertStatusError( $error, $status );
		} else {
			$this->assertStatusGood( $status );
		}
	}

	public static function provideTestForAccountCreation() {
		$noSkip = new AntiSpoofAuthenticationRequest();
		$skip = new AntiSpoofAuthenticationRequest();
		$skip->ignoreAntiSpoof = true;

		return [
			// enabled, isLegal, conflicts,  creatorIsSysop, reqs, error
			'no spoofing' => [ true, true, [], false, [], null ],
			'illegal' => [ true, false, [], false, [], 'antispoof-name-illegal' ],
			'illegal, inactve' => [ false, false, [], false, [], null ],
			'illegal, sysop w/o skipping' => [ true, false, [], true, [],
				'antispoof-name-illegal' ],
			'illegal, sysop w/o skipping #2' => [ true, false, [], true, [ $noSkip ],
				'antispoof-name-illegal' ],
			'illegal, sysop skipping' => [ true, false, [], true, [ $skip ], null ],
			// this should never happen but is good for layered defense
			'fake skipping' => [ true, false, [], false, [ $skip ], 'antispoof-name-illegal' ],
			'conflicts' => [ true, true, [ 'x' ], false, [], 'antispoof-conflict' ],
			'conflicts w/ skipping' => [ true, true, [ 'x' ], true, [ $skip ], null ],
			'conflicts w/ fake skipping' => [ true, true, [ 'x' ], false, [ $skip ], 'antispoof-conflict' ],
			'illegal takes priority' => [ true, false, [ 'x' ], false, [], 'antispoof-name-illegal' ],
		];
	}
}
