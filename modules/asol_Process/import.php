<?php

require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");
wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

global $db;

$name = $_FILES['imported_process']['name'];
$tmpName = $_FILES['imported_process']['tmp_name'];
//$name = "imported_process";

//guardamos el archivo a la carpeta files
$target =  getcwd()."/modules/asol_Process/_temp_Imported_Files/".$name."_".time().".txt";

copy($tmpName,$target);

$descriptor = fopen($target, "r");

$serialized_process = fread($descriptor, filesize($target));
wfm_utils::wfm_log('debug', "FINAL \$serialized_process=[".print_r($serialized_process,true)."]", __FILE__, __METHOD__, __LINE__);
$imported_process = unserialize($serialized_process);

fclose($descriptor);
unlink($target);

wfm_utils::wfm_log('debug', "FINAL \$imported_process=[".print_r($imported_process,true)."]", __FILE__, __METHOD__, __LINE__);

$old_ids__and__new_ids__process__array = Array();

require_once('modules/asol_Process/asol_Process.php');
if (array_key_exists('processes', $imported_process)) {
	foreach ($imported_process['processes'] as $key_process => $value_process) {
		$focus_process = new asol_Process();
		$focus_process->name 					= $value_process['name'];
		$focus_process->date_entered 			= $value_process['date_entered'];
		//$focus_process->date_modified 		= $value_process['date_modified'];//*************ni le hace caso, debe ponerlo en el save()
		$focus_process->modified_user_id 		= $value_process['modified_user_id'];
		$focus_process->created_by 				= $value_process['created_by'];
		$focus_process->description 			= $value_process['description'];
		$focus_process->deleted 				= $value_process['deleted'];
		$focus_process->assigned_user_id 		= $value_process['assigned_user_id'];
		$focus_process->status 					= $value_process['status'];
		$focus_process->trigger_module			= $value_process['trigger_module'];
		$focus_process->alternative_database	= $value_process['alternative_database'];
		$new_process_id 						= $focus_process->save();

		$old_ids__and__new_ids__process__array[$value_process['id']] = $new_process_id;
	}
}
//////////////////////////////////////////////////////////////////////

$old_ids__and__new_ids__event__array = Array();

