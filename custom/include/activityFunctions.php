<?php
class ActivityFunctions {
	function beforeSave(&$bean) {
		if((isset($_REQUEST['relate_to']) && !empty($_REQUEST['relate_to']))
		&& (isset($_REQUEST['relate_id']) && !empty($_REQUEST['relate_id'])))
		{
			$bean->parent_type = $_REQUEST['relate_to'];
			$bean->parent_id = $_REQUEST['relate_id'];
		}
	}
}