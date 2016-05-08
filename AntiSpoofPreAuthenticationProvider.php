<?php

use MediaWiki\Auth\AbstractPreAuthenticationProvider;
use MediaWiki\Auth\AuthenticationRequest;
use MediaWiki\Auth\AuthManager;

class AntiSpoofPreAuthenticationProvider extends AbstractPreAuthenticationProvider {
	/** @var bool False effectively disables this provider, but spoofed names will still be logged. */
	protected $antiSpoofAccounts;

	/**
	 * Options:
	 * - antiSpoofAccounts: (bool) stop spoofed accounts from being created. When false, only log.
	 * @param array $params
	 */
	public function __construct( array $params = [] ) {
		global $wgAntiSpoofAccounts;

		$params += [ 'antiSpoofAccounts' => $wgAntiSpoofAccounts ];

		$this->antiSpoofAccounts = $params['antiSpoofAccounts'];
	}

	public function getAuthenticationRequests( $action, array $options ) {
		$needed = false;
		switch ( $action ) {
			case AuthManager::ACTION_CREATE:
				$user = User::newFromName( $options['username'] ) ?: new User();
				$needed = $this->antiSpoofAccounts && $user->isAllowed( 'override-antispoof' );
				break;
		}

		return $needed ? [ new AntiSpoofAuthenticationRequest() ] : [];
	}

	public function testForAccountCreation( $user, $creator, array $reqs ) {
		/** @var AntiSpoofAuthenticationRequest $req */
		$req = AuthenticationRequest::getRequestByClass( $reqs, AntiSpoofAuthenticationRequest::class );
		$spoofUser = $this->getSpoofUser( $user );
		$override = $req && $req->ignoreAntiSpoof && $creator->isAllowed( 'override-antispoof' );
		$active = $this->antiSpoofAccounts && !$override;
		$mode = !$this->antiSpoofAccounts ? 'LOGGING ' : $override ? 'OVERRIDE ' : '';

		if ( $spoofUser->isLegal() ) {
			$normalized = $spoofUser->getNormalized();
			$conflicts = $spoofUser->getConflicts();
			if ( empty( $conflicts ) ) {
				$this->logger->debug( "{mode}PASS new account '{name}' [{normalized}]", [
					'mode' => $mode,
					'name' => $user->getName(),
					'normalized' => $normalized,
				] );
			} else {
				$this->logger->info( "{mode}CONFLICT new account '{name}' [{normalized}] spoofs {spoofs}", [
					'mode' => $mode,
					'name' => $user->getName(),
					'normalized' => $normalized,
					'spoofs' => $conflicts,
				] );
				if ( $active ) {
					$cnt = count( $conflicts );
					$list = '';
					foreach ( $conflicts as $simUser ) {
						$list .= Html::element( 'li', [],
							wfMessage( 'antispoof-conflict-item', $simUser ) );
					}
					$list = Html::rawElement( 'ul', [], $list );

					$message = new RawMessage( '$1$2$3', [
						wfMessage( 'antispoof-conflict-top', $user->getName() )->numParams( $cnt ),
						$list,
						wfMessage( 'antispoof-conflict-bottom' )
					] );
					return StatusValue::newFatal( $message );
				}
			}
		} else {
			$error = $spoofUser->getError();
			$this->logger->info( "{mode}ILLEGAL new account '{name}' {error}", [
				'mode' => $mode,
				'name' => $user->getName(),
				'error' => $error,
			] );
			if ( $active ) {
				return StatusValue::newFatal( 'antispoof-name-illegal', $user->getName(), $error );
			}
		}
		return StatusValue::newGood();
	}

	/**
	 * @param User $user
	 * @return SpoofUser
	 */
	protected function getSpoofUser( User $user ) {
		return new SpoofUser( $user->getName() );
	}
}
