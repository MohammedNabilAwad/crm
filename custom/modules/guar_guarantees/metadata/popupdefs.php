<?php
$popupMeta = array (
    'moduleMain' => 'guar_guarantees',
    'varName' => 'guar_guarantees',
    'orderBy' => 'guar_guarantees.name',
    'whereClauses' => array (
  'name' => 'guar_guarantees.name',
  'guaranteed_name_c' => 'guar_guarantees_cstm.guaranteed_name_c',
  'accounts_guar_guarantees_1_name' => 'guar_guarantees.accounts_guar_guarantees_1_name',
  'assigned_user_id' => 'guar_guarantees.assigned_user_id',
),
    'searchInputs' => array (
  1 => 'name',
  4 => 'guaranteed_name_c',
  5 => 'accounts_guar_guarantees_1_name',
  6 => 'assigned_user_id',
),
    'searchdefs' => array (
  'name' => 
  array (
    'name' => 'name',
    'width' => '10%',
  ),
  'guaranteed_name_c' => 
  array (
    'type' => 'varchar',
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
    'name' => 'accounts_guar_guarantees_1_name',
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
