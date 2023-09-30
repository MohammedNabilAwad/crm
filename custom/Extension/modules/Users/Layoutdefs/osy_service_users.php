<?php
$layout_defs["Users"]["subpanel_setup"]["osy_service_users"] = array (
		'order' => 100,
		'module' => 'osy_service',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_SERVICE_USERS',
		'get_subpanel_data' => 'osy_service_users',
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