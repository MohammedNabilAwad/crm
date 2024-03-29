<?php
require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");

global $sugar_config;

$use_metadata_per_domain = ((isset($sugar_config['WFM_use_metadata_per_domain'])) && ($sugar_config['WFM_use_metadata_per_domain'])) ? true : false;

if ($use_metadata_per_domain) {
	require_once('AlineaSolMetadataFiles/forkingMetadatas/modules/Events/listviewdefs.php');
} else {
	$module_name = 'asol_Events';
	$listViewDefs[$module_name] = 
	array (
	  'NAME' => 
	  array (
	    'width' => '30%',
	    'label' => 'LBL_NAME',
	    'default' => true,
	    'link' => true,
	  ),
	  'TRIGGER_TYPE' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_TRIGGER_TYPE',
	    'sortable' => true,
	    'width' => '10%',
	  ),
	  'TRIGGER_EVENT' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_TRIGGER_EVENT',
	    'sortable' => true,
	    'width' => '10%',
	  ),
	  'TYPE' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_TYPE',
	    'sortable' => true,
	    'width' => '10%',
	  ),
	  'SCHEDULED_TYPE' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_SCHEDULED_TYPE',
	    'sortable' => true,
	    'width' => '10%',
	  ),
	  'ASOL_PROCESS_ASOL_EVENTS_NAME' => 
	  array (
	    'type' => 'relate',
	    'link' => true,
	    'label' => 'LBL_ASOL_PROCESS_ASOL_EVENTS_FROM_ASOL_PROCESS_TITLE',
	    'id' => 'ASOL_PROCE6F14PROCESS_IDA',
	    'width' => '10%',
	    'default' => true,
	  ),
	  
	  'DATE_ENTERED' => 
	  array (
	    'width' => '7%',
	    'label' => 'LBL_DATE_ENTERED',
	    'default' => true,
	  ),
	  'DATE_MODIFIED' => 
	  array (
	    'width' => '7%',
	    'label' => 'LBL_DATE_MODIFIED',
	    'default' => true,
	  ),
	  'CREATED_BY_NAME' => 
	  array (
	    'type' => 'relate',
	    'link' => true,
	    'label' => 'LBL_CREATED',
	    'id' => 'CREATED_BY',
	    'width' => '10%',
	    'default' => true,
	  ),
	  'MODIFIED_BY_NAME' => 
	  array (
	    'type' => 'relate',
	    'link' => true,
	    'label' => 'LBL_MODIFIED_NAME',
	    'id' => 'MODIFIED_USER_ID',
	    'width' => '10%',
	    'default' => true,
	  ),
	);
	
	if (wfm_reports_utils::wfm_isDomainsInstalled()) {
		$listViewDefs[$module_name]['ASOL_DOMAIN_NAME'] =  
		  array (
		    'type' => 'relate',
		    'studio' => 'visible',
		    'label' => 'LBL_ASOL_DOMAIN_NAME',
		    'width' => '5%',
		    'default' => true,
		  );
	}
}
?>
