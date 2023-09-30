<?php
// created: 2016-01-19 15:51:15
$viewdefs['osy_service']['QuickCreate'] = array (
  'templateMeta' => 
  array (
    'maxColumns' => '2',
    'form' => 
    array (
      'hidden' => 
      array (
        0 => '<input type="hidden" name="isSaveAndNew" value="false">',
      ),
      'buttons' => 
      array (
        0 => 
        array (
          'customCode' => '<input title="{$APP.LBL_SAVE_BUTTON_TITLE}" accessKey="{$APP.LBL_SAVE_BUTTON_KEY}" class="button" onclick="SUGAR.osy_service.fill_invitees();this.form.action.value=\'Save\'; this.form.return_action.value=\'DetailView\'; {if isset($smarty.request.isDuplicate) && $smarty.request.isDuplicate eq "true"}this.form.return_id.value=\'\'; {/if}return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_SAVE_BUTTON_LABEL}">',
        ),
        1 => 'CANCEL',
        3 => 
        array (
          'customCode' => '{if $fields.status.value != "Held"}<input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}" accessKey="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_KEY}" class="button" onclick="SUGAR.osy_service.fill_invitees(); this.form.status.value=\'Held\'; this.form.action.value=\'Save\'; this.form.return_module.value=\'osy_service\'; this.form.isDuplicate.value=true; this.form.isSaveAndNew.value=true; this.form.return_action.value=\'EditView\'; this.form.return_id.value=\'{$fields.id.value}\'; return check_form(\'EditView\');" type="submit" name="button" value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_LABEL}">{/if}',
        ),
      ),
    ),
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
    'javascript' => '<script type="text/javascript">{$JSON_CONFIG_JAVASCRIPT}</script>
{sugar_getscript file="cache/include/javascript/sugar_grp_jsolait.js"}
<script>toggle_portal_flag();function toggle_portal_flag()  {literal} { {/literal} {$TOGGLE_JS} {literal} } {/literal} </script>',
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
          'fields' => 
          array (
            0 => 
            array (
              'name' => 'status',
            ),
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
            'required' => true,
            'updateCallback' => 'SugarWidgetScheduler.update_time();',
          ),
        ),
        1 => 
        array (
          'name' => 'parent_name',
          'label' => 'LBL_LIST_RELATED_TO',
        ),
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'date_end',
          'type' => 'datetimecombo',
          'displayParams' => 
          array (
            'required' => true,
            'updateCallback' => 'SugarWidgetScheduler.update_time();',
          ),
        ),
        1 => 
        array (
          'name' => 'location',
          'comment' => 'osy_service location',
          'label' => 'LBL_LOCATION',
        ),
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'duration',
          'customCode' => '
                @@FIELD@@
                <input id="duration_hours" name="duration_hours" type="hidden" value="{$fields.duration_hours.value}">
                <input id="duration_minutes" name="duration_minutes" type="hidden" value="{$fields.duration_minutes.value}">
                {sugar_getscript file="modules/osy_service/duration_dependency.js"}
                <script type="text/javascript">
                    var date_time_format = "{$CALENDAR_FORMAT}";
                    {literal}
                    SUGAR.util.doWhen(function(){return typeof DurationDependency != "undefined" && typeof document.getElementById("duration") != "undefined"}, function(){
                        var duration_dependency = new DurationDependency("date_start","date_end","duration",date_time_format);
                        initEditView(YAHOO.util.Selector.query(\'select#duration\')[0].form);
                    });
                    {/literal}
                </script>            
            ',
        ),
        1 => 
        array (
          'name' => 'reminder_time',
          'customCode' => '{include file="modules/osy_service/tpls/reminders.tpl"}',
          'label' => 'LBL_REMINDER',
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
          'comment' => 'Full text of the note',
          'label' => 'LBL_DESCRIPTION',
        ),
      ),
    ),
  ),
);