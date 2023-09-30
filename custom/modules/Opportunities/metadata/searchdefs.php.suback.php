<?php
// created: 2019-11-25 10:40:00
$searchdefs['Opportunities'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '3',
    'maxColumnsBasic' => '4',
    'widths' => 
    array (
      'label' => '10',
      'field' => '30',
    ),
  ),
  'layout' => 
  array (
    'basic_search' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
      2 => 
      array (
        'name' => 'open_only',
        'label' => 'LBL_OPEN_ITEMS',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 
      array (
        'name' => 'account_name',
        'default' => true,
        'width' => '10%',
      ),
      1 => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      2 => 
      array (
        'type' => 'date',
        'label' => 'LBL_EXPIRY_DATE',
        'width' => '10%',
        'default' => true,
        'name' => 'expiry_date',
      ),
      3 => 
      array (
        'type' => 'enum',
        'default' => true,
        'label' => 'LBL_PAYMENT_STATUS',
        'width' => '10%',
        'name' => 'payment_status',
      ),
      4 => 
      array (
        'name' => 'amount',
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
);