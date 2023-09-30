<?php

$dictionary['Opportunity']['fields']['account_name']['required'] = false;
$dictionary['Opportunity']['fields']['account_id']['required'] = false;
$dictionary['Opportunity']['fields']['subscription_type'] = array (
		'name' => 'subscription_type',
		'vname' => 'LBL_SUBSCRIPTION_TYPE',
		'type' => 'enum',
		'options' => 'osy_subscription_type_list',
		'len' => '255',
);

$dictionary['Opportunity']['fields']['subscription_criteria'] = array (
		'name' => 'subscription_criteria',
		'vname' => 'LBL_SUBSCRIPTION_CRITERIA',
		'type' => 'enum',
		'options' => 'osy_subscription_criteria_list',
		'len' => '255',
);

$dictionary['Opportunity']['fields']['subscription_duration'] = array (
		'name' => 'subscription_duration',
		'vname' => 'LBL_SUBSCRIPTION_DURATION',
		'type' => 'enum',
		'options' => 'osy_subscription_duration_list',
		'len' => '255',
);

$dictionary['Opportunity']['fields']['next_action'] = array (
		'name' => 'next_action',
		'vname' => 'LBL_NEXT_ACTION',
		'type' => 'enum',
		'options' => 'osy_next_action_list',
		'len' => '255',
);

$dictionary['Opportunity']['fields']['payment_status'] = array (
		'name' => 'payment_status',
		'vname' => 'LBL_PAYMENT_STATUS',
		'type' => 'enum',
		'default' => '1',
		'options' => 'osy_payment_status_list',
		'len' => '255',
		'required' => true,
);

$dictionary['Opportunity']['fields']['expiry_date'] = array (
		'name' => 'expiry_date',
		'vname' => 'LBL_EXPIRY_DATE',
		'type' => 'date',
		'required' => true,
);

$dictionary['Opportunity']['fields']['invoice_date'] = array (
		'name' => 'invoice_date',
		'vname' => 'LBL_INVOICE_DATE',
		'type' => 'date',
);

