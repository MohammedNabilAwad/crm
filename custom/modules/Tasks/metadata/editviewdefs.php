<?php
// created: 2020-05-11 10:12:44
$viewdefs['Tasks']['EditView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
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
      'buttons' => 
      array (
        0 => 'SAVE',
        1 => 'CANCEL',
        2 => 
        array (
          'customCode' => '{if $fields.status.value != "Completed"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" class="button" onclick="document.getElementById(\'status\').value=\'Completed\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; if(check_form(\'EditView\'))SUGAR.ajaxUI.submitForm(this.form);" type="button" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
        ),
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
    'javascript' => '
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
      'LBL_TASK_INFORMATION' => 
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
    'lbl_task_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
        1 => 
        array (
          'name' => 'status',
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'date_start',
          'type' => 'datetimecombo',
          'displayParams' => 
          array (
            'showNoneCheckbox' => true,
            'showFormats' => true,
          ),
        ),
        1 => 
        array (
          'name' => 'date_due',
          'type' => 'datetimecombo',
          'displayParams' => 
          array (
            'showNoneCheckbox' => true,
            'showFormats' => true,
          ),
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'account_name',
          'label' => 'LBL_ACCOUNT_NAME',
          'displayParams' => 
          array (
            'required' => false,
          ),
        ),
        1 => '',
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'priority',
          'displayParams' => 
          array (
            'required' => true,
          ),
        ),
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'description',
        ),
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
);