<?PHP
require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

require_once('modules/asol_Process/___common_WFM/php/Basic_wfm.php');

class asol_Process extends Basic_wfm {
	
	var $new_schema = true;
	var $module_dir = 'asol_Process';
	var $object_name = 'asol_Process';
	var $table_name = 'asol_process';
	var $importable = false;
	var $disable_row_level_security = true ; // to ensure that modules created and deployed under CE will continue to function under team security if the instance is upgraded to PRO
	var $id;
	var $name;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $modified_by_name;
	var $created_by;
	var $created_by_name;
	var $description;
	var $deleted;
	var $created_by_link;
	var $modified_user_link;
	var $assigned_user_id;
	var $assigned_user_name;
	var $assigned_user_link;
	var $status;
	var $trigger_module;
	var $alternative_database;
	
	function asol_Process(){	
		parent::Basic_wfm();
	}
	
	function getTriggerModule() {
		return $this->trigger_module;
	}
}
?>