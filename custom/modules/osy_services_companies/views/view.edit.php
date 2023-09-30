<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class CustomOsy_services_companiesViewEdit extends ViewEdit {
 	function CustomOsy_services_companiesViewEdit(){
 		parent::ViewEdit();
 	}	

 	function display() {
		global $db;
 		
		if(isset($this->ev->focus->lead_id) && $this->ev->focus->lead_id != ''){
			$q="SELECT account_name FROM leads WHERE id ='".$this->ev->focus->lead_id."' AND deleted = 0";
			$r=$db->query($q);
			$v=$db->fetchByAssoc($r);
			$this->ev->focus->lead_name = $v['account_name'];
		}

		// if subpanel_create passes in full form, then add osy_account_id for the account relate
		if (isset($_REQUEST['account_id']))
			$_REQUEST['osy_account_id'] = $_REQUEST['account_id'];


 		parent::display();
 	}    
 	
}
?>
