<?php
$listViewDefs ['AOS_Quotes'] = 
array (
  'NUMBER' => 
  array (
    'width' => '5%',
    'label' => 'LBL_LIST_NUM',
    'default' => true,
  ),
  'NAME' => 
  array (
    'width' => '15%',
    'label' => 'LBL_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
  ),
  'STAGE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_STAGE',
    'default' => true,
  ),
  'BILLING_ACCOUNT' => 
  array (
    'width' => '15%',
    'label' => 'LBL_BILLING_ACCOUNT',
    'default' => true,
    'module' => 'Accounts',
    'id' => 'BILLING_ACCOUNT_ID',
    'link' => true,
    'related_fields' => 
    array (
      0 => 'billing_account_id',
    ),
  ),
  'TOTAL_AMOUNT' => 
  array (
    'width' => '10%',
    'label' => 'LBL_GRAND_TOTAL',
    'default' => true,
    'currency_format' => true,
  ),
  'EXPIRATION' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EXPIRATION',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_ASSIGNED_USER',
    'default' => true,
    'module' => 'Users',
    'id' => 'ASSIGNED_USER_ID',
    'link' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '5%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'AOS_QUOTES_TYPE' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TYPE',
    'default' => false,
  ),
  'OWNERSHIP' => 
  array (
    'width' => '10%',
    'label' => 'LBL_OWNERSHIP',
    'default' => false,
  ),
  'EMPLOYEES' => 
  array (
    'width' => '10%',
    'label' => 'LBL_EMPLOYEES',
    'default' => false,
  ),
  'CURRENCY_ID' => 
  array (
    'type' => 'id',
    'studio' => 'visible',
    'label' => 'LBL_CURRENCY',
    'width' => '10%',
    'default' => false,
  ),
  'CREATED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_CREATED',
    'id' => 'CREATED_BY',
    'width' => '10%',
    'default' => false,
  ),
  'TICKER_SYMBOL' => 
  array (
    'width' => '10%',
    'label' => 'LBL_TICKER_SYMBOL',
    'default' => false,
  ),
);
;
?>
