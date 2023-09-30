
<link href="modules/asol_Process/css/asol_process_style.css?version=D20130116" rel="stylesheet" type="text/css" />
<link href="modules/asol_Process/css/asol_popupHelp.css?version=D20130116" rel="stylesheet" type="text/css" />

<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_user, $mod_strings, $app_strings, $timedate, $app_list_strings, $db;

$focus = new asol_Process();
$focusId = (isset($_REQUEST['record'])) ? $_REQUEST['record'] : "";

if (!empty($focusId)) { // Modify
	$focus->retrieve($_REQUEST['record']);
	$triggerModule = $focus->bean_module;
	$selectModules_Disabled = ' disabled=""';
} else { // Create
	$selectModules_Disabled = '';
}

// Get modules that the active-user can access
$acl_modules = ACLAction::getUserActions($current_user->id);

$GLOBALS['log']->debug("**********[ASOL][WFM]: bean_module.php: before \$acl_modules=[".print_r($acl_modules, true)."]");

// Create array $module with module_labels
foreach($acl_modules as $key=>$mod){
	if ($mod['module']['access']['aclaccess'] >= 0) {
		$module[$key] = (isset($app_list_strings['moduleList'][$key])) ? $app_list_strings['moduleList'][$key] : $key;
	}
}
asort($module);

// Create select
$selectModules = "<select id='triggerModule' name='triggerModule' onChange='saveToHiddenInput();' ".$selectModules_Disabled.">";
$selectModules .= "<option value=''></option>";

foreach($module as $key=>$mod){
		$selectModules .= ($triggerModule == $key) ? "<option value='".$key."' selected>".$mod."</option>" : "<option value='".$key."'>".$mod."</option>";
}

$selectModules .= "</select>";

echo $selectModules;

?>

<script>
	document.onload = saveToHiddenInput();
	function saveToHiddenInput() {
		document.getElementById("bean_module").value = document.getElementById("triggerModule").value;
	}
</script>

<script src="modules/asol_Process/js/jquery.js" type="text/javascript"></script>
<link href="modules/asol_Process/css/jquery.ui.css" rel="stylesheet" type="text/css" />
<script src="modules/asol_Process/js/jquery.ui.js" type="text/javascript"></script>

<script>
	function main() {
		//alert("JQuery is now loaded");
		
		// jQuery-ui
		$.fx.speeds._default = 500;
		$.extend($.ui.dialog.prototype.options, {width: 500, show: "side", hide: "size"});
		
		$(document).ready(function() {
			
		});
	}		
</script>

<script>
 	main();
</script>	