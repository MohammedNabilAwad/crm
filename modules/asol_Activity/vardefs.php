<?php

$dictionary['asol_Activity'] = array(
	'table'=>'asol_activity',
	'audited'=>true, 
	'fields'=>array (
  'conditions' => 
  array (
    'required' => false,
    'name' => 'conditions',
    'vname' => 'LBL_CONDITIONS',
    'type' => 'text',
  ),
  'delay' => 
  array (
    'required' => false,
    'name' => 'delay',
    'vname' => 'LBL_DELAY',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '255',
    'size' => '20',
  ),
  
  'type' => 
  array (
    'required' => false,
    'name' => 'type',
    'vname' => 'LBL_TYPE',
    'type' => 'enum',
    'massupdate' => 0,
    //'default' => 'start',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 100,
    'size' => '20',
    'options' => 'wfm_activity_type_list',
    'studio' => 'visible',
    'dependency' => false,
  ),
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('asol_Activity','asol_Activity', array('basic','assignable'));