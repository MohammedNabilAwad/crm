<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global  $current_user;

$acl_modules = ACLAction::getUserActions($current_user->id);


echo 'Rebuild logic_hooks.<BR>';
echo '<BR>';

foreach($acl_modules as $key=>$mod){// $key = Accounts, Opportunities ...

	if($mod['module']['access']['aclaccess'] >= 0) {
		echo $key;
		echo '<BR>';
		//$selectModules .= ($objectModule == $key) ? "<option value='".$key."' selected>".$app_list_strings['moduleList'][$key]."</option>" : "<option value='".$key."'>".$app_list_strings['moduleList'][$key]."</option>";
		check_logic_hook_file($key, "after_save", array(1, "wfm_hook",  "custom/include/wfm_hook.php", "wfm_hook_process", "execute_process"));
		check_logic_hook_file($key, "before_save", array(1, "wfm_hook",  "custom/include/wfm_hook.php", "wfm_hook_process", "execute_process"));
	}
}

echo '<BR>';
echo '<BR>';
echo 'Done.';

?>