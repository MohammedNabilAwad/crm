<?php
if (! defined('sugarEntry') || ! sugarEntry)
	die('Not A Valid Entry Point');
	
	//Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
ini_set('zlib.output_compression', 'Off');

ob_start();
require_once ('include/export_utils.php');

global $sugar_config;
global $locale;
global $current_user;
global $app_list_strings;

$aParams = array_map('html_entity_decode', $_REQUEST);

$the_module = clean_string($_REQUEST['module']);

if ($sugar_config['disable_export'] || (! empty($sugar_config['admin_export_only']) && ! (is_admin($current_user) || (ACLController::moduleSupportsACL($the_module) && ACLAction::getUserAccessLevel($current_user->id, $the_module, 'access') == ACL_ALLOW_ENABLED && (ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN || ACLAction::getUserAccessLevel($current_user->id, $the_module, 'admin') == ACL_ALLOW_ADMIN_DEV))))) {
	die($GLOBALS['app_strings']['ERR_EXPORT_DISABLED']);
}

$content = osy_exportLists('ProspectLists', $aParams['record_id'], '1');

$filename = 'Lists';

//strip away any blank spaces
$filename = str_replace(' ', '', $filename);

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
header("Content-Length: " . mb_strlen($GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset())));
print $GLOBALS['locale']->translateCharset($content, 'UTF-8', $GLOBALS['locale']->getExportCharset());
sugar_cleanup(true);

