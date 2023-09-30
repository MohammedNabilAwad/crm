<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');


class SugarWidgetSubPanelTopButtonAddToList extends SugarWidgetSubPanelTopButton {

    public function SugarWidgetSubPanelTopButtonAddToList() {
        return parent::SugarWidgetSubPanelTopButton(array(
            'widget_class'	=> 'SugarWidgetSubPanelTopButtonAddToList',
            'title'		=> 'LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE',
            'access_key'	=> 'LBL_ADD_TO_LIST_BUTTON_KEY',
            'form_value'	=> 'LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL',
            'ACL'		=> 'edit',
        ));
    }


    public function display($defines, $additionalFormFields = NULL, $asUrl = false) {
        global $app_strings;

        // module
        if( isset($defines['module']) ) $this->module = $defines['module'];

        // title
        if( isset($defines['title']) ) $this->title = $app_strings[$defines['title']];

        // access_key
        if( isset($defines['access_key']) ) $this->access_key = $app_strings[$defines['access_key']];

        // form_name
        if( isset($defines['form_value']) ) $this->form_value = translate($defines['form_value'], $this->module);

        return parent::display($defines,$additionalFormFields);
    }

    function &_get_form($defines, $additionalFormFields = null, $asUrl = false) {
//        $button = parent::_get_form($defines, $additionalFormFields);        
        $button = '<form action="index.php" method="post" name="form" onsubmit="open_popup(\'ProspectLists\',\'600\',\'400\',\'\',true,false,{call_back_function:\''.$defines['call_back_function'].'\',\'field_to_name_array\':{id:\'prospect_list\'} } );return false;">';

        return $button;		
    }
}

?>
