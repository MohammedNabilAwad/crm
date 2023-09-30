<?php
$dictionary['Opportunity']['relationships']['osy_service'] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'opportunities_osy_service',
		'module'=>'osy_service',
		'bean_name'=>'osy_service',
		'source'=>'non-db',
		'vname'=>'LBL_OSY_SERVICE',
);

$dictionary['Opportunity']['relationships']['opportunities_osy_service'] = array(
		'lhs_module'=> 'Opportunities',
		'lhs_table'=> 'opportunities',
		'lhs_key' => 'id',
		'rhs_module'=> 'osy_service',
		'rhs_table'=> 'osy_service',
		'rhs_key' => 'parent_id',
		'relationship_type'=>'one-to-many',
		'relationship_role_column'=>'parent_type',
		'relationship_role_column_value'=>'Opportunities',
);