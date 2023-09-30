<?php
$module_name = 'osy_services_companies';
$listViewDefs [$module_name] = 
array (
  'ACCOUNT_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'studio' => 'visible',
    'label' => 'LBL_ACCOUNT_NAME',
    'id' => 'OSY_ACCOUNT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'CONTACT_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'studio' => 'visible',
    'label' => 'LBL_CONTACT_NAME',
    'id' => 'CONTACT_ID',
    'width' => '10%',
    'default' => true,
  ),
  'LEAD_NAME' => 
  array (
    'type' => 'relate',
    'studio' => 'visible',
    'link' => true,
    'label' => 'LBL_LEAD_NAME',
    'id' => 'LEAD_ID',
    'width' => '10%',
    'default' => true,
  ),
  'OSY_CONTACTSPOTENTIALMEMBER_NAME' => 
  array (
    'type' => 'relate',
    'link' => true,
    'studio' => 'visible',
    'label' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_NAME',
    'id' => 'OSY_CONTACTSPOTENTIALMEMBER_ID',
    'width' => '10%',
    'default' => true,
  ),
  'SUBJECT' => 
  array (
    'width' => '32%',
    'label' => 'LBL_SUBJECT',
    'default' => true,
    'link' => true,
  ),
  'MODE_OF_INTERVENTION' => 
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_MODE_OF_INTERVENTION',
    'width' => '10%',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'type' => 'datetime',
    'label' => 'LBL_DATE_ENTERED',
    'width' => '10%',
    'default' => true,
  ),
  'SERVICE_STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_SERVICE_STATUS',
    'width' => '10%',
  ),
  'PAYMENT_STATUS_C' => 
  array (
    'type' => 'enum',
    'default' => true,
    'studio' => 'visible',
    'label' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '9%',
    'label' => 'LBL_ASSIGNED_TO_NAME',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => false,
  ),
  'DURATION' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_DURATION',
    'width' => '10%',
    'default' => false,
  ),
  'SUBJECT_DESCRIPTION' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SUBJECT_DESCRIPTION',
    'width' => '10%',
    'default' => false,
  ),
);
?>
