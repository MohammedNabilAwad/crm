<?php
 // created: 2023-09-17 09:35:54
$layout_defs["Accounts"]["subpanel_setup"]['accounts_mem_memos_1'] = array (
  'order' => 100,
  'module' => 'Mem_Memos',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_MEM_MEMOS_TITLE',
  'get_subpanel_data' => 'accounts_mem_memos_1',
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
