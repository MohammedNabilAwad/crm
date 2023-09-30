<?php
function getFieldsBean($oBean, $sModule){
	global $db, $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map, $theme, $sugar_config;
	$aFields = array();
	foreach($oBean->field_defs as $field_def)
	{
		$email_fields = false;
		if($field_def['name']== 'email1' || $field_def['name']== 'email2')
		{
			$email_fields = true;
		}
// 		if($field_def['name']!= 'account_name'){
			if( ( $field_def['type'] == 'relate' && empty($field_def['custom_type']) )
					|| $field_def['type'] == 'assigned_user_name' || $field_def['type'] =='link'
					|| (isset($field_def['source'])  && $field_def['source']=='non-db' && !$email_fields) || $field_def['type'] == 'id')
			{
				continue;
			}
// 		}
		if($field_def['name']== 'deleted' || $field_def['name']=='converted' || $field_def['name']=='date_entered'
				|| $field_def['name']== 'date_modified' || $field_def['name']=='modified_user_id'
				|| $field_def['name']=='assigned_user_id' || $field_def['name']=='created_by'
				|| $field_def['name']=='team_id')
		{
			continue;
		}


		$field_def['vname'] = preg_replace('/:$/','',translate($field_def['vname'],$sModule));

		//$cols_name = "{'".$field_def['vname']."'}";
		$col_arr = array();

		$cols_name=$field_def['vname'];
		$col_arr[0]=$cols_name;
		$col_arr[1]=$field_def['name'];

		if (! in_array($cols_name, $aFields))
		{
			array_push($aFields,$col_arr);
		}
	}

	return $aFields;
}

function constructDDFields($fields,$classname){
	require_once("include/templates/TemplateDragDropChooser.php");
    global $app_strings;
    $d2 = array();
    //now call function that creates javascript for invoking DDChooser object
    $dd_chooser = new TemplateDragDropChooser();
    $dd_chooser->args['classname']	= $classname;//label per Drag&Drop per popup export
    $dd_chooser->args['left_header']	= $app_strings['LBL_HIDDEN_FIELDS_HEADER'];
    $dd_chooser->args['right_header']	= $app_strings['LBL_SHOWN_FIELDS_HEADER'];
    $dd_chooser->args['left_data']	= $fields;
    $dd_chooser->args['right_data']	= $d2;
    $dd_chooser->args['title']	=  ' ';

    switch ($classname) {
    	case 'SUGAR_GRID_ACC':
    		$dd_chooser->args['left_div_name']      = 'ddgridacc1';
    		$dd_chooser->args['right_div_name']     = 'ddgridacc2';
    	break;
    	case 'SUGAR_GRID_OPP':
    		$dd_chooser->args['left_div_name']      = 'ddgridopp1';
    		$dd_chooser->args['right_div_name']     = 'ddgridopp2';
    	break;
    	case 'SUGAR_GRID_SERVICESCOMP':
    		$dd_chooser->args['left_div_name']      = 'ddgridserv1';
    		$dd_chooser->args['right_div_name']     = 'ddgridserv2';
    	break;

    	default:
    		$dd_chooser->args['left_div_name']      = 'ddgrid1';
    		$dd_chooser->args['right_div_name']     = 'ddgrid2';
    	break;
    }

    $dd_chooser->args['gridcount'] = 'two';
    $str = $dd_chooser->displayScriptTags();
    $str .= $dd_chooser->displayDefinitionScript();
    $str .= $dd_chooser->display();
    return $str;
}


