<?php
$module_name = 'Mem_Memos';
$searchdefs [$module_name] = 
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
      'accounts_mem_memos_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
        'id' => 'ACCOUNTS_MEM_MEMOS_1ACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_mem_memos_1_name',
      ),
      'current_user_only' => 
      array (
        'name' => 'current_user_only',
        'label' => 'LBL_CURRENT_USER_FILTER',
        'type' => 'bool',
        'default' => true,
        'width' => '10%',
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
      'accounts_mem_memos_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'ACCOUNTS_MEM_MEMOS_1ACCOUNTS_IDA',
        'name' => 'accounts_mem_memos_1_name',
      ),
      'commercial_name_english_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_COMMERCIAL_NAME_ENGLISH',
        'width' => '10%',
        'name' => 'commercial_name_english_c',
      ),
      'type_activity_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_TYPE_ACTIVITY',
        'width' => '10%',
        'name' => 'type_activity_c',
      ),
      'passport_number_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_PASSPORT_NUMBER',
        'width' => '10%',
        'name' => 'passport_number_c',
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
        'default' => true,
        'width' => '10%',
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
