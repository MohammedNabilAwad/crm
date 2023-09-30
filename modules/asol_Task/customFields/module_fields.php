<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $db, $beanList, $beanFiles, $mod_strings, $timedate, $sugar_config;

// Whether translate or not variable for all this php-file
$translateFieldLabels = ((isset($sugar_config['asolWFM_TranslateLabels'])) && ($sugar_config['asolWFM_TranslateLabels'])) ? true : false;

$focus = new asol_Task();
$focus->retrieve($_REQUEST['record']);

// Get the module of the object to create or to modify
$task_type = (isset($_REQUEST['task_type'])) ? $_REQUEST['task_type'] : $focus->task_type;
$triggerModule = $focus->getContextModule();
$tmpMod = explode("\${mod}", $focus->task_implementation);
$mod = (count($tmpMod) == 2) ? $tmpMod[0] : "";
$objModule = (isset($_REQUEST['objectModule'])) ? $_REQUEST['objectModule'] : $mod;
$objectModule = ($task_type == "modify_object") ? $triggerModule : $objModule;

if (($objectModule != '')) {

	$beanName = $beanList[$objectModule];
	require_once($beanFiles[$beanName]);
	$bean = new $beanName();

	// Get all databases's fields of the module $triggerModule
	$table = $bean->table_name;
	$rs = $focus->getSelectionResults("SHOW COLUMNS FROM ".$table);

	// Get custom-fields from table fields_meta_data
	$rs_c = $focus->getSelectionResults("SELECT name, type FROM fields_meta_data WHERE custom_module='".$objectModule."' AND type NOT IN ('id', 'relate', 'html', 'iframe', 'encrypt')");
	// Get related-custom-fields from table fields_meta_data
	$rs_cr = $focus->getSelectionResults("SELECT name, type, ext2, ext3 FROM fields_meta_data WHERE custom_module='".$objectModule."' AND type IN ('relate')");

	if (count($rs_c) == 0) {
		$rs_c = Array();
	}

	if (count($rs_cr) == 0) {
		$rs_cr = Array();
	}

	// Add custom-fields to $rs-array
	foreach ($rs_c as $custom_field) {
		$rs[count($rs)]['Field'] = /*$table."_cstm.".*/$custom_field["name"];
		$rs[count($rs)-1]['Type'] = $custom_field["type"];
	}

	// Add related-custom-fields to $rs-array
	foreach ($rs_cr as $custom_field) {
		$rs[count($rs)]['Field'] = /*$table."_cstm.".*/$custom_field["ext3"];
		$rs[count($rs)-1]['Type'] = $custom_field["type"];
		$rs[count($rs)-1]['RelateModule'] = $custom_field["ext2"];
	}

	// VARIABLE-DEFINITIONS
	$has_related = array();
	$is_required = array();
	$relate_modules = array();
	$fields = array();
	$fields_labels = array();
	$fields_options = array();
	$fields_options_db = array();
	$fields_types = array();
	
	//$GLOBALS['log']->debug("*********************** ASOL: module_fields \$rs=[".print_r($rs,true)."]");
	// Iterate through the table's fields for the module $objectModule
	foreach ($rs as $i=>$value) {

		if ($value['Type'] != "non-db") {
			
			//id & deleted fields are supressed from select input
			if (($value['Field'] != "deleted") && ($value['Field'] != "id")) {

				$fields[$i] = $value['Field'];
				// If it has a '.' then it is a custom_field ($rs[count($rs)]['Field'] = $table."_cstm.".$custom_field["name"];)
				$auxField = explode(".", $fields[$i]);
				//$GLOBALS['log']->debug("*********************** ASOL: module_fields \$auxField=[".print_r($auxField,true)."]");
				// If related_field then we want the name of the fieldName of the related_field(not the tableName)
				$auxField = (count($auxField) == 2) ? $auxField[1]: $fields[$i];
				// Get getFieldInfoFromVardefs
				$fieldInfo = $focus->getFieldInfoFromVardefs($objectModule, $auxField);
				$GLOBALS['log']->debug("**********[ASOL][WFM]: module_fields \$fieldInfo=[".print_r($fieldInfo,true)."]");
				$fields_options[$i] = $fieldInfo['labels'];
				$fields_options_db[$i] = $fieldInfo['values'];
				$fields_enum_operators[$i] = $fieldInfo['enumOperator'];
				$fields_enum_references[$i] = $fieldInfo['enumReference'];
				
				// Get fieldType
				if ($fields_options[$i] == 'currency') {
					$fields_type[$i] = 'currency';
				} else if ($fields_options[$i] != '') {
					$fields_type[$i] = 'enum';
				} else {
					$fields_type[$i] = $value['Type'];
				}

				//Buscar a traves del metodo get_related_fields() del bean
				global $beanList, $beanFiles, $app_list_strings;
				$class_name = $beanList[$objectModule];
				require_once($beanFiles[$class_name]);
				$bean = new $class_name();

				$relatedInfo = $bean->get_related_fields();// get_related_fields gets an array with the related_fields and within each related_field an array with information about this related_field ///**$bean->field_defs returns all the fields(normal and related)**//
				//$GLOBALS['log']->debug("*********************** ASOL: module_fields \$relatedInfo=[".print_r($relatedInfo,true)."]");
				
				$tmpField = explode(".", $value['Field']);
				$tmpField = (count($tmpField) == 2) ? $tmpField[1] : $value['Field'];

				// Find out whether the current field is a regular-field or a related_field
				foreach ($relatedInfo as $info) {
					if ($info['id_name'] == $tmpField) {
						//$fields_labels[$i] = $info['name'];
						$relate_modules[$i] = $info['module'];
						$fields_type[$i] = "relate";
						$has_related[$i] = "true";
						break;
					} else {
						//$fields_labels[$i] = $tmpField;
						$relate_modules[$i] = "";
						$has_related[$i] = "false";
					}
				}

				// Whether translate or not
				$fields_labels[$i] = ($translateFieldLabels) ? $fieldInfo['fieldLabel'] : $tmpField ;
				$fields_labels_key[$i] = $fieldInfo['fieldLabelKey'];
				
				// Is required?
				$is_required[$i] = ($focus->isRequiredField($objectModule, $rs[$i]['Field'])) ? "true" : "false";
				
				
			}
		}
	}
}

