<?php

require_once('custom/modules/Opportunities/metadata/get_expiry_data_select.php');

// created: 2019-11-25 10:40:00
$viewdefs['Opportunities']['EditView'] = array (
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
      /*0 =>
      array (
        'file' => 'custom/modules/Opportunities/osy.js',
      ),*/
      1 =>
      array (
        'file' => 'custom/include/osyDependency.js',
      ),
      2 => 
      array (
        'file' => 'custom/modules/Opportunities/osyDependency.js.php',
      ),
    ),
    'javascript' => '<script>
    					{literal}
    						SUGAR.util.doWhen("typeof(document.getElementsByTagName(\'body\')[0]) != \'undefined\'", function() {
								removeFromValidate(\'EditView\', \'account_name\');
								removeFromValidate(\'EditView\', \'account_id\');
							});
    					{/literal}
    				</script>
    		',
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
      'LBL_PANEL_ASSIGNMENT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
    'syncDetailEditViews' => false,
    'form' => 
    array (
      'hidden' => 
      array (
        0 => '<input type="hidden" name="osy_administration_panel_id" id="osy_administration_panel_id" value="{$fields.osy_administration_panel_id.value}">',
        1 => '<input type="hidden" name="osy_view_taxes_payments" id="osy_view_taxes_payments" value="{$fields.osy_view_taxes_payments.value}">',
        2 => '<input type="hidden" name="osy_view_partial_payments" id="osy_view_partial_payments" value="{$fields.osy_view_partial_payments.value}">',
        3 => '<input type="hidden" name="osy_view_training_package_amount" id="osy_view_training_package_amount" value="{$fields.osy_view_training_package_amount.value}">',
      ),
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'account_name',
          'displayParams' => 
          array (
            'required' => false,
          ),
        ),
        1 => 
        array (
          'name' => 'created_by_name',
          'label' => 'LBL_CREATED',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'currency_id',
          'label' => 'LBL_CURRENCY',
        ),
        1 => 
        array (
          'name' => 'amount',
        ),
      ),
      3 => 
      array (
        0 => '',
        1 => 
        array (
          'name' => 'taxes_perc',
          'label' => 'LBL_TAXES_PERC',
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'expiry_date',
          'label' => 'LBL_EXPIRY_DATE',
          'customCode' => '<select name="expiry_date">' . getExDataSelect( ) . ' </select>',
        ),
        1 => 
        array (
          'name' => 'partial_payment_c',
          'label' => 'LBL_PARTIAL_PAYMENT',
          'type' => 'readonly',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'invoice_date',
          'label' => 'LBL_INVOICE_DATE',
        ),
      ),
      6 => 
      array (
        0 => 
        array (
          'name' => 'invoice_number_c',
          'label' => 'LBL_INVOICE_NUMBER',
        ),
        1 => 
        array (
          'name' => 'training_pck_amount_c',
          'label' => 'LBL_TRAINING_PCK_AMOUNT',
        ),
      ),
      7 => 
      array (
        0 => 
        array (
          'name' => 'payment_status',
          'label' => 'LBL_PAYMENT_STATUS',
        ),
      ),
      8 => 
      array (
        0 => 'description',
      ),
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      0 => 
      array (
        0 => 'assigned_user_name',
      ),
    ),
  ),
);