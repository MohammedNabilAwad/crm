<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary['osy_service']['fields']['type_of_services'] = array (
		'name' => 'type_of_services',
		'vname' => 'LBL_TYPE_OF_SERVICES',
		'type' => 'enum',
		'options' => 'type_of_services_list',
		'len' => '100',
		'massupdate' => false,
		'comment' => 'type_of_services',
);

/*
$dictionary['osy_service']['fields']['service_detail'] = array (
		'name' => 'service_detail',
		'vname' => 'LBL_SERVICE_DETAIL',
		'type' => 'enum',
		'options' => 'service_detail_list',
		'len' => '100',
		'massupdate' => false,
		'comment' => 'service_detail',
		'visibility_grid' => array(
				'trigger' => 'type_of_services',
				'values' => array(
					'gr_serv' => array(
							'training',
							'events',
							'pub',
							'disc_serv',
					),
					'tai_serv' => array(
							'advice',
							'wrt_adv',
							'cons',
							'cons_on_site',
							'rep',
							'other'
					),
				),
		),
);
*/

$dictionary['osy_service']['fields']['areas'] = array (
		'name' => 'areas',
		'vname' => 'LBL_AREAS',
		'type' => 'enum',
		'options' => 'areas_list',
		'len' => '100',
		'massupdate' => false,
		'comment' => 'areas',
);
$dictionary['osy_service']['fields']['representation_details'] = array (
		'name' => 'representation_details',
		'vname' => 'LBL_REPRESENTATION_DETAILS',
		'type' => 'enum',
		'options' => 'representation details_list',
		'len' => '100',
		'massupdate' => false,
		'comment' => 'representation_details',
		'visibility_grid' => array(
					'trigger' => 'service_detail',
					'values' => array(
							'rep' => array(
									'in_co',
									'trd_un',
									'med',
									),
							),
				),
);

//Campo non più utilizzato
/*	
$dictionary['osy_service']['fields']['optional_criteria'] = array(
		'name' => 'optional_criteria',
		'vname' => 'LBL_OPTIONAL_CRITERIA',
		'type' => 'varchar',
		'len' => '100',
		'studio' => 'visible',
		'comment' => 'optional_criteria',
);
*/

$dictionary['osy_service']['fields']['other_string'] = array(
		'name' => 'other_string',
		'vname' => 'LBL_OTHER_STRING',
		'type' => 'varchar',
		'len' => '100',
		'studio' => 'visible',
		'comment' => 'other_string',
);

$dictionary['osy_service']['fields']['contacts'] = array (
		'name' => 'contacts',
		'type' => 'link',
		'relationship' => 'osy_service_contacts',
		'module'=>'Contacts',
		'bean_name'=>'Contact',
		'source'=>'non-db',
		'vname'=>'LBL_OSY_SERVICE_CONTACT',
);


$dictionary['osy_service']["fields"]["users"] = array(
		'name' => 'users',
		'type' => 'link',
		'relationship' => 'osy_service_users',
		'source' => 'non-db',
		'vname'=>'LBL_USERS',
);

$dictionary['osy_service']["fields"]["leads"] = array(
		'name' => 'leads',
		'type' => 'link',
		'relationship' => 'osy_service_leads',
		'source' => 'non-db',
		'vname'=>'LBL_LEADS',
);

//relazione 1-n con modulo ProspectLists
//************************************************************
//link
$dictionary['osy_service']["fields"]["prospect_lists"] = array(
		'name' => 'prospect_lists',
		'type' => 'link',
		'relationship' => 'osy_service_prospect_lists',
		'source' => 'non-db',
		'vname'=>'LBL_PROSPECT_LISTS',
);

//relationship
$dictionary["osy_service"]["relationships"]["osy_service_prospect_lists"] = array (
		'lhs_module' => 'osy_service',
		'lhs_table' => 'osy_service',
		'lhs_key' => 'id',
		'rhs_module' => 'ProspectLists',
		'rhs_table' => 'prospect_lists',
		'rhs_key' => 'osy_service_id',
		'relationship_type' => 'one-to-many',
);
//************************************************************




$dictionary['osy_service']['fields']['fee_for_members'] = array(
		'name' => 'fee_for_members',
		'vname' => 'LBL_FEE_FOR_MEMBERS',
		'type' => 'varchar',
		'len' => '255',
		'studio' => 'visible',
);

$dictionary['osy_service']['fields']['fee_for_others'] = array(
		'name' => 'fee_for_others',
		'vname' => 'LBL_FEE_FOR_OTHERS',
		'type' => 'varchar',
		'len' => '255',
		'studio' => 'visible',
);


 // created: 2014-03-03 12:01:12
$dictionary['osy_service']['fields']['status']['comments']='osy_service status (ex: Planned, Held, Not held)';
$dictionary['osy_service']['fields']['status']['merge_filter']='disabled';

 

 // created: 2013-02-21 17:12:57

 
?>