<?php 
 //WARNING: The contents of this file are auto-generated



$layout_defs['FP_events']['subpanel_setup']['delegates'] = array(
    'order' => 10,
    'sort_order' => 'desc',
    'title_key' => 'LBL_DEFAULT_SUBPANEL_TITLE',
    'type' => 'collection',
    'subpanel_name' => 'delegates',   //this values is not associated with a physical file.
    'header_definition_from_subpanel' => 'Contacts',
    'module' => 'Delegates',
    'select_link_top'=>true,

    'top_buttons' => array(
        array('widget_class' => 'SubPanelTopButton_c'),
        array('widget_class' => 'SubPanelDelegatesSelectButton'),
        array('widget_class' => 'SubPanelSendInvitesButton'),
        //array('widget_class' => 'SubPanelTopSelectButton', 'mode' => 'MultiSelect'),
        array('widget_class' => 'SubPanelManageDelegatesButton'),
        array('widget_class' => 'SubPanelManageAcceptancesButton'),
        array('widget_class' => 'SubPanelCheck'),
        array('widget_class' => 'SubPanelExportOsyButton'),
        array('widget_class' => 'SubPanelManageDelegatePayCostOsyButton'),
        array(
            'widget_class' => 'SubPanelTopButtonAddToList',
            'call_back_function' => 'osyDelegatesAddToList',
        ),
    ),

    'collection_list' => array(
        'accounts' => array(
            'module' => 'Accounts',
            'subpanel_name' => 'FP_events_subpanel_fp_events_accounts',
            'get_subpanel_data' => 'accounts',
        ),
        'osy_contactspotentialmember' => array(
            'module' => 'osy_contactspotentialmember',
            'subpanel_name' => 'FP_events_osy_contactspotentialmember',
            'get_subpanel_data' => 'osy_contactspotentialmember',
        ),
        'osy_other_contacts' => array(
            'module' => 'osy_other_contacts',
            'subpanel_name' => 'FP_events_osy_other_contacts',
            'get_subpanel_data' => 'osy_other_contacts',
        ),
        'contacts' => array(
            'module' => 'Contacts',
            'subpanel_name' => 'FP_events_subpanel_fp_events_contacts',
            'get_subpanel_data' => 'fp_events_contacts',
        ),
        'leads' => array(
            'module' => 'Leads',
            'subpanel_name' => 'FP_events_subpanel_fp_events_leads_1',
            'get_subpanel_data' => 'fp_events_leads_1',
        ),
    ),
);
?>