<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2013-04-19 14:38:36

 

 // created: 2013-04-19 14:38:36

 

 // created: 2013-04-19 14:37:03

 

 // created: 2013-07-22 15:00:18

 


$dictionary['osy_services_companies']['fields']['parent_id'] = array (
	'name' => 'parent_id',
	'vname' => 'LBL_PARENT_ACCOUNT_ID',
	'type' => 'id',
	'required'=>false,
	'reportable'=>false,
	'audited'=>true,
);

$dictionary['osy_services_companies']['fields']['parent_name'] = array (
	'name' => 'parent_name',
	'rname' => 'name',
	'id_name' => 'parent_id',
	'vname' => 'LBL_MEMBER_OF',
	'type' => 'relate',
	'isnull' => 'true',
	'module' => 'osy_services_companies',
	'table' => 'osy_services_companies',
	'massupdate' => false,
	'source'=>'non-db',
	'len' => 36,
	'link'=>'member_of',
	'unified_search' => true,
	'importable' => 'true',
);


$dictionary['osy_services_companies']['fields']['tasks'] = array (
	'name' => 'tasks',
	'type' => 'link',
	'relationship' => 'osy_services_companies_tasks',
	'module'=>'Tasks',
	'bean_name'=>'Task',
	'source'=>'non-db',
	'vname'=>'LBL_TASKS',
);

$dictionary['osy_services_companies']['fields']['meetings'] = array (
	'name' => 'meetings',
	'type' => 'link',
	'relationship' => 'osy_services_companies_meetings',
	'module'=>'Meetings',
	'bean_name'=>'Meeting',
	'source'=>'non-db',
	'vname'=>'LBL_MEETINGS',
);

$dictionary['osy_services_companies']['fields']['calls'] = array (
	'name' => 'calls',
	'type' => 'link',
	'relationship' => 'osy_services_companies_calls',
	'module'=>'Calls',
	'bean_name'=>'Call',
	'source'=>'non-db',
	'vname'=>'LBL_CALLS',
);

$dictionary['osy_services_companies']['fields']['notes'] = array (
	'name' => 'notes',
	'type' => 'link',
	'relationship' => 'osy_services_companies_notes',
	'module'=>'Notes',
	'bean_name'=>'Note',
	'source'=>'non-db',
	'vname'=>'LBL_NOTES',
);

$dictionary['osy_services_companies']['fields']['mode_of_intervention'] = array (
	'name' => 'mode_of_intervention',
	'vname' => 'LBL_MODE_OF_INTERVENTION',
	'comment' => '',
	'required' => false,
	'type' => 'multienum',
	'massupdate' => 0,
	'importable' => 'true',
	'duplicate_merge' => 'disabled',
	'duplicate_merge_dom_value' => '0',
	'audited' => false,
	'reportable' => true,
	'len' => 255,
	'size' => '255',
	'options' => 'osy_services_companies_mode_of_intervention_list',
	'studio' => 'visible',
);

$dictionary['osy_services_companies']['fields']['subject'] = array (
	'name' => 'subject',
	'vname' => 'LBL_SUBJECT',
	'options' => 'osy_services_companies_subject_list',
	'type' => 'enum',
	'len' => '50',
	'required' => false,
);

$dictionary['osy_services_companies']['fields']['subject_description'] = array (
	'name' => 'subject_description',
	'vname' => 'LBL_SUBJECT_DESCRIPTION',
	'options' => 'osy_services_companies_subject_description_list',
	'type' => 'enum',
	'len' => '50',
	'required' => false,
	'visibility_grid' => array(
			'trigger' => 'subject',
			'values' => array(
					'Trade' => array(
						'',
					),
					'Company management' => array(
						'',
					),
					'Access to finance' => array(
						'',
					),
					'Other' => array(
						'',
					),
					'Individual labour law and HR' => array(
						'Employment contract',
						'End of contract - Dismissal',
						'Disciplinary issues',
						'Working time',
						'Wage and benefits',
						'Training',
						'Holiday entitlements',
						'Sickness and other suspensions',
						'Social security',
						'Open fields'
					),
					'Collective labour law and HR' => array(
						'Collective dispute- strike',
						'Trade unions issues',
						'OSH',
						'Social security contributions',
						'Wages',
						'Outsourcing',
						'Collective agreements',
						'Open fields'
					),
					'Tax' => array(
						'VAT',
						'Company tax',
						'Personal income tax'
					),
					'Data information' => array(
						'Economic situation',
						'EO matters',
						'Social situation'
					),
			),
	),
);

$dictionary['osy_services_companies']['fields']['duration'] = array (
	'name' => 'duration',
	'vname' => 'LBL_DURATION',
	'type' => 'varchar',
	'len' => '255',
	'required' => false,
);


