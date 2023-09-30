<?php
class osyCustomFunctionFP_events {
	function osyBeforeSave(&$bean) {
        require_once ('custom/include/osy_utils.php');
        osyCountDelegates($bean);
    }
    function osyAfterRetrieve(&$bean) {
	    require_once ('custom/include/osy_utils.php');
        osyCountDelegates($bean);
    }
}
?>