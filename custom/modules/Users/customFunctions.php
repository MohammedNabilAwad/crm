<?php
class osyCustomFunctionUsers {
	function osyAfterLogin(&$bean) {
		require_once ('custom/include/osy_utils.php');
		update_membership_status_accounts();
	}
}