<?php
global $db;

$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY flowChart.php");
$GLOBALS['log']->debug("**********[ASOL][WFM]: ENTRY POINT \$_REQUEST=[".print_r($_REQUEST,true)."]");

$export_array = Array();

// Extract process_ids from $_REQUEST
$process_ids_array = explode(',', $_REQUEST['uid']);

// SEARCH FOR PROCESSES
foreach($process_ids_array as $key_process_id => $value_process_id) {
	$process_query = $db->query ("
									SELECT *
									FROM asol_process
									WHERE id = '".$value_process_id."'
								");
	$process_row = $db->fetchByAssoc($process_query);

	$export_array['processes'][] = $process_row;
}
//$GLOBALS['log']->debug("*********************** ASOL: 1 FINAL \$export_array=[".print_r($export_array,true)."]");

// SEARCH FOR EVENTS
$event_list = Array();;

if (!empty($export_array['processes'])) { // It is always only one process for the flowChart
	foreach ($export_array['processes'] as $key_process => $value_process) {
		
		$event_from_process__query = $db->query("
													SELECT asol_events.*
													FROM asol_proces_asol_events_c
													INNER JOIN asol_events ON (asol_proces_asol_events_c.asol_procea8ca_events_idb = asol_events.id)
													WHERE (asol_proces_asol_events_c.asol_proce6f14process_ida = '".$value_process['id']."') AND (asol_events.deleted = 0) AND (asol_proces_asol_events_c.deleted = 0)
													ORDER BY asol_events.type DESC, asol_events.name ASC
												");
		while ($event_from_process__row = $db->fetchByAssoc($event_from_process__query)) {
			$export_array['events'][$value_process['id']][] = $event_from_process__row;
			$event_list[] = $event_from_process__row['id'];
		}
	}
}
//$GLOBALS['log']->debug("*********************** ASOL: 2 FINAL \$export_array=[".print_r($export_array,true)."]");

// SEARCH FOR ACTIVITIES
/*
if (!empty($export_array['events'])) {
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
	
				$activity_query = $db->query ("
												SELECT *
												FROM asol_activity
												WHERE id = '".$value_activity_id."'
											");
				$activity_row = $db->fetchByAssoc($activity_query);
	
				$export_array['activities'][$value_event['id']][] = $activity_row;
			}
		}
	}
}
*/
if (!empty($export_array['events'])) {
	foreach ($export_array['events'] as $key_parent_process => $value_parent_process) {
		foreach ($value_parent_process as $key_event => $value_event) {
		
			$activity_from_event__query = $db->query("
														SELECT asol_activity.*
														FROM asol_eventssol_activity_c
														INNER JOIN asol_activity ON (asol_eventssol_activity_c.asol_event8042ctivity_idb = asol_activity.id)
														WHERE (asol_eventssol_activity_c.asol_event87f4_events_ida = '".$value_event['id']."') AND (asol_activity.deleted = 0) AND (asol_eventssol_activity_c.deleted = 0)
														ORDER BY asol_activity.name ASC
													");
			while ($activity_from_event__row = $db->fetchByAssoc($activity_from_event__query)) {
				$export_array['activities'][$value_event['id']][] = $activity_from_event__row;
			}
		}
	}
}


//$GLOBALS['log']->debug("*********************** ASOL: 3 FINAL \$export_array=[".print_r($export_array,true)."]");

// SEARCH FOR NEXT_ACTIVITIES FROM ACTIVITIES(FROM EVENTS)

/**
 * 
 * Get all next_activities(children, grandchildren...) for an activity
 * @param $activity_id
 * @param $next_activities -> You need to call this function like this: "getNextActivities($activity_id);" without the second parameter, because this is just for implementing recursiveness(there is a call to the function inside the function itself)
 */
function getNextActivities($activity_id, & $next_activities=array()){ // recursive

	//$GLOBALS['log']->debug("****************ASOL: Executing getNextActivities function");

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

//---------------WHEN SEARCHING FOR NEXT_ACTIVITIES -> CALCULATE Y-COORDENATE FOR THE ACTIVITIES AND FOR EVENTS

// draw-information for Events
$draw_information_event = Array();
$top_Process = 120;
$left_Process = 50;
$height_Event = 1+7+90+7+1;
$width_Event = 1+7+90+7+1;
$separation_vertical_Event = 50;
// draw-information for Activities
$draw_information_activity = Array();
$top_Process = $top_Process;
$separation_horizontal_Event = 100;// for activity loop
$separation_horizontal_Activity = 100;// for next_activity loop
$left_Process = $left_Process + $width_Event + $separation_horizontal_Event;
$height_Activity = 1+7+90+7+1;
$border_Activity = 1; // this is set on the style by 'em' not by 'px', so it is relative
$padding_Activity = 7; // this is set on the style by 'em' not by 'px', so it is relative
$number_of_pixels_to_susbstrate_from_width_Activity = 13;
$with_Activity_depending_on_number_of_tasks_Default = 94;// default
$with_Activity_depending_on_number_of_tasks_Maximum = $with_Activity_depending_on_number_of_tasks_Default; // to get the nex_activity location
$separation_vertical_Activity = 50;

// search for next_activities
if (!empty($export_array['activities'])) {
	$activity_ids = Array();
	
	foreach ($export_array['activities'] as $key_parent_event => $value_parent_event) {
		
		// $export_array['activities'] only has $key_parent_event that has activity, so there is a difference between $export_array['activities'] and $export_array['events'] regarding the number of events
		// Below the first part of the code regarding $export_array['activities'] != $export_array['events'] (number of events, events without activities)
		// The array $event_list has all the events(included the events without activities). We compare the first element and then we remove the first element.
		//$GLOBALS['log']->debug("*********************** ASOL: \$event_list=[".print_r($event_list,true)."]");
		while ($event_list[0] != $key_parent_event) {
		 	$draw_information_event[$event_list[0]] = $top_Process;
		 	$top_Process = $top_Process + $height_Event + $separation_vertical_Event;
		 	array_shift($event_list);
		}
		
		$draw_information_event[$event_list[0]] = $top_Process;
		array_shift($event_list);
		
		foreach ($value_parent_event as $key_activity => $value_activity) {
			
			//$GLOBALS['log']->debug("*********************** ASOL: \$activity_ids=[".print_r($activity_ids,true)."]");
			if (!in_array($value_activity['id'], $activity_ids)) {	// Event duplicity.
				
				// Calculate Y-coordenate for activity(from events)
				$draw_information_activity[$value_activity['id']]['y'] = $top_Process;
	
				$next_activity_ids_all_tree = getNextActivities($value_activity['id']);
				//$GLOBALS['log']->debug("****************ASOL: \$next_activity_ids_all_tree".print_r($next_activity_ids_all_tree,true));
	
				foreach($next_activity_ids_all_tree as $key => $value) {
	
					$next_activity_query = $db->query ("
															SELECT *
															FROM asol_activity
															WHERE id = '".$value."'
														");
					$next_activity_row = $db->fetchByAssoc($next_activity_query);
	
					$parent_activity_query = $db->query("
															SELECT asol_activ898activity_ida   AS parent_activity_id
															FROM asol_activisol_activity_c
															WHERE asol_activ9e2dctivity_idb  = '".$next_activity_row['id']."' AND deleted = 0
														");
					$parent_activity_row = $db->fetchByAssoc($parent_activity_query);
	
					$export_array['next_activities'][$parent_activity_row['parent_activity_id']][] = $next_activity_row;
					
					// Calculate Y-coordenate for next_activity(from activity and from next_activity)
					$number_of_child = 0;
					$next_activity_for_number_query =  $db->query ("
																		SELECT asol_activ9e2dctivity_idb AS next_activity_id
																		FROM asol_activisol_activity_c
																		WHERE asol_activ898activity_ida = '".$parent_activity_row['parent_activity_id']."' AND deleted = 0
																	");
					while ($next_activity_for_number_row = $db->fetchByAssoc($next_activity_for_number_query)) {
						$number_of_child++;
						if ($next_activity_for_number_row['next_activity_id'] == $next_activity_row['id']) {
							break;
						}
					}
					
					if ($number_of_child > 1) { // if == 1 then $top_Process = $top_Process -> i.e. the first next_activity has the same $top as its parent
						$top_Process = $top_Process + $height_Activity + $separation_vertical_Activity;
					}
					
					$draw_information_activity[$next_activity_row['id']]['y'] = $top_Process;
				}
				
				// separation between the last next_activity of the current activity and the following activity
				$top_Process = $top_Process + $height_Activity + $separation_vertical_Activity;
				
				// event duplicity
				$activity_ids[] = $value_activity['id'];
			}
			else {
				$GLOBALS['log']->debug("**********[ASOL][WFM]: Event duplicity");
			}
		}
	}
}

// $export_array['activities'] only has $key_parent_event that has activity, so there is a difference between $export_array['activities'] and $export_array['events'] regarding the number of events
// Below the second part of the code regarding $export_array['activities'] != $export_array['events'] (number of events, events without activities)
while ($event_list[0] != null) {
 	$draw_information_event[$event_list[0]] = $top_Process;
 	$top_Process = $top_Process + $height_Event + $separation_vertical_Event;
 	array_shift($event_list);
}

//$GLOBALS['log']->debug("*********************** ASOL: 4 FINAL \$export_array=[".print_r($export_array,true)."]");

// SEARCH FOR TASKS FROM ACTIVITIES( from [event, activity, next_activity] )
$event_duplicity = Array();

$activity_type = Array('activities', 'next_activities');
foreach ($activity_type as $key_activity_type => $value_activity_type) {
	
	if (!empty($export_array[$value_activity_type])) {
		foreach ($export_array[$value_activity_type] as $key_parent => $value_parent) {// parent -> [event, activity, next_activity]
		
			foreach($value_parent as $key_activity => $value_activity) {
		
				if (in_array($value_activity['id'], $event_duplicity)) {
					continue;
				}
				$event_duplicity[] = $value_activity['id'];
			
				// asol_Task-structure
				// id 	name 	date_entered 	date_modified 	modified_user_id 	created_by 	description 	deleted 	assigned_user_id 	delay_type 	delay 	task_type 	order_task 	task_implementation
				$tasks_from_activity__array = Array();
				$tasks_from_activity__query = $db->query("
															SELECT asol_task.*
															FROM asol_activity_asol_task_c
															INNER JOIN asol_task ON (asol_activity_asol_task_c.asol_activf613ol_task_idb = asol_task.id AND asol_activity_asol_task_c.deleted = 0)
															WHERE asol_activity_asol_task_c.asol_activ5b86ctivity_ida = '".$value_activity['id']."' AND asol_activity_asol_task_c.deleted = 0
															ORDER BY asol_task.order_task ASC, asol_task.name ASC
														");
				while ($tasks_from_activity__row = $db->fetchByAssoc($tasks_from_activity__query)) {
					$tasks_from_activity__array[] = $tasks_from_activity__row;
				}
				
				$export_array['tasks'][$value_activity['id']] = $tasks_from_activity__array;
			}
		}
	}
}
$GLOBALS['log']->debug("**********[ASOL][WFM]: 5 FINAL \$export_array=[".print_r($export_array,true)."]");

//////////////////////////////////
//*************DRAW*************//
//////////////////////////////////

// JSPLUMB-CALL-FUNCTIONS

function drawConnection ($source, $target, $number_of_connection) {
	return 'jsPlumb.connect({
								source:"'.$source.'", target:"'.$target.'", 
							});
	';
}

function drawCondition($id) {
	return '
			var targetEndpoint = { 
									endpoint:["Image", { src:"modules/asol_Process/icons/condition_icon_16.png" } ],
									anchor:"LeftMiddle", 
								 };
			jsPlumb.addEndpoint( "'.$id.'", targetEndpoint );
	';
}

function drawDelay($id) {
	return '
			var targetEndpoint = { 
									endpoint:["Image", { src:"modules/asol_Process/icons/delay_icon_24.png" } ],
									anchor:"TopCenter", 
								 };
			var delay = jsPlumb.addEndpoint( "'.$id.'", targetEndpoint );
			
			delay.bind("mouseenter", function(delay) {
				console.log("you clicked on ", delay);
				console.log("you clicked on id ", delay.id);
				console.log("you clicked on id ", delay.elementId);
			});
			
	';
}

//-------------------DRAW NODE FUNCTIONS-----------------------//

//window.opener.location=\'index.php?module=asol_Process&action=DetailView&record='.$id.'\';
function generate_Process_HTML($id, $name, $bean_module, $status, $description) {
	
	return '
		<div class="process_name">
			<span>
				<a module="asol_Process" link_id="'.$id.'" onclick="" qtip_info="'.generate_process_info_HTML($bean_module, $status, $description).'">'.$name.'</a>
			</span>
		</div>
	';
}

function generate_Event_HTML($id, $name, $description, $top, $left, $condition_event, $type, $trigger_type, $trigger_event) {
	
	$trigger_event_array = explode(' - ', $trigger_event);
	$module = $trigger_event_array[0];
	
	$draw_Condition = "";
	if (!($condition_event == "")) {
		$conditions_to_print = generate_conditions_HTML($condition_event, $module);
		//$GLOBALS['log']->debug("***********************ASOL \$conditions_to_print=[".print_r($conditions_to_print,true)."]");

		$draw_Condition .= '
							<span class="condition_icon_for_events">
								<img qtip_info="'.$conditions_to_print.'" src="modules/asol_Process/icons/condition_icon_24.png">
							</span>
						';
	}
	
	$event_info = generate_event_info_HTML($type, $trigger_type, $trigger_event);
	
	//window.opener.location=\'index.php?module=asol_Events&action=DetailView&record='.$id.'\';
	return '
		<div class="event" style="top:'.$top.'px; left:'.$left.'px;">
			<div class="event_symbol" id="'.$id.'" style="width: 90px; height: 90px">
				<img alt="Event" qtip_info="'.$event_info.'" src="modules/asol_Process/icons/event_'.$type.'_90.png">
				' . $draw_Condition . ' 
			</div>
			<div class="">
				<span class="event_name aux_name_overflow overflow_ellipsis_enabled">
					<a module="asol_Events" link_id="'.$id.'" onclick="" title="'.generate_name_and_description_HTML($name, $description).'">'.$name.'</a>
				</span>
			</div>
		</div>
	';
}

function generate_Activity_HTML($id, $name, $description, $top, $left, $width, $draw_Tasks_of_this_activity, $counter_Tasks_of_this_activity, $condition_activity, $delay, $module) {
	
	$draw_Delay = "";
	if (!( ($delay == 'minutes - 0') || ($delay == 'hours - 0') || ($delay == 'days - 0') || ($delay == 'weeks - 0') || ($delay == 'months - 0') )) {
		$draw_Delay .= '
						<span class="delay_icon" style="left: '.(((1+7+$width+7+1)/2)-24/2).'px;">
							<img alt="'.generate_delay($delay).'" src="modules/asol_Process/icons/delay_icon_24.png">
						</span>
					';
	}
	
	$draw_Condition = "";
	if (!($condition_activity == "")) {
		$conditions_to_print = generate_conditions_HTML($condition_activity, $module);
		$draw_Condition .= '
							<span class="condition_icon">
								<img qtip_info="'.$conditions_to_print.'" src="modules/asol_Process/icons/condition_icon_16.png">
							</span>
						';
	}
	
	// window.opener.location=\'index.php?module=asol_Activity&action=DetailView&record='.$id.'\';
	return '
		<div class="activity_symbol"  id="'.$id.'" style="top:'.$top.'px; left:'.$left.'px; width:'.$width.'px;">
			<div>
				' . $draw_Delay . ' 
				' . $draw_Condition . ' 
				<span class="activity_name aux_name_overflow overflow_ellipsis_enabled" style="width:'.($width+6).'px;">
					<a module="asol_Activity" link_id="'.$id.'" onclick="" title="'.generate_name_and_description_HTML($name, $description).'">'.$name.'</a>
				</span>
			</div>
			<div class="activity_container_of_tasks">
			' . $draw_Tasks_of_this_activity . ' 
			</div>
		</div>
	';
}

function generate_Task_HTML($id, $name, $description, $task_type, $top, $left, $delay_type, $delay, $order, $task_implementation) {
	
	global $app_list_strings;
	
	$draw_Delay = "";
		if ($delay_type != 'no_delay') {
			$draw_Delay .= '
							<span class="delay_icon_for_task">
								<img alt="'.generate_delay($delay).'" src="modules/asol_Process/icons/delay_icon_16.png">
							</span>
						';
		}
		
	$draw_Call_process_open_subprocess = "";
		if ($task_type == 'call_process') {
			
			$task_implementation_array = explode('${pipe}', $task_implementation);
			$id_process = $task_implementation_array[0];
			$name_process = $task_implementation_array[1];
			$id_event = $task_implementation_array[2];
			$name_event = $task_implementation_array[3];
			
			$subprocess_info .= '<tr>';
				$subprocess_info .= "<td><b>&nbsp; ".'SubProcess'." &nbsp;</b></td>";
				$subprocess_info .= "<td>&nbsp; ".$name_process." &nbsp;</td>";
			$subprocess_info .= '</tr>';
			$subprocess_info .= '<tr>';
				$subprocess_info .= "<td><b>&nbsp; ".'SubEvent'." &nbsp;</b></td>";
				$subprocess_info .= "<td>&nbsp; ".$name_event." &nbsp;</td>";
			$subprocess_info .= '</tr>';
			
			$draw_Call_process_open_subprocess .= '
													<span class="task_call_process_open_subprocess_icon">
														<img qtip_info="'.$subprocess_info.'" src="modules/asol_Process/icons/task_call_process_open_subprocess_16.png" onclick="window.opener.location=\'index.php?module=asol_Process&action=DetailView&record='.$id_process.'\';" >
													</span>
												';
		}	
	
	// window.opener.location=\'index.php?module=asol_Task&action=DetailView&record='.$id.'\';
	return '
		<div class="task" style="top:'.$top.'px; left:'.$left.'px;">
			<div class="task_name overflow_ellipsis_enabled">
				<a module="asol_Task" link_id="'.$id.'" onclick="" title="'.generate_info_for_Task_HTML($name, $description, $delay_type, $order).'">'.$name.'</a>
			</div>
			<div class="task_symbol" id="'.$id.'">
				<img alt="Task" src="modules/asol_Process/icons/task_'.$task_type.'_32.png" title="'.$app_list_strings['wfm_task_type_list'][$task_type].'">
				' . $draw_Delay . '
				' . $draw_Call_process_open_subprocess . ' 
			</div>
		</div>	
	';
}

//-------------------AUX FUNCTIONS FOR DRAW NODE FUNCTIONS-----------------------//

function generate_delay($delay) {
	
	$delay_array = explode(' - ', $delay);
	
	switch ($delay_array[0]) {
		case 'minutes':
			$delay_label = translate('LBL_ASOL_MINUTES', 'asol_Activity');
			break;
		case 'hours':
			$delay_label = translate('LBL_ASOL_HOURS', 'asol_Activity');
			break;
		case 'days':
			$delay_label = translate('LBL_ASOL_DAYS', 'asol_Activity');
			break;
		case 'weeks':
			$delay_label = translate('LBL_ASOL_WEEKS', 'asol_Activity');
			break;
		case 'months':
			$delay_label = translate('LBL_ASOL_MONTHS', 'asol_Activity');
			break;
	}
	
	$delay_label = $delay_array[1]." ".$delay_label;
	
	return $delay_label;	
}

function generate_name_and_description_HTML($name, $description) {
	
	// generate HTML
	$info = "";
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_NAME', 'asol_Process')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$name." &nbsp;</td>";
	$info .= '</tr>';
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_DESCRIPTION', 'asol_Process')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$description." &nbsp;</td>";
	$info .= '</tr>';
	
	return $info;
}

function generate_info_for_Task_HTML($name, $description, $delay_type, $order) {
	
	global $app_list_strings;
	
	// generate HTML
	$info = "";
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_NAME', 'asol_Task')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$name." &nbsp;</td>";
	$info .= '</tr>';
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_DESCRIPTION', 'asol_Task')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$description." &nbsp;</td>";
	$info .= '</tr>';
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_DELAY_TYPE', 'asol_Task')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$app_list_strings['wfm_task_delay_type_list'][$delay_type]." &nbsp;</td>";
	$info .= '</tr>';
	$info .= '<tr>';
		$info .= "<td><b>&nbsp; ".translate('LBL_ORDER_TASK', 'asol_Task')." &nbsp;</b></td>";
		$info .= "<td>&nbsp; ".$order." &nbsp;</td>";
	$info .= '</tr>';
	
	return $info;
}


function generate_process_info_HTML($bean_module, $status, $description) {
	
	global $app_list_strings;
	
	// generate HTML
	$process_info = "";
	$process_info .= '<tr>';
		$process_info .= "<td><b>&nbsp; ".translate('LBL_STATUS', 'asol_Process')." &nbsp;</b></td>";
		$process_info .= "<td>&nbsp; ".$app_list_strings['wfm_process_status_list'][$status]." &nbsp;</td>";
	$process_info .= '</tr>';
	$process_info .= '<tr>';
		$process_info .= "<td><b>&nbsp; ".translate('LBL_ASOL_BEAN_MODULE', 'asol_Process')." &nbsp;</b></td>";
		$process_info .= "<td>&nbsp; ".$app_list_strings['moduleList'][$bean_module]." &nbsp;</td>";
	$process_info .= '</tr>';
	$process_info .= '<tr>';
		$process_info .= "<td><b>&nbsp; ".translate('LBL_DESCRIPTION', 'asol_Process')." &nbsp;</b></td>";
		$process_info .= "<td>&nbsp; ".$description." &nbsp;</td>";
	$process_info .= '</tr>';
	
	return $process_info;
}

function generate_event_info_HTML($type, $trigger_type, $trigger_event) {
	
	global $app_list_strings;
	
	// calculate $wfm_action
	$triggerEventTmp = explode(" - ", $trigger_event);
	
	switch ($triggerEventTmp[1]) {
		case 'on_create':
			$trigger_event = translate('LBL_ASOL_ON_CREATE', 'asol_Events');
			break;
		case 'on_modify':
			$trigger_event = translate('LBL_ASOL_ON_MODIFY', 'asol_Events');
			break;
		case 'on_modify__before_save':
			$trigger_event = translate('LBL_ASOL_ON_MODIFY_BEFORE_SAVE', 'asol_Events');
			break;
		case 'on_delete':
			$trigger_event = translate('LBL_ASOL_ON_DELETE', 'asol_Events');
			break;
	}
	
	// generate HTML
	$event_info = "";
	$event_info .= '<tr>';
		$event_info .= "<td><b>&nbsp; ".translate('LBL_TRIGGER_TYPE', 'asol_Events')." &nbsp;</b></td>";
		$event_info .= "<td>&nbsp; ".$app_list_strings['wfm_trigger_type_list'][$trigger_type]." &nbsp;</td>";
	$event_info .= '</tr>';
	$event_info .= '<tr>';
		$event_info .= "<td><b>&nbsp; ".translate('LBL_TYPE', 'asol_Events')." &nbsp;</b></td>";
		$event_info .= "<td>&nbsp; ".$app_list_strings['wfm_events_type_list'][$type]." &nbsp;</td>";
	$event_info .= '</tr>';
	$event_info .= '<tr>';
		$event_info .= "<td><b>&nbsp; ".translate('LBL_ASOL_TRIGGER_EVENT', 'asol_Events')." &nbsp;</b></td>";
		$event_info .= "<td>&nbsp; ".$trigger_event." &nbsp;</td>";
	$event_info .= '</tr>';
	
	return $event_info;
}

function generate_conditions_TableBegin_HTML() {
	
	return '
		<table id=\'conditions_Table\' class=\'gradient-style\'>
			<thead>
				<tr>
			
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_LOGICAL_OPERATORS', 'asol_Events').'
						</div>
					</th>
				
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_DATABASE_FIELD', 'asol_Events').'
						</div>
					</th>
					
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_OLD_BEAN_NEW_BEAN_CHANGED', 'asol_Events').'
						</div>
					</th>
					
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_IS_CHANGED', 'asol_Events').'
						</div>
					</th>
			
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_OPERATOR', 'asol_Events').'
						</div>
					</th>
			
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_FIRST_PARAMETER', 'asol_Events').'
						</div>
					</th>
			
					<th  scope=\'col\'>
						<div align=\'left\' width=\'100%\' style=\'white-space: nowrap;\'>
						'.translate('LBL_ASOL_SECOND_PARAMETER', 'asol_Events').'
						</div>
					</th>
			
				</tr>
			</thead>
			<tbody>
	';
}

function generate_conditions_TableEnd_HTML() {
	
	return '
			</tbody>
		</table>
	';
}

function generate_conditions_HTML($conditions_string, $module) {
	
	$conditions_to_print = "";
	$conditions_to_print .= generate_conditions_TableBegin_HTML();

	$conditions = explode("\${pipe}",$conditions_string);
	//$GLOBALS['log']->debug("***********************ASOL \$conditions=[".print_r($conditions,true)."]");
		
	foreach ($conditions as $key => $value) {
			
		$values = explode("\${dp}",$conditions[$key]);
    	// BEGIN - values array
    	$fieldName = $values[0];
    	$fieldName_array = explode("\${comma}", $fieldName);
    	$OldBean_NewBean_Changed = $values[1];
    	$OldBean_NewBean_Changed = stripcslashes($OldBean_NewBean_Changed);
    	$isChanged = $values[2];
    	$operator = $values[3];
    	$Param1 = $values[4];
    	$Param2 = $values[5]; $Param2 = str_replace('\_', '_', $Param2);
    	$fieldType = $values[6];
    	$key = $values[7];
    	$isRelated = $values[8];
    	$fieldIndex = $values[9];// index of module_fields, not rowIndex
    	//$options_string = $values[10];
    	//$options = $values[10].split("|");
    	//$options_db_string = $values[11];
        //$options_db = $values[11].split("|");
        $enum_operator = $values[10];
        $enum_reference = $values[11];
        $logical_parameters = $values[12];
    	// END - values array
    	
    	$condition_HTML = "";
        $condition_HTML .= "<tr>";
        $condition_HTML .= "<td>&nbsp; ".generate_Logical_Parameters($logical_parameters)." &nbsp;</td>";
        $condition_HTML .= "<td><b>&nbsp; ".generate_Name_of_the_Field($key, $fieldName_array, $module)." &nbsp;</b></td>";
        $condition_HTML .= "<td>&nbsp; ".(($isRelated == 'false') ? generate_OldBean_NewBean_Changed($OldBean_NewBean_Changed) : "")." &nbsp;</td>";
        $condition_HTML .= "<td>&nbsp; ".(($OldBean_NewBean_Changed == 'changed') ? generate_IsChanged($isChanged) : "") ." &nbsp;</td>";
        $condition_HTML .= "<td>&nbsp; ".(($OldBean_NewBean_Changed != 'changed') ? generate_Operator($operator) : "") ." &nbsp;</td>";
        $condition_HTML .= "<td>&nbsp; ".(($OldBean_NewBean_Changed != 'changed') ? generate_Param1($Param1, $enum_reference, $fieldType, $operator) : "") ." &nbsp;</td>";
        $condition_HTML .= "<td>&nbsp; ".(($OldBean_NewBean_Changed != 'changed') ? $Param2 : "") ." &nbsp;</td>";
        $condition_HTML .= "</tr>";
            
        $conditions_to_print .= $condition_HTML;
	}
		
	$conditions_to_print .= generate_conditions_TableEnd_HTML();
		
	return $conditions_to_print;
}

//-------------------LANGUAGE AUX FUNCTIONS FOR DRAW NODE FUNCTIONS-----------------------//

function generate_Logical_Parameters($logical_parameters) {
	
	//$GLOBALS['log']->debug("***********************ASOL \$logical_parameters=[".print_r($logical_parameters,true)."]");
	
	$lbl_and = translate("LBL_ASOL_AND", 'asol_Events');
	$lbl_or = translate("LBL_ASOL_OR", 'asol_Events');
	
	$selectedValues = explode(':', $logical_parameters);
	$parenthesis = $selectedValues[0];
	$logicalOperator = $selectedValues[1];
	
	switch ($logicalOperator) {
		case 'AND':
			$operator_label = $lbl_and;;
			break;
		case 'OR':
			$operator_label = $lbl_or;
			break;
	}
	
	$parenthesis_array = Array(
		'0' => '',
		'1' => '(',
		'2' => '((',
		'3' => '(((',
		'-1' => '..)',
		'-2' => '..))',
		'-3' => '..)))',
	);
	
	$label = $parenthesis_array[$parenthesis].'&nbsp;&nbsp;&nbsp;&nbsp;'.$operator_label;
	
	return $label;
}

function generate_Name_of_the_Field($key, $fieldName_array, $module) {
	
	global $app_list_strings, $sugar_config;
	
	// Whether translate or not variable for all this php-file
	$translateFieldLabels = ((isset($sugar_config['asolWFM_TranslateLabels'])) && ($sugar_config['asolWFM_TranslateLabels'])) ? true : false;
	
	//$GLOBALS['log']->debug("***********************ASOL \$fieldName_array=[".print_r($fieldName_array,true)."]");
	
	$value = $fieldName_array[0];
	$label_key = $fieldName_array[1];
	$label = $fieldName_array[2];
	
	$value_array = explode('.',$value);
	if (count($value_array) == 2) {
		$relatedModule = $value_array[0];
		$fieldRelatedModule = $value_array[1];
		 
		$lbl_relatedModule = $app_list_strings['moduleList'][$relatedModule];
		$lbl_fieldRelatedModule = translate($label_key, $relatedModule);
		if (!isset($lbl_fieldRelatedModule)) {///+++ Users.created_by, LBL_ASSIGNED_TO ??? algo va raro con este campo en particular
			$label_array = explode('.',$label);
			$lbl_fieldRelatedModule = $label_array[1];
		}
		
		$value = $relatedModule.".".$fieldRelatedModule;
		$label_key = $label_key;
		if ($translateFieldLabels) {
			$label = $lbl_relatedModule.".".$lbl_fieldRelatedModule;
		} else {
			$label = $value;
		}
	} else {
		$lbl_field = translate($label_key, $module);
		
		$value = $value ;
		$label_key = $label_key;
		if ($translateFieldLabels) {
			$label = $lbl_field;
		} else  {
			$label = $value;
		}
	}
	
	$label = trim($label);
	$label = (substr($label, -1) == ':') ? substr($label, 0, -1) : $label;// remove colon
	
	$label = ($key != "") ? $key." => ".$label : $label;// related_fields

	return $label;
}

function generate_OldBean_NewBean_Changed($OldBean_NewBean_Changed) {
	
	$lbl_asol_old_bean = translate("LBL_ASOL_OLD_BEAN", 'asol_Events');
	$lbl_asol_new_bean = translate("LBL_ASOL_NEW_BEAN", 'asol_Events');
	$lbl_asol_changed = translate("LBL_ASOL_CHANGED", 'asol_Events');
	
	switch ($OldBean_NewBean_Changed) {
		case 'old_bean':
			$label = $lbl_asol_old_bean;
			break;
		case 'new_bean':
			$label = $lbl_asol_new_bean;
			break;
		case 'changed':
			$label = $lbl_asol_changed;
			break;
		default:
			$label = "";
			break;
	}
	
	return $label;
}

function generate_IsChanged($isChanged) {
	
	$lbl_asol_true = translate("LBL_ASOL_TRUE", 'asol_Events');
	$lbl_asol_false = translate("LBL_ASOL_FALSE", 'asol_Events');
	
	switch ($isChanged) {
		case 'true':
			$label = $lbl_asol_true;
			break;
		case 'false':
			$label = $lbl_asol_false;
			break;
		default:
			$label = "";
			break;
	}
	
	return $label;
}

function generate_Operator($operator) {
	
	//enum
	$lbl_event_equals = translate("LBL_EVENT_EQUALS", 'asol_Events');
	$lbl_event_not_equals = translate("LBL_EVENT_NOT_EQUALS", 'asol_Events');
	$lbl_event_one_of = translate("LBL_EVENT_ONE_OF", 'asol_Events');
	$lbl_event_not_one_of = translate("LBL_EVENT_NOT_ONE_OF", 'asol_Events');
	//int
	$lbl_event_less_than = translate("LBL_EVENT_LESS_THAN", 'asol_Events');
	$lbl_event_more_than = translate("LBL_EVENT_MORE_THAN", 'asol_Events');
	//datetime
	$lbl_event_before_date = translate("LBL_EVENT_BEFORE_DATE", 'asol_Events');
	$lbl_event_after_date = translate("LBL_EVENT_AFTER_DATE", 'asol_Events');
	$lbl_event_between = translate("LBL_EVENT_BETWEEN", 'asol_Events');
	$lbl_event_not_between = translate("LBL_EVENT_NOT_BETWEEN", 'asol_Events');
	$lbl_event_last = translate("LBL_EVENT_LAST", 'asol_Events');
	$lbl_event_not_last = translate("LBL_EVENT_NOT_LAST", 'asol_Events');
	$lbl_event_this = translate("LBL_EVENT_THIS", 'asol_Events');
	$lbl_event_not_this = translate("LBL_EVENT_NOT_THIS", 'asol_Events');
	$lbl_event_next = translate("LBL_EVENT_NEXT", 'asol_Events');
	$lbl_event_not_next = translate("LBL_EVENT_NOT_NEXT", 'asol_Events');
	//default
	$lbl_event_like = translate("LBL_EVENT_LIKE", 'asol_Events');
	$lbl_event_not_like = translate("LBL_EVENT_NOT_LIKE", 'asol_Events');
	
	switch ($operator) {
		//enum
		case 'equals':
			$label = $lbl_event_equals;
			break;
		case 'not equals':
			$label = $lbl_event_not_equals;
			break;
		case 'one of':
			$label = $lbl_event_one_of;
			break;
		case 'not one of':
			$label = $lbl_event_not_one_of;
			break;
		//int
		case 'less than':
			$label = $lbl_event_less_than;
			break;
		case 'more than':
			$label = $lbl_event_more_than;
			break;
		//datetime
		case 'before date':
			$label = $lbl_event_before_date;
			break;
		case 'after date':
			$label = $lbl_event_after_date;
			break;
		case 'between':
			$label = $lbl_event_between;
			break;
		case 'not between':
			$label = $lbl_event_not_between;
			break;
		case 'last':
			$label = $lbl_event_last;
			break;
		case 'not last':
			$label = $lbl_event_not_last;
			break;
		case 'this':
			$label = $lbl_event_this;
			break;
		case 'not this':
			$label = $lbl_event_not_this;
			break;
		case 'next':
			$label = $lbl_event_next;
			break;
		case 'not next':
			$label = $lbl_event_not_next;
			break;	
		//default
		case 'like':
			$label = $lbl_event_like;
			break;
		case 'not like':
			$label = $lbl_event_not_like;
			break;
		default:
			$label = "";
			break;
	}
	
	return $label;
}

function generate_Param1($Param1, $enum_reference, $fieldType, $operator) {
	
	global $app_list_strings;
	
	$GLOBALS['log']->debug("**********[ASOL][WFM]: \$Param1=[".print_r($Param1,true)."]");
	
	$label = "";
	
	switch ($fieldType) {
		case 'enum':
			$Param1_array = explode("\${dollar}", $Param1);
			foreach ($Param1_array as $key => $value) {
				$label .=  $app_list_strings[$enum_reference][$value] . "<br>"."&nbsp;&nbsp;";
			}
			$label = substr($label, 0, (-4-6-6));
			break;
			
		case "int":
		case "double":
		case "currency":
		case "decimal":
			$label = $Param1;
			break;
			
		case "datetime":
		case "date":
			
			switch ($operator) {
				case "last":
				case "this":
				case "next":
				case "not last":
				case "not this":
				case "not next":
					$lbl_event_day = translate("LBL_EVENT_DAY", 'asol_Events');
					$lbl_event_week = translate("LBL_EVENT_WEEK", 'asol_Events');
					$lbl_event_month = translate("LBL_EVENT_MONTH", 'asol_Events');
					$lbl_event_nquarter = translate("LBL_EVENT_NQUARTER", 'asol_Events');
					$lbl_event_fquarter = translate("LBL_EVENT_FQUARTER", 'asol_Events');
					$lbl_event_nyear = translate("LBL_EVENT_NYEAR", 'asol_Events');
					$lbl_event_fyear = translate("LBL_EVENT_FYEAR", 'asol_Events');
					
					switch ($Param1) {
						case 'day':
							$label = $lbl_event_day;
							break;
						case 'week':
							$label = $lbl_event_week;
							break;
						case 'month':
							$label = $lbl_event_month;
							break;
						case 'Nquarter':
							$label = $lbl_event_nquarter;
							break;
						case 'Fquarter':
							$label = $lbl_event_fquarter;
							break;
						case 'Nyear':
							$label = $lbl_event_nyear;
							break;
						case 'Fyear':
							$label = $lbl_event_fyear;
							break;
					}
					break;
			
				default: // [between, not between]
					$label = $Param1;
					break;
			}
			
			break;
			
		case "tinyint(1)":
			$lbl_event_true = translate("LBL_EVENT_TRUE", 'asol_Events');
			$lbl_event_false = translate("LBL_EVENT_FALSE", 'asol_Events');
			
			switch ($Param1) {
				case 'true':
					$label = $lbl_event_true;
					break;
				case 'false':
					$label = $lbl_event_false;
					break;
				default:
					$label = "";
					break;
			}
			
			break;
			
		default:
			$label = $Param1;
			break;
	}
	
	$label = str_replace('\_', '_', $label);
	return $label;
}

//////////////////////////////////////////////////////////////////////////////////////////
//**************************************DRAW********************************************//
//////////////////////////////////////////////////////////////////////////////////////////

// DRAW PROCESS
if (!empty($export_array['processes'])) {
	$draw_Process = generate_Process_HTML($export_array['processes'][0]['id'], $export_array['processes'][0]['name'], $export_array['processes'][0]['bean_module'],  $export_array['processes'][0]['status'], $export_array['processes'][0]['description']);
}

// DRAW ALL EVENTS
//$top_Process = 120;
$left_Process = 50;
$height_Event = 1+7+90+7+1;
$width_Event = 1+7+90+7+1; // = 106
$separation_vertical_Event = 50;

$draw_Events = "";
if (array_key_exists('events', $export_array)) {
	foreach ($export_array['events'] as $key_parent_process => $value_parent_process) {
		foreach ($value_parent_process as $key_event => $value_event) {
			$draw_Events .= generate_Event_HTML($value_event['id'], $value_event['name'], $value_event['description'], $draw_information_event[$value_event['id']], $left_Process, $value_event['condition_event'], $value_event['type'], $value_event['trigger_type'], $value_event['trigger_event']);
			//$top_Process = $top_Process + $height_Event + $separation_vertical_Event;
		}
	}
}

// DRAW ALL ACTIVITIES(AND NEXT_ACTIVITIES) AND THEIR TASKS
$event_duplicity = Array();
$aux_counter = 0;

$draw_Activities = "";
$connections = "";
$conditions = "";
$icon_activities = "";

$activity_type = Array('activities', 'next_activities');
foreach ($activity_type as $key_activity_type => $value_activity_type) {

	//$top_Process = 120;
	$separation_horizontal_Event = 100;// for activity loop
	$separation_horizontal_Activity = 100;// for next_activity loop
	$left_Process = $left_Process + $width_Event + $separation_horizontal_Event;
	$height_Activity = 1+7+90+7+1;
	$border_Activity = 1; // this is set on the style by 'em' not by 'px', so it is relative
	$padding_Activity = 7; // this is set on the style by 'em' not by 'px', so it is relative
	$number_of_pixels_to_susbstrate_from_width_Activity = 13;
	$with_Activity_depending_on_number_of_tasks_Default = 94;// default
	$with_Activity_depending_on_number_of_tasks_Maximum = $with_Activity_depending_on_number_of_tasks_Default; // to get the nex_activity location
	$separation_vertical_Activity = 50;
	
	$number_of_connection = 0;
	
	if (array_key_exists($value_activity_type, $export_array)) {
		foreach ($export_array[$value_activity_type] as $key_parent => $value_parent) {// parent -> [event, activity, next_activity]
			
			foreach ($value_parent as $key_activity => $value_activity) {
				
				if (in_array($value_activity['id'], $event_duplicity)) {
					$GLOBALS['log']->debug("**********[ASOL][WFM]: Event duplicity");
					$connections .= drawConnection($key_parent, $value_activity['id'], $number_of_connection);
					continue;
				} else  {
					$connections .= drawConnection($key_parent, $value_activity['id'], $number_of_connection);
				}
				
				$event_duplicity[] = $value_activity['id'];
				$GLOBALS['log']->debug("**********[ASOL][WFM]: flowChart \$event_duplicity=[".print_r($event_duplicity,true)."]");
				$GLOBALS['log']->debug("**********[ASOL][WFM]: flowChart \$aux_counter=[".print_r($aux_counter++,true)."]");
				
				
				$top_Tasks_of_this_activity = 40;
				$left_Tasks_of_this_activity = 5;
				$height_Tasks_of_this_activity = 1+6+32+6+1;
				$width_Tasks_of_this_activity = 1+6+32+6+1; // = 46
				$separation_Tasks_of_this_activity = 5;
				
				$with_Activity_depending_on_number_of_tasks = $with_Activity_depending_on_number_of_tasks_Default;
	
				$draw_Tasks_of_this_activity = "";
				$counter_Tasks_of_this_activity = 0;
				
				// Draw tasks for this activity
				if (array_key_exists('tasks', $export_array)) {
					foreach ($export_array['tasks'] as $key_parent_activity => $value_parent_activity) {
						if ($key_parent_activity == $value_activity['id']) {
							
							foreach ($value_parent_activity as $key_task => $value_task) {
								$draw_Tasks_of_this_activity .= generate_Task_HTML($value_task['id'], $value_task['name'], $value_task['description'], $value_task['task_type'], $top_Tasks_of_this_activity, $left_Tasks_of_this_activity, $value_task['delay_type'], $value_task['delay'], $value_task['order_task'], $value_task['task_implementation']);
								$counter_Tasks_of_this_activity++;

								$left_Tasks_of_this_activity = $left_Tasks_of_this_activity + $width_Tasks_of_this_activity + $separation_Tasks_of_this_activity;
								$aux_width = $left_Tasks_of_this_activity - $number_of_pixels_to_susbstrate_from_width_Activity;// minimun-activity-width
								$with_Activity_depending_on_number_of_tasks = ($aux_width > $with_Activity_depending_on_number_of_tasks_Default) ? $aux_width : $with_Activity_depending_on_number_of_tasks_Default;
							}
						}
					}
				}
				
				// Calculate X-coordinate and Width-property for this activity(or next_activity)
				if ($value_activity_type == 'activities') {
					$draw_information_activity[$value_activity['id']]['x'] = $left_Process;
				} else  {
					$draw_information_activity[$value_activity['id']]['x'] = $draw_information_activity[$key_parent]['x'] + $draw_information_activity[$key_parent]['w'] + $separation_horizontal_Activity;
				}
				$draw_information_activity[$value_activity['id']]['w'] = $with_Activity_depending_on_number_of_tasks;
				
				// Draw activity(or next_activity) and connections. Information about delays and conditions inside the activity.
				$draw_Activities .= generate_Activity_HTML($value_activity['id'], $value_activity['name'], $value_activity['description'], $draw_information_activity[$value_activity['id']]['y'], $draw_information_activity[$value_activity['id']]['x'], $with_Activity_depending_on_number_of_tasks, $draw_Tasks_of_this_activity, $counter_Tasks_of_this_activity, $value_activity['condition_activity'], $value_activity['delay'], $export_array['processes'][0]['bean_module']);
			
				
				$number_of_connection++;
				//$top_Process = $top_Process + $height_Activity + $separation_vertical_Activity;
			}
		}
	}
}

//$GLOBALS['log']->debug("*********************** ASOL: 7 TEST DRAW \$export_array=[".print_r($export_array,true)."]");
//$GLOBALS['log']->debug("*********************** ASOL: 7 TEST DRAW \$draw_information_event=[".print_r($draw_information_event,true)."]");
//$GLOBALS['log']->debug("*********************** ASOL: 7 TEST DRAW \$draw_information_activity=[".print_r($draw_information_activity,true)."]");

// CONTROL-PANEL
$control_panel = '
					<div class="control_panel">
						<input type="button" id="refresh" value="'.translate('LBL_ASOL_REFRESH', 'asol_Process').'" onclick=\'window.location.reload();\' />
						<input type="button" id="text_overflow_ellipsis" value="'.translate('LBL_ASOL_TEXT_OVERFLOW_ELLIPSIS', 'asol_Process').'" onclick=\'toggleEllipsis();\' />
					</div>
				';

?>

<!-- GENERATE HTTP RESPONSE -->

<meta http-equiv="X-UA-Compatible" content="IE=9" /> <!-- needed for border-radius IE -->

<html>

	<head>
		<script src="modules/asol_Process/js/jquery.js" type="text/javascript"></script>
		<script src="modules/asol_Process/js/jquery.jsPlumb.js" type="text/javascript"></script>
		<script src="modules/asol_Process/js/jquery.qtip.js" type="text/javascript"></script>
		<!-- <link rel="stylesheet" href="modules/asol_Process/css/flowChart.css">  -->
		<link rel="stylesheet" href="modules/asol_Process/css/jquery.qtip.css">
		
		<script>
			function toggleEllipsis() {
				
				if ($('.aux_name_overflow').hasClass('overflow_ellipsis_enabled')) {
					$('.aux_name_overflow').addClass('overflow_ellipsis_disabled');
					$('.aux_name_overflow').removeClass('overflow_ellipsis_enabled');
				} else {
					$('.aux_name_overflow').addClass('overflow_ellipsis_enabled');
					$('.aux_name_overflow').removeClass('overflow_ellipsis_disabled');
				}
				
				//$(".aux_name_overflow").switchClass( "overflow_ellipsis_disabled", "overflow_ellipsis_enabled", 1000 );
				//$(".aux_name_overflow").switchClass( "overflow_ellipsis_enabled", "overflow_ellipsis_disabled", 1000 );
			}
		</script>
		
		<script>
			function generateConnections() {
				<?php echo $connections ?>
				<?php echo $conditions ?>
				<?php echo $delays ?>
				<?php //echo $icon_activities ?>
				
			}
		</script>
		
		<script>
			function main_jsPlumb() {
				//alert("jsPlumb is now loaded");
				
				jsPlumb.bind("ready", function() {
					// your jsPlumb related init code goes here
					
					jsPlumb.Defaults.Container = $("body"); // In order to attach svg-jsPlumb-tags to the body, and not to the elements´s parent that is connected  
					
					jsPlumb.importDefaults({
						// default to blue at one end and green at the other
						EndpointStyles : [{ fillStyle:'#225588' }, { fillStyle:'#225588' }],
						//EndpointStyles : [ null, null ],
						// blue endpoints 7 px; green endpoints 11.
						//Endpoints : [ [ "Dot", {radius:3} ], [ "Rectangle", { width :10, height: 10 } ]],
						Endpoints : [ [ "Dot", {radius:3} ],  [ "Dot", {radius:3} ]],
						//Endpoints : [ "Blank", "Blank" ],
						// the overlays to decorate each connection with.
						//
						ConnectionOverlays : [
							[ "Arrow", { location:0.5 } ]
						],
						
						//Connector : [ "Flowchart", { stub:10 } ],
						//Connector : [ "Bezier", { curviness:1 } ],
						Connector : [ "Straight" ],
						//Connector : [ "StateMachine", {curviness :0} ],
						// 
						Anchors : [ "RightMiddle", "LeftMiddle" ],
						//
						PaintStyle : { lineWidth:3,	strokeStyle:"#deea18", joinstyle:"round" },
						//
						HoverPaintStyle : { lineWidth:5, strokeStyle:"#2e2aF8" }
					});
	
					generateConnections();	
					
				});
		 	}		
		</script>
		
		<script>
				//-----------------MAIN SCRIPT---------------//
				
				$(document).ready(function() {

					// When pressing 'Ctrl' key and clicking on a link => redirect to EditView (instead of DetailView when only clicking without pressing)
					$("a").click(function(event) {

						var viewType = "DetailView";
						if (event.ctrlKey) {
							viewType= "EditView";	
						}

						var module = $(this).attr("module");
						var id = $(this).attr("link_id");
						window.opener.location='index.php?module='+module+'&action='+viewType+'&record='+id;
						
					});

					// jsPlumb
					main_jsPlumb();

					$('a[title]').qtip({
						style: {
							classes: 'ui-tooltip-rounded ui-tooltip-shadow'
						},
						position: {
							my: 'bottom left',
							at: 'top left'
						}
					});

					$('.process_name a').qtip({
						content: {
							attr: 'qtip_info'
						},
						style: {
							classes: 'ui-tooltip-rounded ui-tooltip-shadow myTooltip'
						},
						position: {
							my: 'top left',
							at: 'bottom left'
						}
					});
					
					$('.delay_icon img, .delay_icon_for_task img').qtip({
						content: {
							attr: 'alt'
						},
						style: {
							classes: 'ui-tooltip-rounded ui-tooltip-shadow myTooltip'
						},
						position: {
							my: 'bottom middle',
							at: 'top middle'
						}
					});

					$('.event_symbol img, .task_call_process_open_subprocess_icon img').qtip({
						content: {
							attr: 'qtip_info'
						},
						style: {
							classes: 'ui-tooltip-rounded ui-tooltip-shadow myTooltip'
						},
						position: {
							my: 'bottom left',
							at: 'top right'
						},
					});

					$('.condition_icon img, .condition_icon_for_events img').qtip({
						content: {
							attr: 'qtip_info'
						},
						style: {
							classes: 'ui-tooltip-rounded ui-tooltip-shadow myTooltip'
						},
						position: {
							my: 'left top',
							at: 'bottom middle'
						},
					});
					
				});
		
				$(window).unload(function() {
					jsPlumb.unload();
				});
		</script>
		
		<style type="text/css">
		
			/********custom scrollbar*********/
			::-webkit-scrollbar {
			    width: 12px;
			}
			
			::-webkit-scrollbar-track {
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
			    border-radius: 10px;
			}
			
			::-webkit-scrollbar-thumb {
			    border-radius: 10px;
			    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5);
			}
			/********************/
			
			
			/*****qTip******/
			.myTooltip{
				max-width: 1000px;/*Tooltips have a max-width of 280px by default*/
			}
			
			.asol_table_tooltip {
			}
			
			/*
			td, th{
			    border: 1px inset Silver;
			    width: auto;
			}
			*/
			
			.gradient-style
			{
				font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
				font-size: 12px;
				margin: 2px;
				width: auto;
				text-align: left;
				border-collapse: collapse;
			}
			.gradient-style th
			{
				font-size: 10px;
				font-weight: normal;
				padding: 1px;
				background: #b9c9fe url('modules/asol_Process/icons/gradhead.png') repeat-x;
				border-top: 2px solid #d3ddff;
				border-bottom: 1px solid #fff;
				color: #039;
			}
			.gradient-style td
			{
				padding: 1px; 
				border-bottom: 1px solid #fff;
				color: #669;
				border-top: 1px solid #fff;
				background: #e8edff url('modules/asol_Process/icons/gradback.png') repeat-x;
			}
			.gradient-style tfoot tr td
			{
				background: #e8edff;
				font-size: 12px;
				color: #99c;
			}
			.gradient-style tbody tr:hover td
			{
				background: #d0dafd url('modules/asol_Process/icons/gradhover.png') repeat-x;
				color: #339;
			}
			
			/****************/
			
			a {
				cursor: alias;
			}
			
			/***************/
			.delay_icon {/*for activity*/
				position: absolute;
				top: -13px;
				left: -9px;
				opacity: 1;
				z-index: 40;
				cursor: copy;
			}
			
			.delay_icon_for_task {
				position: absolute;
				top: 14px;
				left: -5px;
				opacity: 1;
				z-index: 40;
				cursor: copy;
			}
			
			.condition_icon {/*for activity*/
				position: absolute;
				top: 44px;
				left: -9px;
				opacity: 1;
				z-index: 40;
				cursor: help;
			}
			
			.condition_icon_for_events {
				position: absolute;
				top: 39px;
				left: -13px;
				opacity: 1;
				z-index: 40;
				cursor: help;
			}
			
			.task_call_process_open_subprocess_icon{
				position: absolute;
				top: 27px;
				left: 27px;
				opacity: 1;
				z-index: 40;
				cursor: alias;
			}
			/****************/
		
		
			._jsPlumb_endpoint,.endpointTargetLabel,.endpointSourceLabel {
				
			}
			
			._jsPlumb_connector { z-index:10; }
			._jsPlumb_endpoint { z-index:11; }
			._jsPlumb_overlay { z-index:12; }
			
			.aux_name_overflow {
			}
			
			.overflow_ellipsis_disabled {
				overflow: visible;
				text-overflow: ellipsis;
			}
			
			.overflow_ellipsis_enabled {
				overflow: hidden;
				text-overflow: ellipsis;
			}
		
			.control_panel {
				border-color: orange;
    			border-style: ridge;
    			position: absolute;
    			top: 5px;
    			left: 5px;	
			}
			
			.process_name {
				position: absolute;
				top: 70px;
				left: 5px; 
				
				white-space: nowrap;
				font-family: arial;
				font-size: 30px;
				width: auto;
				cursor: pointer;
				color: blue;
				
				text-decoration: none;
			}
			
			.process_name:hover {
				text-decoration: underline;
			}
			
			.process_name a {
				
			}
			
			.event {
				position: absolute;
			}
			
			.event_symbol {
				border: 1px solid #346789;
				box-shadow: 2px 2px 19px #aaa;
				-o-box-shadow: 2px 2px 19px #aaa;
				-webkit-box-shadow: 2px 2px 19px #aaa;
				-moz-box-shadow: 2px 2px 19px #aaa;
				-moz-border-radius: 0.5em;
				border-radius: 0.5em;
				opacity: 1;
				filter: alpha(opacity = 80);
				background-color: #eeeeef;
				padding: 0.5em;
				font-size: 0.9em;
			    cursor: pointer;
			    
			    z-index: 20;
				position: absolute;
			    width: auto;
				height: auto;
			}
			
			.event_symbol:hover {
				box-shadow: 2px 2px 19px #444;
				-o-box-shadow: 2px 2px 19px #444;
				-webkit-box-shadow: 2px 2px 19px #444;
				-moz-box-shadow: 2px 2px 19px #444;
				opacity: 1;
				filter: alpha(opacity = 60);
			}
			
			.event_name {
				font-family: arial;
				font-size: 13px;
				white-space: nowrap;
				position: absolute;
    			top: 104px;
    			width: 106px;
    			color: blue;
    			
    			cursor: pointer;
    			
    			text-decoration: none;
			}
			
			.event_name:hover {
    			text-decoration: underline;
			}
			
			.event_name a {
				width: auto;
			}
			
			/**********************/
			
			.activity {
				
				width: auto;
				height: auto;
				position: absolute;
			}
			
			.activity_symbol {
				border: 1px solid #346789;
				box-shadow: 2px 2px 19px #aaa;
				-o-box-shadow: 2px 2px 19px #aaa;
				-webkit-box-shadow: 2px 2px 19px #aaa;
				-moz-box-shadow: 2px 2px 19px #aaa;
				-moz-border-radius: 0.5em;
				border-radius: 0.5em;
				opacity: 1;
				filter: alpha(opacity = 80);
				width: 668px;
				height: 90px;
				z-index: 20;
				position: absolute;
				background-color: #eeeeef;
				padding: 0.5em;
				font-size: 0.9em;
			    cursor: pointer;
			}
			
			.activity_symbol img {
				z-index: 40;
			}
			
			
			
			.activity_symbol:hover {
				box-shadow: 2px 2px 19px #444;
				-o-box-shadow: 2px 2px 19px #444;
				-webkit-box-shadow: 2px 2px 19px #444;
				-moz-box-shadow: 2px 2px 19px #444;
				opacity: 1;
				filter: alpha(opacity = 60);
			}
			
			.activity_name {
				font-family: arial;
				font-size: 13px;
			
				white-space: nowrap;
				width: auto;
				height: auto;
				position: absolute;
			    left: 5px/*45px*/;
			    top: 12px;
			    color: blue;
			    
			    text-decoration: none;
			}
			
			.activity_name:hover {
				text-decoration: underline;
			}
			
			.activity_name a {
				width: auto;
			}
			/**********************/
			
			.task {
				width: auto;
				height: auto;
				position: absolute;
			}
			
			.task_symbol {
				border: 1px solid #346789;
				box-shadow: 2px 2px 19px #aaa;
				-o-box-shadow: 2px 2px 19px #aaa;
				-webkit-box-shadow: 2px 2px 19px #aaa;
				-moz-box-shadow: 2px 2px 19px #aaa;
				-moz-border-radius: 0.5em;
				border-radius: 0.5em;
				opacity: 0.8;
				filter: alpha(opacity = 80);
				width: auto;
				height: auto;
				z-index: 20;
				position: absolute;
				background-color: #eeeeef;
				padding: 0.5em;
				font-size: 0.9em;
			    cursor: pointer;
			}
			
			.task_symbol:hover {
				box-shadow: 2px 2px 19px #444;
				-o-box-shadow: 2px 2px 19px #444;
				-webkit-box-shadow: 2px 2px 19px #444;
				-moz-box-shadow: 2px 2px 19px #444;
				opacity: 0.6;
				filter: alpha(opacity = 60);
			}
			
			.task_name {
				/*overflow: hidden;
				text-overflow: ellipsis;*/
				font-family: arial;
				font-size: 13px;
				
				white-space: nowrap;
				width: 46px;
				height: auto;
				color: blue;
				
				text-decoration: none;
			}
			
			.task_name:hover {
				text-decoration: underline;
			}
			
			.task_name a {
				width: auto;
				font-size: 10px;
			}
			
		</style>
		
		<title>Flow</title>
		
		
	</head>

	<body>
		
		<?php echo $control_panel; ?>
		
		<?php echo $draw_Process; ?>
		
		<?php echo $draw_Events; ?>
		
		<?php echo $draw_Activities; ?>
		
	</body>

</html>

<?php 
$GLOBALS['log']->debug("**********[ASOL][WFM]: EXIT flowChart");

exit;
?>