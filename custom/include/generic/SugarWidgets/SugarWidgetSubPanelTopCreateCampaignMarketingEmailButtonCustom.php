<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopCreateCampaignMarketingEmailButton.php');

class SugarWidgetSubPanelTopCreateCampaignMarketingEmailButtonCustom extends SugarWidgetSubPanelTopCreateCampaignMarketingEmailButton
{
    public function SugarWidgetSubPanelTopCreateCampaignMarketingEmailButtonCustom() {
        return parent::SugarWidgetSubPanelTopButton(array(
            'widget_class'	=> 'SugarWidgetSubPanelTopCreateCampaignMarketingEmailButtonCustom',
            'title'			=> 'LBL_NEW_BUTTON_TITLE',
            'access_key'	=> 'LBL_NEW_BUTTON_KEY',
            'form_value'	=> 'LBL_NEW_BUTTON_LABEL',
            'ACL'			=> 'edit',
        ));
    }
    public function display($layout_def, $additionalFormFields = null, $nonbutton = false) {

        global $app_strings;

        $id = $layout_def['focus']->id;
        $module = $layout_def['focus']->module_name;

        $href = "index.php?module=$module&action=WizardMarketing&campaign_id=$id" . (!empty($layout_def['func']) ? '&func=' . $layout_def['func'] : '');

        $label = $app_strings['LBL_CREATE_BUTTON_LABEL'];
        $label = ucfirst(strtolower($label));
        return "<input title='".$label."' name='".$this->getWidgetId()."'  id='". $this->getWidgetId()."' onclick=\"location.href='" . $href . "'\" class='button' type='submit' value='".$label."'>";
    }

}