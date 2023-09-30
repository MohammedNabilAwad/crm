<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("include/SugarEmailAddress/SugarEmailAddress.php");

class wfm_hook_process {

	function execute_process(&$bean, $event, $arguments) {
		
		//$GLOBALS['log']->debug("*********************** ASOL: wfm_hook \$bean=[".print_r($bean,true)."]");

		global $current_user, $sugar_config, $db;

		$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;
		
		if ($asolLogLevelEnabled) {
			$GLOBALS['log']->asol("**********[ASOL][WFM]: ENTRY class wfm_hook_process function execute_process \$bean->module_dir=[".$bean->module_dir."] \$bean->name=[".$bean->name."] \$bean->id=[".$bean->id."] \$event=[".$event."]****************");
		} else {
			$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY class wfm_hook_process function execute_process \$bean->module_dir=[".$bean->module_dir."] \$bean->name=[".$bean->name."] \$bean->id=[".$bean->id."] \$event=[".$event."]****************");
		}
		
		$wfm_module = $bean->module_dir;
		$wfm_action = "";
		$wfm_bean_id = $bean->id;

		if ($event == "after_delete") {
						
		} elseif ($event == "before_delete") {
			//$GLOBALS['log']->debug("*********************** ASOL: on_delete");
			$wfm_action = "on_delete";
			
			$bean_fetched_row = Array();
			foreach ($bean->field_defs as $key => $value) {
				if ($bean->field_defs[$key]['source'] != 'non-db') {
					$bean_fetched_row[$key] = $bean->$key;
				}
			}
			$new_bean = $bean_fetched_row; // (forced by programmer)
		
		} elseif ($event == "after_save") {
			
			if (!empty($bean->fetched_row)) {
				//$GLOBALS['log']->debug("*********************** ASOL: on_modify");
				$wfm_action = "on_modify";
				
				// Get from  php-session the bean-arrays
				if (isset($_SESSION['bean_fetched_row'])) {
					$bean_fetched_row = $_SESSION['bean_fetched_row'];
					unset($_SESSION['bean_fetched_row']);
				}
				if (isset($_SESSION['bean_by_reference'])) {
					$bean_by_reference = $_SESSION['bean_by_reference'];
					unset($_SESSION['bean_by_reference']);
				}
				if (isset($_SESSION['new_bean'])) {
					$new_bean = $_SESSION['new_bean'];
					unset($_SESSION['new_bean']);
				}
			} else {
				//$GLOBALS['log']->debug("*********************** ASOL: on_create");
				$wfm_action = "on_create";
				
				//$GLOBALS['log']->debug("*********************** ASOL: wfm_hook \$bean->field_defs=[".print_r($bean->field_defs,true)."]");
				$new_bean = Array();
				foreach ($bean->field_defs as $key => $value) {
					if ($bean->field_defs[$key]['source'] != 'non-db') {
						$new_bean[$key] = $bean->$key;
					}
				}
				
				////////fixbug para tener en on_create los emails
				if (isset($_SESSION['new_bean'])) {
					$new_bean_aux = $_SESSION['new_bean'];
					unset($_SESSION['new_bean']);
					
					$new_bean['asol_email_list'] = $new_bean_aux['asol_email_list'];
				}
				
				if (isset($bean->email1)) {
					$new_bean['email1'] = $bean->email1;
				}
				////////
				
				$bean_fetched_row = $new_bean; // $bean->fetched_row is equals to blank when on_create (forced by programmer)
			}
		} elseif ($event == "before_save") {
			if (!empty($bean->fetched_row)) {
				//$GLOBALS['log']->debug("*********************** ASOL: on_modify__before_save");
				$wfm_action = "on_modify__before_save";
			} else {
				//$GLOBALS['log']->debug("*********************** ASOL: on_create__before_save");
				$wfm_action = "on_create__before_save";
			}

			$bean_fetched_row = (empty($bean->fetched_row)) ? Array() : $bean->fetched_row;
			
			// Get old emails from this module
			$emailAddressObject = new SugarEmailAddress();
			$old_emails = $emailAddressObject->getAddressesByGUID($wfm_bean_id, $wfm_module); 
			//$GLOBALS['log']->debug("*********************** ASOL: wfm_hook \$old_emails=[".print_r($old_emails,true)."]");
			$old_emails_string = "";
			foreach($old_emails as $key => $value) {
				$old_emails_string .= $old_emails[$key]['email_address'] . ',';
			}
			$old_emails_string = substr($old_emails_string, 0, -1);
			
			$bean_fetched_row['asol_email_list'] = $old_emails_string;
			
			// Get new emails from this module
			$new_emails = $bean->emailAddress->addresses;
			//$GLOBALS['log']->debug("*********************** ASOL: wfm_hook \$new_emails=[".print_r($new_emails,true)."]");
			$new_emails_string = "";
			foreach($new_emails as $key => $value) {
				$new_emails_string .= $new_emails[$key]['email_address'] . ',';
			}
			$new_emails_string = substr($new_emails_string, 0, -1);
			
			// Save within php-session the arrays for passing them from before-save to after-save logic_hook-execution
			$_SESSION['bean_fetched_row'] = $bean_fetched_row;

			$bean_by_reference = Array();
			$new_bean = Array();
			foreach ($bean_fetched_row as $key => $value_fetched_row) {
					
				$bean_by_reference[$key] = $bean->$key;
					
				$value_to_evaluate = $bean->$key; // $bean->$key vs $_REQUEST[$key] // $bean->$key is the right one
				//$GLOBALS['log']->debug("*********************ASOL: \$key=[$key] => \$value_to_evaluate=[$value_to_evaluate]");
					
				if (isset($value_to_evaluate)) { // field NOT disabled -> get data from Form
					//$GLOBALS['log']->debug("*********************ASOL: isset");
					if (empty($value_to_evaluate)) {
						//$GLOBALS['log']->debug("*********************ASOL: empty");
						$new_bean[$key] = $value_to_evaluate;
					} else {
						//$GLOBALS['log']->debug("*********************ASOL: NOT empty");
						$new_bean[$key] = $value_to_evaluate;
					}
				} else { // field disabled -> get data from DB
					//$GLOBALS['log']->debug("*********************ASOL: NOT isset");
					if (empty($value_to_evaluate)) {
						//$GLOBALS['log']->debug("*********************ASOL: empty");
						$new_bean[$key] = $value_fetched_row;
					} else {// never gets into here
						//$GLOBALS['log']->debug("*********************ASOL: NOT empty");
						$new_bean[$key] = $value_fetched_row;
					}
				}
			}
			
			// Save within php-session the arrays for passing them from before-save to after-save logic_hook-execution
			$_SESSION['bean_by_reference'] = $bean_by_reference;
			
			$new_bean['asol_email_list'] = $new_emails_string;
			$_SESSION['new_bean'] = $new_bean;
		}
		
		///////Get fields from database
		if (isset($sugar_config['WFM_get_fields_from_db'][$bean->table_name])) {
			foreach ($sugar_config['WFM_get_fields_from_db'][$bean->table_name] as $field) {
				$field_query = $db->query("SELECT {$field} FROM {$bean->table_name} WHERE id='{$bean->id}'");
               	$field_row = $db->fetchByAssoc($field_query);
               	$new_bean[$field] = $field_row[$field];
                $bean_fetched_row[$field] = $new_bean[$field]; 
			}
		}
		//////////
		

		if ($asolLogLevelEnabled) {
			$GLOBALS['log']->asol("**********[ASOL][WFM]: \$wfm_action=[".$wfm_action."]***********LOGIC_HOOK**************");
		} else {
			$GLOBALS['log']->debug("**********[ASOL][WFM]: \$wfm_action=[".$wfm_action."]**********LOGIC_HOOK******************");
		}
		
		// Debug
		$GLOBALS['log']->debug("**********[ASOL][WFM]: wfm_hook_process \$_REQUEST=[".print_r($_REQUEST,true)."]");
		$GLOBALS['log']->debug("**********[ASOL][WFM]: wfm_hook_process \$bean_fetched_row=[".print_r($bean_fetched_row,true)."]");
		//$GLOBALS['log']->debug("*************************ASOL: wfm_hook_process \$bean_by_reference=[".print_r($bean_by_reference,true)."]");
		$GLOBALS['log']->debug("**********[ASOL][WFM]: wfm_hook_process \$new_bean=[".print_r($new_bean,true)."]");
		
		// Avoid infinite-loops
		$GLOBALS['log']->debug("**********[ASOL][WFM]: wfm_hook \$bean->ungreedy_count=[".var_export($bean->ungreedy_count,true)."]");
		$MAX_loop = 5;////////////!!!!!!!!!! comparacion de integer con string ????
		$bean__ungreedy_count = (empty($bean->ungreedy_count)) ? 0 : $bean->ungreedy_count;
		if ($bean__ungreedy_count < $MAX_loop) { // To avoid that the code crash when the user defines a process that performs an action that triggers its execution (trigger=on_modify, task_type=modify_object; trigger=on_create, task_type=create_object with objectModule=trigger_module).
		
			// bean_fetched_row
			$bean_fetched_row = str_replace("&quot;", "&#34;", $bean_fetched_row); // To avoid problems with sugarcrm-decoding
			$serialized_bean_fetched_row = serialize($bean_fetched_row);
			//$GLOBALS['log']->debug("*********************** ASOL: class wfm_hook_process function execute_process \$serialized_bean_fetched_row=[".$serialized_bean_fetched_row."]");
			$urlencode_serialized_bean_fetched_row = urlencode($serialized_bean_fetched_row);
			//$GLOBALS['log']->debug("*********************** ASOL: class wfm_hook_process function execute_process \$urlencode_serialized_bean_fetched_row=[".$urlencode_serialized_bean_fetched_row."]");
	
			// new_bean
			$new_bean = str_replace("&quot;", "&#34;", $new_bean); // To avoid problems with sugarcrm-decoding
			$serialized_new_bean = serialize($new_bean);
			//$GLOBALS['log']->debug("*********************** ASOL: class wfm_hook_process function execute_process \$serialized_new_bean=[".$serialized_new_bean."]");
			$urlencode_serialized_new_bean = urlencode($serialized_new_bean);
			//$GLOBALS['log']->debug("*********************** ASOL: class wfm_hook_process function execute_process \$urlencode_serialized_new_bean=[".$urlencode_serialized_new_bean."]");
	
			// To fork execution and web-user-control ( we don´t want to make the user wait )
			$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY cURL REQUEST (class wfm_hook_process function execute_process)****************************************");

			// set URL and other appropriate options
			// Url sintax : scheme://username:password@domain:port/path?query_string#fragment_id
			$site_url = (isset($sugar_config['WFM_site_url'])) ? $sugar_config['WFM_site_url'] : $sugar_config['site_url'];
			$site_url .= '/';
			$submit_url = $site_url."index.php";
			$query_string = "entryPoint=wfm_engine&wfm_module=".$wfm_module."&wfm_action=".$wfm_action."&wfm_bean_id=".$wfm_bean_id."&current_user_id=".$current_user->id."&bean__ungreedy_count=".$bean__ungreedy_count."&bean_fetched_row=".$urlencode_serialized_bean_fetched_row."&new_bean=".$urlencode_serialized_new_bean."&execution_type=logic_hook";
	
			//**********cURL***********//
			
			// cURL by means of POST
			$curl = curl_init();
			
			curl_setopt($curl, CURLOPT_URL, $submit_url); // The URL to fetch. This can also be set when initializing a session with curl_init(). 
 			curl_setopt($curl, CURLOPT_POST, true); // TRUE to do a regular HTTP POST. 
			curl_setopt($curl, CURLOPT_POSTFIELDS, $query_string); // The full data to post in a HTTP "POST" operation.
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // FALSE to stop cURL from verifying the peer's certificate.
			curl_setopt($curl, CURLOPT_TIMEOUT, 1); // The maximum number of seconds to allow cURL functions to execute. 
			curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1); // The number of seconds to wait while trying to connect. Use 0 to wait indefinitely. 
			if (isset($sugar_config['WFM_site_login_username_password'])) { // Basic Authentication (Site Login)
				curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC) ; // The HTTP authentication method(s) to use.
				//curl_setopt($curl, CURLOPT_SSLVERSION, 3); 
				//curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
				//curl_setopt($curl, CURLOPT_HEADER, true); 
				//curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				//curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 
				curl_setopt($curl, CURLOPT_USERPWD, $sugar_config['WFM_site_login_username_password']); // A username and password formatted as "[username]:[password]" to use for the connection.
				$GLOBALS['log']->debug("**********[ASOL][WFM]: cURL -> Basic Authentication (Site Login) =[".$sugar_config['WFM_site_login_username_password']."]");
			}
			
