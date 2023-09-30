<?php
require_once("modules/asol_Process/___common_WFM/php/asol_utils.php");

global $sugar_config;

$use_metadata_per_domain = ((isset($sugar_config['WFM_use_metadata_per_domain'])) && ($sugar_config['WFM_use_metadata_per_domain'])) ? true : false;

if ($use_metadata_per_domain) {
	require_once('AlineaSolMetadataFiles/forkingMetadatas/modules/Process/listviewdefs.php');
} else {
	$module_name = 'asol_Process';
	global $app_list_strings;
	$listViewDefs[$module_name] = 
	array (
	  'NAME' => 
	  array (
	    'width' => '30%',
	    'label' => 'LBL_NAME',
	    'default' => true,
	    'link' => true,
	  ),
	  'STATUS' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_STATUS',
	    'sortable' => true,
	    'width' => '10%',
	  ),
	  'ALTERNATIVE_DATABASE' => 
	  array (
	    'type' => 'varchar',
	    'default' => true,
	    'label' => 'LBL_REPORT_USE_ALTERNATIVE_DB',
	    'width' => '10%',
	  ),
	  'TRIGGER_MODULE' => 
	  array (
	    'type' => 'enum',
	    'default' => true,
	    'studio' => 'visible',
	    'label' => 'LBL_TRIGGER_MODULE',
	    //'customCode' => '{$fields.trigger_module.value}',
	    'sortable' => true,
	    'width' => '10%',
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
//$actionsMenuExtraItems[] = "test";
?>
