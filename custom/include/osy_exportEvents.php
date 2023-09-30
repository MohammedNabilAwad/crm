<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

ini_set('zlib.output_compression', 'Off');
ob_start();
global $sugar_config;
global $locale;
global $current_user;
global $db;
require_once('include/export_utils.php');
require_once('custom/include/osy_export.php');

$aModules = explode(',', $_POST['osy_target_module']);
$aIds = explode(',', $_POST['id']);
$bEntireLists = $_POST['entire_list'];
$aIdModules = array();
for ($i = 0; $i < count($aModules); $i++) {
    $aIdModules[$aModules[$i]][] = $aIds[$i];
}

$sSelectFromJoinAccounts = "SELECT 
e.name as name_for_export, 
a.id as id, 
a.name as nome_contatto, 
'Members' as module_type, 
'' as title,
'' as salutation,
a.billing_address_street AS billing_address_street,
	a.billing_address_city AS billing_address_city,
	a.billing_address_state AS billing_address_state,
	a.billing_address_postalcode AS billing_address_postalcode,
	a.billing_address_country AS billing_address_country,
'' AS lead_name,
'' AS account_name,
ea.email_address,
	a.industry as industry,
	'' as role_function,
	a.phone_fax as phone_fax,
	'' as phone_home,
	'' as phone_mobile,
a.phone_office as phone_work, 
fpe_a.invite_status, 
fpe_a.accept_status,
fpe_a.payment_status as osy_payment_status, 
fpe_a.cost as osy_cost
FROM fp_events_accounts fpe_a
INNER JOIN fp_events e ON e.id = fpe_a.fp_event_id AND e.id = '" . $_POST['event_id'] . "'
INNER JOIN accounts a ON a.id = fpe_a.account_id AND a.deleted = 0 AND fpe_a.deleted = 0
LEFT JOIN email_addr_bean_rel eabr ON eabr.bean_id = a.id AND eabr.deleted = 0 AND eabr.primary_address = 1
LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0";

$sSelectFromJoinContacts = "SELECT 
e.name as name_for_export,
c.id as id, 
CONCAT(IFNULL(c.salutation,''), IFNULL(c.first_name,''), ' ', IFNULL(c.last_name,'')) as nome_contatto, 
'Member Contacts' as module_type, 
c.title as title,
c.salutation as salutation,
c.primary_address_street as primary_address_street,
c.primary_address_city as primary_address_city,
c.primary_address_state as primary_address_state,
c.primary_address_postalcode as primary_address_postalcode,
c.primary_address_country as primary_address_country,
'' AS lead_name,
a.name as account_name,
ea.email_address,
'' as industry,
	c.role_function as role_function,
	c.phone_fax as phone_fax,
	c.phone_home as phone_home,
	c.phone_mobile as phone_mobile,
c.phone_work as phone_work, 
fpe_c.invite_status, 
fpe_c.accept_status,
fpe_c.payment_status as osy_payment_status, 
fpe_c.cost as osy_cost
FROM fp_events_contacts_c fpe_c
INNER JOIN fp_events e ON e.id = fpe_c.fp_events_contactsfp_events_ida AND e.id = '" . $_POST['event_id'] . "'
INNER JOIN contacts c ON c.id = fpe_c.fp_events_contactscontacts_idb AND c.deleted = 0 AND fpe_c.deleted = 0
  LEFT JOIN accounts_contacts ac ON c.id = ac.contact_id AND ac.deleted = 0
  LEFT JOIN accounts a ON a.id = ac.account_id AND a.deleted = 0 AND ac.deleted = 0
LEFT JOIN email_addr_bean_rel eabr ON eabr.bean_id = c.id AND eabr.deleted = 0 AND eabr.primary_address = 1
LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0";

$sSelectFromJoinLeads = "SELECT 
e.name as name_for_export, 
l.id as id, 
CONCAT(IFNULL(l.salutation,''), IFNULL(l.first_name,''), ' ', IFNULL(l.last_name,'')) as nome_contatto,
'Potential Members' as module_type,
l.title as title,
l.salutation as salutation,
l.primary_address_street as primary_address_street,
l.primary_address_city as primary_address_city,
l.primary_address_state as primary_address_state,
l.primary_address_postalcode as primary_address_postalcode,
l.primary_address_country as primary_address_country,
'' AS lead_name,
l.account_name AS account_name,
ea.email_address,
'' as industry,
	'' as role_function,
	l.phone_fax as phone_fax,
	l.phone_home as phone_home,
	l.phone_mobile as phone_mobile,
