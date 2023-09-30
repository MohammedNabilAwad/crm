<?php
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
?>