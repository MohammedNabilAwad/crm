<?php
$subpanel_layout ['list_fields'] = array (
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
		'role_function' => array (
				'width' => '15%',
				'vname' => 'LBL_ROLE_FUNCTION',
				'default' => true
		),
		'primary_address_city' => array (
				'width' => '20',
				'vname' => 'LBL_PRIMARY_ADDRESS_CITY'
		),
		'email1' => array (
				'name' => 'email1',
				'vname' => 'LBL_LIST_EMAIL',
				'widget_class' => 'SubPanelEmailLink',
				'width' => '30%',
				'sortable' => false,
				'default' => true
		),
		'phone_work' => array (
				'width' => '15%',
				'vname' => 'LBL_OFFICE_PHONE',
				'default' => true
		)
);
?>