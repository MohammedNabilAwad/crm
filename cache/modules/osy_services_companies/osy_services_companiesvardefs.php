<?php 
 $GLOBALS["dictionary"]["osy_services_companies"]=array (
  'table' => 'osy_services_companies',
  'audited' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'dbType' => 'varchar',
      'len' => 255,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'required' => true,
      'importable' => 'required',
      'duplicate_merge' => 'enabled',
      'merge_filter' => 'selected',
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'group' => 'created_by_name',
      'comment' => 'Date record created',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'group' => 'modified_by_name',
      'comment' => 'Date record last modified',
      'enable_range_search' => true,
      'options' => 'date_range_search_dom',
      'inline_edit' => false,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'group' => 'modified_by_name',
      'dbType' => 'id',
      'reportable' => true,
      'comment' => 'User who last modified record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'modified_by_name' => 
    array (
      'name' => 'modified_by_name',
      'vname' => 'LBL_MODIFIED_NAME',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'rname' => 'user_name',
      'table' => 'users',
      'id_name' => 'modified_user_id',
      'module' => 'Users',
      'link' => 'modified_user_link',
      'duplicate_merge' => 'disabled',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'group' => 'created_by_name',
      'comment' => 'User who created record',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'created_by_name' => 
    array (
      'name' => 'created_by_name',
      'vname' => 'LBL_CREATED',
      'type' => 'relate',
      'reportable' => false,
      'link' => 'created_by_link',
      'rname' => 'user_name',
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'created_by',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
      'importable' => 'false',
      'massupdate' => false,
      'inline_edit' => false,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_DESCRIPTION',
      'type' => 'text',
      'comment' => 'Full text of the note',
      'rows' => 6,
      'cols' => 80,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'default' => '0',
      'reportable' => false,
      'comment' => 'Record deletion indicator',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'osy_services_companies_created_by',
      'vname' => 'LBL_CREATED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'osy_services_companies_modified_user',
      'vname' => 'LBL_MODIFIED_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_TO_ID',
      'group' => 'assigned_user_name',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'reportable' => true,
      'isnull' => 'false',
      'dbType' => 'id',
      'audited' => true,
      'comment' => 'User ID assigned to record',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'link' => 'assigned_user_link',
      'vname' => 'LBL_ASSIGNED_TO_NAME',
      'rname' => 'user_name',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'users',
      'id_name' => 'assigned_user_id',
      'module' => 'Users',
      'duplicate_merge' => 'disabled',
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'osy_services_companies_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
      'duplicate_merge' => 'enabled',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'table' => 'users',
    ),
    'parent_id' => 
    array (
      'name' => 'parent_id',
      'vname' => 'LBL_PARENT_ACCOUNT_ID',
      'type' => 'id',
      'required' => false,
      'reportable' => false,
      'audited' => true,
    ),
    'parent_name' => 
    array (
      'name' => 'parent_name',
      'rname' => 'name',
      'id_name' => 'parent_id',
      'vname' => 'LBL_MEMBER_OF',
      'type' => 'relate',
      'isnull' => 'true',
      'module' => 'osy_services_companies',
      'table' => 'osy_services_companies',
      'massupdate' => false,
      'source' => 'non-db',
      'len' => 36,
      'link' => 'member_of',
      'unified_search' => true,
      'importable' => 'true',
    ),
    'tasks' => 
    array (
      'name' => 'tasks',
      'type' => 'link',
      'relationship' => 'osy_services_companies_tasks',
      'module' => 'Tasks',
      'bean_name' => 'Task',
      'source' => 'non-db',
      'vname' => 'LBL_TASKS',
    ),
    'meetings' => 
    array (
      'name' => 'meetings',
      'type' => 'link',
      'relationship' => 'osy_services_companies_meetings',
      'module' => 'Meetings',
      'bean_name' => 'Meeting',
      'source' => 'non-db',
      'vname' => 'LBL_MEETINGS',
    ),
    'calls' => 
    array (
      'name' => 'calls',
      'type' => 'link',
      'relationship' => 'osy_services_companies_calls',
      'module' => 'Calls',
      'bean_name' => 'Call',
      'source' => 'non-db',
      'vname' => 'LBL_CALLS',
    ),
    'notes' => 
    array (
      'name' => 'notes',
      'type' => 'link',
      'relationship' => 'osy_services_companies_notes',
      'module' => 'Notes',
      'bean_name' => 'Note',
      'source' => 'non-db',
      'vname' => 'LBL_NOTES',
    ),
    'mode_of_intervention' => 
    array (
      'name' => 'mode_of_intervention',
      'vname' => 'LBL_MODE_OF_INTERVENTION',
      'comment' => '',
      'required' => false,
      'type' => 'multienum',
      'massupdate' => 0,
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 255,
      'size' => '255',
      'options' => 'osy_services_companies_mode_of_intervention_list',
      'studio' => 'visible',
    ),
    'subject' => 
    array (
      'name' => 'subject',
      'vname' => 'LBL_SUBJECT',
      'options' => 'osy_services_companies_subject_list',
      'type' => 'enum',
      'len' => '50',
      'required' => false,
      'inline_edit' => true,
    ),
    'subject_description' => 
    array (
      'name' => 'subject_description',
      'vname' => 'LBL_SUBJECT_DESCRIPTION',
      'options' => 'osy_services_companies_subject_description_list',
      'type' => 'enum',
      'len' => '50',
      'required' => false,
      'visibility_grid' => 
      array (
        'trigger' => 'subject',
        'values' => 
        array (
          'Trade' => 
          array (
            0 => '',
          ),
          'Company management' => 
          array (
            0 => '',
          ),
          'Access to finance' => 
          array (
            0 => '',
          ),
          'Other' => 
          array (
            0 => '',
          ),
          'Individual labour law and HR' => 
          array (
            0 => 'Employment contract',
            1 => 'End of contract - Dismissal',
            2 => 'Disciplinary issues',
            3 => 'Working time',
            4 => 'Wage and benefits',
            5 => 'Training',
            6 => 'Holiday entitlements',
            7 => 'Sickness and other suspensions',
            8 => 'Social security',
            9 => 'Open fields',
          ),
          'Collective labour law and HR' => 
          array (
            0 => 'Collective dispute- strike',
            1 => 'Trade unions issues',
            2 => 'OSH',
            3 => 'Social security contributions',
            4 => 'Wages',
            5 => 'Outsourcing',
            6 => 'Collective agreements',
            7 => 'Open fields',
          ),
          'Tax' => 
          array (
            0 => 'VAT',
            1 => 'Company tax',
            2 => 'Personal income tax',
          ),
          'Data information' => 
          array (
            0 => 'Economic situation',
            1 => 'EO matters',
            2 => 'Social situation',
          ),
        ),
      ),
    ),
    'duration' => 
    array (
      'name' => 'duration',
      'vname' => 'LBL_DURATION',
      'type' => 'varchar',
      'len' => '255',
      'required' => false,
    ),
    'accounts' => 
    array (
      'name' => 'accounts',
      'type' => 'link',
      'relationship' => 'accounts_osy_services_companies',
      'source' => 'non-db',
      'vname' => 'LBL_ACCOUNTS',
    ),
    'osy_account_id' => 
    array (
      'name' => 'osy_account_id',
      'vname' => 'LBL_ACCOUNT_ID',
      'type' => 'id',
      'massupdate' => 0,
      'default' => '',
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => true,
      'reportable' => true,
      'calculated' => false,
      'len' => '36',
      'size' => '36',
      'studio' => 'visible',
    ),
    'account_name' => 
    array (
      'source' => 'non-db',
      'name' => 'account_name',
      'vname' => 'LBL_ACCOUNT_NAME',
      'type' => 'relate',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'rname' => 'name',
      'table' => 'accounts',
      'id_name' => 'osy_account_id',
      'save' => true,
      'ext2' => 'members',
      'module' => 'Accounts',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'lead_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'rname' => 'account_name',
      'name' => 'lead_name',
      'vname' => 'LBL_LEAD_NAME',
      'type' => 'relate',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'lead_id',
      'link' => 'leads',
      'ext2' => 'Leads',
      'module' => 'Leads',
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'lead_id' => 
    array (
      'required' => false,
      'name' => 'lead_id',
      'vname' => 'LBL_LEAD_ID',
      'type' => 'id',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 36,
    ),
    'leads' => 
    array (
      'name' => 'leads',
      'type' => 'link',
      'relationship' => 'leads_osy_services_companies',
      'source' => 'non-db',
      'vname' => 'LBL_LEADS',
    ),
    'payment_status_c' => 
    array (
      'required' => false,
      'name' => 'payment_status_c',
      'vname' => 'LBL_PAYMENT_STATUS',
      'type' => 'enum',
      'massupdate' => '1',
      'default' => '',
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'payment_status_list',
      'studio' => 'visible',
      'dependency' => 'ifElse(eq($is_free_of_charge_c,"yes"),false,true)',
    ),
    'contact_id' => 
    array (
      'required' => false,
      'name' => 'contact_id',
      'vname' => 'LBL_CONTACT_ID',
      'type' => 'id',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 36,
    ),
    'contact_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'rname' => 'name',
      'name' => 'contact_name',
      'vname' => 'LBL_CONTACT_NAME',
      'type' => 'relate',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'contact_id',
      'link' => 'contacts',
      'module' => 'Contacts',
      'save' => true,
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'contacts' => 
    array (
      'name' => 'contacts',
      'type' => 'link',
      'relationship' => 'contact_osy_services_companies',
      'source' => 'non-db',
      'vname' => 'LBL_CONTACT_ID',
    ),
    'osy_contactspotentialmember_id' => 
    array (
      'required' => false,
      'name' => 'osy_contactspotentialmember_id',
      'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_ID',
      'type' => 'id',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => 0,
      'audited' => 0,
      'reportable' => 0,
      'len' => 36,
    ),
    'osy_contactspotentialmember_name' => 
    array (
      'required' => false,
      'source' => 'non-db',
      'rname' => 'name',
      'name' => 'osy_contactspotentialmember_name',
      'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_NAME',
      'type' => 'relate',
      'massupdate' => 0,
      'comments' => '',
      'help' => '',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => 0,
      'reportable' => 0,
      'len' => '255',
      'id_name' => 'osy_contactspotentialmember_id',
      'link' => 'osy_contactspotentialmembers',
      'module' => 'osy_contactspotentialmember',
      'save' => true,
      'quicksearch' => 'enabled',
      'studio' => 'visible',
    ),
    'osy_contactspotentialmembers' => 
    array (
      'name' => 'osy_contactspotentialmembers',
      'type' => 'link',
      'relationship' => 'osy_contactspotentialmember_osy_services_companies',
      'source' => 'non-db',
      'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_ID',
    ),
    'service_free_charge_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'هل الخدمة مجانية ؟:',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'service_free_charge_c',
      'vname' => 'LBL_SERVICE_FREE_CHARGE',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'dom_email_bool',
      'studio' => 'visible',
      'dependency' => NULL,
      'id' => 'osy_services_companiesservice_free_charge_c',
      'custom_module' => 'osy_services_companies',
    ),
    'status_service_c' => 
    array (
      'inline_edit' => '1',
      'labelValue' => 'Status of the Service:',
      'required' => false,
      'source' => 'custom_fields',
      'name' => 'status_service_c',
      'vname' => 'LBL_STATUS_SERVICE',
      'type' => 'enum',
      'massupdate' => '0',
      'default' => NULL,
      'no_default' => false,
      'comments' => '',
      'help' => '',
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'unified_search' => false,
      'merge_filter' => 'disabled',
      'len' => 100,
      'size' => '20',
      'options' => 'service_status_0',
      'studio' => 'visible',
      'dependency' => false,
      'id' => 'osy_services_companiesstatus_service_c',
      'custom_module' => 'osy_services_companies',
    ),
  ),
  'relationships' => 
  array (
    'osy_services_companies_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_services_companies',
      'rhs_table' => 'osy_services_companies',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'osy_services_companies_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_services_companies',
      'rhs_table' => 'osy_services_companies',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'osy_services_companies_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_services_companies',
      'rhs_table' => 'osy_services_companies',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'osy_services_companies_tasks' => 
    array (
      'lhs_module' => 'osy_services_companies',
      'lhs_table' => 'osy_services_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Tasks',
      'rhs_table' => 'tasks',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'osy_services_companies',
    ),
    'osy_services_companies_calls' => 
    array (
      'lhs_module' => 'osy_services_companies',
      'lhs_table' => 'osy_services_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Calls',
      'rhs_table' => 'calls',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'osy_services_companies',
    ),
    'osy_services_companies_meetings' => 
    array (
      'lhs_module' => 'osy_services_companies',
      'lhs_table' => 'osy_services_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Meetings',
      'rhs_table' => 'meetings',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'osy_services_companies',
    ),
    'osy_services_companies_notes' => 
    array (
      'lhs_module' => 'osy_services_companies',
      'lhs_table' => 'osy_services_companies',
      'lhs_key' => 'id',
      'rhs_module' => 'Notes',
      'rhs_table' => 'notes',
      'rhs_key' => 'parent_id',
      'relationship_type' => 'one-to-many',
      'relationship_role_column' => 'parent_type',
      'relationship_role_column_value' => 'osy_services_companies',
    ),
    'contact_osy_services_companies' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_services_companies',
      'rhs_table' => 'osy_services_companies',
      'rhs_key' => 'contact_id',
      'relationship_type' => 'one-to-many',
    ),
    'osy_contactspotentialmember_osy_services_companies' => 
    array (
      'lhs_module' => 'osy_contactspotentialmember',
      'lhs_table' => 'osy_contactspotentialmember',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_services_companies',
      'rhs_table' => 'osy_services_companies',
      'rhs_key' => 'osy_contactspotentialmember_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'osy_services_companiespk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => true,
);