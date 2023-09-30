<?php
$module_name = 'osy_contactspotentialmember';
$viewdefs [$module_name] = 
array (
  'QuickCreate' => 
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
          'file' => 'custom/modules/Contacts/osyDependency.js.php',
        ),
        2 => 
        array (
          'file' => 'custom/include/osyRelateUtils.js.php',
        ),
      ),
      'javascript' => '
		    		<script type="text/javascript">
		    		{literal}
				YAHOO.util.Event.onDOMReady(function() {
							overrideSqsObject("lead_name",function(oSqsObject) {
								oSqsObject["field_list"] = ["account_name", "id"];
								oSqsObject["populate_list"] = ["lead_name", "lead_id"];
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
      'useTabs' => false,
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
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
            'customCode' => '{html_options name="salutation" options=$fields.salutation.options selected=$fields.salutation.value}&nbsp;<input name="first_name" size="25" maxlength="25" type="text" value="{$fields.first_name.value}">',
          ),
          1 => 
          array (
            'name' => 'last_name',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),      		
        1 => 
        array (
          0 => 'phone_work',
          1 => 'phone_mobile',
        ),
        2 => 
        array (
          0 => 'role_function',
          1 => 'vip',
        ),
        3 => 
        array (
          0 => 'email1',
          1 => 'assigned_user_name',
        ),
      	4 =>
      	array (
      	  0 => '',
          1 =>
      	  array(
      	  	'name' => 'lead_name',
      	  	'displayParams' => 
      	  	array (
      	  		'required' => true,
      	  	),
      	  ),
        ),
      ),
    ),
  ),
);
?>