// Order module List for regular fields
$fields_labels_lowercase = array_map('strtolower', (!empty($fields_labels) ? $fields_labels : array() ));
if (!empty($fields_labels_lowercase)) {
	array_multisort($fields_labels_lowercase, $fields_labels, $fields_labels_key, $fields, $fields_type, $fields_options, $fields_options_db, $fields_enum_operators, $fields_enum_references, $relate_modules, $is_required);
}

// Generate fieldsSelect
$fieldsSelect = '<select name="fields" id="fields" style="width:178px" multiple size=10>';
if (empty($fields)) {
	$fields = Array();
}
foreach ($fields as $fieldK=>$field) {
	if ($is_required[$fieldK] == "true") {
		$fieldsSelect .= '<option title="'.$field.'" value="'.$field.'" label_key="'.$fields_labels_key[$fieldK].'">'.$fields_labels[$fieldK].' *</option>';
	} else { 
		$fieldsSelect .= '<option title="'.$field.'" value="'.$field.'" label_key="'.$fields_labels_key[$fieldK].'">'.$fields_labels[$fieldK].'</option>';
	}
}
$fieldsSelect .= '</select>';

// Build strings in order to pass the info to javascript
if (count($fields_labels) != 0) {
	$fields_labels_imploded = implode("\${pipe}", $fields_labels);
}
if (count($fields_type) != 0) {
	$fields_type_imploded = implode("\${comma}",$fields_type);
}
if (count($fields_options) != 0) {
	$fields_options_imploded = implode("\${comma}",str_replace("'", "\${sq}", $fields_options));
}
if (count($fields_options_db) != 0) {
	$fields_options_db_imploded = implode("\${comma}",str_replace("'", "\${sq}", $fields_options_db));
}
if (count($fields_enum_operators) != 0) {
	$fields_enum_operators_imploded = implode("\${comma}", $fields_enum_operators);
}
if (count($fields_enum_references) != 0) {
	$fields_enum_references_imploded = implode("\${comma}", $fields_enum_references);
}
if (count($relate_modules) != 0) {
	$relate_modules_imploded = implode("\${comma}", $relate_modules);
}
if (count($is_required) != 0) {
	$is_required_imploded = implode("\${comma}", $is_required);
}

// Function intented to get the Language-javascript-source
function _getModLanguageJS($module){
	if (!is_file(sugar_cached('jsLanguage/') . $module . '/' . $GLOBALS['current_language'] . '.js')) {
		require_once ('include/language/jsLanguage.php');
		jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
	}
	return getVersionedScript("cache/jsLanguage/{$module}/". $GLOBALS['current_language'] . '.js', $GLOBALS['sugar_config']['js_lang_version']);
}

// Get Language file references
$module_language_file_reference =  _getModLanguageJS($objectModule);

echo '<!-- BEGIN - Language file references -->'."\n".$module_language_file_reference."\n".'<!-- END - Language file references -->';

?>

<?php

$translateFieldLabels_string = ($translateFieldLabels) ? "true" : "false"; // used by asol_task.js

// Task implementation layout
echo '
	<input type="hidden" id="task_implementation" name="task_implementation" value="'.$task_implementation.'">
	<input type="hidden" id="translateFieldLabels" name="translateFieldLabels" value="'.$translateFieldLabels_string.'">
	
	<table border=0 width="100%">
		<tbody>
			<tr>
				<td>
					<table>
						<tr><td>
							<h4>'.$mod_strings['LBL_ASOL_FIELDS'].'</h4>
						</td></tr>
	
						<tr><td>
							'.$fieldsSelect.'
						</td></tr>
	
						<tr><td>
							<input type="button" title="'.$mod_strings['LBL_ASOL_ADD_FIELDS'].'" class="button" name="fields_button" value="'.$mod_strings['LBL_ASOL_ADD_FIELDS'].'" onClick="insertObjectField(\'module_values_Table\', \'fields\', \''.$fields_labels_imploded.'\', \''.$fields_type_imploded.'\', \''.$fields_enum_operators_imploded.'\', \''.$fields_enum_references_imploded.'\', \''.$relate_modules_imploded.'\', \''.$is_required_imploded.'\', \''.$timedate->get_cal_date_format().'\', \''.$mod_strings['LBL_ASOL_DELETE_BUTTON'].'\', \''.$mod_strings['LBL_ASOL_DELETE_ROW_ALERT']     .'\')">
						</td></tr>
					</table>
				</td>
					
			</tr>
		</tbody>
	</table>
';
?>