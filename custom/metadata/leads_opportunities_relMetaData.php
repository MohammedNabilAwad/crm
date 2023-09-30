<?php
$dictionary["leads_opportunities_1"] = array (
		'true_relationship_type' => 'one-to-one',
		'from_studio' => true,
		'relationships' =>
		array (
				'leads_opportunities_1' =>
				array (
						'lhs_module' => 'Leads',
						'lhs_table' => 'leads',
						'lhs_key' => 'id',
						'rhs_module' => 'Opportunities',
						'rhs_table' => 'opportunities',
						'rhs_key' => 'id',
						'relationship_type' => 'many-to-many',
						'join_table' => 'leads_opportunities_1',
						'join_key_lhs' => 'leads_1_id',
						'join_key_rhs' => 'opportunities_1_id',
				),
		),
		'table' => 'leads_opportunities_1',
		'fields' =>
		array (
				0 =>
				array (
						'name' => 'id',
						'type' => 'varchar',
						'len' => 36,
				),
				1 =>
				array (
						'name' => 'date_modified',
						'type' => 'datetime',
				),
				2 =>
				array (
						'name' => 'deleted',
						'type' => 'bool',
						'len' => '1',
						'default' => '0',
						'required' => true,
				),
				3 =>
				array (
						'name' => 'leads_1_id',
						'type' => 'varchar',
						'len' => 36,
				),
				4 =>
				array (
						'name' => 'opportunities_1_id',
						'type' => 'varchar',
						'len' => 36,
				),
		),
		'indices' =>
		array (
				0 =>
				array (
						'name' => 'leads_opportunities_1spk',
						'type' => 'primary',
						'fields' =>
						array (
								0 => 'id',
						),
				),
				1 =>
				array (
						'name' => 'idx_leads_1_id',
						'type' => 'index',
						'fields' =>
						array (
								0 => 'leads_1_id',
						),
				),
				2 =>
				array (
						'name' => 'idx_opportunities_1_id',
						'type' => 'index',
						'fields' =>
						array (
								0 => 'opportunities_1_id',
						),
				),
		),
);