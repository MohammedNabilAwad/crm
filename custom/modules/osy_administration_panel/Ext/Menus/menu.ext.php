<?php 
 //WARNING: The contents of this file are auto-generated

 
//OPENSYMBOLMOD isabella.masiero 06/mag/2013
global $current_user, $mod_strings, $app_strings;
$module_menu=array();
if(ACLController::checkAccess($module, 'detail', true))$module_menu[] = array("index.php?module=$module&action=index", $mod_strings['LNK_LIST'], $module, $module);

?>