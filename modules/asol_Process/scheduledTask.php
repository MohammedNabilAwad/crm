<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('asol', "ENTRY", __FILE__);
wfm_utils::wfm_echo('scheduled_task', "WFM is going to be executed...");

global $sugar_config;

// Disable scheduledTask if needed
$WFM_disable_wfm_completely = ((isset($sugar_config['WFM_disable_wfm_completely'])) && ($sugar_config['WFM_disable_wfm_completely'])) ? true : false;
$WFM_disable_wfmScheduledTask = ((isset($sugar_config['WFM_disable_wfmScheduledTask'])) && ($sugar_config['WFM_disable_wfmScheduledTask'])) ? true : false;

if ($WFM_disable_wfm_completely || $WFM_disable_wfmScheduledTask) {
	wfm_utils::wfm_log('asol', "EXIT by sugar_config WFM_disable", __FILE__, __METHOD__, __LINE__);
	exit();
}

require_once("modules/asol_Process/generateQuery_wfm.php");

global $db, $current_user;

$scheduled_info = Array();

if (!isset($_REQUEST['scheduled_info'])) {

	// Get Events of trigger_type=scheduled
	$events_query = $db->query("
									SELECT asol_events.id AS event_id, asol_events.name AS event_name, asol_events.scheduled_type AS scheduled_type, asol_events.scheduled_tasks AS scheduled_tasks, asol_events.created_by AS created_by, asol_process.trigger_module AS trigger_module, asol_process.alternative_database AS alternative_database
									FROM asol_events
									INNER JOIN asol_proces_asol_events_c ON (asol_proces_asol_events_c.asol_procea8ca_events_idb = asol_events.id AND asol_proces_asol_events_c.deleted = 0)
									INNER JOIN asol_process ON (asol_process.id = asol_proces_asol_events_c.asol_proce6f14process_ida AND asol_process.deleted = 0) 
									WHERE asol_events.trigger_type = 'scheduled' AND asol_events.scheduled_tasks IS NOT NULL AND asol_events.deleted = 0 AND asol_process.status = 'active'
								");
	$events = Array();
	while ($events_row = $db->fetchByAssoc($events_query)) {
		$events[] = $events_row;
	}
	wfm_utils::wfm_log('debug', '$events=['.print_r($events, true).']', __FILE__, __METHOD__, __LINE__);

	// Get Events that wakeup

	$currentW = gmdate("w");
	$currentJ = gmdate("j");
	$currentH = gmdate("H");
	$currentI = gmdate("i");
	$currentDate = gmdate("Y-m-d");

	$wakeup_events = Array();

	foreach ($events as $event) {
		wfm_utils::wfm_log('debug', '$event=['.print_r($event, true).']', __FILE__, __METHOD__, __LINE__);
		$scheduled_tasks = explode("|", $event['scheduled_tasks']);

		foreach ($scheduled_tasks as $task) {
			wfm_utils::wfm_log('debug', '$task=['.print_r($task, true).']', __FILE__, __METHOD__, __LINE__);

			// Remove tag GMT
			if (strpos($task, '${GMT}') !== false) {
				$task = substr($task, 0, -6);
			}

			$taskValues = explode(":", $task);
			$task_name = $taskValues[0];
			$execution_range = $taskValues[1];
			$dayValue = $taskValues[2];
			$timeValue = $taskValues[3];
			$execution_end_date = $taskValues[4];
			$task_state = $taskValues[5];

			$timeValue_array = explode(",", $timeValue);

			$min = $timeValue_array[1];
			$hour = $timeValue_array[0];

			if ($task_state == "active") {

				switch ($execution_range) {
					case "weekly":
						$dayWeek = $dayValue;
						$dayMonth = "-1";
						break;
					case "monthly":
						$dayWeek = "-1";
						$dayMonth = $dayValue;
						break;
					case "daily":
						$dayWeek = "-1";
						$dayMonth = "-1";
						break;
				}

				$add_wakeup_events = false;
				if (($currentDate <= $execution_end_date) || empty($execution_end_date)) {
					switch ($execution_range) {
						case 'monthly':
							if (($currentJ == $dayMonth) && ($currentH == $hour) && ($currentI == $min)) {
								$add_wakeup_events = true;
							}
							break;
						case 'weekly':
							if (($currentW == $dayWeek%7) && ($currentH == $hour) && ($currentI == $min)) {
								$add_wakeup_events = true;
							}
							break;
						case 'daily':
							if (($currentH == $hour) && ($currentI == $min)) {
								$add_wakeup_events = true;
							}
							break;
						case 'hourly':
							if ($currentI == $min) {
								$add_wakeup_events = true;
							}
							break;
					}
				}
				if ($add_wakeup_events) {
					//$wakeup_events[] = Array('event_id' => $event['event_id'], 'event_name' => $event['event_name'], 'scheduled_type' => $event['scheduled_type'], 'alternative_database' => $event['alternative_database'], 'trigger_module' => $event['trigger_module'], 'created_by' => $event['created_by']);
					$wakeup_events[] = $event;
					// Do not execute an event twice at the same time
					break;
				}

			}// End active task condition

		}
	}

	$log_level = (count($wakeup_events) == 0) ? 'debug' : 'asol';
	wfm_utils::wfm_log($log_level, '$wakeup_events=['.print_r($wakeup_events, true).']', __FILE__, __METHOD__, __LINE__);

	// Get objects from event_ids

	foreach ($wakeup_events as $wakeup_event) {

		/*
		 // Override current_user in order to run properly getObjectsIds_fromEventId
		 $externalUser = new User();
		 $current_user = $externalUser->retrieve($wakeup_event['created_by']);
		 */

		$current_user_id = $wakeup_event['created_by'];
		$current_user_id = (!empty($current_user_id)) ? $current_user_id : '1';
		$aux = wfm_utils::wfm_getHourOffset_and_TimeZone($current_user_id);
		$hourOffset = $aux['hourOffset'];
		$userTZ = $aux['userTZ'];

		$objectIds_fromEventId = generateQuery_wfm::getObjectsIds_fromEventId($wakeup_event['event_id'], $wakeup_event['alternative_database'], $wakeup_event['trigger_module'], $userTZ);

		$event_scheduled_info = Array(
			'event_id' => $wakeup_event['event_id'],
			'scheduled_type' => $wakeup_event['scheduled_type'],
			'alternative_database' => $wakeup_event['alternative_database'],
			'trigger_module' => $wakeup_event['trigger_module'],
			'num_objects' => count($objectIds_fromEventId),
			'iter_object' => 0,
			'object_ids' => $objectIds_fromEventId
		);

		if ($event_scheduled_info['num_objects'] > 0) {
			$scheduled_info[] = $event_scheduled_info;
		}
	}
} else {
	$scheduled_info = wfm_utils::wfm_convert_curl_parameter_to_array($_REQUEST['scheduled_info']);
}

wfm_utils::wfm_log('debug', '$scheduled_info=['.print_r($scheduled_info, true).']', __FILE__, __METHOD__, __LINE__);

// SEND OBJECT TO WFM
// curl to wfm_engine

if (empty($scheduled_info[0])) {
	wfm_utils::wfm_echo('scheduled_task', "<b>WFM executed.</b>");
	wfm_utils::wfm_log('asol', "EXIT 1", __FILE__, __METHOD__, __LINE__);
	exit();
}

switch ($scheduled_info[0]['scheduled_type']) {
	case 'sequential':
		$scheduled_event_info_string = wfm_utils::wfm_convert_array_to_curl_parameter($scheduled_info[0]);
		$query_string = "entryPoint=wfm_engine&execution_type=scheduled&scheduled_type={$scheduled_info[0]['scheduled_type']}&scheduled_event_info={$scheduled_event_info_string}";
		break;
	case 'parallel':
		$object_id = $scheduled_info[0]['object_ids'][$scheduled_info[0]['iter_object']];
		$query_string = "entryPoint=wfm_engine&execution_type=scheduled&scheduled_type={$scheduled_info[0]['scheduled_type']}&event_id={$scheduled_info[0]['event_id']}&alternative_database={$scheduled_info[0]['alternative_database']}&trigger_module={$scheduled_info[0]['trigger_module']}&num_objects={$scheduled_info[0]['num_objects']}&iter_object={$scheduled_info[0]['iter_object']}&object_id={$object_id}";
		break;
}

//**********cURL***********//
wfm_utils::wfm_log('asol', "********** cURL=[SEND WFM-EVENT TO workFlowManagerEngine.php] **********", __FILE__, __METHOD__, __LINE__);

wfm_utils::wfm_curl('post', null, $query_string, false, null); // timeout=null => Wait for response
//**********cURL***********//

// CONTINUE EXECUTING NEXT WFM-EVENT
// curl to wfm_scheduled_task

switch ($scheduled_info[0]['scheduled_type']) {
	case 'sequential':
		if (!empty($scheduled_info[1])) {
			array_shift($scheduled_info);
		} else {
			wfm_utils::wfm_echo('scheduled_task', "<b>WFM executed.</b>");
			wfm_utils::wfm_log('asol', "EXIT 2", __FILE__, __METHOD__, __LINE__);
			exit();
		}
		break;
	case 'parallel':
		$scheduled_info[0]['iter_object']++;

		if ($scheduled_info[0]['iter_object'] < $scheduled_info[0]['num_objects']) {
		} else {
			if (!empty($scheduled_info[1])) {
				array_shift($scheduled_info);
			} else {
				wfm_utils::wfm_echo('scheduled_task', "<b>WFM executed.</b>");
				wfm_utils::wfm_log('asol', "EXIT 3", __FILE__, __METHOD__, __LINE__);
				exit();
			}
		}
		break;
}

//**********cURL***********//
wfm_utils::wfm_log('asol', "********** cURL=[CONTINUE EXECUTING NEXT WFM-EVENT] **********", __FILE__, __METHOD__, __LINE__);

$scheduled_info_string = wfm_utils::wfm_convert_array_to_curl_parameter($scheduled_info);
$query_string = "entryPoint=wfm_scheduled_task&scheduled_info={$scheduled_info_string}";
wfm_utils::wfm_curl('post', null, $query_string, false, 1); // timeout=0 => Do not wait for response
//**********cURL***********//

wfm_utils::wfm_echo('scheduled_task', "<b>WFM executed.</b>");
wfm_utils::wfm_log('asol', "EXIT 4", __FILE__, __METHOD__, __LINE__);

?>