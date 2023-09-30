<?php

class wfm_utils {

	/**
	 * D20130927T0920
	 * Echoes the version of WFM
	 * Used for static resources (js, css, etc)
	 */
	static function echoVersionWFM() {

		$version_resources_wfm = "D20130927T0920";
		echo $version_resources_wfm;
	}

	/**
	 * D20130607T1818
	 * WFM log
	 * @param $logLevel
	 * @param $logText
	 * @param $file
	 * @param $function
	 * @param $line
	 */
	static function wfm_log($logLevel, $logText, $file, $function=null, $line=null) {

		global $sugar_config;

		$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;

		$wfm_logLevelForInfoLogs = (isset($sugar_config['wfm_logLevelForInfoLogs'])) ? $sugar_config['wfm_logLevelForInfoLogs'] : 'info';

		$logLevel = (($logLevel == 'asol') && (!$asolLogLevelEnabled)) ? $wfm_logLevelForInfoLogs : $logLevel;

		$wfm_log_prefix = "**********[ASOL][WFM][".session_id()."]";

		$GLOBALS['log']->$logLevel($wfm_log_prefix.': '.pathinfo($file, PATHINFO_BASENAME)."[$line]->".$function.': '.$logText);

	}

	/**
	 * D20130607T1818
	 * WFM echo
	 * @param $type
	 * @param $text
	 */
	static function wfm_echo($type, $text) {

		$gmdate = "<code style='color: green'>[".gmdate('Y-m-d H:i:s')."]</code>";

		$session_id = "<code style='color: blue'>[".session_id()."]</code>";

		switch ($type) {
			case 'crontab':
				if ($_REQUEST['execution_type'] != "crontab") {
					break;
				}
				echo "<br>$gmdate$session_id $text";
				break;

			default:
				echo "<br>$gmdate $text";
		}
	}

	/**
	 * D20130607T1818
	 * WFM curl
	 * @param $type
	 * @param $submit_url
	 * @param $query_string
	 * @param $exit
	 * @param $timeout
	 */
	static function wfm_curl($type, $submit_url, $query_string, $exit, $timeout) {

		global $sugar_config;

		if ($submit_url == null) {
			// set URL
			// Url sintax : scheme://username:password@domain:port/path?query_string#fragment_id
			$site_url = (isset($sugar_config['WFM_site_url'])) ? $sugar_config['WFM_site_url'] : $sugar_config['site_url'];
			$site_url .= '/';
			$submit_url = $site_url."index.php";
		}

		switch ($type) {
			case 'post':

				// cURL by means of POST
				$curl = curl_init();

				curl_setopt($curl, CURLOPT_URL, $submit_url); // The URL to fetch. This can also be set when initializing a session with curl_init().
				curl_setopt($curl, CURLOPT_POST, true); // TRUE to do a regular HTTP POST.
				curl_setopt($curl, CURLOPT_POSTFIELDS, $query_string); // The full data to post in a HTTP "POST" operation.
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // FALSE to stop cURL from verifying the peer's certificate.

				if ($timeout != null) {
					curl_setopt($curl, CURLOPT_TIMEOUT, $timeout); // The maximum number of seconds to allow cURL functions to execute.
					curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout); // The number of seconds to wait while trying to connect. Use 0 to wait indefinitely.
				}

				if (isset($sugar_config['WFM_site_login_username_password'])) { // Basic Authentication (Site Login)
					curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC) ; // The HTTP authentication method(s) to use.
					//curl_setopt($curl, CURLOPT_SSLVERSION, 3);
					//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
					//curl_setopt($curl, CURLOPT_HEADER, true);
					//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
					//curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
					curl_setopt($curl, CURLOPT_USERPWD, $sugar_config['WFM_site_login_username_password']); // A username and password formatted as "[username]:[password]" to use for the connection.
					wfm_utils::wfm_log('debug', "cURL -> Basic Authentication (Site Login) =[".$sugar_config['WFM_site_login_username_password']."]", __FILE__, __METHOD__, __LINE__);
				}

				wfm_utils::wfm_log('debug', "cURL=[".$site_url."index.php?".$query_string."]", __FILE__, __METHOD__, __LINE__);
				curl_exec($curl);
				wfm_utils::wfm_log('debug', "curl_getinfo=[".print_r(curl_getinfo($curl),true)."]", __FILE__, __METHOD__, __LINE__);

				if(curl_errno($curl)) {
					wfm_utils::wfm_log('debug', " curl_errno=[".print_r(curl_errno($curl),true)."]", __FILE__, __METHOD__, __LINE__);
				}

				curl_close($curl);
				wfm_utils::wfm_log('debug', "EXIT cURL REQUEST*******************************************", __FILE__, __METHOD__, __LINE__);

				break;

			case 'get':

