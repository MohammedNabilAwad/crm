<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function
$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(1, 'count delegates', 'custom/modules/FP_events/customFunctions.php','osyCustomFunctionFP_events', 'osyBeforeSave');
$hook_array['after_retrieve'] = Array();
$hook_array['after_retrieve'][] = Array(1, 'count delegates', 'custom/modules/FP_events/customFunctions.php','osyCustomFunctionFP_events', 'osyAfterRetrieve');
?>