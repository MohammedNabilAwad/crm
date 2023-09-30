<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelManageDelegatePayCostOsyButton extends SugarWidgetSubPanelTopButton
{

    function display($defines, $additionalFormFields = NULL, $nonbutton = false)
    {
        global $mod_strings;

        $button  = "<form id='ManageDelegatesForm' name='ManageDelegatesForm' method='post' action=''>";
        // $button .= "<input id='custom_hidden_5' type='hidden' name='custom_hidden_5' value=''/>";
        $button .= "<input id='Manage_Pay_Costs' class='button' type='button' name='Manage_Pay_Costs' onclick='manage_pay_costs()' value='".$mod_strings['LBL_MANAGE_PAY_COSTS_TITLE']."'/>\n</form>";
        return $button;
    }
}