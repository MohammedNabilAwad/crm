<?php
// created: 2017-10-30 17:54:27
$viewdefs = array (
  'Accounts' => 
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
            4 => 
            array (
              'customCode' => '<input title="{$MOD.LBL_PRINT_ACTIVITY_LIST}" class="button" onclick="window.open(\'index.php?module=Accounts&amp;action=listActivity&amp;id={$smarty.request.record}&amp;to_pdf=1\',\'\',\'width=800,height=600\');" type="button" name="activity_list" id="activity_list" value="{$MOD.LBL_PRINT_ACTIVITY_LIST}"/>',
            ),
          ),
          'hidden' => 
          array (
            'javascript' => '
                            <script>
                                {literal}
                                        SUGAR.util.doWhen("document.getElementById(\'name\') != null", function(){
	                                        if(document.getElementById(\'member_type\').value == \'Association\'){
	                                            document.getElementById(\'name\').parentNode.parentNode.childNodes[1].innerHTML = SUGAR.language.get(\'Accounts\', \'LBL_NAME_WITH_ASSOCIATION\');
	                                        }
                                    	});
                                {/literal}
        						window.onload = function()
        						{ldelim}
        						{if $fields.member_type.value == "Association"}
        							$("#lbl_target_exporting_markets").parents("td").first().css("display","none").next().css("display","none").prevAll().last().nextAll(":visible").last().attr("colspan","3");
        							$("#lbl_five_main_operating_markets").parents("td").first().css("display","none").next().css("display","none").prevAll().last().nextAll(":visible").last().attr("colspan","3");
								{/if}
        						{rdelim}
                            </script>
                        ',
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
            'file' => 'modules/Accounts/Account.js',
          ),
          1 => 
          array (
            'file' => 'custom/include/osyDependency.js',
          ),
          2 => 
          array (
            'file' => 'custom/modules/Accounts/osyDependency.js.php',
          ),
          3 => 
          array (
            'file' => 'custom/modules/Accounts/osy_detailview.js',
          ),
        ),
        'useTabs' => false,
        'tabDefs' => 
        array (
          'LBL_EDITVIEW_PANEL1' => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
          'LBL_ACCOUNT_INFORMATION' => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
          'LBL_PANEL_ADVANCED' => 
          array (
            'newTab' => false,
            'panelDefault' => 'expanded',
          ),
          'LBL_EDITVIEW_PANEL2' => 
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
        'lbl_editview_panel1' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'osy_account_code',
              'label' => 'LBL_OSY_ACCOUNT_CODE',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'member_type',
              'label' => 'LBL_MEMBER_TYPE',
            ),
            1 => '',
          ),
        ),
        'lbl_account_information' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'name',
              'comment' => 'Name of the Company',
              'label' => 'LBL_NAME',
              'displayParams' => 
              array (
              ),
            ),
            1 => 
            array (
              'name' => 'phone_office',
              'comment' => 'The office phone number',
              'label' => 'LBL_PHONE_OFFICE',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'website',
              'type' => 'link',
              'label' => 'LBL_WEBSITE',
              'displayParams' => 
              array (
                'link_target' => '_blank',
              ),
            ),
            1 => 
            array (
              'name' => 'phone_fax',
              'comment' => 'The fax phone number of this company',
              'label' => 'LBL_FAX',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'company_id_or_vat',
              'label' => 'LBL_COMPANY_ID_OR_VAT',
            ),
            1 => 
            array (
              'name' => 'other_company_number',
              'label' => 'LBL_OTHER_COMPANY_NUMBER',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'billing_address_street',
              'label' => 'LBL_BILLING_ADDRESS',
              'type' => 'osyaddress',
              'displayParams' => 
              array (
                'key' => 'billing',
              ),
            ),
            1 => 
            array (
              'name' => 'shipping_address_street',
              'label' => 'LBL_SHIPPING_ADDRESS',
              'type' => 'osyaddress',
              'displayParams' => 
              array (
                'key' => 'shipping',
              ),
            ),
          ),
          4 => 
          array (
            0 => 
            array (
              'name' => 'accounting_dep_email_c',
              'label' => 'LBL_ACCOUNTING_DEP_EMAIL',
            ),
            1 => '',
          ),
          5 => 
          array (
            0 => 
            array (
              'name' => 'email1',
              'studio' => 'false',
              'label' => 'LBL_EMAIL',
            ),
          ),
          6 => 
          array (
            0 => 
            array (
              'name' => 'description',
              'comment' => 'Full text of the note',
              'label' => 'LBL_DESCRIPTION',
            ),
            1 => '',
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
            0 => 'committees',
            1 => '',
          ),
          3 => 
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
          4 => 
          array (
            0 => 
            array (
              'name' => 'unionization_c',
              'studio' => 'visible',
              'label' => 'LBL_UNIONIZATION',
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
          ),
          6 => 
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
              'name' => 'male_employees_c',
              'label' => 'LBL_MALE_EMPLOYEES',
            ),
            1 => 
            array (
              'name' => 'female_employees_c',
              'label' => 'LBL_FEMALE_EMPLOYEES',
            ),
          ),
          9 => 
          array (
            0 => 
            array (
              'name' => 'other_info_employees_c',
              'studio' => 'visible',
              'label' => 'LBL_OTHER_INFO_EMPLOYEES',
            ),
          ),
          10 => 
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
          11 => 
          array (
            0 => 
            array (
              'name' => 'total_salary_wage_bill',
              'label' => 'LBL_TOTAL_SALARY_WAGE_BILL',
            ),
          ),
          12 => 
          array (
            0 => 
            array (
              'name' => 'association_member_type',
              'label' => 'LBL_ASSOCIATION_MEMBER_TYPE',
            ),
            1 => 
            array (
              'name' => 'nr_company_members',
              'label' => 'LBL_NR_COMPANY_MEMBERS',
            ),
          ),
          13 => 
          array (
            0 => 
            array (
              'name' => 'territorial',
              'label' => 'LBL_TERRITORIAL',
            ),
          ),
          14 => 
          array (
            0 => 
            array (
              'name' => 'other',
              'label' => 'LBL_OTHER',
            ),
          ),
          15 => 
          array (
            0 => 
            array (
              'name' => 'lead_source',
              'comment' => 'How did the contact come about',
              'label' => 'LBL_LEAD_SOURCE',
            ),
          ),
          16 => 
          array (
            0 => 
            array (
              'name' => 'parent_name',
              'label' => 'LBL_MEMBER_OF',
            ),
            1 => '',
          ),
          17 => 
          array (
            0 => 
            array (
              'name' => 'products_and_services',
              'label' => 'LBL_PRODUCTS_AND_SERVICES',
            ),
          ),
          18 => 
          array (
            0 => 
            array (
              'name' => 'five_main_operating_markets',
              'comment' => '',
              'studio' => 'visible',
              'label' => 'LBL_FIVE_MAIN_OPERATING_MARKETS',
              'customLabel' => '<div id="lbl_five_main_operating_markets" style="display:none"></div>{$MOD.LBL_FIVE_MAIN_OPERATING_MARKETS}:',
            ),
            1 => 
            array (
              'name' => 'target_exporting_markets',
              'comment' => '',
              'studio' => 'visible',
              'label' => 'LBL_TARGET_EXPORTING_MARKETS',
              'customLabel' => '<div id="lbl_target_exporting_markets" style="display:none"></div>{$MOD.LBL_TARGET_EXPORTING_MARKETS}:',
            ),
          ),
        ),
        'lbl_editview_panel2' => 
        array (
          0 => 
          array (
            0 => 
            array (
              'name' => 'membership_status',
              'label' => 'LBL_MEMBERSHIP_STATUS',
            ),
            1 => 
            array (
              'name' => 'payment_status',
              'comment' => 'G=Green, Y=Yellow, R=Red',
              'label' => 'LBL_PAYMENT_STATUS',
              'customCode' => '{php}echo htmlspecialchars_decode(print_r($this->_tpl_vars["fields"]["payment_status"]["value"], true));{/php}',
            ),
          ),
          1 => 
          array (
            0 => 
            array (
              'name' => 'member_from',
              'label' => 'LBL_MEMBER_FROM',
            ),
            1 => 
            array (
              'name' => 'member_till',
              'label' => 'LBL_MEMBER_TILL',
            ),
          ),
          2 => 
          array (
            0 => 
            array (
              'name' => 'levels',
              'label' => 'LBL_LEVELS',
            ),
            1 => 
            array (
              'name' => 'categories',
              'label' => 'LBL_CATEGORIES',
            ),
          ),
          3 => 
          array (
            0 => 
            array (
              'name' => 'subscription_fees',
              'label' => 'LBL_SUBSCRIPTION_FEES',
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