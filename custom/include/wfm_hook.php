<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

require_once("include/SugarEmailAddress/SugarEmailAddress.php");

class wfm_hook_process {

	function execute_process(&$bean, $event, $arguments='login_failed') {
		wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);
				
		global $sugar_config;
		
		// Disable wfm_hook if needed
		$WFM_disable_wfm_completely = ((isset($sugar_config['WFM_disable_wfm_completely'])) && ($sugar_config['WFM_disable_wfm_completely'])) ? true : false;
		$WFM_disable_wfmHook = ((isset($sugar_config['WFM_disable_wfmHook'])) && ($sugar_config['WFM_disable_wfmHook'])) ? true : false;
		
		if ($WFM_disable_wfm_completely || $WFM_disable_wfmHook) {
			wfm_utils::wfm_log('asol', "EXIT by sugar_config WFM_disable", __FILE__, __METHOD__, __LINE__);
			return;
		}
		
		wfm_utils::wfm_log('asol', "\$bean->module_dir=[{$bean->module_dir}], \$bean->name=[{$bean->name}], \$bean->id=[{$bean->id}], \$event=[{$event}]", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('debug', '$_REQUEST=['.var_export($_REQUEST, true).']', __FILE__, __METHOD__, __LINE__);
		//wfm_utils::wfm_log('debug', '$bean=['.print_r($bean, true).']', __FILE__, __METHOD__, __LINE__);

		wfm_utils::wfm_log('asol', '***********LOGIC_HOOK**************', __FILE__, __METHOD__, __LINE__);

		global $current_user, $sugar_config, $db;

		$trigger_module = (!empty($bean->module_dir)) ? $bean->module_dir : $_REQUEST['module'];
		$trigger_event = "";
		$bean_id = $bean->id;

		if (isset($bean->emailAddress)) { // Not all modules have emailAddresses
			// Get old emails from this module (get them from DB)
			$emailAddressObject = new SugarEmailAddress();
			$old_emails = $emailAddressObject->getAddressesByGUID($bean_id, $trigger_module);
			//wfm_utils::wfm_log('debug', "wfm_hook \$old_emails=[".print_r($old_emails,true)."]", __FILE__, __METHOD__, __LINE__);
			$old_emails_string = "";
			foreach($old_emails as $key => $value) {
				$old_emails_string .= $old_emails[$key]['email_address'] . ',';
			}
			$old_emails_string = substr($old_emails_string, 0, -1);

			// Get new emails from this module (get them from $bean)
			$new_emails = $bean->emailAddress->addresses;
			//wfm_utils::wfm_log('debug', "\$new_emails=[".print_r($new_emails,true)."]", __FILE__, __METHOD__, __LINE__);
			$new_emails_string = "";
			foreach($new_emails as $key => $value) {
				$new_emails_string .= $new_emails[$key]['email_address'] . ',';
			}
			$new_emails_string = substr($new_emails_string, 0, -1);
		}

		// Sugar strangely doesn't populate event on login_failed
		if (empty($event)) {
			$event = 'login_failed';
		}

		// Bifurcate event
		switch ($event) {

			case 'before_save':

				if (!empty($bean->fetched_row)) {
					$trigger_event = "on_modify__before_save";

					// old_bean
					$old_bean = (empty($bean->fetched_row)) ? Array() : $bean->fetched_row; // email1 is within $bean->fetched_row
					$old_bean['asol_email_list'] = $old_emails_string;
				} else {
					$trigger_event = "on_create__before_save";

					// old_bean
					$old_bean = Array();
				}

				// new_bean
				$new_bean = wfm_utils::wfm_get_bean_variable_array_from_bean_field_defs_non_db($bean);
				$new_bean['email1'] = $bean->email1;
				$new_bean['asol_email_list'] = $new_emails_string;
				
				//OPENSYMBOLMOD paolo.santacatterina (12/mar/2014  14:24:35)
				if(!empty($old_bean)){
					$new_bean['date_entered'] = $old_bean['date_entered']; // date_entered is null within $bean
				}

				// CAC disabled fields => bean->field=NULL
				foreach ($new_bean as $key_field => $value_field) {
					//OPENSYMBOLMOD paolo.santacatterina (12/mar/2014  14:24:43)
					if(!empty($old_bean) && isset($bean->$key_field)){
						if ((!isset($_REQUEST[$key_field])) && ($bean->$key_field === null)) {// disabled field, empty field(not disabled), date_modified(not in $_REQUEST but in $bean)
							$new_bean[$key_field] = $old_bean[$key_field];
						}
					}
				}

				// Save within php-session the arrays for passing them from before-save to after-save logic_hook-execution
				$_SESSION['old_bean'] = $old_bean;
				$_SESSION['new_bean'] = $new_bean;

				break;

			case 'after_save':

				if (!empty($bean->fetched_row)) {

					$trigger_event = "on_modify";

					// Get from  php-session the bean-arrays
					if (isset($_SESSION['old_bean'])) {
						$old_bean = $_SESSION['old_bean'];
						unset($_SESSION['old_bean']);
					}
					if (isset($_SESSION['new_bean'])) {
						$new_bean = $_SESSION['new_bean'];
						unset($_SESSION['new_bean']);
					}
				} else {

					$trigger_event = "on_create";

					$old_bean = Array();

					if (isset($_SESSION['new_bean'])) {
						$new_bean = $_SESSION['new_bean'];
						unset($_SESSION['new_bean']);
					}
				}

				break;
					
			case 'before_delete':

				$trigger_event = "on_delete";
					
				$old_bean = (empty($bean->fetched_row)) ? Array() : $bean->fetched_row;// email1 is in $bean->fetched_row
				$old_bean['asol_email_list'] = $old_emails_string;

				$new_bean = Array();
					
				break;

			case 'after_delete':
				// Do nothing
				break;

			case 'login_failed':
			case 'after_login':
			case 'before_logout':
				$trigger_event = $event;
				break;
		}

		// Get fields from database
		if (isset($sugar_config['WFM_get_fields_from_db'][$bean->table_name])) {
			foreach ($sugar_config['WFM_get_fields_from_db'][$bean->table_name] as $field) {
				$field_query = $db->query("SELECT {$field} FROM {$bean->table_name} WHERE id='{$bean->id}'");
				$field_row = $db->fetchByAssoc($field_query);
				$new_bean[$field] = $field_row[$field];
				$old_bean[$field] = $new_bean[$field];
			}
		}

		// Only for CAC // login_failed -> user does not have domain, because there is actually no user
		if (isset($sugar_config['WFM_asolDefaultDomain_whenEmptyDomain'])) {
			if (empty($new_bean['asol_default_domain'])) {
				$new_bean['asol_default_domain'] = $sugar_config['WFM_asolDefaultDomain_whenEmptyDomain'];
			}
		}

		// Debug
		wfm_utils::wfm_log('asol', "\$trigger_event=[{$trigger_event}]", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('debug', '$old_bean=['.var_export($old_bean, true).']', __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('debug', '$new_bean=['.var_export($new_bean, true).']', __FILE__, __METHOD__, __LINE__);

		// Avoid infinite-loops
		$MAX_loops = (isset($sugar_config['MAX_loops'])) ? $sugar_config['MAX_loops'] : 10;
		$bean_ungreedy_count = (empty($bean->ungreedy_count)) ? 0 : $bean->ungreedy_count;
		wfm_utils::wfm_log('debug', '$bean_ungreedy_count=['.var_export($bean_ungreedy_count, true).']', __FILE__, __METHOD__, __LINE__);

		if (($MAX_loops != 'unlimited') && ($bean_ungreedy_count >= $MAX_loops)) { // To avoid that the code crash when the user defines a process that performs an action that triggers its execution (trigger=on_modify, task_type=modify_object; trigger=on_create, task_type=create_object with objectModule=trigger_module).
			wfm_utils::wfm_log('fatal', '$MAX_loops reached!', __FILE__, __METHOD__, __LINE__);
			return;
		}

		// Calculate current_user_array
		if (!empty($current_user->id)) {
			$userRoles_array = ACLRole::getUserRoles($current_user->id);

			$userRoles = implode(',', $userRoles_array);
			$isAdmin = $current_user->is_admin;
		} else {
			$userRoles = '-';
			$isAdmin = '-';
		}

		//OPENSYMBOLMOD paolo.santacatterina (12/mar/2014  14:40:14)
		$asol_default_domain_user = '';
		if(isset($current_user->asol_default_domain))
			$asol_default_domain_user = $current_user->asol_default_domain;
		//************************************************************
		$current_user_array = array(
										'id' => $current_user->id,
										'is_admin' => $isAdmin,
										'roles' => $userRoles,
										'asol_default_domain' => $asol_default_domain_user
		);

		// urlencode_serialized bean_variable_arrays and custom_variables
		$urlencode_serialized_old_bean = wfm_utils::wfm_convert_array_to_curl_parameter($old_bean);
		$urlencode_serialized_new_bean = wfm_utils::wfm_convert_array_to_curl_parameter($new_bean);
		$aux_server = $_SERVER;
		$aux_server['client_ip'] = wfm_utils::getRealIP();
		$server = wfm_utils::wfm_convert_array_to_curl_parameter($aux_server);
		$request = wfm_utils::wfm_convert_array_to_curl_parameter($_REQUEST);
		$urlencode_serialized_current_user_array = wfm_utils::wfm_convert_array_to_curl_parameter($current_user_array);
		$env = wfm_utils::wfm_convert_array_to_curl_parameter($_ENV);

		$current_user_id = (!empty($current_user->id)) ? $current_user->id : $bean->modified_user_id;
		$current_user_id = (!empty($current_user_id)) ? $current_user_id : '1'; // login_failed. WFM always need a user_id in order to get datetimes

		//**********cURL***********//
		// To fork execution and web-user-control (we don´t want to make the user wait)
		wfm_utils::wfm_log('debug', "********** cURL=[fork execution and web-user-control] **********", __FILE__, __METHOD__, __LINE__);

		$query_string = "entryPoint=wfm_engine&execution_type=logic_hook&trigger_module={$trigger_module}&trigger_event={$trigger_event}&bean_id={$bean_id}&current_user_id={$current_user_id}&bean_ungreedy_count={$bean_ungreedy_count}&old_bean={$urlencode_serialized_old_bean}&new_bean={$urlencode_serialized_new_bean}&server={$server}&request={$request}&current_user_array={$urlencode_serialized_current_user_array}&env={$env}";
		wfm_utils::wfm_curl('post', null, $query_string, false, 1);
		//**********cURL***********//

		wfm_utils::wfm_log('asol', "\$bean->module_dir=[{$bean->module_dir}], \$bean->name=[{$bean->name}], \$bean->id=[{$bean->id}], \$event=[{$event}]", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('asol', "EXIT", __FILE__, __METHOD__, __LINE__);
	}
}

?>