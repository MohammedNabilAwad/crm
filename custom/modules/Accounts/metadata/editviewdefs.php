<?php
$viewdefs ['Accounts'] = 
array (
  'EditView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'SAVE',
          1 => 'CANCEL',
        ),
        'hidden' => 
        array (
          0 => '<input type="hidden" name="payment_status" id="payment_status" value="{$fields.payment_status.value}">',
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
          'file' => 'custom/modules/Accounts/osy_editview.js',
        ),
      ),
      'javascript' => '
<script type="text/javascript">
{literal}
if(typeof(SUGAR) != \'undefined\' &&  typeof(SUGAR.util) != \'undefined\' &&  typeof(SUGAR.util.doWhen) != \'undefined\') {

    	SUGAR.util.doWhen("document.getElementById(\'footer\') && typeof(HideViewFields) != \'undefined\' ", function() {

    		HideViewFields();
      		YAHOO.util.Event.addListener(\'member_type\', \'change\',  HideViewFields );

		});

}
{/literal}
</script>
<script type="text/javascript">
	{php}
		require_once("custom/include/osyVisibilityGrid.js.php");
		$this->_tpl_vars["osyOnLoadVisibility"] = osyVisibilityGridInit($this);
	{/php}
	{if !empty($osyOnLoadVisibility)}
		YAHOO.util.Event.on(window, "load", function() {ldelim} {$osyOnLoadVisibility} return true; {rdelim});
	{/if}
</script>

    		<script>
	    		{literal}
	    		if(typeof(SUGAR) != \'undefined\' &&  typeof(SUGAR.util) != \'undefined\' &&  typeof(SUGAR.util.doWhen) != \'undefined\') {
					SUGAR.util.doWhen("typeof(document.getElementsByTagName(\'body\')[0]) != \'undefined\'"+
			" && typeof(document.getElementById(\'SAVE_FOOTER\')) != \'undefined\'", function()  {
    					document.getElementById(\'member_type\').onchange = osy_onchange;
					});
				}

	    		function osy_onchange(){
	    			/*if(document.getElementById("member_type") && document.getElementById("member_type").value != "Association")
    				{
		    			if(document.getElementById("five_main_operating_markets"))	document.getElementById("five_main_operating_markets").parentNode.parentNode.style.visibility = "visible";
    				}
		    		else
    				{
		    			if(document.getElementById("five_main_operating_markets"))	document.getElementById("five_main_operating_markets").parentNode.parentNode.style.visibility = "hidden";
	    			}*/
	    			/*if(document.getElementById(\'member_type\').value == \'Indirect Member\'){
	    				addToValidate(\'EditView\', \'parent_name\' , \'text\', true, SUGAR.language.get(\'Accounts\', \'LBL_PARENT_NAME\'));
	    				addToValidate(\'EditView\', \'parent_id\' , \'text\', true, SUGAR.language.get(\'Accounts\', \'LBL_PARENT_ID\'));
	    			}*/
				}
	    		{/literal}
    		</script>
      ',
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
      'syncDetailEditViews' => false,
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
      ),
      'lbl_account_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'label' => 'LBL_NAME',
            'displayParams' => 
            array (
              'required' => true,
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
          ),
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
            'name' => 'billing_address_street',
            'hideLabel' => true,
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'billing',
              'rows' => 2,
              'cols' => 30,
              'maxlength' => 150,
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
          0 => '',
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
        15 => 
        array (
          0 => 
          array (
            'name' => 'email1',
            'studio' => 'false',
            'label' => 'LBL_EMAIL',
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
            'displayParams' => 
            array (
              'initial_filter' => '&member_type_advanced=Association',
            ),
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
          0 => 'industry',
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
          0 => '',
          1 => '',
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'industry_description_c',
            'studio' => 'visible',
            'label' => 'LBL_INDUSTRY_DESCRIPTION',
          ),
          1 => 'committees',
        ),
        8 => 
        array (
          0 => '',
          1 => '',
        ),
        9 => 
        array (
          0 => 'employees',
          1 => 
          array (
            'name' => 'nr_employees_at',
            'label' => 'LBL_NR_EMPLOYEES_AT',
          ),
        ),
        10 => 
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
        11 => 
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
        12 => 
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
        13 => 
        array (
          0 => 'ownership',
          1 => 
          array (
            'name' => 'type_of_business',
            'label' => 'LBL_TYPE_OF_BUSINESS',
          ),
        ),
        14 => 
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
            'name' => 'mark_as_closed',
            'label' => 'LBL_MARK_AS_CLOSED',
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
          1 => '',
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
        ),
      ),
    ),
  ),
);
;
?>
