<?php

use MediaWiki\Auth\AuthenticationRequest;

class AntiSpoofAuthenticationRequest extends AuthenticationRequest {
	public $ignoreAntiSpoof;

	public function getFieldInfo() {
		return [
			'ignoreAntiSpoof' => [
				'type' => 'checkbox',
				'label' => wfMessage( 'antispoof-ignore' ),
				'help' => wfMessage( 'antispoof-ignore-help' ),
				'optional' => true,
			],
		];
	}
}