l.phone_work as phone_work, 
fpe_l.invite_status, 
fpe_l.accept_status,
fpe_l.payment_status as osy_payment_status, 
fpe_l.cost as osy_cost
FROM fp_events_leads_1_c fpe_l
INNER JOIN fp_events e ON e.id = fpe_l.fp_events_leads_1fp_events_ida AND e.id = '" . $_POST['event_id'] . "'
INNER JOIN leads l ON l.id = fpe_l.fp_events_leads_1leads_idb AND l.deleted = 0 AND fpe_l.deleted = 0
LEFT JOIN email_addr_bean_rel eabr ON eabr.bean_id = l.id AND eabr.deleted = 0 AND eabr.primary_address = 1
LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0";

$sSelectFromJoinPotentialMemberContacts = "SELECT 
e.name as name_for_export, 
cpm.id as id, 
CONCAT(IFNULL(cpm.salutation,''), IFNULL(cpm.first_name,''), ' ', IFNULL(cpm.last_name,'')) as nome_contatto,
'Potential Member Contacts' as module_type, 
cpm.title as title,
cpm.salutation as salutation,
cpm.primary_address_street as primary_address_street,
cpm.primary_address_city as primary_address_city,
cpm.primary_address_state as primary_address_state,
cpm.primary_address_postalcode as primary_address_postalcode,
cpm.primary_address_country as primary_address_country,
l.account_name AS lead_name,
'' AS account_name,
ea.email_address,
cpm.industry as industry,
	cpm.role_function as role_function,
	'' as phone_fax,
	cpm.phone_home as phone_home,
	cpm.phone_mobile as phone_mobile,
cpm.phone_work as phone_work, 
fpe_cpm.invite_status, 
fpe_cpm.accept_status,
fpe_cpm.payment_status as osy_payment_status, 
fpe_cpm.cost as osy_cost
FROM fp_events_contactspotentialmember fpe_cpm
INNER JOIN fp_events e ON e.id = fpe_cpm.fp_event_id AND e.id = '" . $_POST['event_id'] . "'
INNER JOIN osy_contactspotentialmember cpm ON cpm.id = fpe_cpm.osy_contactspotentialmember_id AND cpm.deleted = 0 AND fpe_cpm.deleted = 0
INNER JOIN leads l ON l.id = cpm.lead_id AND l.deleted = 0
LEFT JOIN email_addr_bean_rel eabr ON eabr.bean_id = cpm.id AND eabr.deleted = 0 AND eabr.primary_address = 1
LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0";

$sSelectFromJoinOtherContacts = "SELECT 
e.name as name_for_export, 
oc.id as id,
CONCAT(IFNULL(oc.salutation,''), IFNULL(oc.first_name,''), ' ', IFNULL(oc.last_name,'')) as nome_contatto, 
'Other Contacts' as module_type, 
oc.title as title,
oc.salutation as salutation,
oc.primary_address_street as primary_address_street,
oc.primary_address_city as primary_address_city,
oc.primary_address_state as primary_address_state,
oc.primary_address_postalcode as primary_address_postalcode,
oc.primary_address_country as primary_address_country,
'' AS lead_name,
'' AS account_name,
ea.email_address,
'' as industry,
	'' as role_function,
	'' as phone_fax,
	oc.phone_home as phone_home,
	oc.phone_mobile as phone_mobile,
oc.phone_work as phone_work, 
fpe_oc.invite_status, 
fpe_oc.accept_status,
fpe_oc.payment_status as osy_payment_status, 
fpe_oc.cost as osy_cost
FROM fp_events_osy_other_contacts fpe_oc
INNER JOIN fp_events e ON e.id = fpe_oc.fp_event_id AND e.id = '" . $_POST['event_id'] . "'
INNER JOIN osy_other_contacts oc ON oc.id = fpe_oc.osy_other_contacts_id AND oc.deleted = 0 AND fpe_oc.deleted = 0
LEFT JOIN email_addr_bean_rel eabr ON eabr.bean_id = oc.id AND eabr.deleted = 0 AND eabr.primary_address = 1
LEFT JOIN email_addresses ea ON ea.id = eabr.email_address_id AND ea.deleted = 0";

