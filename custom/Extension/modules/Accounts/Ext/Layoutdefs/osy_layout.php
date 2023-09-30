<?php

unset($layout_defs['Accounts']['subpanel_setup']['leads']);
unset($layout_defs['Accounts']['subpanel_setup']['products_services_purchased']);

$layout_defs["Accounts"]["subpanel_setup"]["osy_services_companies"] = array (
		'order' => 100,
		'module' => 'osy_services_companies',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_SERVICES_COMPANIES_SUBPANEL_TITLE',
		'get_subpanel_data' => 'osy_services_companies',
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

$layout_defs["Accounts"]["subpanel_setup"]["accounts_association_subpanel"] = array (
		'order' => 100,
		'module' => 'Accounts',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_ACCOUNTS_ASSOCIATION_SUBPANEL',
		'get_subpanel_data' => 'members',
		
);

//$layout_defs["Accounts"]["subpanel_setup"]["activities_for_leads"] = array (
//	'order' => 10,
//			'sort_order' => 'desc',
//			'sort_by' => 'date_start',
//			'title_key' => 'LBL_ACTIVITIES_FOR_LEADS',
//			'type' => 'collection',
//			'subpanel_name' => 'activities',   //this values is not associated with a physical file.
//			'header_definition_from_subpanel'=> 'meetings',
//			'module'=>'Activities',
//
//			'top_buttons' => array(
//				/*array('widget_class' => 'SubPanelTopCreateTaskOsyButton'),
//				array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
//				array('widget_class' => 'SubPanelTopScheduleCallButton'),
//				array('widget_class' => 'SubPanelTopComposeEmailButton'),*/
//			),
//
//			'collection_list' => array(
//					'notes' => array(
//							'module' => 'Notes',
//							'subpanel_name' => 'ForHistory',
//							'get_subpanel_data' => 'notes_for_leads',
//					),
//				'tasks' => array(
//					'module' => 'Tasks',
//					'subpanel_name' => 'ForActivities',
//					'get_subpanel_data' => 'tasks_for_leads',
//				),
//                'meetings' => array(
//                    'module' => 'Meetings',
//                    'subpanel_name' => 'ForActivities',
//                    'get_subpanel_data' => 'meetings_for_leads',
//                ),
//				'calls' => array(
//					'module' => 'Calls',
//					'subpanel_name' => 'ForActivities',
//					'get_subpanel_data' => 'calls_for_leads',
//				),
//			)
//);

$layout_defs["Accounts"]["subpanel_setup"]["activities"]["top_buttons"] = array(
	array(
		'widget_class' => 'SubPanelTopCreateNoteButton'
	),
	array(
		'widget_class' => 'SubPanelTopCreateTaskButtonCustom',
		'additional_form_fields' => array(
			'account_id' => '$id',
			'account_name' => '$name'
		)
	),
	array(
		'widget_class' => 'SubPanelTopScheduleMeetingButton'
	),
	array(
		'widget_class' => 'SubPanelTopScheduleCallButton'
	),
	array(
		'widget_class' => 'SubPanelTopComposeEmailButton'
	)
);

$layout_defs["Accounts"]["subpanel_setup"]["history"]["top_buttons"] = array(
		array('widget_class' => 'SubPanelTopArchiveEmailButton'),
		array('widget_class' => 'SubPanelTopSummaryButton'),
			);
//$layout_defs["Accounts"]["subpanel_setup"]["campaigns"] = array(); //rimosso sottopannello campaigns --> Commented due to - ITCILOSUI-12
$layout_defs["Accounts"]["subpanel_setup"]["accounts"] = array(); //rimosso sottopannello account (Member Organization)

// $layout_defs["Accounts"]["subpanel_setup"]["prospect_list_accounts"] = array (
// 		'order' => 105,
// 		'module' => 'ProspectLists',
// 		//'subpanel_name' => 'ForAccounts',
// 		'sort_order' => 'asc',
// 		'sort_by' => 'id',
// 		'title_key' => 'LBL_PROSPECT_LIST_ACCOUNTS_SUBPANEL',
// 		//'get_subpanel_data' => 'prospect_lists',
// 		'subpanel_name' => 'custom_prospect_lists', // not a real file name because
// 		'type' => 'collection',  // this is a collection
// 		'get_subpanel_data' => 'function:get_all_related_prospect_lists', // here custom method defined
// 		'generate_select' => true,             // to build custom SQL query
// 		'function_parameters' => array('return_as_array' => 'true'), // to get data for subpanel collection item
		
// 		'top_buttons' =>
// 		array (
// 				0 =>
// 				array (
// 						'widget_class' => 'SubPanelTopButtonQuickCreate',
// 				),
// 				1 =>
// 				array (
// 						'widget_class' => 'SubPanelTopSelectButton',
// 						'mode' => 'MultiSelect',
// 				),
// 		),
// );

/*
$layout_defs['Accounts']['subpanel_setup']['prospect_list_accounts'] = array(
		'order' => 10,
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_PROSPECT_LIST_ACCOUNTS_SUBPANEL',
		'subpanel_name' => 'custom_prospect_lists', // not a real file name because
		'type' => 'collection',                     // this is a collection
		'module' => 'ProspectLists',
		'collection_list' => array(
				'pl_contacts' => array(
						'subpanel_name' => 'ForContacts',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists', // here custom method defined
						'generate_select' => true,             // to build custom SQL query
						'function_parameters' => array('return_as_array' => 'true'), // to get data for subpanel collection item
				),
				'pl_accounts' => array(
						'subpanel_name' => 'ForAccounts',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists_2', // here custom method defined
						'generate_select' => true,             // to build custom SQL query
						'function_parameters' => array('return_as_array' => 'true'), // to get data for subpanel collection item
				),
		),
		'top_buttons' => array (
// 				0 =>
// 				array (
// 						'widget_class' => 'SubPanelTopButtonQuickCreate',
// 				),
// 				1 =>
// 				array (
// 						'widget_class' => 'SubPanelTopSelectButton',
// 						'mode' => 'MultiSelect',
// 				),
		),
);
*/

$layout_defs["Accounts"]["subpanel_setup"]["contacts"]["top_buttons"] = array(
	array(
		'widget_class' => 'SubPanelTopButtonQuickCreateCustom',
		'additional_form_fields' => array(
			'account_id' => '$id',
			'account_name' => '$name'
		)
	),
	array(
		'widget_class' => 'SubPanelTopSelectButton',
	)
);


$layout_defs["Accounts"]["subpanel_setup"]["opportunities"]["top_buttons"] = array(
	array(
		'widget_class' => 'SubPanelTopButtonQuickCreateCustom',
		'additional_form_fields' => array(
			'account_id' => '$id',
			'account_name' => '$name'
		)
	),
	array(
		'widget_class' => 'SubPanelTopSelectButton',
	)
);


// Commented because not neede in this project - ITCILOSUI-12
/*$layout_defs["Accounts"]["subpanel_setup"]["campaign_log"] = array (
  'order' => 1000,
  'module' => 'CampaignLog',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'CampaignLog',
  'get_subpanel_data' => 'campaign_log',
  'top_buttons' => array(),
);*/
