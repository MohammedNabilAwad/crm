<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(2, 'wfm_hook', 'custom/include/wfm_hook.php','wfm_hook_process', 'execute_process'); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Prospects/ProspectsJjwg_MapsLogicHook.php','ProspectsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo'); 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(2, 'wfm_hook', 'custom/include/wfm_hook.php','wfm_hook_process', 'execute_process'); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Prospects/ProspectsJjwg_MapsLogicHook.php','ProspectsJjwg_MapsLogicHook', 'updateGeocodeInfo'); 
$hook_array['before_delete'] = Array(); 
$hook_array['before_delete'][] = Array(2, 'wfm_hook', 'custom/include/wfm_hook.php','wfm_hook_process', 'execute_process'); 



?>