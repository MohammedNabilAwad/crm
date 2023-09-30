<?php
$layout_defs["osy_services_companies"]["subpanel_setup"]["activities"] = array (
	'order' => 10,
	'sort_order' => 'desc',
	/*'sort_by' => 'date_start',*/
	'title_key' => 'LBL_ACTIVITIES_SUBPANEL_TITLE',
	'type' => 'collection',
	'subpanel_name' => 'activities',   //this values is not associated with a physical file.
	'header_definition_from_subpanel'=> 'meetings',
	'module'=>'Activities',

	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateNoteButton'),
		array(
			'widget_class' => 'SubPanelTopCreateTaskButtonCustom',
			'additional_form_fields' => array(
				'account_id' => '$id',
				'account_name' => '$name'
			),
		),
		array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
		array('widget_class' => 'SubPanelTopScheduleCallButton'),
	),

	'collection_list' => array(
		'tasks' => array(
			'module' => 'Tasks',
			'subpanel_name' => 'ForActivities',
			'get_subpanel_data' => 'tasks',
		),
		'meetings' => array(
			'module' => 'Meetings',
			'subpanel_name' => 'ForActivities',
			'get_subpanel_data' => 'meetings',
		),
		'calls' => array(
			'module' => 'Calls',
			'subpanel_name' => 'ForActivities',
			'get_subpanel_data' => 'calls',
		),
	)
);

$layout_defs["osy_services_companies"]["subpanel_setup"]["history"] = array(
			'order' => 20,
			'sort_order' => 'desc',
			'sort_by' => 'date_entered',
			'title_key' => 'LBL_HISTORY_SUBPANEL_TITLE',
			'type' => 'collection',
			'subpanel_name' => 'history',   //this values is not associated with a physical file.
			'module'=>'History',

			'top_buttons' => array(				
				array('widget_class' => 'SubPanelTopSummaryButton'),
			),

			'collection_list' => array(
				'tasks' => array(
					'module' => 'Tasks',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'tasks',
				),
                'meetings' => array(
                    'module' => 'Meetings',
                    'subpanel_name' => 'ForHistory',
                    'get_subpanel_data' => 'meetings',
                ),
				'calls' => array(
					'module' => 'Calls',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'calls',
				),
				'notes' => array(
					'module' => 'Notes',
					'subpanel_name' => 'ForHistory',
					'get_subpanel_data' => 'notes',
				),				
			)
);