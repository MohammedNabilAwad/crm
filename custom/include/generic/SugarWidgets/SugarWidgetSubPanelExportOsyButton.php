<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelExportOsyButton extends SugarWidgetSubPanelTopButton
{
    function display($defines, $additionalFormFields = NULL, $nonbutton = false)
    {
        global $mod_strings;

//        $button = '<input class="button" onclick="document.location=\'index.php?module=FP_events&action=export_invites&record='.$defines['focus']->id.'\'" name="export_invites" value="'.$mod_strings['LBL_EXPORT_INVITES'].'" type="button">';
        $button  = "<form id='ManageDelegatesForm' name='ManageDelegatesForm' method='post' action=''>";
        // $button .= "<input id='custom_hidden_5' type='hidden' name='custom_hidden_5' value=''/>";
        $button .= "<input id='export_event' class='button' type='button' name='export_event' onclick='export_invites()' value='".$mod_strings['LBL_EXPORT_INVITES']."'/>\n</form>";
        return $button;
    }
}