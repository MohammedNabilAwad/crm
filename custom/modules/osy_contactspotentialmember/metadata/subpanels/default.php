<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

$subpanel_layout = array (
		'top_buttons' => array (
				array (
						'widget_class' => 'SubPanelTopCreateButton'
				),
				array (
						'widget_class' => 'SubPanelTopSelectButton',
						'popup_module' => 'People'
				)
		),
		'where' => '',
		'list_fields' => array (
				'first_name' => array (
						'name' => 'first_name',
						'usage' => 'query_only'
				),
				'last_name' => array (
						'name' => 'last_name',
						'usage' => 'query_only'
				),
				'salutation' => array (
						'name' => 'salutation',
						'usage' => 'query_only'
				),
				'name' => array (
						'name' => 'name',
						'vname' => 'LBL_LIST_NAME',
						'sort_by' => 'last_name',
						'sort_order' => 'asc',
						'widget_class' => 'SubPanelDetailViewLink',
						'module' => 'Contacts',
						'width' => '40%'
				),
				'lead_id' => array (
						'name' => 'lead_id',
						'usage' => 'query_only'
				),
				'lead_name' => array (
						'name' => 'lead_name',
						'rname' => 'lead_name',
						'vname' => 'LBL_LEAD_NAME',
						'sort_by' => 'account_name',
						'sort_order' => 'asc',
						'widget_class' => 'SubPanelDetailViewLink',
						'module' => 'Leads',
						'width' => '40%',
						'related_fields' => array (
								'lead_id'
						),
						'link' => true
				),
				// 'lead_name' => array (
				// 'width' => '34%',
				// 'vname' => 'LBL_LEAD_NAME',
				// 'module' => 'Leads',
				// 'id' => 'LEAD_ID',
				// 'link' => true,
				// 'default' => true,
				// 'sortable' => true,
				// 'ACLTag' => 'LEAD',
				// 'related_fields' => array (
				// 'lead_id'
				// )
				// ),
				'email1' => array (
						'name' => 'email1',
						'vname' => 'LBL_LIST_EMAIL',
						'widget_class' => 'SubPanelEmailLink',
						'width' => '35%',
						'sortable' => false
				),
				'phone_work' => array (
						'name' => 'phone_work',
						'vname' => 'LBL_LIST_PHONE',
						'width' => '15%'
				),
				'edit_button' => array (
						'widget_class' => 'SubPanelEditButton',
						'module' => 'Contacts',
						'width' => '5%'
				),
				'remove_button' => array (
						'widget_class' => 'SubPanelRemoveButton',
						'module' => 'Contacts',
						'width' => '5%'
				)
		)
);
?>
