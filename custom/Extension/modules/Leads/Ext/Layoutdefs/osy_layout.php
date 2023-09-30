<?php
// OPENSYMBOLMOD - START - davide.dallapozza - 30/gen/2014
// *************************************************


//unset($layout_defs['Leads']['subpanel_setup']['campaigns']); // Commented due to - ITCILOSUI-12

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************

$layout_defs["Leads"]["subpanel_setup"]["activities"]["top_buttons"] = array(
		array('widget_class' => 'SubPanelTopCreateNoteButton'),
		array('widget_class' => 'SubPanelTopCreateTaskButton'),
		array('widget_class' => 'SubPanelTopScheduleMeetingButton'),
		array('widget_class' => 'SubPanelTopScheduleCallButton'),
		array('widget_class' => 'SubPanelTopComposeEmailButton'),
);

$layout_defs["Leads"]["subpanel_setup"]["history"]["top_buttons"] = array(
		array('widget_class' => 'SubPanelTopArchiveEmailButton'),
		array('widget_class' => 'SubPanelTopSummaryButton'),
);


$layout_defs["Leads"]["subpanel_setup"]["osy_services_companies_leads"] = array (
		'order' => 100,
		'module' => 'osy_services_companies',
		'subpanel_name' => 'osy_services_companies_leads',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_SERVICES_COMPANIES_LEADS',
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

// sistemato sottopannello, ma comunque lo tengo commentato perchè è stato sostituito dal sottopannello prospect_list_leads
//$layout_defs["Leads"]["subpanel_setup"]["osy_service"] = array (
//		'order' => 100,
//		'module' => 'osy_service',
//		'subpanel_name' => 'default',
//		'sort_order' => 'asc',
//		'sort_by' => 'id',
//		'title_key' => 'LBL_OSY_SERVICE',
//		'get_subpanel_data' => 'osy_service',
//		'top_buttons' =>
//		array (
//				0 =>
//				array (
//						'widget_class' => 'SubPanelTopButtonQuickCreate',
//				),
//				1 =>
//				array (
//						'widget_class' => 'SubPanelTopSelectButton',
//						'mode' => 'MultiSelect',
//				),
//		),
//);

/*
$layout_defs['Leads']['subpanel_setup']['prospect_list_leads'] = array(
		'order' => 10,
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_PROSPECT_LIST_LEADS_SUBPANEL',
		'subpanel_name' => 'custom_prospect_lists', // not a real file name because
		'type' => 'collection',                     // this is a collection
		'module' => 'ProspectLists',
		'collection_list' => array(
				'pl_contacts' => array(
						'subpanel_name' => 'ForLeads',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists', // here custom method defined
						'generate_select' => true,             // to build custom SQL query
						'function_parameters' => array('return_as_array' => 'true'), // to get data for subpanel collection item
				),
				'pl_accounts' => array(
						'subpanel_name' => 'ForLeads',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists_2', // here custom method defined
						'generate_select' => true,             // to build custom SQL query
						'function_parameters' => array('return_as_array' => 'true'), // to get data for subpanel collection item
				),
		),
		'top_buttons' => array(),
);
*/

// Commented because not neede in this project - ITCILOSUI-12
/*$layout_defs["Leads"]["subpanel_setup"]["campaign_log"] = array (
  'order' => 1000,
  'module' => 'CampaignLog',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'CampaignLog',
  'get_subpanel_data' => 'campaign_log',
  'top_buttons' => array(),
);*/
