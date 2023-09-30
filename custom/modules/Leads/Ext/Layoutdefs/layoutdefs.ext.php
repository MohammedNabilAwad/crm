<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2013-04-30 14:52:24
$layout_defs["Leads"]["subpanel_setup"]['fp_events_leads_1'] = array (
  'order' => 100,
  'module' => 'FP_events',
  'subpanel_name' => 'ForLeads',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_LEADS_1_FROM_FP_EVENTS_TITLE',
  'get_subpanel_data' => 'fp_events_leads_1',
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


 // created: 2023-09-17 12:14:43
$layout_defs["Leads"]["subpanel_setup"]['leads_ad001_certificate_of_origin_1'] = array (
  'order' => 100,
  'module' => 'ad001_Certificate_of_Origin',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
  'get_subpanel_data' => 'leads_ad001_certificate_of_origin_1',
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


 // created: 2023-09-27 10:20:58
$layout_defs["Leads"]["subpanel_setup"]['leads_ad001_certificate_of_origin_2'] = array (
  'order' => 100,
  'module' => 'ad001_Certificate_of_Origin',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
  'get_subpanel_data' => 'leads_ad001_certificate_of_origin_2',
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


$layout_defs ['Leads'] ['subpanel_setup'] ['osy_contactpotentialmember_subpanel'] = array (
		'order' => 100,
		'module' => 'osy_contactspotentialmember',
		'subpanel_name' => 'osy_contactspotentialmember_leads',
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_CONTACT_POTENTIAL_MEMBER',
		'get_subpanel_data' => 'osy_contactpotentialmember_link',
		'top_buttons' => array (
//				array (
//						'widget_class' => 'SubPanelTopButtonQuickCreate'
//				),
				array(
					'widget_class' => 'SubPanelTopButtonQuickCreateCustom',
					'additional_form_fields' => array(
						'lead_id' => '$id',
						'lead_name' => '$account_name',
						//'lead_name' => '$name'
					)
				),
				array (
						'widget_class' => 'SubPanelTopSelectButton',
						'mode' => 'MultiSelect'
				)
		)
);


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


//auto-generated file DO NOT EDIT
$layout_defs['Leads']['subpanel_setup']['osy_service']['override_subpanel_name'] = 'Lead_subpanel_osy_service';


//auto-generated file DO NOT EDIT
$layout_defs['Leads']['subpanel_setup']['osy_contactpotentialmember_subpanel']['override_subpanel_name'] = 'Lead_subpanel_osy_contactpotentialmember_subpanel';

?>