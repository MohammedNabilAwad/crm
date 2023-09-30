<?php
$dashletData['osy_services_companiesDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'service_status_c' => 
  array (
    'default' => '',
  ),
  'date_modified' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['osy_services_companiesDashlet']['columns'] = array (
  'name' => 
  array (
    'width' => '40%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'account_name' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'label' => 'LBL_ACCOUNT_NAME',
    'id' => 'ACCOUNT_ID',
    'link' => true,
    'width' => '10%',
    'default' => true,
  ),
  'lead_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'studio' => 'visible',
    'label' => 'LBL_LEAD_NAME',
    'id' => 'LEAD_ID',
    'width' => '10%',
    'default' => true,
  ),
  'service_status_c' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SERVICE_STATUS',
    'width' => '10%',
  ),
  'mode_of_intervention' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_MODE_OF_INTERVENTION',
    'width' => '10%',
    'default' => true,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => false,
    'name' => 'date_entered',
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
);