//relazioni
//************************************************************
$dictionary['osy_services_companies']['relationships']['osy_services_companies_tasks'] = array (
	'lhs_module'=> 'osy_services_companies',
	'lhs_table'=> 'osy_services_companies',
	'lhs_key' => 'id',
	'rhs_module'=> 'Tasks',
	'rhs_table'=> 'tasks',
	'rhs_key' => 'parent_id',
	'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
	'relationship_role_column_value'=>'osy_services_companies'
);

$dictionary['osy_services_companies']['relationships']['osy_services_companies_calls'] = array(
	'lhs_module'=> 'osy_services_companies',
	'lhs_table'=> 'osy_services_companies',
	'lhs_key' => 'id',
    'rhs_module'=> 'Calls',
	'rhs_table'=> 'calls',
	'rhs_key' => 'parent_id',
    'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
    'relationship_role_column_value'=>'osy_services_companies'
);

$dictionary['osy_services_companies']['relationships']['osy_services_companies_meetings'] = array(
	'lhs_module'=> 'osy_services_companies',
	'lhs_table'=> 'osy_services_companies',
	'lhs_key' => 'id',
	'rhs_module'=> 'Meetings',
	'rhs_table'=> 'meetings',
	'rhs_key' => 'parent_id',
	'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
	'relationship_role_column_value'=>'osy_services_companies'
);

$dictionary['osy_services_companies']['relationships']['osy_services_companies_notes'] = array(
	'lhs_module'=> 'osy_services_companies',
	'lhs_table'=> 'osy_services_companies',
	'lhs_key' => 'id',
    'rhs_module'=> 'Notes',
	'rhs_table'=> 'notes',
	'rhs_key' => 'parent_id',
	'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
	'relationship_role_column_value'=>'osy_services_companies'
);

//************************************************************

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Members (Accounts)
//relate
// $dictionary['osy_services_companies']['fields']['account_name'] = array (
// 		'required' => false,
// 		'source' => 'non-db',
// 		'name' => 'account_name',
// 		'vname' => 'LBL_ACCOUNT_NAME',
// 		'type' => 'relate',
// 		'massupdate' => 0,
// 		'comments' => '',
// 		'help' => '',
// 		'duplicate_merge' => 'disabled',
// 		'duplicate_merge_dom_value' => '0',
// 		'audited' => 0,
// 		'reportable' => 1,
// 		'len' => '36',
// 		'id_name' => 'account_id',
// 		'ext2' => 'Accounts',
// 		'module' => 'Accounts',
// 		'quicksearch' => 'enabled',
// 		'studio' => 'visible',
// 		'link' => 'accounts'
// );

// $dictionary['osy_services_companies']['fields']['account_id'] = array (
// 		'required' => false,
// 		'name' => 'account_id',
// 		'vname' => 'LBL_ACCOUNT_ID',
// 		'type' => 'id',
// 		'massupdate' => 0,
// 		'comments' => '',
// 		'help' => '',
// 		'duplicate_merge' => 'disabled',
// 		'duplicate_merge_dom_value' => 0,
// 		'audited' => 0,
// 		'reportable' => 0,
// 		'len' => 36,
// );

//link
$dictionary["osy_services_companies"]["fields"]["accounts"] = array (
		'name' => 'accounts',
		'type' => 'link',
		'relationship' => 'accounts_osy_services_companies',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS',
);
//************************************************************




// relate con competitors
$dictionary['osy_services_companies']['fields']['osy_account_id'] = array(
// 	'required' => true,
		'name' => 'osy_account_id',
		'vname' => 'LBL_ACCOUNT_ID',
		'type' => 'id',
		'massupdate' => 0,
		'default' => '',
		'comments' => '',
		'help' => '',
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => true,
		'reportable' => true,
		'calculated' => false,
		'len' => '36',
		'size' => '36',
		'studio' => 'visible',
		//		'dependency' => 'isInList($account_type, createList("Customer", "Prospect"))',
);


$dictionary['osy_services_companies']['fields']['account_name'] = array(
//	'required' => true,
		'source' => 'non-db',
		'name' => 'account_name',
		'vname' => 'LBL_ACCOUNT_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 0,
		'len' => '255',
		'rname' => 'name',
		'table' => 'accounts',
		// 	'join_name' => 'competitors',
		'id_name' => 'osy_account_id',
		'save' => true,
		'ext2' => 'members',
		'module' => 'Accounts',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
);


//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Potential Members (Leads)
$dictionary['osy_services_companies']['fields']['lead_name'] = array(
	'required' => false,
	'source' => 'non-db',
	'rname' => 'account_name',
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
	'link' => 'leads',
		'ext2' => 'Leads',
		'module' => 'Leads',
	'quicksearch' => 'enabled',
	'studio' => 'visible'
);

$dictionary['osy_services_companies']['fields']['lead_id'] = array (
	'required' => false,
	'name' => 'lead_id',
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
);

