<?php
// created: 2019-11-25 10:40:00
$viewdefs['Tasks']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'SAVE',
        1 => 'CANCEL',
        2 => 
        array (
          'customCode' => '{if $fields.status.value != "Completed"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" class="button" onclick="document.getElementById(\'status\').value=\'Completed\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'Tasks\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
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
						removeFromValidate(\'form_SubpanelQuickCreate_Tasks\', \'account_name\');
						removeFromValidate(\'form_SubpanelQuickCreate_Tasks\', \'account_id\');
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
        ),
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
          'name' => 'assigned_user_name',
          'label' => 'LBL_ASSIGNED_TO_NAME',
        ),
      ),
      5 => 
      array (
        0 => 
        array (
          'name' => 'description',
          'displayParams' => 
          array (
            'rows' => 8,
            'cols' => 60,
          ),
        ),
      ),
    ),
  ),
);