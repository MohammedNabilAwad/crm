<?php 
 $GLOBALS["dictionary"]["ListingTemplate"]=array (
  'table' => 'zucker_listingtemplates',
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_CONTAINER_ID',
      'required' => true,
      'type' => 'id',
      'reportable' => false,
    ),
    'deleted' => 
    array (
      'name' => 'deleted',
      'vname' => 'LBL_DELETED',
      'type' => 'bool',
      'required' => true,
      'reportable' => false,
      'default' => '0',
      'Importable' => false,
    ),
    'date_entered' => 
    array (
      'name' => 'date_entered',
      'vname' => 'LBL_DATE_ENTERED',
      'type' => 'datetime',
      'required' => true,
    ),
    'date_modified' => 
    array (
      'name' => 'date_modified',
      'vname' => 'LBL_DATE_MODIFIED',
      'type' => 'datetime',
      'required' => true,
    ),
    'modified_user_id' => 
    array (
      'name' => 'modified_user_id',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_MODIFIED_USER_ID',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => true,
    ),
    'created_by' => 
    array (
      'name' => 'created_by',
      'rname' => 'user_name',
      'id_name' => 'modified_user_id',
      'vname' => 'LBL_CREATED_BY',
      'type' => 'assigned_user_name',
      'table' => 'users',
      'isnull' => 'false',
      'dbType' => 'id',
      'reportable' => true,
    ),
    'name' => 
    array (
      'name' => 'name',
      'vname' => 'LBL_LISTING_NAME',
      'required' => true,
      'type' => 'varchar',
      'len' => 255,
    ),
    'mainmodule' => 
    array (
      'name' => 'mainmodule',
      'vname' => 'LBL_LISTING_MAINMODULE',
      'required' => true,
      'type' => 'varchar',
      'len' => 255,
    ),
    'filtertype' => 
    array (
      'name' => 'filtertype',
      'vname' => 'LBL_LISTING_FILTERTYPE',
      'required' => true,
      'type' => 'varchar',
      'len' => 255,
    ),
    'description' => 
    array (
      'name' => 'description',
      'vname' => 'LBL_LISTING_DESCRIPTION',
      'required' => false,
      'type' => 'text',
    ),
    'customwhere1' => 
    array (
      'name' => 'customwhere1',
      'vname' => 'LBL_LISTING_CUSTOMWHERE1',
      'required' => false,
      'type' => 'text',
    ),
    'customwhere2' => 
    array (
      'name' => 'customwhere2',
      'vname' => 'LBL_LISTING_CUSTOMWHERE2',
      'required' => false,
      'type' => 'text',
    ),
    'image_html' => 
    array (
      'name' => 'image_html',
      'type' => 'varchar',
      'source' => 'non-db',
    ),
    'action_module' => 
    array (
      'name' => 'action_module',
      'type' => 'varchar',
      'source' => 'non-db',
    ),
    'type_desc' => 
    array (
      'name' => 'type_desc',
      'type' => 'varchar',
      'source' => 'non-db',
    ),
    'team_id' => 
    array (
      'name' => 'team_id',
      'vname' => 'LBL_TEAM_ID',
      'type' => 'id',
      'reportable' => false,
      'audited' => true,
    ),
    'assigned_user_id' => 
    array (
      'name' => 'assigned_user_id',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'type' => 'assigned_user_name',
      'vname' => 'LBL_ASSIGNED_USER_ID',
      'required' => false,
      'dbType' => 'id',
      'table' => 'users',
      'isnull' => false,
      'reportable' => true,
      'audited' => true,
    ),
    'assigned_user_link' => 
    array (
      'name' => 'assigned_user_link',
      'type' => 'link',
      'relationship' => 'zucker_listingtemplate_assigned_user',
      'vname' => 'LBL_ASSIGNED_TO_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'assigned_user_name' => 
    array (
      'name' => 'assigned_user_name',
      'rname' => 'user_name',
      'id_name' => 'assigned_user_id',
      'vname' => 'LBL_ASSIGNED_USER_NAME',
      'type' => 'relate',
      'table' => 'users',
      'module' => 'Users',
      'dbType' => 'varchar',
      'link' => 'users',
      'len' => '255',
      'source' => 'non-db',
    ),
    'created_by_link' => 
    array (
      'name' => 'created_by_link',
      'type' => 'link',
      'relationship' => 'zucker_listingtemplate_created_by',
      'vname' => 'LBL_CREATED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
    'modified_user_link' => 
    array (
      'name' => 'modified_user_link',
      'type' => 'link',
      'relationship' => 'zucker_listingtemplate_modified_user',
      'vname' => 'LBL_MODIFIED_BY_USER',
      'link_type' => 'one',
      'module' => 'Users',
      'bean_name' => 'User',
      'source' => 'non-db',
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'zucker_listingtemplates_primary_key_index',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
  ),
  'relationships' => 
  array (
    'zucker_listingtemplate_assigned_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'ZuckerListingTemplate',
      'rhs_table' => 'zucker_listingtemplates',
      'rhs_key' => 'assigned_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'zucker_listingtemplate_modified_user' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'ZuckerListingTemplate',
      'rhs_table' => 'zucker_listingtemplates',
      'rhs_key' => 'modified_user_id',
      'relationship_type' => 'one-to-many',
    ),
    'zucker_listingtemplate_created_by' => 
    array (
      'lhs_module' => 'Users',
      'lhs_table' => 'users',
      'lhs_key' => 'id',
      'rhs_module' => 'ZuckerListingTemplate',
      'rhs_table' => 'zucker_listingtemplates',
      'rhs_key' => 'created_by',
      'relationship_type' => 'one-to-many',
    ),
  ),
  'custom_fields' => false,
);