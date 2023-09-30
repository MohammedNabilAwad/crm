<?php
$popupMeta = array (
    'moduleMain' => 'Account',
    'varName' => 'ACCOUNT',
    'orderBy' => 'name',
    'whereClauses' => array (
  'name' => 'accounts.name',
  'billing_address_city' => 'accounts.billing_address_city',
  'phone_office' => 'accounts.phone_office',
  'member_type' => 'accounts.member_type',
  'membership_status' => 'accounts.membership_status',
  'industry' => 'accounts.industry',
  'ownership' => 'accounts.ownership',
  'employees' => 'accounts.employees',
  'member_from' => 'accounts.member_from',
  'email' => 'accounts.email',
  'assigned_user_id' => 'accounts.assigned_user_id',
  'member_number_system_c' => 'accounts_cstm.member_number_system_c',
  'committees' => 'accounts.committees',
),
    'searchInputs' => array (
  0 => 'name',
  1 => 'billing_address_city',
  2 => 'phone_office',
  3 => 'member_type',
  4 => 'membership_status',
  5 => 'industry',
  6 => 'ownership',
  7 => 'employees',
  8 => 'member_from',
  9 => 'email',
  10 => 'assigned_user_id',
  11 => 'member_number_system_c',
  12 => 'committees',
),
    'create' => array (
  'formBase' => 'AccountFormBase.php',
  'formBaseClass' => 'AccountFormBase',
  'getFormBodyParams' => 
  array (
    0 => '',
    1 => '',
    2 => 'AccountSave',
  ),
  'createButton' => 'LNK_NEW_ACCOUNT',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'member_number_system_c' => 
  array (
    'type' => 'int',
    'label' => 'LBL_MEMBER_NUMBER_SYSTEM',
    'width' => '10%',
    'name' => 'member_number_system_c',
  ),
  'member_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_MEMBER_TYPE',
    'width' => '10%',
    'name' => 'member_type',
  ),
  'membership_status' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_MEMBERSHIP_STATUS',
    'width' => '10%',
    'name' => 'membership_status',
  ),
  'industry' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_INDUSTRY',
    'width' => '10%',
    'name' => 'industry',
  ),
  'ownership' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_OWNERSHIP',
    'width' => '10%',
    'name' => 'ownership',
  ),
  'phone_office' => 
  array (
    'type' => 'phone',
    'label' => 'LBL_PHONE_OFFICE',
    'width' => '10%',
    'name' => 'phone_office',
  ),
  'employees' => 
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_EMPLOYEES',
    'width' => '10%',
    'name' => 'employees',
  ),
  'committees' => 
  array (
    'type' => 'multienum',
    'label' => 'LBL_COMMITTEES',
    'width' => '10%',
    'name' => 'committees',
  ),
  'member_from' => 
  array (
    'type' => 'date',
    'label' => 'LBL_MEMBER_FROM',
    'width' => '10%',
    'name' => 'member_from',
  ),
  'billing_address_city' => 
  array (
    'name' => 'billing_address_city',
    'width' => '10%',
  ),
  'email' => 
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'assigned_user_id' => 
  array (
    'name' => 'assigned_user_id',
    'label' => 'LBL_ASSIGNED_TO',
    'type' => 'enum',
    'function' => 
    array (
      'name' => 'get_user_array',
      'params' => 
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' => 
  array (
    'width' => '40',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'link' => true,
    'default' => true,
  ),
  'BILLING_ADDRESS_STREET' => 
  array (
    'width' => '10',
    'label' => 'LBL_BILLING_ADDRESS_STREET',
    'default' => false,
  ),
  'BILLING_ADDRESS_CITY' => 
  array (
    'width' => '10',
    'label' => 'LBL_LIST_CITY',
    'default' => true,
  ),
  'BILLING_ADDRESS_STATE' => 
  array (
    'width' => '7',
    'label' => 'LBL_STATE',
    'default' => true,
  ),
  'BILLING_ADDRESS_COUNTRY' => 
  array (
    'width' => '10',
    'label' => 'LBL_COUNTRY',
    'default' => true,
  ),
  'BILLING_ADDRESS_POSTALCODE' => 
  array (
    'width' => '10',
    'label' => 'LBL_BILLING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_STREET' => 
  array (
    'width' => '10',
    'label' => 'LBL_SHIPPING_ADDRESS_STREET',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_CITY' => 
  array (
    'width' => '10',
    'label' => 'LBL_LIST_CITY',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_STATE' => 
  array (
    'width' => '7',
    'label' => 'LBL_STATE',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_COUNTRY' => 
  array (
    'width' => '10',
    'label' => 'LBL_COUNTRY',
    'default' => false,
  ),
  'SHIPPING_ADDRESS_POSTALCODE' => 
  array (
    'width' => '10',
    'label' => 'LBL_SHIPPING_ADDRESS_POSTALCODE',
    'default' => false,
  ),
  'COMMITTEES' => 
  array (
    'width' => '10',
    'label' => 'LBL_COMMITTEES',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '2',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'default' => true,
  ),
  'PHONE_OFFICE' => 
  array (
    'width' => '10',
    'label' => 'LBL_LIST_PHONE',
    'default' => false,
  ),
),
);
