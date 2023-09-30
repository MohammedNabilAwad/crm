<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_user, $mod_strings, $app_strings, $timedate, $app_list_strings, $db;

$focus = new asol_Task();
$focus->retrieve($_REQUEST['record']);

$task_type = (isset($_REQUEST['task_type'])) ? $_REQUEST['task_type'] : $focus->task_type;

$triggerModule = $focus->getContextModule();
$tmpMod = explode("\${mod}", $focus->task_implementation);

$mod = (count($tmpMod) == 2) ? $tmpMod[0] : "";
$objModule = (isset($_REQUEST['objectModule'])) ? $_REQUEST['objectModule'] : $mod;

$objectModule = ($task_type == "modify_object") ? $triggerModule : $objModule;

//$urlRedirect = "./index.php?module=".$_REQUEST['module']."&action=".$_REQUEST['action']."&return_module=".$_REQUEST['return_module']."&return_action=".$_REQUEST['return_action'];

// Get the modules that the user can access
$acl_modules = ACLAction::getUserActions($current_user->id);

echo "<input type='hidden' id='triggerModule' value='".$triggerModule."'>";

if ($task_type == "create_object") 
	$selectModules = "<select id='objectModule' name='objectModule' onChange='window.onbeforeunload = function () {return;}; this.form.module.value=\"".$_REQUEST['module']."\"; this.form.action.value=\"".$_REQUEST['action']."\"; this.form.submit();'>";
else if ($task_type == "modify_object") {
	$selectModules = "<input type='hidden' id='objectModule' name='objectModule' value='".$objectModule."'>"; 
	$selectModules .= "<select  disabled onChange='window.onbeforeunload = function () {return;}; this.form.module.value=\"".$_REQUEST['module']."\"; this.form.action.value=\"".$_REQUEST['action']."\"; this.form.submit();'>";	
}
$selectModules .= "<option value=''></option>";

foreach($acl_modules as $key=>$mod){

	if($mod['module']['access']['aclaccess'] >= 0) {
		$value_displayed =  (isset($app_list_strings['moduleList'][$key])) ? $app_list_strings['moduleList'][$key] : $key;
		$selectModules .= ($objectModule == $key) ? "<option value='".$key."' selected>".$value_displayed."</option>" : "<option value='".$key."'>".$value_displayed."</option>";
	}
}

$selectModules .= "</select>";

echo $selectModules;

?>