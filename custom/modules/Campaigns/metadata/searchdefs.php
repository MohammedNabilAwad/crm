<?php
// created: 2020-05-11 10:12:44
$searchdefs['Campaigns'] = array (
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
      0 => 'name',
      1 => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
      ),
    ),
    'advanced_search' => 
    array (
      0 => 
      array (
        'name' => 'name',
        'default' => true,
        'width' => '10%',
      ),
      1 => 
      array (
        'name' => 'start_date',
        'type' => 'date',
        'displayParams' => 
        array (
          'showFormats' => true,
        ),
        'default' => true,
        'width' => '10%',
      ),
      2 => 
      array (
        'name' => 'end_date',
        'type' => 'date',
        'displayParams' => 
        array (
          'showFormats' => true,
        ),
        'default' => true,
        'width' => '10%',
      ),
      3 => 
      array (
        'name' => 'status',
        'default' => true,
        'width' => '10%',
      ),
      4 => 
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
        'default' => true,
        'width' => '10%',
      ),
    ),
  ),
);