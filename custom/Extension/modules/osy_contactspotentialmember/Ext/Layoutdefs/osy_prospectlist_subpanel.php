<?php
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
?>