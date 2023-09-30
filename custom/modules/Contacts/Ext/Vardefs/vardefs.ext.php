<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2019-09-06 10:32:31
$dictionary['Contact']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2019-09-06 10:32:31
$dictionary['Contact']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2013-05-26 13:47:17
$dictionary['Contact']['fields']['contact_type']['len']=100;
$dictionary['Contact']['fields']['contact_type']['merge_filter']='disabled';
$dictionary['Contact']['fields']['contact_type']['massupdate']='1';

 

 // created: 2019-09-06 10:32:31
$dictionary['Contact']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2013-03-08 10:01:18
$dictionary['Contact']['fields']['role_function']['len']=100;
$dictionary['Contact']['fields']['role_function']['merge_filter']='disabled';

 

 // created: 2013-03-27 08:49:49

 

 // created: 2013-06-19 13:09:05

 

 // created: 2013-04-18 15:02:49

 


$dictionary['CustomContact'] = &$dictionary['Contact'];

$dictionary['Contact']['fields']['role_function'] = array (
		'name' => 'role_function',
		'vname' => 'LBL_ROLE_FUNCTION',
		'type' => 'enum',
		'options' => 'osy_role_function_list',
		'len' => '255',
);

$dictionary['Contact']['fields']['other_role_function'] = array (
		'name' => 'other_role_function',
		'vname' => 'LBL_OTHER_ROLE_FUNCTION',
		'type' => 'varchar',
		'len' => '255',
);

$dictionary['Contact']['fields']['vip'] = array (
		'name' => 'vip',
		'vname' => 'LBL_VIP',
		'type' => 'bool',
);

$dictionary['Contact']['fields']['category'] = array (
		'name' => 'category',
		'vname' => 'LBL_CATEGORY',
		'type' => 'enum',
		'options' => 'osy_categories_list',
		'len' => '255',
);

