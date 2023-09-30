<?php
 // created: 2013-04-30 14:52:24
$layout_defs["osy_other_contacts"]["subpanel_setup"]['fp_events_osy_other_contacts'] = array (
  'order' => 100,
  'module' => 'FP_events',
  'subpanel_name' => 'ForOsy_other_contacts',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_FP_EVENTS_OSY_OTHER_CONTACTS_FROM_FP_EVENTS_TITLE',
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
