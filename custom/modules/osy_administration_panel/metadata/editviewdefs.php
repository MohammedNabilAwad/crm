<?php
$module_name = 'osy_administration_panel';
$viewdefs [$module_name] = 
array (
  'EditView' => 
  array (
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_PANEL_BANK' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_SETTINGS' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'lbl_panel_bank' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name_bank_holder',
            'label' => 'LBL_NAME_BANK_HOLDER',
          ),
          1 => 
          array (
            'name' => 'name_bank',
            'label' => 'LBL_NAME_BANK',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'iban',
            'label' => 'LBL_IBAN',
          ),
          1 => 
          array (
            'name' => 'swift_bic',
            'label' => 'LBL_SWIFT_BIC',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'street',
            'label' => 'LBL_STREET',
          ),
          1 => 
          array (
            'name' => 'street_bank',
            'label' => 'LBL_STREET_BANK',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'postal_code',
            'label' => 'LBL_POSTAL_CODE',
          ),
          1 => 
          array (
            'name' => 'postal_code_bank',
            'label' => 'LBL_POSTAL_CODE_BANK',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'city',
            'label' => 'LBL_CITY',
          ),
          1 => 
          array (
            'name' => 'city_bank',
            'label' => 'LBL_CITY_BANK',
          ),
        ),
      ),
      'lbl_panel_settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'flag_reminder_assigned_user',
            'label' => 'LBL_FLAG_REMINDER_ASSIGNED_USER',
          ),
          1 => 
          array (
            'name' => 'flag_reminder_members',
            'label' => 'LBL_FLAG_REMINDER_MEMBERS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'send_reminder_period',
            'studio' => 'visible',
            'label' => 'LBL_SEND_REMINDER_PERIOD',
          ),
        ),
        2 => 
        array (
          0 => 'description',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'view_partial_payments',
            'label' => 'LBL_VIEW_PARTIAL_PAYMENTS',
          ),
          1 => 
          array (
            'name' => 'view_taxes_payments',
            'label' => 'LBL_VIEW_TAXES_PAYMENTS',
          ),
        ),
      	4 =>
      	array (
      	  0 =>
      	  array (
      	  	'name' => 'view_training_package_amount',
      	  	'label' => 'LBL_VIEW_TRAINING_PACKAGE_AMOUNT',
      	  ),      			
      	),
          5 =>
      	array (
      	  0 =>
      	  array (
      	  	'name' => 'max_delegate_send_num',
      	  	'label' => 'LBL_MAX_DELEGATE_SEND_NUM',
      	  ),
          1 =>
          array(
              'name' => 'flag_enable_payment_logic',
              'label' => 'LBL_ENABLE_PAYMENT_LOGIC',
          ),
      	),
      ),
    ),
  ),
);
?>
