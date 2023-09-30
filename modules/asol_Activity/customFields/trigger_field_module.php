<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_user, $mod_strings, $app_strings, $timedate, $app_list_strings, $db;

$focus = new asol_Activity();
$focus->retrieve($_REQUEST['record']);

//$urlRedirect = "./index.php?module=".$_REQUEST['module']."&action=".$_REQUEST['action']."&return_module=".$_REQUEST['return_module']."&return_action=".$_REQUEST['return_action'];

$module_name = $focus->getContextModule();

//Obtener los m�dulo a los que tiene acceso el usuario activo
$acl_modules = ACLAction::getUserActions($current_user->id);

$selectModules = "<select id='triggerModule' name='triggerModule' disabled='true' onChange='this.form.module.value=\"".$_REQUEST['module']."\"; this.form.action.value=\"".$_REQUEST['action']."\"; this.form.activity_conditions.value=\"\"; this.form.submit();'>";
$selectModules .= "<option value=''></option>";

foreach($acl_modules as $key=>$mod){
	if($mod['module']['access']['aclaccess'] >= 0) {
		$value_displayed =  (isset($app_list_strings['moduleList'][$key])) ? $app_list_strings['moduleList'][$key] : $key;
		$selectModules .= ($module_name == $key) ? "<option value='".$key."' selected>".$value_displayed."</option>" : "<option value='".$key."'>".$value_displayed."</option>";
	}
}

$selectModules .= "</select>";

echo $selectModules;

?>