$dictionary['Opportunity']['fields']['nr_reminders'] = array (
		'name' => 'nr_reminders',
		'vname' => 'LBL_NR_REMINDERS',
		'type' => 'int',
		'len' => '11',
);
$dictionary['Opportunity']['fields']['sales_stage'] = array (
		'name' => 'sales_stage',
		'vname' => 'LBL_SALES_STAGE',
		'type' => 'enum',
		'options' => 'sales_stage_dom',
		'len' => '255',
		'audited'=>true,
		'comment' => 'Indication of progression towards closure',
		'merge_filter' => 'enabled',
		'importable' => '',
		'required' => false,
);
$dictionary['Opportunity']["fields"]["osy_view_partial_payments"] = array(
    'required' => false,
    'source' => 'non-db',
    'name' => 'osy_view_partial_payments',
    'vname' => 'LBL_OSY_VIEW_PARTIAL_PAYMENTS',
    'type' => 'relate',
    'massupdate' => 0,
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
    'calculated' => false,
    'len' => '10',
    'size' => '20',
    'id_name' => 'osy_administration_panel_id',
    'link' => 'osy_administration_panel',
    'module' => 'osy_administration_panel',
    'rname' => 'view_partial_payments',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
);
$dictionary['Opportunity']["fields"]["osy_view_taxes_payments"] = array(
    'required' => false,
    'source' => 'non-db',
    'name' => 'osy_view_taxes_payments',
    'vname' => 'LBL_OSY_VIEW_TAXES_PAYMENTS',
    'type' => 'relate',
    'massupdate' => 0,
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
    'calculated' => false,
    'len' => '10',
    'size' => '20',
    'id_name' => 'osy_administration_panel_id',
    'link' => 'osy_administration_panel',
    'module' => 'osy_administration_panel',
    'rname' => 'view_taxes_payments',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
);
$dictionary['Opportunity']["fields"]["osy_view_training_package_amount"] = array(
		'required' => false,
		'source' => 'non-db',
		'name' => 'osy_view_training_package_amount',
		'vname' => 'LBL_OSY_VIEW_TRAINING_PACKAGE_AMOUNT',
		'type' => 'relate',
		'massupdate' => 0,
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
		'calculated' => false,
		'len' => '10',
		'size' => '20',
		'id_name' => 'osy_administration_panel_id',
		'link' => 'osy_administration_panel',
		'module' => 'osy_administration_panel',
		'rname' => 'view_training_package_amount',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
);
$dictionary['Opportunity']["fields"]["total_partial"] = array(
    'required' => false,
    'name' => 'total_partial',
    'vname' => 'LBL_TOTAL_PARTIAL',
    'type' => 'currency',
    'massupdate' => 0,
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
    'calculated' => false,
    'len' => 26,
    'size' => '20',
	'readonly' => true,
    'enable_range_search' => false,
    'precision' => 6,
);
$dictionary['Opportunity']["fields"]["taxes_perc"] = array(
    'required' => false,
    'name' => 'taxes_perc',
    'vname' => 'LBL_TAXES_PERC',
    'type' => 'currency',
    'massupdate' => 0,
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
    'calculated' => false,
    'len' => 18,
    'size' => '20',
	'readonly' => true,
    'enable_range_search' => false,
    'precision' => 6,
);
/////////////////////////// relate
$dictionary['Opportunity']["fields"]["osy_administration_panel_id"] = array(
    'required' => false,
    'name' => 'osy_administration_panel_id',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 0,
    'no_default' => false,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => false,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => 36,
    'size' => '20',
);
$dictionary['Opportunity']["fields"]["osy_administration_panel_name"] = array(
    'required' => false,
    'source' => 'non-db',
    'name' => 'osy_administration_panel_name',
    'vname' => 'LBL_OSY_ADMINISTRATION_PANEL_NAME',
    'type' => 'relate',
    'massupdate' => 0,
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
    'calculated' => false,
    'len' => '255',
    'size' => '20',
    'id_name' => 'osy_administration_panel_id',
    'link' => 'osy_administration_panel',
    'module' => 'osy_administration_panel',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
);
$dictionary['Opportunity']['fields']['osy_administration_panel'] = array (
  'name' => 'osy_administration_panel',
  'type' => 'link',
  'relationship' => 'osy_administration_panel_opportunities',
  'module' => 'osy_administration_panel',
  'bean_name' => 'osy_administration_panel',
  'source' => 'non-db',
  'vname' => 'LBL_OSY_ADMINISTRATION_PANEL_OPPORTUNITIES',
);
$dictionary['Opportunity']['indices']['idx_osy_administration_panel_id'] = array (
	'name' => 'idx_osy_administration_panel_id',
	'type' => 'index',
	'fields' =>
	array (
		'osy_administration_panel_id',
	),
);

/*
//Relazione 1-1 con modulo Leads (Potential members)
$dictionary["Opportunity"]["fields"]["leads_opportunities_1"] = array (
  'name' => 'leads_opportunities_1',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_1_id',
);
$dictionary["Opportunity"]["fields"]["leads_1_name"] = array (
  'name' => 'leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_1_id',
  'link' => 'leads_opportunities_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' =>
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["leads_1_id"] = array (
  'name' => 'leads_1_id',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'left',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
);
*/

