<?PHP

require_once("modules/asol_Process/___common_WFM/php/Basic_reports.php");

class Basic_wfm extends Basic_reports {

	function Basic_wfm(){
		parent::Basic_reports();
	}

	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
	}

	static function isRequiredField($module, $field) {
		////////////////////////////////////////////////////////////////////////////////////////
		// patch to solve a bug in table "relationships": the module "campaigns" is in lowercase
		if ($module == 'campaigns') {
			$module = 'Campaigns';
		}
		////////////////////////////////////////////////////////////////////////////////////////

		global $beanList, $beanFiles, $app_list_strings;
		$class_name = $beanList[$module];
		require_once($beanFiles[$class_name]);
		$bean = new $class_name();
		$field_defs = $bean->field_defs;

		return $field_defs[$field]["required"];
	}

	static function getCreatedBy($module_table, $id) {

		global $db;
		
		$object_query = $db->query("
										SELECT created_by
										FROM {$module_table}
										WHERE id = '{$id}'
									");
		$object_row = $db->fetchByAssoc($object_query);

		return $object_row['created_by'];
	}
}
?>