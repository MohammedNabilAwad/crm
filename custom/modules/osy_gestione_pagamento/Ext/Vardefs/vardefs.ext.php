<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary ['osy_gestione_pagamento'] ['fields'] ['cost'] = array (
		'name' => 'cost',
		'vname' => 'LBL_COST',
		'type' => 'varchar',
		'len' => '50',
		'required' => false,
		'massupdate' => true 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['payment_status'] = array (
		'name' => 'payment_status',
		'vname' => 'LBL_PAYMENT_STATUS',
		'type' => 'enum',
		'options' => 'osy_payment_status_list',
		'len' => '255',
		'required' => false,
		'massupdate' => true 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_id'] = array (
		'required' => false,
		'name' => 'related_id',
		'vname' => 'LBL_RELATED_ID',
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

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_name_accounts'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'related_name_accounts',
		'vname' => 'LBL_RELATED_NAME_ACCOUNTS',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'related_id',
		'link' => 'accounts',
		'ext2' => 'Accounts',
		'module' => 'Accounts',
		'quicksearch' => 'enabled' 
);

// ************************************************************
$dictionary ['osy_gestione_pagamento'] ['fields'] ['account_id'] = array (
		'required' => false,
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
		'len' => 36 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_name_accounts_member_contacts'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'related_name_accounts_member_contacts',
		'vname' => 'LBL_RELATED_NAME_ACCOUNTS_MEMBER_CONTACTS',
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
		'link' => 'accounts',
		'ext2' => 'Accounts',
		'module' => 'Accounts',
		'quicksearch' => 'enabled' 
);
// ************************************************************

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_name_contacts'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'related_name_contacts',
		'vname' => 'LBL_RELATED_NAME_CONTACTS',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'related_id',
		'link' => 'contacts',
		'ext2' => 'Contacts',
		'module' => 'Contacts',
		'quicksearch' => 'enabled' 
);
$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_name_leads'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'related_name_leads',
		'vname' => 'LBL_RELATED_NAME_LEADS',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'related_id',
		'link' => 'leads',
		'ext2' => 'Leads',
		'module' => 'Leads',
		'quicksearch' => 'enabled' 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_name_contactspotentialmember'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'related_name_contactspotentialmember',
		'vname' => 'LBL_RELATED_NAME_CONTACTSPOTENTIALMEMBER',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'related_id',
		'link' => 'osy_contactspotentialmember',
		'ext2' => 'osy_contactspotentialmember',
		'module' => 'osy_contactspotentialmember',
		'quicksearch' => 'enabled' 
);

// $dictionary['osy_gestione_pagamento']['fields']['leads'] = array (
// 'name' => 'leads',
// 'type' => 'link',
// 'relationship' => 'prospect_list_leads',
// 'source' => 'non-db',
// );

$dictionary ['osy_gestione_pagamento'] ['fields'] ['prospect_list_id'] = array (
		'required' => false,
		'name' => 'prospect_list_id',
		'vname' => 'LBL_PROSPECT_LIST_ID',
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

$dictionary ['osy_gestione_pagamento'] ['fields'] ['prospect_list_name'] = array (
		'required' => false,
		'source' => 'non-db',
		'name' => 'prospect_list_name',
		'vname' => 'LBL_PROSPECT_LIST_NAME',
		'type' => 'relate',
		'massupdate' => 0,
		'comments' => '',
		'help' => '',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => 0,
		'reportable' => 1,
		'len' => '36',
		'id_name' => 'prospect_list_id',
		'link' => 'prospect_lists',
		'ext2' => 'ProspectLists',
		'module' => 'ProspectLists',
		'quicksearch' => 'enabled',
		'rname' => 'name' 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['related_type'] = array (
		'name' => 'related_type',
		'vname' => 'LBL_RELATED_TYPE',
		'type' => 'varchar',
		'len' => 255,
		'massupdate' => 0 
);

$dictionary ['osy_gestione_pagamento'] ['fields'] ['prospect_lists'] = array (
		'name' => 'prospect_lists',
		'type' => 'link',
		'relationship' => 'prospectlist_osy_gestione_pagamento_one_to_many',
		'module' => 'ProspectLists',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_PROSPECTLISTS' 
);

$dictionary ['osy_gestione_pagamento'] ['relationships'] ['prospectlist_osy_gestione_pagamento_one_to_many'] = array (
		'lhs_module' => 'ProspectLists',
		'lhs_table' => 'prospect_lists',
		'lhs_key' => 'id',
		'rhs_module' => 'osy_gestione_pagamento',
		'rhs_table' => 'prospect_lists_prospects',
		'rhs_key' => 'prospect_list_id',
		'relationship_type' => 'one-to-many' 
);
?>