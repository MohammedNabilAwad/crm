<?php
$module_name = 'FP_events';
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
      'useTabs' => true,
      'javascript' => '<script type="text/javascript">
            {literal}
            function open_email_template_form(bEdit) {
                var field=document.getElementById("invite_templates");
                var URL = "index.php?module=EmailTemplates&action=EditView&popup_create=1";//&campaign_id=1               
                if (bEdit && field.options[field.selectedIndex].value != "undefined") {	
                    URL += "&record="+field.options[field.selectedIndex].value;
                }
                URL+="&show_js=1";
	
        	    win = window.open(URL, "email_template", "width=800,height=600,resizable=1,scrollbars=1");
                if(window.focus) {
                    // put the focus on the popup if the browser supports the focus() method
                    win.focus();
                }
            }
            function refresh_email_template_list(template_id,template_name) {
                debugger;
                var field = document.getElementById("invite_templates");
                var bfound=0;
                for (var i=0; i < field.options.length; i++) {
                    if (field.options[i].value == template_id) {
                        if (field.options[i].selected==false) {
                            field.options[i].selected=true;
                        }
                        field.options[i].text = template_name;
                        bfound=1;
                    }
                }
                //add item to selection list.
                if (bfound == 0) {
                    var newElement = document.createElement("option");
                    newElement.text = template_name;
                    newElement.value = template_id;
                    field.options.add( newElement );
                    newElement.selected = true;
                }	

                //enable the edit button.
//                var field1 = document.getElementById("edit_template");
//                field1.style.visibility="visible";            
            }
            {/literal}
            </script>',
      'tabDefs' => 
      array (
        'LBL_PANEL_OVERVIEW' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
        'LBL_EMAIL_INVITE' => 
        array (
          'newTab' => true,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => false,
    ),
    'panels' => 
    array (
      'LBL_PANEL_OVERVIEW' => 
      array (
        0 => 
        array (
          0 => 'name',
          1 => 
          array (
            'name' => 'location',
            'label' => 'LBL_LOCATION',
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
            ),
          ),
          1 => 
          array (
            'name' => 'date_end',
            'type' => 'datetimecombo',
            'displayParams' => 
            array (
              'required' => true,
            ),
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'duration',
            'customCode' => '
                @@FIELD@@
                <input id="duration_hours" name="duration_hours" type="hidden" value="{$fields.duration_hours.value}">
                <input id="duration_minutes" name="duration_minutes" type="hidden" value="{$fields.duration_minutes.value}">
                {sugar_getscript file="modules/FP_events/duration_dependency.js"}
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
            'customCodeReadOnly' => '{$fields.duration_hours.value}{$MOD.LBL_HOURS_ABBREV} {$fields.duration_minutes.value}{$MOD.LBL_MINSS_ABBREV} ',
          ),
          1 => 
          array (
            'name' => 'budget',
            'label' => 'LBL_BUDGET',
          ),
        ),
        3 => 
        array (
          0 => 'description',
        ),
        4 => 
        array (
          0 => 'assigned_user_name',
        ),
        5 => 
        array (
        ),
      ),
      'LBL_EMAIL_INVITE' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'invite_templates',
            'studio' => 'visible',
            'label' => 'LBL_INVITE_TEMPLATES',
            'customCode' => '{html_options id=$fields.invite_templates.name name=$fields.invite_templates.name options=$fields.invite_templates.options selected=$fields.invite_templates.value} &nbsp;
                <a href="javascript:open_email_template_form(false)">{$MOD.LBL_CREATE_EMAIL_TEMPLATE}</a> &nbsp;
                <a href="javascript:open_email_template_form(true)">{$MOD.LBL_EDIT_EMAIL_TEMPLATE}</a>
                ',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accept_redirect',
            'label' => 'LBL_ACCEPT_REDIRECT',
          ),
          1 => 
          array (
            'name' => 'decline_redirect',
            'label' => 'LBL_DECLINE_REDIRECT',
          ),
        ),
      ),
    ),
  ),
);
;
?>
