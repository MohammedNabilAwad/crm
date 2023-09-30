<?php
 // created: 2013-04-30 14:52:24
$layout_defs["osy_contactspotentialmember"]["subpanel_setup"]['fp_events_contactspotentialmember'] = array (
  'order' => 100,
  'module' => 'FP_events',
  'subpanel_name' => 'ForOsy_contactspotentialmember',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_ACCOUNTS_FROM_FP_EVENTS_TITLE',
  'get_subpanel_data' => 'fp_events',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
