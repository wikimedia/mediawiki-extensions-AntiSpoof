<?php

use MediaWiki\Auth\AuthenticationRequestTestCase;
use MediaWiki\Extension\AntiSpoof\AntiSpoofAuthenticationRequest;

/**
 * @covers \MediaWiki\Extension\AntiSpoof\AntiSpoofAuthenticationRequest
 */
class AntiSpoofAuthenticationRequestTest extends AuthenticationRequestTestCase {

	/** @inheritDoc */
	protected function getInstance( array $args = [] ) {
		return new AntiSpoofAuthenticationRequest();
	}

	public static function provideLoadFromSubmission() {
		return [
			'empty' => [ [], [], [ 'ignoreAntiSpoof' => false ] ],
			'true' => [ [], [ 'ignoreAntiSpoof' => '1' ], [ 'ignoreAntiSpoof' => true ] ],
		];
	}
}
