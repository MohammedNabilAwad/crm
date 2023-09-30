<?php
if (isset ( $_POST ['action'] ) && ! empty ( $_POST ['action'] ) && $_POST ['action'] == 'exportCSV')
	exportCSV ();
function exportCSV() {
	// Bug 30094, If zlib is enabled, it can break the calls to header() due to output buffering. This will only work php5.2+
	ini_set ( 'zlib.output_compression', 'Off' );

	$oJSON = json_decode ( html_entity_decode ( $_POST ['queryList'] ), true );

	ob_start ();
	require_once ('include/export_utils.php');
	global $sugar_config;
	global $locale;
	global $current_user;
	global $db;

	$content = '<table>';
	$aCustomLabels = array(
		'LBL_ID',
		'LBL_SUBJECT',
		'LBL_DATE_ENTERED',
		'LBL_DESCRIPTION',
		'LBL_STATUS',
		'LBL_COST',
		'LBL_ASSIGNED_TO_NAME'
	);
	foreach ( $oJSON as $key => $query ){
		$aLabel = array();
		foreach ($aCustomLabels as $sLabel){
			$aLabel[] = translate($sLabel,getBeanName($key));
		}
		$content .= osy_export ( str_replace ( "&#039;", "'", $query ), $key, $aLabel);
	}
	$content.='</table>';

	$filename = "list_activities";

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
	return true;
}
function getBeanName($type) {
	switch ($type) {
		default :
			return null;
		case 'calls' :
			return 'Calls';
		case 'meetings' :
			return 'Meetings';
		case 'tasks' :
			return 'Tasks';
		case 'notes' :
			return 'Notes';
		case 'osy_services_companies' :
			return 'osy_services_companies';
		case 'fp_events' :
			return 'FP_events';
		case 'campaigns' :
			return 'Campaigns';
	}
}
function getModuleName($type) {
	switch ($type) {
		default :
			return null;
		case 'calls' :
			return 'Calls';
		case 'meetings' :
			return 'Meetings';
		case 'tasks' :
			return 'Tasks';
		case 'notes' :
			return 'Notes';
		case 'osy_services_companies' :
			return 'Services for Individual Companies';
		case 'fp_events' :
			return 'Events';
		case 'campaigns' :
			return 'Collective Email System';
	}
}

function osy_export($query, $type, $aCustomLabels = array()) {
	global $beanList;
	global $beanFiles;
	global $current_user;
	global $app_strings;
	global $app_list_strings;
	global $timedate;
	global $mod_strings;

	$focus = 0;
	$content = '';


	$bean = $beanList [getBeanName ( $type )];

	require_once ($beanFiles [$bean]);
	$focus = new $bean ();
	$searchFields = array ();
	$db = DBManagerFactory::getInstance ();

	$order_by = "";

	$result = $db->query ( $query, true, $app_strings ['ERR_EXPORT_TYPE'] . $type . ": <BR>." . $query );
	if ($result != false && $result->num_rows > 0) {
		$content = getModuleName($type) . "\r\n";
		$fields_array = $db->getFieldsArray ( $result, true );
		$filter_fields = array ();
		foreach ( $fields_array as $key => $value ) {
			// getting content values depending on their types
			$sFieldLabel = $mod_strings [$focus->field_name_map [$fields_array [$key]] ['vname']];
			$fields_array [$key] = preg_replace ( '/:$/', '', html_entity_decode ( translate ( $focus->field_name_map [$fields_array [$key]] ['vname'], $type ), ENT_QUOTES, "UTF-8" ) );
		}

		// setup the "header" line with proper delimiters
		//$header = implode ( "\"" . getDelimiter () . "\"", array_values ( $fields_array ) );

		$header = '<tr>';
		if(isset($aCustomLabels) && !empty($aCustomLabels)){
			$fields_array = $aCustomLabels;
		}
		foreach ($fields_array as $sSingleField){
			$header.='<th>'.$sSingleField.'</th>';
		}
		$header .= '</tr>';

// 		$header = "\"" . $header;
// 		$header .= "\"\r\n";
		$content .= $header;
		$pre_id = '';
		while ( $val = $db->fetchByAssoc ( $result ) ) {
			$new_arr = array ();
			$vals = array_values ( $val );

			$line = '<tr>';

			foreach ( $vals as $key => $value ) {
				// getting content values depending on their types
				$fieldType = $focus->field_name_map [$fields_array [$key]] ['type'];

				if (isset ( $fieldType )) {
					switch ($fieldType) {
						// if our value is a cucb24618d-9fe9-9644-0818-4f96a3d9391crrency field, then apply the users locale
						case 'currency' :
							require_once ('modules/Currencies/Currency.php');
							$value = currency_format_number ( $value, array (
									'currency_symbol' => false
							) );
							break;

						// if our value is a datetime field, then apply the users locale
						case 'datetime' :
						case 'datetimecombo' :
							$value = $timedate->to_display_date_time ( $value );
							$value = preg_replace ( '/([pm|PM|am|AM]+)/', ' \1', $value );
							break;

						// kbrill Bug #16296
						case 'date' :
							$value = $timedate->to_display_date ( $value, false );
							break;

						// Bug 32463 - Properly have multienum field translated into something useful for the client
						case 'multienum' :
							$value = str_replace ( "^", "", $value );
							if (isset ( $focus->field_name_map [$fields_array [$key]] ['options'] ) && isset ( $app_list_strings [$focus->field_name_map [$fields_array [$key]] ['options']] )) {
								$valueArray = explode ( ",", $value );
								foreach ( $valueArray as $multikey => $multivalue ) {
									if (isset ( $app_list_strings [$focus->field_name_map [$fields_array [$key]] ['options']] [$multivalue] )) {
										$valueArray [$multikey] = $app_list_strings [$focus->field_name_map [$fields_array [$key]] ['options']] [$multivalue];
									}
								}
								$value = implode ( ",", $valueArray );
							}
							break;
						case 'enum':
							if (isset($focus->field_name_map[ $fields_array[$key] ]['options'])
								&& isset($app_list_strings[ $focus->field_name_map[ $fields_array[$key] ]['options'] ])
							) {
								$value = $app_list_strings[$focus->field_name_map[ $fields_array[$key] ]['options'] ][$value];
							}
							break;
					}
				}

				if (isset ( $focus->field_name_map [$fields_array [$key]] ['custom_type'] ) && $focus->field_name_map [$fields_array [$key]] ['custom_type'] == 'teamset') {
					require_once ('modules/Teams/TeamSetManager.php');
					$value = TeamSetManager::getCommaDelimitedTeams ( $val ['team_set_id'], ! empty ( $val ['team_id'] ) ? $val ['team_id'] : '' );
				}

				if($fields_array [$key] == 'Status:' && $type == 'fp_events'){
					global $app_list_strings;
					$value = $app_list_strings['osy_payment_status_list'][$value];
				}
				$line .= '<td>' . preg_replace("/\"/","\"\"", $value) . '</td>';
			}
			$line .= '</tr>';
			$content .= $line;
		}
	}

	return $content;
}

?>