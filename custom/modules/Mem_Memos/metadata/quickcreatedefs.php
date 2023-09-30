<?php
$module_name = 'Mem_Memos';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
            'name' => 'accounts_mem_memos_1_name',
            'label' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'commercial_name_english_c',
            'label' => 'LBL_COMMERCIAL_NAME_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'type_activity_c',
            'label' => 'LBL_TYPE_ACTIVITY',
          ),
        ),
        2 => 
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
