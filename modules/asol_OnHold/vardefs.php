<?php

$dictionary['asol_OnHold'] = array(
	'table'=>'asol_onhold',
	'audited'=>true,
	'fields'=>array (
  
  'asol_processinstances_id_c' => 
  array (
    'required' => false,
    'name' => 'asol_processinstances_id_c',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 36,
    'size' => '20',
  ),
  'process_instance_id' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'process_instance_id',
    'vname' => 'LBL_PROCESS_INSTANCE_ID',
    'type' => 'relate',
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
    'id_name' => 'asol_processinstances_id_c',
    'ext2' => 'asol_ProcessInstances',
    'module' => 'asol_ProcessInstances',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  'asol_workingnodes_id_c' => 
  array (
    'required' => false,
    'name' => 'asol_workingnodes_id_c',
    'vname' => '',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => true,
    'len' => 36,
    'size' => '20',
  ),
  'working_node_id' => 
  array (
    'required' => false,
    'source' => 'non-db',
    'name' => 'working_node_id',
    'vname' => 'LBL_WORKING_NODE_ID',
    'type' => 'relate',
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
    'id_name' => 'asol_workingnodes_id_c',
    'ext2' => 'asol_WorkingNodes',
    'module' => 'asol_WorkingNodes',
    'rname' => 'name',
    'quicksearch' => 'enabled',
    'studio' => 'visible',
  ),
  /*
  'trigger_module' => 
  array (
    'required' => false,
    'name' => 'trigger_module',
    'vname' => 'LBL_TRIGGER_MODULE',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '100',
    'size' => '20',
  ),
  'bean_id' => 
  array (
    'required' => false,
    'name' => 'bean_id',
    'vname' => 'LBL_BEAN_ID',
    'type' => 'varchar',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => '36',
    'size' => '20',
  ),
  */
  
  ///////////
  'parent_name'=>
  array(
    'name'=> 'parent_name',
    'parent_type'=>'record_type_display' ,
    'type_name'=>'parent_type',
    'id_name'=>'parent_id',
    'vname'=>'LBL_ONHOLD_OBJECT',
    'type'=>'parent',
    'group'=>'parent_name',
    'source'=>'non-db',
    'options'=> 'moduleList',
  ),
  'parent_type' =>// trigger_module
  array (
    'required' => false,
    'name' => 'parent_type',
    'vname' => 'LBL_TRIGGER_MODULE',
    'type' => 'enum',
    'massupdate' => 0,
    'default' => 'Home',
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => false,
    'merge_filter' => 'disabled',
    'len' => 100,
    'size' => '20',
    'group'=>'bean',
    'options' => 'moduleList',
    'studio' => 'visible',
    'dependency' => false,
  ),
  'parent_id' =>// bean_id
  array (
    'required' => false,
    'name' => 'parent_id',
    'vname' => 'LBL_BEAN_ID',
    'type' => 'id',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => 0,
    'audited' => false,
    'reportable' => false,
    'unified_search' => false,
    'group'=>'bean',
    'merge_filter' => 'disabled',
    'len' => 36,
    'size' => '20',
  ),
  ////////////
),
	'relationships'=>array (
),
	'optimistic_locking'=>true,
);
if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
}
VardefManager::createVardef('asol_OnHold','asol_OnHold', array('basic','assignable'));