<?php
$viewdefs ['Accounts'] = 
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
          'AOS_GENLET' => 
          array (
            'customCode' => '<input type="button" class="button" onClick="showPopup();" value="{$APP.LBL_PRINT_AS_PDF}">',
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
            'name' => 'member_type',
            'label' => 'LBL_MEMBER_TYPE',
          ),
          1 => 
          array (
            'name' => 'categories',
            'label' => 'LBL_CATEGORIES',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'osy_account_code',
            'label' => 'LBL_OSY_ACCOUNT_CODE',
          ),
          1 => 
          array (
            'name' => 'membership_status',
            'label' => 'LBL_MEMBERSHIP_STATUS',
          ),
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
            'name' => 'english_name_c',
            'label' => 'LBL_ENGLISH_NAME',
          ),
        ),
        1 => 
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
        2 => 
        array (
          0 => 
          array (
            'name' => 'short_company_name_c',
            'label' => 'LBL_SHORT_COMPANY_NAME',
          ),
          1 => 
          array (
            'name' => 'member_number_system_c',
            'label' => 'LBL_MEMBER_NUMBER_SYSTEM',
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
          0 => 
          array (
            'name' => 'phone_office',
            'comment' => 'The office phone number',
            'label' => 'LBL_PHONE_OFFICE',
          ),
          1 => 
          array (
            'name' => 'phone_mobile_c',
            'label' => 'LBL_PHONE_MOBILE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'other_company_number',
            'label' => 'LBL_OTHER_COMPANY_NUMBER',
          ),
          1 => 
          array (
            'name' => 'phone_fax',
            'comment' => 'The fax phone number of this company',
            'label' => 'LBL_FAX',
          ),
        ),
        9 => 
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
          1 => '',
        ),
        10 => 
        array (
          0 => 
          array (
            'name' => 'gender_c',
            'studio' => 'visible',
            'label' => 'LBL_GENDER',
          ),
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
            'name' => 'description',
            'comment' => 'Full text of the note',
            'label' => 'LBL_DESCRIPTION',
          ),
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
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
          ),
          1 => '',
        ),
        14 => 
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
            'name' => 'parent_name',
            'label' => 'LBL_MEMBER_OF',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'work_field_c',
            'studio' => 'visible',
            'label' => 'LBL_WORK_FIELD',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'type_activity_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_ACTIVITY',
          ),
          1 => '',
        ),
        3 => 
        array (
          0 => '',
          1 => '',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'industry',
            'comment' => 'The company belongs in this industry',
            'label' => 'LBL_INDUSTRY',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'subcategories',
            'label' => 'LBL_SUBCATEGORIES',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'industry_description_c',
            'studio' => 'visible',
            'label' => 'LBL_INDUSTRY_DESCRIPTION',
          ),
          1 => 'committees',
        ),
        7 => 
        array (
          0 => '',
          1 => '',
        ),
        8 => 
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
        9 => 
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
        10 => 
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
        11 => 
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
        12 => 
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
        13 => 
        array (
          0 => 
          array (
            'name' => 'association_member_type',
            'label' => 'LBL_ASSOCIATION_MEMBER_TYPE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
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
        1 => 
        array (
          0 => 
          array (
            'name' => 'subscription_type_c',
            'studio' => 'visible',
            'label' => 'LBL_SUBSCRIPTION_TYPE',
          ),
          1 => 
          array (
            'name' => 'mark_as_closed',
            'label' => 'LBL_MARK_AS_CLOSED',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'no_guarantees_allowed_c',
            'label' => 'LBL_NO_GUARANTEES_ALLOWED',
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
          1 => 
          array (
            'name' => 'total_balance',
            'label' => 'LBL_TOTAL_BALANCE',
          ),
        ),
      ),
    ),
  ),
);
;
?>