require_once('modules/asol_Events/asol_Events.php');
if (array_key_exists('events', $imported_process)) {
	foreach ($imported_process['events'] as $key_parent_process => $value_parent_process) {
		foreach ($value_parent_process as $key_event => $value_event) {
			// id 	name 	date_entered 	date_modified 	modified_user_id 	created_by 	description 	deleted 	assigned_user_id 	type 	trigger_type 	trigger_event 	conditions
			$focus_event = new asol_Events();
			$focus_event->name 				= $value_event['name'];
			$focus_event->date_entered 		= $value_event['date_entered'];
			//$focus_event->date_modified	 	= $value_event['date_modified'];
			$focus_event->modified_user_id 	= $value_event['modified_user_id'];
			$focus_event->created_by 		= $value_event['created_by'];
			$focus_event->description 		= $value_event['description'];
			$focus_event->deleted 			= $value_event['deleted'];
			$focus_event->assigned_user_id 	= $value_event['assigned_user_id'];
			$focus_event->type 				= $value_event['type'];
			$focus_event->trigger_type 		= $value_event['trigger_type'];
			$focus_event->trigger_event 	= $value_event['trigger_event'];
			$focus_event->conditions 		= $value_event['conditions'];
			$focus_event->scheduled_type	= $value_event['scheduled_type'];
			$focus_event->scheduled_tasks	= $value_event['scheduled_tasks'];
			$new_event_id = $focus_event->save();

			$old_ids__and__new_ids__event__array[$value_event['id']] = $new_event_id;

			////////////////
			//asol_proces_asol_events_c			id 	date_modified 	deleted 	asol_proce6f14process_ida 	asol_procea8ca_events_idb

			$db->query("
						INSERT INTO asol_proces_asol_events_c
						VALUES ('".create_guid()."', '".gmdate('Y-m-d H:i:s')."', 0, '".$old_ids__and__new_ids__process__array[$key_parent_process]."', '".$new_event_id."')
					");
		}
	}
}
////////////////////////////////////////////////////////////////////

$old_ids__and__new_ids__activity__array = Array();

require_once('modules/asol_Activity/asol_Activity.php');
if (array_key_exists('activities', $imported_process)) {
	foreach ($imported_process['activities'] as $key_parent_event => $value_parent_event) {
		foreach ($value_parent_event as $key_activity => $value_activity) {

			wfm_utils::wfm_log('debug', "\$old_ids__and__new_ids__activity__array=[".print_r($old_ids__and__new_ids__activity__array,true)."]", __FILE__, __METHOD__, __LINE__);
			if (!array_key_exists($value_activity['id'], $old_ids__and__new_ids__activity__array)) {	// Event duplicity.
				// id 	name 	date_entered 	date_modified 	modified_user_id 	created_by 	description 	deleted 	assigned_user_id 	conditions 	delay
				$focus_activity = new asol_Activity();
				$focus_activity->name 				= $value_activity['name'];
				$focus_activity->date_entered 		= $value_activity['date_entered'];
				//$focus_activity->date_modified 		= $value_activity['date_modified'];
				$focus_activity->modified_user_id 	= $value_activity['modified_user_id'];
				$focus_activity->created_by 		= $value_activity['created_by'];
				$focus_activity->description 		= $value_activity['description'];
				$focus_activity->deleted 			= $value_activity['deleted'];
				$focus_activity->assigned_user_id 	= $value_activity['assigned_user_id'];
				$focus_activity->conditions 		= $value_activity['conditions'];
				$focus_activity->delay 				= $value_activity['delay'];
				$new_activity_id 					= $focus_activity->save();

				$old_ids__and__new_ids__activity__array[$value_activity['id']] = $new_activity_id;
			}
			else {
				wfm_utils::wfm_log('debug', "Event duplicity", __FILE__, __METHOD__, __LINE__);
			}
			////////////////
			//asol_eventssol_activity_c			id 	date_modified 	deleted 	asol_event87f4_events_ida 	asol_event8042ctivity_idb

			$db->query("
						INSERT INTO asol_eventssol_activity_c
						VALUES ('".create_guid()."', '".gmdate('Y-m-d H:i:s')."', 0, '".$old_ids__and__new_ids__event__array[$key_parent_event]."', '".$new_activity_id."')
					");
		}
	}
}
////////////////////////////////////////////////////////////////////

//$old_ids__and__new_ids__next_activity__array = Array();        ----------> activities and next_activities in the same array

require_once('modules/asol_Activity/asol_Activity.php');
if (array_key_exists('next_activities', $imported_process)) {
	foreach ($imported_process['next_activities'] as $key_parent_activity => $value_parent_activity) {
		foreach ($value_parent_activity as $key_next_activity => $value_next_activity) {
			// id 	name 	date_entered 	date_modified 	modified_user_id 	created_by 	description 	deleted 	assigned_user_id 	conditions 	delay
			$focus_next_activity = new asol_Activity();
			$focus_next_activity->name 					= $value_next_activity['name'];
			$focus_next_activity->date_entered 			= $value_next_activity['date_entered'];
			//$focus_next_activity->date_modified 		= $value_next_activity['date_modified'];
			$focus_next_activity->modified_user_id 		= $value_next_activity['modified_user_id'];
			$focus_next_activity->created_by 			= $value_next_activity['created_by'];
			$focus_next_activity->description 			= $value_next_activity['description'];
			$focus_next_activity->deleted 				= $value_next_activity['deleted'];
			$focus_next_activity->assigned_user_id 		= $value_next_activity['assigned_user_id'];
			$focus_next_activity->conditions 			= $value_next_activity['conditions'];
			$focus_next_activity->delay 				= $value_next_activity['delay'];
			$new_next_activity_id 						= $focus_next_activity->save();

			$old_ids__and__new_ids__activity__array[$value_next_activity['id']] = $new_next_activity_id;

			////////////////
			//asol_activisol_activity_c			id 	date_modified 	deleted 	asol_activ898activity_ida 	asol_activ9e2dctivity_idb

			$db->query("
						INSERT INTO asol_activisol_activity_c
						VALUES ('".create_guid()."', '".gmdate('Y-m-d H:i:s')."', 0, '".$old_ids__and__new_ids__activity__array[$key_parent_activity]."', '".$new_next_activity_id."')
					");
		}
	}
}
////////////////////////////////////////////////////////////////////

//$old_ids__and__new_ids__activity__array = Array();        -------------> Tasks have no children

require_once('modules/asol_Task/asol_Task.php');
if (array_key_exists('tasks', $imported_process)) {
	foreach ($imported_process['tasks'] as $key_parent_activity => $value_parent_activity) {
		foreach ($value_parent_activity as $key_task => $value_task) {
			// id 	name 	date_entered 	date_modified 	modified_user_id 	created_by 	description 	deleted 	assigned_user_id 	delay_type 	delay 	task_type 	task_order 	task_implementation
			$focus_task = new asol_Task();
			$focus_task->name 					= $value_task['name'];
			$focus_task->date_entered 			= $value_task['date_entered'];
			//$focus_task->date_modified 		= $value_task['date_modified'];
			$focus_task->modified_user_id 		= $value_task['modified_user_id'];
			$focus_task->created_by 			= $value_task['created_by'];
			$focus_task->description 			= $value_task['description'];
			$focus_task->deleted 				= $value_task['deleted'];
			$focus_task->assigned_user_id 		= $value_task['assigned_user_id'];
			$focus_task->delay_type 			= $value_task['delay_type'];
			$focus_task->delay 					= $value_task['delay'];
			$focus_task->task_type 				= $value_task['task_type'];
			$focus_task->task_order 			= $value_task['task_order'];
			$focus_task->task_implementation 	= $value_task['task_implementation'];
			$new_task_id 						= $focus_task->save();

			//$old_ids__and__new_ids__activity__array[$value_activity['id']] = $new_activity_id;

			////////////////
			//asol_activity_asol_task_c			id 	date_modified 	deleted 	asol_activ5b86ctivity_ida 	asol_activf613ol_task_idb

			$db->query("
						INSERT INTO asol_activity_asol_task_c
						VALUES ('".create_guid()."', '".gmdate('Y-m-d H:i:s')."', 0, '".$old_ids__and__new_ids__activity__array[$key_parent_activity]."', '".$new_task_id."')
					");
			
			if ($focus_task->task_type == "php_custom") {
				wfm_utils::wfm_SavePhpCustomToFile($new_task_id, $focus_task->task_implementation);
			}
		}
	}
}
////////////////////////////////////////////////////////////////////

wfm_utils::wfm_echo('import', "The WorkFlows have been imported.");

wfm_utils::wfm_log('debug', "EXIT", __FILE__);
?>