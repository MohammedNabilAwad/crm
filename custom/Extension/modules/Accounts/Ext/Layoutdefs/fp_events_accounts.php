<?php
// created: 2013-04-30 14:52:24
$layout_defs["Accounts"]["subpanel_setup"]['fp_events_accounts'] = array(
    'order' => 100,
    'module' => 'FP_events',
    'type' => 'collection',
    'sort_order' => 'asc',
    'sort_by' => 'id',
    'title_key' => 'LBL_FP_EVENTS_ACCOUNTS_FROM_FP_EVENTS_TITLE',
    'collection_list' => array(
        'contacts' => array(
            'subpanel_name' => 'ForAccounts',
            'module' => 'FP_events',
            'get_subpanel_data' => 'function:get_related_contacts', // here custom method defined
            'generate_select' => true,             // to build custom SQL query
            'function_parameters' => array(
                // File where the above function is defined at
                'import_function_file' => 'custom/modules/FP_events/utils.php',
            ),
        ),
        'accounts' => array(
            'subpanel_name' => 'ForAccounts',
            'module' => 'FP_events',
            'get_subpanel_data' => 'function:get_related_accounts', // here custom method defined
            'generate_select' => true,             // to build custom SQL query
            'function_parameters' => array(
                // File where the above function is defined at
                'import_function_file' => 'custom/modules/FP_events/utils.php',
            ),
        ),
    ),
    'top_buttons' =>
        array(
            0 =>
                array(
                    'widget_class' => 'SubPanelTopButtonQuickCreate',
                ),
            1 =>
                array(
                    'widget_class' => 'SubPanelTopSelectButton',
                    'mode' => 'MultiSelect',
                ),
        ),
);
