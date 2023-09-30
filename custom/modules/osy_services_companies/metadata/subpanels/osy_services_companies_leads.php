<?php
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
		'payment_status_c' => array(
				'type' => 'enum',
				'default' => true,
				'vname' => 'LBL_PAYMENT_STATUS',
				'width' => '10%',
				'studio' => 'visible',
		),
		'date_modified' => array (
				'vname' => 'LBL_DATE_MODIFIED',
				'width' => '45%',
				'default' => true
		),
		'edit_button' => array (
				'widget_class' => 'SubPanelEditButton',
				'module' => 'osy_services_leads',
				'width' => '4%',
				'default' => true
		),
		'remove_button' => array (
				'widget_class' => 'SubPanelRemoveButton',
				'module' => 'osy_services_leads',
				'width' => '5%',
				'default' => true
		)
);
?>