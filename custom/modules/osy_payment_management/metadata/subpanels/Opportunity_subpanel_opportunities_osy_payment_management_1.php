<?php
// created: 2019-09-26 12:11:02
$subpanel_layout['list_fields'] = array (
  'name' => 
  array (
    'vname' => 'LBL_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'width' => '45%',
    'default' => true,
  ),
  'payment_date_c' => 
  array (
    'type' => 'date',
    'default' => true,
    'vname' => 'LBL_PAYMENT_DATE',
    'width' => '10%',
  ),
  'paid_amount_1_c' => 
  array (
    'type' => 'decimal',
    'default' => true,
    'vname' => 'LBL_PAID_AMOUNT_1',
    'width' => '10%',
  ),
  'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'osy_payment_management',
    'width' => '4%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'osy_payment_management',
    'width' => '5%',
    'default' => true,
  ),
);