function update_membership_status_accounts(){
	$sConfigSelect = "SELECT * FROM config WHERE category = 'osy' AND name = 'accounts_last_update'";
	global $db;
	$result = $db->query($sConfigSelect);
	$aResult = $db->fetchByAssoc($result);
	$sAccountsLastUpdate = FALSE;
	if($aResult === FALSE){
		$sInsertQuery = "INSERT INTO config(category, name, value) VALUES ('osy', 'accounts_last_update', '" . date("Y-m-d") . "') ";
		$mResult = $db->query($sInsertQuery);
		if($mResult === FALSE){
			$GLOBALS['log']->fatal("Error executing the following query: $sInsertQuery");
		}
	} else {
		$sAccountsLastUpdate = $aResult['value'];
		$sUpdateQuery = "UPDATE config SET value = '" . date("Y-m-d") . "' WHERE category = 'osy' AND name = 'accounts_last_update' ";
		$mResult = $db->query($sUpdateQuery);
		if ($mResult === FALSE) {
			$GLOBALS['log']->fatal("Error executing the following query: $sUpdateQuery");
		}
	}

	if ($sAccountsLastUpdate === FALSE || $sAccountsLastUpdate != date("Y-m-d")) {
		$oActivePeriodEnd = date("Y-m-d", strtotime("+31 day"));

		$oExpiringPeriodStart = date("Y-m-d", strtotime("+30 day"));
		$oExpiringPeriodEnd = date("Y-m-d");

		$oSuspendPeriodStart = date("Y-m-d", strtotime("-1 day"));
		$oSuspendsPeriodEnd = date("Y-m-d", strtotime("-90 day"));

		$oElapsedPeriodStart = date("Y-m-d", strtotime("-91 day"));

		$sActiveQuery = "UPDATE accounts SET membership_status = 'Active' WHERE membership_status NOT IN ('Active','Closed') AND member_till >= '$oActivePeriodEnd' AND deleted = 0";
		$sExpireingQuery = "UPDATE accounts SET membership_status = 'Expiring' WHERE membership_status NOT IN ('Expiring' 'Closed') AND member_till >= '$oExpiringPeriodEnd' AND member_till <= '$oExpiringPeriodStart' AND deleted = 0";
		$sSuspendQuery = "UPDATE accounts SET membership_status = 'Suspended' WHERE membership_status NOT IN ('Suspended' 'Closed') AND member_till <= '$oSuspendPeriodStart' AND member_till >= '$oSuspendsPeriodEnd' AND deleted = 0";
		$sElapsedQuery = "UPDATE accounts SET membership_status = 'Elapsed' WHERE membership_status NOT IN ('Elapsed' 'Closed') AND member_till <= '$oElapsedPeriodStart' AND deleted = 0";

		$db->query($sActiveQuery);
		$db->query($sExpireingQuery);
		$db->query($sSuspendQuery);
		$db->query($sElapsedQuery);
	}
}

function osyCountDelegates(&$oEventBean){
    global $db;
    $num_declined = 0;
    $num_no_response = 0;
    $num_participants = 0;
    $num_attended = 0;
    $num_tot_delegates = 0;
    $q = "SELECT * FROM fp_events_accounts WHERE fp_event_id = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }

    $q = "SELECT * FROM fp_events_contactspotentialmember WHERE fp_event_id = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }

    $q = "SELECT * FROM fp_events_contacts_c WHERE fp_events_contactsfp_events_ida = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }

    $q = "SELECT * FROM fp_events_leads_1_c WHERE fp_events_leads_1fp_events_ida = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }

    $q = "SELECT * FROM fp_events_osy_other_contacts WHERE fp_event_id = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }

    $q = "SELECT * FROM fp_events_prospects_1_c WHERE fp_events_prospects_1fp_events_ida = '".$oEventBean->id."' AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        if($v['accept_status'] == 'Accepted'){
            $num_participants++;
        }
        if($v['accept_status'] == 'No Response'){
            $num_no_response++;
        }
        if($v['accept_status'] == 'Declined'){
            $num_declined++;
        }
        if($v['invite_status'] == 'Attended'){
            $num_attended++;
        }
        $num_tot_delegates++;
    }
    $oEventBean->num_declined = $num_declined;
    $oEventBean->num_no_response = $num_no_response;
    $oEventBean->num_participants = $num_participants;
    $oEventBean->num_attended = $num_attended;
    $oEventBean->num_tot_delegates = $num_tot_delegates;

    $q = "UPDATE fp_events SET num_declined = {$num_declined}, 
num_no_response = {$num_no_response}, 
num_participants = {$num_participants}, 
num_attended = {$num_attended},
num_tot_delegates = {$num_tot_delegates}
WHERE id = '{$oEventBean->id}'";
    $db->query($q);

}

function osyGetSumTotalPaid($bean)
{
    $bean->load_relationship('opportunities_osy_payment_management_1');
    if ($bean->opportunities_osy_payment_management_1 != null)
    {
        $aPaymentList = $bean->opportunities_osy_payment_management_1->getBeans();
        $sSommaPaid = 0;
        foreach ($aPaymentList as $oPayment) {
            $sSommaPaid += $oPayment->paid_amount_1_c;
        }
        return $sSommaPaid;
    }
}

function osyGetTotalBalance ($bean)
{
    $bean->load_relationship('opportunities');
    $opportunities = $bean->opportunities->getBeans();
    $total_balance = 0;
    foreach ($opportunities as $opp)
    {
        $total_balance += $opp->balance;
    }
    return $total_balance;
}

function osyGetSettings()
{
    global $db;

    $query = "SELECT * FROM osy_administration_panel";
    $res = $db->query($query);
    $row = $db->fetchByAssoc($res);
    return $osy_administration_panel = BeanFactory::getBean("osy_administration_panel",$row['id']);
}