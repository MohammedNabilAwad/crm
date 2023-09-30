<?php

$dictionary['osy_service_contacts'] = array(
  	'true_relationship_type' => 'many-to-many',
	'table'=> 'osy_service_contacts',
	'fields'=> array(
		array(	'name'			=> 'id', 
				'type'			=> 'varchar', 
				'len'			=> '36'
		),
		array(	'name'			=> 'osy_service_id', 
				'type'			=> 'varchar', 
				'len'			=> '36',
		),
		array(	'name'			=> 'contact_id', 
				'type'			=> 'varchar', 
				'len'			=> '36',
		),
		array(	'name'			=> 'required', 
				'type'			=> 'varchar', 
				'len'			=> '1', 
				'default'		=> '1',
		),
		array(	'name'			=> 'accept_status', 
				'type'			=> 'varchar', 
				'len'			=> '25', 
				'default'		=> 'none'
		),
		array(	'name'			=> 'date_modified',
				'type'			=> 'datetime'
		),
		array(	'name'			=> 'deleted', 
				'type'			=> 'bool', 
				'len'			=> '1', 
				'default'		=> '0', 
				'required'		=> false
		),
 	), 
	'indices' => array(
 		array(	'name'			=> 'osy_service_contactspk', 
				'type'			=> 'primary', 
				'fields'		=> array('id'),
		),
		array(	'name'			=> 'idx_osy_service', 
				'type'			=> 'index', 
				'fields'		=> array('osy_service_id'),
		),
		array(	'name'			=> 'idx_contact', 
				'type'			=> 'index', 
				'fields'		=> array('contact_id'),
		),
		array(	'name'			=> 'idx_osy_service_contact', 
				'type'			=> 'alternate_key', 
				'fields'		=> array('osy_service_id','contact_id'),
		),
	),
	'relationships' => array(
		'osy_service_contacts' => array(
			'lhs_module'		=> 'osy_service', 
			'lhs_table'			=> 'osy_service', 
			'lhs_key'			=> 'id',
			'rhs_module'		=> 'Contacts', 
			'rhs_table'			=> 'contacts', 
			'rhs_key'			=> 'id',
			'relationship_type'	=> 'many-to-many',
			'join_table'		=> 'osy_service_contacts', 
			'join_key_lhs'		=> 'osy_service_id', 
			'join_key_rhs'		=> 'contact_id',
		),
	),
);

?>