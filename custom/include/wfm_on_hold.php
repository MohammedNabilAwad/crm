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

class wfm_hook_on_hold {

	function wakeup_on_hold(&$bean, $event, $arguments) {
		wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('asol', "\$bean->module_dir=[{$bean->module_dir}], \$bean->name=[{$bean->name}], \$bean->id=[{$bean->id}], \$event=[{$event}]", __FILE__, __METHOD__, __LINE__);
		
		global $db, $sugar_config;

		$object_module = $bean->module_dir; // Calls or Tasks modules
		$bean_id = $bean->id;
		$working_node_id = "";

		$sendCurlRequest = false;

		if (	($event == "after_save")  
											&&  (  (($object_module == "Calls")&&($bean->status == "Held"))  ||  (($object_module == "Tasks")&&($bean->status == "Completed"))  )   
			||	($event == "before_delete") 
		) {  // When clicking on close/delete button of a sugar-call/task

			$on_hold_query = $db->query("
											SELECT asol_workingnodes_id_c 
											FROM asol_onhold 
											WHERE parent_id = '{$bean_id}' AND parent_type = '{$object_module}' 
											LIMIT 1
										  ");
			$on_hold_row = $db->fetchByAssoc($on_hold_query);

			$working_node_id = $on_hold_row['asol_workingnodes_id_c'];

			if (!empty($working_node_id)) {
				
				$date_modified = gmdate('Y-m-d H:i:s');
				
				$db->query("
								UPDATE asol_workingnodes
								SET status = 'in_progress', date_modified = '{$date_modified}'
								WHERE status = 'held' AND id = '{$working_node_id}'
						  ");

				$db->query("
								DELETE FROM asol_onhold
								WHERE asol_workingnodes_id_c = '{$working_node_id}'
						   ");
				/*
				// This code is intended to not wait until 1 minute(crontab) to execute the WFM// Not needed because of the logic_hooks order (first wfm_on_hold, second wfm_hook)
				wfm_utils::wfm_log('debug', "ENTRY cURL REQUEST (class wfm_hook_on_hold function wakeup_on_hold)***************************************", __FILE__, __METHOD__, __LINE__);
				$ch = curl_init();

				// set URL and other appropriate options
				curl_setopt($ch, CURLOPT_URL, "http://127.0.0.1/sugarcrm/index.php?entryPoint=wfm_engine&execution_type=on_hold");
				wfm_utils::wfm_log('debug', "cURL=http://127.0.0.1/sugarcrm/index.php?entryPoint=wfm_engine&execution_type=on_hold********************", __FILE__, __METHOD__, __LINE__);
				curl_setopt($ch, CURLOPT_HEADER, 0);
				curl_setopt($ch, CURLOPT_TIMEOUT, 1);
				// grab URL and pass it to the browser
				curl_exec($ch);

				// close cURL resource, and free up system resources
				curl_close($ch);
				wfm_utils::wfm_log('debug', "EXIT cURL REQUEST (class wfm_hook_on_hold function wakeup_on_hold)*****************************************", __FILE__, __METHOD__, __LINE__);
				*/
			}
		}
		
		wfm_utils::wfm_log('asol', "\$bean->module_dir=[{$bean->module_dir}], \$bean->name=[{$bean->name}], \$bean->id=[{$bean->id}], \$event=[{$event}]", __FILE__, __METHOD__, __LINE__);
		wfm_utils::wfm_log('asol', "EXIT", __FILE__, __METHOD__, __LINE__);
	}
}

?>