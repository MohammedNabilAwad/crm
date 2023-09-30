<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary ['osy_contactspotentialmember'] ['fields'] ['primary_address_pobox_c'] = array(
    'required' => false,
    'name' => 'primary_address_pobox_c',
    'vname' => 'LBL_BILLING_ADDRESS_POBOX',
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
    'size' => '20'
);
$dictionary ['osy_contactspotentialmember'] ['fields'] ['primary_address_region_c'] = array(
    'required' => false,
    'name' => 'primary_address_region_c',
    'vname' => 'LBL_BILLING_ADDRESS_REGION',
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
    'size' => '20'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['alt_address_pobox_c'] = array(
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
    'size' => '20'
);
$dictionary ['osy_contactspotentialmember'] ['fields'] ['alt_address_region_c'] = array(
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
    'size' => '20'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['primary_address_other'] = array(
    'name' => 'primary_address_other',
    'vname' => 'LBL_PRIMARY_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['alt_address_other'] = array(
    'name' => 'alt_address_other',
    'vname' => 'LBL_ALT_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['role_function'] = array(
    'name' => 'role_function',
    'vname' => 'LBL_ROLE_FUNCTION',
    'type' => 'enum',
    'options' => 'osy_role_function_list',
    'len' => '255'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['other_role_function'] = array(
    'name' => 'other_role_function',
    'vname' => 'LBL_OTHER_ROLE_FUNCTION',
    'type' => 'varchar',
    'len' => '255'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['vip'] = array(
    'name' => 'vip',
    'vname' => 'LBL_VIP',
    'type' => 'bool'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['category'] = array(
    'name' => 'category',
    'vname' => 'LBL_CATEGORY',
    'type' => 'enum',
    'options' => 'osy_categories_list',
    'len' => '255'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['contact_type'] = array(
    'name' => 'contact_type',
    'vname' => 'LBL_CONTACT_TYPE',
    'type' => 'enum',
    'options' => 'osy_contact_type_list',
    'len' => '255'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['gender'] = array(
    'required' => false,
    'name' => 'gender',
    'vname' => 'LBL_GENDER',
    'type' => 'enum',
    'massupdate' => '1',
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
    'len' => 100,
    'size' => '20',
    'options' => 'gender_0',
    'studio' => 'visible',
    'dependency' => false,
    'studio' => 'visible'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['main_representative'] = array(
    'required' => false,
    'name' => 'main_representative',
    'vname' => 'LBL_MAIN_REPRESENTATIVE',
    'type' => 'bool',
    'massupdate' => '0',
    'default' => '0',
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
    'studio' => 'visible'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['lead_id'] = array(
    'required' => false,
    'name' => 'lead_id',
    'rname' => 'id',
    'id_name' => 'lead_id',
    'vname' => 'LBL_LEAD_ID',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => 0,
    'reportable' => 0,
    'len' => 36,
    'importable' => 1,
);
$dictionary ['osy_contactspotentialmember'] ['fields'] ['lead_name'] = array(
    'required' => true,
    'source' => 'non-db',
    'rname' => 'account_name',
// 		'rname' => 'last_name',
    'db_concat_fields' => array(0 => 'account_name'),
    'name' => 'lead_name',
    'vname' => 'LBL_LEAD_NAME',
    'type' => 'relate',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => 0,
    'reportable' => 0,
    'len' => '255',
    'id_name' => 'lead_id',
    'link' => 'leads_link',
    'module' => 'Leads',
    'save' => true,
    'quicksearch' => 'enabled',
    'studio' => 'visible',
    'importable' => 1,
);
$dictionary ['osy_contactspotentialmember'] ['fields'] ['leads_link'] = array(
    'name' => 'leads_link',
    'type' => 'link',
    'relationship' => 'osy_contactspotentialmember_lead',
    'source' => 'non-db',
    'vname' => 'LBL_LEAD_ID'
);
$dictionary ['osy_contactspotentialmember'] ['relationships'] ['osy_contactspotentialmember_lead'] = array(
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'osy_contactspotentialmember',
    'rhs_table' => 'osy_contactspotentialmember',
    'rhs_key' => 'lead_id',
    'relationship_type' => 'one-to-many'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['prospect_lists_link'] = array(
    'name' => 'prospect_lists_link',
    'type' => 'link',
    'relationship' => 'prospectlist_osy_contactspotentialmember',
    'module' => 'ProspectLists',
    'source' => 'non-db',
    'vname' => 'LBL_PROSPECT_LIST'
);

$dictionary ['osy_contactspotentialmember'] ['fields'] ['industry'] = array(
    'name' => 'industry',
    'vname' => 'LBL_INDUSTRY',
    'comment' => '',
    'required' => false,
    'type' => 'multienum',
    'massupdate' => 0,
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 300,
    'size' => '300',
    'options' => 'osy_industries_list',
    'studio' => 'visible',
    'isMultiSelect' => true
);

$dictionary['osy_contactspotentialmember']['fields']['alt_address_street_2']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['alt_address_street_3']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['assistant_phone']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['assistant']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['created_by']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['date_entered']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['date_modified']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['deleted']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['contact_type']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['department']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['email_opt_out']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['email']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['full_name']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['phone_home']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['invalid_email']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['phone_mobile']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['modified_by_name']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['modified_user_id']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['email_opt_out']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['email2']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['phone_other']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['primary_address_street_2']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['primary_address_street_3']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['salutation']['importable'] = false;
$dictionary['osy_contactspotentialmember']['fields']['title']['importable'] = false;


//relazione n-n con FP_events
$dictionary["osy_contactspotentialmember"]["fields"]["fp_events"] = array(
    'name' => 'fp_events',
    'type' => 'link',
    'relationship' => 'fp_events_osy_contactspotentialmember',
    'source' => 'non-db',
    'vname' => 'LBL_FP_EVENTS_TITLE',
);

$dictionary["osy_contactspotentialmember"]["fields"]["e_invite_status_fields"] =
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
$dictionary["osy_contactspotentialmember"]["fields"]["event_status_name"] =
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
$dictionary["osy_contactspotentialmember"]["fields"]["event_invite_id"] =
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
$dictionary["osy_contactspotentialmember"]["fields"]["e_accept_status_fields"] =
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
$dictionary["osy_contactspotentialmember"]["fields"]["event_accept_status"] =
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
$dictionary["osy_contactspotentialmember"]["fields"]["event_status_id"] =
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


$dictionary['osy_contactspotentialmember']['fields']['payment_status_fields'] =
    array (
        'name' => 'payment_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array (
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
$dictionary['osy_contactspotentialmember']['fields']['osy_payment_status'] =
    array (
        'massupdate' => false,
        'name' => 'osy_payment_status',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS',
        'options' => 'osy_payment_status_list',
        'importable' => 'false',
    );
$dictionary['osy_contactspotentialmember']['fields']['payment_status_id'] =
    array (
        'name' => 'payment_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS_ID',
        'studio' =>
            array (
                'listview' => false,
            ),
    );

//cost
//**************************************
$dictionary['osy_contactspotentialmember']['fields']['cost_fields'] =
    array (
        'name' => 'cost_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array (
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
$dictionary['osy_contactspotentialmember']['fields']['osy_cost'] =
    array (
        'massupdate' => false,
        'name' => 'osy_cost',
        'type' => 'varchar',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST',
    );
$dictionary['osy_contactspotentialmember']['fields']['cost_id'] =
    array (
        'name' => 'cost_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST_ID',
        'studio' =>
            array (
                'listview' => false,
            ),
    );
//**************************************

$dictionary["osy_contactspotentialmember"]["relationships"]['campaignlog_osy_contactspotentialmember'] = array (
    'lhs_module'=> 'CampaignLog',
    'lhs_table'=> 'campaign_log',
    'lhs_key' => 'target_id',
    'rhs_module'=> 'osy_contactspotentialmember',
    'rhs_table'=> 'osy_contactspotentialmember',
    'rhs_key' => 'id',
    'relationship_type'=>'one-to-many',
);

$dictionary["osy_contactspotentialmember"]["fields"]['campaign_log'] = array (
    'name' => 'campaign_log',
    'type' => 'link',
    'relationship' => 'campaignlog_osy_contactspotentialmember',
    'module' => 'CampaignLog',
    'bean_name' => 'CampaignLog',
    'source' => 'non-db',
    'vname' => 'LBL_CAMPAIGN_LOG',
);


$dictionary["osy_contactspotentialmember"]["fields"]['emails'] = array (
    'name'		=> 'emails',
    'vname'		=> 'LBL_EMAILS_OSY_CONTACTSPOTENTIALMEMBER_REL',
    'type'		=> 'link',
    'relationship'	=> 'emails_osy_contactspotentialmember_rel',
    'module'		=> 'Emails',
    'bean_name'		=> 'Email',
    'source'		=> 'non-db',
);

$dictionary ['osy_contactspotentialmember'] ['relationships']['emails_osy_contactspotentialmember_rel'] = array(
    'lhs_module'		=> 'Emails',
    'lhs_table'			=> 'emails',
    'lhs_key'			=> 'id',
    'rhs_module'		=> 'osy_contactspotentialmember',
    'rhs_table'			=> 'osy_contactspotentialmember',
    'rhs_key'			=> 'id',
    'relationship_type'         => 'many-to-many',
    'join_table'		=> 'emails_beans',
    'join_key_lhs'		=> 'email_id',
    'join_key_rhs'		=> 'bean_id',
    'relationship_role_column'  => 'bean_module',
    'relationship_role_column_value' => 'osy_contactspotentialmember',
);
$dictionary["osy_contactspotentialmember"]["fields"]['panel_name'] = array (
    'name' => 'panel_name',
    'type' => 'enum',
    'options' => 'delegate_types_list',
    'source' => 'non-db',
    'vname' => 'LBL_PANEL_NAME',
);


//OPENSYMBOLMOD paolo.santacatterina (07/feb/2013  18:00:55)
//inserito campo annual_revenue per modulo Leads
$dictionary["osy_contactspotentialmember"]["fields"]['annual_revenue'] = array (
    'name' => 'annual_revenue',
    'vname' => 'LBL_ANNUAL_REVENUE',
    'type' => 'varchar',
    'len' => 100,
    'comment' => 'Annual revenue for this person',
    'merge_filter' => 'enabled',
);
//************************************************************



$dictionary["osy_contactspotentialmember"]["fields"]['campaigns'] = array(
    'name' => 'campaigns',
    'type' => 'link',
    'vname' => 'LBL_CAMPAIGNS',
    'relationship' => 'campaign_osy_contactspotentialmember',
    'source' => 'non-db',
);

$dictionary["osy_contactspotentialmember"]["fields"]['campaign_id'] = array(
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

$dictionary["osy_contactspotentialmember"]["fields"]['campaign_name'] = array(
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

$dictionary['osy_contactspotentialmember']['relationships']['campaign_osy_contactspotentialmember'] = array(
    'lhs_module' => 'Campaigns',
    'lhs_table' => 'campaigns',
    'lhs_key' => 'id',
    'rhs_module' => 'osy_contactspotentialmember',
    'rhs_table' => 'osy_contactspotentialmember',
    'rhs_key' => 'campaign_id',
    'relationship_type' => 'one-to-many',
);


 // created: 2023-09-30 13:09:49
$dictionary['osy_contactspotentialmember']['fields']['alt_address_state']['inline_edit']=true;
$dictionary['osy_contactspotentialmember']['fields']['alt_address_state']['comments']='State for alternate address';
$dictionary['osy_contactspotentialmember']['fields']['alt_address_state']['merge_filter']='disabled';

 

 // created: 2023-09-30 13:07:24
$dictionary['osy_contactspotentialmember']['fields']['primary_address_state']['inline_edit']=true;
$dictionary['osy_contactspotentialmember']['fields']['primary_address_state']['comments']='State for primary address';
$dictionary['osy_contactspotentialmember']['fields']['primary_address_state']['merge_filter']='disabled';

 
?>