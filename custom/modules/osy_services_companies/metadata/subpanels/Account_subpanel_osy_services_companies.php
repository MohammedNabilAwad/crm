<?php
// created: 2013-09-13 12:00:07
$subpanel_layout ['list_fields'] = array (
		'subject' => array (
				'vname' => 'LBL_SUBJECT',
				'widget_class' => 'SubPanelDetailViewLink',
				'width' => '45%',
				'default' => true
		),
		'subject_description' => array (
				'type' => 'enum',
				'vname' => 'LBL_SUBJECT_DESCRIPTION',
				'width' => '10%',
				'default' => true
		),
		'mode_of_intervention' => array (
				'type' => 'multienum',
				'studio' => 'visible',
				'vname' => 'LBL_MODE_OF_INTERVENTION',
				'width' => '10%',
				'default' => true
		),
		'costs_c' => array (
				'type' => 'currency',
				'default' => true,
				'vname' => 'LBL_COSTS',
				'currency_format' => true,
				'width' => '10%'
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 10:56:00
		// *************************************************

		'payment_status_c' => array(
				'type' => 'enum',
				'default' => true,
				'vname' => 'LBL_PAYMENT_STATUS',
				'width' => '10%',
				'studio' => 'visible',
		),

		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'date_modified' => array (
				'vname' => 'LBL_DATE_MODIFIED',
				'width' => '45%',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 10:55:29
		// *************************************************
		/*

		'account_name' => array (
				'type' => 'relate',
				'studio' => 'visible',
				'vname' => 'LBL_ACCOUNT_NAME',
				'id' => 'ACCOUNT_ID',
				'link' => true,
				'width' => '10%',
				'default' => true,
				'widget_class' => 'SubPanelDetailViewLink',
				'target_module' => 'Accounts',
				'target_record_key' => 'account_id'
		),

		*/
		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'edit_button' => array (
				'widget_class' => 'SubPanelEditButton',
				'module' => 'osy_services_companies',
				'width' => '4%',
				'default' => true
		),
		'remove_button' => array (
				'widget_class' => 'SubPanelRemoveButton',
				'module' => 'osy_services_companies',
				'width' => '5%',
				'default' => true
		)
);