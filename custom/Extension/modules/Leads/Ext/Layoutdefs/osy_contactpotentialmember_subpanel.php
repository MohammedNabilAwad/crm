<?php
$layout_defs ['Leads'] ['subpanel_setup'] ['osy_contactpotentialmember_subpanel'] = array (
		'order' => 100,
		'module' => 'osy_contactspotentialmember',
		'subpanel_name' => 'osy_contactspotentialmember_leads',
		'sort_order' => 'desc',
		'sort_by' => 'id',
		'title_key' => 'LBL_CONTACT_POTENTIAL_MEMBER',
		'get_subpanel_data' => 'osy_contactpotentialmember_link',
		'top_buttons' => array (
//				array (
//						'widget_class' => 'SubPanelTopButtonQuickCreate'
//				),
				array(
					'widget_class' => 'SubPanelTopButtonQuickCreateCustom',
					'additional_form_fields' => array(
						'lead_id' => '$id',
						'lead_name' => '$account_name',
						//'lead_name' => '$name'
					)
				),
				array (
						'widget_class' => 'SubPanelTopSelectButton',
						'mode' => 'MultiSelect'
				)
		)
);
?>