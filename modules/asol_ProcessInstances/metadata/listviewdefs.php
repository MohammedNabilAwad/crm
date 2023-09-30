<?php
require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");

global $sugar_config;

$use_metadata_per_domain = ((isset($sugar_config['WFM_use_metadata_per_domain'])) && ($sugar_config['WFM_use_metadata_per_domain'])) ? true : false;

if ($use_metadata_per_domain) {
	require_once('AlineaSolMetadataFiles/forkingMetadatas/modules/ProcessInstances/listviewdefs.php');
} else {
	$module_name = 'asol_ProcessInstances';
	$listViewDefs[$module_name] = 
	array (
	  'NAME' => 
	  array (
	    'width' => '30%',
	    'label' => 'LBL_NAME',
	    'default' => true,
	    'link' => false,
	  ),
	  'PROCESS_ID' => 
	  array (
	    'type' => 'relate',
	    'studio' => 'visible',
	    'label' => 'LBL_PROCESS_ID',
	    'width' => '10%',
	    'default' => true,
	  	'link' => true,
	  ),
	  /*
	  'BEAN_ID' => 
	  array (
	    'type' => 'varchar',
	    'label' => 'LBL_BEAN_ID',
	    'width' => '10%',
	    'default' => true,
	  ),
	  */
	  'PARENT_PROCESS_INSTANCE_ID' => 
	  array (
	    'type' => 'relate',
	    'studio' => 'visible',
	    'label' => 'LBL_PARENT_PROCESS_INSTANCE_ID',
	    'width' => '10%',
	    'default' => true,
	  ),
	  'BEAN_UNGREEDY_COUNT' => 
	  array (
	    'type' => 'int',
	    'label' => 'LBL_BEAN_UNGREEDY_COUNT',
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
