<?php

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
