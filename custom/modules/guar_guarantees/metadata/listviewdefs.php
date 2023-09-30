<?php
$module_name = 'guar_guarantees';
$listViewDefs [$module_name] = 
array (
  'NAME' => 
  array (
    'width' => '32%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'ACCOUNTS_GUAR_GUARANTEES_1_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
    'id' => 'ACCOUNTS_GUAR_GUARANTEES_1ACCOUNTS_IDA',
    'width' => '10%',
    'default' => true,
  ),
  'GUARANTEED_NAME_C' => 
  array (
    'type' => 'varchar',
    'default' => true,
    'label' => 'LBL_GUARANTEED_NAME',
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
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_MODIFIED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_MODIFIED',
    'width' => '10%',
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
  'MODIFIED_BY_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_MODIFIED_NAME',
    'id' => 'MODIFIED_USER_ID',
    'width' => '10%',
    'default' => false,
  ),
  'GUARANTEE_TYPE_C' => 
  array (
    'type' => 'enum',
    'default' => false,
    'studio' => 'visible',
    'label' => 'LBL_GUARANTEE_TYPE',
    'width' => '10%',
  ),
  'GUARANTOR_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_GUARANTOR',
    'width' => '10%',
  ),
  'GUARANTEED_ADJECTIVE_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_GUARANTEED_ADJECTIVE',
    'width' => '10%',
  ),
  'NATURE_OF_WORK_C' => 
  array (
    'type' => 'varchar',
    'default' => false,
    'label' => 'LBL_NATURE_OF_WORK',
    'width' => '10%',
  ),
  'GUARANTEED_ID_NUMBER_C' => 
  array (
    'type' => 'int',
    'default' => false,
    'label' => 'LBL_GUARANTEED_ID_NUMBER',
    'width' => '10%',
  ),
  'GUARANTEED_PHONE_C' => 
  array (
    'type' => 'phone',
    'default' => false,
    'label' => 'LBL_GUARANTEED_PHONE',
    'width' => '10%',
  ),
);
;
?>
