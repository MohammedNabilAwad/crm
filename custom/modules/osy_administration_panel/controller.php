<?php 
require_once('include/MVC/Controller/SugarController.php');
class osy_administration_panelController extends SugarController{
	public function process(){
		if($this->module=='osy_administration_panel' && ($this->action == 'index' || $this->action == 'ListView')){
			global $db;
			$q_record = "SELECT id
				FROM {$this->module} WHERE deleted=0
				ORDER BY date_entered ASC LIMIT 1 
			";
			$r_record = $db->query( $q_record );
			$v_record = $db->fetchByAssoc( $r_record );
			if(isset($v_record['id']) && !empty($v_record['id'])){
				$this->action = 'DetailView';
				$this->record=$v_record['id'];
			}else{
				$this->action = 'EditView';
			}
		}		
		parent::process();
	}	
}
?>