<?php
// created: 2019-11-25 10:40:00
$viewdefs['Campaigns']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'hidden' => 
      array (
        0 => '<input type="hidden" name="mode" value="">',
      ),
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 
        array (
          'customCode' => '<input title="{$MOD.LBL_TEST_BUTTON_TITLE}"  class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';this.form.mode.value=\'test\';SUGAR.ajaxUI.submitForm(this.form);" type="{$ADD_BUTTON_STATE}" name="button" id="send_test_button" value="{$MOD.LBL_TEST_BUTTON_LABEL}">',
          'sugar_html' => 
          array (
            'type' => 'input',
            'value' => '{$MOD.LBL_TEST_BUTTON_LABEL}',
            'htmlOptions' => 
            array (
              'type' => '{$ADD_BUTTON_STATE}',
              'title' => '{$MOD.LBL_TEST_BUTTON_TITLE}',
              'class' => 'button',
              'onclick' => 'this.form = document.getElementById(\'formDetailView\'); this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';this.form.mode.value=\'test\';SUGAR.ajaxUI.submitForm(this.form);',
              'name' => 'button',
              'id' => 'send_test_button',
            ),
          ),
        ),
        4 => 
        array (
          'customCode' => '<input title="{$MOD.LBL_QUEUE_BUTTON_TITLE}" class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';SUGAR.ajaxUI.submitForm(this.form);" type="{$ADD_BUTTON_STATE}" name="button" id="send_emails_button" value="{$MOD.LBL_QUEUE_BUTTON_LABEL}">',
          'sugar_html' => 
          array (
            'type' => 'input',
            'value' => '{$MOD.LBL_QUEUE_BUTTON_LABEL}',
            'htmlOptions' => 
            array (
              'type' => '{$ADD_BUTTON_STATE}',
              'title' => '{$MOD.LBL_QUEUE_BUTTON_TITLE}',
              'class' => 'button',
              'onclick' => 'this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'Schedule\';SUGAR.ajaxUI.submitForm(this.form);',
              'name' => 'button',
              'id' => 'send_emails_button',
            ),
          ),
        ),
        5 => 
        array (
          'customCode' => '<input title="{$MOD.LBL_MARK_AS_SENT}" class="button" onclick="this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'DetailView\';this.form.mode.value=\'set_target\';SUGAR.ajaxUI.submitForm(this.form);" type="{$TARGET_BUTTON_STATE}" name="button" id="mark_as_sent_button" value="{$MOD.LBL_MARK_AS_SENT}">',
          'sugar_html' => 
          array (
            'type' => 'input',
            'value' => '{$MOD.LBL_MARK_AS_SENT}',
            'htmlOptions' => 
            array (
              'type' => '{$TARGET_BUTTON_STATE}',
              'title' => '{$MOD.LBL_MARK_AS_SENT}',
              'class' => 'button',
              'onclick' => 'this.form.return_module.value=\'Campaigns\'; this.form.return_action.value=\'TrackDetailView\';this.form.action.value=\'DetailView\';this.form.mode.value=\'set_target\';SUGAR.ajaxUI.submitForm(this.form);',
              'name' => 'button',
              'id' => 'mark_as_sent_button',
            ),
          ),
        ),
        6 => 
        array (
          'customCode' => '<script>{$MSG_SCRIPT}</script>',
        ),
      ),
      'hideAudit' => true,
      'links' => 
      array (
        0 => '<input type="button" class="button" onclick="javascript:window.location=\'index.php?module=Campaigns&action=TrackDetailView&record={$fields.id.value}\';" name="button" id="view_status_button" value="{$MOD.LBL_TRACK_BUTTON_LABEL}" />',
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
    'useTabs' => false,
    'tabDefs' => 
    array (
      'LBL_CAMPAIGN_INFORMATION' => 
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
    'lbl_campaign_information' => 
    array (
      0 => 
      array (
        0 => 'name',
        1 => 
        array (
          'name' => 'status',
          'label' => 'LBL_CAMPAIGN_STATUS',
        ),
      ),
      1 => 
      array (
        0 => 'campaign_type',
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'objective',
          'label' => 'LBL_CAMPAIGN_OBJECTIVE',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'content',
          'label' => 'LBL_CAMPAIGN_CONTENT',
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
        1 => 
        array (
          'name' => 'currency_id',
          'comment' => 'Currency in use for the campaign',
          'label' => 'LBL_CURRENCY',
        ),
      ),
    ),
  ),
);