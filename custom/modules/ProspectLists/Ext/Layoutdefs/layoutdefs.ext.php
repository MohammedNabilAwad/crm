<?php 
 //WARNING: The contents of this file are auto-generated


$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_other_contacts_subpanel"] = array (
		'order' => 100,
		'module' => 'osy_other_contacts',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OTHER_CONTACTS',
		'get_subpanel_data' => 'osy_other_contacts_link',
		'top_buttons' => array (
				0 => array (
						'widget_class' => 'SubPanelTopButtonQuickCreate'
				),
				1 => array (
						'widget_class' => 'SubPanelTopSelectButton',
						'mode' => 'MultiSelect'
				)
		)
);



$layout_defs['ProspectLists']['subpanel_setup']['securitygroups'] = array(
	'top_buttons' => array(array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => 'SecurityGroups', 'mode' => 'MultiSelect'),),
	'order' => 900,
	'sort_by' => 'name',
	'sort_order' => 'asc',
	'module' => 'SecurityGroups',
	'refresh_page'=>1,
	'subpanel_name' => 'default',
	'get_subpanel_data' => 'SecurityGroups',
	'add_subpanel_data' => 'securitygroup_id',
	'title_key' => 'LBL_SECURITYGROUPS_SUBPANEL_TITLE',
);






$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_contactspotentialmember_subpanel"] = array (
		'order' => 100,
		'refresh_page' => 1,
		'module' => 'osy_contactspotentialmember',
		'subpanel_name' => 'default',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_CONTACTS_POTENTIAL_MEMBER',
		'get_subpanel_data' => 'osy_contactspotentialmember_link',
		'top_buttons' => array (
				0 => array (
						'widget_class' => 'SubPanelTopButtonQuickCreate'
				),
				1 => array (
						'widget_class' => 'SubPanelTopSelectButton',
						'mode' => 'MultiSelect'
				)
		)
);


unset ( $layout_defs ['ProspectLists'] ['subpanel_setup'] ['users'] );
unset($layout_defs['ProspectLists']['subpanel_setup']['prospects']);
//$layout_defs ["ProspectLists"] ["subpanel_setup"] ["contacts"] ['refresh_page'] = 1;
$layout_defs['ProspectLists']['subpanel_setup']['accounts']['order'] = 10;

$layout_defs['ProspectLists']['subpanel_setup']['accounts']['top_buttons'] = 
$layout_defs['ProspectLists']['subpanel_setup']['contacts']['top_buttons'] = 
$layout_defs['ProspectLists']['subpanel_setup']['leads']['top_buttons'] = array(
    array('widget_class'=>'SubPanelTopSelectButton','mode'=>'MultiSelect'),
);

$layout_defs['ProspectLists']['subpanel_setup']['prospects'] = array();

/*
$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_gestione_pagamento_subpanel_members"] = array (
		'order' => 11,
		'module' => 'osy_gestione_pagamento',
		'subpanel_name' => 'ForProspectListsMembers',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_GESTIONE_PAGAMENTO_SUBPANEL_MEMBERS',
		'get_subpanel_data' => 'osy_gestione_pagamento',
		'top_buttons' => array ()
		// 0 => array (
		// 'widget_class' => 'SubPanelTopButtonQuickCreate'
		// ),
		// 1 => array (
		// 'widget_class' => 'SubPanelTopSelectButton',
		// 'mode' => 'MultiSelect'
		// )

);

$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_gestione_pagamento_subpanel_membercontacts"] = array (
		'order' => 12,
		'module' => 'osy_gestione_pagamento',
		'subpanel_name' => 'ForProspectListsMemberContacts',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_GESTIONE_PAGAMENTO_SUBPANEL_MEMBERCONTACTS',
		'get_subpanel_data' => 'osy_gestione_pagamento',
		'top_buttons' => array ()
		// 0 => array (
		// 'widget_class' => 'SubPanelTopButtonQuickCreate'
		// ),
		// 1 => array (
		// 'widget_class' => 'SubPanelTopSelectButton',
		// 'mode' => 'MultiSelect'
		// )

);

$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_gestione_pagamento_subpanel_potentialmembers"] = array (
		'order' => 13,
		'module' => 'osy_gestione_pagamento',
		'subpanel_name' => 'ForProspectListsPotentialMembers',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_GESTIONE_PAGAMENTO_SUBPANEL_POTENTIALMEMBERS',
		'get_subpanel_data' => 'osy_gestione_pagamento',
		'top_buttons' => array ()
		// 0 => array (
		// 'widget_class' => 'SubPanelTopButtonQuickCreate'
		// ),
		// 1 => array (
		// 'widget_class' => 'SubPanelTopSelectButton',
		// 'mode' => 'MultiSelect'
		// )

);

$layout_defs ["ProspectLists"] ["subpanel_setup"] ["osy_gestione_pagamento_subpanel_contactspotentialmembers"] = array (
		'order' => 14,
		'module' => 'osy_gestione_pagamento',
		'subpanel_name' => 'ForProspectListsContactsPotentialMembers',
		'sort_order' => 'asc',
		'sort_by' => 'id',
		'title_key' => 'LBL_OSY_GESTIONE_PAGAMENTO_SUBPANEL_CONTACTSPOTENTIALMEMBERS',
		'get_subpanel_data' => 'osy_gestione_pagamento',
		'top_buttons' => array ()
		// 0 => array (
		// 'widget_class' => 'SubPanelTopButtonQuickCreate'
		// ),
		// 1 => array (
		// 'widget_class' => 'SubPanelTopSelectButton',
		// 'mode' => 'MultiSelect'
		// )

);
*/




//auto-generated file DO NOT EDIT
$layout_defs['ProspectLists']['subpanel_setup']['leads']['override_subpanel_name'] = 'ProspectList_subpanel_leads';


//auto-generated file DO NOT EDIT
$layout_defs['ProspectLists']['subpanel_setup']['contacts']['override_subpanel_name'] = 'ProspectList_subpanel_contacts';


//auto-generated file DO NOT EDIT
$layout_defs['ProspectLists']['subpanel_setup']['osy_contactspotentialmember_subpanel']['override_subpanel_name'] = 'ProspectList_subpanel_osy_contactspotentialmember_subpanel';


//auto-generated file DO NOT EDIT
$layout_defs['ProspectLists']['subpanel_setup']['accounts']['override_subpanel_name'] = 'ProspectList_subpanel_accounts';


//auto-generated file DO NOT EDIT
$layout_defs['ProspectLists']['subpanel_setup']['osy_other_contacts_subpanel']['override_subpanel_name'] = 'ProspectList_subpanel_osy_other_contacts_subpanel';

?>