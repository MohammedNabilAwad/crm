<?php 
 //WARNING: The contents of this file are auto-generated



unset($layout_defs['Opportunities']['subpanel_setup']['leads']);
unset($layout_defs['Opportunities']['subpanel_setup']['contacts']);

$layout_defs["Opportunities"]["subpanel_setup"]["osy_service"] = array (
		'order' => 100,
		'module' => 'osy_service',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OPPORTUNITIES_OSY_SERVICE',
		'get_subpanel_data' => 'osy_service',
		'top_buttons' =>
		array (
		    0 =>
		 array (
		 		'widget_class' => 'SubPanelTopButtonQuickCreate',
		       ),
			1 =>
		array (
		'widget_class' => 'SubPanelTopSelectButton',
		'mode' => 'MultiSelect',
			),
	 	),
	);


 // created: 2020-03-13 09:57:04
$layout_defs["Opportunities"]["subpanel_setup"]['opportunities_osy_payment_management_1'] = array (
  'order' => 100,
  'module' => 'osy_payment_management',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_OPPORTUNITIES_OSY_PAYMENT_MANAGEMENT_1_FROM_OSY_PAYMENT_MANAGEMENT_TITLE',
  'get_subpanel_data' => 'opportunities_osy_payment_management_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['Opportunities']['subpanel_setup']['osy_service']['override_subpanel_name'] = 'Opportunity_subpanel_osy_service';

?>