<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

//Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
ini_set('zlib.output_compression', 'Off');

ob_start();
require_once('include/export_utils.php');

global $sugar_config;
global $locale;
global $current_user;
global $app_list_strings;

$aParams = array_map('html_entity_decode', $_REQUEST);

$the_module = clean_string($_REQUEST['module']);

if($sugar_config['disable_export'] 	|| (!empty($sugar_config['admin_export_only']) && !(is_admin($current_user) || (ACLController::moduleSupportsACL($the_module)  && ACLAction::getUserAccessLevel($current_user->id,$the_module, 'access') == ACL_ALLOW_ENABLED &&
		(ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN ||
				ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV))))){
	die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
}

$sQuery = "SELECT jt0.name related_name_accounts , jt0.billing_address_street as account_billing_address_street,
		jt0.billing_address_postalcode as account_billing_address_postalcode, jt0.billing_address_city as account_billing_address_city,
LTRIM(RTRIM(CONCAT(IFNULL(jt1.first_name,''),' ',IFNULL(jt1.last_name,'')))) related_name_contacts ,
jt2.account_name related_name_leads ,
lc.potential_company_id_c potential_company_id_c ,
LTRIM(RTRIM(CONCAT(IFNULL(jt3.first_name,''),' ',IFNULL(jt3.last_name,'')))) related_name_contactspotentialmember ,
jt4.name prospect_list_name, prospect_lists_prospects.cost ,
prospect_lists_prospects.payment_status,
jt5.name as osy_service_name,
jt5.date_start as osy_service_date_start,
jt5.date_end as osy_service_date_end
FROM prospect_lists_prospects
LEFT JOIN accounts jt0 ON prospect_lists_prospects.related_id = jt0.id OR prospect_lists_prospects.account_id = jt0.id AND jt0.deleted=0
LEFT JOIN contacts jt1 ON prospect_lists_prospects.related_id = jt1.id AND jt1.deleted=0
LEFT JOIN osy_contactspotentialmember jt3 ON prospect_lists_prospects.related_id = jt3.id AND jt3.deleted=0
LEFT JOIN leads jt2 ON prospect_lists_prospects.related_id = jt2.id OR jt2.id = jt3.lead_id  AND jt2.deleted=0
LEFT JOIN leads_cstm lc ON lc.id_c = jt2.id
LEFT JOIN prospect_lists jt4 ON prospect_lists_prospects.prospect_list_id = jt4.id AND jt4.deleted=0
LEFT JOIN osy_service jt5 ON  jt4.osy_service_id = jt5.id
where ((jt4.name like '".$GLOBALS['db']->quote( $aParams['filterListName'] )."')) AND prospect_lists_prospects.deleted=0 ";



if(!isset($aParams['current_post']) && isset($aParams['uid'])){
	// allora l'utente ha selezionato solo alcuni record della listview: devo esportare solo quelli:
	$aRecords = explode(',', $aParams['uid']);
	$sRecords = "'" . implode("','", $aRecords) . "'";
	$sQuery .= " AND prospect_lists_prospects.id in ( $sRecords ) ";
}

$sQuery .= ' ORDER BY related_name_accounts ASC';
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
$content = osy_export($sQuery, 'osy_gestione_pagamento', null, false, $aCustomLabels);

$filename = 'Group_Activities_Fees';

//strip away any blank spaces
$filename = str_replace(' ','',$filename);


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
