<?php
$searchdefs ['Accounts'] = 
array (
  'layout' => 
  array (
    'basic_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'member_number_system_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_MEMBER_NUMBER_SYSTEM',
        'width' => '10%',
        'name' => 'member_number_system_c',
      ),
      'membership_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_MEMBERSHIP_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'membership_status',
      ),
    ),
    'advanced_search' => 
    array (
      'name' => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'membership_status' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_MEMBERSHIP_STATUS',
        'width' => '10%',
        'default' => true,
        'name' => 'membership_status',
      ),
      'member_till' => 
      array (
        'type' => 'date',
        'label' => 'LBL_MEMBER_TILL',
        'width' => '10%',
        'default' => true,
        'name' => 'member_till',
      ),
      'committees' => 
      array (
        'type' => 'multienum',
        'studio' => 'visible',
        'label' => 'LBL_COMMITTEES',
        'width' => '10%',
        'default' => true,
        'name' => 'committees',
      ),
      'address_city' => 
      array (
        'name' => 'address_city',
        'label' => 'LBL_CITY',
        'type' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      'industry' => 
      array (
        'name' => 'industry',
        'default' => true,
        'width' => '10%',
      ),
      'subcategories' => 
      array (
        'name' => 'subcategories',
        'default' => true,
        'width' => '10%',
      ),
      'products_and_services' => 
      array (
        'type' => 'varchar',
        'label' => 'LBL_PRODUCTS_AND_SERVICES',
        'width' => '10%',
        'default' => true,
        'name' => 'products_and_services',
      ),
      'ownership' => 
      array (
        'type' => 'enum',
        'label' => 'LBL_OWNERSHIP',
        'width' => '10%',
        'default' => true,
        'name' => 'ownership',
      ),
      'size_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_SIZE',
        'width' => '10%',
        'name' => 'size_c',
      ),
      'assigned_user_id' => 
      array (
        'name' => 'assigned_user_id',
        'type' => 'enum',
        'label' => 'LBL_ASSIGNED_TO',
        'function' => 
        array (
          'name' => 'get_user_array',
          'params' => 
          array (
            0 => false,
          ),
        ),
        'default' => true,
        'width' => '10%',
      ),
      'date_entered' => 
      array (
        'type' => 'datetime',
        'label' => 'LBL_DATE_ENTERED',
        'width' => '10%',
        'default' => true,
        'name' => 'date_entered',
      ),
    ),
  ),
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
);
;
?>
