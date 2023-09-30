<?php
$dashletData['OpportunitiesDashlet']['searchFields'] = array (
  'date_entered' => 
  array (
    'default' => '',
  ),
  'opportunity_type' => 
  array (
    'default' => '',
  ),
  'sales_stage' => 
  array (
    'default' => '',
  ),
  'assigned_user_id' => 
  array (
    'default' => '',
  ),
);
$dashletData['OpportunitiesDashlet']['columns'] = array (
  'account_name' => 
  array (
    'width' => '35%',
    'label' => 'LBL_ACCOUNT_NAME',
    'default' => true,
    'link' => false,
    'id' => 'account_id',
    'ACLTag' => 'ACCOUNT',
    'name' => 'account_name',
  ),
  'name' => 
  array (
    'width' => '35%',
    'label' => 'LBL_OPPORTUNITY_NAME',
    'link' => true,
    'default' => true,
    'name' => 'name',
  ),
  'amount' => 
  array (
    'type' => 'currency',
    'label' => 'LBL_AMOUNT',
    'currency_format' => true,
    'width' => '10%',
    'default' => true,
    'name' => 'amount',
  ),
  'date_closed' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_CLOSED',
    'default' => true,
    'defaultOrderColumn' => 
    array (
      'sortOrder' => 'ASC',
    ),
    'name' => 'date_closed',
  ),
  'nr_reminders' => 
  array (
    'type' => 'int',
    'label' => 'LBL_NR_REMINDERS',
    'width' => '10%',
    'default' => true,
    'name' => 'nr_reminders',
  ),
  'payment_status' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_PAYMENT_STATUS',
    'width' => '10%',
    'default' => true,
    'name' => 'payment_status',
  ),
  'opportunity_type' => 
  array (
    'width' => '15%',
    'label' => 'LBL_TYPE',
    'name' => 'opportunity_type',
    'default' => false,
  ),
  'probability' => 
  array (
    'width' => '15%',
    'label' => 'LBL_PROBABILITY',
    'name' => 'probability',
    'default' => false,
  ),
  'date_entered' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_ENTERED',
    'name' => 'date_entered',
    'default' => false,
  ),
  'date_modified' => 
  array (
    'width' => '15%',
    'label' => 'LBL_DATE_MODIFIED',
    'name' => 'date_modified',
    'default' => false,
  ),
  'created_by' => 
  array (
    'width' => '8%',
    'label' => 'LBL_CREATED',
    'name' => 'created_by',
    'default' => false,
  ),
  'subscription_type' => 
  array (
    'type' => 'enum',
    'label' => 'LBL_SUBSCRIPTION_TYPE',
    'width' => '10%',
    'default' => false,
    'name' => 'subscription_type',
  ),
  'assigned_user_name' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'name' => 'assigned_user_name',
    'default' => false,
  ),
  'invoice_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_INVOICE_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'invoice_date',
  ),
  'expiry_date' => 
  array (
    'type' => 'date',
    'label' => 'LBL_EXPIRY_DATE',
    'width' => '10%',
    'default' => false,
    'name' => 'expiry_date',
  ),
  'next_step' => 
  array (
    'width' => '10%',
    'label' => 'LBL_NEXT_STEP',
    'name' => 'next_step',
    'default' => false,
  ),
);
