<?php
$searchdefs ['Contacts'] = array (
		'layout' => array (
				'basic_search' => array (
						'search_name' => array (
								'name' => 'search_name',
								'label' => 'LBL_NAME',
								'type' => 'name',
								'default' => true,
								'width' => '10%'
						),
						// OPENSYMBOLMOD - START - davide.dallapozza - 12:03:39
						// *************************************************
						/*

						'current_user_only' => array (
								'name' => 'current_user_only',
								'label' => 'LBL_CURRENT_USER_FILTER',
								'type' => 'bool',
								'default' => true,
								'width' => '10%'
						)

						*/

						'account_name' => array (
								'name' => 'account_name',
								'default' => true,
								'width' => '10%'
						),
						'role_function' => array (
								'type' => 'enum',
								'label' => 'LBL_ROLE_FUNCTION',
								'width' => '10%',
								'default' => true,
								'name' => 'role_function'
						),

						// OPENSYMBOLMOD - END - davide.dallapozza
						// *************************************************
				),
				'advanced_search' => array (
						'account_name' => array (
								'name' => 'account_name',
								'default' => true,
								'width' => '10%'
						),
						'first_name' => array (
								'name' => 'first_name',
								'default' => true,
								'width' => '10%'
						),
						'last_name' => array (
								'name' => 'last_name',
								'default' => true,
								'width' => '10%'
						),
						'role_function' => array (
								'type' => 'enum',
								'label' => 'LBL_ROLE_FUNCTION',
								'width' => '10%',
								'default' => true,
								'name' => 'role_function'
						),
						'email' => array (
								'name' => 'email',
								'label' => 'LBL_ANY_EMAIL',
								'type' => 'name',
								'default' => true,
								'width' => '10%'
						),
						'address_city' => array (
								'name' => 'address_city',
								'label' => 'LBL_CITY',
								'type' => 'name',
								'default' => true,
								'width' => '10%'
						),
						'date_entered' => array (
								'type' => 'datetime',
								'label' => 'LBL_DATE_ENTERED',
								'width' => '10%',
								'default' => true,
								'name' => 'date_entered'
						),
						'billing_address_region_c' => array (
								'type' => 'varchar',
								'default' => true,
								'label' => 'LBL_BILLING_ADDRESS_REGION',
								'width' => '10%',
								'name' => 'billing_address_region_c'
						),
						// OPENSYMBOLMOD - START - davide.dallapozza - 11:51:15
						// *************************************************
						/*

						'address_postalcode' => array (
								'name' => 'address_postalcode',
								'label' => 'LBL_POSTAL_CODE',
								'type' => 'name',
								'default' => true,
								'width' => '10%'
						),

						*/
						'industry' => array (
								'name' => 'industry',
								'default' => true,
								'width' => '10%'
						),

						// OPENSYMBOLMOD - END - davide.dallapozza
						// *************************************************
						'assigned_user_id' => array (
								'name' => 'assigned_user_id',
								'type' => 'enum',
								'label' => 'LBL_ASSIGNED_TO',
								'function' => array (
										'name' => 'get_user_array',
										'params' => array (
												0 => false
										)
								),
								'default' => true,
								'width' => '10%'
						)
				)
		),
		'templateMeta' => array (
				'maxColumns' => '3',
				'maxColumnsBasic' => '4',
				'widths' => array (
						'label' => '10',
						'field' => '30'
				)
		)
);
?>