$dictionary['Contact']['fields']['contact_type'] = array (
		'name' => 'contact_type',
		'vname' => 'LBL_CONTACT_TYPE',
		'type' => 'enum',
		'options' => 'osy_contact_type_list',
		'len' => '255',
);
// relazione molti a molti
$dictionary["Contact"]["fields"]['osy_service'] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'osy_service_contacts',
		'module'=>'osy_service',
		'bean_name'=>'osy_service',
		'source'=>'non-db',
		'vname'=>'LBL_OSY_SERVICE',
);
$dictionary['Contact']['fields']['alt_address_pobox_c'] = array (
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
$dictionary['Contact']['fields']['alt_address_region_c'] = array (
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
$dictionary['Contact']['fields']['primary_address_other'] = array (
		'name' => 'primary_address_other',
		'vname' => 'LBL_PRIMARY_ADDRESS_OTHER',
		'type' => 'varchar',
		'len' => '255',
		'required' => false,
);

$dictionary['Contact']['fields']['alt_address_other'] = array (
		'name' => 'alt_address_other',
		'vname' => 'LBL_ALT_ADDRESS_OTHER',
		'type' => 'varchar',
		'len' => '255',
		'required' => false,
);

$dictionary['Contact']['fields']['industry'] = array (
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
		'isMultiSelect' => true,
);

// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
// *************************************************

$dictionary['Contact']['fields']['committees'] = array (
		'name' => 'committees',
		'vname' => 'LBL_COMMITTEES',
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
		'options' => 'osy_committees',
		'studio' => 'visible',
		'isMultiSelect' => true,
);

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************

$dictionary['Contact']['fields']['accept_status_id']['importable'] = false;
$dictionary['Contact']['fields']['alt_address_street_2']['importable'] = false;
$dictionary['Contact']['fields']['alt_address_street_3']['importable'] = false;
$dictionary['Contact']['fields']['assistant']['importable'] = false;
$dictionary['Contact']['fields']['birthdate']['importable'] = false;
$dictionary['Contact']['fields']['campaign_name']['importable'] = false;
$dictionary['Contact']['fields']['campaign_id']['importable'] = false;
$dictionary['Contact']['fields']['created_by']['importable'] = false;
$dictionary['Contact']['fields']['date_entered']['importable'] = false;
$dictionary['Contact']['fields']['date_modified']['importable'] = false;
$dictionary['Contact']['fields']['deleted']['importable'] = false;
$dictionary['Contact']['fields']['contact_type']['importable'] = false;
$dictionary['Contact']['fields']['email_opt_out']['importable'] = false;
$dictionary['Contact']['fields']['email']['importable'] = false;
$dictionary['Contact']['fields']['phone_home']['importable'] = false;
$dictionary['Contact']['fields']['invalid_email']['importable'] = false;
$dictionary['Contact']['fields']['phone_mobile']['importable'] = false;
$dictionary['Contact']['fields']['modified_user_id']['importable'] = false;
$dictionary['Contact']['fields']['modified_by_name']['importable'] = false;
$dictionary['Contact']['fields']['full_name']['importable'] = false;
$dictionary['Contact']['fields']['department']['importable'] = false;
$dictionary['Contact']['fields']['email2']['importable'] = false;
$dictionary['Contact']['fields']['phone_other']['importable'] = false;
$dictionary['Contact']['fields']['billing_address_pobox_c']['importable'] = false;
$dictionary['Contact']['fields']['lead_source']['importable'] = false;
$dictionary['Contact']['fields']['primary_address_street_2']['importable'] = false;
$dictionary['Contact']['fields']['primary_address_street_3']['importable'] = false;
$dictionary['Contact']['fields']['billing_address_region_c']['importable'] = false;
$dictionary['Contact']['fields']['report_to_name']['importable'] = false;
$dictionary['Contact']['fields']['reports_to_id']['importable'] = false;
$dictionary['Contact']['fields']['salutation']['importable'] = false;
$dictionary['Contact']['fields']['opportunity_role_id']['importable'] = false;
$dictionary['Contact']['fields']['opportunity_role']['importable'] = false;
$dictionary['Contact']['fields']['title']['importable'] = false;
$dictionary['Contact']['fields']['cellphone_c']['importable'] = false;

$dictionary['Contact']['fields']['account_name']['populate_list'] =  array(
	'name',
	'id',
	'billing_address_street',
	'billing_address_city',
	'billing_address_state',
	'billing_address_pobox_c',
	'billing_address_postalcode',
	'billing_address_region_c',
	'billing_address_other',
	'phone_office',
);
$dictionary['Contact']['fields']['account_name']['field_list'] = array(
	'account_name',
	'account_id',
	'primary_address_street',
	'primary_address_city',
	'primary_address_state',
	'primary_address_pobox_c',
	'primary_address_postalcode',
	'primary_address_region_c',
	'primary_address_other',
	'phone_work',
);


$dictionary["Contact"]["fields"]['campaign_log'] = array (
    'name' => 'campaign_log',
    'type' => 'link',
    'relationship' => 'campaignlog_contact',
    'module' => 'CampaignLog',
    'bean_name' => 'CampaignLog',
    'source' => 'non-db',
    'vname' => 'LBL_CAMPAIGN_LOG',
);
$dictionary["Contact"]["fields"]['panel_name'] = array (
    'name' => 'panel_name',
    'type' => 'enum',
    'options' => 'delegate_types_list',
    'source' => 'non-db',
    'vname' => 'LBL_PANEL_NAME',
);


//OPENSYMBOLMOD paolo.santacatterina (07/feb/2013  18:00:55)
//inserito campo annual_revenue per modulo Leads
$dictionary["Contact"]["fields"]['annual_revenue'] = array (
    'name' => 'annual_revenue',
    'vname' => 'LBL_ANNUAL_REVENUE',
    'type' => 'varchar',
    'len' => 100,
    'comment' => 'Annual revenue for this person',
    'merge_filter' => 'enabled',
    'importable' => false, 
);
//************************************************************


$dictionary["Contact"]["fields"]['account_osy_account_code'] = array (
    'name' => 'account_osy_account_code',
    'rname' => 'osy_account_code',
    'id_name' => 'account_id',
    'vname' => 'LBL_ACCOUNT_OSY_ACCOUNT_CODE',
    'join_name' => 'accounts',
    'type' => 'relate',
    'link' => 'accounts',
    'table' => 'accounts',
    'isnull' => 'true',
    'module' => 'Accounts',
    'dbType' => 'varchar',
    'len' => '255',
    'source' => 'non-db',
    'unified_search' => true,
);

$dictionary['Contact']['fields']['primary_address_street'] = array(
    'name' => 'primary_address_street',
    'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
    'type' => 'varchar',
    'len' => '150',
    'group' => 'primary_address',
    'comment' => 'Street address for primary address',
    'merge_filter' => 'disabled',
    'labelValue' => 'Street',
    'unified_search' => true,
    'comments' => 'Street address for primary address',
    'dbType' => 'varchar',
    'dependency' => '',
);
$dictionary['Contact']['fields']['alt_address_street'] = array(
    'name' => 'alt_address_street',
    'vname' => 'LBL_ALT_ADDRESS_STREET',
    'type' => 'varchar',
    'len' => '150',
    'group' => 'alt_address',
    'comment' => 'Street address for alternate address',
    'merge_filter' => 'enabled',
    'labelValue' => 'Street',
);
$dictionary['Contact']['fields']['osy_form_html_date_modified'] = array (
    'name' => 'osy_form_html_date_modified',
    'vname' => 'LBL_OSY_FORM_HTML_DATE_MODIFIED',
    'type' => 'datetime',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'inline_edit' => false,
);



 // created: 2013-04-18 15:02:34

 

$dictionary['Contact']['fields']['main_representative_c'] = array(
    'name' => 'main_representative_c',
    'label' => 'LBL_MAIN_REPRESENTATIVE_C',
    'default_value' => '0',
    'default' => '0',
    'display_default' => NULL,
    'len' => '255',
    'required' => false,
    'type' => 'bool',
    'audited' => 0,
    'massupdate' => 0,
    'options' => NULL,
    'help' => '',
    'comments' => '',
    'importable' => 'true',
    'duplicate_merge' => '0',
    'duplicate_merge_dom_value' => NULL,
    'merge_filter' => NULL,
    'reportable' => true,
    'ext2' => '',
    'ext4' => '',
    'ext3' => '',
    'unified_search' => 0,
    'full_text_search' => NULL,
    'calculated' => NULL,
    'formula' => '',
    'enforced' => '',
    'dependency' => '',
    'vname' => 'LBL_MAIN_REPRESENTATIVE_C',
    'inline_edit' => '1',
    'labelValue' => 'Main Representative',
);

 // created: 2019-09-06 10:32:31
$dictionary['Contact']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

// created: 2013-04-15 12:13:27
$dictionary["Contact"]["fields"]["fp_events_contacts"] = array (
  'name' => 'fp_events_contacts',
  'type' => 'link',
  'relationship' => 'fp_events_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENTS_CONTACTS_FROM_FP_EVENTS_TITLE',
);


$dictionary['Contact']['fields']['payment_status_fields'] =
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
        'link' => 'fp_events_contacts',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events_contacts',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Contact']['fields']['osy_payment_status'] =
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
$dictionary['Contact']['fields']['payment_status_id'] =
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
$dictionary['Contact']['fields']['cost_fields'] =
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
        'link' => 'fp_events_contacts',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events_contacts',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Contact']['fields']['osy_cost'] =
    array (
        'massupdate' => false,
        'name' => 'osy_cost',
        'type' => 'varchar',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST',
    );
$dictionary['Contact']['fields']['cost_id'] =
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

 // created: 2023-07-17 21:22:00
$dictionary['Contact']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:47:46
$dictionary['Contact']['fields']['gender_c']['inline_edit']='1';
$dictionary['Contact']['fields']['gender_c']['labelValue']='Gender';

 

 // created: 2023-07-17 21:22:00
$dictionary['Contact']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:22:00
$dictionary['Contact']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:22:00
$dictionary['Contact']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2023-09-30 13:06:11
$dictionary['Contact']['fields']['alt_address_state']['inline_edit']=true;
$dictionary['Contact']['fields']['alt_address_state']['comments']='State for alternate address';
$dictionary['Contact']['fields']['alt_address_state']['merge_filter']='disabled';

 

 // created: 2023-09-30 13:05:37
$dictionary['Contact']['fields']['primary_address_state']['inline_edit']=true;
$dictionary['Contact']['fields']['primary_address_state']['comments']='State for primary address';
$dictionary['Contact']['fields']['primary_address_state']['merge_filter']='disabled';

 

 // created: 2023-08-04 22:26:41
$dictionary['Contact']['fields']['last_name']['required']=true;
$dictionary['Contact']['fields']['last_name']['importable']='true';

 
?>