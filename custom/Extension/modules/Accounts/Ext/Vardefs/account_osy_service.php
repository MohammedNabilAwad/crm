<?php

$dictionary['Account']['fields']['osy_service'] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'account_osy_service',
		'module'=>'osy_service',
		'bean_name'=>'osy_service',
		'source'=>'non-db',
		'vname'=>'LBL_OSY_SERVICE',
);

$dictionary['Account']['relationships']['account_osy_service'] = array(
	'lhs_module'=> 'Accounts',
	'lhs_table'=> 'accounts',
	'lhs_key' => 'id',
	'rhs_module'=> 'osy_service',
	'rhs_table'=> 'osy_service',
	'rhs_key' => 'parent_id',
	'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
	'relationship_role_column_value'=>'Accounts',
);