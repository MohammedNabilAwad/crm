<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

$module_name = 'osy_contactspotentialmember';
$object_name = 'osy_contactspotentialmember';
$_module_name = 'osy_contactspotentialmember';
$popupMeta = array (
		'moduleMain' => $module_name,
		'varName' => $object_name,
		'orderBy' => $_module_name . '.first_name, ' . $_module_name . '.last_name',
		'create' => array (
				'formBase' => 'osy_contactspotentialmemberFormBase.php',
				'formBaseClass' => 'osy_contactspotentialmemberFormBase',
				'getFormBodyParams' => array (
						0 => '',
						1 => '',
						2 => 'osy_contactspotentialmemberSave'
				),
				'createButton' => 'LNK_NEW_RECORD'
		),
		'whereClauses' => array (
				'first_name' => $_module_name . '.first_name',
				'last_name' => $_module_name . '.last_name'
		),
		'searchInputs' => array (
				'first_name',
				'last_name'
		)
);
?>
