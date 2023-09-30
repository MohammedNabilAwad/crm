<?php 
 //WARNING: The contents of this file are auto-generated


require_once 'modules/FP_events/Menu.php';

if (ACLController::checkAccess('FP_events', 'edit', true)) {
    $module_menu[] = array(
        "index.php?module=FP_events&action=WebToContactCreation&return_module=FP_events&return_action=index",
        $mod_strings['LBL_WEB_TO_CONTACT'], "CreateWebToContactForm"
    );
}


?>