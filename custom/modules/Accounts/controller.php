<?php
if (! defined ( 'sugarEntry' ))
	define ( 'sugarEntry', true );

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

require_once 'include/MVC/Controller/SugarController.php';
require_once ('include/MassUpdate.php');
class AccountsController extends SugarController {
	function action_listActivity() {
		global $db, $current_user, $mod_strings, $timedate, $current_language, $sugar_config;
		$site_url = $sugar_config['site_url'];
		echo "
		<style>
			#title {
				text-align: center;
				font-weight: bold;
				font-size: xx-large;
			}
			.table_param{
			    border-spacing: 0px;
			    border-collapse: collapse;
			    width: 90%;
    			table-layout: inherit;
				margin:auto;
			}
			.buttonForm {
				float: right;
			}
			body {
				font-family: Arial,Verdana,Helvetica,sans-serif;
				background-color:#F6F6F6;
			}
			select {
				width: inherit;
			}
		</style>";
		echo "<link rel='stylesheet' href='//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css'>";
		echo "<script src='//code.jquery.com/jquery-1.9.1.js'></script>";
		echo "<script src='//code.jquery.com/ui/1.10.4/jquery-ui.js'></script>";
		echo "<script src='http://jquery.bassistance.de/validate/jquery.validate.js'></script>";
		echo "<script src='http://jquery.bassistance.de/validate/additional-methods.js'></script>";
		echo "<script>
				  $(document).ready(function() {
						$('#dateStart').prop('required', false);
						$('#dateEnd').prop('required', false);
						$(document).bind('keypress', function(e) {
							if(e.keyCode == 27)
								window.close();
						});
						$('.sel_activities').prop('disabled', true);
						$('input[name=activity]:radio').change(function () {
							$('.sel_activities').prop('disabled', $(this).val() == 'all');
						});
						$('.date_input').hide();
						$( '#date_range').change(function(){
							if($(this).val() == 'between')
							{
								$('.date_input').show();
								$('#dateStart').prop('required', true);
								$('#dateEnd').prop('required', true);
							}
							else
							{
								$('.date_input').hide();
								$('#dateStart').prop('required', false);
								$('#dateEnd').prop('required', false);
							}
						});
					    $( '#dateStart' ).datepicker({ dateFormat: 'dd-mm-yy' });
						$( '#dateEnd' ).datepicker({ dateFormat: 'dd-mm-yy' });
					});
				  </script>";

		echo "<p id='title'> " . $mod_strings ['LBL_PRINT_ACTIVITY_LIST'] . " </p>";
		$table = "<form id='searchParam' name='searchParam' action='".$site_url."/index.php?entryPoint=exportActivities' method='POST'>
				<input type='hidden' name='account_id' value=".$_REQUEST['id']."></input>
				<table class='table_param'>
					<tr>
						<td>
							<table>
								<tr>
					 		    	<td nowrap='nowrap'>" . $mod_strings ['LBL_TIME_RANGE'] . "</td>
									<td nowrap='nowrap'>
										<select name='date_range' id='date_range'>
											<option value='week'>" . $mod_strings ['LBL_WEEK'] . "</option>
											<option value='month'>" . $mod_strings ['LBL_MONTH'] . "</option>
											<option value='year'>" . $mod_strings ['LBL_YEAR'] . "</option>
											<option value='between'>" . $mod_strings ['LBL_BETWEEN'] . "</option>
										</select>
									</td nowrap='nowrap'>
									<td class='date_input' nowrap='nowrap'>
										<input id='dateStart' type='text' maxlength='10' size='11' tabindex='0' title='' value='' name='dateStart' autocomplete='off'>
													and
										<input id='dateEnd' type='text' maxlength='10' size='11' tabindex='0' title='' value='' name='dateEnd' autocomplete='off'>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td>
							<br/>
						</td>
					</tr>
					<tr>
						<td nowrap='nowrap'>
							<input type='radio' name='activity' value='all' checked='checked'>". $mod_strings ['LBL_ALL_ACTIVITY']."
						</td>
					</tr>
					<tr>
						<td nowrap='nowrap'>
							<input type='radio' name='activity' value='select'>". $mod_strings ['LBL_SELECT_ACTIVITY']."
						</td>
					</tr>
					<tr>
						<td nowrap='nowrap'>
							<select class='sel_activities' name='activities[]' size='7' multiple>
								<option value='calls'>".$mod_strings['LBL_CALLS']."</option>
								<option value='meetings'>".$mod_strings['LBL_MEETINGS']."</option>
								<option value='tasks'>".$mod_strings['LBL_TASKS']."</option>
								<option value='notes'>".$mod_strings['LBL_NOTES']."</option>
								<option value='osy_services_companies'>".$mod_strings['LBL_SERVICE_INDIVIDUAL_COMPANY']."</option>
								<!--<option value='osy_service'>".$mod_strings['LBL_GROUP_ACTIVITY']."</option>-->
								<option value='fp_events'>".$mod_strings['LBL_FP_EVENTS']."</option>
								<option value='campaigns'>".$mod_strings['LBL_EMAIL']."</option>
							</select>
						</td>
					</tr>
				</table>
				<input class='buttonForm' type='submit' value='".$mod_strings['LBL_GENERATE']."'/>
				<input class='buttonForm' name='cancel' type='button' onclick='javascript:window.close();' value='".$mod_strings['LBL_CANCEL']."'/>
				</form>";
		echo $table;
	}
}
?>