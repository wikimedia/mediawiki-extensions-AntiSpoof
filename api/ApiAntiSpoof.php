<?php
/**
 * API module to check a username against the AntiSpoof normalisation checks
 *
 * @ingroup API
 * @ingroup Extensions
 */
class ApiAntiSpoof extends ApiBase {

	public function execute() {
		$params = $this->extractRequestParams();

		$res = $this->getResult();
		$res->addValue( null, $this->getModuleName(), [ 'username' => $params['username'] ] );

		$spoof = new SpoofUser( $params['username'] );

		if ( $spoof->isLegal() ) {
			$normalized = $spoof->getNormalized();
			$res->addValue( null, $this->getModuleName(), [ 'normalised' => $normalized ] );

			$unfilteredConflicts = $spoof->getConflicts();
			if ( empty( $unfilteredConflicts ) ) {
				$res->addValue( null, $this->getModuleName(), [ 'result' => 'pass' ] );
			} else {
				$hasSuppressed = false;
				$conflicts = [];
				foreach ( $unfilteredConflicts as $conflict ) {
					if ( !User::newFromName( $conflict )->isHidden() ) {
						$conflicts[] = $conflict;
					} else {
						$hasSuppressed = true;
					}
				}

				if ( $hasSuppressed ) {
					$res->addValue( null, $this->getModuleName(), [ 'suppressed' => 'true' ] );
				}

				$res->addValue( null, $this->getModuleName(), [ 'result' => 'conflict' ] );

				$res->setIndexedTagName( $conflicts, 'u' );
				$res->addValue( [ $this->getModuleName() ], 'users', $conflicts );
			}
		} else {
			$error = $spoof->getError();
			$res->addValue( 'antispoof', 'result', 'error' );
			$res->addValue( 'antispoof', 'error', $error );
		}
	}

	public function getAllowedParams() {
		return [
			'username' => [
				ApiBase::PARAM_REQUIRED => true,
			],
		];
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return [
			'action=antispoof&username=Foo'
				=> 'apihelp-antispoof-example-1',
		];
	}
}
