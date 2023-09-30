<?php
//////////////////////////////////////////////////////////////////////////////////
////////////*************DEPRECATE FUNCTION VERSIONS*************/////////////////
//////////////////////////////////////////////////////////////////////////////////

function getWorkingNodes($process_instance_id, $process_execution_index) { //Return the actual working nodes for a running process_instance// recalculate the working nodes

	global $db;
	
	$workingNodes = array();

	if (!empty($process_instance_id)) {

		$workingNodesQuery = $db->query("
											SELECT id, status, current_activity, current_task 
											FROM wfm_working_nodes 
											WHERE (  process_instance_id = '".$process_instance_id."' AND execution_index=".$process_execution_index." AND status IN('in_progress', 'not_started')  )
										");
			
		while ($workingNodesRow = $db->fetchByAssoc($workingNodesQuery)) {
			$workingNodes[] = array ('id' => $workingNodesRow['id'], 'status' => $workingNodesRow['status'], 'current_activity' => $workingNodesRow['current_activity'], 'current_task' => $workingNodesRow['current_task']);//See what information about a working node must be added to the returned array
		}
	}

	return $workingNodes;

}


function getInitialWorkingNodes($process_instance_id, $executionType, $bean_id) {	//This function will be replaced by initialize_process_instance

	global $db;
	$initialWorkingNodes = array();

	if (!empty($process_instance_id)) {

		switch ($executionType) {

			case "logic_hook":
				$initialWorkingNodesQuery = $db->query("SELECT id, current_activity, current_task  FROM wfm_working_nodes WHERE process_instance_id = '".$process_instance_id."' AND status = 'not_started'");
				break;

			case "crontab":
				$initialWorkingNodesQuery = $db->query("SELECT id, current_activity, current_task  FROM wfm_working_nodes WHERE process_instance_id = '".$process_instance_id."' AND status = 'delayed'");
				break;

			case "on_hold":
				$initialWorkingNodesQuery = $db->query("SELECT id, current_activity, current_task  FROM wfm_working_nodes WHERE process_instance_id = '".$process_instance_id."' AND status = 'holded'");
				break;
					
		}

		//Check if nodes applies conditions to execute (only if current_task is the first one: "equals null")
		while ($initialWorkingNodesRow = $db->fetchByAssoc($initialWorkingNodesQuery))
		$initialWorkingNodes[] = array ('id' => $initialWorkingNodesRow['id'], 'current_activity' => $initialWorkingNodesRow['current_activity'], 'current_task' => $initialWorkingNodesRow['current_task']);//See what information about a working node must be added to the returned array


	}

	return $initialWorkingNodes;

}


//This function will be defines within functions.php script
//$process_instance param in this function contains an array with info about the active process instance (mainly the instance_id & the execution_index)
function execute_process__dany_not_tested($process_instance, $workingNodes, $executionType = "logic_hook") { //function that executes a certain process.

	$working_nodes = $workingNodes;

	/*
	 $working_nodes = Array();
	 $working_nodes = getWorkingNodes($process_instance_id, $executionType);
	 */

	$tokens = countTokens($process_instance['instance_id'], $process_instance['execution_index']); //Function that returns the numbers of active nodes for the current process. �count($workingNodes)?
	$delayedNodes = 0;

	if (empty($working_nodes)) { //If there are no working nodes for the current process, the process ends... delete entries in the database for that process

		$db->query("DELETE FROM wfm_working_nodes WHERE process_instance_id='".$process_instance['instance_id']."' AND process_execution_index=".$process_instance['execution_index']);
		$db->query("DELETE FROM wfm_on_hold_tasks WHERE process_instance_id='".$process_instance['instance_id']."' AND process_execution_index=".$process_instance['execution_index']);
		$db->query("DELETE FROM wfm_process_instance WHERE instance_id='".$process_instance['instance_id']."' AND execution_index=".$process_instance['execution_index']);

	}

	while (($tokens - $delayedNodes) > 0) { //While more than zero nodes ative, execute them

		foreach ($working_nodes as $keyN=>$node) {

			$activityDelay = getActivityDelay($node['current_activity']);

			if ((empty($node['current_task'])) && ($activityDelay)) {

				$db->query("UPDATE wfm_working_nodes SET status='delayed', wakeup_time_delay='".calculateWakeUpDelay($activityDelay)."' WHERE id='".$node['id']."'");

				$delayedNodes++;
				$db->query("UPDATE wfm_process_instance SET delayed_nodes=".$delayedNodes." WHERE instance_id='".$process_instance['instance_id']."' AND execution_index=".$process_instance['execution_index']." LIMIT 1");
				break; //Breaks the foreach loop and continues with the next node

			} else {
					
				//Initialize nodes at in_progress status
				$db->query("UPDATE wfm_working_nodes SET status='in_progress' WHERE id='".$node['id']."'");

				//Get tasks to execute for current node activity
				$tasksQuery = $db->query("SELECT asol_task.* FROM asol_task LEFT JOIN asol_activity_asol_task_c ON asol_activity_asol_task_c.asol_activf613ol_task_idb=asol_task.id WHERE asol_activity_asol_task_c.asol_activ5b86ctivity_ida='".$node['current_activity']."' ORDER BY asol_task.order");
				$tasks = Array();
				while ($rowTask = $db->fetchByAssoc($tasksQuery))
				$tasks[] = $rowTask;
					
					
				//Supress tasks that has been already executed based on $node['current_task']. If current_task is 'null', the current task will be the first task of the current activity
				if ($node['current_task'] != 'null') {
					$i=0;
					while ($tasks[$i] != $node['current_task'])
					$i++;

					$tasks = array_slice($tasks, $i);

				}


				//Execute obtained tasks
				foreach ($tasks as $keyT=>$task) {

					$taskDelayStartTime = getTaskStartDelayTime($task['delay_type'], $task['delay'], $wfm_module, $wfm_bean_id);

					if (!$taskDelayStartTime) { //If current task has no delay, execute it

						$executeResult = executeTask($task['task_type'], $task['task_implementation']);	//Everu task execution will return true if is succesfull (an id if is a create or a modify object)
							
						//If current activity has more than one next activity, add related entries to the databse table working_nodes & increase the number of tokens for current process
						$nextTask = (!empty($tasks[$keyT+1]['id'])) ? $tasks[$keyT+1]['id'] : null;
						$nextActivity = getNextActivity($node['current_activity'], $nextTask, $process_instance['bean_module'], $process_instance['bean_id']); //function that returns an array with next activities for the current node, if next activity is the actual activity, return the actual activity.
							

						if (count($nextActivity) >= 2) {

							//End current node and add to DB the new bifurcated nodes
							$db->query("UPDATE wfm_working_nodes SET status='terminated' WHERE id='".$node['id']."'");

							foreach ($nextActivity as $newNode)
							$db->query("INSERT INTO wfm_working_nodes VALUES ('".create_guid()."', '".$process_instance['instance_id']."', '".$process_instance['execution_index']."', '".gmdate("Y-m-d H:i:s")."', '".gmdate("Y-m-d H:i:s")."', '".$newNode."', null, '0000-00-00 00:00:00', '".$current_user->id."', 'not_started')");

							//Update Toekns for instance (number of new nodes -1)
							$tokens = $tokens + (count($nextActivity)) - 1;
							$db->query("UPDATE wfm_process_instance SET tokens=".$tokens." WHERE id='".$process_instance['instance_id']."' AND execution_index=".$process_instance['execution_index']." LIMIT 1");


						} else if (count($nextActivity) == 1) {

							//Update current_activity (if task executed is the last one) and current_task
							if (count($tasks) == ($keyT+1))
							$db->query("UPDATE wfm_working_nodes SET current_activity='".$nextActivity[0]."' WHERE id='".$node['id']."' LIMIT 1");

							//Update current task for current node
							if ($nextTask != null) //If not null
							$db->query("UPDATE wfm_working_nodes SET current_task='".$nextTask."' WHERE id='".$node['id']."'");
							else //If yes
							$db->query("UPDATE wfm_working_nodes SET current_task=null WHERE id='".$node['id']."'");


							if (checkUpdateOnHold($task['id'], $nextTask, $process_instance['instance_id'], $process_instance['execution_index'], $node['id'], $executeResult))
							break;

						} else {

							//End current node & uppdate tokens-- for the process instance
							$db->query("UPDATE wfm_working_nodes SET status='terminated' WHERE id='".$node['id']."'");

							$tokens = $tokens--;
							$db->query("UPDATE wfm_process_instance SET tokens=".$tokens." WHERE id='".$process_instance['instance_id']."' AND execution_index=".$process_instance['execution_index']." LIMIT 1");

						}

					} else { //If current task has delay, update the node in the database with status delayed and the expected wakeup_time_delay,

						$db->query("UPDATE wfm_working_nodes SET status='delayed', wakeup_time_delay='".calculateWakeUpDelay($task['delay'], $taskDelayTime)."' WHERE id='".$node['id']."'");

						$delayedNodes++;
						$db->query("UPDATE wfm_process_instance SET delayed_nodes=".$delayedNodes." WHERE instance_id='".$process_instance['instance_id']."' AND execution_index=".$process_instance['execution_index']." LIMIT 1");
						break; //Breaks the foreach loop and continues with the next node

					}

				}
					
			}


		}

		//After execute the actual working nodes, update the current working_nodes array
		$working_nodes = getWorkingNodes($process_instance['instance_id'], $process_instance['execution_index']);

	}

}


function initialize_processes__with_event_differentation__it_works($wfm_module, $wfm_action, $bean_id, $executionType = "logic_hook" ) {   // executionType=call o task -> es para esperar por call o task de sugar

	global $db, $sugar_config;
	
	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;
		
	//global $current_user;

	$current_user_id = (isset($_REQUEST['current_user_id'])) ? $_REQUEST['current_user_id'] : "problem";

	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: " . "bean_id=" . $bean_id . " wfm_engine_functions.php function initialize_processes********************************************************************************************************************************************************************************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: " . "bean_id=" . $bean_id . " wfm_engine_functions.php function initialize_processes********************************************************************************************************************************************************************************************************");
	// Get events with the right trigger_event.

	$trigger_module = $wfm_module;
	$trigger_event = $wfm_action;
	$trigger = $trigger_module . " - " . $trigger_event;

	$event_query = $db->query("
								SELECT id, condition_event  FROM asol_events
								WHERE trigger_event = '" . $trigger .  "'							  
							  ");

	$events_let = Array(); // This array contains just events that are compliant to the trigger_event. Two fields: id, condition_event.
	while ($event_row = $db->fetchByAssoc($event_query)) {
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: inside while-event-trigger print event_row " . print_r($event_row,true) . "*******************************************");
		else
			$GLOBALS['log']->debug("*********************** ASOL: inside while-event-trigger print event_row " . print_r($event_row,true) . "*******************************************");
		$events_let[] = $event_row;
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: after while-event-trigger print events_let " . print_r($events_let,true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: after while-event-trigger print events_let " . print_r($events_let,true) . "*******************************************");


	// Check conditions for each event. ( The bean�s characteristics have to match with the event�s conditions ).

	$events_condition_let = Array(); // This array contains just events that applies condition_event ( and trigger_event, of course ).
	foreach ($events_let as $key => $value) {
		
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions print value " . print_r($value,true) . "*******************************************");
		else 
			$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions print value " . print_r($value,true) . "*******************************************");
		
		if (  true ) { // This function is used to know if the event applies conditions. appliesConditions($bean_module, $bean_id, $value['condition_event']) ||
			$events_condition_let[] = $value['id'];
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions-if print value" . print_r($value,true) . " applies" . "*******************************************");
			else
				$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions-if print value" . print_r($value,true) . " applies" . "*******************************************");
		}
		else {
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions-else print value " . print_r($value,true) . " NOT applies" . "*******************************************");
			else
				$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions-else print value " . print_r($value,true) . " NOT applies" . "*******************************************");
		}
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: after foreach-event-conditions print events_condition_let " . print_r($events_condition_let,true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: after foreach-event-conditions print events_condition_let " . print_r($events_condition_let,true) . "*******************************************");
		
	// For each event, we get its process. (Events are trigger-condition-compliant).

	$processes_events__trigger_condition_let = Array(); // [0->[process_idX, event_id0],1->[process_id(X o Y), event_id1],...,n->[process_id(X), event_idn]]
	foreach ($events_condition_let as $key => $value) {
		$process_query = $db->query("
										SELECT asol_proce6f14process_ida AS process_id,  asol_procea8ca_events_idb AS event_id FROM asol_proces_asol_events_c
										WHERE asol_procea8ca_events_idb = '" . $value . "'											
									");
		$process_row = $db->fetchByAssoc($process_query);
		$processes_events__trigger_condition_let[] = $process_row;
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: processes_events__trigger_condition_let " . print_r($processes_events__trigger_condition_let, true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: processes_events__trigger_condition_let " . print_r($processes_events__trigger_condition_let, true) . "*******************************************");
	// For each event, we get its activities(all from the event).

	$events_activities_let = Array(); // [0->[event_idX, activity_id0],..., ]
	foreach ($events_condition_let as $key => $value) {
		$activity_query = $db->query("
										SELECT asol_event87f4_events_ida AS event_id, asol_event8042ctivity_idb AS activity_id FROM asol_eventssol_activity_c
										WHERE asol_event87f4_events_ida = '" . $value . "'
									 ");
		while ($activity_row = $db->fetchByAssoc($activity_query)) {
			$events_activities_let[] = $activity_row;
		}
		
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: events_activities_let-PARTY " . print_r($events_activities_let, true) . "value=" .$value . "*******************************************");
		else
			$GLOBALS['log']->debug("*********************** ASOL: events_activities_let-PARTY " . print_r($events_activities_let, true) . "value=" .$value . "*******************************************");
			
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: events_activities_let-TOTAL " . print_r($events_activities_let, true) . "*******************************************");
	else 
		$GLOBALS['log']->debug("*********************** ASOL: events_activities_let-TOTAL " . print_r($events_activities_let, true) . "*******************************************");
		
	// Now, we are going to filter the activities by their conditions
	$processes_events_activities__filter_by_conditions__let = Array(); // [0->[process_idZY, event_idX, activity_id0, condition_activity], ... , n->[process_idYX, event_idZX, activity_idn, condition_activity]] <- This activities are all that applies all conditions.(!!!!!ojo dos eventos que referencien una misma actividad)
	foreach ($events_activities_let as $key => $value) {

		$condition_activity_query = $db->query("
													SELECT asol_proces_asol_events_c.asol_proce6f14process_ida AS process_id , asol_proces_asol_events_c.asol_procea8ca_events_idb AS event_id , asol_events.type AS event_type, asol_events.condition_event AS condition_event, asol_activity.id AS activity_id , asol_activity.condition_activity AS condition_activity 
													FROM asol_activity
													INNER JOIN asol_eventssol_activity_c ON asol_eventssol_activity_c.asol_event8042ctivity_idb = asol_activity.id
													INNER JOIN asol_events ON asol_events.id = asol_eventssol_activity_c.asol_event87f4_events_ida
													INNER JOIN asol_proces_asol_events_c ON asol_proces_asol_events_c.asol_procea8ca_events_idb = asol_events.id
													WHERE asol_activity.id = '" . $value['activity_id'] . "'
											   ");
		$condition_activity_row = $db->fetchByAssoc($condition_activity_query);

		if (  true ) { // This function is used to know if the activity applies conditions.appliesConditions($bean_module, $bean_id, $condition_activity_row['condition_activity'])||
			$processes_events_activities__filter_by_conditions__let[] = $condition_activity_row;
		}
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: processes_events_activities__filter_by_conditions__let " . print_r($processes_events_activities__filter_by_conditions__let, true) . "*******************************************");
	else 
		$GLOBALS['log']->debug("*********************** ASOL: processes_events_activities__filter_by_conditions__let " . print_r($processes_events_activities__filter_by_conditions__let, true) . "*******************************************");

	/*
	 * It is turn to introduce the information into the tables($db).
	 * wfm_process_instance row    1--------->n    wfm_working_nodes
	 * Information is intended to show how many activities have applied the conditions.
	 * There are to tables.
	 * 		1)wfm_working_nodes stores in its rows which activity belongs to which process_instance.
	 * 		2)wfm_process_instance just stores the process_instance�s id and how many activities there are by process, i.e., the tokens.
	 */

	$already_stored_processes = Array(); // Contains the processes that have already been read.
	$already_stored_events = Array(); // Contains the events that have already been read. (No need to have an array of events by process, because the event_id is unique.)
	$already_stored_activities__event_duplicity = Array(); // Contains the activities that already have been stored in wfm_working_node. <- Two or more events can link one activity; we don�t want to execute the same activity twice or more times, just once.
	foreach ($processes_events_activities__filter_by_conditions__let as $key => $value) {
		if (!(in_array($value['activity_id'], $already_stored_activities__event_duplicity))) {
			$already_stored_activities__event_duplicity[] = $value['activity_id'];//*********************puede que esto tenga que ir al final del if, por el tema del appliesConditions , lo de dos Events que apuntan a una misma Activity ...
			
			if ($asolLogLevelEnabled) {
				$GLOBALS['log']->asol("*********************** ASOL: activity_id is NOT in array");
				$GLOBALS['log']->asol("*********************** ASOL: already_stored_activities__event_duplicity " . print_r($already_stored_activities__event_duplicity, true) . "*******************************************");
			} else {
				$GLOBALS['log']->debug("*********************** ASOL: activity_id is NOT in array");
				$GLOBALS['log']->debug("*********************** ASOL: already_stored_activities__event_duplicity " . print_r($already_stored_activities__event_duplicity, true) . "*******************************************");
			}
			
			if (in_array($value['process_id'], $already_stored_processes)) { // Modifies a already created process_instance row in $db (tokens) OR creates a new row with an already created process_instance_id, it creates a new execution_index; what is really new is the field wfm_process_instance.id
				
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: process_id is in array");
				else 
					$GLOBALS['log']->debug("*********************** ASOL: process_id is in array");

				if (in_array($value['event_id'], $already_stored_events)) { // If the event_id has already been kept in mind
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: event_id is in array");
					else
						$GLOBALS['log']->debug("*********************** ASOL: event_id is in array");
					
					switch ($value['event_type']) {
						case 'start' :
							break;
						case 'intermediate' : // Without break is intented to execute the same as cancel event.
						case 'cancel' :
							break;
						default:

					}

					$db->query("
									UPDATE wfm_process_instance SET tokens = (tokens + 1)
									WHERE (process_id = '".$value['process_id']."' AND event_id = '".$value['event_id']."' AND bean_id = '".$bean_id."') 
							   ");

					$already_stored_event_query_2 = $db->query("
																	SELECT process_instance_id, process_id, event_id, event_type, execution_index FROM wfm_process_instance
																	WHERE (process_id = '".$value['process_id']."' AND event_id = '".$value['event_id']."' AND bean_id = '".$bean_id."') 
															   ");
					$already_stored_event_row_2 = $db->fetchByAssoc($already_stored_event_query_2);


					$id = create_guid();
					$process_instance_id = $already_stored_event_row_2['process_instance_id'];
					$execution_index = $already_stored_event_row_2['execution_index'];
					$date_entered = gmdate('Y-m-d H:i:s');
					$date_modified = gmdate('Y-m-d H:i:s');
					$current_activity = $value['activity_id'];
					$current_task = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
					$delay_wakeup_time = '0000-00-00 00:00:00';
					$created_by = $current_user_id;
					$status = 'not_started';
					$db->query("INSERT INTO wfm_working_nodes VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')");


				}
				else { // If the event_id has not been borne in mind yet, we have to store it to the $db
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: event_id is NOT in array");
					else 
						$GLOBALS['log']->debug("*********************** ASOL: event_id is NOT in array");
					
					$already_stored_events[] = $value['event_id'];
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
					else 	
						$GLOBALS['log']->debug("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");

					switch ($value['event_type']) {
						case 'start' : // execution_index = 0 by definition for all start events
							$execution_index = 0;
							break;
						case 'intermediate' : // Without break is intented to execute the same as cancel event.
						case 'cancel' :
							$event_not_stored_yet__query_2 = $db->query("
																			SELECT MAX(execution_index) AS max_index FROM wfm_process_instance
																			WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."') 
															 			");// Be careful with this query, it�s not like when the event_id is in the array. This event_id has not been stored yet.
							$event_not_stored_yet__row_2 = $db->fetchByAssoc($event_not_stored_yet__query_2);
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: event_not_stored_yet__row_2=" .print_r($event_not_stored_yet__row_2,true));
							else
								$GLOBALS['log']->debug("*********************** ASOL: event_not_stored_yet__row_2=" .print_r($event_not_stored_yet__row_2,true));
							
							$execution_index = $event_not_stored_yet__row_2['max_index'] + 1;
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: execution_index=" .$execution_index);
							else
								$GLOBALS['log']->debug("*********************** ASOL: execution_index=" .$execution_index);
								
							break;
						default:
					}

					$event_not_stored_yet__query_3 = $db->query("
																	SELECT process_instance_id, process_id, event_id, event_type, execution_index, tokens FROM wfm_process_instance
																	WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."') 
															   ");// Be careful with this query, it�s not like when the event_id is in the array. This event_id has not been stored yet.
					$event_not_stored_yet__row_3 = $db->fetchByAssoc($event_not_stored_yet__query_3);



					$id = create_guid();
					$process_instance_id = $event_not_stored_yet__row_3['process_instance_id'];

					$process_id = $value['process_id'];
					$event_id = $value['event_id'];
					$event_type = $value['event_type'];

					$tokens = 1;
					$delayed_nodes = 0;
					$is_child = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
					$parent_process_id = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
					$db->query("INSERT INTO wfm_process_instance VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$process_id."', '".$event_id."', '".$event_type."', '".$bean_id."', '".$wfm_module."', ".$tokens.", ".$delayed_nodes.", ".$is_child.", ".$parent_process_id.")");


					$id = create_guid();
					$date_entered = gmdate('Y-m-d H:i:s');
					$date_modified = gmdate('Y-m-d H:i:s');
					$current_activity = $value['activity_id'];
					$current_task = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
					$delay_wakeup_time = '0000-00-00 00:00:00';
					$created_by = $current_user_id;
					$status = 'not_started';

					$db->query("INSERT INTO wfm_working_nodes VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')");

				}

			}
			else { // Creates a new process_instance row with a new process_instance_id. New process_id.
				
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: process_id is NOT in array");
				else
					$GLOBALS['log']->debug("*********************** ASOL: process_id is NOT in array");	
				
				$already_stored_processes[] = $value['process_id'];
				
				if ($asolLogLevelEnabled) {
					$GLOBALS['log']->asol("*********************** ASOL: already_stored_processes " . print_r($already_stored_processes, true) . "*******************************************");
					$GLOBALS['log']->asol("*********************** ASOL: event_id is NOT in array, of course, because process_id was NOT in array");
				} else {
					$GLOBALS['log']->debug("*********************** ASOL: already_stored_processes " . print_r($already_stored_processes, true) . "*******************************************");
					$GLOBALS['log']->debug("*********************** ASOL: event_id is NOT in array, of course, because process_id was NOT in array");
				}
					
				$already_stored_events[] = $value['event_id'];
				
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
				else
					$GLOBALS['log']->debug("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
					
				$id = create_guid();
				$process_instance_id = create_guid();

				///////////////////////
				switch ($value['event_type']) {
					case 'start' : // execution_index = 0 by definition for all start events
						$execution_index = 0;
						break;
					case 'intermediate' : // Without break is intented to execute the same as cancel event.
					case 'cancel' :
						$event_not_stored_yet__query_2 = $db->query("
																		SELECT MAX(execution_index) AS max_index FROM wfm_process_instance
																		WHERE (process_id = '".$value['process_id']."' AND event_id = '".$value['event_id']."' AND bean_id = '".$bean_id."') 
															 		");
						$event_not_stored_yet__row_2 = $db->fetchByAssoc($event_not_stored_yet__query_2);
						$execution_index = $event_not_stored_yet__row_2['max_index']++;
						break;
					default:
				}


				$process_id = $value['process_id'];
				$event_id = $value['event_id'];
				$event_type = $value['event_type'];

				$tokens = 1;
				$delayed_nodes = 0;
				$is_child = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
				$parent_process_id = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
				$db->query("INSERT INTO wfm_process_instance VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$process_id."', '".$event_id."', '".$event_type."', '".$bean_id."', '".$wfm_module."', ".$tokens.", ".$delayed_nodes.", ".$is_child.", ".$parent_process_id.")");


				$id = create_guid();
				$date_entered = gmdate('Y-m-d H:i:s');
				$date_modified = gmdate('Y-m-d H:i:s');
				$current_activity = $value['activity_id'];
				$current_task = 'null';///////////////***************** ojo comillas y tiene que ser un null de verdad en la query
				$delay_wakeup_time = '0000-00-00 00:00:00';
				$created_by = $current_user_id;
				$status = 'not_started';
				$db->query("INSERT INTO wfm_working_nodes VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')");
					
			}

		}
		else {
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: activity_id is in array");
			else
				$GLOBALS['log']->debug("*********************** ASOL: activity_id is in array");
		}
	}

}

//This function will be defined within functions.php script
//$process_instance param in this function contains an array with info about the active process instance (mainly the instance_id & the execution_index)
function execute_process__it_works_11_05_2011__1821_before_code_on_hold($process_instance, $working_nodes, $executionType = "logic_hook") { //function that executes a certain process.
	
	global $db, $sugar_config;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;
	/////////*******$working_nodes = $workingNodes;

	/*
	 $working_nodes = Array();
	 $working_nodes = getWorkingNodes($process_instance_id, $executionType);
	 */

	//*****$tokens = countTokens($process_instance['instance_id'], $process_instance['execution_index']); //Function that returns the numbers of active nodes for the current process. �count($workingNodes)?
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: execute_process \$process_instance=".print_r($process_instance,true)."\$working_nodes=".print_r($working_nodes,true));
	else
		$GLOBALS['log']->debug("*********************** ASOL: execute_process \$process_instance=".print_r($process_instance,true)."\$working_nodes=".print_r($working_nodes,true));
	
	$tokens = count($working_nodes);
	$delayedNodes = 0;
	$heldNodes = 0;
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: tokens before while = ".$tokens);
	else
		$GLOBALS['log']->debug("*********************** ASOL: tokens before while = ".$tokens);

	while ( ($tokens - ($delayedNodes + $heldNodes)) > 0 ) { //While more than zero nodes active, execute them

		foreach ($working_nodes as $keyN=>$node) {
			
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL:\$node=".print_r($node,true));
			else
				$GLOBALS['log']->debug("*********************** ASOL:\$node=".print_r($node,true));

			$activityDelay = getActivityDelay($node['current_activity']);
			
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL:\$activityDelay= ".print_r($activityDelay,true));
			else
				$GLOBALS['log']->debug("*********************** ASOL:\$activityDelay= ".print_r($activityDelay,true));

			if ((empty($node['current_task'])) && ($activityDelay) && ($node['status'] != 'delayed')) {//////***** si la task es null AND si hay delay para la current_activity AND estado del nodo != delayed
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: inside if-si la task es null AND si hay delay para la current_activity AND estado del nodo != delayed");
				else
					$GLOBALS['log']->debug("*********************** ASOL: inside if-si la task es null AND si hay delay para la current_activity AND estado del nodo != delayed");
				
				$db->query("
								UPDATE wfm_working_nodes 
								SET status='delayed', wakeup_time_delay='".calculateWakeUpDelay($activityDelay)."' 
								WHERE id='".$node['id']."'
						   ");

				$delayedNodes++;

				$db->query("
								UPDATE wfm_process_instance 
								SET delayed_nodes=".$delayedNodes." 
								WHERE (process_instance_id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].") 
								LIMIT 1
						   ");


				//break; //Breaks the foreach loop and continues with the next node********************************************************************* es necesario???

			}
			else {///////******* si la task no es null OR si no hay delay para la current_activity OR estado del nodo == delayed
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: inside else-si la task no es null OR si no hay delay para la current_activity OR estado del nodo == delayed");
				else
					$GLOBALS['log']->debug("*********************** ASOL: inside else-si la task no es null OR si no hay delay para la current_activity OR estado del nodo == delayed");
				//Initialize nodes at in_progress status

				$db->query("
								UPDATE wfm_working_nodes 
								SET status='in_progress' 
								WHERE id='".$node['id']."'
						   ");


				//Get tasks to execute for current node activity
				$tasksQuery = $db->query("
											SELECT asol_task.* 
											FROM asol_task 
											LEFT JOIN asol_activity_asol_task_c 
											ON asol_activity_asol_task_c.asol_activf613ol_task_idb=asol_task.id 
											WHERE asol_activity_asol_task_c.asol_activ5b86ctivity_ida='".$node['current_activity']."' 
											ORDER BY asol_task.order_task
										 ");
				$tasks = Array();
				while ($rowTask = $db->fetchByAssoc($tasksQuery)) {
					$tasks[] = $rowTask;
				}
					
					
				//Supress tasks that has been already executed based on $node['current_task']. If current_task is 'null', the current task will be the first task of the current activity
				if ($node['current_task'] != null) {
					$i=0;
					while ($tasks[$i] != $node['current_task']) {
						$i++;
					}
					$tasks = array_slice($tasks, $i);

				}

				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: Execute obtained tasks=".print_r($tasks,true));
				else
					$GLOBALS['log']->debug("*********************** ASOL: Execute obtained tasks=".print_r($tasks,true));
				//Execute obtained tasks
				foreach ($tasks as $keyT=>$task) {

					$taskDelayStartTime = getTaskStartDelayTime($task['delay_type'], $task['delay'], $process_instance['bean_module'], $process_instance['bean_id']);
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: \$taskDelayStartTime=".$taskDelayStartTime);
					else
						$GLOBALS['log']->debug("*********************** ASOL: \$taskDelayStartTime=".$taskDelayStartTime);
					
					if (!$taskDelayStartTime) { //If current task has no delay, execute it
						if ($asolLogLevelEnabled)
							$GLOBALS['log']->asol("*********************** ASOL: If current task has no delay, execute it");
						else
							$GLOBALS['log']->debug("*********************** ASOL: If current task has no delay, execute it");
						$executeResult = Array();// If the task is a create_object or a modify object, it will return an array as this Array('object_id', 'object_module'). If the task is not succesful, it will return 'false';else it will return 'true'.
						$executeResult = executeTask($task['task_type'], $task['task_implementation'], $process_instance['bean_module'], $process_instance['bean_id']);	//Every task execution will return true if is succesful (an id if is a create or a modify object)
							
						//If current activity has more than one next activity, add related entries to the database table working_nodes & increase the number of tokens for current process
						$nextTask = (!empty($tasks[$keyT+1]['id'])) ? $tasks[$keyT+1]['id'] : null;
						$nextActivity = getNextActivity($node['current_activity'], $nextTask, $process_instance['bean_module'], $process_instance['bean_id']); //function that returns an array with next activities for the current node, if next activity is the actual activity, return the actual activity.
							

						if (count($nextActivity) >= 2) { ////**********se acaba esta rama y empiezan dos o mas ramas que nacen de la que va a morir
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: nextActivity>=2");
							else 
								$GLOBALS['log']->debug("*********************** ASOL: nextActivity>=2");
							//End current node and add to DB the new bifurcated nodes
							$db->query("
											UPDATE wfm_working_nodes 
											SET status='terminated' 
											WHERE id='".$node['id']."'
									   ");

							foreach ($nextActivity as $newNode) {
								$db->query("
												INSERT INTO wfm_working_nodes 
												VALUES ('".create_guid()."', '".$process_instance['process_instance_id']."', '".$process_instance['execution_index']."', '".gmdate("Y-m-d H:i:s")."', '".gmdate("Y-m-d H:i:s")."', '".$newNode."', null, '0000-00-00 00:00:00', '".$current_user->id."', 'not_started')
										   ");
							}
							//Update Tokens for instance (number of new nodes -1)
							$tokens = $tokens + (count($nextActivity)) - 1;
							$db->query("
											UPDATE wfm_process_instance 
											SET tokens=".$tokens." 
											WHERE (id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].") 
											LIMIT 1
									   ");

						}
						elseif (count($nextActivity) == 1) {////**********sigue con la misma rama
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: nextActivity==1");
							else
								$GLOBALS['log']->debug("*********************** ASOL: nextActivity==1");
							//Update current_activity (if the task executed is the last one) and current_task
							if (count($tasks) == ($keyT+1)) {
								$db->query("
												UPDATE wfm_working_nodes 
												SET current_activity='".$nextActivity[0]."' 
												WHERE id='".$node['id']."' 
												LIMIT 1
										   ");
							}
							//Update current task for current node
							if ($nextTask != null) { //If not null
								$db->query("
												UPDATE wfm_working_nodes 
												SET current_task='".$nextTask."' 
												WHERE id='".$node['id']."'
										   ");
							}
							else { //If yes
								$db->query("
												UPDATE wfm_working_nodes 
												SET current_task=null 
												WHERE id='".$node['id']."'
										   ");
							}

							$on_hold_Result = checkUpdateOnHold($task['id'], $nextTask, $process_instance['process_instance_id'], $process_instance['execution_index'], $node['id'], $executeResult['object_id'], $executeResult['object_module']);////****para task ( task/call) de Sugar//*******en $executeResult vendr� el object_id(bean_id) si fue una task create_object o modify_object(modify_object NOO!!)
							if ($on_hold_Result) {
								// actualizar el working node a held
								// actualizar held_nodes
								// actualizar en wfm_process_instance el heldNodes
							}
							////////*****break;

						}
						else {/////////////*************no hay next activity en esta rama, la rama muere sin ningun hijo
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: no hay next activity en esta rama, la rama muere sin ningun hijo");
							else
								$GLOBALS['log']->debug("*********************** ASOL: no hay next activity en esta rama, la rama muere sin ningun hijo");
							//End current node & uppdate tokens-- for the process instance
							$db->query("
											UPDATE wfm_working_nodes 
											SET status='terminated' 
											WHERE id='".$node['id']."'
									   ");

							$tokens = $tokens - 1;
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: tokens-- while = ".$tokens);
							else 
								$GLOBALS['log']->debug("*********************** ASOL: tokens-- while = ".$tokens);
							$db->query("
											UPDATE wfm_process_instance 
											SET tokens=".$tokens." 
											WHERE (id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].") 
											LIMIT 1
									   ");

						}

					}
					else { //If current task has delay, update the node in the database with status delayed and the expected wakeup_time_delay
						if ($asolLogLevelEnabled)
							$GLOBALS['log']->asol("*********************** ASOL: If current task has delay, update the node in the database with status delayed and the expected wakeup_time_delay");
						else
							$GLOBALS['log']->debug("*********************** ASOL: If current task has delay, update the node in the database with status delayed and the expected wakeup_time_delay");
						$db->query("
										UPDATE wfm_working_nodes 
										SET status='delayed', wakeup_time_delay='".calculateWakeUpDelay($task['delay'], $taskDelayStartTime)."' 
										WHERE id='".$node['id']."'
								   ");//////////!!!!!!!!!!!!!*****************$taskDelayTime es interna de la funcion getTaskStartDelayTime --> deberia ser $taskDelayStartTime-----OK

						$delayedNodes++;
						$db->query("
										UPDATE wfm_process_instance 
										SET delayed_nodes=".$delayedNodes." 
										WHERE (process_instance_id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].")
										LIMIT 1
								   ");
						/////*******break; //Breaks the foreach loop and continues with the next node

					}

				}
					
			}


		}

		//After execute the actual working nodes, update the current working_nodes array
		$working_nodes = getWorkingNodes($process_instance['process_instance_id'], $process_instance['execution_index']);

	}

	//********************  comprobar que esto se haga cuando se acaba la ejecucion de una instancia
	if (empty($working_nodes)) { //If there are no working nodes for the current process, the process ends... delete entries in the database for that process

		$db->query("
						DELETE FROM wfm_working_nodes 
						WHERE (process_instance_id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].")
				   ");
		$db->query("
						DELETE FROM wfm_on_hold 
						WHERE (process_instance_id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].")
				   ");
		$db->query("
						DELETE FROM wfm_process_instance 
						WHERE (process_instance_id='".$process_instance['process_instance_id']."' AND execution_index=".$process_instance['execution_index'].")
				   ");

	}
	//******************************
}


function initialize_processes_it_works_23_05_2011__1922_before_call_process($wfm_module, $wfm_action, $bean_id, $current_user_id ) {   // executionType=call o task -> es para esperar por call o task de sugar

	global $db, $sugar_config;
	//global $current_user;

	$asolLogLevelEnabled = ((isset($sugar_config['asolLogLevelEnabled'])) && ($sugar_config['asolLogLevelEnabled'] == true)) ? true : false;
	
	//$current_user_id = (isset($_REQUEST['current_user_id'])) ? $_REQUEST['current_user_id'] : "problem";

	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: " . "bean_id=" . $bean_id . " wfm_engine_functions.php function initialize_processes********************************************************************************************************************************************************************************************************");
	else 
		$GLOBALS['log']->debug("*********************** ASOL: " . "bean_id=" . $bean_id . " wfm_engine_functions.php function initialize_processes********************************************************************************************************************************************************************************************************");


	// Get events with the right trigger_event.

	$trigger_module = $wfm_module;
	$bean_module = $wfm_module;
	$trigger_event = $wfm_action;
	$trigger = $trigger_module . " - " . $trigger_event;

	$event_query = $db->query("
								SELECT id, condition_event  
								FROM asol_events
								WHERE (trigger_event = '" . $trigger .  "' AND deleted = 0)							  
							  ");

	$events_let = Array(); // This array contains just events that are compliant to the trigger_event. Two fields: id, condition_event.
	while ($event_row = $db->fetchByAssoc($event_query)) {
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: inside while-event-trigger print event_row " . print_r($event_row,true) . "*******************************************");
		else 
			$GLOBALS['log']->debug("*********************** ASOL: inside while-event-trigger print event_row " . print_r($event_row,true) . "*******************************************");
		$events_let[] = $event_row;
	}
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: after while-event-trigger print events_let " . print_r($events_let,true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: after while-event-trigger print events_let " . print_r($events_let,true) . "*******************************************");
	

	// Check conditions for each event. ( The bean�s characteristics have to match with the event�s conditions ).

	$events_condition_let = Array(); // This array contains just events that applies condition_event ( and trigger_event, of course ).
	foreach ($events_let as $key => $value) {
		
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions print value " . print_r($value,true) . "*******************************************");
		else 
			$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions print value " . print_r($value,true) . "*******************************************");
			
		if ( appliesConditions($bean_module, $bean_id, $value['condition_event']) ) { // This function is used to know if the event applies conditions.
			$events_condition_let[] = $value['id'];
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions-if print value" . print_r($value,true) . " applies" . "*******************************************");
			else
				$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions-if print value" . print_r($value,true) . " applies" . "*******************************************");
		}
		else {
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: inside foreach-event-conditions-else print value " . print_r($value,true) . " NOT applies" . "*******************************************");
			else 
				$GLOBALS['log']->debug("*********************** ASOL: inside foreach-event-conditions-else print value " . print_r($value,true) . " NOT applies" . "*******************************************");
		}
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: after foreach-event-conditions print events_condition_let " . print_r($events_condition_let,true) . "*******************************************");
	else 
		$GLOBALS['log']->debug("*********************** ASOL: after foreach-event-conditions print events_condition_let " . print_r($events_condition_let,true) . "*******************************************");


	// For each event, we get its process. (Events are trigger-condition-compliant).

	$processes_events__trigger_condition_let = Array(); // [0->[process_idX, event_id0],1->[process_id(X o Y), event_id1],...,n->[process_id(X), event_idn]]
	foreach ($events_condition_let as $key => $value) {
		$process_query = $db->query("
										SELECT asol_proce6f14process_ida AS process_id,  asol_procea8ca_events_idb AS event_id 
										FROM asol_proces_asol_events_c
										WHERE (asol_procea8ca_events_idb = '" . $value . "' AND deleted = 0)											
									");
		$process_row = $db->fetchByAssoc($process_query);
		$processes_events__trigger_condition_let[] = $process_row;
	}
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: processes_events__trigger_condition_let " . print_r($processes_events__trigger_condition_let, true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: processes_events__trigger_condition_let " . print_r($processes_events__trigger_condition_let, true) . "*******************************************");


	// For each event, we get its activities(all from the event).

	$events_activities_let = Array(); // [0->[event_idX, activity_id0],..., ]
	foreach ($events_condition_let as $key => $value) {
		$activity_query = $db->query("
										SELECT asol_event87f4_events_ida AS event_id, asol_event8042ctivity_idb AS activity_id 
										FROM asol_eventssol_activity_c
										WHERE (asol_event87f4_events_ida = '" . $value . "' AND deleted = 0)
									 ");
		while ($activity_row = $db->fetchByAssoc($activity_query)) {
			$events_activities_let[] = $activity_row;
		}
		if ($asolLogLevelEnabled)
			$GLOBALS['log']->asol("*********************** ASOL: events_activities_let-PARTY " . print_r($events_activities_let, true) . "value=" .$value . "*******************************************");
		else 
			$GLOBALS['log']->debug("*********************** ASOL: events_activities_let-PARTY " . print_r($events_activities_let, true) . "value=" .$value . "*******************************************");

	}
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: events_activities_let-TOTAL " . print_r($events_activities_let, true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: events_activities_let-TOTAL " . print_r($events_activities_let, true) . "*******************************************");

	// Now, we are going to filter the activities by their conditions
	$processes_events_activities__filter_by_conditions__let = Array(); // [0->[process_idZY, event_idX, activity_id0, condition_activity], ... , n->[process_idYX, event_idZX, activity_idn, condition_activity]] <- This activities are all that applies all conditions.(!!!!!ojo dos eventos que referencien una misma actividad)
	foreach ($events_activities_let as $key => $value) {

		$condition_activity_query = $db->query("
													SELECT asol_proces_asol_events_c.asol_proce6f14process_ida AS process_id , asol_proces_asol_events_c.asol_procea8ca_events_idb AS event_id , asol_events.type AS event_type, asol_events.condition_event AS condition_event, asol_activity.id AS activity_id , asol_activity.condition_activity AS condition_activity 
													FROM asol_activity
													INNER JOIN asol_eventssol_activity_c ON (asol_eventssol_activity_c.asol_event8042ctivity_idb = asol_activity.id AND asol_eventssol_activity_c.deleted = 0)
													INNER JOIN asol_events ON (asol_events.id = asol_eventssol_activity_c.asol_event87f4_events_ida AND asol_events.deleted = 0)
													INNER JOIN asol_proces_asol_events_c ON (asol_proces_asol_events_c.asol_procea8ca_events_idb = asol_events.id AND asol_proces_asol_events_c.deleted = 0)
													INNER JOIN asol_process ON (asol_process.id = asol_proces_asol_events_c.asol_proce6f14process_ida AND asol_process.deleted = 0 AND asol_process.status = 'active')
													WHERE asol_activity.id = '" . $value['activity_id'] . "'
													ORDER BY asol_events.id
											   ");
		$condition_activity_row = $db->fetchByAssoc($condition_activity_query);

		if ( appliesConditions($bean_module, $bean_id, $condition_activity_row['condition_activity']) ) { // This function is used to know if the activity applies conditions.
			if ($condition_activity_row != null) {
				$processes_events_activities__filter_by_conditions__let[] = $condition_activity_row;
			}
		}
	}
	
	if ($asolLogLevelEnabled)
		$GLOBALS['log']->asol("*********************** ASOL: processes_events_activities__filter_by_conditions__let " . print_r($processes_events_activities__filter_by_conditions__let, true) . "*******************************************");
	else
		$GLOBALS['log']->debug("*********************** ASOL: processes_events_activities__filter_by_conditions__let " . print_r($processes_events_activities__filter_by_conditions__let, true) . "*******************************************");
	/*
	 * It is turn to introduce the information into the tables($db).
	 * wfm_process_instance row    1--------->n    wfm_working_nodes
	 * Information is intended to show how many activities have applied the conditions.
	 * There are to tables.
	 * 		1)wfm_working_nodes stores in its rows which activity belongs to which process_instance.
	 * 		2)wfm_process_instance just stores the process_instance�s id and how many activities there are by process, i.e., the tokens.
	 */

	$already_stored_processes = Array(); // Contains the processes that have already been read.
	$already_stored_events = Array(); // Contains the events that have already been read. (No need to have an array of events by process, because the event_id is unique.)
	$already_stored_activities__event_duplicity = Array(); // Contains the activities that already have been stored in wfm_working_node. <- Two or more events can link one activity; we don�t want to execute the same activity twice or more times, just once.

	foreach ($processes_events_activities__filter_by_conditions__let as $key => $value) {

		if (!(in_array($value['activity_id'], $already_stored_activities__event_duplicity))) {
			$already_stored_activities__event_duplicity[] = $value['activity_id'];//*********************puede que esto tenga que ir al final del if, por el tema del appliesConditions , lo de dos Events que apuntan a una misma Activity ...
			
			if ($asolLogLevelEnabled) {
				$GLOBALS['log']->asol("*********************** ASOL: activity_id is NOT in array");
				$GLOBALS['log']->asol("*********************** ASOL: already_stored_activities__event_duplicity " . print_r($already_stored_activities__event_duplicity, true) . "*******************************************");
			} else {
				$GLOBALS['log']->debug("*********************** ASOL: activity_id is NOT in array");
				$GLOBALS['log']->debug("*********************** ASOL: already_stored_activities__event_duplicity " . print_r($already_stored_activities__event_duplicity, true) . "*******************************************");
			}
			
			if (in_array($value['process_id'], $already_stored_processes)) { // Modifies a already created process_instance row in $db (tokens++) OR creates a new row with an already created process_instance_id, it creates a new execution_index; what is really new is the field wfm_process_instance.id
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: process_id is in array");
				else
					$GLOBALS['log']->debug("*********************** ASOL: process_id is in array");
				
				if (in_array($value['event_id'], $already_stored_events)) { // If the event_id has already been kept in mind/////////***********si el evento es NO nuevo
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: event_id is in array");
					else
						$GLOBALS['log']->debug("*********************** ASOL: event_id is in array");
						
					switch ($value['event_type']) {
						case 'start' :
							$execution_index = 0;
							break;
						case 'intermediate' : // Without break is intented to execute the same as cancel event.
						case 'cancel' :
							$already_stored_event__query_1 = $db->query("
																			SELECT MAX(execution_index) AS max_index 
																			FROM wfm_process_instance
																			WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."') 
															 			");// Be careful with this query, it�s not like when the event_id is in the array. This event_id has not been stored yet.
							$already_stored_event__row_1 = $db->fetchByAssoc($already_stored_event__query_1);
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: already_stored_event__row_1=" .print_r($already_stored_event__row_1,true));
							else
								$GLOBALS['log']->debug("*********************** ASOL: already_stored_event__row_1=" .print_r($already_stored_event__row_1,true));	
							
							$execution_index = $already_stored_event__row_1['max_index'];// Events are sorted, therefore there will be no problems with the index we had to choose.
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: execution_index=" .$execution_index);
							else
								$GLOBALS['log']->debug("*********************** ASOL: execution_index=" .$execution_index);	
							
							break;
						default:

					}

					$db->query("
									UPDATE wfm_process_instance 
									SET tokens = (tokens + 1)
									WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."' AND execution_index = '".$execution_index."') 
							   ");

					$already_stored_event__query_2 = $db->query("
																	SELECT process_instance_id, process_id, event_type, execution_index 
																	FROM wfm_process_instance
																	WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."' AND execution_index = '".$execution_index."' ) 
															   ");
					$already_stored_event__row_2 = $db->fetchByAssoc($already_stored_event__query_2);


					$id = create_guid();
					$process_instance_id = $already_stored_event__row_2['process_instance_id'];
					$execution_index = $already_stored_event__row_2['execution_index'];
					$date_entered = gmdate('Y-m-d H:i:s');
					$date_modified = gmdate('Y-m-d H:i:s');
					$current_activity = $value['activity_id'];
					$current_task = 'null';
					$delay_wakeup_time = '0000-00-00 00:00:00';
					$created_by = $current_user_id;
					$status = 'not_started';
					$db->query("
									INSERT INTO wfm_working_nodes 
									VALUES ('".$id."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')
							   ");

				}
				else { // If the event_id has not been borne in mind yet, we have to store it to the $db///////////********* El evento es nuevo
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: event_id is NOT in array");
					else
						$GLOBALS['log']->debug("*********************** ASOL: event_id is NOT in array");
					
					$already_stored_events[] = $value['event_id'];
					
					if ($asolLogLevelEnabled)
						$GLOBALS['log']->asol("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
					else
						$GLOBALS['log']->debug("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
					
					$event_not_stored_yet__query_2 = $db->query("
																	SELECT process_instance_id, process_id, event_type, execution_index, tokens 
																	FROM wfm_process_instance
																	WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."') 
															   ");// Be careful with this query, it�s not like when the event_id is in the array. This event_id has not been stored yet.
					$event_not_stored_yet__row_2 = $db->fetchByAssoc($event_not_stored_yet__query_2);
					$process_instance_id = $event_not_stored_yet__row_2['process_instance_id'];

					switch ($value['event_type']) {
						case 'start' : // execution_index = 0 by definition for all start events
							$execution_index = 0;
							// Due to all start events have execution_index = 0, we have to increment the same row.
							$db->query("
											UPDATE wfm_process_instance 
											SET tokens = (tokens + 1)
											WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."' AND execution_index = '".$execution_index."') 
							   		   ");
							break;
						case 'intermediate' : // Without break is intented to execute the same as cancel event.
						case 'cancel' :
							$event_not_stored_yet__query_1 = $db->query("
																			SELECT MAX(execution_index) AS max_index 
																			FROM wfm_process_instance
																			WHERE (process_id = '".$value['process_id']."' AND bean_id = '".$bean_id."') 
															 			");// Be careful with this query, it�s not like when the event_id is in the array. This event_id has not been stored yet.
							$event_not_stored_yet__row_1 = $db->fetchByAssoc($event_not_stored_yet__query_1);
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: event_not_stored_yet__row_1=" .print_r($event_not_stored_yet__row_1,true));
							else 
								$GLOBALS['log']->debug("*********************** ASOL: event_not_stored_yet__row_1=" .print_r($event_not_stored_yet__row_1,true));
							
							$execution_index = $event_not_stored_yet__row_1['max_index'] + 1; // We increment it, because it�s a new intermediate/cancel event(not a already kept in mind intermediate/cancel event).
							
							if ($asolLogLevelEnabled)
								$GLOBALS['log']->asol("*********************** ASOL: execution_index=" .$execution_index);
							else
								$GLOBALS['log']->debug("*********************** ASOL: execution_index=" .$execution_index);
							
							////////////////
							$id1 = create_guid();

							$process_id = $value['process_id'];
							$event_id = $value['event_id'];
							$event_type = $value['event_type'];
							$tokens = 1;
							$delayed_nodes = 0;
							$is_child = 'null';
							$parent_process_id = 'null';

							$db->query("
											INSERT INTO wfm_process_instance 
											VALUES ('".$id1."', '".$process_instance_id."', ".$execution_index.", '".$process_id."', '".$event_type."', '".$bean_id."', '".$wfm_module."', ".$tokens.", ".$delayed_nodes.", ".$is_child.", ".$parent_process_id.")
									   ");
							////////////////

							break;
						default:

					}


					$id2 = create_guid();
					$date_entered = gmdate('Y-m-d H:i:s');
					$date_modified = gmdate('Y-m-d H:i:s');
					$current_activity = $value['activity_id'];
					$current_task = 'null';
					$delay_wakeup_time = '0000-00-00 00:00:00';
					$created_by = $current_user_id;
					$status = 'not_started';

					$db->query("
									INSERT INTO wfm_working_nodes 
									VALUES ('".$id2."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')
							   ");

				}

			}
			else { // Creates a new process_instance row with a new process_instance_id. We are now working with a new process_id (and new event_id).
				
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: process_id is NOT in array");
				else
					$GLOBALS['log']->debug("*********************** ASOL: process_id is NOT in array");
					
				$already_stored_processes[] = $value['process_id'];
				
				if ($asolLogLevelEnabled) {
					$GLOBALS['log']->asol("*********************** ASOL: already_stored_processes " . print_r($already_stored_processes, true) . "*******************************************");
					$GLOBALS['log']->asol("*********************** ASOL: event_id is NOT in array, of course, because process_id was NOT in array");
				} else {
					$GLOBALS['log']->debug("*********************** ASOL: already_stored_processes " . print_r($already_stored_processes, true) . "*******************************************");
					$GLOBALS['log']->debug("*********************** ASOL: event_id is NOT in array, of course, because process_id was NOT in array");
				}
				
				$already_stored_events[] = $value['event_id'];
				
				if ($asolLogLevelEnabled)
					$GLOBALS['log']->asol("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");
				else
					$GLOBALS['log']->debug("*********************** ASOL: already_stored_events " . print_r($already_stored_events, true) . "*******************************************");

				switch ($value['event_type']) {
					case 'start' : // execution_index equals 0 by definition for all start events.
						$execution_index = 0;
						break;
					case 'intermediate' : // Without break is intented to execute the same as cancel event.
					case 'cancel' :
						$execution_index = 1; // Equals 1 because is the first event that we are bearing in mind.
						break;
					default:
				}

				$id1 = create_guid();
				$process_instance_id = create_guid();

				$process_id = $value['process_id'];
				$event_id = $value['event_id'];
				$event_type = $value['event_type'];

				$tokens = 1;
				$delayed_nodes = 0;
				$is_child = 'null';
				$parent_process_id = 'null';
				$db->query("
								INSERT INTO wfm_process_instance 
								VALUES ('".$id1."', '".$process_instance_id."', ".$execution_index.", '".$process_id."', '".$event_type."', '".$bean_id."', '".$wfm_module."', ".$tokens.", ".$delayed_nodes.", ".$is_child.", ".$parent_process_id.")
						   ");


				$id2 = create_guid();
				$date_entered = gmdate('Y-m-d H:i:s');
				$date_modified = gmdate('Y-m-d H:i:s');
				$current_activity = $value['activity_id'];
				$current_task = 'null';
				$delay_wakeup_time = '0000-00-00 00:00:00';
				$created_by = $current_user_id;
				$status = 'not_started';
				$db->query("
								INSERT INTO wfm_working_nodes 
								VALUES ('".$id2."', '".$process_instance_id."', ".$execution_index.", '".$date_entered."', '".$date_modified."', '".$current_activity."', ".$current_task.", '".$delay_wakeup_time."', '".$created_by."', '".$status."')
						   ");

			}

		}
		else {
			if ($asolLogLevelEnabled)
				$GLOBALS['log']->asol("*********************** ASOL: activity_id is in array");
			else
				$GLOBALS['log']->debug("*********************** ASOL: activity_id is in array");
		}
	}

	//	//////////////////////////
	//	$return_array = Array();
	//	$return_query = $db->query("
	//									SELECT process_instance_id, execution_index, bean_id, bean_module
	//									FROM wfm_process_instance
	//									WHERE bean_id ='".$bean_id."'
	//							   ");
	//	while ($return_row = $db->fetchByAssoc($return_query)) {
	//
	//		$return_array__item = Array();
	//		$return_array__item['process_instance_id'] = $return_row['process_instance_id'];
	//		$return_array__item['execution_index'] = $return_row['execution_index'];
	//		$return_array__item['bean_id'] = $return_row['bean_id'];
	//		$return_array__item['bean_module'] = $return_row['bean_module'];
	//
	//		$return_query_2 = $db->query("
	//										SELECT id, current_activity, current_task, status
	//										FROM wfm_working_nodes
	//										WHERE (process_instance_id ='".$return_row['process_instance_id']."' AND execution_index ='".$return_row['execution_index']."')
	//									 ");
	//		$working_nodes_from_this_process_instance_id = Array();
	//		while ($return_row_2 = $db->fetchByAssoc($return_query_2)) {
	//			$working_node = Array();
	//			$working_node['id'] = $return_row_2['id'];
	//			$working_node['current_activity'] = $return_row_2['current_activity'];
	//			$working_node['current_task'] = $return_row_2['current_task'];
	//			$working_node['status'] = $return_row_2['status'];
	//			$working_nodes_from_this_process_instance_id[] = $working_node;
	//		}
	//		$return_array__item['working_nodes'] = $working_nodes_from_this_process_instance_id;
	//
	//		$return_array[] = $return_array__item;
	//	}
	//	//////////////////////////
	//	$GLOBALS['log']->debug("*********************** ASOL: return_array=".print_r($return_array,true));
	//	return $return_array;
}


?>