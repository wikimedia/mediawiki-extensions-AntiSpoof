<?php

// phpcs:disable MediaWiki.Commenting.FunctionComment

namespace MediaWiki\Extension\UserMerge\Hooks;

use User;

/**
 * Phan stub
 */
interface DeleteAccountHook {
	public function onDeleteAccount( User &$oldUser );
}