//link
$dictionary["osy_services_companies"]["fields"]["leads"] = array (
	'name' => 'leads',
	'type' => 'link',
	'relationship' => 'leads_osy_services_companies',
	'source' => 'non-db',
	'vname' => 'LBL_LEADS',
);

$dictionary["osy_services_companies"]["fields"]["payment_status_c"] = array (
      'required' => false,
      'name' => 'payment_status_c',
      'vname' => 'LBL_PAYMENT_STATUS',
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
      'options' => 'payment_status_list',
      'studio' => 'visible',
      'dependency' => false,
);

// OPENSYMBOLMOD - START - davide.dallapozza - 26/feb/2014
// *************************************************
// Relazione 1:N Contacts-osy_services_companies

$dictionary['osy_services_companies']['fields']['contact_id'] = array(
		'required' => false,
		'name' => 'contact_id',
		'vname' => 'LBL_CONTACT_ID',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36,
);
$dictionary['osy_services_companies']['fields']['contact_name'] = array(
		'required' => false,
		'source' => 'non-db',
		'rname' => 'name',
		'name' => 'contact_name',
		'vname' => 'LBL_CONTACT_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 0,
		'len' => '255',
		'id_name' => 'contact_id',
		//'ext2' => 'Accounts',
		'link' => 'contacts',
		'module' => 'Contacts',
		'save' => true,
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		//'rname' => 'name',
		//'table' => 'accounts',
		//'join_name' => 'accounts',
);
$dictionary['osy_services_companies']['fields']['contacts'] = array(
		'name' => 'contacts',
		'type' => 'link',
		'relationship' => 'contact_osy_services_companies',
		'source' => 'non-db',
		'vname'=>'LBL_CONTACT_ID',
);
$dictionary['osy_services_companies']['relationships']['contact_osy_services_companies'] = array (
		'lhs_module'=> 'Contacts',
		'lhs_table'=> 'contacts',
		'lhs_key' => 'id',
		'rhs_module'=> 'osy_services_companies',
		'rhs_table'=> 'osy_services_companies',
		'rhs_key' => 'contact_id',
		'relationship_type'=>'one-to-many',
);

// Relazione 1:N osy_contactspotentialmember-osy_services_companies

$dictionary['osy_services_companies']['fields']['osy_contactspotentialmember_id'] = array(
		'required' => false,
		'name' => 'osy_contactspotentialmember_id',
		'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_ID',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36,
);
$dictionary['osy_services_companies']['fields']['osy_contactspotentialmember_name'] = array(
		'required' => false,
		'source' => 'non-db',
		'rname' => 'name',
		'name' => 'osy_contactspotentialmember_name',
		'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 0,
		'len' => '255',
		'id_name' => 'osy_contactspotentialmember_id',
		//'ext2' => 'Accounts',
		'link' => 'osy_contactspotentialmembers',
		'module' => 'osy_contactspotentialmember',
		'save' => true,
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		//'rname' => 'name',
		//'table' => 'accounts',
		//'join_name' => 'accounts',
);
$dictionary['osy_services_companies']['fields']['osy_contactspotentialmembers'] = array(
		'name' => 'osy_contactspotentialmembers',
		'type' => 'link',
		'relationship' => 'osy_contactspotentialmember_osy_services_companies',
		'source' => 'non-db',
		'vname'=>'LBL_OSY_CONTACTSPOTENTIALMEMBER_ID',
);
$dictionary['osy_services_companies']['relationships']['osy_contactspotentialmember_osy_services_companies'] = array (
		'lhs_module'=> 'osy_contactspotentialmember',
		'lhs_table'=> 'osy_contactspotentialmember',
		'lhs_key' => 'id',
		'rhs_module'=> 'osy_services_companies',
		'rhs_table'=> 'osy_services_companies',
		'rhs_key' => 'osy_contactspotentialmember_id',
		'relationship_type'=>'one-to-many',
);

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************

$dictionary['osy_services_companies']['fields']['costs_c']['dependency'] = 'ifElse(eq($is_free_of_charge_c,"yes"),false,true)';
$dictionary['osy_services_companies']['fields']['payment_status_c']['dependency'] = 'ifElse(eq($is_free_of_charge_c,"yes"),false,true)';


 // created: 2023-07-29 21:02:18
$dictionary['osy_services_companies']['fields']['service_free_charge_c']['inline_edit']='1';
$dictionary['osy_services_companies']['fields']['service_free_charge_c']['labelValue']='هل الخدمة مجانية ؟:';

 

 // created: 2023-07-26 13:23:26
$dictionary['osy_services_companies']['fields']['subject']['inline_edit']=true;

 

 // created: 2023-07-29 20:45:50
$dictionary['osy_services_companies']['fields']['status_service_c']['inline_edit']='1';
$dictionary['osy_services_companies']['fields']['status_service_c']['labelValue']='Status of the Service:';

 
?>