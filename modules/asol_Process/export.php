<?php

require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

global $db;

wfm_utils::wfm_log('debug', "ENTRY POINT \$_REQUEST=[".print_r($_REQUEST,true)."]", __FILE__, __METHOD__, __LINE__);

$export_array = Array();

//$process_id = $_REQUEST['process_id'];//////////////*************para el export_button.php

// extract process_ids from $_REQUEST
$process_ids_array = explode(',', $_REQUEST['uid']);

foreach($process_ids_array as $key_process_id => $value_process_id) {
	$process_query = $db->query ("
									SELECT *
									FROM asol_process
									WHERE id = '".$value_process_id."'
								");
	$process_row = $db->fetchByAssoc($process_query);

	$export_array['processes'][] = $process_row;
}

wfm_utils::wfm_log('debug', "1 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
///////////////////////////////

// search for events
foreach ($export_array['processes'] as $key_process => $value_process) {

	$event_ids_from_process__array = Array();
	$event_ids_from_process__query = $db->query("
													SELECT asol_procea8ca_events_idb AS event_id
													FROM asol_proces_asol_events_c
													WHERE asol_proce6f14process_ida = '".$value_process['id']."' AND deleted = 0
												");
	while ($event_ids_from_process__row = $db->fetchByAssoc($event_ids_from_process__query)) {
		$event_ids_from_process__array[] = $event_ids_from_process__row['event_id'];
	}
	//////////////
	foreach ($event_ids_from_process__array as $key_event_id => $value_event_id) {
		//$export_array['process']['event_ids'][] = $value_event_id;

		$event_query = $db->query ("
										SELECT *
										FROM asol_events
										WHERE id = '".$value_event_id."'
									");
		$event_row = $db->fetchByAssoc($event_query);

		$export_array['events'][$value_process['id']][] = $event_row;
	}
}
wfm_utils::wfm_log('debug', "2 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
////////////////////////////////

// search for activities

foreach ($export_array['events'] as $key_parent_process => $value_parent_process) {
	foreach ($value_parent_process as $key_event => $value_event) {
		$activity_ids_from_event__array = Array();
		$activity_ids_from_event__query = $db->query("
														SELECT asol_event8042ctivity_idb AS activity_id
														FROM asol_eventssol_activity_c
														WHERE asol_event87f4_events_ida = '".$value_event['id']."' AND deleted = 0
													");

		while ($activity_ids_from_event__row = $db->fetchByAssoc($activity_ids_from_event__query)) {
			$activity_ids_from_event__array[] = $activity_ids_from_event__row['activity_id'];
		}

		foreach ($activity_ids_from_event__array as $key_activity_id => $value_activity_id) {
			//$export_array['events'][$key_event]['activity_ids'][] = $value_activity_id;

			$activity_query = $db->query ("
											SELECT *
											FROM asol_activity
											WHERE id = '".$value_activity_id."'
										");
			$activity_row = $db->fetchByAssoc($activity_query);

			$export_array['activities'][$value_event['id']][] = $activity_row;
			//wfm_utils::wfm_log('debug', "3 part \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
		}
	}
}
wfm_utils::wfm_log('debug', "3 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
///////////////////

// search for next_activities from activities(from events)
function getNextActivities($activity_id, & $next_activities=array()){ // recursive

	wfm_utils::wfm_log('debug', "Executing getNextActivities function", __FILE__, __METHOD__, __LINE__);

	global $db;
	$next_activities_query = $db->query("
											SELECT asol_activ9e2dctivity_idb  AS next_activity_id
											FROM asol_activisol_activity_c
											WHERE asol_activ898activity_ida  = '".$activity_id."' AND deleted = 0
										");

	while($next_activities_row = $db->fetchByAssoc($next_activities_query)) {
		$next_activities[] = $next_activities_row['next_activity_id'];

		getNextActivities($next_activities_row['next_activity_id'], $next_activities);
	}

	return $next_activities;
}

$activity_ids = Array();

foreach ($export_array['activities'] as $key_parent_event => $value_parent_event) {
	foreach ($value_parent_event as $key_activity => $value_activity) {

		wfm_utils::wfm_log('debug', "\$activity_ids=[".print_r($activity_ids,true)."]", __FILE__, __METHOD__, __LINE__);
		if (!in_array($value_activity['id'], $activity_ids)) {	// Event duplicity.

			$next_activity_ids_all_tree = getNextActivities($value_activity['id']);

			wfm_utils::wfm_log('debug', "\$next_activity_ids_all_tree".print_r($next_activity_ids_all_tree,true), __FILE__, __METHOD__, __LINE__);

			foreach($next_activity_ids_all_tree as $key => $value) {
				//$export_array['activities'][$key_activity]['next_activity_ids'][] = $value;

				$next_activity_query = $db->query ("
													SELECT *
													FROM asol_activity
													WHERE id = '".$value."'
												");
				$next_activity_row = $db->fetchByAssoc($next_activity_query);

				//////////////
				$parent_activity_query = $db->query("
													SELECT asol_activ898activity_ida   AS parent_activity_id
													FROM asol_activisol_activity_c
													WHERE asol_activ9e2dctivity_idb  = '".$next_activity_row['id']."' AND deleted = 0
												");
				$parent_activity_row = $db->fetchByAssoc($parent_activity_query);
				/////////////

				$export_array['next_activities'][$parent_activity_row['parent_activity_id']][] = $next_activity_row;
			}
			
			$activity_ids[] = $value_activity['id'];
		}
		else {
			wfm_utils::wfm_log('debug', "Event duplicity", __FILE__, __METHOD__, __LINE__);
		}
	}
}
wfm_utils::wfm_log('debug', "4 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
////////////////////////////////////////////

// search for tasks from activities(from events)
$event_duplicity = Array();

foreach ($export_array['activities'] as $key_parent_event => $value_parent_event) {

	foreach($value_parent_event as $key_activity => $value_activity) {
		
		if (in_array($value_activity['id'], $event_duplicity)) {
			continue;
		}
		$event_duplicity[] = $value_activity['id'];

		$task_ids_from_activity__array = Array();
		$task_ids_from_activity__query = $db->query("
													SELECT asol_activf613ol_task_idb AS task_id
													FROM asol_activity_asol_task_c
													WHERE asol_activ5b86ctivity_ida = '".$value_activity['id']."' AND deleted = 0
												");
		while ($task_ids_from_activity__row = $db->fetchByAssoc($task_ids_from_activity__query)) {
			$task_ids_from_activity__array[] = $task_ids_from_activity__row['task_id'];
		}

		foreach ($task_ids_from_activity__array as $key_task_id => $value_task_id) {
			//$export_array['activities'][$key_activity]['task_ids'][] = $value_task_id;

			$task_query = $db->query ("
										SELECT *
										FROM asol_task
										WHERE id = '".$value_task_id."'
									");
			$task_row = $db->fetchByAssoc($task_query);

			$export_array['tasks'][$value_activity['id']][] = $task_row;
		}
	}
}

wfm_utils::wfm_log('debug', "5 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
//////////////////////////////////////////////

// search for tasks from activities(from next_activities)
foreach ($export_array['next_activities'] as $key_parent_activity => $value_array_next_activities) {

	foreach($value_array_next_activities as $key_activity => $value_activity) {

		$task_ids_from_activity__array = Array();
		$task_ids_from_activity__query = $db->query("
													SELECT asol_activf613ol_task_idb AS task_id
													FROM asol_activity_asol_task_c
													WHERE asol_activ5b86ctivity_ida = '".$value_activity['id']."' AND deleted = 0
												");
		while ($task_ids_from_activity__row = $db->fetchByAssoc($task_ids_from_activity__query)) {
			$task_ids_from_activity__array[] = $task_ids_from_activity__row['task_id'];
		}

		foreach ($task_ids_from_activity__array as $key_task_id => $value_task_id) {
			//$export_array['next_activities'][$key_activity]['task_ids'][] = $value_task_id;

			$task_query = $db->query ("
										SELECT *
										FROM asol_task
										WHERE id = '".$value_task_id."'
									");
			$task_row = $db->fetchByAssoc($task_query);

			$export_array['tasks'][$value_activity['id']][] = $task_row;
		}
	}
}

wfm_utils::wfm_log('debug', "6 FINAL \$export_array=[".print_r($export_array,true)."]", __FILE__, __METHOD__, __LINE__);
///////////////////////////////

$serialized_export_array = serialize($export_array);

$exported_process = 'exported_processes';

setcookie("fileDownloadToken", "token"); // blockUI
header("Cache-Control: private");
header("Content-Type: application/octet-stream");
header('Content-Disposition: attachment; filename="'.$exported_process.'.txt"');
header("Content-Description: File Transfer");
header("Content-Transfer-Encoding: binary");
header("Content-Length: ".mb_strlen($serialized_export_array, '8bit'));
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Pragma: public");

ob_clean();
flush();

echo $serialized_export_array;

wfm_utils::wfm_log('debug', "EXIT", __FILE__);

exit;

?>