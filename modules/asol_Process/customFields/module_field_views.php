<?php
global $app_list_strings;
$focus = new asol_Process();
$focus->retrieve($_REQUEST['record']);

$triggerModuleTmp = $focus->bean_module;
$triggerModule = (isset($_REQUEST['triggerModule'])) ? $_REQUEST['triggerModule'] : $triggerModuleTmp;


echo $app_list_strings['moduleList'][$triggerModule];