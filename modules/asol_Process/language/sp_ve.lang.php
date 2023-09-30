<?php

$mod_strings = array (

'LBL_ASSIGNED_TO_ID' => 'Identificador de Usuario Asignado',
'LBL_ASSIGNED_TO_NAME' => 'Usuario',
'LBL_ID' => 'ID',
'LBL_DATE_ENTERED' => 'Fecha de Creación',
'LBL_DATE_MODIFIED' => 'Fecha de Modificación',
'LBL_MODIFIED' => 'Modificado Por',
'LBL_MODIFIED_ID' => 'Modificado Por Id',
'LBL_MODIFIED_NAME' => 'Modificado Por',
'LBL_CREATED' => 'Creado Por',
'LBL_CREATED_ID' => 'Creado Por Id',
'LBL_DESCRIPTION' => 'Descripción',
'LBL_DELETED' => 'Eliminado',
'LBL_NAME' => 'Nombre',
'LBL_CREATED_USER' => 'Creado por Usuario',
'LBL_MODIFIED_USER' => 'Modificado por Usuario',
'LBL_LIST_NAME' => 'Nombre',
'LBL_LIST_FORM_TITLE' => 'Lista de Procesos',
'LBL_MODULE_NAME' => 'Proceso',
'LBL_MODULE_TITLE' => 'Proceso',
'LBL_HOMEPAGE_TITLE' => 'Mis WFM Procesos',
'LNK_NEW_RECORD' => 'Crear Proceso',
'LNK_LIST' => 'Ver Proceso',
'LNK_IMPORT_ASOL_PROCESS' => 'Importar Proceso',
'LBL_SEARCH_FORM_TITLE' => 'Buscar Proceso',
'LBL_HISTORY_SUBPANEL_TITLE' => 'Ver Historial',
'LBL_ACTIVITIES_SUBPANEL_TITLE' => 'Actividades',
'LBL_ASOL_PROCESS_SUBPANEL_TITLE' => 'Proceso',
'LBL_NEW_FORM_TITLE' => 'Nuevo Proceso',

// Miscellaneous
'LBL_STATUS' => 'Estado',
'LBL_TRIGGER_MODULE' => 'Módulo del Bean',
'LBL_ASOL_EXPORT' => 'Exportar Procesos',
'LBL_ASOL_EXPORT_PLEASE' => 'Por favor, selecciona un registro para proceder.',
'LBL_ASOL_FLOWCHART_PLEASE' => 'Por favor, selecciona un registro para proceder.',
'LBL_ASOL_IMPORT' => 'Importar',
'LBL_ASOL_ALINEASOL_WFM_MONITOR' => 'Monitor del WFM de AlineaSol',
'LBL_ASOL_ASOL_IMPORT_ASOL_PROCESSES' => 'Importar Procesos',
'LBL_DB_CONFIGURATION_PANEL' => 'Panel del Módulo',
'LBL_ASOL_TRIGGER_MODULE' => 'Módulo',

// Menu.php
'LBL_ASOL_VIEW_ASOL_PROCESSES' => 'Ver Procesos',
'LBL_ASOL_CREATE_ASOL_PROCESS' => 'Crear Proceso',
'LBL_ASOL_VIEW_ASOL_EVENTS' => 'Ver Eventos',
'LBL_ASOL_CREATE_ASOL_EVENT' => 'Crear Evento ',
'LBL_ASOL_VIEW_ASOL_ACTIVITIES' => 'Ver Actividades',
'LBL_ASOL_CREATE_ASOL_ACTIVITY' => 'Crear Actividad',
'LBL_ASOL_VIEW_ASOL_TASKS' => 'Ver Tareas',
'LBL_ASOL_CREATE_ASOL_TASK' => 'Crear Tarea',
'LBL_ASOL_VIEW_ASOL_LOGINAUDIT' => 'Ver Login Audit',

// Rebuild logic_hooks
'LBL_ASOL_REBUILD_TITLE' => 'Verifica los módulos que quieres que AlineaSol WFM supervise y haz click en "Actualizar" abajo',
'LBL_ASOL_REBUILD_SEND' => 'Actualizar',
'LBL_ASOL_REBUILD_DONE' => 'HECHO',

// flowChart
'LBL_ASOL_REFRESH' => 'Recargar',
'LBL_ASOL_TEXT_OVERFLOW_ELLIPSIS' => 'Completar nombres',
'LBL_ASOL_INFO_TITLE' => 'Info',
'LBL_ASOL_INFO_TEXT' => '- In the flowChart there is a lot of hidden-information about the process-definition. If you hover the cursor over the items(icons and element-names) you will get some info. You have to click over the condition_icon in order to show the condition_info, and click again over the condition_icon in order to hide the condition_info.<br>- A click over the name of a element will redirect the popup´s parent_page to the definition of the element in the sugarcrm. This is useful to change values and see the flowChart at the same time. When pressing "Ctrl" key and clicking on a link => redirect to EditView (instead of DetailView when only clicking without pressing).<br>- Complete names -> this will show the whole-name of an element (for events and activities, not tasks).<br>- Events are ordered first by type and second by name. Activities are ordered by name (not for next_activities). Tasks are ordered first by task_order and second by name.<br>- Ctrl+Space => Complete names<br>- Click on connection => Change border-color of source-element and target-element',

// popupHelp
'LBL_POPUPHELP_FOR_FIELD_STATUS' => "<table class='popupHelp'><tr><th>Status</th><th>Description</th></tr><tr><td>Active</td><td>WFM instanciates processes.</td></tr><tr><td>Inactive</td><td>WFM does not instanciate processes. But it will execute processes already instanciated and stored in database.</td></tr></table>",
'LBL_POPUPHELP_FOR_FIELD_TRIGGER_MODULE' => "<table class='popupHelp'><tr><td>When modifying a wfm-process you can not change the module because of security measures.<br><br>Example 1: If you create a wfm-process with a specific module and then you create a wfm-task of type=modify_object. Note that a field that you want the wfm to modify for the first module could not exist for the second module.<br>Example 2: If you define a condition(wfm-event/wfm-activity) for a module, this could not work if you change the module(because the field does not exist in this new module).</td></tr></table>",
'LBL_POPUPHELP_FOR_FIELD_ALTERNATIVE_DATABASE' => "<table class='popupHelp'><tr><td>- External non CRM databases (the databases access must be configured in an array within config_override.php file): \$sugar_config['asolReportsAlternativeDbConnections'] </td></tr></table>",

//////////////
'LBL_REPORT_USE_ALTERNATIVE_DB' => 'Usar Base de Datos',
'LBL_REPORT_NATIVE_DB' => 'BDD Nativa del CRM',

//
'LBL_WFM_VARIABLES' => 'WFM Variables',
);
?>
