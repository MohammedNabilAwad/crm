<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['Task']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_tasks',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);






$dictionary['Task']['fields']['osy_services_companies'] = array (
	'name' => 'osy_services_companies',
	'type' => 'link',
	'relationship' => 'osy_services_companies_tasks',
	'source'=>'non-db',
	'vname'=>'LBL_OSY_SERVICES_COMPANIES',
);

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts
//relate
$dictionary['Task']['fields']['account_name'] = array (
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
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'account_id',
		'ext2' => 'Accounts',
		'module' => 'Accounts',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		'required' => false,
);

$dictionary['Task']['fields']['account_id'] = array (
		'name' => 'account_id',
		'vname' => 'LBL_ACCOUNT_ID',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36,
		'required' => false,
);

//link
$dictionary["Tasks"]["fields"]["accounts"] = array (
		'name' => 'accounts',
		'type' => 'link',
		'relationship' => 'accounts_tasks',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS',
);

//relationship
$dictionary["Task"]["relationships"]["accounts_tasks"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Tasks',
		'rhs_table' => 'tasks',
		'rhs_key' => 'account_id',
		'relationship_type' => 'one-to-many',
);
//************************************************************

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts (Subpanel History of potential member)
//relate
$dictionary['Task']['fields']['account_name_for_leads'] = array (
		'source' => 'non-db',
		'name' => 'account_name_for_leads',
		'vname' => 'LBL_ACCOUNT_NAME_FOR_LEADS',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'account_id',
		'ext2' => 'Accounts',
		'module' => 'Accounts',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		'required' => false,
);

$dictionary['Task']['fields']['account_id_for_leads'] = array (
		'name' => 'account_id_for_leads',
		'vname' => 'LBL_ACCOUNT_ID_FOR_LEADS',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36,
		'required' => false,
);

//link
$dictionary["Task"]["fields"]["accounts_for_leads"] = array (
		'name' => 'accounts_for_leads',
		'type' => 'link',
		'relationship' => 'accounts_tasks_for_leads',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS_FOR_LEADS',
);

//relationship
$dictionary["Task"]["relationships"]["accounts_tasks_for_leads"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Tasks',
		'rhs_table' => 'tasks',
		'rhs_key' => 'account_id_for_leads',
		'relationship_type' => 'one-to-many',
);
//************************************************************
?>