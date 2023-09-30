<?php
// created: 2016-01-19 15:49:54
$viewdefs['Leads']['EditView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'hidden' => 
      array (
        0 => '<input type="hidden" name="prospect_id" value="{if isset($smarty.request.prospect_id)}{$smarty.request.prospect_id}{else}{$bean->prospect_id}{/if}">',
        1 => '<input type="hidden" name="account_id" value="{if isset($smarty.request.account_id)}{$smarty.request.account_id}{else}{$bean->account_id}{/if}">',
        2 => '<input type="hidden" name="contact_id" value="{if isset($smarty.request.contact_id)}{$smarty.request.contact_id}{else}{$bean->contact_id}{/if}">',
        3 => '<input type="hidden" name="opportunity_id" value="{if isset($smarty.request.opportunity_id)}{$smarty.request.opportunity_id}{else}{$bean->opportunity_id}{/if}">',
      ),
      'buttons' => 
      array (
        0 => 'SAVE',
        1 => 'CANCEL',
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
        'file' => 'custom/modules/Leads/osyDependency.js.php',
      ),
    ),
    'javascript' => '<script type="text/javascript" language="Javascript">function copyAddressRight(form)  {ldelim} form.alt_address_street.value = form.primary_address_street.value;form.alt_address_city.value = form.primary_address_city.value;form.alt_address_state.value = form.primary_address_state.value;form.alt_address_postalcode.value = form.primary_address_postalcode.value;form.alt_address_country.value = form.primary_address_country.value;return true; {rdelim} function copyAddressLeft(form)  {ldelim} form.primary_address_street.value =form.alt_address_street.value;form.primary_address_city.value = form.alt_address_city.value;form.primary_address_state.value = form.alt_address_state.value;form.primary_address_postalcode.value =form.alt_address_postalcode.value;form.primary_address_country.value = form.alt_address_country.value;return true; {rdelim} </script>

<script type="text/javascript">
	{php}
		require_once("custom/include/osyVisibilityGrid.js.php");
		$this->_tpl_vars["osyOnLoadVisibility"] = osyVisibilityGridInit($this);
	{/php}
	{if !empty($osyOnLoadVisibility)}
		YAHOO.util.Event.on(window, "load", function() {ldelim} {$osyOnLoadVisibility} return true; {rdelim});
	{/if}
</script>
    		',
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
          'type' => 'varchar',
          'validateDependency' => false,
          'customCode' => '<input name="account_name" id="EditView_account_name" {if ($fields.converted.value == 1)}disabled="true"{/if} size="30" maxlength="255" type="text" value="{$fields.account_name.value}">',
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
          'hideLabel' => true,
          'type' => 'osyaddress',
          'displayParams' => 
          array (
            'key' => 'primary',
            'rows' => 2,
            'cols' => 30,
            'maxlength' => 150,
          ),
        ),
        1 => 
        array (
          'name' => 'alt_address_street',
          'hideLabel' => true,
          'type' => 'osyaddress',
          'displayParams' => 
          array (
            'key' => 'alt',
            'copy' => 'primary',
            'rows' => 2,
            'cols' => 30,
            'maxlength' => 150,
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
        0 => 'industry',
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
        0 => 'annual_revenue',
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
        0 => 'employees',
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
        0 => 'ownership',
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
);