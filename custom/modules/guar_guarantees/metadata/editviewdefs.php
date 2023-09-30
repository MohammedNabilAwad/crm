<?php
$module_name = 'guar_guarantees';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'accounts_guar_guarantees_1_name',
            'label' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'guaranteed_name_c',
            'label' => 'LBL_GUARANTEED_NAME',
          ),
          1 => 
          array (
            'name' => 'guaranteed_adjective_c',
            'label' => 'LBL_GUARANTEED_ADJECTIVE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'guaranteed_phone_c',
            'label' => 'LBL_GUARANTEED_PHONE',
          ),
          1 => 
          array (
            'name' => 'guaranteed_id_number_c',
            'label' => 'LBL_GUARANTEED_ID_NUMBER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'guarantor_c',
            'label' => 'LBL_GUARANTOR',
          ),
          1 => 
          array (
            'name' => 'nature_of_work_c',
            'label' => 'LBL_NATURE_OF_WORK',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'guarantee_type_c',
            'studio' => 'visible',
            'label' => 'LBL_GUARANTEE_TYPE',
          ),
        ),
        6 => 
        array (
          0 => 'description',
        ),
        7 => 
        array (
          0 => 'assigned_user_name',
          1 => '',
        ),
      ),
    ),
  ),
);
;
?>
