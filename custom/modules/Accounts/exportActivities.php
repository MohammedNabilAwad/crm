<?php
if (!defined('sugarEntry') || !sugarEntry)
    die ('Not A Valid Entry Point');
require_once('include/entryPoint.php');

// Function composes the data search in where clause
function getDateWhere($field)
{
    global $timedate;
    $date = $timedate->now();
    $current_date = new DateTime ($date);
    $date_range = (isset ($_POST ['date_range']) && !empty ($_POST ['date_range'])) ? $_POST ['date_range'] : null;
    $where_date = "AND CAST(m." . $field . " AS DATE) BETWEEN '";
    $date_field = '';
    switch ($date_range) {
        case 'week' :
            $day_week = $current_date->format('w') - 1; // 0 ->Sunday, 1->Monday ...
            $week = date('Y-m-d', strtotime("-" . $day_week . " days"));
            $where_date .= $week . "' AND '" . $current_date->format($timedate->dbDayFormat) . "'";
            break;
        case 'month' :
            $current_month = $current_date->format('m');
            $current_year = $current_date->format('Y');
            $month = new DateTime ("01-$current_month-$current_year");
            $where_date .= $month->format($timedate->dbDayFormat) . "' AND '" . $current_date->format($timedate->dbDayFormat) . "'";
            break;
        case 'year' :
            $current_year = $current_date->format('Y');
            $year = new DateTime ("01-01-$current_year");
            $where_date .= $year->format($timedate->dbDayFormat) . "' AND '" . $current_date->format($timedate->dbDayFormat) . "'";
            break;
        case 'between' :
            $date_start = (isset ($_POST ['dateStart']) && !empty ($_POST ['dateStart'])) ? $_POST ['dateStart'] : null;
            $date_end = (isset ($_POST ['dateEnd']) && !empty ($_POST ['dateEnd'])) ? $_POST ['dateEnd'] : null;

            // Save date in DateTime and check if date_start is before than $date_end
            $start = new DateTime ($date_start);
            $end = new DateTime ($date_end);
            if ($start > $end) {
                $tmp = $start;
                $start = $end;
                $end = $tmp;
            }
            $where_date .= $start->format($timedate->dbDayFormat) . "' AND '" . $end->format($timedate->dbDayFormat) . "'";
            break;
    }
    return $where_date;
}

// START VARIABLES

global $db, $sugar_config;
$site_url = $sugar_config ['site_url'];

