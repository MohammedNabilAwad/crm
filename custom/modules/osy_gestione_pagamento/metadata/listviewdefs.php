<?php
$module_name = 'osy_gestione_pagamento';
$listViewDefs [$module_name] = array (
		'RELATED_NAME_ACCOUNTS' => array (
				'width' => '32%',
				'label' => 'LBL_RELATED_NAME_ACCOUNTS',
				'default' => true,
				'module' => 'Accounts',
				'id' => 'RELATED_ID',
				'link' => true,
				'related_fields' => array (
						0 => 'related_id'
				)
		),
		'RELATED_NAME_CONTACTS' => array (
				'width' => '32%',
				'label' => 'LBL_RELATED_NAME_CONTACTS',
				'default' => true,
				'module' => 'Contacts',
				'id' => 'RELATED_ID',
				'link' => true,
				'related_fields' => array (
						0 => 'related_id'
				)
		),
// 		'RELATED_NAME_ACCOUNTS_MEMBER_CONTACTS' => array (
// 				'width' => '32%',
// 				'label' => 'LBL_RELATED_NAME_ACCOUNTS_MEMBER_CONTACTS',
// 				'default' => true,
// 				'module' => 'Accounts',
// 				'id' => 'account_id',
// 				'link' => true,
// 				'related_fields' => array (
// 						0 => 'account_id'
// 				)
// 		),
		'RELATED_NAME_LEADS' => array (
				'width' => '32%',
				'label' => 'LBL_RELATED_NAME_LEADS',
				'default' => true,
				'module' => 'Leads',
				'id' => 'RELATED_ID',
				'link' => true,
				'related_fields' => array (
						0 => 'related_id'
				)
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 21/mar/2014
		// *************************************************

		'RELATED_NAME_CONTACTSPOTENTIALMEMBER' => array (
				'width' => '32%',
				'label' => 'LBL_RELATED_NAME_CONTACTSPOTENTIALMEMBER',
				'default' => true,
				'module' => 'osy_contactspotentialmember',
				'id' => 'RELATED_ID',
				'link' => true,
				'related_fields' => array (
						0 => 'related_id'
				)
		),

		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'PROSPECT_LIST_NAME' => array (
				'type' => 'relate',
				'link' => true,
				'label' => 'LBL_PROSPECT_LIST_NAME',
				'id' => 'PROSPECT_LIST_ID',
				'width' => '10%',
				'default' => true
		),
		'COST' => array (
				'width' => '32%',
				'label' => 'LBL_COST',
				'default' => true
		),
		'PAYMENT_STATUS' => array (
				'width' => '9%',
				'label' => 'LBL_PAYMENT_STATUS',
				'default' => true
		)
);
?>
