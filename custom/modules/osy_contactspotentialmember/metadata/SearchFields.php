<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

$searchFields ['osy_contactspotentialmember'] = array (
		'first_name' => array (
				'query_type' => 'default'
		),
		'last_name' => array (
				'query_type' => 'default'
		),
		'lead_name' => array (
				'query_type' => 'default',
				'operator' => 'innerjoin',
				'innerjoin' => 'INNER JOIN leads ON (leads.id=osy_contactspotentialmember.lead_id AND leads.account_name LIKE',
				'db_field' => array (
						'lead_id'
				)
		),
		'search_name' => array (
				'query_type' => 'default',
				'db_field' => array (
						'first_name',
						'last_name'
				),
				'force_unifiedsearch' => true
		),
		'do_not_call' => array (
				'query_type' => 'default',
				'input_type' => 'checkbox',
				'operator' => '='
		),
		'phone' => array (
				'query_type' => 'default',
				'db_field' => array (
						'phone_mobile',
						'phone_work',
						'phone_other',
						'phone_fax',
						'assistant_phone'
				)
		),
		'email' => array (
				'query_type' => 'default',
				'operator' => 'subquery',
				'subquery' => 'SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (ea.id = eabr.email_address_id) WHERE eabr.deleted=0 AND ea.email_address LIKE',
				'db_field' => array (
						'id'
				),
				'vname' => 'LBL_ANY_EMAIL'
		),
		'address_street' => array (
				'query_type' => 'default',
				'db_field' => array (
						'primary_address_street',
						'alt_address_street'
				)
		),
		'address_city' => array (
				'query_type' => 'default',
				'db_field' => array (
						'primary_address_city',
						'alt_address_city'
				)
		),
		'address_state' => array (
				'query_type' => 'default',
				'db_field' => array (
						'primary_address_state',
						'alt_address_state'
				)
		),
		'address_postalcode' => array (
				'query_type' => 'default',
				'db_field' => array (
						'primary_address_postalcode',
						'alt_address_postalcode'
				)
		),
		'address_country' => array (
				'query_type' => 'default',
				'db_field' => array (
						'primary_address_country',
						'alt_address_country'
				)
		),
		'current_user_only' => array (
				'query_type' => 'default',
				'db_field' => array (
						'assigned_user_id'
				),
				'my_items' => true,
				'vname' => 'LBL_CURRENT_USER_FILTER',
				'type' => 'bool'
		),

		// Range Search Support
		'range_date_entered' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		'start_range_date_entered' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		'end_range_date_entered' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		'range_date_modified' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		'start_range_date_modified' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		'end_range_date_modified' => array (
				'query_type' => 'default',
				'enable_range_search' => true,
				'is_date_field' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 31/gen/2014
		// *************************************************

		'assigned_user_id' => array (
				'query_type' => 'default'
		),
		'industry' => array (
				'query_type' => 'default',
				'options' => 'industry_dom',
				'template_var' => 'INDUSTRY_OPTIONS'
		),
		'role_function' => array (
				'query_type' => 'default'
		),
		'primary_address_region_c' => array (
				'query_type' => 'default'
		)

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************
// Range Search Support
);
?>