$sQuery = '';
if (!$bEntireLists || $bEntireLists == '') {
    foreach ($aIdModules as $sKeyModule => $aIds_) {
        switch ($sKeyModule) {
            case 'Accounts':
                if ($sQuery != '') {
                    $sQuery .= ' UNION ALL ';
                }
                $sQuery .= $sSelectFromJoinAccounts . " WHERE fpe_a.account_id IN ('" . implode('\',\'', $aIds_) . "') AND fpe_a.accept_status = 'Accepted'";
                break;
            case 'Contacts':
                if ($sQuery != '') {
                    $sQuery .= ' UNION ALL ';
                }
                $sQuery .= $sSelectFromJoinContacts . " WHERE fpe_c.fp_events_contactscontacts_idb IN ('" . implode('\',\'', $aIds_) . "') AND fpe_c.accept_status = 'Accepted'";
                break;
            case 'Leads':
                if ($sQuery != '') {
                    $sQuery .= ' UNION ALL ';
                }
                $sQuery .= $sSelectFromJoinLeads . " WHERE fpe_l.fp_events_leads_1leads_idb IN ('" . implode('\',\'', $aIds_) . "') AND fpe_l.accept_status = 'Accepted'";
                break;
            case 'osy_contactspotentialmember':
                if ($sQuery != '') {
                    $sQuery .= ' UNION ALL ';
                }
                $sQuery .= $sSelectFromJoinPotentialMemberContacts . " WHERE fpe_cpm.osy_contactspotentialmember_id IN ('" . implode('\',\'', $aIds_) . "') AND fpe_cpm.accept_status = 'Accepted'";
                break;
            case 'osy_other_contacts':
                if ($sQuery != '') {
                    $sQuery .= ' UNION ALL ';
                }
                $sQuery .= $sSelectFromJoinOtherContacts . " WHERE fpe_oc.osy_other_contacts_id IN ('" . implode('\',\'', $aIds_) . "') AND fpe_oc.accept_status = 'Accepted'";
                break;
        }
    }
} else {
    $sQuery = $sSelectFromJoinAccounts . " WHERE fpe_a.accept_status = 'Accepted'" .
        " UNION ALL " . $sSelectFromJoinContacts . " WHERE fpe_c.accept_status = 'Accepted'" .
        " UNION ALL " . $sSelectFromJoinLeads . " WHERE fpe_l.accept_status = 'Accepted'" .
        " UNION ALL " . $sSelectFromJoinPotentialMemberContacts . " WHERE fpe_cpm.accept_status = 'Accepted'" .
        " UNION ALL " . $sSelectFromJoinOtherContacts . " WHERE fpe_oc.accept_status = 'Accepted'";
}

$aCustomLabels = array(
    // la chiave di ogni sottoarray è il nome del campo indicato nella clausola select
    // della query contenuta nella variabile $sQuery
    'name_for_export' => array(
        'module' => 'FP_events',
        'field' => 'name_for_export',
    ),
    'nome_contatto' => array(
        'module' => 'FP_events',
        'field' => 'contact_name_export',
    ),
    'module_type' => array(
        'module' => 'FP_events',
        'field' => 'module_type_export',
    ),
    'title' => array(
        'module' => 'Contacts',
        'field' => 'title',
    ),
    'salutation' => array(
        'module' => 'Contacts',
        'field' => 'salutation',
    ),
    'lead_name' => array(
        'module' => 'osy_contactspotentialmember',
        'field' => 'lead_name',
    ),
    'account_name' => array(
        'module' => 'Leads',
        'field' => 'account_name',
    ),
    'email_address' => array(
        'module' => 'Accounts',
        'field' => 'email1',
    ),
    'industry' => array(
        'module' => 'Accounts',
        'field' => 'industry',
    ),
    'role_function' => array(
        'module' => 'Contacts',
        'field' => 'role_function',
    ),
    'phone_fax' => array(
        'module' => 'Contacts',
        'field' => 'phone_fax',
    ),
    'phone_home' => array(
        'module' => 'Contacts',
        'field' => 'phone_home',
    ),
    'phone_mobile' => array(
        'module' => 'Contacts',
        'field' => 'phone_mobile',
    ),
    'phone_work' => array(
        'module' => 'Contacts',
        'field' => 'phone_work',
    ),
    'invite_status' => array(
        'module' => 'Accounts',
        'field' => 'event_status_name',
    ),
    'accept_status' => array(
        'module' => 'Accounts',
        'field' => 'event_accept_status',
    ),
    'osy_payment_status' => array(
        'module' => 'Accounts',
        'field' => 'osy_payment_status',
    ),
    'osy_cost' => array(
        'module' => 'Accounts',
        'field' => 'osy_cost',
    ),
);

$content = osy_export($sQuery, array('Accounts'), null, false, $aCustomLabels);

$q = "SELECT name FROM fp_events WHERE id = '" . $_POST['event_id'] . "'";
$r = $db->query($q);
$v = $db->fetchByAssoc($r);
$filename = 'Event - ' . $v['name'];

// /////////////////////////////////////////////////////////////////////////////
// // BUILD THE EXPORT FILE
ob_clean();
header("Pragma: cache");
header("Content-type: application/excel; charset=" . $GLOBALS['locale']->getExportCharset());
header("Content-Disposition: attachment; filename={$filename}.xls");
header("Content-transfer-encoding: binary");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header("Last-Modified: " . TimeDate::httpTime());
header("Cache-Control: post-check=0, pre-check=0", false);
header("Content-Length: " . mb_strlen($GLOBALS ['locale']->translateCharset($content, 'UTF-8', $GLOBALS ['locale']->getExportCharset())));
print $GLOBALS ['locale']->translateCharset($content, 'UTF-8', $GLOBALS ['locale']->getExportCharset());
sugar_cleanup(true);