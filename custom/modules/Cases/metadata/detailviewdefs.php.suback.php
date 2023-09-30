<?php
// created: 2019-11-25 10:40:00
$viewdefs['Cases']['DetailView'] = array (
  'templateMeta' => 
  array (
    'form' => 
    array (
      'buttons' => 
      array (
        0 => 'EDIT',
        1 => 'DUPLICATE',
        2 => 'DELETE',
        3 => 'FIND_DUPLICATES',
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
      'LBL_CASE_INFORMATION' => 
      array (
        'newTab' => false,
        'panelDefault' => 'expanded',
      ),
      'LBL_AOP_CASE_UPDATES' => 
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
    'lbl_case_information' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'case_number',
          'label' => 'LBL_CASE_NUMBER',
        ),
        1 => 'priority',
      ),
      1 => 
      array (
        0 => 
        array (
          'name' => 'state',
          'comment' => 'The state of the case (i.e. open/closed)',
          'label' => 'LBL_STATE',
        ),
        1 => 'account_name',
      ),
      2 => 
      array (
        0 => 'status',
      ),
      3 => 
      array (
        0 => 'type',
      ),
      4 => 
      array (
        0 => 
        array (
          'name' => 'name',
          'label' => 'LBL_SUBJECT',
        ),
      ),
      5 => 
      array (
        0 => 'description',
      ),
      6 => 
      array (
        0 => 'resolution',
      ),
    ),
    'LBL_AOP_CASE_UPDATES' => 
    array (
      0 => 
      array (
        0 => 
        array (
          'name' => 'aop_case_updates_threaded',
          'studio' => 'visible',
          'label' => 'LBL_AOP_CASE_UPDATES_THREADED',
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
      ),
      2 => 
      array (
        0 => 
        array (
          'name' => 'contact_created_by_name',
          'label' => 'LBL_CONTACT_CREATED_BY_NAME',
        ),
        1 => '',
      ),
      3 => 
      array (
        0 => 
        array (
          'name' => 'date_entered',
          'label' => 'LBL_CREATED',
        ),
        1 => 
        array (
          'name' => 'date_modified',
          'label' => 'LBL_MODIFIED_NAME',
        ),
      ),
    ),
  ),
);