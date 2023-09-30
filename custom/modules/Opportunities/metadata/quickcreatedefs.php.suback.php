<?php

require_once('custom/modules/Opportunities/metadata/get_expiry_data_select.php');

// created: 2019-11-25 10:40:00
$viewdefs['Opportunities']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '2',
    'widths' => 
    array (
      0 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
      1 => 
      array (
        'label' => '10',
        'field' => '30',
      ),
    ),
    'includes' => 
    array (
      0 => 
      array (
        'file' => 'custom/modules/Opportunities/osy.js',
      ),
    ),
    'javascript' => '{$PROBABILITY_SCRIPT}',
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'DEFAULT' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
        1 => 
        array (
          'name' => 'account_name',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'currency_id',
        ),
        1 => 'amount',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'payment_status',
          'label' => 'LBL_PAYMENT_STATUS',
        ),
        1 => '',
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'expiry_date',
          'label' => 'LBL_EXPIRY_DATE',
          'customCode' => '<select name="expiry_date">' . getExDataSelect( ) . ' </select>',
        ),
        1 => 
        array (
          'name' => 'invoice_date',
          'label' => 'LBL_INVOICE_DATE',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'invoice_number_c',
          'label' => 'LBL_INVOICE_NUMBER',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'assigned_user_name',
        ),
      ),
    ),
  ),
);