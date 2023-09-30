<?php

$dictionary['osy_other_contacts']['fields']['alt_address_pobox_c'] = array(
//il campo si chiama "alt_..._c" per coerenza con il campo relativo "primary_..._c" creato da studio
    'required' => false,
    'name' => 'alt_address_pobox_c',
    'vname' => 'LBL_ALT_ADDRESS_POBOX',
    'type' => 'varchar',
    'massupdate' => '0',
    'default' => '',
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
);
$dictionary['osy_other_contacts']['fields']['alt_address_region_c'] = array(
//il campo si chiama "alt_..._c" per coerenza con il campo relativo "primary_..._c" creato da studio
    'required' => false,
    'name' => 'alt_address_region_c',
    'vname' => 'LBL_ALT_ADDRESS_REGION',
    'type' => 'varchar',
    'massupdate' => '0',
    'default' => '',
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => '255',
    'size' => '20',
);
$dictionary['osy_other_contacts']['fields']['primary_address_other'] = array(
    'name' => 'primary_address_other',
    'vname' => 'LBL_PRIMARY_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
);

$dictionary['osy_other_contacts']['fields']['alt_address_other'] = array(
    'name' => 'alt_address_other',
    'vname' => 'LBL_ALT_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
);

$dictionary ['osy_other_contacts'] ['fields'] ['prospect_lists_link'] = array(
    'name' => 'prospect_lists_link',
    'type' => 'link',
    'relationship' => 'prospectlist_osy_other_contacts',
    'module' => 'ProspectLists',
    'source' => 'non-db',
    'vname' => 'LBL_PROSPECT_LIST'
);

$dictionary["osy_other_contacts"]["fields"]['emails'] = array(
    'name' => 'emails',
    'vname' => 'LBL_EMAILS_OTHER_CONTACTS_REL',
    'type' => 'link',
    'relationship' => 'emails_osy_other_contacts_rel',
    'module' => 'Emails',
    'bean_name' => 'Email',
    'source' => 'non-db',
);

$dictionary ['osy_other_contacts'] ['relationships']['emails_osy_other_contacts_rel'] = array(
    'lhs_module' => 'Emails',
    'lhs_table' => 'emails',
    'lhs_key' => 'id',
    'rhs_module' => 'osy_other_contacts',
    'rhs_table' => 'osy_other_contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'many-to-many',
    'join_table' => 'emails_beans',
    'join_key_lhs' => 'email_id',
    'join_key_rhs' => 'bean_id',
    'relationship_role_column' => 'bean_module',
    'relationship_role_column_value' => 'osy_other_contacts',
);


$dictionary['osy_other_contacts']['fields']['alt_address_street_2']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['alt_address_street_3']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['email']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['assistant_phone']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['assistant']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['created_by']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['date_entered']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['date_modified']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['deleted']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['invalid_email']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['modified_by_name']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['modified_user_id']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['full_name']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['email_opt_out']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['email2']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['primary_address_street_2']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['primary_address_street_3']['importable'] = false;
$dictionary['osy_other_contacts']['fields']['salutation']['importable'] = false;


//relazione n-n con FP_events
$dictionary["osy_other_contacts"]["fields"]["fp_events"] = array(
    'name' => 'fp_events',
    'type' => 'link',
    'relationship' => 'fp_events_osy_other_contacts',
    'source' => 'non-db',
    'vname' => 'LBL_FP_EVENTS_TITLE',
);

$dictionary["osy_other_contacts"]["fields"]["e_invite_status_fields"] =
    array(
        'name' => 'e_invite_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'event_invite_id',
                'invite_status' => 'event_status_name',
            ),
        'vname' => 'LBL_CONT_INVITE_STATUS',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary["osy_other_contacts"]["fields"]["event_status_name"] =
    array(
        'massupdate' => false,
        'name' => 'event_status_name',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS_EVENT',
        'options' => 'fp_event_invite_status_dom',
        'importable' => 'false',
    );
$dictionary["osy_other_contacts"]["fields"]["event_invite_id"] =
    array(
        'name' => 'event_invite_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS',
        'studio' =>
            array(
                'listview' => false,
            ),
    );
$dictionary["osy_other_contacts"]["fields"]["e_accept_status_fields"] =
    array(
        'name' => 'e_accept_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'event_status_id',
                'accept_status' => 'event_accept_status',
            ),
        'vname' => 'LBL_CONT_ACCEPT_STATUS',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary["osy_other_contacts"]["fields"]["event_accept_status"] =
    array(
        'massupdate' => false,
        'name' => 'event_accept_status',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS_EVENT',
        'options' => 'fp_event_status_dom',
        'importable' => 'false',
    );
