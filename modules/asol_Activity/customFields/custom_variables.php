<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

global $mod_strings;

?>

<input type='text' id='custom_variable' />
<input type='button' id='add_custom_variable_button' onClick='onClick_add_custom_variable_button();' value='<?php echo $mod_strings['LBL_ADD_CUSTOM_VARIABLE_BUTTON']; ?>' />

<?php 
require_once("modules/asol_Activity/customFields/javascript.php");
?>