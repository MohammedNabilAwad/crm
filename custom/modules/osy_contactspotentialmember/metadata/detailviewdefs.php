<?php
$module_name = 'osy_contactspotentialmember';
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
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_PANEL_ADVANCED' => 
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
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 'first_name',
          1 => 'last_name',
        ),
        1 => 
        array (
          0 => 'gender',
          1 => 
          array (
            'name' => 'lead_name',
            'label' => 'LBL_LEAD_NAME',
            'displayParams' => 
            array (
              'enableConnectors' => true,
              'module' => 'Leads',
              'connectors' => 
              array (
                0 => 'ext_rest_linkedin',
              ),
            ),
          ),
        ),
        2 => 
        array (
          0 => 'phone_work',
          1 => 'phone_fax',
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'osyaddress',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 'alt_address_street',
        ),
        4 => 
        array (
          0 => 'email1',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 'role_function',
          1 => 'other_role_function',
        ),
        1 => 
        array (
          0 => 'vip',
          1 => '',
        ),
        2 => 
        array (
          0 => 'category',
          1 => 'main_representative',
        ),
        3 => 
        array (
          0 => 'do_not_call',
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
  ),
);
;
?>
