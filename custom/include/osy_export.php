<?php

function osy_export($query, $mModules, $records = null, $members = false, $aCustomLabels = array()) {
	global $beanList;
	global $beanFiles;
	global $current_user;
	global $app_strings;
	global $app_list_strings;
	global $timedate;
	global $mod_strings;

	if( is_array($mModules) ) {
		$aModules = $mModules;
	}
	else {
		$aModules = array($mModules);
	}

	$content = '<body><table>';
	$where = '';
	$aBeans = array();

	foreach($aModules as $sModule) {

		$aBeans[$sModule] = BeanFactory::getBean($sModule);

		if($aBeans[$sModule]->bean_implements('ACL')){
			if(!ACLController::checkAccess($aBeans[$sModule]->module_dir, 'export', true)){
				ACLController::displayNoAccess();
				sugar_die('');
			}
			if(ACLController::requireOwner($aBeans[$sModule]->module_dir, 'export')){
				$where .= $aBeans[$sModule]->getOwnerWhere($current_user->id);
			}

		}
	}

	$searchFields = array();
	$db = DBManagerFactory::getInstance();

	if($records) {
		$records = explode(',', $records);
		$records = "'" . implode("','", $records) . "'";
		if(!empty($where)){
			$where .= ' AND ';
		}
		// filter ids only from 'main' module, eg. $aModules[0]
		$where = "{$aBeans[ $aModules[0] ]->table_name}.id in ($records)";
	} elseif ( isset( $_REQUEST['all'] ) ) {
		$where = '';
	} else {
		if( !empty( $_REQUEST['current_post'] ) ) {
			$ret_array = generateSearchWhere( $aModules[0], $_REQUEST['current_post'] );

			if(!empty($where)){
				$where .= ' AND ';
			}
			$where = $ret_array['where'];
			$searchFields = $ret_array['searchFields'];
		} else {
			$where = '';
		}
	}

	$result = $db->query($query, true, $app_strings['ERR_EXPORT_TYPE'].$aModules[0].": <BR>.".$query);
	$fields_array = $db->getFieldsArray($result);
	$filter_fields = array();

	$aFieldsToModuleIndex = array();

	$aFieldLabels = array();
	
	foreach ($fields_array as $key => $value)
	{
		// strip out module prefixes
		if( preg_match( '/^([A-Za-z0-9]+)_{6}(\w+)$/', $value, $aMatches ) ) {
			$sModuleKey = array_search( $aMatches[1], $aModules );

			$fields_array[$key] = $aMatches[2];
		}
		else {
			$sModuleKey = 0;
		}

		$aFieldsToModuleIndex[$key] = $sModuleKey === false ? 0 : $sModuleKey;

		if(isset($aMatches[1]) && isset($aMatches) && !empty($aMatches)){
			$aFieldLabels[] = preg_replace(
					'/:\s*$/',
					'',
					html_entity_decode(
							translate( $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['vname'], $aMatches[1] ),
							ENT_QUOTES,
							"UTF-8"
					)
			);
		}
		else{
			$mPregResult = preg_replace ( '/:$/', '', html_entity_decode ( translate ( $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['vname'], $aModules['0'] ), ENT_QUOTES, "UTF-8" ) );
			if(empty($mPregResult)){
				// cerco se è definita una label specifica per questo campo.
				if(!empty($aCustomLabels[$value])){
					$oBean = new $beanList[ $aCustomLabels[$value]['module'] ]();
					$mPregResult = preg_replace ( '/:$/', '', html_entity_decode ( translate ($oBean->field_name_map[ $aCustomLabels[$value]['field'] ][ 'vname' ], $aCustomLabels[$value]['module'] ), ENT_QUOTES, "UTF-8" ) );
				}
			}
			$aFieldLabels[] = $mPregResult;
		}
	}

	$header = '<tr>';
	foreach ($aFieldLabels as $sSingleField){
		$header.='<th>'.$sSingleField.'</th>';
	}
	$header .= '</tr>';

	if($members){
		$header = str_replace('<td>ea_deleted</td><td>ear_deleted</td>primary_address</td>','',$header);
	}
	$content .= $header;
	$pre_id = '';
	while($val = $db->fetchByAssoc($result)) {
		$new_arr = array();

		//$vals = $array_campi_recipient;
		$vals = array_values($val);
		$line = '<tr>';

		foreach ($vals as $key => $value)
		{
			if( empty( $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ] ) ) {
				$fieldType = '';
			}
			else {
				//getting content values depending on their types
				$fieldType = $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['type'];
			}

			if (isset($fieldType))
			{
				switch ($fieldType)
				{
					//if our value is a cucb24618d-9fe9-9644-0818-4f96a3d9391crrency field, then apply the users locale
					case 'currency':
						require_once('modules/Currencies/Currency.php');
						$value = currency_format_number($value, array('currency_symbol' => false));
						break;

						//if our value is a datetime field, then apply the users locale
					case 'datetime':
					case 'datetimecombo':
						$value = $timedate->to_display_date_time($value);
						$value = preg_replace('/([pm|PM|am|AM]+)/', ' \1', $value);
						break;

						//kbrill Bug #16296
					case 'date':
						$value = $timedate->to_display_date($value, false);
						break;

						// Bug 32463 - Properly have multienum field translated into something useful for the client
					case 'multienum':
						$value = str_replace("^","",$value);
						if (isset($aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'])
								&& isset($app_list_strings[ $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'] ])
						) {
							$valueArray = explode(",",$value);
							foreach ($valueArray as $multikey => $multivalue )
							{
								if (isset($app_list_strings[ $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'] ][$multivalue]) )
								{
									$valueArray[$multikey] = $app_list_strings[$aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'] ][$multivalue];
								}
							}
							$value = implode(",",$valueArray);
						}
						break;
					case 'enum':
						if (isset($aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'])
						&& isset($app_list_strings[ $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'] ])
						) {
							$value = $app_list_strings[$aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['options'] ][$value];
						}
						break;
				}
			}

			if(isset($aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['custom_type'])
					&& $aBeans[ $aModules[ $aFieldsToModuleIndex[$key] ] ]->field_name_map[ $fields_array[$key] ]['custom_type'] == 'teamset')
			{
				require_once('modules/Teams/TeamSetManager.php');
				$value = TeamSetManager::getCommaDelimitedTeams($val['team_set_id'], !empty($val['team_id']) ? $val['team_id'] : '');
			}
			$line .= '<td>' . preg_replace("/\"/","\"\"", $value) . '</td>';
		}
		$line .= '</tr>';
		$content .= $line;
	}
	$content.='</table></body>';

	return $content;
}

?>