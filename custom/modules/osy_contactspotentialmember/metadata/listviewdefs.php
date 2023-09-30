<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

$listViewDefs ['osy_contactspotentialmember'] = array (
		'NAME' => array (
				'width' => '20%',
				'label' => 'LBL_NAME',
				'link' => true,
				'orderBy' => 'last_name',
				'default' => true,
				'related_fields' => array (
						'first_name',
						'last_name',
						'salutation'
				)
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 31/gen/2014
		// *************************************************

		'LEAD_NAME' => array (
				'width' => '34%',
				'label' => 'LBL_LEAD_NAME',
				'module' => 'Leads',
				'id' => 'LEAD_ID',
				'link' => true,
				'default' => true,
				'sortable' => true,
				'ACLTag' => 'LEAD',
				'related_fields' => array (
						'lead_id'
				)
		),
		'ROLE_FUNCTION' => array (
				'type' => 'enum',
				'label' => 'LBL_ROLE_FUNCTION',
				'width' => '10%',
				'default' => true
		),
		'VIP' => array (
				'type' => 'bool',
				'label' => 'LBL_VIP',
				'width' => '10%',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
		// *************************************************

		// 'CONTACT_TYPE' => array (
		// 'type' => 'enum',
		// 'label' => 'LBL_CONTACT_TYPE',
		// 'width' => '10%',
		// 'default' => true
		// ),

		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'INDUSTRY' => array (
				'type' => 'multienum',
				'label' => 'LBL_INDUSTRY',
				'width' => '20%',
				'default' => true
		),
		'EMAIL1' => array (
				'width' => '15%',
				'label' => 'LBL_EMAIL_ADDRESS',
				'sortable' => false,
				'link' => true,
				'default' => true
		),
		'PHONE_WORK' => array (
				'width' => '15%',
				'label' => 'LBL_OFFICE_PHONE',
				'default' => true
		),
		'TITLE' => array (
				'width' => '15%',
				'label' => 'LBL_TITLE',
				'default' => false
		),
		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'DO_NOT_CALL' => array (
				'width' => '10',
				'label' => 'LBL_DO_NOT_CALL'
		),
		'PHONE_HOME' => array (
				'width' => '10',
				'label' => 'LBL_HOME_PHONE'
		),
		'PHONE_MOBILE' => array (
				'width' => '10',
				'label' => 'LBL_MOBILE_PHONE'
		),
		'PHONE_OTHER' => array (
				'width' => '10',
				'label' => 'LBL_WORK_PHONE'
		),
		'PHONE_FAX' => array (
				'width' => '10',
				'label' => 'LBL_FAX_PHONE'
		),
		'ADDRESS_STREET' => array (
				'width' => '10',
				'label' => 'LBL_PRIMARY_ADDRESS_STREET'
		),
		'ADDRESS_CITY' => array (
				'width' => '10',
				'label' => 'LBL_PRIMARY_ADDRESS_CITY'
		),
		'ADDRESS_STATE' => array (
				'width' => '10',
				'label' => 'LBL_PRIMARY_ADDRESS_STATE'
		),
		'ADDRESS_POSTALCODE' => array (
				'width' => '10',
				'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE'
		),
		'DATE_ENTERED' => array (
				'width' => '10',
				'label' => 'LBL_DATE_ENTERED'
		),
		'CREATED_BY_NAME' => array (
				'width' => '10',
				'label' => 'LBL_CREATED'
		)
);

?>