function osy_create_export_members_query($record_id){
	$osy_contactspotentialmember_query = "SELECT ocpm.id AS id, 'Potential Member Contacts' AS related_type, 
	'' AS \"name\", ocpm.first_name AS first_name, 
	ocpm.last_name AS last_name, 
	/*'' AS organization,*/
	ocpm.title AS title, ocpm.salutation AS salutation,
	ocpm.primary_address_street AS primary_address_street,
	ocpm.primary_address_city AS primary_address_city, ocpm.primary_address_state AS primary_address_state, 
	ocpm.primary_address_postalcode AS primary_address_postalcode, 
	ocpm.primary_address_country AS primary_address_country,
	/* '' AS billing_email_address,*/
	l.account_name AS lead_name, 
	'' AS account_name,
	ea.email_address AS primary_email_address,
	ear.primary_address AS primary_address,
	/*'' AS classification,*/
	'' AS industry,
	ocpm.role_function AS role_function,
	ocpm.phone_fax AS phone_fax, ocpm.phone_home AS phone_home, ocpm.phone_mobile AS phone_mobile, ocpm.phone_work AS phone_work
	FROM prospect_lists_prospects plp
	LEFT JOIN prospectlist_osy_contactspotentialmember pcp ON pcp.prospectlist_id = plp.prospect_list_id AND pcp.deleted = 0
	LEFT JOIN osy_contactspotentialmember ocpm ON ocpm.id=pcp.contactpotentialmember_id AND ocpm.deleted=0
	LEFT JOIN leads l ON l.id = ocpm.lead_id AND l.deleted=0
	LEFT JOIN email_addr_bean_rel ear ON  ear.bean_id=ocpm.id AND ear.deleted=0
	LEFT JOIN email_addresses ea ON ear.email_address_id=ea.id
	WHERE plp.prospect_list_id = $record_id AND plp.deleted=0 AND ea.deleted = 0
	AND (ear.deleted=0 OR ear.deleted IS NULL)";
	
	/*
	 * osy_other_contacts:
first_name
last_name
organization ??? 	(ooc.organization AS organization)
Primary Address Street
Primary Address City
Primary Address State
Primary Address Postal Code
Primary Address Country
classification ??? (ooc.classification AS classification)
email
	 */
	
	$osy_other_contacts_query = "SELECT ooc.id AS id, 'Other Contacts' AS related_type, 
	'' AS \"name\", 
	ooc.first_name AS first_name, 
	ooc.last_name AS last_name,
	/* ooc.organization AS organization, */
	ooc.title AS title, ooc.salutation AS salutation,
	ooc.primary_address_street AS primary_address_street,
	ooc.primary_address_city AS primary_address_city, 
	ooc.primary_address_state AS primary_address_state, 
	ooc.primary_address_postalcode AS primary_address_postalcode,
	ooc.primary_address_country AS primary_address_country,
	/* '' AS billing_email_address,*/
	'' AS lead_name,
	'' AS account_name,
	ea.email_address AS primary_email_address,
	ear.primary_address AS primary_address,
	/* ooc.classification AS classification, */
	'' AS industry,
	'' AS role_function,
	'' AS phone_fax, 
	'' AS phone_home, 
	'' AS phone_mobile, 
	'' AS phone_work
	FROM prospect_lists_prospects plp
	LEFT JOIN prospectlist_osy_other_contacts pooc ON pooc.prospectlist_id = plp.prospect_list_id AND pooc.deleted = 0
	LEFT JOIN osy_other_contacts ooc ON ooc.id=pooc.othercontact_id AND ooc.deleted=0
	LEFT JOIN email_addr_bean_rel ear ON  ear.bean_id=ooc.id AND ear.deleted=0
	LEFT JOIN email_addresses ea ON ear.email_address_id=ea.id
	WHERE plp.prospect_list_id = $record_id AND plp.deleted=0
	AND ea.deleted = 0
	AND (ear.deleted=0 OR ear.deleted IS NULL)";
	
	//LEAD:
	//************************************************************
	// 	Account name
	// 	Primary Address Street
	// 	Primary Address City
	// 	Primary Address State
	// 	Primary Address Postal Code
	// 	Primary Address Country
	// 	email
	// 	industry
	// 	phone_fax
	// 	phone_home
	// 	phone_mobile
	// 	phone_work
	//************************************************************
	

	$leads_query = "SELECT l.id AS id, 'Leads' AS related_type, '' AS \"name\", '' AS first_name, 
	'' AS last_name, 
	/*'' AS organization,*/
	'' AS title, '' AS salutation,
	l.primary_address_street AS primary_address_street,l.primary_address_city AS primary_address_city, 
	l.primary_address_state AS primary_address_state, l.primary_address_postalcode AS primary_address_postalcode, 
	l.primary_address_country AS primary_address_country,
	/* '' AS billing_email_address,*/
	'' AS lead_name,
	l.account_name AS account_name,
	ea.email_address AS primary_email_address,
	ear.primary_address AS primary_address,
	/*'' AS classification,*/
	'' AS industry,
	'' AS role_function,
	l.phone_fax AS phone_fax, l.phone_home AS phone_home, l.phone_mobile AS phone_mobile, l.phone_work AS phone_work
	FROM prospect_lists_prospects plp
	INNER JOIN leads l ON plp.related_id=l.id
	LEFT JOIN email_addr_bean_rel ear ON  ear.bean_id=l.id AND ear.deleted=0
	LEFT JOIN email_addresses ea ON ear.email_address_id=ea.id
	WHERE plp.prospect_list_id = $record_id AND plp.deleted=0
	AND l.deleted=0
	AND (ear.deleted=0 OR ear.deleted IS NULL)";
	
	$contacts_query = "SELECT c.id AS id, 'Contacts' AS related_type, '' AS \"name\", c.first_name AS first_name, 
	c.last_name AS last_name,
	/*'' AS organization,*/
	c.title AS title, c.salutation AS salutation,
	c.primary_address_street AS primary_address_street,c.primary_address_city AS primary_address_city, 
	c.primary_address_state AS primary_address_state,  
	c.primary_address_postalcode AS primary_address_postalcode, 
	c.primary_address_country AS primary_address_country,
	/* '' AS billing_email_address,*/
	'' AS lead_name,
	a.name AS account_name,
	ea.email_address AS email_address,
	ear.primary_address AS primary_address,
	/*'' AS classification,*/
	'' AS industry,
	c.role_function AS role_function,
	c.phone_fax AS phone_fax, c.phone_home AS phone_home, c.phone_mobile AS phone_mobile, c.phone_work AS phone_work
	FROM prospect_lists_prospects plp
	INNER JOIN contacts c ON plp.related_id=c.id LEFT JOIN accounts_contacts ac ON ac.contact_id=c.id LEFT JOIN accounts a ON ac.account_id=a.id
	LEFT JOIN email_addr_bean_rel ear ON ear.bean_id=c.id AND ear.deleted=0
	LEFT JOIN email_addresses ea ON ear.email_address_id=ea.id
	WHERE plp.prospect_list_id = $record_id AND plp.deleted=0
	AND c.deleted=0
	AND (ear.deleted=0 OR ear.deleted IS NULL)";
	
	$accounts_query = "SELECT a.id AS id, 'Accounts' AS related_type, a.name AS \"name\", '' AS first_name, 
	'' AS last_name,
	/*'' AS organization,*/
	'' AS title, '' AS salutation,
	a.billing_address_street AS primary_address_street,a.billing_address_city AS primary_address_city, 
	a.billing_address_state AS primary_address_state, a.billing_address_postalcode AS primary_address_postalcode, 
	a.billing_address_country AS primary_address_country,
	/* a.billing_email_address AS billing_email_address,*/
	'' AS lead_name,
	'' AS account_name, ea.email_address AS email_address, 
	ear.primary_address AS primary_address,
	/* '' AS classification,*/
	a.industry AS industry,
	'' AS role_function,
	a.phone_fax as phone_fax, 
	'' AS phone_home, '' AS phone_mobile, a.phone_office AS phone_office
	FROM prospect_lists_prospects plp
	INNER JOIN accounts a ON plp.related_id=a.id
	LEFT JOIN email_addr_bean_rel ear ON  ear.bean_id=a.id AND ear.deleted=0
	LEFT JOIN email_addresses ea ON ear.email_address_id=ea.id
	WHERE plp.prospect_list_id = $record_id AND plp.deleted=0
	AND a.deleted=0
	AND (ear.deleted=0 OR ear.deleted IS NULL)";
	
	$order_by = "ORDER BY related_type ASC";
	$query = "$leads_query UNION ALL $contacts_query UNION ALL $accounts_query UNION $osy_contactspotentialmember_query UNION $osy_other_contacts_query $order_by";
	return $query;
}

