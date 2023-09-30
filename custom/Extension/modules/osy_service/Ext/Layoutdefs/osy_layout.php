<?php
$layout_defs["osy_service"]["subpanel_setup"]["prospect_lists"] = array (
		'order' => 100,
		'module' => 'ProspectLists',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_PROSPECT_LISTS_SUBPANEL_TITLE',
		'get_subpanel_data' => 'prospect_lists',
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

$layout_defs["osy_service"]["subpanel_setup"]["history"] =  array(
	'order' => 40,
	'title_key' => 'LBL_HISTORY_SUBPANEL_TITLE',
	'type' => 'collection',
	'subpanel_name' => 'history',   //this values is not associated with a physical file.
	'header_definition_from_subpanel'=> 'osy_service',
	'module'=>'History',

	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateNoteButton'),
	),

	'collection_list' => array(
		'notes' => array(
			'module' => 'Notes',
			'subpanel_name' => 'Forosy_service',
			'get_subpanel_data' => 'notes',
		),
	)
);