 <?php
 /*********************************************************************************
  * SugarCRM Community Edition is a customer relationship management program developed by
  * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

  * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
  * Copyright (C) 2011 - 2014 Salesagility Ltd.
  *
  * This program is free software; you can redistribute it and/or modify it under
  * the terms of the GNU Affero General Public License version 3 as published by the
  * Free Software Foundation with the addition of the following permission added
  * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
  * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
  * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
  *
  * This program is distributed in the hope that it will be useful, but WITHOUT
  * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
  * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
  * details.
  *
  * You should have received a copy of the GNU Affero General Public License along with
  * this program; if not, see http://www.gnu.org/licenses or write to the Free
  * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
  * 02110-1301 USA.
  *
  * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
  * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
  *
  * The interactive user interfaces in modified source and object code versions
  * of this program must display Appropriate Legal Notices, as required under
  * Section 5 of the GNU Affero General Public License version 3.
  *
  * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
  * these Appropriate Legal Notices must retain the display of the "Powered by
  * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
  * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
  * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
  ********************************************************************************/

require_once('include/MVC/Controller/SugarController.php');


class OpportunitiesController extends SugarController {

	function action_getNewPaymentInfo() {

        $oJson = getJSONobj();
        $myfields = array();
        //$myfields["name"]="";
        $myfields["amount"]=0;
        $myfields["payment_status"]=0;
        $myfields["expiry_date"]="";


        $aParams = array_map('html_entity_decode', $_REQUEST);

        if($aParams['account_id']) { //solo se c'è l'account

        	global $db;

        	$query = "SELECT a.annual_nr_rates, a.subscription_fees FROM accounts a WHERE a.id = '{$aParams['account_id']}'";
        	$result=$db->query($query);
        	while (($row = $db->fetchByAssoc($result)) != null) {

        	$annual_nr_rates  = $row['annual_nr_rates'];
        	$subscription_fees  = $row['subscription_fees'];

        	}

        	$anno = date("Y");


        	$query = "SELECT count(*) as past_rates FROM opportunities AS o INNER JOIN accounts_opportunities AS ao ON o.id = ao.opportunity_id WHERE o.deleted = 0 and left(o.expiry_date,4) = '$anno' and ao.account_id = '{$aParams['account_id']}'";
        	$nr_rates=$db->getOne($query);


        	if($nr_rates < $annual_nr_rates)
        		$nr_rates = intval($nr_rates) + 1;
        	else {
        		$nr_rates = 1;
				$anno = ($anno) + 1;

        	}

        	switch ($annual_nr_rates) {

        		// in attesa di una decisione del cliente...

        		case 1: $expiry_date = "$anno"."-02-01"; break;
        		case 2: $expiry_date = "$anno"."-08-01"; break;
        		case 3: $mese = ($nr_rates*4)-3; $expiry_date = "$anno"."-".str_pad($mese, 2, "0", STR_PAD_LEFT)."-01"; break;
        		case 4: $mese = ($nr_rates*3)-2; $expiry_date = "$anno"."-".str_pad($mese, 2, "0", STR_PAD_LEFT)."-01"; break;
        		case 6: $mese = ($nr_rates*2)-2; $expiry_date = "$anno"."-".str_pad($mese, 2, "0", STR_PAD_LEFT)."-01"; break;


        	}

        	$data_rif = $GLOBALS["timedate"]->to_display_date($expiry_date,false);

        	// rimappo i valori nel form della pagina
        	//$myfields["name"]="Payment_".$nr_rates."_".$anno;
        	$myfields["amount"]=format_number($subscription_fees);
        	$myfields["payment_status"]=2;
        	$myfields["expiry_date"]=$data_rif;

        } //end if

        echo $oJson->encode($myfields);
       	return;


    }

