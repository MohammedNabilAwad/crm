<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

//require_once("include/SugarPHPMailer.php");

//global $beanList, $beanFiles, $app_list_strings;

function executeTask($task_id, $task_type, $task_implementation, $alternative_database, $trigger_module, $bean_id, $process_instance_id, $working_node_id, $bean_ungreedy_count, $old_bean, $new_bean, & $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);
	wfm_utils::wfm_log('debug', 'get_defined_vars=['.var_export(get_defined_vars(), true).']', __FILE__, __METHOD__, __LINE__);

	global $sugar_config;

	switch ($task_type) {
		case 'send_email':
			$success = task_send_email($task_implementation, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
			break;
		case 'create_object':
			$success = task_create_object($task_implementation , $alternative_database, $trigger_module, $bean_id, $bean_ungreedy_count, $old_bean, $new_bean, $custom_variables, $current_user_id); // if succesful -> return Array('object_id' => $object_id,'object_module' =>$module ) else return false
			break;
		case 'modify_object':
			$success = task_modify_object($bean_id, $task_implementation, $alternative_database, $bean_ungreedy_count, $old_bean, $new_bean, $custom_variables, $current_user_id); // if succesful -> return Array('object_id' => $object_id,'object_module' =>$module ) else return false
			break;
		case 'php_custom':
			$success = task_php_custom($task_id/*,$task_implementation*/, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
			break;
		case 'end':
			$success = task_end($task_implementation, $process_instance_id, $working_node_id);
			break;
		case 'call_process':
			$success = task_call_process($task_implementation, $alternative_database, $trigger_module, $bean_id, $process_instance_id, $bean_ungreedy_count, $old_bean, $new_bean, $custom_variables, $current_user_id);
			break;
		case 'add_custom_variables':
			$success = task_add_custom_variables($task_implementation, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
			break;
	}

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return $success;
}

function task_send_email($implementationField, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	global $beanList, $beanFiles, $app_list_strings, $db, $sugar_config;

	$fields = explode("\${pipe}", $implementationField);
	// Get EmailTemplate bean
	require_once("modules/EmailTemplates/EmailTemplate.php");
	$templateBean = new EmailTemplate();
	$templateBean->retrieve($fields[0]);

	// Get the body-HTML with the variables translated to their values
	$bodyHtml = replace_wfm_vars('body', html_entity_decode($templateBean->body_html, ENT_COMPAT, "ISO-8859-1"), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
	// Get the subject with the variables translated to their values
	$subject = replace_wfm_vars(null, html_entity_decode($templateBean->subject), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
	// Get the from with the variables translated to their values
	$from = replace_wfm_vars(null, urldecode($fields[2]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);

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
		$emails = replace_wfm_vars(null, urldecode($fields[$key_to_cc_bcc+6]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);

		$emails = explode(',', $emails); // It could be more than one email. Emails have to be separated by commas(with no blanks).
		if (!empty($emails[0])) {
			$there_is_address[$value_to_cc_bcc] = true;
			foreach($emails as $email) {
				switch ($value_to_cc_bcc) {
					case 'to':
						$mail->AddAddress($email);
						break;
					case 'cc':
						$mail->AddCC($email);
						break;
					case 'bcc':
						$mail->AddBCC($email);
				}
			}
		}

		//------ users select: to,cc,bcc -->(3,4,5)
		// Get emails from selected Users in the send email task.
		$users_string = $fields[$key_to_cc_bcc];
		wfm_utils::wfm_log('debug', '$users_string=['.var_export($users_string, true).']', __FILE__, __METHOD__, __LINE__);

		$users = explode('${comma}', $users_string);
		if (!empty($users[0])) {
			require_once('modules/Users/User.php');
			wfm_utils::wfm_log('debug', '$users=['.var_export($users, true).']', __FILE__, __METHOD__, __LINE__);

			// For each user, we get his email by means of the function getUsersNameAndEmail() that is defined in User.php

			foreach ($users as $user) {

				wfm_utils::wfm_log('debug', '$user=['.$user.']', __FILE__, __METHOD__, __LINE__);

				$theUser = new User();
				$theUser->retrieve($user);
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

		wfm_utils::wfm_log('debug', '$acl_roles=['.var_export($acl_roles, true).']', __FILE__, __METHOD__, __LINE__);

		// For each role, we get his users(it can be more than one). And once we have the role's users, we get the user's email.
		if (!empty($acl_roles[0])) {
			foreach($acl_roles as $acl_role) {

				wfm_utils::wfm_log('debug', '$asol_role=['.$acl_role.']', __FILE__, __METHOD__, __LINE__);

				$users_from__acl_role = Array();
				$user_from__acl_role__query = $db->query("
															SELECT user_id
															FROM acl_roles_users
															WHERE role_id = '{$acl_role}'
														");
				while($user_from__acl_role__row = $db->fetchByAssoc($user_from__acl_role__query)) {
					$users_from__acl_role[] = $user_from__acl_role__row['user_id'];
				}

				wfm_utils::wfm_log('debug', '$users_from__acl_role=['.var_export($users_from__acl_role, true).']', __FILE__, __METHOD__, __LINE__);

				if (!empty($users_from__acl_role[0])) {
					foreach($users_from__acl_role as $user_from__acl_role) {

						wfm_utils::wfm_log('debug', '$user_from__acl_role=['.$user_from__acl_role.']', __FILE__, __METHOD__, __LINE__);

						$theUser = new User();
						$theUser->retrieve($user_from__acl_role);
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
	// OPENSYMBOLMOD - START - davide.dallapozza - 04/feb/2014
	// *************************************************
	// Aggiungo di default come destinatario l'utente a cui il group activity è assegnato
	// Carico il primary address email e solo se è presente invio l'email con un link al group activity creato

	$query = "SELECT DISTINCT e.email_address FROM email_addresses e INNER JOIN email_addr_bean_rel rel ON e.id = rel.email_address_id AND e.deleted = 0 AND rel.deleted = 0 INNER JOIN users u ON u.id = rel.bean_id AND u.deleted = 0 WHERE rel.bean_id = '". $custom_variables ['modified_new_bean'] ['assigned_user_id'] . "' AND rel.primary_address = 1";
	$r = $db->query ( $query );
	while ( $v = $db->fetchByAssoc ( $r ) ) {
		$mail->AddAddress ( $v ['email_address'] );
		$there_is_address['to'] = true;
		$mail->Body .= '<br/><a href="http://'.$custom_variables ['server']['HTTP_HOST'].$custom_variables ['server']['REQUEST_URI'].'?action=DetailView&module='.$trigger_module.'&record='.$custom_variables ['modified_new_bean']['id'].'&return_module=osy_service&return_action=DetailView&offset=1">View '.$custom_variables ['modified_new_bean']['name'].'</a>';
	}


	// OPENSYMBOLMOD - END - davide.dallapozza
	// *************************************************
	$there_is_destination_address = ($there_is_address['to'] || $there_is_address['cc'] || $there_is_address['bcc']);

	//sleep(10);
	//wfm_utils::wfm_log('debug', "sleep", __FILE__, __METHOD__, __LINE__);

	//wfm_utils::wfm_log('debug', '$mail=['.var_export($mail, true).']', __FILE__, __METHOD__, __LINE__);

	// SEND EMAIL
	if ($there_is_destination_address) {

		$success = $mail->Send();

		$tries=1;
		while (!($success) && ($tries < 5)) {
			sleep(5);
			$success = $mail->Send();
			$tries++;
		}
	} else {
		$success = false;
		wfm_utils::wfm_log('asol', "There is no destination-addresses", __FILE__, __METHOD__, __LINE__);
	}

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return $success;
}

function task_php_custom($task_id/*,$script*/, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, & $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	$myFile = "{$task_id}.php";

	require_once ("modules/asol_Task/_temp_php_custom_Files/{$myFile}");

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return true;
}

function task_end($task_implementation, $process_instance_id, $working_node_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	global $db;

	// Terminate working_node
	$date_modified = gmdate('Y-m-d H:i:s');

	$db->query("
					UPDATE asol_workingnodes
					SET status = 'terminated', date_modified = '{$date_modified}'
					WHERE id = '{$working_node_id}'
				");

	// Terminate all working_nodes from this process_instance
	if ($task_implementation == 'true') { // If terminate_process is checked
		wfm_utils::wfm_log('debug', "Terminate Process", __FILE__, __METHOD__, __LINE__);

		$date_modified = gmdate('Y-m-d H:i:s');

		$db->query("
						UPDATE asol_workingnodes
						SET status = 'terminated', date_modified = '{$date_modified}'
						WHERE asol_processinstances_id_c = '{$process_instance_id}'
					");
	}

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return 'task_end';
}

function task_continue() {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);
	// Do nothing
	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return true;
}

function task_create_object($implementationField, $alternative_database, $trigger_module, $bean_id, $bean_ungreedy_count, $old_bean, $new_bean, & $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	global $beanList, $beanFiles, $app_list_strings, $sugar_config;

	$implementationField_array = explode('${mod}', $implementationField);
	$object_module = $implementationField_array[0]; // create_object => object_module != trigger_module

	if (empty($object_module)) {
		wfm_utils::wfm_log('asol', "No module selected", __FILE__, __METHOD__, __LINE__);
		return false;
	}

	$class_name = $beanList[$object_module];
	require_once($beanFiles[$class_name]);
	$bean = new $class_name();

	// replace fields
	replace_fields($bean, $implementationField_array, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id, $bean_ungreedy_count);

	$object_id = $bean->save();
	wfm_utils::wfm_log('asol', '$object_id=['.var_export($object_id, true).']', __FILE__, __METHOD__, __LINE__);

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	if ($object_id != false) {
		$created_object = wfm_utils::wfm_get_bean_variable_array_from_bean_field_defs_non_db($bean);
		return Array('object_id' => $object_id, 'object_module' => $object_module, 'created_object' => $created_object);
	}
	return $object_id; // It has to be false if the flow comes this away.
}

function task_modify_object($object_id, $implementationField, $alternative_database, $bean_ungreedy_count, $old_bean, $new_bean, & $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	global $beanList, $beanFiles, $app_list_strings, $sugar_config;

	$implementationField_array = explode('${mod}', $implementationField);
	$object_module = $implementationField_array[0]; //  modify_object => object_module == trigger_module
	$trigger_module = $object_module;

	$class_name = $beanList[$object_module];
	require_once($beanFiles[$class_name]);
	$bean = new $class_name();
	$bean->retrieve($object_id);
	$bean_id = $object_id;

	// replace fields
	replace_fields($bean, $implementationField_array, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id, $bean_ungreedy_count);

	$object_id = $bean->save(); // Be careful -> this return all the object, not just the id (in case of modify_object... in case of create_object returns only the id... it is weird, but it is just like that)
	//wfm_utils::wfm_log('asol', '$object_id=['.print_r($object_id, true).']', __FILE__, __METHOD__, __LINE__);

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	if ($object_id != false) {
		return Array('object_id' => $bean->id, 'object_module' => $object_module);
	}
	return $object_id; // It has to be false if the flow comes this away.
}

function task_call_process($task_implementation, $alternative_database, $parent_trigger_module, $parent_bean_id, $parent_process_instance_id, $bean_ungreedy_count, $old_bean, $new_bean, $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);

	global $db, $sugar_config, $app_list_strings;

	$task_implementation_array = explode('${pipe}', $task_implementation);
	$process_id = $task_implementation_array[0];
	$process_name = $task_implementation_array[1];
	$event_id = $task_implementation_array[2];
	$event_name = $task_implementation_array[3];

	// Avoid that a process can call_process itselft at run-time.
	$process_id__from_parent_process_instance_id__query = $db->query("
																		SELECT asol_process_id_c
																		FROM asol_processinstances
																		WHERE id = '{$parent_process_instance_id}'
																	");
	$process_id__from_parent_process_instance_id__row = $db->fetchByAssoc($process_id__from_parent_process_instance_id__query);

	if ($process_id == $process_id__from_parent_process_instance_id__row['asol_process_id_c']) {
		wfm_utils::wfm_log('asol', "process_id == subprocess_id -> do NOT execute.", __FILE__, __METHOD__, __LINE__);
		return false;
	}

	// Avoid that a process can call_process a subprocess that is inactive.
	$subprocess_query = $db->query("
										SELECT *
										FROM asol_process
										WHERE id = '{$process_id}'
									");
	$subprocess_row = $db->fetchByAssoc($subprocess_query);

	if ($subprocess_row['status'] == 'inactive') {
		wfm_utils::wfm_log('asol', "Subprocess is inactive -> do NOT execute.", __FILE__, __METHOD__, __LINE__);
		return false;
	}

	// Avoid that a process can call_process a subprocess that has a different Module.
	$parent_process_query = $db->query("
											SELECT status, trigger_module
											FROM asol_process
											WHERE id = '{$process_id__from_parent_process_instance_id__row['asol_process_id_c']}'
										");
	$parent_process_row = $db->fetchByAssoc($parent_process_query);

	if ($subprocess_row['trigger_module'] != $parent_process_row['trigger_module']) {
		wfm_utils::wfm_log('asol', "\$subprocess_row['trigger_module'] != \$parent_process_row['trigger_module'] -> do NOT execute.", __FILE__, __METHOD__, __LINE__);
		return false;
	}

	// INSTANCIATE SUBPROCESS

	// For the wfm-event, we get its wfm-activities
	$activities = Array(); // [0->[event_idX, activity_id0],..., ]
	$activity_query = $db->query("
									SELECT asol_event87f4_events_ida AS event_id, asol_event8042ctivity_idb AS activity_id
									FROM asol_eventssol_activity_c
									WHERE (asol_event87f4_events_ida = '{$event_id}' AND deleted = 0)
								");
	while ($activity_row = $db->fetchByAssoc($activity_query)) {
		$activities[] = $activity_row;
	}
	wfm_utils::wfm_log('debug', '$activities=['.var_export($activities, true).']', __FILE__, __METHOD__, __LINE__);

	if (count($activities) == 0) { // Allow that an event can have no activities. Otherwise, it will not clean the database correctly.
		return false;
	}

	// asol_domains
	$subprocess_row['asol_domain_id'] = (!empty($subprocess_row['asol_domain_id'])) ? $subprocess_row['asol_domain_id'] : "''";
	$isDomainsInstalled = wfm_reports_utils::wfm_isDomainsInstalled();
	$asol_domains_query_1 = ($isDomainsInstalled) ? ', asol_domain_id' : '';
	$asol_domains_query_2 = ($isDomainsInstalled) ? ", {$subprocess_row['asol_domain_id']}" : '';

	// Add process_instance to DB
	$id1 = create_guid();
	$name1 = "p_i_".$id1;
	$bean_ungreedy_count++;
	$date_entered = gmdate('Y-m-d H:i:s');
	$date_modified = $date_entered;
	$created_by = $current_user_id;
	$modified_user_id = $current_user_id;
	$assigned_user_id = $current_user_id;

	$db->query("
					INSERT INTO asol_processinstances (id, name, date_entered, date_modified, asol_process_id_c, bean_id, trigger_module, asol_processinstances_id_c, bean_ungreedy_count, created_by, modified_user_id, assigned_user_id {$asol_domains_query_1})
					VALUES ('{$id1}', '{$name1}', '{$date_entered}', '{$date_modified}', '{$process_id}', '{$parent_bean_id}', '{$parent_trigger_module}', '{$parent_process_instance_id}', {$bean_ungreedy_count}, '{$created_by}', '{$modified_user_id}', '{$assigned_user_id}' {$asol_domains_query_2})
				");

	// Add working_nodes to DB
	foreach ($activities as $activity) {

		$trigger_type = 'subprocess';
		$priority = $app_list_strings['wfm_working_node_priority'][$trigger_type];

		$id2 = create_guid();
		$name2 = "w_n_".$id2;
		$date_entered = gmdate('Y-m-d H:i:s');
		$date_modified = $date_entered;
		$current_activity = $activity['activity_id'];
		$current_task = 'null';
		$delay_wakeup_time = '0000-00-00 00:00:00';
		$created_by = $current_user_id;
		$modified_user_id = $current_user_id;
		$assigned_user_id = $current_user_id;
		$status = 'not_started';
		$old_bean_to_db = base64_encode(serialize($old_bean));
		$new_bean_to_db = base64_encode(serialize($new_bean));
		$custom_variables_to_db = base64_encode(serialize($custom_variables));

		$db->query("
						INSERT asol_workingnodes (id, name, asol_processinstances_id_c, priority, date_entered, date_modified, asol_activity_id_c, asol_task_id_c, delay_wakeup_time, created_by, modified_user_id, assigned_user_id, status, old_bean, new_bean, custom_variables {$asol_domains_query_1})
						VALUES ('{$id2}', '{$name2}', '{$id1}', {$priority}, '{$date_entered}', '{$date_modified}', '{$current_activity}', {$current_task}, '{$delay_wakeup_time}', '{$created_by}', '{$modified_user_id}', '{$assigned_user_id}', '{$status}', '{$old_bean_to_db}', '{$new_bean_to_db}', '{$custom_variables_to_db}' {$asol_domains_query_2})
				   ");
	}

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return true;
}

function task_add_custom_variables($task_implementation, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, & $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('asol', "ENTRY", __FILE__, __METHOD__, __LINE__);
	wfm_utils::wfm_log('debug', 'get_defined_vars=['.var_export(get_defined_vars(), true).']', __FILE__, __METHOD__, __LINE__);

	$aux0 = wfm_utils::wfm_getHourOffset_and_TimeZone($current_user_id);
	$hourOffset = $aux0['hourOffset'];
	$userTZ = $aux0['userTZ'];

	$modulesTables = wfm_utils::wfm_get_moduleName_moduleTableName_conversion_array($current_user_id);

	$new_custom_variables = explode('${pipe}', $task_implementation);

	foreach ($new_custom_variables as $new_custom_variable) {

		//$new_custom_variable = replace_wfm_vars(null, $new_custom_variable, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);

		$new_custom_variable_array = explode('${dp}', $new_custom_variable);
		$name = $new_custom_variable_array[0];
		$type = $new_custom_variable_array[1];
		$moduleField = $new_custom_variable_array[2];
		$ffunction = $new_custom_variable_array[3];
		$literal = $new_custom_variable_array[4];

		$moduleField_array = explode('${comma}', $moduleField);
		$moduleField_array_value = $moduleField_array[0];

		$ffunction_array = explode('${comma}', $ffunction);

		switch ($type) {
			case 'sql':

				//********************************************//
				//*****Managing External Database Queries*****//
				//********************************************//
				$alternativeDb = ($alternative_database >= 0) ? $alternative_database : false;
				$externalDataBaseQueryParams = wfm_reports_utils::wfm_manageExternalDatabaseQueries($alternativeDb, $trigger_module);

				$trigger_module_table = $externalDataBaseQueryParams["report_table"];

				if (!empty($moduleField_array_value)) {

					if ($alternative_database >= 0) {
						$rs = Basic_wfm::getSelectionResults("SHOW COLUMNS FROM ".$trigger_module_table, true, $alternativeDb);
						foreach($rs as $value){
							$fieldConstraint = $value['Key'];//PRI  MUL
							if ($fieldConstraint == 'PRI') {
								$field_ID_name = $value['Field'];
							}
						}
					}

					$field_ID_name = (empty($field_ID_name)) ? 'id' : $field_ID_name;

					// Translate WFM-custom_variables to Reports-fields_and_filters
					$conditions = $field_ID_name.'${comma}LBL_ID${comma}id${dp}new\_bean${dp}true${dp}equals${dp}'.$bean_id.'${dp}${dp}char(36)${dp}${dp}false${dp}15${dp}${dp}${dp}0:${dp}0${comma}';
					$aux = generateQuery_wfm::translate_conditions_to_filterValues_and_fieldValues($conditions, true, $field_ID_name);
					$field_values = $aux['field_values'];
					$filter_values = $aux['filter_values'];

					$aux2 = generateQuery_wfm::translate_customVariables_to_filterValues_and_fieldValues($new_custom_variable);
					$aux2['field_values'][0][5] = replace_wfm_vars('custom_variable', html_entity_decode($aux2['field_values'][0][5]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
					$field_values[] = $aux2['field_values'][0];

					$sql_array = generateQuery_wfm::getQueryArray_fromConditions_or_fromCustomVariables($field_values, $filter_values, $trigger_module, $userTZ, $modulesTables, $current_user_id, $alternative_database);
					wfm_utils::wfm_log('debug', '$sql_array=['.print_r($sql_array, true).']', __FILE__, __METHOD__, __LINE__);

					$sql = generateQuery_wfm::getSql($sql_array);

					$new_custom_variable_value = generateQuery_wfm::getCustomVariableValue($sql, $moduleField_array_value, $alternativeDb);

				} else {

					$sql = "SELECT {$ffunction_array[1]} AS query_result";

					$new_custom_variable_value = generateQuery_wfm::getCustomVariableValue($sql, 'query_result', $alternativeDb);
				}

				break;

			case 'php_eval':

				$ffunction_array[1] = replace_wfm_vars('custom_variable', html_entity_decode($ffunction_array[1]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
				$new_custom_variable_value = eval("return {$ffunction_array[1]};");

				break;

			case 'literal':

				$ffunction_array[1] = replace_wfm_vars('custom_variable', html_entity_decode($ffunction_array[1]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
				$new_custom_variable_value = $ffunction_array[1];

				break;
		}

		$custom_variables[$name] = $new_custom_variable_value;
	}

	wfm_utils::wfm_log('debug', '$custom_variables=['.var_export($custom_variables, true).']', __FILE__, __METHOD__, __LINE__);

	wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return true;
}

/////////////////////////
///// AUX FUNCTIONS /////
/////////////////////////

function replace_fields(& $bean, $implementationField_array, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, & $custom_variables, $current_user_id, $bean_ungreedy_count) {

	$bean->set_created_by = false;
	$bean->update_modified_by = false;

	$bean->ungreedy_count = $bean_ungreedy_count + 1;

	$fields = explode('${pipe}', $implementationField_array[1]);

	foreach ($fields as $field) {
		$field_array = explode('${dp}', $field);
		wfm_utils::wfm_log('debug', '$field_array=['.var_export($field_array, true).']', __FILE__, __METHOD__, __LINE__);

		$field_value = replace_wfm_vars(null, urldecode($field_array[1]), $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
		$field_name = explode('${comma}', $field_array[0]);
		$field_name_aux = explode('.', $field_name[0]);
		if (count($field_name_aux) == 2) { // custom_fields
			$field_name = $field_name_aux[1];
		} else {
			$field_name = $field_name[0];
		}

		wfm_utils::wfm_log('debug', '$field_name=['.var_export($field_name, true).']' .','. '$field_value=['.var_export($field_value, true).']', __FILE__, __METHOD__, __LINE__);

		$bean->$field_name = $field_value;
		$custom_variables['modified_new_bean'][$field_name] = $field_value;
	}
}

function replace_wfm_vars($type, $text_with_vars, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id) {
	wfm_utils::wfm_log('debug', "ENTRY", __FILE__, __METHOD__, __LINE__);
	wfm_utils::wfm_log('debug', 'get_defined_vars=['.var_export(get_defined_vars(), true).']', __FILE__, __METHOD__, __LINE__);

	global $timedate, $beanList, $beanFiles, $app_list_strings, $sugar_config, $current_user;

	//wfm_utils::wfm_log('debug', "\$timedate=[".print_r($timedate,true)."]", __FILE__, __METHOD__, __LINE__);

	// Encoding/Decoding ISO/UTF-8 problems
	$text_with_vars = str_replace("&nbsp;", " ", $text_with_vars);///+++ necesario???????!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	// Set timezone
	require_once('modules/Users/User.php');
	$theUser = new User();
	$theUser->retrieve($current_user_id);
	//wfm_utils::wfm_log('debug', "\$theUser->user_name=[$theUser->user_name]  ", __FILE__, __METHOD__, __LINE__);

	$userTZ = $theUser->getPreference("timezone");
	//wfm_utils::wfm_log('debug', "\$userTZ=[$userTZ]  ", __FILE__, __METHOD__, __LINE__);

	// (*deprecated, bug, problems some times*) Override global $current_user
	//$current_user = $theUser;// When we use $theUser->getUserDateTimePreferences(), we are calling a function that uses $current_user. So we have to override $current_user in order to get the proper datetime user-preferences

	date_default_timezone_set($userTZ);

	if ($alternative_database == -1) {
		// Get bean
		$class_name = $beanList[$trigger_module];
		require_once($beanFiles[$class_name]);
		$bean = new $class_name();
		$bean->retrieve($bean_id);
	}

	if ($type != 'custom_variable') {
		// When task_type=create_object/modify_object -> check if fieldType=relate
		// [id]${comma}[name]
		$id_and_name_of_relate = explode('${comma}', $text_with_vars);
		if (count($id_and_name_of_relate) == 2) {
			$pos_aux = strpos($id_and_name_of_relate[1], '${'); // A relate can be defined by either the sugarcrm-way with the popup or with a wfm-variable
			if ($pos_aux !== false) {
				$text_with_vars = $id_and_name_of_relate[1];
			} else {
				$text_with_vars = $id_and_name_of_relate[0];
			}
		}

		// make_datetime
		// ${old_bean->date_start}${make_datetime}+${offset}YY-mm-dd HH:ii
		// It needs no TimeZone, because this is written to database, not to use by end-users.
		$baseDateTime_offset = explode('${make_datetime}', $text_with_vars);
		if (count($baseDateTime_offset) == 2) {
			$baseDateTime = $baseDateTime_offset[0];
			$offset = $baseDateTime_offset[1];

			$offset_array = explode('${offset}', $offset);
			$offset_sign = $offset_array[0];
			wfm_utils::wfm_log('debug', '$offset_sign=['.var_export($offset_sign, true).']', __FILE__, __METHOD__, __LINE__);
			$offset_value = $offset_array[1];

			// offset
			$delta = $offset_value;
			$delta__array = explode(' ',$delta);
			$delta_date = $delta__array[0];
			$delta_time = $delta__array[1];

			$delta_date__array = explode('-',$delta_date);
			$o_years = $delta_date__array[0];
			$o_months = $delta_date__array[1];
			$o_days = $delta_date__array[2];

			$delta_time__array = explode(':',$delta_time);
			$o_hours = $delta_time__array[0];
			$o_minutes = $delta_time__array[1];

			// baseDateTime
			$baseDateTime = replace_wfm_vars('make_datetime', $baseDateTime, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
			wfm_utils::wfm_log('debug', '$baseDateTime=['.var_export($baseDateTime, true).']', __FILE__, __METHOD__, __LINE__);

			$delta = $baseDateTime;
			$delta__array = explode(' ',$delta);
			$delta_date = $delta__array[0];
			$delta_time = $delta__array[1];

			$delta_date__array = explode('-',$delta_date);
			$b_years = $delta_date__array[0];
			$b_months = $delta_date__array[1];
			$b_days = $delta_date__array[2];

			$delta_time__array = explode(':',$delta_time);
			$b_hours = $delta_time__array[0];
			$b_minutes = $delta_time__array[1];

			wfm_utils::wfm_log('debug', '$b_years=['.var_export($b_years, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_months=['.var_export($b_months, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_days=['.var_export($b_days, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_hours=['.var_export($b_hours, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_minutes=['.var_export($b_minutes, true).']', __FILE__, __METHOD__, __LINE__);

			wfm_utils::wfm_log('debug', '$o_years=['.var_export($o_years, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_months=['.var_export($o_months, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_days=['.var_export($o_days, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_hours=['.var_export($o_hours, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_minutes=['.var_export($o_minutes, true).']', __FILE__, __METHOD__, __LINE__);

			switch ($offset_sign) {
				case 'add':
					$current_datetime__plus__delta  = date("Y-m-d H:i:s", mktime($b_hours + $o_hours, $b_minutes + $o_minutes, 0, $b_months + $o_months, $b_days + $o_days, $b_years + $o_years));
					break;
				case 'substract':
					$current_datetime__plus__delta  = date("Y-m-d H:i:s", mktime($b_hours - $o_hours, $b_minutes - $o_minutes, 0, $b_months - $o_months, $b_days - $o_days, $b_years - $o_years));
					break;
			}

			wfm_utils::wfm_log('debug', '$current_datetime__plus__delta=['.var_export($current_datetime__plus__delta, true).']', __FILE__, __METHOD__, __LINE__);

			$text_with_vars = $current_datetime__plus__delta;
		}

		// make_date
		// ${old_bean->date_closed}${make_date}+${offset}YY-mm-dd
		// It needs no TimeZone, because this is written to database, not to use by end-users.
		$baseDate_offset = explode('${make_date}', $text_with_vars);
		if (count($baseDate_offset) == 2) {
			$baseDate = $baseDate_offset[0];
			$offset = $baseDate_offset[1];

			$offset_array = explode('${offset}', $offset);
			$offset_sign = $offset_array[0];
			wfm_utils::wfm_log('debug', '$offset_sign=['.var_export($offset_sign, true).']', __FILE__, __METHOD__, __LINE__);
			$offset_value = $offset_array[1];

			// offset
			$delta = $offset_value;
			$delta_date = $delta;

			$delta_date__array = explode('-',$delta_date);
			$o_years = $delta_date__array[0];
			$o_months = $delta_date__array[1];
			$o_days = $delta_date__array[2];

			// baseDate
			$baseDate = replace_wfm_vars('make_date', $baseDate, $alternative_database, $trigger_module, $bean_id, $old_bean, $new_bean, $custom_variables, $current_user_id);
			wfm_utils::wfm_log('debug', '$baseDate=['.var_export($baseDate, true).']', __FILE__, __METHOD__, __LINE__);

			$delta = $baseDate;
			$delta_date = $delta;

			$delta_date__array = explode('-',$delta_date);
			$b_years = $delta_date__array[0];
			$b_months = $delta_date__array[1];
			$b_days = $delta_date__array[2];

			wfm_utils::wfm_log('debug', '$b_years=['.var_export($b_years, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_months=['.var_export($b_months, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$b_days=['.var_export($b_days, true).']', __FILE__, __METHOD__, __LINE__);

			wfm_utils::wfm_log('debug', '$o_years=['.var_export($o_years, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_months=['.var_export($o_months, true).']', __FILE__, __METHOD__, __LINE__);
			wfm_utils::wfm_log('debug', '$o_days=['.var_export($o_days, true).']', __FILE__, __METHOD__, __LINE__);

			switch ($offset_sign) {
				case 'add':
					$current_date__plus__delta  = date("Y-m-d", mktime(0, 0, 0, $b_months + $o_months, $b_days + $o_days, $b_years + $o_years));
					break;
				case 'substract':
					$current_date__plus__delta  = date("Y-m-d", mktime(0, 0, 0, $b_months - $o_months, $b_days - $o_days, $b_years - $o_years));
					break;
			}

			wfm_utils::wfm_log('debug', '$current_date__plus__delta=['.var_export($current_date__plus__delta, true).']', __FILE__, __METHOD__, __LINE__);

			$text_with_vars = $current_date__plus__delta;
		}
	}

	// Get beanItems
	$beanItems = Array();

	$tmpText = $text_with_vars;
	$pos = strpos($tmpText, '${');
	//wfm_utils::wfm_log('debug', '$pos=['.var_export($pos, true).']', __FILE__, __METHOD__, __LINE__);

	while ($pos !== false) {

		$tmp_last = substr($tmpText, $pos);
		$posEnd = strpos($tmp_last, '}');

		$first = ($pos === 0) ? "" : substr($tmpText, 0, $pos-1);
		$item = substr($tmp_last, 0, $posEnd+1);
		$last = substr($tmp_last, $posEnd+2);

		$tmpText = $first." ASOL ".$last;

		if ($item != '${comma}') { // custom_variables, mysql_functions
			$beanItems[] = $item;
		}

		$pos = strpos($tmpText, '${');
		//wfm_utils::wfm_log('debug', '$pos=['.var_export($pos, true).']', __FILE__, __METHOD__, __LINE__);
	}
	wfm_utils::wfm_log('debug', '$beanItems=['.var_export($beanItems, true).']', __FILE__, __METHOD__, __LINE__);

	// Replace wfm_var
	foreach($beanItems as $beanItem) {
		//wfm_utils::wfm_log('debug', '$beanItem=['.var_export($beanItem, true).']', __FILE__, __METHOD__, __LINE__);

		$beanField = "";
		$tmpBeanItem = substr($beanItem, 2);
		$tmpBeanItem = substr($tmpBeanItem, 0, -1);

		$beanValues = explode("->", $tmpBeanItem);
		wfm_utils::wfm_log('debug', '$beanValues=['.var_export($beanValues, true).']', __FILE__, __METHOD__, __LINE__);

		switch (count($beanValues)) {

			case 1:
				wfm_utils::wfm_log('debug', "count(beanValues)==1", __FILE__, __METHOD__, __LINE__);

				switch ($beanValues[0]) {
					case 'current_datetime':
						$current_datetime  = date("Y-m-d H:i:s", mktime(gmdate("H"), gmdate("i"), gmdate("s") , gmdate("m"), gmdate("d"), gmdate("Y")));
						$beanField = $current_datetime;

						break;

					case 'current_date':
						$current_date  = date("Y-m-d", mktime(gmdate("H") , gmdate("i") , gmdate("s") , gmdate("m"), gmdate("d"), gmdate("Y")));
						$beanField = $current_date;

						break;
				}

				break;

			case 2:
				wfm_utils::wfm_log('debug', "count(beanValues)==2", __FILE__, __METHOD__, __LINE__);

				switch ($beanValues[0]) {

					case 'bean':
					case 'old_bean':

						switch ($beanValues[0]) {
							case 'bean':
								$beanField = $new_bean[$beanValues[1]];
								break;
							case 'old_bean':
								$beanField = $old_bean[$beanValues[1]];
								break;
						}

						if ($alternative_database == -1) {
							$fieldNameMap = $bean->field_name_map;
							//wfm_utils::wfm_log('debug', '$fieldNameMap=['.var_export($fieldNameMap, true).']', __FILE__, __METHOD__, __LINE__);

							if ($fieldNameMap[$beanValues[1]]['type'] == 'enum') {
								$beanField = $app_list_strings[$fieldNameMap[$beanValues[1]]['options']][$beanField];
							} else if (($fieldNameMap[$beanValues[1]]['type'] == 'datetime') || ($fieldNameMap[$beanValues[1]]['dbType'] == 'datetime')) {
								if (($beanField != "") && ($type != 'make_datetime')) {
									$beanField = $timedate->handle_offset($beanField, $timedate->get_db_date_time_format(), true, null, $userTZ);
									$userDateTimeFormat = $theUser->getPreference("datef").' '.$theUser->getPreference("timef");
									$beanField = $timedate->swap_formats($beanField, $timedate->get_db_date_time_format(), $userDateTimeFormat);
								}
							} else if ($fieldNameMap[$beanValues[1]]['type'] == 'date') {
								if (($beanField != "") && ($type != 'make_date')) {
									$userDateFormat = $theUser->getPreference("datef");
									wfm_utils::wfm_log('debug', '$userDateFormat=['.var_export($userDateFormat, true).']', __FILE__, __METHOD__, __LINE__);
									$beanField = $timedate->swap_formats($beanField, $timedate->get_db_date_format(), $userDateFormat);
									wfm_utils::wfm_log('debug', '$beanField=['.var_export($beanField, true).']', __FILE__, __METHOD__, __LINE__);
								}
							}
						}

						break;

					case 'c_var':

						wfm_utils::wfm_log('debug', "c_var", __FILE__, __METHOD__, __LINE__);

						$beanField = (isset($custom_variables[$beanValues[1]])) ? $custom_variables[$beanValues[1]] : '';
						break;
				}

				break;

			case 3:
				wfm_utils::wfm_log('debug', "count(beanValues)==3", __FILE__, __METHOD__, __LINE__);

				switch ($beanValues[0]) {
					case 'c_var':
						$beanField = $custom_variables[$beanValues[1]][$beanValues[2]];
						break;

					default:
						if ($alternative_database == -1) {
							// Get related_bean
							$class_name = $beanList[$beanValues[0]];
							require_once($beanFiles[$class_name]);
							$related_bean = new $class_name();
							$related_bean->retrieve($bean->$beanValues[1]);

							$beanField = $related_bean->$beanValues[2];
						}

						break;
				}
		}

		if ($type == 'body') {
			$beanField = nl2br($beanField); // nl2br -> for fields with newlines (Ex: log) and only for task_type=send_email, for task_type=create_object we do not want nl2br
		}

		if (isset($sugar_config['WFM_sugarcrm_emailTemplate_charset']) && ($sugar_config['WFM_sugarcrm_emailTemplate_charset'] == 'ISO')) {
			if ($type == 'body') {
				$beanField = iconv("UTF-8", "ISO-8859-1//TRANSLIT//IGNORE", $beanField); // $bean is written in UTF-8
			}
		}

		$beanField = str_replace("&#039;", "'", html_entity_decode($beanField));

		switch (count($beanValues)) {
			case 1:
			case 2:
			case 3:
				wfm_utils::wfm_log('debug', "Replace \$beanItem=[{$beanItem}] by \$beanField=[{$beanField}]", __FILE__, __METHOD__, __LINE__);
				$text_with_vars = str_replace($beanItem, $beanField, $text_with_vars);
				break;
		}

	}

	// We want to send emails in UTF-8
	if (isset($sugar_config['WFM_sugarcrm_emailTemplate_charset']) && ($sugar_config['WFM_sugarcrm_emailTemplate_charset'] == 'ISO')) {
		if ($type == 'body') {
			$text_with_vars = iconv("ISO-8859-1", "UTF-8//TRANSLIT//IGNORE", $text_with_vars); // email_template is written in ISO-8859-1
		}
	}

	//wfm_utils::wfm_log('debug', "\$text_with_vars=[{$text_with_vars}]", __FILE__, __METHOD__, __LINE__);

	//wfm_utils::wfm_log('debug', "EXIT", __FILE__, __METHOD__, __LINE__);
	return $text_with_vars;
}

?>