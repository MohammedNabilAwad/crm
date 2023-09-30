<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

class SugarWidgetSubPanelSendInvitesButton extends SugarWidgetSubPanelTopButton
{
//    function display($defines, $additionalFormFields = null)
//    {
//        global $mod_strings;
//       
//        $button = '<input class="button" onclick="document.location=\'index.php?module=FP_events&action=sendinvitemails&record='.$defines['focus']->id.'\'" name="sendinvites" value="'.$mod_strings['LBL_INVITE_PDF'].'" type="button">';
//        return $button; 
//    }
    
    public function SugarWidgetSubPanelSendInvitesButton() {
        return parent::SugarWidgetSubPanelTopButton(array(
            'widget_class'	=> 'SugarWidgetSubPanelTopButtonAddToList',
            'title'		=> 'LBL_INVITE_PDF',
            'form_value'	=> 'LBL_INVITE_PDF',
            'ACL'		=> 'edit',
        ));
    }


    function &_get_form($defines, $additionalFormFields = NULL, $asUrl = false) {
        $formValues = array(
            'module' => 'FP_events',
            'action' => 'sendinvitemails',
            'record' => $defines['focus']->id,
        );
        $button = '<form action="index.php" method="get" name="SendInvites">';
        foreach($formValues as $key => $value) {
            $button .= "<input type='hidden' name='" . $key . "' value='" . $value . "' />\n";
        }

        return $button;		
    }
}