$dictionary["osy_other_contacts"]["fields"]["event_status_id"] =
    array(
        'name' => 'event_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS',
        'studio' =>
            array(
                'listview' => false,
            ),
    );


$dictionary['osy_other_contacts']['fields']['payment_status_fields'] =
    array(
        'name' => 'payment_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'payment_status_id',
                'payment_status' => 'osy_payment_status',
            ),
        'vname' => 'LBL_PAYMENT_STATUS',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['osy_other_contacts']['fields']['osy_payment_status'] =
    array(
        'massupdate' => false,
        'name' => 'osy_payment_status',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS',
        'options' => 'osy_payment_status_list',
        'importable' => 'false',
    );
$dictionary['osy_other_contacts']['fields']['payment_status_id'] =
    array(
        'name' => 'payment_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS_ID',
        'studio' =>
            array(
                'listview' => false,
            ),
    );


//cost
//**************************************
$dictionary['osy_other_contacts']['fields']['cost_fields'] =
    array(
        'name' => 'cost_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'cost_id',
                'cost' => 'osy_cost',
            ),
        'vname' => 'LBL_COST',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['osy_other_contacts']['fields']['osy_cost'] =
    array(
        'massupdate' => false,
        'name' => 'osy_cost',
        'type' => 'varchar',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST',
    );
$dictionary['osy_other_contacts']['fields']['cost_id'] =
    array(
        'name' => 'cost_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST_ID',
        'studio' =>
            array(
                'listview' => false,
            ),
    );
//**************************************


$dictionary["osy_other_contacts"]["relationships"]['campaignlog_osy_other_contacts'] = array(
    'lhs_module' => 'CampaignLog',
    'lhs_table' => 'campaign_log',
    'lhs_key' => 'target_id',
    'rhs_module' => 'osy_other_contacts',
    'rhs_table' => 'osy_other_contacts',
    'rhs_key' => 'id',
    'relationship_type' => 'one-to-many',
);

$dictionary["osy_other_contacts"]["fields"]['campaign_log'] = array(
    'name' => 'campaign_log',
    'type' => 'link',
    'relationship' => 'campaignlog_osy_other_contacts',
    'module' => 'CampaignLog',
    'bean_name' => 'CampaignLog',
    'source' => 'non-db',
    'vname' => 'LBL_CAMPAIGN_LOG',
);
$dictionary["osy_other_contacts"]["fields"]['panel_name'] = array(
    'name' => 'panel_name',
    'type' => 'enum',
    'options' => 'delegate_types_list',
    'source' => 'non-db',
    'vname' => 'LBL_PANEL_NAME',
);

//OPENSYMBOLMOD paolo.santacatterina (07/feb/2013  18:00:55)
//inserito campo annual_revenue per modulo Leads
$dictionary["osy_other_contacts"]["fields"]['annual_revenue'] = array(
    'name' => 'annual_revenue',
    'vname' => 'LBL_ANNUAL_REVENUE',
    'type' => 'varchar',
    'len' => 100,
    'comment' => 'Annual revenue for this person',
    'merge_filter' => 'enabled',
);
//************************************************************


$dictionary["osy_other_contacts"]["fields"]['campaigns'] = array(
    'name' => 'campaigns',
    'type' => 'link',
    'vname' => 'LBL_CAMPAIGNS',
    'relationship' => 'campaign_osy_other_contacts',
    'source' => 'non-db',
);

$dictionary["osy_other_contacts"]["fields"]['campaign_id'] = array(
    'name' => 'campaign_id',
    'vname' => 'LBL_CAMPAIGN_ID',
    'rname' => 'id',
    'id_name' => 'campaign_id',
    'type' => 'id',
    'table' => 'campaigns',
    'isnull' => 'true',
    'module' => 'Campaigns',
    'reportable' => false,
    'massupdate' => false,
    'duplicate_merge' => 'disabled',
    'importable' => false,
);

$dictionary["osy_other_contacts"]["fields"]['campaign_name'] = array(
    'name' => 'campaign_name',
    'rname' => 'name',
    'vname' => 'LBL_CAMPAIGN',
    'type' => 'relate',
    'reportable' => false,
    'source' => 'non-db',
    'table' => 'campaigns',
    'id_name' => 'campaign_id',
    'link' => 'campaigns',
    'module' => 'Campaigns',
    'duplicate_merge' => 'disabled',
    'importable' => false,
);

$dictionary['osy_other_contacts']['relationships']['campaign_osy_other_contacts'] = array(
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'osy_other_contacts',
    'rhs_table' => 'osy_other_contacts',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
);

