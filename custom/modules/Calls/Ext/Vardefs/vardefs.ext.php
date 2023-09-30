<?php 
 //WARNING: The contents of this file are auto-generated


/**
 * Created by JetBrains PhpStorm.
 * User: andrew
 * Date: 01/03/13
 * Time: 15:13
 * To change this template use File | Settings | File Templates.
 */

$dictionary['Call']['fields']['reschedule_history'] = array(

    'required' => false,
    'name' => 'reschedule_history',
    'vname' => 'LBL_RESCHEDULE_HISTORY',
    'type' => 'varchar',
    'source' => 'non-db',
    'studio' => 'visible',
    'massupdate' => 0,
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => false,
    'function' =>
    array (
        'name' => 'reschedule_history',
        'returns' => 'html',
        'include' => 'modules/Calls/reschedule_history.php'
    ),
);

$dictionary['Call']['fields']['reschedule_count'] = array(

    'required' => false,
    'name' => 'reschedule_count',
    'vname' => 'LBL_RESCHEDULE_COUNT',
    'type' => 'varchar',
    'source' => 'non-db',
    'studio' => 'visible',
    'massupdate' => 0,
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => false,
    'function' =>
    array (
        'name' => 'reschedule_count',
        'returns' => 'html',
        'include' => 'modules/Calls/reschedule_history.php'
    ),
);

// created: 2010-12-20 02:55:45
$dictionary["Call"]["fields"]["calls_reschedule"] = array (
    'name' => 'calls_reschedule',
    'type' => 'link',
    'relationship' => 'calls_reschedule',
    'module'=>'Calls_Reschedule',
    'bean_name'=>'Calls_Reschedule',
    'source'=>'non-db',
);


// created: 2010-12-20 02:56:01
$dictionary["Call"]["relationships"]["calls_reschedule"] = array (
    'lhs_module'=> 'Calls',
    'lhs_table'=> 'calls',
    'lhs_key' => 'id',
    'rhs_module'=> 'Calls_Reschedule',
    'rhs_table'=> 'calls_reschedule',
    'rhs_key' => 'call_id',
    'relationship_type'=>'one-to-many',
);



$dictionary['Call']['fields']['osy_services_companies'] = array (
	'name' => 'osy_services_companies',
	'type' => 'link',
	'relationship' => 'osy_services_companies_calls',
	'module'=>'osy_services_companies',
	'bean_name'=>'osy_services_companies',
	'source'=>'non-db',
	'vname'=>'LBL_OSY_SERVICES_COMPANIES',
);

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts
//relate
$dictionary['Call']['fields']['account_name'] = array (
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

$dictionary['Call']['fields']['account_id'] = array (
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
$dictionary["Call"]["fields"]["accounts"] = array (
		'name' => 'accounts',
		'type' => 'link',
		'relationship' => 'accounts_calls',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS',
);

//relationship
$dictionary["Call"]["relationships"]["accounts_calls"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Calls',
		'rhs_table' => 'calls',
		'rhs_key' => 'account_id',
		'relationship_type' => 'one-to-many',
);
//************************************************************

//************************************************************ RELAZIONE 1-n
//Per relazione 1-n con modulo Accounts (Subpanel History of potential member)
//relate
$dictionary['Call']['fields']['account_name_for_leads'] = array (
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

$dictionary['Call']['fields']['account_id_for_leads'] = array (
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
$dictionary["Call"]["fields"]["accounts_for_leads"] = array (
		'name' => 'accounts_for_leads',
		'type' => 'link',
		'relationship' => 'accounts_calls_for_leads',
		'source' => 'non-db',
		'vname' => 'LBL_ACCOUNTS_FOR_LEADS',
);

//relationship
$dictionary["Call"]["relationships"]["accounts_calls_for_leads"] = array (
		'lhs_module' => 'Accounts',
		'lhs_table' => 'accounts',
		'lhs_key' => 'id',
		'rhs_module' => 'Calls',
		'rhs_table' => 'calls',
		'rhs_key' => 'account_id_for_leads',
		'relationship_type' => 'one-to-many',
);
//************************************************************

 // created: 2013-07-15 10:05:03
$dictionary['Call']['fields']['status']['required']=false;
$dictionary['Call']['fields']['status']['comments']='The status of the call (Held, Not Held, etc.)';
$dictionary['Call']['fields']['status']['merge_filter']='disabled';

 

 // created: 2023-07-25 19:27:15
$dictionary['Call']['fields']['new_description_c']['inline_edit']='1';
$dictionary['Call']['fields']['new_description_c']['labelValue']='Description';

 

 // created: 2023-09-10 14:17:49
$dictionary['Call']['fields']['source_report_c']['inline_edit']='1';
$dictionary['Call']['fields']['source_report_c']['labelValue']='Source of the report';

 

 // created: 2023-09-03 17:32:53
$dictionary['Call']['fields']['action_taken_c']['inline_edit']='1';
$dictionary['Call']['fields']['action_taken_c']['labelValue']='Action taken';

 
?>