				// cURL by means of GET
				/*$ch = curl_init();
				 curl_setopt($ch, CURLOPT_URL, $site_url."index.php?entryPoint=wfm_engine&trigger_module=".$trigger_module."&trigger_event=".$trigger_event."&bean_id=".$bean_id."&current_user_id=".$current_user->id."&bean_ungreedy_count=".$bean_ungreedy_count."&old_bean=".$urlencode_serialized_old_bean."&new_bean=".$urlencode_serialized_new_bean."&execution_type=logic_hook");
				 wfm_utils::wfm_log('debug', "*****site_url*******cURL=".$site_url."index.php?entryPoint=wfm_engine&trigger_module=".$trigger_module."&trigger_event=".$trigger_event."&bean_id=".$bean_id."&current_user_id=".$current_user->id."&bean_ungreedy_count=".$bean_ungreedy_count."&old_bean=".$urlencode_serialized_old_bean."&new_bean=".$urlencode_serialized_new_bean."&execution_type=logic_hook****************", __FILE__, __METHOD__, __LINE__);

				 curl_setopt($ch, CURLOPT_HEADER, 0);
				 curl_setopt($ch, CURLOPT_TIMEOUT, 1);

				 curl_exec($ch);

				 // close cURL resource, and free up system resources
				 curl_close($ch);*/