$dictionary['Opportunity']['fields']['date_closed']['importable'] = false;
$dictionary['Opportunity']['fields']['osy_administration_panel_name']['importable'] = false;
$dictionary['Opportunity']['fields']['created_by']['importable'] = false;
$dictionary['Opportunity']['fields']['subscription_criteria']['importable'] = false;
$dictionary['Opportunity']['fields']['currency_name']['importable'] = false;
$dictionary['Opportunity']['fields']['currency_symbol']['importable'] = false;
$dictionary['Opportunity']['fields']['date_entered']['importable'] = false;
$dictionary['Opportunity']['fields']['date_modified']['importable'] = false;
$dictionary['Opportunity']['fields']['deleted']['importable'] = false;
$dictionary['Opportunity']['fields']['is_training_pck_c']['importable'] = false;
$dictionary['Opportunity']['fields']['subscription_duration']['importable'] = false;
$dictionary['Opportunity']['fields']['modified_user_id']['importable'] = false;
$dictionary['Opportunity']['fields']['modified_by_name']['importable'] = false;
$dictionary['Opportunity']['fields']['next_action']['importable'] = false;
$dictionary['Opportunity']['fields']['next_step']['importable'] = false;
$dictionary['Opportunity']['fields']['nr_reminders']['importable'] = false;
$dictionary['Opportunity']['fields']['lead_source']['importable'] = false;
$dictionary['Opportunity']['fields']['probability']['importable'] = false;
$dictionary['Opportunity']['fields']['sales_stage']['importable'] = false;
$dictionary['Opportunity']['fields']['total_partial']['importable'] = false;
$dictionary['Opportunity']['fields']['opportunity_type']['importable'] = false;
$dictionary['Opportunity']['fields']['subscription_type']['importable'] = false;
$dictionary['Opportunity']['fields']['osy_view_training_package_amount']['importable'] = false;
$dictionary['Opportunity']['fields']['campaign_id']['importable'] = false;
$dictionary['Opportunity']['fields']['assigned_user_name']['importable'] = false;
$dictionary['Opportunity']['fields']['assigned_user_id']['importable'] = false;
$dictionary['Opportunity']['fields']['osy_administration_panel_id']['importable'] = false;
$dictionary['Opportunity']['fields']['amount_usdollar']['importable'] = false;


$dictionary['Opportunity']['fields']['date_closed']['comments']='Expected or actual date the oppportunity will close';
$dictionary['Opportunity']['fields']['date_closed']['importable']='false';
$dictionary['Opportunity']['fields']['date_closed']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['date_closed']['massupdate']=0;

$dictionary['Opportunity']['fields']['total_paid'] = array (
	'name' => 'total_paid',
	'label' => 'LBL_TOTAL_PAID',
	'default_value' => '',
	'default' => '',
	'display_default' => NULL,
	'len' => '26',
	'required' => false,
	'type' => 'float',
	'audited' => 0,
	'massupdate' => 0,
	'options' => 'numeric_range_search_dom',
	'help' => '',
	'comments' => '',
	'importable' => 'false',
	'duplicate_merge' => '0',
	'duplicate_merge_dom_value' => NULL,
	'merge_filter' => NULL,
	'reportable' => '1',
	'ext2' => '',
	'ext4' => '',
	'ext3' => '',
	'labelValue' => 'Total paid',
	'unified_search' => 0,
	'group' => NULL,
	'calculated' => NULL,
	'formula' => '',
	'enforced' => '',
	'dependency' => '',
	'related_fields' => NULL,
	'enable_range_search' => '1',
	'precision' => '2',
	'vname' => 'LBL_TOTAL_PAID',
);

$dictionary['Opportunity']['fields']['balance'] = array (
	'name' => 'balance',
	'label' => 'LBL_BALANCE',
	'default_value' => '',
	'default' => '',
	'display_default' => NULL,
	'len' => '26',
	'required' => false,
	'type' => 'float',
	'audited' => 0,
	'massupdate' => 0,
	'options' => 'numeric_range_search_dom',
	'help' => '',
	'comments' => '',
	'importable' => 'false',
	'duplicate_merge' => '0',
	'duplicate_merge_dom_value' => NULL,
	'merge_filter' => NULL,
	'reportable' => '1',
	'ext2' => '',
	'ext4' => '',
	'ext3' => '',
	'labelValue' => 'Balance',
	'unified_search' => 0,
	'group' => NULL,
	'calculated' => NULL,
	'formula' => '',
	'enforced' => '',
	'dependency' => '',
	'related_fields' => NULL,
	'enable_range_search' => '1',
	'precision' => '2',
	'vname' => 'LBL_BALANCE',
);

?>
