<?php
// created: 2020-05-11 10:12:44
$listViewDefs['ProspectLists'] = array (
  'NAME' => 
  array (
    'width' => '25%',
    'label' => 'LBL_LIST_PROSPECT_LIST_NAME',
    'link' => true,
    'default' => true,
  ),
  'LIST_TYPE' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_TYPE_LIST_NAME',
    'default' => true,
  ),
  'OSY_SERVICE_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_OSY_SERVICE_NAME',
    'id' => 'OSY_SERVICE_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'DESCRIPTION' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_DESCRIPTION',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
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
);