<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$module_name='osy_gestione_pagamento';
$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
	),

	'where' => " prospect_lists_prospects.related_type = 'Leads' ",

	'list_fields' => array(
		'lead_name' => array(
			'width' => '15%',
			'widget_class' => 'SubPanelCustom',
			'sortable' => false,
			'vname' => 'LBL_LIST_ACCOUNT_NAME',				
// 			'query' => "",
// 			'return_field' => '',
			'customCode' => '
				{php}				
					if(empty($GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ])) {
						$GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ] = BeanFactory::getBean($this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_TYPE"],$this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"]);
					}				
					echo $GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ] -> account_name;			
				{/php}
			',
		),
		'lead_refered_by' => array(
			'width' => '15%',
			'widget_class' => 'SubPanelCustom',
			'sortable' => false,
			'vname' => 'LBL_LIST_REFERED_BY',
// 			'query' => "",
// 			'return_field' => '',
			'customCode' => '
				{php}				
					if(empty($GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ])) {
						$GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ] = BeanFactory::getBean($this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_TYPE"],$this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"]);
					}				
					echo $GLOBALS["osyLeadsProspectListsBeans"][ $this->_tpl_vars["aLayoutDefs"]["fields"]["RELATED_ID"] ] -> refered_by;			
				{/php}
			',
		),
		'payment_status' => array(
	 		'vname' => 'LBL_PAYMENT_STATUS',
	 		'width' => '10%',
		), 
		'cost' => array(
	 		'vname' => 'LBL_COST',
	 		'width' => '10%',
		), 
		'edit_button'=>array(
			'widget_class' => 'SubPanelEditButton',
		 	'module' => $module_name,
	 		'width' => '4%',
		),
		'remove_button'=>array(
			'widget_class' => 'SubPanelRemoveButton',
		 	'module' => $module_name,
			'width' => '5%',
		),
		'related_type'=>array(
			'usage' => 'query_only',
		),
		'related_id' => array(
			'usage' => 'query_only',
		),
	),
);

?>