    /*
    function action_exportSubscriptionFees() {
    	require_once('custom/include/osy_utils.php');
    	global $db, $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map, $theme, $sugar_config;

    	$classnameAccount = "SUGAR_GRID_ACC";
    	$classnameOpportunities = "SUGAR_GRID_OPP";
    	$site_url = $sugar_config['site_url'];

    	$aFieldsOpportunities = array();
    	$aFieldsAccounts = array();

    	$oSubFees = new Opportunity();
    	$sModule = 'Opportunities';
    	$aFieldsOpportunities = getFieldsBean($oSubFees, $sModule);
   		$aOpportunitiesFieldsToShowName = array(
			'name',
			'description',
			'total_amount_c',
			'pending_payments',
   			'partial_payment_c',
			'payment_status',
			'invoice_date',
			'invoice_number_c',
			'taxes_c',
		);
		$aOpportunitiesFieldsToShow = array();
		foreach ($aFieldsOpportunities as $aField){
			if(in_array($aField[1], $aOpportunitiesFieldsToShowName)){
				array_push($aOpportunitiesFieldsToShow, $aField);
			}
		}


    	$oMember = new Account();
    	$sModule = 'Accounts';
    	$aFieldsAccounts = getFieldsBean($oMember, $sModule);
		$aAccountFieldsToShowName = array(
			'name',
			'billing_address_street',
			'billing_address_city',
			'billing_address_state',
			'billing_address_region_c',
			'billing_address_postalcode',
			'billing_address_pobox_c',
			'phone_office',
			'website',
			'company_id_or_vat'
		);
		$aAccountFieldsToShow = array();
		foreach($aFieldsAccounts as $aField) {
			if (in_array($aField[1], $aAccountFieldsToShowName)) {
				array_push($aAccountFieldsToShow, $aField);
			}
		}


echo "<html lang='en_us'>
<head>
<link rel='SHORTCUT ICON' href='themes/Sugar5/images/sugar_icon.ico'>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
<title>ITC ILO Export Supscription Fees</title>
<link href='include/javascript/yui/build/datatable/assets/skins/sam/datatable.css' type='text/css' rel='stylesheet'>
<link rel='stylesheet' type='text/css' href='cache/themes/Sugar5/css/yui.css' />
<link rel='stylesheet' type='text/css' href='include/javascript/jquery/themes/base/jquery.ui.all.css' />
<link rel='stylesheet' type='text/css' href='cache/themes/Sugar5/css/deprecated.css'/>
<link rel='stylesheet' type='text/css' href='cache/themes/Sugar5/css/style.css' />
<script type='text/javascript' src='cache/include/javascript/sugar_grp1_yui.js'></script>
<script type='text/javascript' src='cache/include/javascript/sugar_grp1.js'></script>
<script src='//code.jquery.com/jquery-1.9.1.js'></script>
<script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>
<script src='http://jquery.bassistance.de/validate/jquery.validate.js'></script>
<script src='http://jquery.bassistance.de/validate/additional-methods.js'></script>
<script type='text/javascript' src='cache/include/javascript/sugar_grp1_yui.js'></script>
<script type='text/javascript' src='cache/include/javascript/sugar_grp1.js'></script>

<script type='text/javascript' src='custom/include/osy_utils.js'></script>
<script type='text/javascript'>
	$( document ).ready(
		function(){
			getIdsFromParentPage('osy_export_ids')
		}
	);
</script>
</head>";
		echo "
		<style>
			#title {
				text-align: center;
				font-weight: bold;
			}
			.buttonForm {
				float: right;
			}
			body {
				font-family: Arial,Verdana,Helvetica,sans-serif;
				background-color:#F6F6F6;
			}
		</style>";
    	echo "<p id='title'> " . $mod_strings ['LBL_OSY_EXPORT_SUBSCRIPTION_FEES_POPUP_TITLE'] . " </p>";
    	$table = "<form id='popupExportForm' name='popupExportForm' action='".$site_url."/index.php?entryPoint=osy_exportOppServCompanies&module=Opportunities' method='POST'>
    				<!-- In questo div sono presenti gli id che dovranno essere esportati. Sono quegli id che sono stati selezionati nella listview.-->
	    			<div style='display:hidden' id='osy_export_ids'></div>
	    			<div>
    					<table width='600px' border='0' cellspacing='0' cellpadding='0'>
		    				<tr>
								Choose Members columns:
							</tr>
							<tr>

						  		<td >
									<table border='0' cellpadding='0' cellspacing='0' width='500'>
				            			<tbody>
											<tr>
												<td >".constructDDFields($aAccountFieldsToShow,$classnameAccount)."</td>
											</tr>
										</tbody>
									</table>
				     			</td>
							</tr>
						</table>
					</div>
					<div>
						<table width='600px' border='0' cellspacing='0' cellpadding='0'>
							<tr>
								Choose Subscription Fees columns:
							</tr>
							<tr>
						  		<td>
									<table>
				            			<tbody>
											<tr>
												<td>".constructDDFields($aOpportunitiesFieldsToShow,$classnameOpportunities)."</td>
											</tr>
										</tbody>
									</table>
				     			</td>
							</tr>
						</table>
					</div>
				<input class='buttonForm' name='cancel' type='button' onclick='javascript:window.close();' value='".$app_strings['LBL_CANCEL_EXPORT']."'/>
				<input class='buttonForm' type='button' onclick='getFieldsSelected(this.form, SUGAR_GRID_ACC_grid1, SUGAR_GRID_OPP_grid1); this.form.submit();' value='".$app_strings['LBL_GENERATE_EXPORT_FILE']."'/>
				</form>
				</html>";
    	echo $table;
    }
    */
}

?>
