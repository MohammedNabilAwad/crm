<?php
$viewdefs ['Accounts'] = array (
		'EditView' => array (
				'templateMeta' => array (
						'form' => array (
								'buttons' => array (
										0 => 'SAVE',
										1 => 'CANCEL'
								),
								'hidden' => array (
										0 => '<input type="hidden" name="payment_status" id="payment_status" value="{$fields.payment_status.value}">'
								)
						),
						'maxColumns' => '2',
						'widths' => array (
								0 => array (
										'label' => '10',
										'field' => '30'
								),
								1 => array (
										'label' => '10',
										'field' => '30'
								)
						),
						'includes' => array (
								0 => array (
										'file' => 'custom/modules/Accounts/osy_editview.js'
								),
								1 => array (
										'file' => 'custom/include/osyDependency.js'
								),
								2 => array (
										'file' => 'custom/modules/Accounts/osyDependency.js.php'
								)
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
	    			if(document.getElementById("member_type") && document.getElementById("member_type").value != "Association")
    				{
		    			if(document.getElementById("five_main_operating_markets"))	document.getElementById("five_main_operating_markets").parentNode.parentNode.style.visibility = "visible";
    				}
		    		else
    				{
		    			if(document.getElementById("five_main_operating_markets"))	document.getElementById("five_main_operating_markets").parentNode.parentNode.style.visibility = "hidden";
	    			}
	    			if(document.getElementById(\'member_type\').value == \'Indirect Member\'){
	    				addToValidate(\'EditView\', \'parent_name\' , \'text\', true, SUGAR.language.get(\'Accounts\', \'LBL_PARENT_NAME\'));
	    				addToValidate(\'EditView\', \'parent_id\' , \'text\', true, SUGAR.language.get(\'Accounts\', \'LBL_PARENT_ID\'));
	    			}
				}
	    		{/literal}
    		</script>
      ',
						'useTabs' => false,
						'tabDefs' => array (
								'LBL_EDITVIEW_PANEL1' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_ACCOUNT_INFORMATION' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_PANEL_ADVANCED' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_EDITVIEW_PANEL2' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								),
								'LBL_PANEL_ASSIGNMENT' => array (
										'newTab' => false,
										'panelDefault' => 'expanded'
								)
						),
						'syncDetailEditViews' => false
				),
				'panels' => array (
						'lbl_editview_panel1' => array (
								0 => array (
										0 => ''
								),
								1 => array (
										0 => array (
												'name' => 'member_type',
												'label' => 'LBL_MEMBER_TYPE'
										),
										1 => ''
								)
						),
						'lbl_account_information' => array (
								0 => array (
										0 => array (
												'name' => 'name',
												'label' => 'LBL_NAME',
												'displayParams' => array (
														'required' => true
												)
										),
										1 => array (
												'name' => 'short_company_name_c',
												'label' => 'LBL_SHORT_COMPANY_NAME'
										)
								),
								1 => array (
										0 => array (
												'name' => 'phone_office',
												'label' => 'LBL_PHONE_OFFICE'
										),
										1 => array (
												'name' => 'other_company_number',
												'label' => 'LBL_OTHER_COMPANY_NUMBER'
										)
								),
								2 => array (
										0 => array (
												'name' => 'website',
												'type' => 'link',
												'label' => 'LBL_WEBSITE'
										),
										1 => array (
												'name' => 'phone_fax',
												'label' => 'LBL_FAX'
										)
								),
								3 => array (
										0 => array (
												'name' => 'company_id_or_vat',
												'label' => 'LBL_COMPANY_ID_OR_VAT'
										)
								),
								4 => array (
										0 => array (
												'name' => 'billing_address_street',
												'hideLabel' => true,
												'type' => 'osyaddress',
												'displayParams' => array (
														'key' => 'billing',
														'rows' => 2,
														'cols' => 30,
														'maxlength' => 150
												)
										),
										1 => array (
												'name' => 'shipping_address_street',
												'hideLabel' => true,
												'type' => 'osyaddress',
												'displayParams' => array (
														'key' => 'shipping',
														'copy' => 'billing',
														'rows' => 2,
														'cols' => 30,
														'maxlength' => 150
												)
										)
								),
								5 => array (
										0 => array (
												'name' => 'accounting_dep_email_c',
												'label' => 'LBL_ACCOUNTING_DEP_EMAIL'
										),
										1 => ''
								),
								6 => array (
										0 => array (
												'name' => 'email1',
												'studio' => 'false',
												'label' => 'LBL_EMAIL'
										),
										1 => array (
												'name' => 'description',
												'comment' => 'Full text of the note',
												'label' => 'LBL_DESCRIPTION'
										)
								)
						),
						'LBL_PANEL_ADVANCED' => array (
								0 => array (
										0 => array (
												'name' => 'parent_name',
												'displayParams' => array (
														'required' => true,
														'initial_filter' => '&member_type_advanced=Association'
												)
										)
								),
								1 => array (
										0 => 'industry',
										1 => array (
												'name' => 'subcategories',
												'label' => 'LBL_SUBCATEGORIES'
										)
								),
								2 => array (
										0 => array (
												'name' => 'industry_description_c',
												'studio' => 'visible',
												'label' => 'LBL_INDUSTRY_DESCRIPTION'
										),
										1 => ''
								),
								3 => array (
										0 => 'committees',
										1 => ''
								),
								4 => array (
										0 => 'annual_revenue',
										1 => array (
												'name' => 'size_c',
												'studio' => 'visible',
												'label' => 'LBL_SIZE'
										)
								),
								5 => array (
										0 => array (
												'name' => 'unionization_c',
												'studio' => 'visible',
												'label' => 'LBL_UNIONIZATION'
										)
								),
								6 => array (
										0 => 'employees'
								),
								7 => array (
										0 => array (
												'name' => 'nr_employees_at',
												'label' => 'LBL_NR_EMPLOYEES_AT'
										),
										1 => array (
												'name' => 'date_employees_at',
												'label' => 'LBL_DATE_EMPLOYEES_AT'
										)
								),
								8 => array (
										0 => array (
												'name' => 'male_employees_c',
												'label' => 'LBL_MALE_EMPLOYEES'
										),
										1 => array (
												'name' => 'female_employees_c',
												'label' => 'LBL_FEMALE_EMPLOYEES'
										)
								),
								9 => array (
										0 => array (
												'name' => 'nr_permanent',
												'label' => 'LBL_NR_PERMANENT'
										),
										1 => array (
												'name' => 'nr_no_permanent_c',
												'label' => 'LBL_NR_NO_PERMANENT'
										)
								),
								10 => array (
										0 => array (
												'name' => 'other_info_employees_c',
												'studio' => 'visible',
												'label' => 'LBL_OTHER_INFO_EMPLOYEES'
										)
								),
								11 => array (
										0 => 'ownership'
								),
								12 => array (
										0 => array (
												'name' => 'type_of_business',
												'label' => 'LBL_TYPE_OF_BUSINESS'
										),
										1 => array (
												'name' => 'total_salary_wage_bill',
												'label' => 'LBL_TOTAL_SALARY_WAGE_BILL'
										)
								),
								13 => array (
										0 => array (
												'name' => 'association_member_type',
												'label' => 'LBL_ASSOCIATION_MEMBER_TYPE'
										)
								),
								14 => array (
										0 => array (
												'name' => 'nr_company_members',
												'label' => 'LBL_NR_COMPANY_MEMBERS'
										),
										1 => array (
												'name' => 'territorial',
												'label' => 'LBL_TERRITORIAL'
										)
								),
								15 => array (
										0 => array (
												'name' => 'other',
												'label' => 'LBL_OTHER'
										)
								),
								16 => array (
										0 => array (
												'name' => 'lead_source',
												'comment' => 'How did the contact come about',
												'label' => 'LBL_LEAD_SOURCE'
										)
								),
								17 => array (
										0 => array (
												'name' => 'products_and_services',
												'label' => 'LBL_PRODUCTS_AND_SERVICES'
										)
								),
								18 => array (
										0 => array (
												'name' => 'five_main_operating_markets',
												'comment' => '',
												'studio' => 'visible',
												'label' => 'LBL_FIVE_MAIN_OPERATING_MARKETS'
										),
										1 => array (
												'name' => 'target_exporting_markets',
												'comment' => '',
												'studio' => 'visible',
												'label' => 'LBL_TARGET_EXPORTING_MARKETS'
										)
								)
						),
						'lbl_editview_panel2' => array (
								0 => array (
										0 => array (
												'name' => 'member_from',
												'label' => 'LBL_MEMBER_FROM'
										),
										1 => array (
												'name' => 'member_till',
												'label' => 'LBL_MEMBER_TILL'
										)
								),
								1 => array (
										0 => array (
												'name' => 'levels',
												'label' => 'LBL_LEVELS'
										),
										1 => array (
												'name' => 'categories',
												'label' => 'LBL_CATEGORIES'
										)
								),
								2 => array (
										0 => array (
												'name' => 'subscription_fees',
												'label' => 'LBL_SUBSCRIPTION_FEES'
										),
										1 => ''
								)
						// OPENSYMBOLMOD - START - davide.dallapozza - 10:35:29
						// *************************************************
						/*
						 * 2 => array ( 0 => array ( 'name' => 'annual_nr_rates', 'label' => 'LBL_ANNUAL_NR_RATES' ), 1 => array ( 'name' => 'subscription_fees', 'label' => 'LBL_SUBSCRIPTION_FEES' ) ), 3 => array ( 0 => array ( 'name' => 'first_invoice_date', 'label' => 'LBL_FIRST_INVOICE_DATE' ), 1 => array ( 'name' => 'last_invoice_date', 'label' => 'LBL_LAST_INVOICE_DATE' ) ), 4 => array ( 0 => array ( 'name' => 'description', 'label' => 'LBL_DESCRIPTION' ) )
						 */
						// OPENSYMBOLMOD - END - davide.dallapozza
						// *************************************************
												),
						'LBL_PANEL_ASSIGNMENT' => array (
								0 => array (
										0 => array (
												'name' => 'assigned_user_name',
												'label' => 'LBL_ASSIGNED_TO'
										)
								)
						)
				)
		)
);
?>
