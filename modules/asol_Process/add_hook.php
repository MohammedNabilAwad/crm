<?php


//check_logic_hook_file("Accounts", "before_save", array(1, "before_save_hook_name",  "custom/include/wfm_hooks/wfm_hook.php", "wfm_hook_process", "before_save_function"));


check_logic_hook_file("Accounts", "after_save", array(1, "after_save_hook_name",  "custom/include/wfm_hook.php", "wfm_hook_process", "after_save_function"));

check_logic_hook_file("Accounts", "after_save", array(1, "after_save_cURL_hook_name",  "custom/include/wfm_hooks/wfm_hook.php", "wfm_hook_process", "cURL"));

?>