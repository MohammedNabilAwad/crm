<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopCreateTaskButton.php');


class SugarWidgetSubPanelTopCreateTaskButtonCustom extends SugarWidgetSubPanelTopCreateTaskButton {

	public function SugarWidgetSubPanelTopCreateTaskButtonCustom() {
		return parent::SugarWidgetSubPanelTopButton(array(
			'widget_class'	=> 'SugarWidgetSubPanelTopCreateTaskButtonCustom',
			'title'			=> 'LBL_NEW_TASK_BUTTON_TITLE',
			'access_key'	=> 'LBL_NEW_TASK_BUTTON_KEY',
			'form_value'	=> 'LBL_CREATE_TASK',
			'ACL'			=> 'edit',
        ));
	}
	
	public function display($defines, $additionalFormFields = null, $nonbutton = false) {
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
		$button = parent::_get_form($defines, $additionalFormFields);
		require_once 'custom/include/generic/SugarWidgets/customFunctions.php';
		addAdditionalFormFields($button, $defines);
		return $button;		
	}
}

?>
