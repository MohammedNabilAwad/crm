<?php
// created: 2019-11-25 10:40:00
$viewdefs['Notes']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'enctype' => 'multipart/form-data',
      'hidden' => 
      array (
        0 => '
	          	{php}
	          		require_once("modules/osy_services_companies/osy_services_companies.php");
      				$record = new osy_services_companies();
      				$osy_service_companies_bean = $record->retrieve($_REQUEST["parent_id"]);
					$this->_tpl_vars["fields"]["account_id"]["value"] = $osy_service_companies_bean->account_id;
					$this->_tpl_vars["fields"]["account_name"]["value"] = $osy_service_companies_bean->account_name;
	          	{/php}
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
    'javascript' => '{sugar_getscript file="include/javascript/dashlets.js"}
<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>
    		<script>
    		{literal}
    		if(typeof(SUGAR) != \'undefined\' &&  typeof(SUGAR.util) != \'undefined\' &&  typeof(SUGAR.util.doWhen) != \'undefined\') {
				SUGAR.util.doWhen("typeof(document.getElementsByTagName(\'body\')[0]) != \'undefined\'", function() {
					removeFromValidate(\'form_SubpanelQuickCreate_Notes\', \'account_name\');
					removeFromValidate(\'form_SubpanelQuickCreate_Notes\', \'account_id\');
				});
			}
    		{/literal}
    		</script>
    		',
    'useTabs' => false,
    'tabDefs' => 
    array (
      'DEFAULT' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
    ),
  ),
  'panels' => 
  array (
    'default' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_SUBJECT',
          'displayParams' => 
          array (
            'size' => 50,
            'required' => true,
          ),
        ),
        1 => 
        array (
          'name' => 'filename',
        ),
      ),
      1 => 
      array (
        0 => 'parent_name',
        1 => '',
      ),
      2 => 
      array (
        0 => 'contact_name',
        1 => 
        array (
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'label' => 'LBL_NOTE_STATUS',
          'displayParams' => 
          array (
            'rows' => 6,
            'cols' => 75,
          ),
        ),
      ),
    ),
  ),
);