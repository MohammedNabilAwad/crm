
<script src='modules/asol_Task/js/asol_task.js?version=D20130116'></script>

<?php

global $beanList, $beanFiles, $app_list_strings, $timedate, $db, $mod_strings;

/*
 * We make two queries.
 * Information is put into a string where each field is separated by '${pipe}'.
 * Within each field there are two sub-fields separated by '${comma}'.
 */
$users_opts = "";
$users_query = $db->query("
							SELECT id, user_name 
							FROM users 
							WHERE deleted=0
							ORDER BY user_name
						");
while ($users_row = $db->fetchByAssoc($users_query)) {
		$users_opts .= $users_row['id'] . '${comma}' . $users_row['user_name'] . '${pipe}';
}
$users_opts = substr($users_opts, 0, -7);

$acl_roles_opts = "";
$acl_roles_query = $db->query("
								SELECT id, name 
								FROM acl_roles 
								WHERE deleted=0
								ORDER BY name
							");
while ($acl_roles_row = $db->fetchByAssoc($acl_roles_query)) {
		$acl_roles_opts .= $acl_roles_row['id'] . '${comma}' . $acl_roles_row['name'] . '${pipe}';
}
$acl_roles_opts = substr($acl_roles_opts,0 , -7);

/*Get the task status options*/
$task_type = isset($_REQUEST['task_type']) ? $_REQUEST['task_type'] : $focus->task_type;
$select_task_type_field = "<select name='task_type' id='task_type' onChange='window.onbeforeunload = function () {return;}; if ((this.value != \"create_object\") && (this.value != \"modify_object\")) { selected_option_task(\"task_type\", null, \"" .$users_opts . "\", \"". $acl_roles_opts . "\", \"".$timedate->get_cal_date_format()."\" ); if (this.value ==\"".$focus->task_type."\") {rememberImplementationField(\"".$focus->task_type."\", \"".$focus->task_implementation."\");} document.getElementById(\"task_implementation_field\").style.display=\"block\"; document.getElementById(\"task_implementation_field_create_object\").style.display=\"none\"; } else { this.form.action.value = \"EditView\"; this.form.submit(); }'>";

//$select_task_type_field .= "<option value=''></option>";
foreach ($app_list_strings['wfm_task_type_list'] as $key=>$task_type_field) {
	$select_task_type_field .= ($task_type == $key) ? "<option value='". $key ."' selected> ". $task_type_field ." </option>" : "<option value='". $key ."'> ". $task_type_field ." </option>";
}
$select_task_type_field .= "</select>";
echo $select_task_type_field;

?>