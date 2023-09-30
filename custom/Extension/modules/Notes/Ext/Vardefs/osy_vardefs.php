<?php
$dictionary['Note']['fields']['osy_services_companies'] = array (
	'name' => 'osy_services_companies',
	'type' => 'link',
	'relationship' => 'osy_services_companies_notes',
	'source'=>'non-db',
	'vname'=>'LBL_OSY_SERVICES_COMPANIES',
);

$dictionary['Note']['fields']['osy_services_companies_id'] = array (
    'name' => 'osy_services_companies_id',
    'vname' => 'LBL_OSY_SERVICES_COMPANIES_ID',
    'type' => 'id',
    'reportable'=>false,
	'source'=>'non-db',
);
$dictionary['Note']['fields']['parent_name'] = array (
	'name'=> 'parent_name',
	'parent_type'=>'record_type_display',
	'type_name'=>'parent_type',
	'id_name'=>'parent_id',
    'vname'=>'LBL_LIST_RELATED_TO',
	'type'=>'parent',
	'group'=>'parent_name',
	'source'=>'non-db',
	'options'=> 'parent_type_display',
);


//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts
//relate
$dictionary['Note']['fields']['account_name'] = array (
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

$dictionary['Note']['fields']['account_id'] = array (
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
$dictionary["Note"]["fields"]["accounts"] = array (
		'name' => 'accounts',
		'type' => 'link',
		'relationship' => 'accounts_notes',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS',
		'required' => false,
);

//relationship
$dictionary["Note"]["relationships"]["accounts_notes"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Notes',
		'rhs_table' => 'notes',
		'rhs_key' => 'account_id',
		'relationship_type' => 'one-to-many',
);
//************************************************************

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts (Subpanel History of potential member)
//relate
$dictionary['Note']['fields']['account_name_for_leads'] = array (
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
		'id_name' => 'account_id_for_leads',
		'ext2' => 'Accounts',
		'module' => 'Accounts',
		'quicksearch' => 'enabled',
		'studio' => 'visible',
		'required' => false,
);

$dictionary['Note']['fields']['account_id_for_leads'] = array (
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
$dictionary["Note"]["fields"]["accounts_for_leads"] = array (
		'name' => 'accounts_for_leads',
		'type' => 'link',
		'relationship' => 'accounts_notes_for_leads',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS_FOR_LEADS',
		'required' => false,
);

//relationship
$dictionary["Note"]["relationships"]["accounts_notes_for_leads"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Notes',
		'rhs_table' => 'notes',
		'rhs_key' => 'account_id_for_leads',
		'relationship_type' => 'one-to-many',
);
//************************************************************