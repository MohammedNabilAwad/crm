<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );
	// OPENSYMBOLMOD - START - davide.dallapozza - 14:06:46
	// *************************************************

require_once ('include/MVC/View/views/view.detail.php');
class Customosy_contactspotentialmemberViewDetail extends ViewDetail {
	function Customosy_contactspotentialmemberViewDetail() {
		parent::ViewDetail ();
	}
	function display() {
		if (isset ( $this->dv->focus->lead_id ) && $this->dv->focus->lead_id != '') {
			global $db;
			$q = "SELECT account_name FROM leads WHERE id ='" . $this->dv->focus->lead_id . "' AND deleted = 0";
			$r = $db->query ( $q );
			$v = $db->fetchByAssoc ( $r );
			$this->dv->focus->lead_name = $v ['account_name'];
		}
		parent::display ();
	}
}

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************
?>