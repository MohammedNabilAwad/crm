<?php
class osyCustomFunction {
	function osyBeforeSave (&$bean){
		$bean->name = $GLOBALS['app_list_strings']['osy_services_companies_subject_list'][$bean->subject];
	}
}