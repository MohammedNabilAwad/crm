<?php 
 //WARNING: The contents of this file are auto-generated



$dictionary['ProspectList']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_prospect_lists',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);







// ************************************************************ RELAZIONE 1-n
// Per relazione 1-n con modulo osy_service
// relate
$dictionary ['ProspectList'] ['fields'] ['osy_service_name'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'osy_service_name',
		'vname' => 'LBL_OSY_SERVICE_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'osy_service_id',
		'ext2' => 'osy_service',
		'module' => 'osy_service',
		'quicksearch' => 'enabled',
		'studio' => 'visible'
);

$dictionary ['ProspectList'] ['fields'] ['osy_service_id'] = array (
		'required' => false,
		'name' => 'osy_service_id',
		'vname' => 'LBL_OSY_SERVICE_ID',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36
);

// link
$dictionary ["ProspectList"] ["fields"] ["osy_service"] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'osy_service_prospect_lists',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_SERVICE'
);

$dictionary ['ProspectList'] ['fields'] ['osy_contactspotentialmember_link'] = array (
		'name' => 'osy_contactspotentialmember_link',
		'type' => 'link',
		'relationship' => 'prospectlist_osy_contactspotentialmember',
		'module' => 'osy_contactspotentialmember',
		'source' => 'non-db',
		'vname' => 'LBL_PROSPECT_LIST'
);

$dictionary ['ProspectList'] ['fields'] ['osy_other_contacts_link'] = array (
		'name' => 'osy_other_contacts_link',
		'type' => 'link',
		'relationship' => 'prospectlist_osy_other_contacts',
		'module' => 'osy_other_contacts',
		'source' => 'non-db',
		'vname' => 'LBL_PROSPECT_LIST'
);

//************************************************************

$dictionary ['ProspectList'] ['fields'] ['osy_gestione_pagamento_link'] = array (
		'name' => 'osy_gestione_pagamento_link',
		'type' => 'link',
		'relationship' => 'prospectlist_osy_gestione_pagamento',
		'module' => 'Accounts',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_GESTIONE_PAGAMENTO_LINK'
);


$dictionary ['ProspectList'] ['fields'] ['osy_gestione_pagamento_name'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'osy_gestione_pagamento_name',
		'vname' => 'LBL_OSY_GESTIONE_PAGAMENTO_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'osy_gestione_pagamento_id',
		'ext2' => 'osy_gestione_pagamento',
		'module' => 'osy_gestione_pagamento',
		'quicksearch' => 'enabled',
		'studio' => 'visible'
);

$dictionary ['ProspectList'] ['fields'] ['osy_gestione_pagamento_id'] = array (
		'required' => false,
		'name' => 'osy_gestione_pagamento_id',
		'vname' => 'LBL_OSY_GESTIONE_PAGAMENTO_ID',
		'type' => 'id',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => 0,
		'audited' => 0,
		'reportable' => 0,
		'len' => 36
);

// link
$dictionary ["ProspectList"] ["fields"] ["osy_gestione_pagamento"] = array (
		'name' => 'osy_gestione_pagamento',
		'type' => 'link',
		'relationship' => 'prospectlist_osy_gestione_pagamento_one_to_many',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_GESTIONE_PAGAMENTO'
);

?>