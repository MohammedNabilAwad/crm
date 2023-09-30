<?php
if (! defined ( 'sugarEntry' ))
	define ( 'sugarEntry', true );

require_once 'include/MVC/Controller/SugarController.php';
require_once ('include/MassUpdate.php');
class osy_services_companiesController extends SugarController {

	/*function action_exportServiceCompanies() {
    	require_once('custom/include/osy_utils.php');
    	global $db, $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map, $theme, $sugar_config;

    	$classnameAccount = "SUGAR_GRID_ACC";
    	$classnameServicesCompanies = "SUGAR_GRID_SERVICESCOMP";
    	$site_url = $sugar_config['site_url'];

    	$aFieldsServicesCompanies = array();
    	$aFieldsAccounts = array();

    	$oServComp = new osy_services_companies();
    	$sModule = 'osy_services_companies';
    	$aFieldsServicesCompanies = getFieldsBean($oServComp, $sModule);
		$aServicesCompaniesFieldsToShowName = array(
			'description',
			'mode_of_intervention',
			'subject',
			'subject_description',
			'duration',
			'payment_status_c',
			'costs_c',
		);
		$aServicesCompaniesFieldsToShow = array();
		foreach ($aFieldsServicesCompanies as $aField){
			if(in_array($aField[1], $aServicesCompaniesFieldsToShowName)){
				array_push($aServicesCompaniesFieldsToShow, $aField);
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
			'company_id_or_vat',
		);
		$aAccountFieldsToShow = array();
		foreach ($aFieldsAccounts as $aField){
			if(in_array($aField[1], $aAccountFieldsToShowName)){
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
    	echo "<p id='title'> " . $mod_strings ['LBL_OSY_EXPORT_SERVICES_COMPANIES_POPUP_TITLE'] . " </p>";
    	$table = "<form id='popupExportForm' name='popupExportForm' action='".$site_url."/index.php?entryPoint=osy_exportOppServCompanies&module=osy_services_companies' method='POST'>
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
								Choose Services for individual companies columns:
							</tr>
							<tr>
						  		<td>
									<table>
				            			<tbody>
											<tr>
												<td>".constructDDFields($aServicesCompaniesFieldsToShow,$classnameServicesCompanies)."</td>
											</tr>
										</tbody>
									</table>
				     			</td>
							</tr>
						</table>
					</div>
				<input class='buttonForm' name='cancel' type='button' onclick='javascript:window.close();' value='".$app_strings['LBL_CANCEL_EXPORT']."'/>
				<input class='buttonForm' type='button' onclick='getFieldsSelected(this.form, SUGAR_GRID_ACC_grid1, SUGAR_GRID_SERVICESCOMP_grid1); this.form.submit();' value='".$app_strings['LBL_GENERATE_EXPORT_FILE']."'/>
				</form>
				</html>";
    	echo $table;
	}
	*/
}
?>