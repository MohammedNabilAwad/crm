<?php
$hook_version = 1;
$hook_array = Array();
// position, file, function
//$hook_array['after_ui_frame'] = Array();
$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(1, 'osy', 'custom/modules/SchedulersJobs/customFunctions.php','CustomSchedulersJob', 'osyBeforeSave');