			$GLOBALS['log']->debug("**********[ASOL][WFM]: cURL=[".$site_url."index.php?".$query_string."]");
			curl_exec($curl);
			$GLOBALS['log']->debug("**********[ASOL][WFM]: curl_getinfo=[".print_r(curl_getinfo($ch),true)."]");
			
			if(curl_errno($curl)) {
			    $GLOBALS['log']->debug("**********[ASOL][WFM]: curl_errno=[".print_r(curl_errno($ch),true)."]");
			}
			
 			curl_close($curl);
 			$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT cURL REQUEST (class wfm_hook_process function execute_process)*******************************************");
		}
		
		
		
		if ($asolLogLevelEnabled) {
			$GLOBALS['log']->asol("**********[ASOL][WFM]: EXIT class wfm_hook_process function execute_process \$bean->module_dir=[".$bean->module_dir."] \$bean->name=[".$bean->name."] \$bean->id=[".$bean->id."] \$event=[".$event."]****************");
		} else {
			$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT class wfm_hook_process function execute_process \$bean->module_dir=[".$bean->module_dir."] \$bean->name=[".$bean->name."] \$bean->id=[".$bean->id."] \$event=[".$event."]****************");
		}
	}
}


// cURL by means of GET
/*$ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $site_url."index.php?entryPoint=wfm_engine&wfm_module=".$wfm_module."&wfm_action=".$wfm_action."&wfm_bean_id=".$wfm_bean_id."&current_user_id=".$current_user->id."&bean__ungreedy_count=".$bean__ungreedy_count."&bean_fetched_row=".$urlencode_serialized_bean_fetched_row."&new_bean=".$urlencode_serialized_new_bean."&execution_type=logic_hook");
$GLOBALS['log']->debug("ASOL *****site_url*******cURL=".$site_url."index.php?entryPoint=wfm_engine&wfm_module=".$wfm_module."&wfm_action=".$wfm_action."&wfm_bean_id=".$wfm_bean_id."&current_user_id=".$current_user->id."&bean__ungreedy_count=".$bean__ungreedy_count."&bean_fetched_row=".$urlencode_serialized_bean_fetched_row."&new_bean=".$urlencode_serialized_new_bean."&execution_type=logic_hook****************");

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 1);

curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);*/


// BEGIN - Debug to disk-file ///////////////////////////////////////////////////////////
/*$file_content = "wfm_hook.php*************** \n\n";
$file_content.= "\$bean_fetched_row=[".print_r($bean_fetched_row,true)."] \n\n";
$file_content.= "\$serialized_bean_fetched_row=[".$serialized_bean_fetched_row."] \n\n";
$file_content.= "\$urlencode_serialized_bean_fetched_row=[".$urlencode_serialized_bean_fetched_row."] \n\n";

$file_content.= "\$new_bean=[".print_r($new_bean,true)."] \n\n";
$file_content.= "\$serialized_new_bean=[".$serialized_new_bean."] \n\n";
$file_content.= "\$urlencode_serialized_new_bean=[".$urlencode_serialized_new_bean."] \n\n";

$file = fopen("test_after_curl.txt", "a+");
fwrite($file, $file_content);
fclose($file);*/
// END - Debug to disk-file /////////////////////////////////////////////////////////////

?>