<?php
// created: 2013-04-25 14:25:35
global $app_strings;
$subpanel_layout['list_fields'] = array (
  'checkbox' =>
  array (
      'vname' =>  'LBL_Blank',
      'widget_type' => 'checkbox',
      'widget_class' => 'SubPanelCheck',
      'checkbox_value' => true,
      'width' => '5%',
      'sortable' => false,
      'default' => true,
  ),
'panel_name' =>
    array(
        'name' => 'panel_name',
        'vname' => 'LBL_PANEL_NAME',
        'width' => '8%',
        'default' => true,
    ),
  'name' => 
  array (
    'name' => 'name',
    'vname' => 'LBL_LIST_NAME',
    'widget_class' => 'SubPanelDetailViewLink',
    'module' => 'osy_other_contacts',
    'width' => '23%',
    'default' => true,
  ),
  'phone_work' =>
  array (
    'name' => 'phone_work',
    'vname' => 'LBL_LIST_PHONE',
      'module' => 'osy_other_contacts',
    'width' => '15%',
    'default' => true,
  ),
  'email1' => 
  array (
    'name' => 'email1',
    'vname' => 'LBL_LIST_EMAIL',
    'widget_class' => 'SubPanelEmailLink',
    'width' => '20%',
    'sortable' => false,
    'default' => true,
  ),
  'event_status_name' => 
  array (
    'vname' => 'LBL_STATUS',
    'width' => '10%',
    'sortable' => false,
    'default' => true,
  ),
  'event_accept_status' => 
  array (
    'width' => '10%',
    'sortable' => false,
    'default' => true,
    'vname' => 'LBL_ACCEPT_STATUS',
  ),
    'osy_payment_status' =>
        array(
            'vname' => 'LBL_PAYMENT_STATUS',
            'width' => '10%',
            'sortable' => false,
            'default' => true,
        ),
    'osy_cost' =>
        array(
            'vname' => 'LBL_COST',
            'width' => '10%',
            'sortable' => false,
            'default' => true,
        ),
   'edit_button' => 
  array (
    'vname' => 'LBL_EDIT_BUTTON',
    'widget_class' => 'SubPanelEditButton',
    'module' => 'osy_other_contacts',
    'width' => '5%',
    'default' => true,
  ),
  'remove_button' => 
  array (
    'vname' => 'LBL_REMOVE',
    'widget_class' => 'SubPanelRemoveButton',
    'module' => 'osy_other_contacts',
    'width' => '5%',
    'default' => true,
  ),
  'e_accept_status_fields' => 
  array (
    'usage' => 'query_only',
  ),
  'event_status_id' => 
  array (
    'usage' => 'query_only',
  ),
  'e_invite_status_fields' => 
  array (
    'usage' => 'query_only',
  ),
  'event_invite_id' => 
  array (
    'usage' => 'query_only',
  ),
    'payment_status_fields' =>
        array (
            'usage' => 'query_only',
        ),
    'payment_status_id' =>
        array (
            'usage' => 'query_only',
        ),
    'cost_fields' =>
        array (
            'usage' => 'query_only',
        ),
    'cost_id' =>
        array (
            'usage' => 'query_only',
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
  'account_id' => 
  array (
    'usage' => 'query_only',
  ),
);