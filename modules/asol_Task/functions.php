<?php
//require_once("include/SugarPHPMailer.php");

//global $beanList, $beanFiles, $app_list_strings;

function executeTask($task_id, $task_type, $task_implementation, $bean_module, $bean_id, $process_instance_id, $working_node_id, $bean__ungreedy_count, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $sugar_config;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;

	$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY function executeTask");

	switch ($task_type) {
		case 'send_email':
			$success = task_send_email($task_implementation, $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);
			break;
		case 'create_object':
			$success = task_create_object($task_implementation , $bean_module, $bean_id, $bean__ungreedy_count, $bean_fetched_row, $new_bean, $current_user_id); // if succesful -> return Array('object_id' => $object_id,'object_module' =>$module ) else return false
			break;
		case 'modify_object':
			$success = task_modify_object($bean_id, $task_implementation, $bean__ungreedy_count, $bean_fetched_row, $new_bean, $current_user_id); // if succesful -> return Array('object_id' => $object_id,'object_module' =>$module ) else return false
			break;
		case 'php_custom':
			$success = task_php_custom($task_id/*,$task_implementation*/,$bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);
			break;
		case 'end':
			$success = task_end($task_implementation, $process_instance_id, $working_node_id);
			break;
		case 'call_process':
			$success = task_call_process($task_implementation, $bean_module, $bean_id, $process_instance_id, $bean__ungreedy_count, $bean_fetched_row, $new_bean, $current_user_id);
			break;

	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT function executeTask");

	return $success;
}

function task_send_email($implementationField, $bean_module, $bean_id, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $beanList, $beanFiles, $app_list_strings, $db, $sugar_config;

	//----- (BEGIN) - Log level: asol or debug -----//
	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;
	if ($asolLogLevelEnabled) {
		$GLOBALS['log']->asol("**********[ASOL][WFM]: Inside function task_send_email");
	} else {
		$GLOBALS['log']->debug("**********[ASOL][WFM]: Inside function task_send_email");
	}
	//----- (END) - Log-level: asol or debug -----//

	$fields = explode("\${pipe}", $implementationField);

	// Get EmailTemplate bean
	require_once("modules/EmailTemplates/EmailTemplate.php");
	$templateBean = new EmailTemplate();
	$templateBean->retrieve($fields[0]);

	// Get the body-HTML with the variables translated to their values
	$bodyHtml = replace_wfm_vars('body', html_entity_decode($templateBean->body_html, ENT_COMPAT, "ISO-8859-1"), $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);
	// Get the subject with the variables translated to their values
	$subject = replace_wfm_vars(null, html_entity_decode($templateBean->subject), $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);
	// Get the from with the variables translated to their values
	$from = replace_wfm_vars(null, urldecode($fields[2]), $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);

	// Get SugarPHPMailer bean
	require_once("include/SugarPHPMailer.php");
	$mail = new SugarPHPMailer();
	$mail->setMailerForSystem();
	$mail->From = $from;
	$mail->FromName = $from;
	$mail->Timeout = 30;
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->CharSet = "UTF-8";
	$mail->Body = $bodyHtml;
	$mail->AltBody = $templateBean->body;

	// Attachments
	$attachmentsQuery = $db->query("SELECT * FROM notes WHERE parent_type='Emails' AND parent_id='".$templateBean->id."' AND deleted = 0");
	while($row = $db->fetchByAssoc($attachmentsQuery)) {
		$mail->AddAttachment(getcwd()."/cache/upload/".$row['id'], $row['filename']);
	}

	// Get send_email addresses
	$to_cc_bcc = Array(3 => 'to', 4 => 'cc', 5 => 'bcc');
	foreach($to_cc_bcc as $key_to_cc_bcc => $value_to_cc_bcc) {
		$there_is_address[$value_to_cc_bcc] = false;

		//------ email_list textarea: to,cc,bcc -->(9,10,11)
		$emails = replace_wfm_vars(null, urldecode($fields[$key_to_cc_bcc+6]), $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);

		$emails = explode(',', $emails); // It could be more than one email. Emails have to be separated by commas(with no blanks).
		if (!empty($emails[0])) {
			$there_is_address[$value_to_cc_bcc] = true;
			foreach($emails as $key => $value) {
				switch ($value_to_cc_bcc) {
					case 'to':
						$mail->AddAddress($value);
						break;
					case 'cc':
						$mail->AddCC($value);
						break;
					case 'bcc':
						$mail->AddBCC($value);
				}
			}
		}

		//------ users select: to,cc,bcc -->(3,4,5)
		// Get emails from selected Users in the send email task.
		$users_string = $fields[$key_to_cc_bcc];
		$GLOBALS['log']->debug("**********[ASOL][WFM]: \$users_string=[".print_r($users_string,true)."]");

		$users = explode('${comma}', $users_string);
		if (!empty($users[0])) {

			//$GLOBALS['log']->debug("*********************** ASOL: \$users=[".print_r($users,true)."]");

			// For each user, we get his email by means of the function getUsersNameAndEmail() that is defined in User.php
			require_once('modules/Users/User.php');
			foreach ($users as $key => $value) {

				//$GLOBALS['log']->debug("*********************** ASOL:user [".$value."]");

				$theUser = new User();
				$theUser->retrieve($value);
				$name_and_email__array = $theUser->getUsersNameAndEmail();

				if (!empty($name_and_email__array['email'])) {
					$there_is_address[$value_to_cc_bcc] = true;
				}

				switch ($value_to_cc_bcc) {
					case 'to':
						$mail->AddAddress($name_and_email__array['email']);
						break;
					case 'cc':
						$mail->AddCC($name_and_email__array['email']);
						break;
					case 'bcc':
						$mail->AddBCC($name_and_email__array['email']);
				}
			}
		}

		//------ acl_roles select: to,cc,bcc -->(6,7,8)
		// Get emails from selected Roles in the send email task.
		$acl_roles__string = $fields[$key_to_cc_bcc+3];
		$acl_roles = explode('${comma}', $acl_roles__string);

		$GLOBALS['log']->debug("**********[ASOL][WFM]: \$acl_roles=[".print_r($acl_roles,true)."]");

		// For each role, we get his users(it can be more than one). And once we have the role's users, we get the user's email.
		if (!empty($acl_roles[0])) {
			foreach($acl_roles as $key => $value) {

				//$GLOBALS['log']->debug("*********************** ASOL:asol_role [".$value."]");

				$users_from__acl_role = Array();
				$user_from__acl_role__query = $db->query("
															SELECT user_id
															FROM acl_roles_users
															WHERE role_id = '".$value."'
														");
				while($user_from__acl_role__row = $db->fetchByAssoc($user_from__acl_role__query)) {
					$users_from__acl_role[] = $user_from__acl_role__row['user_id'];
				}

				//$GLOBALS['log']->debug("*********************** ASOL: \$users_from__acl_role=[".print_r($users_from__acl_role,true)."]");

				if (!empty($users_from__acl_role[0])) {
					foreach($users_from__acl_role as $key => $value) {

						//$GLOBALS['log']->debug("*********************** ASOL:user of asol_role [".$value."]");

						$theUser = new User();
						$theUser->retrieve($value);
						$name_and_email__array = $theUser->getUsersNameAndEmail();

						if (!empty($name_and_email__array['email'])) {
							$there_is_address[$value_to_cc_bcc] = true;
						}

						switch ($value_to_cc_bcc) {
							case 'to':
								$mail->AddAddress($name_and_email__array['email']);
								break;
							case 'cc':
								$mail->AddCC($name_and_email__array['email']);
								break;
							case 'bcc':
								$mail->AddBCC($name_and_email__array['email']);
						}
					}
				}
			}
		}
	}

	$there_is_destination_address = ($there_is_address['to'] || $there_is_address['cc'] || $there_is_address['bcc']);

	//sleep(10);
	//$GLOBALS['log']->debug("*********************** ASOL: sleep");
	//$GLOBALS['log']->debug("*********************** ASOL: \$mail=".print_r($mail,true));

	// SEND EMAIL
	if ($there_is_destination_address) {

		$success = $mail->Send();

		$tries=1;
		while (!($success) && ($tries < 5)) {
			sleep(5);
			$success = $mail->Send();
			$tries++;
		}
	}
	else {
		$success = false;
		$GLOBALS['log']->debug("**********[ASOL][WFM]: There is no destination-addresses");
	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: END - Inside function task_send_email");

	return $success;
}


function task_php_custom($task_id/*,$script*/,$bean_module, $bean_id, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	$GLOBALS['log']->debug("**********[ASOL][WFM]: BEGIN - Inside function task_php_custom");
	//$script_to_disk_file = urldecode($script);

	///////////////////////////////////////////////////
	$myFile = $task_id.".php";
	/*$fh = fopen("modules/asol_Task/temp_php_custom_Files/".$myFile, 'w') or die("can't open file");

	$stringData = "<?php ".$script_to_disk_file."?>";
	fwrite($fh, $stringData);

	fclose($fh);// *********************flush????*/
	/////////////////////////////////////////////////

	//sleep(5);
	require_once ("modules/asol_Task/temp_php_custom_Files/{$myFile}");

	$GLOBALS['log']->debug("**********[ASOL][WFM]: END - Inside function task_php_custom");
	return true;
}

function task_end($task_implementation, $process_instance_id, $working_node_id) {

	$GLOBALS['log']->debug("**********[ASOL][WFM]: BEGIN - Inside function task_end");

	global $db;

	$db->query("
					UPDATE asol_workingnodes
					SET status='terminated'
					WHERE id='".$working_node_id."'
			");/////////****************** esta query ya se hace tambien despues, cuando muere la rama. Se supone que la task_type=end tiene que ser la ultima tarea del working_node...

	if ($task_implementation == 'true') { // terminate process
		$GLOBALS['log']->debug("**********[ASOL][WFM]: Inside function task_end -> Terminate Process");
		$db->query("
						UPDATE asol_workingnodes
						SET status='terminated'
						WHERE asol_processinstances_id_c='".$process_instance_id."'
				");
	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: END - Inside function task_end");
	return 'task_end';
}

function task_continue() {
	$GLOBALS['log']->debug("**********[ASOL][WFM]: BEGIN - Inside function task_continue");
	$GLOBALS['log']->debug("**********[ASOL][WFM]: END - Inside function task_continue");
}

function task_create_object($implementationField, $bean_module, $bean_id, $bean__ungreedy_count , $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $beanList, $beanFiles, $app_list_strings, $sugar_config;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;

	if ($asolLogLevelEnabled)
	$GLOBALS['log']->asol("**********[ASOL][WFM]: ENTRY function task_create_object");
	else
	$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY function task_create_object");

	$two_fields = explode("\${mod}", $implementationField);
	$module = $two_fields[0];

	if ($module == "") {

		if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("**********[ASOL][WFM]: no module selected");
		else
		$GLOBALS['log']->debug("**********[ASOL][WFM]: no module selected");

		return false;
	}

	$class_name = $beanList[$module];
	require_once($beanFiles[$class_name]);
	$bean_create_object = new $class_name();

	$fields = explode("\${pipe}", $two_fields[1]);

	foreach ($fields as $value) {
		$field = explode("\${dp}", $value);
		$GLOBALS['log']->debug("**********[ASOL][WFM]: \$field=[".print_r($field,true)."]");

		$value_field = replace_wfm_vars(null, urldecode($field[1]), $bean_module, $bean_id, $bean_fetched_row, $new_bean, $current_user_id);
		$field_name = explode("\${comma}", $field[0]); //asol_task.js -> formated_string += document.getElementById('fieldName_'+rowIndex).getAttribute("value") +"${comma}"+ document.getElementById('fieldName_'+rowIndex).getAttribute("label_key") +"${comma}"+ document.getElementById('fieldName_'+rowIndex).innerHTML;
		$bean_create_object->$field_name[0] = $value_field;
	}

	$bean_create_object->ungreedy_count = $bean__ungreedy_count + 1;

	$GLOBALS['log']->debug("**********[ASOL][WFM]: functions \$bean->ungreedy_count=[".$bean->ungreedy_count."]");

	$object_id = $bean_create_object->save();

	if ($asolLogLevelEnabled) {
		$GLOBALS['log']->asol("**********[ASOL][WFM]: after_save() \$bean_create_object->id=[".$bean_create_object->id."]");
	} else {
		$GLOBALS['log']->debug("**********[ASOL][WFM]: after_save() \$bean_create_object->id=[".$bean_create_object->id."]");
	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT function task_create_object");

	if ($object_id != false) {
		return Array('object_id' => $object_id, 'object_module' => $module);
	}
	return $object_id; //It has to be false if the flow comes this away.
}

function task_modify_object($id_object, $implementationField, $bean__ungreedy_count, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $beanList, $beanFiles, $app_list_strings, $sugar_config;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;

	if ($asolLogLevelEnabled)
	$GLOBALS['log']->asol("**********[ASOL][WFM]: ENTRY function task_modify_object");
	else
	$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY function task_modify_object");

	$two_fields = explode("\${mod}", $implementationField);
	$module = $two_fields[0];

	$class_name = $beanList[$module];
	require_once($beanFiles[$class_name]);
	$bean = new $class_name();
	$bean->retrieve($id_object);
	$fields = explode("\${pipe}", $two_fields[1]);

	foreach ($fields as $value) {
		$field = explode("\${dp}", $value);
		$GLOBALS['log']->debug("**********[ASOL][WFM]: \$field=[".print_r($field,true)."]");

		$value_field = replace_wfm_vars(null, urldecode($field[1]), $module, $id_object, $bean_fetched_row, $new_bean, $current_user_id);
		$field_name = explode("\${comma}", $field[0]); //asol_task.js -> formated_string += document.getElementById('fieldName_'+rowIndex).getAttribute("value") +"${comma}"+ document.getElementById('fieldName_'+rowIndex).getAttribute("label_key") +"${comma}"+ document.getElementById('fieldName_'+rowIndex).innerHTML;
		$bean->$field_name[0] = $value_field;
	}

	$bean->ungreedy_count = $bean__ungreedy_count + 1;

	$GLOBALS['log']->debug("**********[ASOL][WFM]: functions \$bean->ungreedy_count=[".$bean->ungreedy_count."]");

	$object_id = $bean->save(); // Be careful -> this return all the object, not just the id (in case of modify_object... in case of create_object returns only the id... it is weird, but it is just like that)

	$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT function task_modify_object");

	if ($object_id != false) {
		return Array('object_id' => $bean->id, 'object_module' => $module);
	}
	return $object_id; //It has to be false if the flow comes this away.
}

function task_call_process($task_implementation, $parent_bean_module, $parent_bean_id, $parent_process_instance_id, $bean__ungreedy_count, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $db, $sugar_config;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;

	if ($asolLogLevelEnabled)
	$GLOBALS['log']->asol("**********[ASOL][WFM]: ENTRY function task_call_process");
	else
	$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY function task_call_process");

	$task_implementation_array = explode('${pipe}', $task_implementation);
	$process_id = $task_implementation_array[0];
	$process_name = $task_implementation_array[1];
	$event_id = $task_implementation_array[2];
	$event_name = $task_implementation_array[3];

	// Avoid that a process can call_process itselft at run-time.
	$process_id__from_parent_process_instance_id__query = $db->query("
																		SELECT asol_process_id_c
																		FROM asol_processinstances
																		WHERE id = '".$parent_process_instance_id."'
																	");
	$process_id__from_parent_process_instance_id__row = $db->fetchByAssoc($process_id__from_parent_process_instance_id__query);

	if ($process_id == $process_id__from_parent_process_instance_id__row['asol_process_id_c']) {

		if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("**********[ASOL][WFM]: process_id == subprocess_id -> do NOT execute.");
		else
		$GLOBALS['log']->debug("**********[ASOL][WFM]: process_id == subprocess_id -> do NOT execute.");
		return false;
	}

	// Avoid that a process can call_process a subprocess that is inactive.
	$subprocess_query = $db->query("
										SELECT status, bean_module
										FROM asol_process
										WHERE id = '".$process_id."'
									");
	$subprocess_row = $db->fetchByAssoc($subprocess_query);

	if ($subprocess_row['status'] == 'inactive') {
		if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("**********[ASOL][WFM]: Subprocess is inactive -> do NOT execute.");
		else
		$GLOBALS['log']->debug("**********[ASOL][WFM]: Subprocess is inactive -> do NOT execute.");
		return false;
	}

	// Avoid that a process can call_process a subprocess that has a different Module.
	$parent_process_query = $db->query("
										SELECT status, bean_module
										FROM asol_process
										WHERE id = '".$process_id__from_parent_process_instance_id__row['asol_process_id_c']."'
									");
	$parent_process_row = $db->fetchByAssoc($parent_process_query);

	if ($subprocess_row['bean_module'] != $parent_process_row['bean_module']) {
		if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("**********[ASOL][WFM]: \$subprocess_row['bean_module'] != \$parent_process_row['bean_module'] -> do NOT execute.");
		else
		$GLOBALS['log']->debug("**********[ASOL][WFM]: \$subprocess_row['bean_module'] != \$parent_process_row['bean_module'] -> do NOT execute.");

		return false;
	}

	// INITIALIZE SUBPROCESS

	$id1 = create_guid();
	$process_instance_id = create_guid();
	//$process_id = $value['process_id'];
	//$parent_process_instance_id = 'null';

	$bean__ungreedy_count++;
	$id1 = create_guid();
	$name1 = "p_i_".$id1;

	$activity_query = $db->query("
										SELECT asol_event87f4_events_ida AS event_id, asol_event8042ctivity_idb AS activity_id
										FROM asol_eventssol_activity_c
										WHERE (asol_event87f4_events_ida = '" . $event_id . "' AND deleted = 0)
								");
	while ($activity_row = $db->fetchByAssoc($activity_query)) {
		$events_activities_let[] = $activity_row;
	}

	if (!isset($events_activities_let)) {	// Allow that an event can have no activities. Otherwise, it will not clean the database correctly.
		return false;
	}

	$db->query("
					INSERT INTO asol_processinstances (id, name, asol_process_id_c, bean_id, bean_module, asol_processinstances_id_c, bean_ungreedy_count)
					VALUES ('".$id1."', '".$name1."', '".$process_id."', '".$parent_bean_id."', '".$parent_bean_module."', '".$parent_process_instance_id."', ".$bean__ungreedy_count.")
				");

	foreach($events_activities_let as $key => $value) {

		$priority = 1; //subprocess's priority

		$id2 = create_guid();
		$name2 = "w_n_".$id2;
		$date_entered = gmdate('Y-m-d H:i:s');
		$date_modified = gmdate('Y-m-d H:i:s');
		$current_activity = $value['activity_id'];
		$current_task = 'null';
		$delay_wakeup_time = '0000-00-00 00:00:00';
		$created_by = $current_user_id;
		$status = 'not_started';
		$bean_fetched_row_to_db = base64_encode(serialize($bean_fetched_row));
		$new_bean_to_db = base64_encode(serialize($new_bean));

		$db->query("
						INSERT asol_workingnodes (id, name, asol_processinstances_id_c, priority, date_entered, date_modified, asol_activity_id_c, asol_task_id_c, delay_wakeup_time, created_by, status, bean_fetched_row, new_bean)
						VALUES ('".$id2."', '".$name2."', '".$id1."', ".$priority.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."', '".$bean_fetched_row_to_db."', '".$new_bean_to_db."')
				   ");
	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: events_activities_let-TOTAL " . print_r($events_activities_let, true) . "*******************************************");
	$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT function task_call_process");

	return true;
}

function replace_wfm_vars($type, $text_with_vars, $bean_module, $bean_id, $bean_fetched_row=null, $new_bean=null, $current_user_id) {

	global $timedate, $beanList, $beanFiles, $app_list_strings, $sugar_config, $current_user;

	$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY function replace_wfm_vars \$text_with_vars=[".$text_with_vars."]");
	//$GLOBALS['log']->debug("*********************** ASOL: function replace_wfm_vars \$bean_fetched_row=[".print_r($bean_fetched_row,true)."]");
	//$GLOBALS['log']->debug("*********************** ASOL: function replace_wfm_vars \$new_bean=[".print_r($new_bean,true)."]");

	// Encoding/Decoding ISO/UTF-8 problems
	$text_with_vars = str_replace("&nbsp;", " ", $text_with_vars);//necesario???????!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	//$GLOBALS['log']->debug("*********************** ASOL: function replace_wfm_vars \$timedate=[".print_r($timedate,true)."]");
	////////////////////////////////////////////
	require_once('modules/Users/User.php');
	$theUser = new User();
	$theUser->retrieve($current_user_id);
	$GLOBALS['log']->debug("**********[ASOL][WFM]: \$theUser->user_name=[$theUser->user_name]  ");

	$userTZ = $theUser->getPreference("timezone");
	$GLOBALS['log']->debug("**********[ASOL][WFM]: \$userTZ=[$userTZ]  ");

	// Override global $current_user
	//$current_user = $theUser;// When we use $theUser->getUserDateTimePreferences(), we are calling a function that uses $current_user. So we have to override $current_user in order to get the proper datetime user-preferences

	date_default_timezone_set($userTZ);
	////////////////////////////////////////////

	//Bean for the task event trigger
	$class_name = $beanList[$bean_module];
	require_once($beanFiles[$class_name]);
	$bean = new $class_name();
	$bean->retrieve($bean_id);
	//Bean for the task event trigger

	///////////////////////
	// When task_type=create_object or modify_object -> check if fieldType=relate
	// [id]${comma}[name]
	$id_and_name_of_relate = explode('${comma}', $text_with_vars);
	if (count($id_and_name_of_relate) == 2) {
		$pos_aux = strpos($id_and_name_of_relate[1], '${');
		if ($pos_aux !== false) {
			$text_with_vars = $id_and_name_of_relate[1];
		} else {
			$text_with_vars = $id_and_name_of_relate[0];
		}
	}
	///////////////////////

	$tmpText = $text_with_vars;

	$pos = strpos($tmpText, '${');

	//$GLOBALS['log']->debug("*********************** ASOL: first \$pos=[".print_r($pos,true)."]");

	$beanItems = Array();
	while ($pos !== false) {

		//$GLOBALS['log']->debug("*********************** ASOL:while");

		$tmp_last = substr($tmpText, $pos);
		$posEnd = strpos($tmp_last, '}');


		$first = ($pos === 0) ? "" : substr($tmpText, 0, $pos-1);
		$item = substr($tmp_last, 0, $posEnd+1);
		$last = substr($tmp_last, $posEnd+2);

		$tmpText = $first." ASOL ".$last;

		$beanItems[] = $item;


		$pos = strpos($tmpText, '${');

		//$GLOBALS['log']->debug("*********************** ASOL: while \$pos=[".print_r($pos,true)."]");
	}

	//$GLOBALS['log']->debug("*********************** ASOL: last \$pos=[".print_r($pos,true)."]");

	foreach($beanItems as $beanItem) {

		//$GLOBALS['log']->debug("*********************** ASOL:foreach");

		$beanField = "";
		$tmpBeanItem = substr($beanItem, 2);
		$tmpBeanItem = substr($tmpBeanItem, 0, -1);

		$beanValues = explode("->", $tmpBeanItem);
		//$GLOBALS['log']->debug("*********************** ASOL: \$beanValues=[".print_r($beanValues,true)."]");

		if (count($beanValues) == 2) {

			//$GLOBALS['log']->debug("*********************** ASOL:count(beanValues)=2");

			if ($beanValues[0] == "current_datetime") {
				$delta = $beanValues[1];
				$delta__array = explode(' ',$delta);
				$delta_date = $delta__array[0];
				$delta_time = $delta__array[1];

				$delta_date__array = explode('-',$delta_date);
				$years = $delta_date__array[0];
				$months = $delta_date__array[1];
				$days = $delta_date__array[2];

				$delta_time__array = explode(':',$delta_time);
				$hours = $delta_time__array[0];
				$minutes = $delta_time__array[1];

				// generate current datetime plus delta: ${current_datetime->YY-mm-dd HH:ii}]
				$current_datetime__plus__delta  = date("Y-m-d H:i:s", mktime(gmdate("H") + $hours, gmdate("i") + $minutes, gmdate("s") , gmdate("m") + $months, gmdate("d") + $days, gmdate("Y") + $years));

				//$GLOBALS['log']->debug("*********************** ASOL: "."\$years=[".$years."] "."\$months=[".$months."] "."\$days=[".$days."] "."\$hours=[".$hours."] "."\$minutes=[".$minutes."] ");
				//$GLOBALS['log']->debug("*********************** ASOL: gmdate " . gmdate("Y-m-d H:i:s") );
				//$GLOBALS['log']->debug("*********************** ASOL: \$current_datetime__plus__delta=[".$current_datetime__plus__delta."]");

				$beanField = $current_datetime__plus__delta;
				//$beanField = $timedate->handle_offset($beanField, $timedate->get_db_date_time_format(), true, null, $userTZ); // Be careful, this token is intended to WFM-internal use only. And it needs no TimeZone, because this is written to database, not to use by end-users.

			} elseif ($beanValues[0] == "current_date") {
				$delta = $beanValues[1];
				//$delta__array = explode(' ',$delta);
				$delta_date = $delta;
				//$delta_time = $delta__array[1];

				$delta_date__array = explode('-',$delta_date);
				$years = $delta_date__array[0];
				$months = $delta_date__array[1];
				$days = $delta_date__array[2];

				/*$delta_time__array = explode(':',$delta_time);
				 $hours = $delta_time__array[0];
				 $minutes = $delta_time__array[1];*/

				$current_date__plus__delta  = date("Y-m-d", mktime(gmdate("H") , gmdate("i") , gmdate("s") , gmdate("m") + $months, gmdate("d") + $days, gmdate("Y") + $years));

				//$GLOBALS['log']->debug("*********************** ASOL: \$current_date__plus__delta=[",$current_date__plus__delta,"]");

				$beanField = $current_date__plus__delta;

			} elseif ( ($beanValues[0] == "bean") || ($beanValues[0] == "old_bean") )  {

				if ($beanValues[0] == "old_bean")  {
					//$GLOBALS['log']->debug("*********************** ASOL: old_bean");
					$beanField = $bean_fetched_row[$beanValues[1]];
				} else if ($beanValues[0] == "bean") {
					//$GLOBALS['log']->debug("*********************** ASOL: bean");
					$beanField = $new_bean[$beanValues[1]];
				}
				//$GLOBALS['log']->debug("*********************** ASOL: 1\$beanField=[$beanField]");

				$fieldNameMap = $bean->field_name_map;
				//$GLOBALS['log']->debug("*********************** ASOL: \$fieldNameMap=[".print_r($fieldNameMap,true)."]");

				if ($fieldNameMap[$beanValues[1]]['type'] == 'enum') {
					$beanField = $app_list_strings[$fieldNameMap[$beanValues[1]]['options']][$beanField];
					//$GLOBALS['log']->debug("*********************** ASOL: 2\$beanField=[$beanField]");

				} else if (($fieldNameMap[$beanValues[1]]['type'] == 'datetime') || ($fieldNameMap[$beanValues[1]]['dbType'] == 'datetime')) {
					if ($beanField != "") {
						$beanField = $timedate->handle_offset($beanField, $timedate->get_db_date_time_format(), true, null, $userTZ);
						//$userDateTimeFormat_array =  $theUser->getUserDateTimePreferences();
						//$GLOBALS['log']->debug("*********************** ASOL: \$userDateTimeFormat_array=[".print_r($userDateTimeFormat_array,true)."]");
						//$userDateTimeFormat = $userDateTimeFormat_array['date'].' '.$userDateTimeFormat_array['time'];
						$userDateTimeFormat = $theUser->getPreference("datef").' '.$theUser->getPreference("timef");
						$beanField = $timedate->swap_formats($beanField, $timedate->get_db_date_time_format(), $userDateTimeFormat);
					}
				} else if ($fieldNameMap[$beanValues[1]]['type'] == 'date') {
					if ($beanField != "") {
						//$userDateTimeFormat_array =  $theUser->getUserDateTimePreferences();
						//$GLOBALS['log']->debug("*********************** ASOL: \$userDateFormat_array=[".print_r($userDateTimeFormat_array,true)."]");
						//$userDateFormat = $userDateTimeFormat_array['date'];
						$userDateFormat = $theUser->getPreference("datef");
						$beanField = $timedate->swap_formats($beanField, $timedate->get_db_date_format(), $userDateFormat);
					}
				}
			}
		} else if (count($beanValues) == 3) {

			//$GLOBALS['log']->debug("*********************** ASOL:count(beanValues)=3");

			$class_name = $beanList[$beanValues[0]];
			require_once($beanFiles[$class_name]);
			$related_bean = new $class_name();
			$related_bean->retrieve($bean->$beanValues[1]);

			$beanField = $related_bean->$beanValues[2];
		}

		if ($type == 'body') {
			$beanField = nl2br($beanField); // nl2br -> for fields with newlines (Ex: log) and only for task_type=send_email, for task_type=create_object we do not want nl2br
		}

		if (isset($sugar_config['WFM_sugarcrm_emailTemplate_charset']) && ($sugar_config['WFM_sugarcrm_emailTemplate_charset'] == 'ISO')) {
			if ($type == 'body') {
				$beanField = iconv("UTF-8", "ISO-8859-1", $beanField); // $bean is written in UTF-8
			}
		}

		$text_with_vars = str_replace($beanItem, $beanField, $text_with_vars);
	}

	// We want to send emails in UTF-8
	if (isset($sugar_config['WFM_sugarcrm_emailTemplate_charset']) && ($sugar_config['WFM_sugarcrm_emailTemplate_charset'] == 'ISO')) {
		if ($type == 'body') {
			$text_with_vars = iconv("ISO-8859-1", "UTF-8", $text_with_vars); // email_template is written in ISO-8859-1
		}
	}

	$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT function replace_wfm_vars \$text_with_vars=[".$text_with_vars."]");

	return $text_with_vars;
}

?>