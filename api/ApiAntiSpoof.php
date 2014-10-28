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
		$res->addValue( null, $this->getModuleName(), array( 'username' => $params['username'] ) );

		$spoof = new SpoofUser( $params['username'] );

		if ( $spoof->isLegal() ) {
			$normalized = $spoof->getNormalized();
			$res->addValue( null, $this->getModuleName(), array( 'normalised' => $normalized ) );

			$unfilteredConflicts = $spoof->getConflicts();
			if ( empty( $unfilteredConflicts ) ) {
				$res->addValue( null, $this->getModuleName(), array( 'result' => 'pass' ) );
			} else {
				$hasSuppressed = false;
				$conflicts = array();
				foreach ( $unfilteredConflicts as $conflict )
				{
					if ( !User::newFromName( $conflict )->isHidden() ) {
						$conflicts[] = $conflict;
					} else {
						$hasSuppressed = true;
					}
				}

				if ( $hasSuppressed ) {
					$res->addValue( null, $this->getModuleName(), array( 'suppressed' => 'true' ) );
				}

				$res->addValue( null, $this->getModuleName(), array( 'result' => 'conflict' ) );

				$res->setIndexedTagName( $conflicts, 'u' );
				$res->addValue( array( $this->getModuleName() ), 'users', $conflicts );
			}
		} else {
			$error = $spoof->getError();
			$res->addValue( 'antispoof', 'result', 'error' );
			$res->addValue( 'antispoof', 'error', $error );
		}
	}

	public function getAllowedParams() {
		return array(
			'username' => array(
				ApiBase::PARAM_REQUIRED => true,
			),
		);
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getParamDescription() {
		return array(
			'username' => 'The username to check against AntiSpoof',
		);
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getDescription() {
		return 'Check a username against AntiSpoof\'s normalisation checks.';
	}

	/**
	 * @deprecated since MediaWiki core 1.25
	 */
	public function getExamples() {
		return array(
			'api.php?action=antispoof&username=Foo',
		);
	}

	/**
	 * @see ApiBase::getExamplesMessages()
	 */
	protected function getExamplesMessages() {
		return array(
			'action=antispoof&username=Foo'
				=> 'apihelp-antispoof-example-1',
		);
	}
}
