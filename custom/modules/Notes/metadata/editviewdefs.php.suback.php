<?php
// created: 2019-11-25 10:40:00
$viewdefs['Notes']['EditView'] = array (
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
<script>
function deleteAttachmentCallBack(text)
	{literal} { {/literal}
	if(text == \'true\') {literal} { {/literal}
		document.getElementById(\'new_attachment\').style.display = \'\';
		ajaxStatus.hideStatus();
		document.getElementById(\'old_attachment\').innerHTML = \'\';
	{literal} } {/literal} else {literal} { {/literal}
		document.getElementById(\'new_attachment\').style.display = \'none\';
		ajaxStatus.flashStatus(SUGAR.language.get(\'Notes\', \'ERR_REMOVING_ATTACHMENT\'), 2000);
	{literal} } {/literal}
{literal} } {/literal}
</script>
<script>toggle_portal_flag(); function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>
    		<script>
    		{literal}
    		if(typeof(SUGAR) != \'undefined\' &&  typeof(SUGAR.util) != \'undefined\' &&  typeof(SUGAR.util.doWhen) != \'undefined\') {
				SUGAR.util.doWhen("typeof(document.getElementsByTagName(\'body\')[0]) != \'undefined\'", function() {
					removeFromValidate(\'EditView\', \'account_name\');
					removeFromValidate(\'EditView\', \'account_id\');
				});
			}
    		{/literal}
    		</script>
    		',
    'useTabs' => false,
    'tabDefs' => 
    array (
      'LBL_NOTE_INFORMATION' => 
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
  ),
  'panels' => 
  array (
    'lbl_note_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'size' => 60,
          ),
        ),
        1 => '',
      ),
      1 => 
      array (
        0 => 'contact_name',
        1 => '',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'filename',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'label' => 'LBL_NOTE_STATUS',
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
);