<?php
$module_name = 'osy_contactspotentialmember';
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
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/include/osyDependency.js',
        ),
        1 => 
        array (
          'file' => 'custom/include/osyRelateUtils.js.php',
        ),
        2 => 
        array (
          'file' => 'custom/modules/Contacts/osyDependency.js.php',
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
      'javascript' => '
		    		<script type="text/javascript">
		    		{literal}
						YAHOO.util.Event.onDOMReady(function() {
							overrideSqsObject("lead_name",function(oSqsObject) {
								oSqsObject["field_list"] = [
									"account_name",
									"id",
									"primary_address_street",
									"primary_address_city",
									"primary_address_state",
									"primary_address_pobox_c",
									"primary_address_postalcode",
									"primary_address_region_c",
									"primary_address_other",
									"alt_address_street",
									"alt_address_city",
									"alt_address_state",
									"alt_address_pobox_c",
									"alt_address_postalcode",
									"alt_address_region_c",
									"alt_address_other",
									"phone_work",
									];
								oSqsObject["populate_list"] = [
									"lead_name",
									"lead_id",
									"primary_address_street",
									"primary_address_city",
									"primary_address_state",
									"primary_address_pobox_c",
									"primary_address_postalcode",
									"primary_address_region_c",
									"primary_address_other",
									"alt_address_street",
									"alt_address_city",
									"alt_address_state",
									"alt_address_pobox_c",
									"alt_address_postalcode",
									"alt_address_region_c",
									"alt_address_other",
									"phone_work",
									];
								oSqsObject["conditions"][0]["name"] = "account_name";
								return oSqsObject;
							});
						});
			    		if(typeof(SUGAR) != \'undefined\' &&  typeof(SUGAR.util) != \'undefined\'
							&&  typeof(SUGAR.util.doWhen) != \'undefined\') {
								SUGAR.util.doWhen(document.getElementById(\'footer\')
									&& typeof(HideViewFields) != \'undefined\', function() {
						    			HideViewFields();
						    			YAHOO.util.Event.addListener(\'role_function\', \'change\',  HideViewFields );
								}
							)
						};

		    		{/literal}
		    		</script>',
    ),
    'panels' => 
    array (
      'lbl_contact_information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'first_name',
            'customCode' => '{html_options name="salutation" id="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name"  id="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 'last_name',
        ),
        1 => 
        array (
          0 => 'gender',
          1 => 
          array (
            'name' => 'lead_name',
            'displayParams' => 
            array (
              'required' => true,
              'field_to_name_array' => 
              array (
                'id' => 'lead_id',
                'account_name' => 'lead_name',
                'primary_address_street' => 'primary_address_street',
                'primary_address_city' => 'primary_address_city',
                'primary_address_state' => 'primary_address_state',
                'primary_address_pobox_c' => 'primary_address_pobox_c',
                'primary_address_postalcode' => 'primary_address_postalcode',
                'primary_address_region_c' => 'primary_address_region_c',
                'primary_address_other' => 'primary_address_other',
                'alt_address_street' => 'alt_address_street',
                'alt_address_city' => 'alt_address_city',
                'alt_address_state' => 'alt_address_state',
                'alt_address_pobox_c' => 'alt_address_pobox_c',
                'alt_address_postalcode' => 'alt_address_postalcode',
                'alt_address_region_c' => 'alt_address_region_c',
                'alt_address_other' => 'alt_address_other',
                'phone_work' => 'phone_work',
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
