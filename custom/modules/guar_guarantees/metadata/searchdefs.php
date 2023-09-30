<?php
$module_name = 'guar_guarantees';
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
      'guaranteed_name_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_GUARANTEED_NAME',
        'width' => '10%',
        'name' => 'guaranteed_name_c',
      ),
      'accounts_guar_guarantees_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
        'id' => 'ACCOUNTS_GUAR_GUARANTEES_1ACCOUNTS_IDA',
        'width' => '10%',
        'default' => true,
        'name' => 'accounts_guar_guarantees_1_name',
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
      'accounts_guar_guarantees_1_name' => 
      array (
        'type' => 'relate',
        'link' => true,
        'label' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
        'width' => '10%',
        'default' => true,
        'id' => 'ACCOUNTS_GUAR_GUARANTEES_1ACCOUNTS_IDA',
        'name' => 'accounts_guar_guarantees_1_name',
      ),
      'guaranteed_name_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_GUARANTEED_NAME',
        'width' => '10%',
        'name' => 'guaranteed_name_c',
      ),
      'guaranteed_adjective_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_GUARANTEED_ADJECTIVE',
        'width' => '10%',
        'name' => 'guaranteed_adjective_c',
      ),
      'guarantor_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_GUARANTOR',
        'width' => '10%',
        'name' => 'guarantor_c',
      ),
      'guaranteed_id_number_c' => 
      array (
        'type' => 'int',
        'default' => true,
        'label' => 'LBL_GUARANTEED_ID_NUMBER',
        'width' => '10%',
        'name' => 'guaranteed_id_number_c',
      ),
      'guarantee_type_c' => 
      array (
        'type' => 'enum',
        'default' => true,
        'studio' => 'visible',
        'label' => 'LBL_GUARANTEE_TYPE',
        'width' => '10%',
        'name' => 'guarantee_type_c',
      ),
      'guaranteed_phone_c' => 
      array (
        'type' => 'phone',
        'default' => true,
        'label' => 'LBL_GUARANTEED_PHONE',
        'width' => '10%',
        'name' => 'guaranteed_phone_c',
      ),
      'nature_of_work_c' => 
      array (
        'type' => 'varchar',
        'default' => true,
        'label' => 'LBL_NATURE_OF_WORK',
        'width' => '10%',
        'name' => 'nature_of_work_c',
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
