<?php
$searchdefs ['osy_contactspotentialmember'] = array (
		'templateMeta' => array (
				'maxColumns' => '3',
				'maxColumnsBasic' => '4',
				'widths' => array (
						'label' => '10',
						'field' => '30'
				)
		),
		'layout' => array (
				'basic_search' => array (
						array (
								'name' => 'search_name',
								'label' => 'LBL_NAME',
								'type' => 'name'
						),
						// OPENSYMBOLMOD - START - davide.dallapozza - 30/gen/2014
						// *************************************************
						/*
						 * array ( 'name' => 'current_user_only', 'label' => 'LBL_CURRENT_USER_FILTER', 'type' => 'bool' )
						 */

						'lead_name' => array (
								'name' => 'lead_name',
								'displayParams' => array (
										'field_to_name_array' => array (
												'id' => 'lead_id_basic',
												'account_name' => 'lead_name_basic'
										)
								)
						),
						'role_function'
				// OPENSYMBOLMOD - END - davide.dallapozza
				// *************************************************
								),
				'advanced_search' => array (
						'lead_name' => array (
								'name' => 'lead_name',
								'displayParams' => array (
										'field_to_name_array' => array (
												'id' => 'lead_id_advanced',
												'account_name' => 'lead_name_advanced'
										)
								)
						),
						'first_name',
						'last_name',
						'role_function',
						'email',
						'primary_address_city' => array (
								'name' => 'primary_address_city',
								'label' => 'LBL_CITY'
						),
						'date_entered',
						'primary_address_region_c',
						'industry',
						'assigned_user_id'
				)
		)
);
?>
