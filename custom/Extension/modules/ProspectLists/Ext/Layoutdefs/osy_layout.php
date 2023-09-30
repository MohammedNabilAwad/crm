<?php
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

?>
