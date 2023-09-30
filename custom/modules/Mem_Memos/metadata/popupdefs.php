<?php
$popupMeta = array (
    'moduleMain' => 'Mem_Memos',
    'varName' => 'Mem_Memos',
    'orderBy' => 'mem_memos.name',
    'whereClauses' => array (
  'name' => 'mem_memos.name',
  'accounts_mem_memos_1_name' => 'mem_memos.accounts_mem_memos_1_name',
  'commercial_name_english_c' => 'mem_memos_cstm.commercial_name_english_c',
  'type_activity_c' => 'mem_memos_cstm.type_activity_c',
  'assigned_user_id' => 'mem_memos.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'accounts_mem_memos_1_name',
  5 => 'commercial_name_english_c',
  6 => 'type_activity_c',
  7 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'accounts_mem_memos_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_MEM_MEMOS_1ACCOUNTS_IDA',
    'width' => '10%',
    'name' => 'accounts_mem_memos_1_name',
  ),
  'commercial_name_english_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_COMMERCIAL_NAME_ENGLISH',
    'width' => '10%',
    'name' => 'commercial_name_english_c',
  ),
  'type_activity_c' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_TYPE_ACTIVITY',
    'width' => '10%',
    'name' => 'type_activity_c',
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
);
