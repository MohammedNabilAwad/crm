<?php
 // created: 2023-09-16 15:44:05
$layout_defs["Accounts"]["subpanel_setup"]['accounts_guar_guarantees_1'] = array (
  'order' => 100,
  'module' => 'guar_guarantees',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_GUAR_GUARANTEES_TITLE',
  'get_subpanel_data' => 'accounts_guar_guarantees_1',
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
