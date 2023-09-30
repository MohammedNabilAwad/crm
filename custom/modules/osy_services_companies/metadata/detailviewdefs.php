<?php
$module_name = 'osy_services_companies';
$viewdefs [$module_name] = 
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/include/osyDependency.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/osy_services_companies/osyDependency.js.php',
        ),
      ),
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'account_name',
          1 => 
          array (
            'name' => 'lead_name',
            'studio' => 'visible',
            'label' => 'LBL_LEAD_NAME',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'contact_name',
            'studio' => 'visible',
            'label' => 'LBL_CONTACT_NAME',
          ),
          1 => 
          array (
            'name' => 'osy_contactspotentialmember_name',
            'studio' => 'visible',
            'label' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'status_service_c',
            'studio' => 'visible',
            'label' => 'LBL_STATUS_SERVICE',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'subject',
            'label' => 'LBL_SUBJECT',
          ),
          1 => 
          array (
            'name' => 'subject_description',
            'label' => 'LBL_SUBJECT_DESCRIPTION',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'mode_of_intervention',
            'comment' => '',
            'studio' => 'visible',
            'label' => 'LBL_MODE_OF_INTERVENTION',
          ),
          1 => 
          array (
            'name' => 'duration',
            'label' => 'LBL_DURATION',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'service_free_charge_c',
            'studio' => 'visible',
            'label' => 'LBL_SERVICE_FREE_CHARGE',
          ),
          1 => 
          array (
            'name' => 'payment_status_c',
            'studio' => 'visible',
            'label' => 'LBL_PAYMENT_STATUS',
          ),
        ),
        6 => 
        array (
          0 => '',
          1 => '',
        ),
        7 => 
        array (
          0 => 'description',
        ),
        8 => 
        array (
          0 => 'assigned_user_name',
        ),
      ),
    ),
  ),
);
;
?>
