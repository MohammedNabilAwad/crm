<?php
// created: 2023-09-24 16:14:44
$searchFields['Opportunities'] = array (
  'name' => 
  array (
    'query_type' => 'default',
  ),
  'account_name' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'accounts.name',
    ),
  ),
  'amount' => 
  array (
    'query_type' => 'default',
  ),
  'next_step' => 
  array (
    'query_type' => 'default',
  ),
  'probability' => 
  array (
    'query_type' => 'default',
  ),
  'lead_source' => 
  array (
    'query_type' => 'default',
    'operator' => '=',
    'options' => 'lead_source_dom',
    'template_var' => 'LEAD_SOURCE_OPTIONS',
  ),
  'opportunity_type' => 
  array (
    'query_type' => 'default',
    'operator' => '=',
    'options' => 'opportunity_type_dom',
    'template_var' => 'TYPE_OPTIONS',
  ),
  'sales_stage' => 
  array (
    'query_type' => 'default',
    'operator' => '=',
    'options' => 'sales_stage_dom',
    'template_var' => 'SALES_STAGE_OPTIONS',
    'options_add_blank' => true,
  ),
  'current_user_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
    'vname' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
  ),
  'assigned_user_id' => 
  array (
    'query_type' => 'default',
  ),
  'open_only' => 
  array (
    'query_type' => 'default',
    'db_field' => 
    array (
      0 => 'sales_stage',
    ),
    'operator' => 'not in',
    'closed_values' => 
    array (
      0 => 'Closed Won',
      1 => 'Closed Lost',
    ),
    'type' => 'bool',
  ),
  'range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_closed' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_closed' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_closed' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_amount' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'expiry_date' => 
  array (
    'query_type' => 'default',
  ),
  'date_closed' => 
  array (
    'query_type' => 'default',
  ),
  'range_total_paid' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_total_paid' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_total_paid' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_balance' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'invoice_date' => 
  array (
    'query_type' => 'default',
  ),
  'range_expiry_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_expiry_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_expiry_date' => 
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
);