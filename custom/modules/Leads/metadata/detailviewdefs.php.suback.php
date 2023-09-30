<?php
// created: 2017-10-30 17:54:27
$viewdefs = array (
  'Leads' => 
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
            1 => 'phone_work',
          ),
          2 => 
          array (
            0 => 'website',
            1 => 'phone_fax',
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'potential_company_id_c',
              'label' => 'LBL_POTENTIAL_COMPANY_ID',
            ),
            1 => 
            array (
              'name' => 'other_company_number_c',
              'label' => 'LBL_OTHER_COMPANY_NUMBER',
            ),
          ),
          4 => 
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
            1 => 
            array (
              'name' => 'alt_address_street',
              'label' => 'LBL_ALTERNATE_ADDRESS',
              'type' => 'osyaddress',
              'displayParams' => 
              array (
                'key' => 'alt',
              ),
            ),
          ),
          5 => 
          array (
            0 => 'email1',
          ),
          6 => 
          array (
            0 => 
            array (
              'name' => 'opportunities_1_name',
              'label' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
            ),
            1 => 'description',
          ),
        ),
        'LBL_PANEL_ADVANCED' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'industry',
              'comment' => 'The company belongs in this industry',
              'label' => 'LBL_INDUSTRY',
            ),
            1 => 
            array (
              'name' => 'subcategories',
              'label' => 'LBL_SUBCATEGORIES',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'industry_description_c',
              'studio' => 'visible',
              'label' => 'LBL_INDUSTRY_DESCRIPTION',
            ),
            1 => '',
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'annual_revenue',
              'comment' => 'Annual revenue for this company',
              'label' => 'LBL_ANNUAL_REVENUE',
            ),
            1 => 
            array (
              'name' => 'size_c',
              'studio' => 'visible',
              'label' => 'LBL_SIZE',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'unionization_c',
              'studio' => 'visible',
              'label' => 'LBL_UNIONIZATION',
            ),
            1 => '',
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'employees',
              'comment' => 'Number of employees, varchar to accomodate for both number (100) or range (50-100)',
              'label' => 'LBL_EMPLOYEES',
            ),
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'nr_employees_at',
              'label' => 'LBL_NR_EMPLOYEES_AT',
            ),
            1 => 
            array (
              'name' => 'date_employees_at',
              'label' => 'LBL_DATE_EMPLOYEES_AT',
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
              'name' => 'nr_female_employees_c',
              'label' => 'LBL_NR_FEMALE_EMPLOYEES',
            ),
          ),
          7 => 
          array (
            0 => 
            array (
              'name' => 'nr_permanent',
              'label' => 'LBL_NR_PERMANENT',
            ),
            1 => 
            array (
              'name' => 'nr_no_permanent_c',
              'label' => 'LBL_NR_NO_PERMANENT',
            ),
          ),
          8 => 
          array (
            0 => 
            array (
              'name' => 'other_info_about_staff_c',
              'studio' => 'visible',
              'label' => 'LBL_OTHER_INFO_ABOUT_STAFF',
            ),
            1 => '',
          ),
          9 => 
          array (
            0 => 
            array (
              'name' => 'ownership',
              'comment' => '',
              'label' => 'LBL_OWNERSHIP',
            ),
          ),
          10 => 
          array (
            0 => 
            array (
              'name' => 'type_of_business',
              'label' => 'LBL_TYPE_OF_BUSINESS',
            ),
            1 => 
            array (
              'name' => 'total_salary_wage_bill',
              'label' => 'LBL_TOTAL_SALARY_WAGE_BILL',
            ),
          ),
          11 => 
          array (
            0 => 
            array (
              'name' => 'lead_source',
              'comment' => 'How did the contact come about',
              'label' => 'LBL_LEAD_SOURCE',
            ),
            1 => 
            array (
              'name' => 'products_and_services',
              'label' => 'LBL_PRODUCTS_AND_SERVICES',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'name' => 'five_main_operating_markets',
              'comment' => '',
              'studio' => 'visible',
              'label' => 'LBL_FIVE_MAIN_OPERATING_MARKETS',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'name' => 'target_exporting_market_c',
              'studio' => 'visible',
              'label' => 'LBL_TARGET_EXPORTING_MARKET',
            ),
            1 => '',
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