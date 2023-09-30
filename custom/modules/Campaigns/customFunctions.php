<?php
class osyCustomFunction {
	function osyBeforeSave (&$bean){
		if(!empty($_REQUEST['service_id']) && $_REQUEST['service_id'] != '' && isset($_REQUEST['service_id'])){			
			require_once('modules/osy_service/osy_service.php');
			$osy_service = new osy_service();
			$osy_service_bean = $osy_service->retrieve($_REQUEST['service_id']);

			$osy_service_bean->load_relationship("prospect_lists");
			$array_prospect_list = $osy_service_bean->prospect_lists->getBeans();
			
			$bean->load_relationship("prospectlists");
			$bean->prospectlists->add($array_prospect_list);
		}
	}
}