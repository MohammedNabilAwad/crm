<?php
$dictionary ["prospectlist_osy_gestione_pagamento"] = array (
	'true_relationship_type' => 'many-to-many',
	'relationships' => array (
		'prospectlist_osy_gestione_pagamento' => array (
			'lhs_module'=> 'ProspectLists', 
			'lhs_table'=> 'prospect_lists', 
			'lhs_key' => 'id',
			'rhs_module'=> 'Accounts', 
			'rhs_table'=> 'accounts', 
			'rhs_key' => 'id',
			'relationship_type'=>'many-to-many',
			'join_table'=> 'prospect_lists_prospects', 
			'join_key_lhs'=>'prospect_list_id', 
			'join_key_rhs'=>'related_id',
			'relationship_role_column'=>'related_type',
			'relationship_role_column_value'=>'Accounts',
		)
	),
	'table' => 'prospect_lists_prospects',
);
?>