function osy_exportLists($type, $records = null, $members = false){
	global $beanList;
	global $beanFiles;
	global $current_user;
	global $app_strings;
	global $app_list_strings;
	global $timedate;
	global $mod_strings;
	global $current_language;
	$sampleRecordNum = 5;
	
	//Array of fields that should not be exported, and are only used for logic
	$remove_from_members = array(
		"ea_deleted",
		"ear_deleted",
		"primary_address"
	);
	$focus = 0;
	$content = '';
	
	$bean = $beanList[$type];
	require_once ($beanFiles[$bean]);
	$focus = new $bean();
	$searchFields = array();
	$db = DBManagerFactory::getInstance();
	
	if ($records) {
		$records = explode(',', $records);
		$records = "'" . implode("','", $records) . "'";
		$where = "{$focus->table_name}.id in ($records)";
	} elseif (isset($_REQUEST['all'])) {
		$where = '';
	} else {
		if (! empty($_REQUEST['current_post'])) {
			$ret_array = generateSearchWhere($type, $_REQUEST['current_post']);
			
			$where = $ret_array['where'];
			$searchFields = $ret_array['searchFields'];
		} else {
			$where = '';
		}
	}
	$order_by = "";
	if ($focus->bean_implements('ACL')) {
		if (! ACLController::checkAccess($focus->module_dir, 'export', true)) {
			ACLController::displayNoAccess();
			sugar_die('');
		}
		if (ACLController::requireOwner($focus->module_dir, 'export')) {
			if (! empty($where)) {
				$where .= ' AND ';
			}
			$where .= $focus->getOwnerWhere($current_user->id);
		}
	
	}
	
	$query = osy_create_export_members_query($records);
	
	$result = '';
	
	$result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'] . $type . ": <BR>." . $query);
	
	$fields_array = $db->getFieldsArray($result, true);
	
	//set up the order on the header row
	$fields_array = get_field_order_mapping($focus->module_dir, $fields_array);
	
	//set up labels to be used for the header row
	$field_labels = array();
	foreach($fields_array as $key => $dbname) {
		//Remove fields that are only used for logic
		if ($members && (in_array($dbname, $remove_from_members)))
			continue;
			
			//default to the db name of label does not exist
		$field_labels[$key] = translateForExport($dbname, $focus);
	}
	
	$content = '<table>';
	
	// setup the "header" line with proper delimiters
	$header = '<tr>';
	foreach(array_values($field_labels) as $sSingleFieldLabel) {
		$header .= '<th>' . $sSingleFieldLabel . '</th>';
	}
	$header .= '</tr>';
	$content .= $header;
	
	$pre_id = '';
	
	// ora andremo a scorrere tutti i record tirati su dal db.
	// nello stesso ciclo itererò su record appartenenti a diversi moduli.
	// Per questo mi salvo in un array il vardef di ognuno di questi moduli.
	// ogni record sa a quale modulo appartiene grazie al campo related_type il cui 
	// valore viene usato come chiave dell'array $aVardefs per ottenerne il relativo
	// vardef.
	$oTempPotentialMemberContact = new osy_contactspotentialmember();
	$oTempOtherContact = new osy_other_contacts();
	$oTempLead = new Lead();
	$oTempContact = new Contact();
	$oTempAccount = new Account();
	$aVardefs = array(
		'osy_contactspotentialmember' => $oTempPotentialMemberContact->field_name_map,
		'osy_other_contacts' => $oTempOtherContact->field_name_map,
		'Leads' => $oTempLead->field_name_map,
		'Contacts' => $oTempContact->field_name_map,
		'Accounts' => $oTempAccount->field_name_map,
	);
	
	//process retrieved record
	while ($val = $db->fetchByAssoc($result, false)) {
		
		//order the values in the record array
		$val = get_field_order_mapping($focus->module_dir, $val);
		
		$new_arr = array();
		if ($members) {
			if ($pre_id == $val['id'])
				continue;
			if ($val['ea_deleted'] == 1 || $val['ear_deleted'] == 1) {
				$val['primary_email_address'] = '';
			}
			unset($val['ea_deleted']);
			unset($val['ear_deleted']);
			unset($val['primary_address']);
		}
		$pre_id = $val['id'];
		
		$line = '<tr>';
		
		foreach($val as $key => $value) {
			//getting content values depending on their types
			$fieldNameMapKey = $fields_array[$key];
				
			if(!empty($aVardefs[ $val['related_type'] ][$fieldNameMapKey]['type'])){
				
				$fieldType = $aVardefs[ $val['related_type'] ][$key]['type'];
				$aFieldVardef = $aVardefs[ $val['related_type'] ][$fieldNameMapKey];
				
				switch ($fieldType) {
					//if our value is a currency field, then apply the users locale
					case 'currency' :
						require_once ('modules/Currencies/Currency.php');
						$value = currency_format_number($value);
						break;
					
					//if our value is a datetime field, then apply the users locale
					case 'datetime' :
					case 'datetimecombo' :
						$value = $timedate->to_display_date_time($db->fromConvert($value, 'datetime'));
						$value = preg_replace('/([pm|PM|am|AM]+)/', ' \1', $value);
						break;
					
					//kbrill Bug #16296
					case 'date' :
						$value = $timedate->to_display_date($db->fromConvert($value, 'date'), false);
						break;
						
					case 'enum' :
						if (isset($aFieldVardef['options']) && isset($app_list_strings[$aFieldVardef['options']])) {
							$value = $app_list_strings[$aFieldVardef['options']][$value];
						}
						break;
					
					// Bug 32463 - Properly have multienum field translated into something useful for the client
					case 'multienum' :
						$value = str_replace("^", "", $value);
						if (isset($aFieldVardef['options']) && isset($app_list_strings[$aFieldVardef['options']])) {
							$valueArray = explode(",", $value);
							foreach($valueArray as $multikey => $multivalue) {
								if (isset($app_list_strings[$aFieldVardef['options']][$multivalue])) {
									$valueArray[$multikey] = $app_list_strings[$aFieldVardef['options']][$multivalue];
								}
							}
							$value = implode(",", $valueArray);
						}
						break;
				}
			}
			$line .= '<td>' . preg_replace("/\"/", "\"\"", $value) . '</td>';
			$a = '';
		}
		$line .= '</tr>';
		$content .= $line;
	}
	$content .= '</table>';
	return $content;

}
