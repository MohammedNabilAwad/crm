<?php
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
?>