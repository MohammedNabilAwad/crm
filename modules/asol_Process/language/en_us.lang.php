<?php

$mod_strings = array (
 
'LBL_ASSIGNED_TO_ID' => 'Assigned User Id',
'LBL_ASSIGNED_TO_NAME' => 'User',
'LBL_ID' => 'ID',
'LBL_DATE_ENTERED' => 'Date Created',
'LBL_DATE_MODIFIED' => 'Date Modified',
'LBL_MODIFIED' => 'Modified By',
'LBL_MODIFIED_ID' => 'Modified By Id',
'LBL_MODIFIED_NAME' => 'Modified By',
'LBL_CREATED' => 'Created By',
'LBL_CREATED_ID' => 'Created By Id',
'LBL_DESCRIPTION' => 'Description',
'LBL_DELETED' => 'Deleted',
'LBL_NAME' => 'Name',
'LBL_CREATED_USER' => 'Created by User',
'LBL_MODIFIED_USER' => 'Modified by User',
'LBL_LIST_NAME' => 'Name',
'LBL_LIST_FORM_TITLE' => 'Process List',
'LBL_MODULE_NAME' => 'Process',
'LBL_MODULE_TITLE' => 'Process',
'LBL_HOMEPAGE_TITLE' => 'My WFM Processes',
'LNK_NEW_RECORD' => 'Create Process',
'LNK_LIST' => 'View Process',
'LNK_IMPORT_ASOL_PROCESS' => 'Import Process',
'LBL_SEARCH_FORM_TITLE' => 'Search Process',
'LBL_HISTORY_SUBPANEL_TITLE' => 'View History',
'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Activities',
'LBL_ASOL_PROCESS_SUBPANEL_TITLE' => 'Process',
'LBL_NEW_FORM_TITLE' => 'New Process',

// Miscellaneous
'LBL_STATUS' => 'Status',
'LBL_TRIGGER_MODULE' => 'Module',
'LBL_ASOL_EXPORT' => 'Export Processes',
'LBL_ASOL_EXPORT_PLEASE' => 'Please select at least 1 record to proceed.',
'LBL_ASOL_FLOWCHART_PLEASE' => 'Please select at least 1 record to proceed.',
'LBL_ASOL_IMPORT' => 'Import',
'LBL_ASOL_ALINEASOL_WFM_MONITOR' => 'AlineaSol WFM Monitor',
'LBL_ASOL_ASOL_IMPORT_ASOL_PROCESSES' => 'Import Processes',
'LBL_DB_CONFIGURATION_PANEL' => 'Module Panel',
'LBL_ASOL_TRIGGER_MODULE' => 'Module',

// Menu.php
'LBL_ASOL_VIEW_ASOL_PROCESSES' => 'View Processes',
'LBL_ASOL_CREATE_ASOL_PROCESS' => 'Create Process',
'LBL_ASOL_VIEW_ASOL_EVENTS' => 'View Events',
'LBL_ASOL_CREATE_ASOL_EVENT' => 'Create Event',
'LBL_ASOL_VIEW_ASOL_ACTIVITIES' => 'View Activities',
'LBL_ASOL_CREATE_ASOL_ACTIVITY' => 'Create Activity',
'LBL_ASOL_VIEW_ASOL_TASKS' => 'View Tasks',
'LBL_ASOL_CREATE_ASOL_TASK' => 'Create Task',
'LBL_ASOL_VIEW_ASOL_LOGINAUDIT' => 'View Login Audit',

// Rebuild logic_hooks
'LBL_ASOL_REBUILD_TITLE' => 'Check the modules you want AlineaSol WFM to supervise and click on "Update" at the bottom.',
'LBL_ASOL_REBUILD_SEND' => 'Update',
'LBL_ASOL_REBUILD_DONE' => 'DONE',

// flowChart
'LBL_ASOL_REFRESH' => 'Refresh',
'LBL_ASOL_TEXT_OVERFLOW_ELLIPSIS' => 'Complete names',
'LBL_ASOL_INFO_TITLE' => 'Info',
'LBL_ASOL_INFO_TEXT' => '- In the flowChart there is a lot of hidden-information about the process-definition. If you hover the cursor over the items(icons and element-names) you will get some info. You have to click over the condition_icon in order to show the condition_info, and click again over the condition_icon in order to hide the condition_info.<br>- A click over the name of a element will redirect the popup´s parent_page to the definition of the element in the sugarcrm. This is useful to change values and see the flowChart at the same time. When pressing "Ctrl" key and clicking on a link => redirect to EditView (instead of DetailView when only clicking without pressing).<br>- Complete names -> this will show the whole-name of an element (for events and activities, not tasks).<br>- Events are ordered first by type and second by name. Activities are ordered by name (not for next_activities). Tasks are ordered first by task_order and second by name.<br>- Ctrl+Space => Complete names<br>- Click on connection => Change border-color of source-element and target-element',

// popupHelp
'LBL_POPUPHELP_FOR_FIELD_STATUS' => "<table class='popupHelp'><tr><th>Status</th><th>Description</th></tr><tr><td>Active</td><td>WFM instanciates processes.</td></tr><tr><td>Inactive</td><td>WFM does not instanciate processes. But it will execute processes already instanciated and stored in database.</td></tr></table>",
'LBL_POPUPHELP_FOR_FIELD_TRIGGER_MODULE' => "<table class='popupHelp'><tr><td>When modifying a wfm-process you can not change the module because of security measures.<br><br>Example 1: If you create a wfm-process with a specific module and then you create a wfm-task of type=modify_object. Note that a field that you want the wfm to modify for the first module could not exist for the second module.<br>Example 2: If you define a condition(wfm-event/wfm-activity) for a module, this could not work if you change the module(because the field does not exist in this new module).</td></tr></table>",
'LBL_POPUPHELP_FOR_FIELD_ALTERNATIVE_DATABASE' => "<table class='popupHelp'><tr><td>- External non CRM databases (the databases access must be configured in an array within config_override.php file): \$sugar_config['asolReportsAlternativeDbConnections'] </td></tr></table>",

//////////////
'LBL_REPORT_USE_ALTERNATIVE_DB' => 'Use Database',
'LBL_REPORT_NATIVE_DB' => 'CRM Native Database',

//
'LBL_WFM_VARIABLES' => 'WFM Variables',
);
?>
