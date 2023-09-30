<?php
// created: 2019-11-25 10:40:00
$listViewDefs['Opportunities'] = array (
  'NAME' => 
  array (
    'width' => '30%',
    'label' => 'LBL_LIST_OPPORTUNITY_NAME',
    'link' => true,
    'default' => true,
  ),
  'ACCOUNT_NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'module' => 'Accounts',
    'link' => true,
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'contextMenu' => 
    array (
      'objectType' => 'sugarAccount',
      'metaData' => 
      array (
        'return_module' => 'Contacts',
        'return_action' => 'ListView',
        'module' => 'Accounts',
        'parent_id' => '{$ACCOUNT_ID}',
        'parent_name' => '{$ACCOUNT_NAME}',
        'account_id' => '{$ACCOUNT_ID}',
        'account_name' => '{$ACCOUNT_NAME}',
      ),
    ),
    'related_fields' => 
    array (
      0 => 'account_id',
    ),
  ),
  'PAYMENT_STATUS' => 
  array (
    'type' => 'enum',
    'default' => true,
    'label' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
  ),
  'INVOICE_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'EXPIRY_DATE' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EXPIRY_DATE',
    'width' => '10%',
    'default' => true,
  ),
  'AMOUNT' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
  ),
  'PARTIAL_PAYMENT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_PARTIAL_PAYMENT',
    'currency_format' => true,
    'width' => '10%',
  ),
  'TOTAL_AMOUNT_C' => 
  array (
    'type' => 'currency',
    'default' => true,
    'label' => 'LBL_TOTAL_AMOUNT_C',
    'currency_format' => true,
    'width' => '10%',
  ),
  'NR_REMINDERS' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NR_REMINDERS',
    'width' => '10%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'OPPORTUNITY_TYPE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TYPE',
    'default' => false,
  ),
  'NEXT_STEP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NEXT_STEP',
    'default' => false,
  ),
  'PROBABILITY' => 
  array (
    'width' => '10%',
    'label' => 'LBL_PROBABILITY',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_CREATED',
    'default' => false,
  ),
  'INVOICE_NUMBER_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_INVOICE_NUMBER',
    'width' => '10%',
  ),
  'MODIFIED_BY_NAME' => 
  array (
    'width' => '5%',
    'label' => 'LBL_MODIFIED',
    'default' => false,
  ),
);