<?php
$viewdefs ['Leads'] = 
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
          3 => 
          array (
            'customCode' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}<input title="{$MOD.LBL_CONVERTLEAD_TITLE}" accessKey="{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}" type="button" class="button" onClick="document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'" name="convert" value="{$MOD.LBL_CONVERTLEAD}">{/if}',
            'sugar_html' => 
            array (
              'type' => 'button',
              'value' => '{$MOD.LBL_CONVERTLEAD}',
              'htmlOptions' => 
              array (
                'title' => '{$MOD.LBL_CONVERTLEAD_TITLE}',
                'accessKey' => '{$MOD.LBL_CONVERTLEAD_BUTTON_KEY}',
                'class' => 'button',
                'onClick' => 'document.location=\'index.php?module=Leads&action=ConvertLead&record={$fields.id.value}\'',
                'name' => 'convert',
                'id' => 'convert_lead_button',
              ),
              'template' => '{if $bean->aclAccess("edit") && !$DISABLE_CONVERT_ACTION}[CONTENT]{/if}',
            ),
          ),
          4 => 'FIND_DUPLICATES',
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_GENERATE_LETTER}">',
          ),
        ),
        'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
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
          'file' => 'modules/Leads/Lead.js',
        ),
        1 => 
        array (
          'file' => 'custom/modules/Leads/Lead.js',
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
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'type_of_potential_members',
            'label' => 'LBL_TYPE_OF_POTENTIAL_MEMBERS',
          ),
          1 => 'status',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'displayParams' => 
            array (
            ),
          ),
          1 => 
          array (
            'name' => 'english_name_c',
            'label' => 'LBL_ENGLISH_NAME',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'commercial_name_arabic_c',
            'label' => 'LBL_COMMERCIAL_NAME_ARABIC',
          ),
          1 => 
          array (
            'name' => 'commercial_name_english_c',
            'label' => 'LBL_COMMERCIAL_NAME_ENGLISH',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'commercial_registration_no_c',
            'label' => 'LBL_COMMERCIAL_REGISTRATION_NO',
          ),
          1 => 
          array (
            'name' => 'release_side_c',
            'studio' => 'visible',
            'label' => 'LBL_RELEASE_SIDE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'date_issuance_register_c',
            'label' => 'LBL_DATE_ISSUANCE_REGISTER',
          ),
          1 => 
          array (
            'name' => 'registration_expiry_date_c',
            'label' => 'LBL_REGISTRATION_EXPIRY_DATE',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'id_card_number_c',
            'label' => 'LBL_ID_CARD_NUMBER',
          ),
          1 => 
          array (
            'name' => 'issue_authority_c',
            'label' => 'LBL_ISSUE_AUTHORITY',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'issue_date_id_card_c',
            'label' => 'LBL_ISSUE_DATE_ID_CARD',
          ),
          1 => '',
        ),
        7 => 
        array (
          0 => 'phone_work',
          1 => 'phone_mobile',
        ),
        8 => 
        array (
          0 => 'phone_fax',
          1 => 
          array (
            'name' => 'other_company_number_c',
            'label' => 'LBL_OTHER_COMPANY_NUMBER',
          ),
        ),
        9 => 
        array (
          0 => 'website',
          1 => 
          array (
            'name' => 'gender_c',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
          ),
        ),
        10 => 
        array (
          0 => '',
          1 => 
          array (
            'name' => 'role_function_c',
            'studio' => 'visible',
            'label' => 'LBL_ROLE_FUNCTION',
          ),
        ),
        11 => 
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
          1 => 'description',
        ),
        12 => 
        array (
          0 => 
          array (
            'name' => 'front_address_c',
            'label' => 'LBL_FRONT_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'beside_address_c',
            'label' => 'LBL_BESIDE_ADDRESS',
          ),
        ),
        13 => 
        array (
          0 => '',
          1 => '',
        ),
        14 => 
        array (
          0 => 'email1',
        ),
        15 => 
        array (
          0 => 
          array (
            'name' => 'was_detected_c',
            'studio' => 'visible',
            'label' => 'LBL_WAS_DETECTED',
          ),
          1 => 
          array (
            'name' => 'finders_name_c',
            'label' => 'LBL_FINDERS_NAME',
          ),
        ),
      ),
      'LBL_PANEL_ADVANCED' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'work_field_c',
            'studio' => 'visible',
            'label' => 'LBL_WORK_FIELD',
          ),
          1 => '',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'type_activity_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_ACTIVITY',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'industry',
            'comment' => 'The company belongs in this industry',
            'label' => 'LBL_INDUSTRY',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'subcategories',
            'label' => 'LBL_SUBCATEGORIES',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'industry_description_c',
            'studio' => 'visible',
            'label' => 'LBL_INDUSTRY_DESCRIPTION',
          ),
          1 => '',
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'employees',
            'comment' => 'Number of employees, varchar to accomodate for both number (100) or range (50-100)',
            'label' => 'LBL_EMPLOYEES',
          ),
          1 => 
          array (
            'name' => 'nr_employees_at',
            'label' => 'LBL_NR_EMPLOYEES_AT',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'nr_male_employees_c',
            'label' => 'LBL_NR_MALE_EMPLOYEES',
          ),
          1 => 
          array (
            'name' => 'male_foreign_worker_c',
            'label' => 'LBL_MALE_FOREIGN_WORKER',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'nr_female_employees_c',
            'label' => 'LBL_NR_FEMALE_EMPLOYEES',
          ),
          1 => 
          array (
            'name' => 'female_foreign_worker_c',
            'label' => 'LBL_FEMALE_FOREIGN_WORKER',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'other_information_about_staf_c',
            'studio' => 'visible',
            'label' => 'LBL_OTHER_INFORMATION_ABOUT_STAF',
          ),
          1 => 
          array (
            'name' => 'capital_c',
            'label' => 'LBL_CAPITAL',
          ),
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'ownership',
            'comment' => '',
            'label' => 'LBL_OWNERSHIP',
          ),
          1 => 
          array (
            'name' => 'type_of_business',
            'label' => 'LBL_TYPE_OF_BUSINESS',
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
);
;
?>
