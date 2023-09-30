<?php
$viewdefs ['osy_service'] =
    array (
        'DetailView' =>
            array (
                'templateMeta' =>
                    array (
                        'form' =>
                            array (
                                'buttons' =>
                                    array (
                                        0 => 'EDIT',
                                        1 => 'DUPLICATE',
                                        2 => 'DELETE',
                                        3 =>
                                            array (
                                                'customCode' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")} <input type="hidden" name="isSaveAndNew" value="false">  <input type="hidden" name="status" value="">  <input type="hidden" name="isSaveFromDetailView" value="true">  <input title="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"   class="button"  onclick="this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'osy_service\';this.form.isDuplicate.value=true;this.form.isSaveAndNew.value=true;this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true;this.form.return_id.value=\'{$fields.id.value}\';" id="close_create_button" name="button"  value="{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}"  type="submit">{/if}',
                                                'sugar_html' =>
                                                    array (
                                                        'type' => 'submit',
                                                        'value' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
                                                        'htmlOptions' =>
                                                            array (
                                                                'title' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
                                                                'name' => '{$APP.LBL_CLOSE_AND_CREATE_BUTTON_TITLE}',
                                                                'class' => 'button',
                                                                'id' => 'close_create_button',
                                                                'onclick' => 'this.form.isSaveFromDetailView.value=true; this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'osy_service\';this.form.isDuplicate.value=true;this.form.isSaveAndNew.value=true;this.form.return_action.value=\'EditView\'; this.form.isDuplicate.value=true;this.form.return_id.value=\'{$fields.id.value}\';',
                                                            ),
                                                        'template' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")}[CONTENT]{/if}',
                                                    ),
                                            ),
                                        4 =>
                                            array (
                                                'customCode' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")} <input type="hidden" name="isSave" value="false">  <input title="{$APP.LBL_CLOSE_BUTTON_TITLE}"  accesskey="{$APP.LBL_CLOSE_BUTTON_KEY}"  class="button"  onclick="this.form.status.value=\'Held\'; this.form.action.value=\'Save\';this.form.return_module.value=\'osy_service\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\'"  id="close_button" name="button1"  value="{$APP.LBL_CLOSE_BUTTON_TITLE}"  type="submit">{/if}',
                                                'sugar_html' =>
                                                    array (
                                                        'type' => 'submit',
                                                        'value' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
                                                        'htmlOptions' =>
                                                            array (
                                                                'title' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
                                                                'accesskey' => '{$APP.LBL_CLOSE_BUTTON_KEY}',
                                                                'class' => 'button',
                                                                'onclick' => 'this.form.status.value=\'Closed\'; this.form.action.value=\'Save\';this.form.return_module.value=\'osy_service\';this.form.isSave.value=true;this.form.return_action.value=\'DetailView\'; this.form.return_id.value=\'{$fields.id.value}\';',
                                                                'name' => '{$APP.LBL_CLOSE_BUTTON_TITLE}',
                                                                'id' => 'close_button',
                                                            ),
                                                        'template' => '{if $fields.status.value != "Held" && $bean->aclAccess("edit")}[CONTENT]{/if}',
                                                    ),
                                            ),
                                        5 =>
                                            array (
                                                'customCode' => '<input type="submit" class="button" onclick="javascript:window.location=\'index.php?module=osy_gestione_pagamento&action=ListView&prospect_list_name_basic={$fields.prospect_list_name_basic.value}\'" name="monitor_activity_fees_button" id="monitor_activity_fees_button" value="{$MOD.LBL_MONITOR_ACTIVITY_FEES_BUTTON_TITLE}" >',
                                            ),
                                    ),
                                'hidden' =>
                                    array (
                                        0 => '<input type="hidden" name="isSaveAndNew">',
                                        1 => '<input type="hidden" name="status">',
                                        2 => '<input type="hidden" name="isSaveFromDetailView">',
                                        3 => '<input type="hidden" name="isSave">',
//          4 => '<input type="hidden" name="campaign_type" value="Email"/>',
//          5 => '<input type="hidden" name="status" value="Planning"/>',
//          6 => '<input type="hidden" name="end_date" value="{$fields.date_end.value}"/>',
//          7 => '<input type="hidden" name="name" value="{$fields.name.value}-{$fields.type_of_services.value}"/>',
                                        8 => '{php}
	        			global $current_user;        			
    		   			$this->_tpl_vars["fields"]["assigned_user_id"]["value"] = $current_user->id;					
	        		{/php}
        			<input type="hidden" name="assigned_user_id" value="{$fields.assigned_user_id.value}"/>
        		',
                                        9 => '<input type="hidden" name="service_id" value="{$fields.id.value}"/>',
                                        10 => '
          			<script>
						{literal}
							function osy_check_disabled_button(){
								if(document.getElementById("date_end").innerHTML == ""){
									document.getElementById("create_campaign").disabled = true;
								}
							}
						{/literal}
						osy_check_disabled_button();
					</script>
				',
                                        11 => '{php}
        			global $db;
        				$q="SELECT name FROM prospect_lists WHERE osy_service_id = \'" .$this->_tpl_vars[\'id\'] ."\' AND deleted = 0";        				
						$r=$db->query($q);
						$v=$db->fetchByAssoc($r);
        				$this->_tpl_vars["fields"]["prospect_list_name_basic"]["value"] = $v["name"];
	        		{/php}
        			<input type="hidden" name="prospect_list_name_basic" value="{$fields.prospect_list_name_basic.value}"/>
        		',
                                    ),
                                'headerTpl' => 'modules/osy_service/tpls/detailHeader.tpl',
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
                                'LBL_OSY_SERVICE_INFORMATION' =>
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
                'includes' =>
                    array (
                        0 =>
                            array (
                                'file' => 'custom/include/osyDependency.js',
                            ),
                        1 =>
                            array (
                                'file' => 'custom/modules/osy_service/osyDependency.js.php',
                            ),
                    ),
                'panels' =>
                    array (
                        'lbl_osy_service_information' =>
                            array (
                                0 =>
                                    array (
                                        0 =>
                                            array (
                                                'name' => 'name',
                                                'label' => 'LBL_SUBJECT',
                                            ),
                                        1 => 'status',
                                    ),
                                1 =>
                                    array (
                                        0 =>
                                            array (
                                                'name' => 'type_of_services',
                                            ),
                                    ),
                                2 =>
                                    array (
                                        0 =>
                                            array (
                                                'name' => 'date_start',
                                                'label' => 'LBL_DATE_TIME',
                                            ),
                                        1 =>
                                            array (
                                                'name' => 'date_end',
                                                'comment' => 'Date osy_service ends',
                                                'label' => 'LBL_DATE_END',
                                            ),
                                    ),
                                3 =>
                                    array (
                                        0 =>
                                            array (
                                                'name' => 'duration',
                                                'customCode' => '{$fields.duration_hours.value}{$MOD.LBL_HOURS_ABBREV} {$fields.duration_minutes.value}{$MOD.LBL_MINSS_ABBREV} ',
                                                'label' => 'LBL_DURATION',
                                            ),
                                        1 => 'location',
                                    ),
                                4 =>
                                    array (
                                        0 =>
                                            array (
                                                'name' => 'created_by_name',
                                                'label' => 'LBL_CREATED',
                                            ),
                                    ),
                                5 =>
                                    array (
                                        0 => 'description',
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
            ),
    );
?>
