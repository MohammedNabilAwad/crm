<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$dictionary['osy_service'] = array('table' => 'osy_service',
	'unified_search' => true, 'full_text_search' => true, 'unified_search_default_enabled' => true,
	'comment' => 'osy_service activities'
                               ,'fields' => array (
  'name' =>
  array (
    'name' => 'name',
    'vname' => 'LBL_SUBJECT',
    'required' => true,
    'type' => 'name',
    'dbType' => 'varchar',
	'unified_search' => true,
	'full_text_search' => array('boost' => 3),
    'len' => '50',
    'comment' => 'osy_service name',
    'importable' => 'required',
  ),
  'accept_status' => array (
    'name' => 'accept_status',
    'vname' => 'LBL_ACCEPT_STATUS',
    'type' => 'varchar',
    'dbType' => 'varchar',
    'len' => '20',
    'source'=>'non-db',
    'massupdate'=>false,
  ),
  //bug 39559 
  'set_accept_links' => array (
    'name' => 'accept_status',
    'vname' => 'LBL_ACCEPT_LINK',
    'type' => 'varchar',
    'dbType' => 'varchar',
    'len' => '20',
    'source'=>'non-db',
    'massupdate'=>false,
  ),
  'location' =>
  array (
    'name' => 'location',
    'vname' => 'LBL_LOCATION',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'osy_service location'
  ),
  'password' =>
  array (
    'name' => 'password',
    'vname' => 'LBL_PASSWORD',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'osy_service password',
    'studio' => 'false',
    'massupdate'=>false,
  ),
  'join_url' =>
  array (
    'name' => 'join_url',
    'vname' => 'LBL_URL',
    'type' => 'varchar',
    'len' => '200',
    'comment' => 'Join URL',
    'studio' => 'false',
    'reportable' => false,
    'massupdate'=>false,
  ),
  'host_url' =>
  array (
    'name' => 'host_url',
    'vname' => 'LBL_HOST_URL',
    'type' => 'varchar',
    'len' => '400',
    'comment' => 'Host URL',
    'studio' => 'false',
    'massupdate'=>false,
    'reportable' => false,
  ),
  'displayed_url' =>
  array (
    'name' => 'displayed_url',
    'vname' => 'LBL_DISPLAYED_URL',
    'type' => 'url',
    'len' => '400',
    'comment' => 'osy_service URL',
    'massupdate'=>false,
    'studio' => 'false',
  ),
  'creator' =>
  array (
    'name' => 'creator',
    'vname' => 'LBL_CREATOR',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'osy_service creator',
    'massupdate'=>false,
    'studio' => 'false',
  ),
  'external_id' =>
  array (
    'name' => 'external_id',
    'vname' => 'LBL_EXTERNALID',
    'type' => 'varchar',
    'len' => '50',
    'comment' => 'osy_service ID for external app API',
    'massupdate'=>false,
    'studio' => 'false',
   ),
  'duration_hours' =>
  array (
    'name' => 'duration_hours',
    'vname' => 'LBL_DURATION_HOURS',
    'type' => 'int',
    'group'=>'duration',
    'len' => '3',
    'comment' => 'Duration (hours)',
    'importable' => 'required',
    'required' => true,
    'studio' => 'false',
  ),
  'duration_minutes' =>
  array (
    'name' => 'duration_minutes',
    'vname' => 'LBL_DURATION_MINUTES',
    'type' => 'int',
    'group'=>'duration',
    'len' => '2',
    'comment' => 'Duration (minutes)',
    'studio' => 'false',
  ),
  'date_start' =>
  array (
    'name' => 'date_start',
    'vname' => 'LBL_DATE',
    'type' => 'datetimecombo',
    'dbType' => 'datetime',
    'comment' => 'Date of start of osy_service',
    'importable' => 'required',
    'required' => true,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
    'validation' => array('type' => 'isbefore', 'compareto' => 'date_end', 'blank' => false),
  ),

  'date_end' =>
  array (
    'name' => 'date_end',
    'vname' => 'LBL_DATE_END',
    'type' => 'datetimecombo',
    'dbType' => 'datetime',
    'massupdate'=>false,
    'comment' => 'Date osy_service ends',
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
  ),
  'parent_type' =>
  array (
    'name' => 'parent_type',
    'vname'=>'LBL_PARENT_TYPE',
    'type' =>'parent_type',
    'dbType' => 'varchar',
    'group'=>'parent_name',
    'options'=> 'parent_type_display',
    'len' => 100,
    'comment' => 'Module osy_service is associated with',
    'studio' => array('searchview'=>false),
  ),
  'status' =>
  array (
    'name' => 'status',
    'vname' => 'LBL_STATUS',
    'type' => 'enum',
    'len' => 100,
    'options' => 'osy_service_status_dom',
    'comment' => 'osy_service status (ex: Planned, Held, Not held)',
    'default' => 'Planned',
  ),
  'type' =>
   array (
     'name' => 'type',
     'vname' => 'LBL_TYPE',
     'type' => 'enum',
     'len' => 255,
     'function' => 'getosy_serviceExternalApiDropDown',
     'comment' => 'osy_service type (ex: WebEx, Other)',
     'options' => 'eapm_list',
     'default'	=> 'Sugar',
     'massupdate' => false,
   	 'studio' => 'false',
   ),
  // Bug 24170 - Added only to allow the sidequickcreate form to work correctly
  'direction' =>
  array (
    'name' => 'direction',
    'vname' => 'LBL_DIRECTION',
    'type' => 'enum',
    'len' => 100,
    'options' => 'call_direction_dom',
    'comment' => 'Indicates whether call is inbound or outbound',
    'source' => 'non-db',
    'importable' => 'false',
    'massupdate'=>false,
    'reportable'=>false,
	'studio' => 'false',
  ),
  'parent_id' =>
  array (
    'name' => 'parent_id',
    'vname'=>'LBL_PARENT_ID',
    'type' => 'id',
    'group'=>'parent_name',
    'reportable'=>false,
    'comment' => 'ID of item indicated by parent_type',
    'studio' => array('searchview'=>false),
  ),
  'reminder_checked' => array(
    'name' => 'reminder_checked',
    'vname' => 'LBL_REMINDER',
    'type' => 'bool',
    'source' => 'non-db',
    'comment' => 'checkbox indicating whether or not the reminder value is set (Meta-data only)',
    'massupdate' => false,
   ),
  'reminder_time' =>
  array (
    'name' => 'reminder_time',
    'vname' => 'LBL_REMINDER_TIME',
    'type' => 'enum',
    'dbType' => 'int',
    'options' => 'reminder_time_options',
    'reportable' => false,
    'massupdate' => false,
    'default'=> -1,
    'comment' => 'Specifies when a reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start'
  ),  
  'email_reminder_checked' => array(
    'name' => 'email_reminder_checked',
    'vname' => 'LBL_EMAIL_REMINDER',
    'type' => 'bool',
    'source' => 'non-db',
    'comment' => 'checkbox indicating whether or not the email reminder value is set (Meta-data only)',
    'massupdate' => false,
   ),  
  'email_reminder_time' =>
  array (
    'name' => 'email_reminder_time',
    'vname' => 'LBL_EMAIL_REMINDER_TIME',
    'type' => 'enum',
    'dbType' => 'int',
    'options' => 'reminder_time_options',
    'reportable' => false,
    'massupdate' => false,
    'default'=> -1,
    'comment' => 'Specifies when a email reminder alert should be issued; -1 means no alert; otherwise the number of seconds prior to the start'
  ),  
  'email_reminder_sent' => array( 
    'name' => 'email_reminder_sent',
    'vname' => 'LBL_EMAIL_REMINDER_SENT',
    'default' => 0,
    'type' => 'bool',
    'comment' => 'Whether email reminder is already sent',
    'studio' => false,
    'massupdate'=> false,
   ), 
   'outlook_id' =>
  array (
    'name' => 'outlook_id',
    'vname' => 'LBL_OUTLOOK_ID',
    'type' => 'varchar',
    'len' => '255',
    'reportable' => false,
    'massupdate'=>false,
    'comment' => 'When the Sugar Plug-in for Microsoft Outlook syncs an Outlook appointment, this is the Outlook appointment item ID'
  ),
   'sequence' =>
  array (
    'name' => 'sequence',
    'vname' => 'LBL_SEQUENCE',
    'type' => 'int',
    'len' => '11',
    'reportable' => false,
    'default'=>0,
    'comment' => 'osy_service update sequence for osy_service as per iCalendar standards',
  ),

  'contact_name' =>
  array (
    'name' => 'contact_name',
    'rname' => 'last_name',
    'db_concat_fields'=> array(0=>'first_name', 1=>'last_name'),
    'id_name' => 'contact_id',
    'massupdate' => false,
    'vname' => 'LBL_CONTACT_NAME',
    'type' => 'relate',
    'link'=>'contacts',
    'table' => 'contacts',
    'isnull' => 'true',
    'module' => 'Contacts',
    'join_name' => 'contacts',
    'dbType' => 'varchar',
    'source'=>'non-db',
    'len' => 36,
  	'studio' => 'false',
	),

  'contacts' =>
  array (
  	'name' => 'contacts',
    'type' => 'link',
    'relationship' => 'osy_service_contacts',
    'source'=>'non-db',
		'vname'=>'LBL_CONTACTS',
  ),
   'parent_name'=>
 	array(
		'name'=> 'parent_name',
		'parent_type'=>'record_type_display' ,
		'type_name'=>'parent_type',
		'id_name'=>'parent_id',
		'vname'=>'LBL_LIST_RELATED_TO',
		'type'=>'parent',
		'group'=>'parent_name',
		'source'=>'non-db',
		'options'=> 'parent_type_display',
		),
  'users' =>
  array (
  	'name' => 'users',
    'type' => 'link',
    'relationship' => 'osy_service_users',
    'source'=>'non-db',
		'vname'=>'LBL_USERS',
  ),
  'accounts' =>
  array (
  	'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'account_osy_service',
    'source'=>'non-db',
		'vname'=>'LBL_ACCOUNT',
  ),
  'leads' =>
  array (
    'name' => 'leads',
    'type' => 'link',
    'relationship' => 'osy_service_leads',
    'source'=>'non-db',
        'vname'=>'LBL_LEADS',
  ),
  'opportunity' =>
  array (
  	'name' => 'opportunity',
    'type' => 'link',
    'relationship' => 'opportunity_osy_service',
    'source'=>'non-db',
		'vname'=>'LBL_OPPORTUNITY',
  ),
  'case' =>
  array (
  	'name' => 'case',
    'type' => 'link',
    'relationship' => 'case_osy_service',
    'source'=>'non-db',
		'vname'=>'LBL_CASE',
  ),
    'notes' =>
  array (
  	'name' => 'notes',
    'type' => 'link',
    'relationship' => 'osy_service_notes',
    'module'=>'Notes',
    'bean_name'=>'Note',
    'source'=>'non-db',
		'vname'=>'LBL_NOTES',
  ),
	'contact_id' => array(
		'name' => 'contact_id',
		'type' => 'id',
		'source' => 'non-db',
	),
	'repeat_type' =>
	array(
		'name' => 'repeat_type',
		'vname' => 'LBL_REPEAT_TYPE',
		'type' => 'enum',
		'len' => 36,
		'options' => 'repeat_type_dom',
		'comment' => 'Type of recurrence',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),	
	'repeat_interval' =>
	array(
		'name' => 'repeat_interval',
		'vname' => 'LBL_REPEAT_INTERVAL',
		'type' => 'int',
		'len' => 3,
		'default' => 1,
		'comment' => 'Interval of recurrence',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),	
	'repeat_dow' =>
	array(
		'name' => 'repeat_dow',
		'vname' => 'LBL_REPEAT_DOW',
		'type' => 'varchar',
		'len' => 7,
		'comment' => 'Days of week in recurrence',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),	
	'repeat_until' =>
	array(
		'name' => 'repeat_until',
		'vname' => 'LBL_REPEAT_UNTIL',
		'type' => 'date',
		'comment' => 'Repeat until specified date',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),	
	'repeat_count' =>
	array(
		'name' => 'repeat_count',
		'vname' => 'LBL_REPEAT_COUNT',
		'type' => 'int',
		'len' => 7,
		'comment' => 'Number of recurrence',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),
	'repeat_parent_id' =>
	array(
		'name' => 'repeat_parent_id',
		'vname' => 'LBL_REPEAT_PARENT_ID',
		'type' => 'id',
		'len' => 36,
		'comment' => 'Id of the first element of recurring records',
		'importable' => 'false',
		'massupdate' => false,
		'reportable' => false,
		'studio' => 'false',
	),
	'recurring_source' =>
	array(
		'name' => 'recurring_source',
		'vname' => 'LBL_RECURRING_SOURCE',
		'type' => 'varchar',
		'len' => 36,
		'comment' => 'Source of recurring osy_service',
		'importable' => false,
		'massupdate' => false,
		'reportable' => false,
		'studio' => false,
	),
	'duration' =>
	array(
		'name' => 'duration',
		'vname' => 'LBL_DURATION',
		'type' => 'enum',
		'options' => 'duration_dom',
		'source' => 'non-db',
		'comment' => 'Duration handler dropdown',
		'massupdate' => false,
		'reportable' => false,
		'importable' => false,
	),
),
 'relationships' => array (
	  'osy_service_assigned_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'osy_service', 'rhs_table'=> 'osy_service', 'rhs_key' => 'assigned_user_id',
   'relationship_type'=>'one-to-many')

   ,'osy_service_modified_user' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'osy_service', 'rhs_table'=> 'osy_service', 'rhs_key' => 'modified_user_id',
   'relationship_type'=>'one-to-many')

   ,'osy_service_created_by' =>
   array('lhs_module'=> 'Users', 'lhs_table'=> 'users', 'lhs_key' => 'id',
   'rhs_module'=> 'osy_service', 'rhs_table'=> 'osy_service', 'rhs_key' => 'created_by',
   'relationship_type'=>'one-to-many')

	,'osy_service_notes' => array('lhs_module'=> 'osy_service', 'lhs_table'=> 'osy_service', 'lhs_key' => 'id',
							  'rhs_module'=> 'Notes', 'rhs_table'=> 'notes', 'rhs_key' => 'parent_id',
							  'relationship_type'=>'one-to-many', 'relationship_role_column'=>'parent_type',
							  'relationship_role_column_value'=>'osy_service')
	)

                                                      , 'indices' => array (
       array('name' =>'idx_mtg_name', 'type'=>'index', 'fields'=>array('name')),
       array('name' =>'idx_meet_par_del', 'type'=>'index', 'fields'=>array('parent_id','parent_type','deleted')),
       array('name' => 'idx_meet_stat_del', 'type' => 'index', 'fields'=> array('assigned_user_id', 'status', 'deleted')),
       array('name' => 'idx_meet_date_start', 'type' => 'index', 'fields'=> array('date_start')),

                                                   )
//This enables optimistic locking for Saves From EditView
	,'optimistic_locking'=>true,
                            );

VardefManager::createVardef('osy_service','osy_service', array('default', 'assignable',
));
?>
