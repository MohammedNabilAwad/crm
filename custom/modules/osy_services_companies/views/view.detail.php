<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//OPENSYMBOLMOD isabella.masiero 06/mag/2013
require_once('include/MVC/View/views/view.detail.php');

class CustomOsy_services_companiesViewDetail extends ViewDetail {
 	function CustomOsy_services_companiesViewDetail(){
 		parent::ViewDetail();
 	}	

 	function display() {
		global $db,$current_user;

		require_once("modules/ACLRoles/ACLRole.php");
		$roles=ACLRole::getUserRoles($current_user->id);
		if(in_array("Accounting Department",$roles) || is_admin($current_user)){
			$this->ss->assign("DISPLAY_PRINT", "");
		}else{
			$this->ss->assign("DISPLAY_PRINT", "none");
		}
		if(isset($this->dv->focus->lead_id) && $this->dv->focus->lead_id != ''){
			$q="SELECT account_name FROM leads WHERE id ='".$this->dv->focus->lead_id."' AND deleted = 0";
			$r=$db->query($q);
			$v=$db->fetchByAssoc($r);
			$this->dv->focus->lead_name = $v['account_name'];
		}
 		parent::display();
 	}    
 	
}
?>