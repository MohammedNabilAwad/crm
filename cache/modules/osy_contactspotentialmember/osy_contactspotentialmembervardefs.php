<?php 
 $GLOBALS["dictionary"]["osy_contactspotentialmember"]=array (
  'table' => 'osy_contactspotentialmember',
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
      'rname' => 'name',
      'vname' => 'LBL_NAME',
      'type' => 'name',
      'link' => true,
      'fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '255',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'importable' => 'false',
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
      'importable' => false,
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
      'importable' => false,
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
      'importable' => false,
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
      'importable' => false,
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
      'importable' => false,
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
      'importable' => false,
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'osy_contactspotentialmember_created_by',
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
      'relationship' => 'osy_contactspotentialmember_modified_user',
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
      'relationship' => 'osy_contactspotentialmember_assigned_user',
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
    'salutation' => 
    array (
      'name' => 'salutation',
      'vname' => 'LBL_SALUTATION',
      'type' => 'enum',
      'options' => 'salutation_dom',
      'massupdate' => false,
      'len' => '255',
      'comment' => 'Contact salutation (e.g., Mr, Ms)',
      'importable' => false,
    ),
    'first_name' => 
    array (
      'name' => 'first_name',
      'vname' => 'LBL_FIRST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'First name of the contact',
      'merge_filter' => 'selected',
    ),
    'last_name' => 
    array (
      'name' => 'last_name',
      'vname' => 'LBL_LAST_NAME',
      'type' => 'varchar',
      'len' => '100',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 3,
      ),
      'comment' => 'Last name of the contact',
      'merge_filter' => 'selected',
      'required' => true,
      'importable' => 'required',
    ),
    'full_name' => 
    array (
      'name' => 'full_name',
      'rname' => 'full_name',
      'vname' => 'LBL_NAME',
      'type' => 'fullname',
      'fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'sort_on' => 'last_name',
      'source' => 'non-db',
      'group' => 'last_name',
      'len' => '510',
      'db_concat_fields' => 
      array (
        0 => 'first_name',
        1 => 'last_name',
      ),
      'studio' => 
      array (
        'listview' => false,
      ),
      'importable' => false,
    ),
    'title' => 
    array (
      'name' => 'title',
      'vname' => 'LBL_TITLE',
      'type' => 'varchar',
      'len' => '100',
      'comment' => 'The title of the contact',
      'importable' => false,
    ),
    'photo' => 
    array (
      'name' => 'photo',
      'vname' => 'LBL_PHOTO',
      'type' => 'image',
      'massupdate' => false,
      'comments' => '',
      'help' => '',
      'importable' => false,
      'reportable' => true,
      'len' => 255,
      'dbType' => 'varchar',
      'width' => '160',
      'height' => '160',
      'studio' => 
      array (
        'listview' => true,
      ),
    ),
    'department' => 
    array (
      'name' => 'department',
      'vname' => 'LBL_DEPARTMENT',
      'type' => 'varchar',
      'len' => '255',
      'comment' => 'The department of the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'do_not_call' => 
    array (
      'name' => 'do_not_call',
      'vname' => 'LBL_DO_NOT_CALL',
      'type' => 'bool',
      'default' => '0',
      'audited' => true,
      'comment' => 'An indicator of whether contact can be called',
    ),
    'phone_home' => 
    array (
      'name' => 'phone_home',
      'vname' => 'LBL_HOME_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Home phone number of the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'email' => 
    array (
      'name' => 'email',
      'type' => 'email',
      'query_type' => 'default',
      'source' => 'non-db',
      'operator' => 'subquery',
      'subquery' => 'SELECT eabr.bean_id FROM email_addr_bean_rel eabr JOIN email_addresses ea ON (ea.id = eabr.email_address_id) WHERE eabr.deleted=0 AND ea.email_address LIKE',
      'db_field' => 
      array (
        0 => 'id',
      ),
      'vname' => 'LBL_ANY_EMAIL',
      'studio' => 
      array (
        'visible' => false,
        'searchview' => true,
      ),
      'importable' => false,
    ),
    'phone_mobile' => 
    array (
      'name' => 'phone_mobile',
      'vname' => 'LBL_MOBILE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Mobile phone number of the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'phone_work' => 
    array (
      'name' => 'phone_work',
      'vname' => 'LBL_OFFICE_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'audited' => true,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Work phone number of the contact',
      'merge_filter' => 'enabled',
    ),
    'phone_other' => 
    array (
      'name' => 'phone_other',
      'vname' => 'LBL_OTHER_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Other phone number for the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'phone_fax' => 
    array (
      'name' => 'phone_fax',
      'vname' => 'LBL_FAX_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Contact fax number',
      'merge_filter' => 'enabled',
    ),
    'email1' => 
    array (
      'name' => 'email1',
      'vname' => 'LBL_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email1',
      'merge_filter' => 'enabled',
      'studio' => 
      array (
        'editview' => true,
        'editField' => true,
        'searchview' => false,
        'popupsearch' => false,
      ),
      'full_text_search' => 
      array (
        'boost' => 3,
        'analyzer' => 'whitespace',
      ),
    ),
    'email2' => 
    array (
      'name' => 'email2',
      'vname' => 'LBL_OTHER_EMAIL_ADDRESS',
      'type' => 'varchar',
      'function' => 
      array (
        'name' => 'getEmailAddressWidget',
        'returns' => 'html',
      ),
      'source' => 'non-db',
      'group' => 'email2',
      'merge_filter' => 'enabled',
      'studio' => 'false',
      'importable' => false,
    ),
    'invalid_email' => 
    array (
      'name' => 'invalid_email',
      'vname' => 'LBL_INVALID_EMAIL',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
      'importable' => false,
    ),
    'email_opt_out' => 
    array (
      'name' => 'email_opt_out',
      'vname' => 'LBL_EMAIL_OPT_OUT',
      'source' => 'non-db',
      'type' => 'bool',
      'massupdate' => false,
      'studio' => 'false',
      'importable' => false,
    ),
    'lawful_basis' => 
    array (
      'name' => 'lawful_basis',
      'vname' => 'LBL_LAWFUL_BASIS',
      'type' => 'multienum',
      'massupdate' => true,
      'no_default' => false,
      'comments' => '',
      'inline_edit' => true,
      'reportable' => true,
      'merge_filter' => 'enabled',
      'len' => 100,
      'size' => '20',
      'options' => 'lawful_basis_dom',
      'audited' => true,
      'importable' => true,
    ),
    'date_reviewed' => 
    array (
      'name' => 'date_reviewed',
      'vname' => 'LBL_DATE_REVIEWED',
      'type' => 'date',
      'massupdate' => true,
      'audited' => true,
      'importable' => true,
    ),
    'lawful_basis_source' => 
    array (
      'name' => 'lawful_basis_source',
      'vname' => 'LBL_LAWFUL_BASIS_SOURCE',
      'type' => 'enum',
      'massupdate' => true,
      'no_default' => false,
      'comments' => '',
      'inline_edit' => true,
      'reportable' => true,
      'merge_filter' => 'enabled',
      'len' => 100,
      'size' => '20',
      'options' => 'lawful_basis_source_dom',
      'audited' => true,
      'importable' => true,
    ),
    'primary_address_street' => 
    array (
      'name' => 'primary_address_street',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'primary_address',
      'comment' => 'Street address for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_street_2' => 
    array (
      'name' => 'primary_address_street_2',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
      'importable' => false,
    ),
    'primary_address_street_3' => 
    array (
      'name' => 'primary_address_street_3',
      'vname' => 'LBL_PRIMARY_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
      'importable' => false,
    ),
    'primary_address_city' => 
    array (
      'name' => 'primary_address_city',
      'vname' => 'LBL_PRIMARY_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'City for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_state' => 
    array (
      'name' => 'primary_address_state',
      'vname' => 'LBL_PRIMARY_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'primary_address',
      'comment' => 'State for primary address',
      'merge_filter' => 'disabled',
      'inline_edit' => true,
      'comments' => 'State for primary address',
    ),
    'primary_address_postalcode' => 
    array (
      'name' => 'primary_address_postalcode',
      'vname' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'primary_address',
      'comment' => 'Postal code for primary address',
      'merge_filter' => 'enabled',
    ),
    'primary_address_country' => 
    array (
      'name' => 'primary_address_country',
      'vname' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'primary_address',
      'comment' => 'Country for primary address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street' => 
    array (
      'name' => 'alt_address_street',
      'vname' => 'LBL_ALT_ADDRESS_STREET',
      'type' => 'varchar',
      'len' => '150',
      'group' => 'alt_address',
      'comment' => 'Street address for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_street_2' => 
    array (
      'name' => 'alt_address_street_2',
      'vname' => 'LBL_ALT_ADDRESS_STREET_2',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
      'importable' => false,
    ),
    'alt_address_street_3' => 
    array (
      'name' => 'alt_address_street_3',
      'vname' => 'LBL_ALT_ADDRESS_STREET_3',
      'type' => 'varchar',
      'len' => '150',
      'source' => 'non-db',
      'importable' => false,
    ),
    'alt_address_city' => 
    array (
      'name' => 'alt_address_city',
      'vname' => 'LBL_ALT_ADDRESS_CITY',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'City for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_state' => 
    array (
      'name' => 'alt_address_state',
      'vname' => 'LBL_ALT_ADDRESS_STATE',
      'type' => 'varchar',
      'len' => '100',
      'group' => 'alt_address',
      'comment' => 'State for alternate address',
      'merge_filter' => 'disabled',
      'inline_edit' => true,
      'comments' => 'State for alternate address',
    ),
    'alt_address_postalcode' => 
    array (
      'name' => 'alt_address_postalcode',
      'vname' => 'LBL_ALT_ADDRESS_POSTALCODE',
      'type' => 'varchar',
      'len' => '20',
      'group' => 'alt_address',
      'comment' => 'Postal code for alternate address',
      'merge_filter' => 'enabled',
    ),
    'alt_address_country' => 
    array (
      'name' => 'alt_address_country',
      'vname' => 'LBL_ALT_ADDRESS_COUNTRY',
      'type' => 'varchar',
      'group' => 'alt_address',
      'comment' => 'Country for alternate address',
      'merge_filter' => 'enabled',
    ),
    'assistant' => 
    array (
      'name' => 'assistant',
      'vname' => 'LBL_ASSISTANT',
      'type' => 'varchar',
      'len' => '75',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 2,
      ),
      'comment' => 'Name of the assistant of the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'assistant_phone' => 
    array (
      'name' => 'assistant_phone',
      'vname' => 'LBL_ASSISTANT_PHONE',
      'type' => 'phone',
      'dbType' => 'varchar',
      'len' => 100,
      'group' => 'assistant',
      'unified_search' => true,
      'full_text_search' => 
      array (
        'boost' => 1,
      ),
      'comment' => 'Phone number of the assistant of the contact',
      'merge_filter' => 'enabled',
      'importable' => false,
    ),
    'email_addresses_primary' => 
    array (
      'name' => 'email_addresses_primary',
      'type' => 'link',
      'relationship' => 'osy_contactspotentialmember_email_addresses_primary',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESS_PRIMARY',
      'duplicate_merge' => 'disabled',
    ),
    'email_addresses' => 
    array (
      'name' => 'email_addresses',
      'type' => 'link',
      'relationship' => 'osy_contactspotentialmember_email_addresses',
      'module' => 'EmailAddress',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_ADDRESSES',
      'reportable' => false,
      'unified_search' => true,
      'rel_fields' => 
      array (
        'primary_address' => 
        array (
          'type' => 'bool',
        ),
      ),
    ),
    'email_addresses_non_primary' => 
    array (
      'name' => 'email_addresses_non_primary',
      'type' => 'email',
      'source' => 'non-db',
      'vname' => 'LBL_EMAIL_NON_PRIMARY',
      'studio' => false,
      'reportable' => false,
      'massupdate' => false,
    ),
    'primary_address_pobox_c' => 
    array (
      'required' => false,
      'name' => 'primary_address_pobox_c',
      'vname' => 'LBL_BILLING_ADDRESS_POBOX',
      'type' => 'varchar',
      'massupdate' => '0',
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
      'len' => '255',
      'size' => '20',
    ),
    'primary_address_region_c' => 
    array (
      'required' => false,
      'name' => 'primary_address_region_c',
      'vname' => 'LBL_BILLING_ADDRESS_REGION',
      'type' => 'varchar',
      'massupdate' => '0',
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
      'len' => '255',
      'size' => '20',
    ),
    'alt_address_pobox_c' => 
    array (
      'required' => false,
      'name' => 'alt_address_pobox_c',
      'vname' => 'LBL_ALT_ADDRESS_POBOX',
      'type' => 'varchar',
      'massupdate' => '0',
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
      'len' => '255',
      'size' => '20',
    ),
    'alt_address_region_c' => 
    array (
      'required' => false,
      'name' => 'alt_address_region_c',
      'vname' => 'LBL_ALT_ADDRESS_REGION',
      'type' => 'varchar',
      'massupdate' => '0',
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
      'len' => '255',
      'size' => '20',
    ),
    'primary_address_other' => 
    array (
      'name' => 'primary_address_other',
      'vname' => 'LBL_PRIMARY_ADDRESS_OTHER',
      'type' => 'varchar',
      'len' => '255',
      'required' => false,
    ),
    'alt_address_other' => 
    array (
      'name' => 'alt_address_other',
      'vname' => 'LBL_ALT_ADDRESS_OTHER',
      'type' => 'varchar',
      'len' => '255',
      'required' => false,
    ),
    'role_function' => 
    array (
      'name' => 'role_function',
      'vname' => 'LBL_ROLE_FUNCTION',
      'type' => 'enum',
      'options' => 'osy_role_function_list',
      'len' => '255',
    ),
    'other_role_function' => 
    array (
      'name' => 'other_role_function',
      'vname' => 'LBL_OTHER_ROLE_FUNCTION',
      'type' => 'varchar',
      'len' => '255',
    ),
    'vip' => 
    array (
      'name' => 'vip',
      'vname' => 'LBL_VIP',
      'type' => 'bool',
    ),
    'category' => 
    array (
      'name' => 'category',
      'vname' => 'LBL_CATEGORY',
      'type' => 'enum',
      'options' => 'osy_categories_list',
      'len' => '255',
    ),
    'contact_type' => 
    array (
      'name' => 'contact_type',
      'vname' => 'LBL_CONTACT_TYPE',
      'type' => 'enum',
      'options' => 'osy_contact_type_list',
      'len' => '255',
      'importable' => false,
    ),
    'gender' => 
    array (
      'required' => false,
      'name' => 'gender',
      'vname' => 'LBL_GENDER',
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
      'options' => 'gender_0',
      'studio' => 'visible',
      'dependency' => false,
    ),
    'main_representative' => 
    array (
      'required' => false,
      'name' => 'main_representative',
      'vname' => 'LBL_MAIN_REPRESENTATIVE',
      'type' => 'bool',
      'massupdate' => '0',
      'default' => '0',
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
      'len' => '255',
      'size' => '20',
      'studio' => 'visible',
    ),
    'lead_id' => 
    array (
      'required' => false,
      'name' => 'lead_id',
      'rname' => 'id',
      'id_name' => 'lead_id',
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
      'importable' => 1,
    ),
    'lead_name' => 
    array (
      'required' => true,
      'source' => 'non-db',
      'rname' => 'account_name',
      'db_concat_fields' => 
      array (
        0 => 'account_name',
      ),
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
      'link' => 'leads_link',
      'module' => 'Leads',
      'save' => true,
      'quicksearch' => 'enabled',
      'studio' => 'visible',
      'importable' => 1,
    ),
    'leads_link' => 
    array (
      'name' => 'leads_link',
      'type' => 'link',
      'relationship' => 'osy_contactspotentialmember_lead',
      'source' => 'non-db',
      'vname' => 'LBL_LEAD_ID',
    ),
    'prospect_lists_link' => 
    array (
      'name' => 'prospect_lists_link',
      'type' => 'link',
      'relationship' => 'prospectlist_osy_contactspotentialmember',
      'module' => 'ProspectLists',
      'source' => 'non-db',
      'vname' => 'LBL_PROSPECT_LIST',
    ),
    'industry' => 
    array (
      'name' => 'industry',
      'vname' => 'LBL_INDUSTRY',
      'comment' => '',
      'required' => false,
      'type' => 'multienum',
      'massupdate' => 0,
      'importable' => 'true',
      'duplicate_merge' => 'disabled',
      'duplicate_merge_dom_value' => '0',
      'audited' => false,
      'reportable' => true,
      'len' => 300,
      'size' => '300',
      'options' => 'osy_industries_list',
      'studio' => 'visible',
      'isMultiSelect' => true,
    ),
    'fp_events' => 
    array (
      'name' => 'fp_events',
      'type' => 'link',
      'relationship' => 'fp_events_osy_contactspotentialmember',
      'source' => 'non-db',
      'vname' => 'LBL_FP_EVENTS_TITLE',
    ),
    'e_invite_status_fields' => 
    array (
      'name' => 'e_invite_status_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'event_invite_id',
        'invite_status' => 'event_status_name',
      ),
      'vname' => 'LBL_CONT_INVITE_STATUS',
      'type' => 'relate',
      'link' => 'fp_events',
      'link_type' => 'relationship_info',
      'join_link_name' => 'fp_events',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'event_status_name' => 
    array (
      'massupdate' => false,
      'name' => 'event_status_name',
      'type' => 'enum',
      'studio' => 'false',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_INVITE_STATUS_EVENT',
      'options' => 'fp_event_invite_status_dom',
      'importable' => 'false',
    ),
    'event_invite_id' => 
    array (
      'name' => 'event_invite_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_INVITE_STATUS',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'e_accept_status_fields' => 
    array (
      'name' => 'e_accept_status_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'event_status_id',
        'accept_status' => 'event_accept_status',
      ),
      'vname' => 'LBL_CONT_ACCEPT_STATUS',
      'type' => 'relate',
      'link' => 'fp_events',
      'link_type' => 'relationship_info',
      'join_link_name' => 'fp_events',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'event_accept_status' => 
    array (
      'massupdate' => false,
      'name' => 'event_accept_status',
      'type' => 'enum',
      'studio' => 'false',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_ACCEPT_STATUS_EVENT',
      'options' => 'fp_event_status_dom',
      'importable' => 'false',
    ),
    'event_status_id' => 
    array (
      'name' => 'event_status_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_ACCEPT_STATUS',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'payment_status_fields' => 
    array (
      'name' => 'payment_status_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'payment_status_id',
        'payment_status' => 'osy_payment_status',
      ),
      'vname' => 'LBL_PAYMENT_STATUS',
      'type' => 'relate',
      'link' => 'fp_events',
      'link_type' => 'relationship_info',
      'join_link_name' => 'fp_events',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'osy_payment_status' => 
    array (
      'massupdate' => false,
      'name' => 'osy_payment_status',
      'type' => 'enum',
      'studio' => 'false',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_PAYMENT_STATUS',
      'options' => 'osy_payment_status_list',
      'importable' => 'false',
    ),
    'payment_status_id' => 
    array (
      'name' => 'payment_status_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_PAYMENT_STATUS_ID',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'cost_fields' => 
    array (
      'name' => 'cost_fields',
      'rname' => 'id',
      'relationship_fields' => 
      array (
        'id' => 'cost_id',
        'cost' => 'osy_cost',
      ),
      'vname' => 'LBL_COST',
      'type' => 'relate',
      'link' => 'fp_events',
      'link_type' => 'relationship_info',
      'join_link_name' => 'fp_events',
      'source' => 'non-db',
      'importable' => 'false',
      'duplicate_merge' => 'disabled',
      'studio' => false,
    ),
    'osy_cost' => 
    array (
      'massupdate' => false,
      'name' => 'osy_cost',
      'type' => 'varchar',
      'studio' => 'false',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_COST',
    ),
    'cost_id' => 
    array (
      'name' => 'cost_id',
      'type' => 'varchar',
      'source' => 'non-db',
      'vname' => 'LBL_LIST_COST_ID',
      'studio' => 
      array (
        'listview' => false,
      ),
    ),
    'campaign_log' => 
    array (
      'name' => 'campaign_log',
      'type' => 'link',
      'relationship' => 'campaignlog_osy_contactspotentialmember',
      'module' => 'CampaignLog',
      'bean_name' => 'CampaignLog',
      'source' => 'non-db',
      'vname' => 'LBL_CAMPAIGN_LOG',
    ),
    'emails' => 
    array (
      'name' => 'emails',
      'vname' => 'LBL_EMAILS_OSY_CONTACTSPOTENTIALMEMBER_REL',
      'type' => 'link',
      'relationship' => 'emails_osy_contactspotentialmember_rel',
      'module' => 'Emails',
      'bean_name' => 'Email',
      'source' => 'non-db',
    ),
    'panel_name' => 
    array (
      'name' => 'panel_name',
      'type' => 'enum',
      'options' => 'delegate_types_list',
      'source' => 'non-db',
      'vname' => 'LBL_PANEL_NAME',
    ),
    'annual_revenue' => 
    array (
      'name' => 'annual_revenue',
      'vname' => 'LBL_ANNUAL_REVENUE',
      'type' => 'varchar',
      'len' => 100,
      'comment' => 'Annual revenue for this person',
      'merge_filter' => 'enabled',
    ),
    'campaigns' => 
    array (
      'name' => 'campaigns',
      'type' => 'link',
      'vname' => 'LBL_CAMPAIGNS',
      'relationship' => 'campaign_osy_contactspotentialmember',
      'source' => 'non-db',
    ),
    'campaign_id' => 
    array (
      'name' => 'campaign_id',
      'vname' => 'LBL_CAMPAIGN_ID',
      'rname' => 'id',
      'id_name' => 'campaign_id',
      'type' => 'id',
      'table' => 'campaigns',
      'isnull' => 'true',
      'module' => 'Campaigns',
      'reportable' => false,
      'massupdate' => false,
      'duplicate_merge' => 'disabled',
      'importable' => false,
    ),
    'campaign_name' => 
    array (
      'name' => 'campaign_name',
      'rname' => 'name',
      'vname' => 'LBL_CAMPAIGN',
      'type' => 'relate',
      'reportable' => false,
      'source' => 'non-db',
      'table' => 'campaigns',
      'id_name' => 'campaign_id',
      'link' => 'campaigns',
      'module' => 'Campaigns',
      'duplicate_merge' => 'disabled',
      'importable' => false,
    ),
  ),
  'relationships' => 
  array (
    'osy_contactspotentialmember_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'osy_contactspotentialmember_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
    'osy_contactspotentialmember_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'osy_contactspotentialmember_email_addresses' => 
    array (
      'lhs_module' => 'osy_contactspotentialmember',
      'lhs_table' => 'osy_contactspotentialmember',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'osy_contactspotentialmember',
    ),
    'osy_contactspotentialmember_email_addresses_primary' => 
    array (
      'lhs_module' => 'osy_contactspotentialmember',
      'lhs_table' => 'osy_contactspotentialmember',
      'lhs_key' => 'id',
      'rhs_module' => 'EmailAddresses',
      'rhs_table' => 'email_addresses',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'email_addr_bean_rel',
      'join_key_lhs' => 'bean_id',
      'join_key_rhs' => 'email_address_id',
      'relationship_role_column' => 'primary_address',
      'relationship_role_column_value' => '1',
    ),
    'osy_contactspotentialmember_lead' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'lead_id',
      'relationship_type' => 'one-to-many',
    ),
    'campaignlog_osy_contactspotentialmember' => 
    array (
      'lhs_module' => 'CampaignLog',
      'lhs_table' => 'campaign_log',
      'lhs_key' => 'target_id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'id',
      'relationship_type' => 'one-to-many',
    ),
    'emails_osy_contactspotentialmember_rel' => 
    array (
      'lhs_module' => 'Emails',
      'lhs_table' => 'emails',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'emails_beans',
      'join_key_lhs' => 'email_id',
      'join_key_rhs' => 'bean_id',
      'relationship_role_column' => 'bean_module',
      'relationship_role_column_value' => 'osy_contactspotentialmember',
    ),
    'campaign_osy_contactspotentialmember' => 
    array (
      'lhs_module' => 'Campaigns',
      'lhs_table' => 'campaigns',
      'lhs_key' => 'id',
      'rhs_module' => 'osy_contactspotentialmember',
      'rhs_table' => 'osy_contactspotentialmember',
      'rhs_key' => 'campaign_id',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'indices' => 
  array (
    'id' => 
    array (
      'name' => 'osy_contactspotentialmemberpk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'templates' => 
  array (
    'person' => 'person',
    'assignable' => 'assignable',
    'basic' => 'basic',
  ),
  'custom_fields' => false,
);