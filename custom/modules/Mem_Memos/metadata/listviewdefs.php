<?php
$module_name = 'Mem_Memos';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ACCOUNTS_MEM_MEMOS_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_MEM_MEMOS_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'COMMERCIAL_NAME_ENGLISH_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_COMMERCIAL_NAME_ENGLISH',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
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
  'PASSPORT_NUMBER_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_PASSPORT_NUMBER',
    'width' => '10%',
  ),
  'TYPE_ACTIVITY_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_TYPE_ACTIVITY',
    'width' => '10%',
  ),
);
;
?>
