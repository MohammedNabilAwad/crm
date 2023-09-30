<?php
$module_name = 'osy_gestione_pagamento';
$searchdefs [$module_name] = array (
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
						// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
						// *************************************************

						'prospect_list_name' => array (
								'type' => 'relate',
								'link' => true,
								'label' => 'LBL_PROSPECT_LIST_NAME',
								'id' => 'PROSPECT_LIST_ID',
								'width' => '10%',
								'default' => true,
								'name' => 'prospect_list_name'
						),
				),
		)
);
?>
