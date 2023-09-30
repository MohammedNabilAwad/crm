<?php
// Do not store anything in this file that is not part of the array or the hook version. This file will
// be automatically rebuilt in the future.
$hook_version = 1;
$hook_array = Array ();
// position, file, function
$hook_array ['after_save'] = Array ();
$hook_array ['after_save'] [] = Array (
		2,
		'wfm_hook',
		'custom/include/wfm_hook.php',
		'wfm_hook_process',
		'execute_process'
);

$hook_array ['before_save'] = Array ();
$hook_array ['before_save'] [] = Array (
		2,
		'wfm_hook',
		'custom/include/wfm_hook.php',
		'wfm_hook_process',
		'execute_process'
);
$hook_array ['before_delete'] = Array ();
$hook_array ['before_delete'] [] = Array (
		2,
		'wfm_hook',
		'custom/include/wfm_hook.php',
		'wfm_hook_process',
		'execute_process'
);
$hook_array ['before_relationship_add'] = Array ();
// $hook_array ['before_relationship_add'] [] = Array (
// 		1,
// 		'Add Related Company',
// 		'custom/modules/ProspectLists/customFunctions.php',
// 		'osyCustomFunctionProspectLists',
// 		'osyBeforeRelationshipAdd'
// );
$hook_array ['after_relationship_add'] = Array ();
$hook_array ['after_relationship_add'] [] = Array (
		1,
		'osy',
		'custom/modules/ProspectLists/customFunctions.php',
		'osyCustomFunctionProspectLists',
		'osyAfterRelationshipAdd'
);
$hook_array ['after_relationship_delete'] = Array ();
$hook_array ['after_relationship_delete'] [] = Array (
		1,
		'osy',
		'custom/modules/ProspectLists/customFunctions.php',
		'osyCustomFunctionProspectLists',
		'osyAfterRelationshipDelete'
);
$hook_array ['after_save'] [] = Array (
    3,
    'osy',
    'custom/modules/ProspectLists/customFunctions.php',
    'osyCustomFunctionProspectLists',
    'osyAfterSave'
);

?>