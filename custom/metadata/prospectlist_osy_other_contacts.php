<?php
$dictionary ["prospectlist_osy_other_contacts"] = array (
		'true_relationship_type' => 'many-to-many',
		'relationships' => array (
				'prospectlist_osy_other_contacts' => array (
						'lhs_module' => 'ProspectLists',
						'lhs_table' => 'prospect_lists',
						'lhs_key' => 'id',
						'rhs_module' => 'osy_other_contacts',
						'rhs_table' => 'osy_other_contacts',
						'rhs_key' => 'id',
						'relationship_type' => 'many-to-many',
						'join_table' => 'prospectlist_osy_other_contacts',
						'join_key_lhs' => 'prospectlist_id',
						'join_key_rhs' => 'othercontact_id'
				)
		),
		'table' => 'prospectlist_osy_other_contacts',
		'fields' => array (
				0 => array (
						'name' => 'id',
						'type' => 'varchar',
						'len' => 36
				),
				1 => array (
						'name' => 'date_modified',
						'type' => 'datetime'
				),
				2 => array (
						'name' => 'deleted',
						'type' => 'bool',
						'len' => '1',
						'default' => '0',
						'required' => true
				),
				3 => array (
						'name' => 'prospectlist_id',
						'type' => 'varchar',
						'len' => 36
				),
				4 => array (
						'name' => 'othercontact_id',
						'type' => 'varchar',
						'len' => 36
				)
		),
		'indices' => array (
				0 => array (
						'name' => 'prospectlist_osy_other_contactsspk',
						'type' => 'primary',
						'fields' => array (
								0 => 'id'
						)
				),
				1 => array (
						'name' => 'prospectlist_id_idx',
						'type' => 'index',
						'fields' => array (
								0 => 'prospectlist_id'
						)
				),
				2 => array (
						'name' => 'othercontact_id_idx',
						'type' => 'index',
						'fields' => array (
								0 => 'othercontact_id'
						)
				)
		)
);
?>