// Save datas in variables
$account_id = (isset ($_POST ['account_id']) && !empty ($_POST ['account_id'])) ? $_POST ['account_id'] : null;
$activity = (isset ($_POST ['activity']) && !empty ($_POST ['activity'])) ? $_POST ['activity'] : null;
$activities = (isset ($_POST ['activities']) && !empty ($_POST ['activities'])) ? $_POST ['activities'] : null;
$queryList = array();
$moduleList = array();
$moduleName = array(
    'calls' => 'LBL_CALLS',
    'meetings' => 'LBL_MEETINGS',
    'tasks' => 'LBL_TASKS',
    'notes' => 'LBL_NOTES',
    'osy_services_companies' => 'osy_services_companies',
//		'osy_service' => 'osy_service',
    'fp_events' => 'FP_events',
    'campaigns' => 'LBL_CAMPAIGNS'
);
$moduleDateField = array(
    'calls' => 'date_start',
    'meetings' => 'date_start',
    'tasks' => 'date_start',
    'notes' => 'date_entered',
    'osy_services_companies' => 'date_entered',
//		'osy_service' => 'date_start',
    'fp_events' => 'date_entered',
    'campaigns' => 'start_date'
);
$moduleColumnHeader = array(
    'calls' => array(
        'name' => 'LBL_SUBJECT',
        'date' => 'LBL_DATE',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
    'meetings' => array(
        'name' => 'LBL_SUBJECT',
        'date' => 'LBL_DATE',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
    'tasks' => array(
        'name' => 'LBL_SUBJECT',
        'date' => 'LBL_START_DATE',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
    'notes' => array(
        'name' => 'LBL_NOTE_SUBJECT',
        'date' => 'LBL_DATE_ENTERED',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
    'osy_services_companies' => array(
        'name' => 'LBL_NAME',
        'date' => 'LBL_DATE_ENTERED',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_PAYMENT_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
//		'osy_service' => array (
//				'name' => 'LBL_SUBJECT',
//				'date' => 'LBL_DATE',
//				'description' => 'LBL_DESCRIPTION',
//				'status' => 'LBL_STATUS',
//				'assigned_user' => 'LBL_ASSIGNED_TO_NAME'
//		),
    'fp_events' => array(
        'name' => 'LBL_NAME',
        'date' => 'LBL_DATE_ENTERED',
        'description' => 'LBL_DESCRIPTION',
        'status' => 'LBL_PAYMENT_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    ),
    'campaigns' => array(
        'name' => 'LBL_CAMPAIGN_NAME',
        'date' => 'LBL_CAMPAIGN_START_DATE',
        'description' => 'LBL_CAMPAIGN_CONTENT',
        'status' => 'LBL_CAMPAIGN_STATUS',
        'assigned_user' => 'LBL_ASSIGNED_TO_NAME',
        'cost' => 'LBL_COST',
    )
);
$searched = false; // use this to print something also no one record returns
$print_header = false;
// END VARIABLES

if ($activity == 'select')
    // SELECTED ACTIVITIES
    foreach ($activities as $module) {
//		if ($module == 'osy_service') {
//			//$queryList [$module] = "SELECT m . * , u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_lists pl ON pl.osy_service_id = m.id INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.related_type = 'Accounts' WHERE m.deleted = 0 AND plp.related_id = '$account_id'" . getDateWhere ( $moduleDateField [$module] );
//			$queryList [$module] = "SELECT DISTINCT m . * , u.last_name, u.first_name FROM $module m LEFT JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_lists pl ON pl.osy_service_id = m.id INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.deleted = 0 AND ( (plp.related_type = 'Accounts' AND plp.related_id = '$account_id') OR (plp.related_type = 'Contacts' AND plp.related_id in (SELECT DISTINCT contacts.id FROM contacts INNER JOIN accounts_contacts ac ON contacts.id=ac.contact_id AND ac.deleted=0 INNER JOIN accounts a ON a.id=ac.account_id AND a.deleted=0 WHERE a.id='$account_id' AND contacts.deleted=0)) ) WHERE m.deleted = 0 " . getDateWhere ( $moduleDateField [$module] );
//		} else

        if ($module == 'fp_events') {
            $queryList [$module] = "SELECT e.id, e.name, e.date_entered, e.description, fpe_a.payment_status as status, fpe_a.cost as cost, u.last_name, u.first_name FROM fp_events e
  JOIN  fp_events_accounts fpe_a ON fpe_a.fp_event_id = e.id
  INNER JOIN users u ON u.id = e.assigned_user_id AND u.deleted = 0
WHERE fpe_a.account_id = '" . $account_id . "' AND fpe_a.deleted = 0
UNION SELECT e.id, e.name, e.date_entered, e.description, fp_events_contacts_c.payment_status as status, fp_events_contacts_c.cost as cost, u.last_name, u.first_name FROM fp_events e
  INNER JOIN  fp_events_contacts_c ON fp_events_contacts_c.fp_events_contactsfp_events_ida = e.id AND fp_events_contacts_c.deleted = 0
  INNER JOIN accounts_contacts ac ON ac.contact_id = fp_events_contacts_c.fp_events_contactscontacts_idb
                                     AND ac.account_id = '" . $account_id . "' AND ac.deleted = 0
  INNER JOIN users u ON u.id = e.assigned_user_id AND u.deleted = 0";
        } else if ($module == 'campaigns')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.content as description, m.status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_list_campaigns plc ON plc.campaign_id = m.id AND plc.deleted = 0 INNER JOIN prospect_lists pl ON pl.id = plc.prospect_list_id AND pl.deleted = 0 INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.deleted = 0 AND plp.related_type = 'Accounts' WHERE m.deleted = 0 AND plp.related_id = '$account_id'" . getDateWhere($moduleDateField [$module]);
        else if ($module == 'notes')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, '' as status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
        else if ($module == 'osy_services_companies')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, m.payment_status_c as status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.osy_account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
        else
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, m.status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
        $moduleList [] = $module;
    }
else {
    // ALL ACTIVITIES
    $moduleList = array(
        0 => 'calls',
        1 => 'meetings',
        2 => 'tasks',
        3 => 'notes',
        4 => 'osy_services_companies',
//			5 => 'osy_service',
        5 => 'fp_events',
        6 => 'campaigns'
    );
    foreach ($moduleList as $module) {
//		if ($module == 'osy_service') {
//			//$queryList [$module] = "SELECT m . * , u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_lists pl ON pl.osy_service_id = m.id INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.related_type = 'Accounts' WHERE m.deleted = 0 AND plp.related_id = '$account_id'" . getDateWhere ( $moduleDateField [$module] );
//			$queryList [$module] = "SELECT DISTINCT m . * , u.last_name, u.first_name FROM $module m LEFT JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_lists pl ON pl.osy_service_id = m.id INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.deleted = 0 AND ( (plp.related_type = 'Accounts' AND plp.related_id = '$account_id') OR (plp.related_type = 'Contacts' AND plp.related_id in (SELECT DISTINCT contacts.id FROM contacts INNER JOIN accounts_contacts ac ON contacts.id=ac.contact_id AND ac.deleted=0 INNER JOIN accounts a ON a.id=ac.account_id AND a.deleted=0 WHERE a.id='$account_id' AND contacts.deleted=0)) ) WHERE m.deleted = 0 " . getDateWhere ( $moduleDateField [$module] );
//		} else

        if ($module == 'fp_events') {

            $queryList [$module] = "SELECT e.id, e.name, e.date_entered, e.description, fpe_a.payment_status as status, fpe_a.cost as cost, u.last_name, u.first_name FROM fp_events e
  JOIN  fp_events_accounts fpe_a ON fpe_a.fp_event_id = e.id
  INNER JOIN users u ON u.id = e.assigned_user_id AND u.deleted = 0
WHERE fpe_a.account_id = '" . $account_id . "' AND fpe_a.deleted = 0
UNION SELECT e.id, e.name, e.date_entered, e.description, fp_events_contacts_c.payment_status as status, fp_events_contacts_c.cost as cost, u.last_name, u.first_name FROM fp_events e
  INNER JOIN  fp_events_contacts_c ON fp_events_contacts_c.fp_events_contactsfp_events_ida = e.id AND fp_events_contacts_c.deleted = 0
  INNER JOIN accounts_contacts ac ON ac.contact_id = fp_events_contacts_c.fp_events_contactscontacts_idb
                                     AND ac.account_id = '" . $account_id . "' AND ac.deleted = 0
  INNER JOIN users u ON u.id = e.assigned_user_id AND u.deleted = 0";
        } else if ($module == 'campaigns')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.content as description, m.status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 INNER JOIN prospect_list_campaigns plc ON plc.campaign_id = m.id AND plc.deleted = 0 INNER JOIN prospect_lists pl ON pl.id = plc.prospect_list_id AND pl.deleted = 0 INNER JOIN prospect_lists_prospects plp ON plp.prospect_list_id = pl.id AND plp.deleted = 0 AND plp.related_type = 'Accounts' WHERE m.deleted = 0 AND plp.related_id = '$account_id'" . getDateWhere($moduleDateField [$module]);
        else if ($module == 'notes')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, '' as status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
        else if ($module == 'osy_services_companies')
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, m.payment_status_c as status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.osy_account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
        else
            $queryList [$module] = "SELECT m.id, m.name, m.date_entered, m.description, m.status, '' as cost, u.last_name, u.first_name FROM $module m INNER JOIN users u ON u.id = m.assigned_user_id AND u.deleted = 0 WHERE m.deleted = 0 AND m.account_id = '$account_id' " . getDateWhere($moduleDateField [$module]);
    }
}

// PRINT PAGE

$html = "
		<style>
			th#title {
				text-align: center;
				font-style: italic;
				font-size: x-large;
				background: #969393;
				color: white;
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
				text-align: center;
			}
			th
			{
				text-align: center;
			    font-weight: bold;
			    padding: 2px;
			    border: 2px solid #969393;
			    background: #c9c9c9;
			}
			td
			{
				text-align: center;
				padding: 2px;
			    border: 2px solid #969393;
			}
			div
			{
				text-align: right;
			}
			text
			{
				display:none;
			}
		</style>
        <script>
                $(document).ready(function() {
                    $(document).bind('keypress', function(e) {
                        if(e.keyCode == 27)
                            window.close();
                    });
                });
        </script>";

foreach ($moduleList as $module) {
    $r = $db->query($queryList [$module]);
    if ($r != false && $r->num_rows > 0) {
        if (!$print_header) {
            $html .= "<div id='print'>
					<a class='utilsLink' href='javascript:print();'><a class='utilsLink' href='javascript:print();'>
						<img border='0' align='absmiddle' width='13' height='13' alt='Print' src='themes/Sugar5/images/print.gif?v=vGKhghsUYkEoi76r-QDScw'>
					</a>
					<a class='utilsLink' href='javascript:print();'>" . translate('LBL_PRINT', 'Accounts') . "</a>
					</div>
					<p>" . translate('LBL_SOME_ACTIVITIES_EXPORT_TITLE', 'Accounts') . "</p><br/>";
            $print_header = true;
        }
        $searched = true;

        $a = $moduleColumnHeader [$module] ['name'];
        if ($module == 'fp_events') {
            $html .= "<table class='table_param'>
			<tr>
				<th colspan='6' id='title'>" . translate($moduleName [$module], 'Accounts') . "</th>
			</tr>
			<tr>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['name'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['date'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['description'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['status'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['cost'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['assigned_user'], $moduleName [$module])) . "</th>
			</tr>";
        }
        else{
            $html .= "<table class='table_param'>
			<tr>
				<th colspan='5' id='title'>" . translate($moduleName [$module], 'Accounts') . "</th>
			</tr>
			<tr>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['name'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['date'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['description'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['status'], $moduleName [$module])) . "</th>
				<th>" . str_replace(':', '', translate($moduleColumnHeader [$module] ['assigned_user'], $moduleName [$module])) . "</th>
			</tr>";
        }
        while ($v = $db->fetchByAssoc($r)) {
            $date_created = new DateTime ($v ['date_entered']); // convert to date to format
            if ($module == 'fp_events' && $v['status'] != '') {
                $v ['status'] = $GLOBALS ['app_list_strings'] ['osy_payment_status_list'][$v ['status']];
            }
            $status = isset ($v ['status']) ? $v ['status'] : ucwords(str_replace('_', ' ', $v ['payment_status_c']));
            $description = isset ($v ['description']) ? $v ['description'] : $v ['content'];
            if ($module == 'fp_events') {
                $html .= "<tr>
					<td>" . $v ['name'] . "</td>
					<td>" . $date_created->format('d-m-Y') . "</td>
					<td>" . $description . "</td>
					<td>" . $status . "</td>
					<td>" . $v['cost'] . "</td>
					<td>" . $v ['last_name'] . " " . $v ['first_name'] . "</td>
				</tr>";
            } else {
                $html .= "<tr>
					<td>" . $v ['name'] . "</td>
					<td>" . $date_created->format('d-m-Y') . "</td>
					<td>" . $description . "</td>
					<td>" . $status . "</td>
					<td>" . $v ['last_name'] . " " . $v ['first_name'] . "</td>
				</tr>";
            }
        }
        $html .= "</table><br/>";
    }
}
echo $html;
if (!$searched) {
    echo "<p id='title'>" . translate('LBL_NO_ACTIVITIES_FOUND', 'Accounts') . "</p>";
    echo "<input class='buttonForm' name='cancel' type='button' onclick='javascript:window.close();' value='Cancel'/>";
} else {
    echo "<input class='buttonForm' name='cancel' type='button' onclick='javascript:window.close();' value='Cancel'/>";
    echo "<form id='generateCSV' name='generateCSV' action='" . $site_url . "/index.php?entryPoint=exportCSV' method='POST'>
				<input type='hidden' name='action' value='exportCSV' />";
    // file_put_contents('/tmp/a.txt', json_encode($queryList), FILE_APPEND);
    // foreach ( $queryList as $key => $query )
    ?>
    <input type="hidden" id="queryList" name="queryList"
           value="<?php echo htmlspecialchars(json_encode($queryList)); ?>"/>
    <?php

    echo "<input class='buttonForm' name='exportCSV' type='submit' value='" . translate('LBL_GENERATE_XLS', 'Accounts') . "'/>
				</form>";
}
echo $buttons;
?>