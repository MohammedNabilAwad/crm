<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

global $current_user, $mod_strings, $app_strings, $timedate, $app_list_strings, $db;

$focus = new asol_Events();
$focus->retrieve($_REQUEST['record']);

$triggerEventTmp = explode(" - ", $focus->trigger_event);

$triggerModule = (isset($_REQUEST['triggerModule'])) ? $_REQUEST['triggerModule'] : $triggerEventTmp[0];
$triggerEvent = (isset($_REQUEST['triggerEvent'])) ? $_REQUEST['triggerEvent'] : $triggerEventTmp[1];

$selectEvents = "<select id='triggerEvent' name='triggerEvent'>";
$selectEvents .= ($triggerEvent == "on_create") ? "<option value='on_create' selected>".$mod_strings['LBL_ASOL_ON_CREATE']."</option>" : "<option value='on_create'>".$mod_strings['LBL_ASOL_ON_CREATE']."</option>";
$selectEvents .= ($triggerEvent == "on_modify") ? "<option value='on_modify' selected>".$mod_strings['LBL_ASOL_ON_MODIFY']."</option>" : "<option value='on_modify'>".$mod_strings['LBL_ASOL_ON_MODIFY']."</option>";
$selectEvents .= ($triggerEvent == "on_modify__before_save") ? "<option value='on_modify__before_save' selected>".$mod_strings['LBL_ASOL_ON_MODIFY_BEFORE_SAVE']."</option>" : "<option value='on_modify__before_save'>".$mod_strings['LBL_ASOL_ON_MODIFY_BEFORE_SAVE']."</option>";
$selectEvents .= ($triggerEvent == "on_delete") ? "<option value='on_delete' selected>".$mod_strings['LBL_ASOL_ON_DELETE']."</option>" : "<option value='on_delete'>".$mod_strings['LBL_ASOL_ON_DELETE']."</option>";
$selectEvents .= "</select>";

echo $selectEvents;

?>