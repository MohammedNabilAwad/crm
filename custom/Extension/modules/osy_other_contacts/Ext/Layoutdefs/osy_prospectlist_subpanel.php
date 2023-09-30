<?php
$layout_defs ['osy_other_contacts'] ['subpanel_setup'] ['prospect_list_subpanel'] = array (
		'order' => 10,
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_PROSPECT_LIST',
		'subpanel_name' => 'default',
		'module' => 'ProspectLists',
		'get_subpanel_data' => 'prospect_lists_link',
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