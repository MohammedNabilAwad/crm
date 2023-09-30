<?php 
 //WARNING: The contents of this file are auto-generated


/*
$layout_defs ['osy_contactspotentialmember'] ['subpanel_setup'] ['prospect_list_subpanel'] = array (
		'order' => 10,
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_PROSPECT_LIST',
		'subpanel_name' => 'custom_prospect_lists', // not a real file name because
		'type' => 'collection', // this is a collection
		'module' => 'ProspectLists',
		'collection_list' => array (
				'pl_contactspotentialmember' => array (
						'subpanel_name' => 'ForContacts',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists_contacts', // here custom method defined
						'generate_select' => true, // to build custom SQL query
						'function_parameters' => array (
								'return_as_array' => 'true'
						)  // to get data for subpanel collection item
								),
				'pl_leads' => array (
						'subpanel_name' => 'ForAccounts',
						'module' => 'ProspectLists',
						'get_subpanel_data' => 'function:get_all_related_prospect_lists_leads', // here custom method defined
						'generate_select' => true, // to build custom SQL query
						'function_parameters' => array (
								'return_as_array' => 'true'
						)  // to get data for subpanel collection item
								)
		)
);
*/



$layout_defs["osy_contactspotentialmember"]["subpanel_setup"]["campaign_log"] = array (
  'order' => 1000,
  'module' => 'CampaignLog',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'CampaignLog',
  'get_subpanel_data' => 'campaign_log',
  'top_buttons' => array(),
);


 // created: 2013-04-30 14:52:24
$layout_defs["osy_contactspotentialmember"]["subpanel_setup"]['fp_events_contactspotentialmember'] = array (
  'order' => 100,
  'module' => 'FP_events',
  'subpanel_name' => 'ForOsy_contactspotentialmember',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_ACCOUNTS_FROM_FP_EVENTS_TITLE',
  'get_subpanel_data' => 'fp_events',
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

?>