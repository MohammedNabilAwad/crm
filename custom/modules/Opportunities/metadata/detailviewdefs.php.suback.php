<?php
// created: 2019-11-25 10:41:27
$viewdefs = array (
  'Opportunities' => 
  array (
    'DetailView' => 
    array (
      'templateMeta' => 
      array (
        'form' => 
        array (
          'buttons' => 
          array (
            0 => 'EDIT',
            1 => 'DUPLICATE',
            2 => 'DELETE',
            3 => 'FIND_DUPLICATES',
          ),
          'hidden' => 
          array (
            0 => '<input type="hidden" name="osy_administration_panel_id" id="osy_administration_panel_id" value="{$fields.osy_administration_panel_id.value}">',
            1 => '<input type="hidden" name="osy_view_taxes_payments" id="osy_view_taxes_payments" value="{$fields.osy_view_taxes_payments.value}">',
            2 => '<input type="hidden" name="osy_view_partial_payments" id="osy_view_partial_payments" value="{$fields.osy_view_partial_payments.value}">',
            3 => '<input type="hidden" name="osy_view_training_package_amount" id="osy_view_training_package_amount" value="{$fields.osy_view_training_package_amount.value}">',
          ),
        ),
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
            'file' => 'custom/include/osyDependency.js',
          ),
          1 => 
          array (
            'file' => 'custom/modules/Opportunities/osyDependency.js.php',
          ),
        ),
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
        'syncDetailEditViews' => true,
      ),
      'panels' => 
      array (
        'default' => 
        array (
          0 => 
          array (
            0 => 'name',
            1 => 'account_name',
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'currency_id',
              'comment' => 'Currency used for display purposes',
              'label' => 'LBL_CURRENCY',
            ),
            1 => 
            array (
              'name' => 'amount',
              'label' => '{$MOD.LBL_AMOUNT} ({$CURRENCY})',
            ),
          ),
            2 =>
                array (
                    0 =>
                        array (
                            'name' => 'total_paid',
                            'label' => 'LBL_TOTAL_PAID',
                        ),
                    1 =>
                        array (
                            'name' => 'balance',
                            'label' => 'LBL_BALANCE',
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
            ),
            1 => 
            array (
              'name' => 'taxes_c',
              'label' => 'LBL_TAXES',
            ),
          ),
          5 =>
          array (
            0 => 
            array (
              'name' => 'invoice_date',
              'label' => 'LBL_INVOICE_DATE',
            ),
            1 => 
            array (
              'name' => 'partial_payment_c',
              'label' => 'LBL_PARTIAL_PAYMENT',
            ),
          ),
          6 =>
          array (
            0 => 
            array (
              'name' => 'invoice_number_c',
              'label' => 'LBL_INVOICE_NUMBER',
            ),
          ),
          7 =>
          array (
            0 => 
            array (
              'name' => 'payment_status',
              'label' => 'LBL_PAYMENT_STATUS',
            ),
            1 => 
            array (
              'name' => 'training_pck_amount_c',
              'label' => 'LBL_TRAINING_PCK_AMOUNT',
            ),
          ),
          8 =>
          array (
            0 => '',
            1 => 
            array (
              'name' => 'total_amount_c',
              'label' => 'LBL_TOTAL_AMOUNT',
            ),
          ),
          9 =>
          array (
            0 => 
            array (
              'name' => 'date_entered',
              'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            ),
            1 => 
            array (
              'name' => 'description',
              'nl2br' => true,
            ),
          ),
        ),
        'LBL_PANEL_ASSIGNMENT' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'assigned_user_name',
              'label' => 'LBL_ASSIGNED_TO',
            ),
          ),
        ),
      ),
    ),
  ),
);