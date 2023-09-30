<?php 
require_once 'modules/EmailMarketing/Menu.php';

$idx_create_target_list = -1;
$idx_target_lists = -1;
$idx_create_target = -1;
$idx_targets = -1;

foreach ($module_menu as $key => $value) 
{
	if(isset($value[2]) && $value[2] == "CreateProspectLists")
	{
		$idx_create_target_list = $key;
	}
	
	if(isset($value[2]) && $value[2] == "ProspectLists")
	{
		$idx_target_lists = $key;
	}
	
	if(isset($value[2]) && $value[2] == "CreateProspects")
	{
		$idx_create_target = $key;
	}
	
	if(isset($value[2]) && $value[2] == "Prospects")
	{
		$idx_targets = $key;
	}
}

// Remove Items form menu
if($idx_create_target_list != -1)
{
	unset($module_menu[$idx_create_target_list]);
}
if($idx_target_lists != -1)
{
	unset($module_menu[$idx_target_lists]);
}
if($idx_create_target != -1)
{
	unset($module_menu[$idx_create_target]);
}
if($idx_targets != -1)
{
	unset($module_menu[$idx_targets]);
}