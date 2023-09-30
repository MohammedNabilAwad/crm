<?php
// created: 2014-09-19 17:19:58
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'sort_by' => 'last_name',
    'sort_order' => 'asc',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'Contacts',
    'width' => '40%',
    'default' => true,
  ),
  'lead_name' => 
  array (
    'name' => 'lead_name',
    'rname' => 'lead_name',
    'vname' => 'LBL_LEAD_NAME',
    'sort_by' => 'account_name',
    'sort_order' => 'asc',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'Leads',
    'width' => '40%',
    'related_fields' => 
    array (
      0 => 'lead_id',
    ),
    'link' => true,
    'default' => true,
    'target_module' => 'Leads',
    'target_record_key' => 'lead_id',
  ),
  'email1' => 
  array (
    'name' => 'email1',
    'vname' => 'LBL_LIST_EMAIL',
    'widget_class' => 'SubPanelEmailLink',
    'width' => '35%',
    'sortable' => false,
    'default' => true,
  ),
  'phone_work' => 
  array (
    'name' => 'phone_work',
    'vname' => 'LBL_LIST_PHONE',
    'width' => '15%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'Contacts',
    'width' => '5%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Contacts',
    'width' => '5%',
    'default' => true,
  ),
  'first_name' => 
  array (
    'name' => 'first_name',
    'usage' => 'query_only',
  ),
  'last_name' => 
  array (
    'name' => 'last_name',
    'usage' => 'query_only',
  ),
  'salutation' => 
  array (
    'name' => 'salutation',
    'usage' => 'query_only',
  ),
  'lead_id' => 
  array (
    'name' => 'lead_id',
    'usage' => 'query_only',
  ),
);