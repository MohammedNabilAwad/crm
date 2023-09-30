<?php
// created: 2019-10-03 18:02:47
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_OPPORTUNITY_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '40%',
    'default' => true,
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'vname' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'payment_status' => 
  array (
    'type' => 'enum',
    'vname' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
    'default' => true,
  ),
  'invoice_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'expiry_date' => 
  array (
    'type' => 'date',
    'vname' => 'LBL_EXPIRY_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'assigned_user_name' => 
  array (
    'name' => 'assigned_user_name',
    'vname' => 'LBL_LIST_ASSIGNED_TO_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'target_record_key' => 'assigned_user_id',
    'target_module' => 'Employees',
    'width' => '10%',
    'default' => true,
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'Opportunities',
    'width' => '4%',
    'default' => true,
  ),
  'currency_id' => 
  array (
    'usage' => 'query_only',
  ),
);