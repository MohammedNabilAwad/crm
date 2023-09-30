<?php

$dictionary['osy_service_leads'] = array (
		'table' => 'osy_service_leads',
		'fields' => array (
				array('name' =>'id', 'type' =>'varchar', 'len'=>'36'),
				array('name' =>'osy_service_id', 'type' =>'varchar', 'len'=>'36', ),
				array('name' =>'lead_id', 'type' =>'varchar', 'len'=>'36', ),
				array('name' =>'required', 'type' =>'varchar', 'len'=>'1', 'default'=>'1'),
				array('name' =>'accept_status', 'type' =>'varchar', 'len'=>'25', 'default'=>'none'),
				array ('name' => 'date_modified','type' => 'datetime'),
				array('name' =>'deleted', 'type' =>'bool', 'len'=>'1', 'default'=>'0', 'required'=>false),
		),
		'indices' => array (
				array('name' =>'osy_service_leadspk', 'type' =>'primary', 'fields'=>array('id')),
				array('name' =>'idx_lead_osy_service_osy_service', 'type' =>'index', 'fields'=>array('osy_service_id')),
				array('name' =>'idx_lead_osy_service_lead', 'type' =>'index', 'fields'=>array('lead_id')),
				array('name' => 'idx_osy_service_lead', 'type'=>'alternate_key', 'fields'=>array('osy_service_id','lead_id')),
		),
		'relationships' => array (
				'osy_service_leads' => array(
						'lhs_module'=> 'osy_service',
						'lhs_table'=> 'osy_service',
						'lhs_key' => 'id',
						'rhs_module'=> 'Leads',
						'rhs_table'=> 'leads',
						'rhs_key' => 'id',
						'relationship_type'=>'many-to-many',
						'join_table'=> 'osy_service_leads',
						'join_key_lhs'=>'osy_service_id',
						'join_key_rhs'=>'lead_id'
				)
		)
);