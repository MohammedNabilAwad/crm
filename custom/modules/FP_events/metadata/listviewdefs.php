<?php
// created: 2020-05-11 10:12:44
$listViewDefs['FP_events'] = array (
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_NAME',
    'default' => true,
    'link' => true,
  ),
  'DATE_START' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATE',
    'width' => '15%',
    'default' => true,
  ),
  'DATE_END' => 
  array (
    'type' => 'datetimecombo',
    'label' => 'LBL_DATE_END',
    'width' => '15%',
    'default' => true,
  ),
  'LOCATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_LOCATION',
    'width' => '10%',
    'default' => true,
  ),
  'BUDGET' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_BUDGET',
    'currency_format' => true,
    'width' => '15%',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);