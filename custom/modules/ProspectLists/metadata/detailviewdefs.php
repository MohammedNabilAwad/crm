<?php
// created: 2020-05-11 10:12:44
$viewdefs['ProspectLists']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'closeFormBeforeCustomButtons' => true,
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 
        array (
          'customCode' => '<input title="{$APP.LBL_EXPORT}"  class="button" type="button" name="opp_to_quote_button" id="export_button" value="{$APP.LBL_EXPORT}" onclick="document.location.href = \'index.php?entryPoint=osy_exportLists&module=ProspectLists&record_id={$fields.id.value}\'">',
        ),
        4 => 
        array (
          'customCode' => '<input title="{$APP.LBL_OSY_RETURN_CAMPAIGN}" class="button" onclick="this.form.record.value =\'{$smarty.request.osy_campaign_id_detailview}\'; this.form.action.value=\'DetailView\'; this.form.module.value=\'Campaigns\';" type="submit"
												name="return_campaign_btn" id="return_campaign_btn" value="{$APP.LBL_OSY_RETURN_CAMPAIGN}"/>',
        ),
      ),
      'hidden' => 
      array (
        0 => '<input type="hidden" name="osy_campaign_id_detailview" id="osy_campaign_id_detailview" value="{$smarty.request.osy_campaign_id_detailview}">',
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
    'tabDefs' => 
    array (
      'DEFAULT' => 
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
    'default' => 
    array (
      0 => 
      array (
        0 => 'name',
        1 => 
        array (
          'name' => 'entry_count',
          'label' => 'LBL_ENTRIES',
        ),
      ),
      1 => 
      array (
        0 => 'list_type',
        1 => 'domain_name',
      ),
      2 => 
      array (
        1 => 'description',
      ),
    ),
    'LBL_PANEL_ASSIGNMENT' => 
    array (
      0 => 
      array (
        0 => 'assigned_user_name',
        1 => 
        array (
          'name' => 'date_modified',
          'label' => 'LBL_DATE_MODIFIED',
          'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
        ),
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'date_entered',
          'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
        ),
      ),
    ),
  ),
);