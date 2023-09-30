<?php
// created: 2020-05-11 10:12:44
$listViewDefs['Campaigns'] = array (
  'TRACK_CAMPAIGN' => 
  array (
    'width' => '0.01',
    'label' => '&nbsp;',
    'link' => true,
    'customCode' => ' <a title="{$TRACK_CAMPAIGN_TITLE}" href="index.php?action=TrackDetailView&module=Campaigns&record={$ID}"><!--not_in_theme!--><span class="suitepicon suitepicon-action-view-status"></span></a> ',
    'default' => true,
    'studio' => false,
    'nowrap' => true,
    'sortable' => false,
  ),
  'LAUNCH_WIZARD' => 
  array (
    'width' => '1',
    'label' => '&nbsp;',
    'link' => true,
    'customCode' => ' <a title="{$LAUNCH_WIZARD_TITLE}" href="index.php?action=WizardHome&module=Campaigns&record={$ID}"><!--not_in_theme!--><img border="0" src="{$LAUNCH_WIZARD_IMAGE}"  alt="{$LAUNCH_WIZ_ALT_TEXT}"></a>  ',
    'default' => true,
    'studio' => false,
    'nowrap' => true,
    'sortable' => false,
  ),
  'NAME' => 
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_CAMPAIGN_NAME',
    'link' => true,
    'default' => true,
  ),
  'STATUS' => 
  array (
    'width' => '10%',
    'label' => 'LBL_LIST_STATUS',
    'default' => true,
  ),
  'DATE_ENTERED' => 
  array (
    'width' => '10%',
    'label' => 'LBL_DATE_ENTERED',
    'default' => true,
  ),
  'ASSIGNED_USER_NAME' => 
  array (
    'width' => '8%',
    'label' => 'LBL_LIST_ASSIGNED_USER',
    'module' => 'Employees',
    'id' => 'ASSIGNED_USER_ID',
    'default' => true,
  ),
);