				break;
		}

		if ($exit) {
			exit();
		}
	}

	/**
	 * D20130607T1818
	 * WFM generate field select
	 * @param $dropdownlist_key
	 * @param $field_name
	 * @param $field_value
	 * @param $onChange
	 * @param $disabled
	 */
	static function wfm_generate_field_select($dropdownlist_key, $field_name, $field_value, $onChange, $disabled) {

		global $app_list_strings;

		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";
		foreach ($app_list_strings[$dropdownlist_key] as $key => $value) {
			$value =  (isset($app_list_strings[$dropdownlist_key][$key])) ? $app_list_strings[$dropdownlist_key][$key] : $key; // If language not defined
			$selected = ($field_value == $key) ? 'selected' : '';
			$select .= "<option value='{$key}' {$selected}>{$value}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	/**
	 * D20130617T1245
	 * Genereate alternative database select
	 * @param $array
	 * @param $field_name
	 * @param $field_value
	 * @param $onChange
	 * @param $disabled
	 */
	static function wfm_generate_alternativeDB_select($array, $field_name, $field_value, $onChange, $disabled) {

		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";
		$select .= "<option value='-1'>".translate('LBL_REPORT_NATIVE_DB', 'asol_Process')."</option>";
		foreach ($array as $key => $value) {
			$value =  (isset($array[$key])) ? $array[$key] : $key; // If language not defined
			$selected = ($field_value == $key) ? 'selected' : '';
			$select .= "<option value='{$key}' {$selected}>{$value}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	/**
	 * D20130617T1824
	 * Genereate alternative database table select
	 * @param $array
	 * @param $field_name
	 * @param $field_value
	 * @param $onChange
	 * @param $disabled
	 */
	static function wfm_generate_alternativeDBtable_select($array, $field_name, $field_value, $onChange, $disabled) {

		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";
		foreach ($array as $value) {
			$selected = ($field_value == $value) ? 'selected' : '';
			$select .= "<option value='{$value}' {$selected}>{$value}</option>";
		}
		$select .= "</select>";

		return $select;
	}


	static function wfm_generate_select($array, $field_name, $field_value, $onChange, $disabled) {

		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";
		foreach ($array as $key => $value) {
			$value =  (isset($array[$key])) ? $array[$key] : $key; // If language not defined
			$selected = ($field_value == $key) ? 'selected' : '';
			$select .= "<option value='{$key}' {$selected}>{$value}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	/**
	 * D20130607T1818
	 * WFM generate trigger_event select
	 * @param $dropdownlist_key
	 * @param $dropdownlist_key_2
	 * @param $trigger_module
	 * @param $field_name
	 * @param $field_value
	 * @param $onChange
	 * @param $disabled
	 */
	static function wfm_generate_trigger_event_select($dropdownlist_key, $dropdownlist_key_2, $trigger_module, $field_name, $field_value, $onChange, $disabled) {

		global $app_list_strings;

		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";

		if ($trigger_module == 'Users') {
			foreach ($app_list_strings[$dropdownlist_key] as $key => $value) {
				$value =  (isset($app_list_strings[$dropdownlist_key][$key])) ? $app_list_strings[$dropdownlist_key][$key] : $key; // If language not defined
				$selected = ($field_value == $key) ? 'selected' : '';
				$select .= "<option value='{$key}' {$selected}>{$value}</option>";
			}
		} else {
			foreach ($app_list_strings[$dropdownlist_key_2] as $key => $value) {
				$value =  (isset($app_list_strings[$dropdownlist_key_2][$key])) ? $app_list_strings[$dropdownlist_key_2][$key] : $key; // If language not defined
				$selected = ($field_value == $key) ? 'selected' : '';
				$select .= "<option value='{$key}' {$selected}>{$value}</option>";
			}
		}
		$select .= "</select>";

		return $select;
	}

	/**
	 * D20130607T1818
	 * Generate module select
	 * @param $field_name
	 * @param $field_value
	 * @param $onChange
	 * @param $disabled
	 */
	static function wfm_generate_field_module_select($field_name, $field_value, $onChange, $disabled) {

		global $current_user, $app_list_strings;

		// Get modules that the current_user can access
		$acl_modules = ACLAction::getUserActions($current_user->id);

		$modules = Array();
		foreach($acl_modules as $key => $mod){
			if ($mod['module']['access']['aclaccess'] >= 0) {
				$modules[$key] = (isset($app_list_strings['moduleList'][$key])) ? $app_list_strings['moduleList'][$key] : $key;  // If language not defined
			}
		}
		asort($modules);

		// Generate select
		$select = "<select id='{$field_name}' name='{$field_name}' onChange='{$onChange}' {$disabled}>";
		$select .= "<option value=''></option>";
		foreach ($modules as $key => $value) {
			$selected = ($field_value == $key) ? 'selected' : '';
			$select .= "<option value='{$key}' {$selected}>{$value}</option>";
		}
		$select .= "</select>";

		return $select;
	}

	/**
	 * D20130607T1818
	 * Generate select module_fields
	 * @param $fields
	 * @param $rhs_key
	 * @param $has_related
	 * @param $fields_labels
	 * @param $fields_labels_key
	 */
	static function wfm_generate_moduleFields_selectFields($fields, $rhs_key, $has_related, $fields_labels, $fields_labels_key, $multiple, $show_idRelationships) {

		$fieldsSelect = "<select id='fields' name='fields' onclick='fields_onClick(this);' onDblClick='fields_onDblClick(this);' {$multiple} size=10 style='width:178px'>";
		if (empty($fields)) {
			$fields = Array();
		}
		foreach ($fields as $fieldK => $field) {
			if ( ($has_related[$fieldK] == "true") && (($field != 'id') || (($field == 'id')&&($show_idRelationships))) ) {
				$style = "style='color:blue;'";
				$plus = ' +';
				$selected = ($rhs_key == $field) ? 'selected' : '';
			} else  {
				$style = '';
				$plus = '';
				$selected = '';
			}

			$fieldsSelect .= "<option {$style} value='{$field}' title='{$field}' label_key='{$fields_labels_key[$fieldK]}' {$selected}>{$fields_labels[$fieldK]}{$plus}</option>";
		}
		$fieldsSelect .= '</select>';

		return $fieldsSelect;
	}

	/**
	 * D20130607T1818
	 * Generate select module_fields isrequired
	 * @param $fields
	 * @param $rhs_key
	 * @param $is_required
	 * @param $fields_labels
	 * @param $fields_labels_key
	 */
	static function wfm_generate_moduleFields_selectFields_isrequired($fields, $rhs_key, $is_required, $fields_labels, $fields_labels_key, $multiple) {

		$fieldsSelect = "<select id='fields' name='fields' onclick='' onDblClick='' {$multiple} size=10 style='width:178px'>";
		if (empty($fields)) {
			$fields = Array();
		}
		foreach ($fields as $fieldK => $field) {
			if ($is_required[$fieldK] == "true") {
				$asterisk = ' *';
				$selected = ($rhs_key == $field) ? 'selected' : '';
			} else  {
				$asterisk = '';
				$selected = '';
			}

			$fieldsSelect .= "<option value='{$field}' title='{$field}' label_key='{$fields_labels_key[$fieldK]}' {$selected}>{$fields_labels[$fieldK]}{$asterisk}</option>";
		}
		$fieldsSelect .= '</select>';

		return $fieldsSelect;
	}

	/**
	 * D20130607T1818
	 * Generate select module_fields related
	 * @param $related_fields
	 * @param $related_fields_labels
	 * @param $related_fields_labels_key
	 * @param $related_fields_relationship
	 * @param $related_fields_relationship_labels
	 */
	static function wfm_generate_moduleFields_selectRelatedFields($related_fields, $related_fields_labels, $related_fields_labels_key, $related_fields_relationship, $related_fields_relationship_labels) {
		wfm_utils::wfm_log('debug', 'get_defined_vars=['.var_export(get_defined_vars(), true).']', __FILE__, __METHOD__, __LINE__);

		$relatedFieldsSelect = "<select id='related_fields' name='related_fields' multiple size=10 style='width:178px'>";
		if (empty($related_fields)) {
			$related_fields = Array();
		}
		$aux_counter = 0;
		$aux_previous_module = "";
		foreach ($related_fields as $rFieldK => $relatedField) {
			$relatedField_array = explode('.', $relatedField);
			$aux_current_module = $relatedField_array[0];
			$aux_current_module = str_replace('_cstm', '', $aux_current_module);
			$aux_current_module .= $related_fields_relationship[$rFieldK];
			if ($aux_current_module != $aux_previous_module) {
				if ($aux_counter != 0) {
					$relatedFieldsSelect .= "</optgroup>";
				}
				if ($aux_counter + 1 != count($related_fields)) {
					$related_fields_label_array = explode('.', $related_fields_labels[$rFieldK]);
					$aux_current_module_label = $related_fields_label_array[0];
					if ($aux_current_module_label == $related_fields_relationship_labels) {
						$relatedFieldsSelect .= "<optgroup label='{$aux_current_module_label}' title='{$aux_current_module_label}'>";
					} else {
						$relatedFieldsSelect .= "<optgroup label='{$aux_current_module_label} ({$related_fields_relationship_labels[$rFieldK]})' title='{$aux_current_module_label} ({$related_fields_relationship_labels[$rFieldK]})'>";
					}
				}
			}
			$relatedFieldsSelect .= "<option value='{$relatedField}' title='{$relatedField}' label_key='{$related_fields_labels_key[$rFieldK]}'>{$related_fields_labels[$rFieldK]}</option>";

			$aux_previous_module = $aux_current_module;
			$aux_counter++;
		}
		$relatedFieldsSelect .= "</optgroup>";
		$relatedFieldsSelect .= '</select>';

		return $relatedFieldsSelect;
	}

	/**
	 * D20130607T1818
	 * addRelationShipNameToLowerCase
	 * @param $fieldLabel
	 * @param $relationShipLabel
	 */
	static function addRelationShipNameToLowerCase($fieldLabel, $relationShipLabel) {

		$fieldLabelArray = explode('.', $fieldLabel);
		$tableName = array_shift($fieldLabelArray);

		return strtolower($tableName.'.'.$relationShipLabel.'.'.implode('.', $fieldLabelArray));
	}

	/**
	 * D20130607T1818
	 * Function intented to get the Language-javascript-source
	 * @param $module
	 */
	static function _getModLanguageJS($module){
		if (!is_file(sugar_cached('jsLanguage/')."{$module}/{$GLOBALS['current_language']}.js")) {
			require_once ('include/language/jsLanguage.php');
			jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
		}
		return getVersionedScript("cache/jsLanguage/{$module}/{$GLOBALS['current_language']}.js", $GLOBALS['sugar_config']['js_lang_version']);
	}

	/**
	 * D20130607T1818
	 * Add js language files to webpage
	 * @param $trigger_module
	 * @param $add_related_modules
	 * @param $related_modules
	 * @param $focus
	 * @param $bean
	 * @param $fieldsToBeRemoved
	 * @param $translateFieldLabels
	 * @param $rhs_key
	 */
	static function wfm_add_jsModLanguages($trigger_module, $add_related_modules, $add_id_relationships, $related_modules, $focus, $bean, $fieldsToBeRemoved, $translateFieldLabels, $rhs_key) {

		// Get Language file references

		// trigger_module
		$module_language_file_reference = self::_getModLanguageJS($trigger_module);
		$related_module_language_file_reference = '';

		if ($add_id_relationships) {
			// for id relationships
			$currentTableFields = wfm_reports_utils::getCrmTableFields($bean, $trigger_module, $fieldsToBeRemoved, $translateFieldLabels, $rhs_key, true);
			//wfm_utils::wfm_log('debug', '$currentTableFields=['.print_r($currentTableFields, true).']', __FILE__, __METHOD__, __LINE__);
			$related_modules_idRelationships = (isset($currentTableFields['related_modules'])) ? $currentTableFields['related_modules'] : null;
		}

		if ($add_related_modules) {

			// total
			$related_modules_total = array_filter(array_unique(array_merge($related_modules, $related_modules_idRelationships)));
			foreach($related_modules_total as $key => $value) {
				$related_module_language_file_reference .= self::_getModLanguageJS($value) . "\n";
			}
		}

		echo '<!-- BEGIN - Language file references -->'."\n".$module_language_file_reference."\n".$related_module_language_file_reference."\n".'<!-- END - Language file references -->';
	}

	/**
	 * D20130607T1818
	 * Get moduleTableName moduleName conversion
	 * @param $focus
	 */
	static function wfm_get_moduleTableName_moduleName_conversion_array($focus){

		global $beanList, $beanFiles;

		$acl_modules = ACLAction::getUserActions($focus->created_by);

		// Get an array of table names for admin accesible modules
		$modulesTables = Array();
		foreach($acl_modules as $key=>$mod){

			if($mod['module']['access']['aclaccess'] >= 0){

				$class_name = $beanList[$key];
				if (!empty($class_name)) {

					require_once($beanFiles[$class_name]);

					$bean = new $class_name();
					$table_name = $bean->table_name;

					$modulesTables[$table_name] = $key;

					unset($bean);
				}
			}
		}

		return $modulesTables;
	}

	/**
	 * D20130607T1818
	 * Get moduleName moduleTableName conversion
	 * @param $user_id
	 */
	static function wfm_get_moduleName_moduleTableName_conversion_array($user_id){

		global $beanList, $beanFiles;

		$acl_modules = ACLAction::getUserActions($user_id);

		//Get an array of table names for admin accesible modules
		$modulesTables = Array();
		foreach($acl_modules as $key=>$mod){

			if($mod['module']['access']['aclaccess'] >= 0){

				$class_name = $beanList[$key];
				if (!empty($class_name)) {

					require_once($beanFiles[$class_name]);

					$bean = new $class_name();
					$table_name = $bean->table_name;

					$modulesTables[$key] = $table_name;

					unset($bean);
				}
			}
		}

		return $modulesTables;
	}

	/**
	 * D20130607T1818
	 * Get hour offset and timezone
	 * @param $current_user_id
	 */
	static function wfm_getHourOffset_and_TimeZone($current_user_id) {
		wfm_utils::wfm_log('debug', "ENTRY", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('debug', 'get_defined_vars=['.var_export(get_defined_vars(), true).']', __FILE__, __METHOD__, __LINE__);

		require_once('modules/Users/User.php');
		$theUser = new User();
wfm_utils::wfm_log('asol', 'ANTES 1', __FILE__, __METHOD__, __LINE__);
		$theUser->retrieve($current_user_id);
wfm_utils::wfm_log('asol', 'DESPUES 1', __FILE__, __METHOD__, __LINE__);
		
		//wfm_utils::wfm_log('debug', "\$theUser->user_name=[$theUser->user_name]  ", __FILE__, __METHOD__, __LINE__);

		$userTZ = $theUser->getPreference("timezone");
		//wfm_utils::wfm_log('debug', "\$userTZ=[$userTZ]  ", __FILE__, __METHOD__, __LINE__);

		date_default_timezone_set($userTZ);

		$phpDateTime = new DateTime(null, new DateTimeZone($userTZ));
		$hourOffset = $phpDateTime->getOffset()*-1;

		return Array(
		'userTZ' => $userTZ,
		'hourOffset' => $hourOffset
		);
	}

	/**
	 * D20130607T1818
	 * Convert array to curl-parameter
	 * 1) replace special characters, 2) serialize, 3)urlencode
	 * @param $array
	 */
	static function wfm_convert_array_to_curl_parameter($array) {

		$array = str_replace("&quot;", "&#34;", $array); // To avoid problems with sugarcrm-decoding
		$array = str_replace(">", "&gt;", $array); // To avoid problems with Save.php
		$array = str_replace("<", "&lt;", $array); // To avoid problems with Save.php
		$serialized_array = serialize($array);
		//wfm_utils::wfm_log('debug', "\$serialized_array=[".$serialized_array."]", __FILE__, __METHOD__, __LINE__);
		$urlencode_serialized_array = urlencode($serialized_array);
		//wfm_utils::wfm_log('debug', "\$urlencode_serialized_array=[".$urlencode_serialized_array."]", __FILE__, __METHOD__, __LINE__);

		return $urlencode_serialized_array;
	}

	/**
	 * D20130607T1818
	 * Build array with field_defs non-db from the bean (retrieved from DB, need fixUpFormatting)
	 * @param $trigger_module
	 * @param $object_id
	 */
	static function wfm_get_bean_variable_array($alternative_database, $trigger_module, $object_id) {

		global $beanList, $beanFiles, $current_user;

		$bean_variable_array = Array();

		if ($alternative_database == '-1') {
			// Retrieve bean
			$class_name = $beanList[$trigger_module];
			require_once($beanFiles[$class_name]);
			$bean = new $class_name();
		wfm_utils::wfm_log('asol', 'ANTES 4', __FILE__, __METHOD__, __LINE__);
			$bean->retrieve($object_id);
		wfm_utils::wfm_log('asol', 'DESPUES 4', __FILE__, __METHOD__, __LINE__);
			$bean->fixUpFormatting(); // datetimes from user format to DB format
			//$bean = BeanFactory::getBean($trigger_module, $object_id);
			//wfm_utils::wfm_log('debug', '$bean=['.print_r($bean, true).']', __FILE__, __METHOD__, __LINE__);

			// Build array
			foreach ($bean->field_defs as $key => $value) {
				if ($bean->field_defs[$key]['source'] != 'non-db') {
					$bean_variable_array[$key] = $bean->$key;
				}
			}
		} else {
			//********************************************//
			//*****Managing External Database Queries*****//
			//********************************************//
			$alternativeDb = ($alternative_database >= 0) ? $alternative_database : false;
			$externalDataBaseQueryParams = wfm_reports_utils::wfm_manageExternalDatabaseQueries($alternativeDb, $trigger_module);

			$useAlternativeDbConnection = $externalDataBaseQueryParams["useAlternativeDbConnection"];
			$trigger_module_table = $externalDataBaseQueryParams["report_table"];

			$rs = Basic_wfm::getSelectionResults("SHOW COLUMNS FROM ".$trigger_module_table, false, $alternativeDb);

			foreach($rs as $value){

				$fieldConstraint = $value['Key'];//PRI  MUL

				if ($fieldConstraint == 'PRI') {
					$field_ID_name = $value['Field'];
				}
			}

			$sql = "SELECT * FROM {$trigger_module_table} WHERE {$field_ID_name} = '{$object_id}'";
			$object_row = Basic_wfm::getSelectionResults($sql, false, $alternativeDb);
			$bean_variable_array = $object_row[0];
		}

		return $bean_variable_array;
	}

	/**
	 * D20130618T1733
	 * Get bean field_defs non-db array
	 * @param $trigger_module
	 */
	static function wfm_get_bean_fieldDefs_array($trigger_module) {

		global $beanList, $beanFiles;

		// Retrieve bean
		$class_name = $beanList[$trigger_module];
		require_once($beanFiles[$class_name]);
		$bean = new $class_name();

		// Build array
		$field_defs = Array();
		foreach ($bean->field_defs as $key => $value) {
			if ($bean->field_defs[$key]['source'] != 'non-db') {
				$field_defs[] = $key;
			}
		}

		return $field_defs;
	}

	/**
	 * D20130607T1818
	 * Build array with field_defs non-db from the bean (passed by reference in the logic_hook)
	 * @param $bean
	 */
	static function wfm_get_bean_variable_array_from_bean_field_defs_non_db($bean) {

		global $current_user;

		wfm_utils::wfm_log('debug', '$current_user->id=['.var_export($current_user->id, true).']', __FILE__, __METHOD__, __LINE__);

		// Build array
		$bean_variable_array = Array();
		foreach ($bean->field_defs as $key => $value) {
			if ($bean->field_defs[$key]['source'] != 'non-db') {
				$bean_variable_array[$key] = $bean->$key;
			}
		}

		return $bean_variable_array;
	}

	/**
	 * D20130607T1818
	 * Convert curl-parameter to array
	 * 1) replace &quot; ,(not urldecode) 2) unserialize
	 * @param $curl_parameter
	 */
	static function wfm_convert_curl_parameter_to_array($curl_parameter) {

		//wfm_utils::wfm_log('debug', "\$curl_parameter=[".$curl_parameter."]", __FILE__, __METHOD__, __LINE__);
		$html_entity_decoded__array = str_replace("&quot;", '"', $curl_parameter);
		//wfm_utils::wfm_log('debug', "\$html_entity_decoded__array=[".$html_entity_decoded__array."]", __FILE__, __METHOD__, __LINE__);
		$unserialized__html_entity_decoded__array = unserialize($html_entity_decoded__array);
		//wfm_utils::wfm_log('debug', "\$unserialized__html_entity_decoded__array=[".print_r($unserialized__html_entity_decoded__array,true)."]", __FILE__, __METHOD__, __LINE__);
		$array = $unserialized__html_entity_decoded__array;
		//+++++++++++wfm_utils::wfm_log('debug', "\$array=[".print_r($array,true)."]", __FILE__, __METHOD__, __LINE__);

		// BEGIN - Debug array
		/*
		 $urldecoded_array =  urldecode($html_entity_decoded); // urldecode not necessary
		 $urldecoded_array =  urldecode($curl_parameter);
		 wfm_utils::wfm_log('debug', "\$urldecoded_array=[".$urldecoded_array."]", __FILE__, __METHOD__, __LINE__);
		 $urldecoded__html_entity_decoded__array = urldecode($html_entity_decoded__array);
		 wfm_utils::wfm_log('debug', "\$urldecoded__html_entity_decoded__array=[".$urldecoded__html_entity_decoded__array."]", __FILE__, __METHOD__, __LINE__);
		 $unserialized__urldecoded_array = unserialize($urldecoded_array);
		 wfm_utils::wfm_log('debug', "\$unserialized__urldecoded_array=[".print_r($unserialized__urldecoded_array,true)."]", __FILE__, __METHOD__, __LINE__);
		 $unserialized__urldecoded__html_entity_decoded__array = unserialize($urldecoded__html_entity_decoded__array);
		 wfm_utils::wfm_log('debug', "\$unserialized__urldecoded__html_entity_decoded__array=[".print_r($unserialized__urldecoded__html_entity_decoded__array,true)."]", __FILE__, __METHOD__, __LINE__);
		 */
		// END - Debug old_bean

		// BEGIN - Debug to disk-file
		/*$file_content = "workFlowManagerEngine.php*************** \n\n";
		 $file_content.= "\$curl_parameter=[".$curl_parameter]."] \n\n";
		 $file_content.= "\$html_entity_decoded__old_bean=[".$html_entity_decoded__array."] \n\n";
		 $file_content.= "\$unserialized__html_entity_decoded__array=[".print_r($unserialized__html_entity_decoded__array,true)."] \n\n";

		 $file = fopen("test_after_curl.txt", "a+");
		 fwrite($file, $file_content);
		 fclose($file);*/
		// END - Debug to disk-file

		return $array;
	}

	/**
	 * D20130607T1818
	 * Get trigger_module from event_id
	 * @param $event_id
	 */
	static function getTriggerModule_fromEventId($event_id) {

		global $db;

		$process_query = $db->query("
									SELECT asol_process.trigger_module as trigger_module
									FROM asol_proces_asol_events_c
									INNER JOIN asol_process ON (asol_process.id = asol_proces_asol_events_c.asol_proce6f14process_ida AND asol_process.deleted = 0)
									WHERE asol_proces_asol_events_c.asol_procea8ca_events_idb = '{$event_id}' AND asol_proces_asol_events_c.deleted = 0							  
							  	");
		$process_row = $db->fetchByAssoc($process_query);

		return $process_row['trigger_module'];
	}

	/**
	 * D20130607T1818
	 * Get trigger_module from process_id
	 * @param $process_id
	 */
	static function getTriggerModule_fromProcessId($process_id) {

		global $db;

		$process_query = $db->query("
									SELECT trigger_module
									FROM asol_process
									WHERE id = '{$process_id}' AND asol_process.deleted = 0							  
							  	");
		$process_row = $db->fetchByAssoc($process_query);

		return $process_row['trigger_module'];
	}

	static function getAlternativeDatabase_fromProcessId($process_id) {

		global $db;

		$process_query = $db->query("
									SELECT alternative_database
									FROM asol_process
									WHERE id = '{$process_id}' AND asol_process.deleted = 0							  
							  	");
		$process_row = $db->fetchByAssoc($process_query);

		return $process_row['alternative_database'];
	}

	/**
	 * D20130607T1818
	 * Get scheduled_type from event_id
	 * @param $event_id
	 */
	static function getScheduledType_fromEventId($event_id) {

		global $db;

		$event_query = $db->query("
									SELECT scheduled_type
									FROM asol_events
									WHERE id = '{$event_id}' AND asol_events.deleted = 0							  
							  	");
		$event_row = $db->fetchByAssoc($event_query);

		return $event_row['scheduled_type'];
	}

	static function wfm_SavePhpCustomToFile($id, $task_implementation) {

		$phpCode = str_replace(array("\n", "\r"), array('\n', '\r'), $task_implementation); // needed for line-feeds and carriage-return
		$task_implementation = $phpCode;

		$script = $task_implementation;
		$script_to_disk_file = rawurldecode($script);//rawurldecode() does not decode plus symbols ('+') into spaces. urldecode() does.

		$myFile = "{$id}.php";
		$fh = fopen("modules/asol_Task/_temp_php_custom_Files/{$myFile}", 'w') or die("can't open file");
		$stringData = $script_to_disk_file;
		fwrite($fh, $stringData);
		fclose($fh);
	}

	/**
	 * D20130607T1818
	 * Swap scheduled_tasks from DB-format to user-format
	 * @param $scheduled_tasks
	 */
	static function wfm_prepareTasks_fromDB_toSugar($scheduled_tasks) {

		global $timedate;

		if (strpos($scheduled_tasks, '${GMT}') !== false) {
			$scheduled_tasks = substr($scheduled_tasks, 0, -6);
		}

		$tasks = explode("|", $scheduled_tasks);

		if (($tasks[0] == "") || ($tasks[0] == '${GMT}')) {
			$tasks = Array();
		}

		if (!isset($_REQUEST['scheduled_tasks_hidden'])) {// This avoid adding offset each time the show-related-button is clicked(submit)
			foreach ($tasks as $key => $task){
				$taskValues = explode(":", $task);

				$time1 = explode(",", $taskValues[3]);
				$auxDateTime = $timedate->handle_offset(date("Y")."-".date("m")."-".date("d")." ".$time1[0].":".$time1[1], $timedate->get_db_date_time_format());

				$auxDateTimeArray = explode(" ", $auxDateTime);
				$taskValues[3] = implode(",", explode(":", $auxDateTimeArray[1]));

				if((!$timedate->check_matching_format($taskValues[4], $timedate->get_date_format())) && ($taskValues[4]!="")) {
					$taskValues[4] = $timedate->swap_formats($taskValues[4], $GLOBALS['timedate']->dbDayFormat, $timedate->get_date_format() );
				}

				$tasks[$key] = implode(":", $taskValues);
			}
		}

		$tasks_string = implode("|", $tasks);

		return $tasks_string;
	}

	/**
	 * D20130607T1818
	 * Swap scheduled_tasks from user-format to DB-format
	 * @param $scheduled_tasks
	 */
	static function wfm_prepareTasks_fromSugar_toDB($scheduled_tasks) {

		global $timedate, $current_user;

		$tasks = ($scheduled_tasks == '${GMT}') ? array() : explode("|", $scheduled_tasks);

		foreach($tasks as $key => $task) {
			$values = explode(":", $task);
			if ((!$timedate->check_matching_format($values[4], $GLOBALS['timedate']->dbDayFormat)) && ($values[4]!="")) {
				$values[4] = $timedate->swap_formats($values[4], $timedate->get_date_format(), $GLOBALS['timedate']->dbDayFormat );
			}

			$userTZ = $current_user->getPreference("timezone");

			$phpDateTime = new DateTime(null, new DateTimeZone($userTZ));
			$hourOffset = $phpDateTime->getOffset()*-1;

			$time1 = explode(",", $values[3]);
			$values[3] = date("H,i", @mktime($time1[0],$time1[1],0,date("m"),date("d"),date("Y"))+$hourOffset);

			$tasks[$key] = implode(":", $values);
		}
		$scheduled_tasks = (empty($tasks)) ? '${GMT}' : implode("|", $tasks);

		return $scheduled_tasks;
	}

	/**
	 * D20130607T1818
	 * Swap conditions from DB-format to user-format
	 * @param $conditions
	 */
	static function wfm_prepareConditions_fromDB_toSugar($conditions) {

		global $timedate;

		// Swap datetime-format (from database-format to sugar-format)

		$filterValues = explode('${pipe}', $conditions);

		foreach ($filterValues as $key => $value) {
			$values = explode('${dp}', $value);
			if ((($values[6] == "date") || ($values[6] == "datetime") || ($values[6] == "timestamp")) && (($values[3] != "last") && ($values[3] != "this") && ($values[3] != "next") && ($values[3] != "not last") && ($values[3] != "not this") && ($values[3] != "not next"))) {
				if ((!$timedate->check_matching_format($values[4], $timedate->get_date_format())) && ($values[4]!="")) {
					$values[4] = $timedate->swap_formats($values[4],$GLOBALS['timedate']->dbDayFormat , $timedate->get_date_format() );
				}
				if ((!$timedate->check_matching_format($values[5], $timedate->get_date_format())) && ($values[5]!="")) {
					$values[5] = $timedate->swap_formats($values[5], $GLOBALS['timedate']->dbDayFormat , $timedate->get_date_format() );
				}
			}
			$filterValues[$key] = implode('${dp}', $values);
		}

		$conditions = implode('${pipe}', $filterValues);

		return $conditions;
	}

	/**
	 * D20130607T1818
	 * Swap conditions from user-format to DB-format
	 * @param $conditions
	 */
	static function wfm_prepareConditions_fromSugar_toDB($conditions) {

		global $timedate;

		// Swap datetime-format (from sugar-format to database-format)

		$filterValues = explode('${pipe}', $conditions);

		foreach ($filterValues as $key1 => $value){
			$values = explode('${dp}', $value);
			if ((($values[6] == "date") || ($values[6] == "datetime") || ($values[6] == "timestamp")) && (($values[3] != "last") && ($values[3] != "this") && ($values[3] != "next") && ($values[3] != "not last") && ($values[3] != "not this") && ($values[3] != "not next"))){
				if((!$timedate->check_matching_format($values[4], $GLOBALS['timedate']->dbDayFormat)) && ($values[4]!="")) {
					$values[4] = $timedate->swap_formats($values[4], $timedate->get_date_format(), $GLOBALS['timedate']->dbDayFormat );
				}
				if((!$timedate->check_matching_format($values[5], $GLOBALS['timedate']->dbDayFormat)) && ($values[5]!="")) {
					$values[5] = $timedate->swap_formats($values[5], $timedate->get_date_format(), $GLOBALS['timedate']->dbDayFormat );
				}
			}
			$filterValues[$key1] = implode('${dp}', $values);
		}
		$conditions = implode('${pipe}', $filterValues);

		return $conditions;
	}

	static function getRealIP()
	{

		if( $_SERVER['HTTP_X_FORWARDED_FOR'] != '' )
		{
			$client_ip =
			( !empty($_SERVER['REMOTE_ADDR']) ) ?
			$_SERVER['REMOTE_ADDR']
			:
			( ( !empty($_ENV['REMOTE_ADDR']) ) ?
			$_ENV['REMOTE_ADDR']
			:
               "unknown" );

			// los proxys van añadiendo al final de esta cabecera
			// las direcciones ip que van "ocultando". Para localizar la ip real
			// del usuario se comienza a mirar por el principio hasta encontrar
			// una dirección ip que no sea del rango privado. En caso de no
			// encontrarse ninguna se toma como valor el REMOTE_ADDR

			$entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

			reset($entries);
			while (list(, $entry) = each($entries))
			{
				$entry = trim($entry);
				if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
				{
					// http://www.faqs.org/rfcs/rfc1918.html
					$private_ip = array(
                  '/^0\./', 
                  '/^127\.0\.0\.1/', 
                  '/^192\.168\..*/', 
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
                  '/^10\..*/');

					$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

					if ($client_ip != $found_ip)
					{
						$client_ip = $found_ip;
						break;
					}
				}
			}
		}
		else
		{
			$client_ip =
			( !empty($_SERVER['REMOTE_ADDR']) ) ?
			$_SERVER['REMOTE_ADDR']
			:
			( ( !empty($_ENV['REMOTE_ADDR']) ) ?
			$_ENV['REMOTE_ADDR']
			:
               "unknown" );
		}

		return $client_ip;

	}

	/**
	 * D20130607T1818
	 * Is AlineasolCommonBase installed
	 */
	static function wfm_isCommonBaseInstalled() {

		global $db;

		// Is CommonBase Installed
		$CommonBaseQuery = $db->query("SELECT DISTINCT count(id_name) as count FROM upgrade_history WHERE id_name='AlineaSolCommonBase' AND status='installed'");
		$CommonBaseRow = $db->fetchByAssoc($CommonBaseQuery);
		$isCommonBaseInstalled = ($CommonBaseRow['count'] > 0);

		return $isCommonBaseInstalled;
	}
}

?>