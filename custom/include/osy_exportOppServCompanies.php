<?php
// Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
ini_set ( 'zlib.output_compression', 'Off' );

ob_start ();
require_once ('include/export_utils.php');

global $sugar_config;
global $locale;
global $current_user;
global $db;

$aParams = array_map('html_entity_decode', $_REQUEST);

$aFieldsBean1 = json_decode(html_entity_decode($_REQUEST['fieldsGrid1Selected'])); //Members
$aFieldsBean2 = json_decode(html_entity_decode($_REQUEST['fieldsGrid2Selected']));	//Subscription Fees o Services for ind. companies

$sModuleName = strtolower($aParams['module']);

$sSelect = "SELECT";
$sFrom = " FROM ".$sModuleName." o ";
$sWhere = " WHERE o.deleted = 0";

$sSelectBean2 = '';
$sSelectBean1 = '';
$sJoinBean1 = '';

$sNameModuleAccounts = '';

if(isset($aFieldsBean2) && !empty($aFieldsBean2)){
	//controllo campi custom (per tabella cstm)
	$oBeanModule = BeanFactory::getBean($aParams['module']);
	foreach ($aFieldsBean2 as $key => $value) {
		if($oBeanModule->field_defs[$value]['source'] === 'custom_fields'){
			$aFieldsBean2[$key] = " oc.".$value;
		}
		else{
			$aFieldsBean2[$key] = " o.".$value;
		}
	}
	$sSelect .= implode(', ', $aFieldsBean2);
}
else{
	$sSelect .= ' o.*';
}

$sFrom .= " INNER JOIN ".$sModuleName."_cstm oc ON o.id = oc.id_c ";

if(isset($aFieldsBean1) && !empty($aFieldsBean1)){
	$sNameModuleAccounts = 'Accounts';
	$sAccModuleName = strtolower($sNameModuleAccounts);

	$oBeanModule = BeanFactory::getBean($sNameModuleAccounts);
	$aFieldsCustom = array();
	foreach ($aFieldsBean1 as $key => $value) {
		if($oBeanModule->field_defs[$value]['source'] === 'custom_fields'){
			$aFieldsCustom[$key] = $value;
			unset($aFieldsBean1[$key]);
		}
	}

	foreach ( $aFieldsBean1 as $sField ) {
		$sSelectBean1 .= ' a.'.$sField.' '.$sNameModuleAccounts.'______'.$sField.', ';
	}
	foreach ( $aFieldsCustom as $sField ) {
		$sSelectBean1 .= ' ac.'.$sField.' '.$sNameModuleAccounts.'______'.$sField.', ';
	}
	$sSelectBean1 = substr($sSelectBean1, 0, -2);


	if($sModuleName == 'opportunities'){
		$sJoinBean1 = " INNER JOIN  accounts_opportunities ao ON ao.opportunity_id = o.id AND ao.deleted = 0
						INNER JOIN accounts a ON a.id = ao.account_id AND a.deleted = 0 ";
	}
	else{
		$sJoinBean1 = " INNER JOIN accounts a ON a.id = o.account_id AND a.deleted = 0 ";
	}

	$sJoinBean1 .= " INNER JOIN ".$sAccModuleName."_cstm ac ON a.id = ac.id_c ";

	if($sSelectBean2 == ''){
		$sSelect = $sSelect . ','. $sSelectBean1;
	}
	else{
		$sSelect = $sSelectBean2 . ','. $sSelectBean1;
	}
}

if(!empty($_REQUEST['uid'])){
	$sWhere .= " AND o.id IN ('" . str_replace(',','\',\'', $_REQUEST['uid']) . "')";
}


$sQuery = $sSelect . $sFrom . $sJoinBean1 . $sWhere;


require_once ('custom/include/osy_export.php');

// di default si cercherebbero le lables solo per il modulo di cui stiamo facendo
// l'export. Inserire in questo array quei campi, che appartengono all'export,
// ma che fanno riferimento ad un altro modulo. In questo modo si userà la label di tale modulo
$aCustomLabels = array(
	// la chiave di ogni sottoarray è il nome del campo indicato nella clausola select
	// della query contenuta nella variabile $query
	'account_billing_address_street' => array(
		'module' => 'Accounts',
		'field' => 'billing_address_street',
	),
	'account_billing_address_postalcode' => array(
		'module' => 'Accounts',
		'field' => 'billing_address_postalcode',
	),
	'account_billing_address_city' => array(
		'module' => 'Accounts',
		'field' => 'billing_address_city',
	),
	'osy_service_name' => array(
		'module' => 'osy_service',
		'field' => 'name',
	),
	'osy_service_date_start' => array(
		'module' => 'osy_service',
		'field' => 'date_start',
	),
	'osy_service_date_end' => array(
		'module' => 'osy_service',
		'field' => 'date_end',
	),
	'potential_company_id_c' => array(
		'module' => 'Leads',
		'field' => 'potential_company_id_c',
	),
);

$content = osy_export($sQuery, array( $aParams['module'], 'Accounts' ), null, false, $aCustomLabels);

if($sModuleName == 'opportunities')
	$filename = "Subscription_Fees";
else
	$filename = "Services_for_individual_companies";

// /////////////////////////////////////////////////////////////////////////////
// // BUILD THE EXPORT FILE
ob_clean ();
header ( "Pragma: cache" );
header("Content-type: application/excel; charset=".$GLOBALS['locale']->getExportCharset());
header ( "Content-Disposition: attachment; filename={$filename}.xls" );
header ( "Content-transfer-encoding: binary" );
header ( "Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
header ( "Last-Modified: " . TimeDate::httpTime () );
header ( "Cache-Control: post-check=0, pre-check=0", false );
header ( "Content-Length: " . mb_strlen ( $GLOBALS ['locale']->translateCharset ( $content, 'UTF-8', $GLOBALS ['locale']->getExportCharset () ) ) );
print $GLOBALS ['locale']->translateCharset ( $content, 'UTF-8', $GLOBALS ['locale']->getExportCharset () );
sugar_cleanup ( true );
