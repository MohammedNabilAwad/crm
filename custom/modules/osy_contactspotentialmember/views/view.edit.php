<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );
	// OPENSYMBOLMOD - START - davide.dallapozza - 14:14:41
	// *************************************************

require_once ('include/MVC/View/views/view.edit.php');
class Customosy_contactspotentialmemberViewEdit extends ViewEdit {
	function Customosy_contactspotentialmemberViewEdit() {
		parent::ViewEdit ();
	}
	function display() {
		if (isset ( $this->ev->focus->lead_id ) && $this->ev->focus->lead_id != '') {
			global $db;
			$q = "SELECT account_name FROM leads WHERE id ='" . $this->ev->focus->lead_id . "' AND deleted = 0";
			$r = $db->query ( $q );
			$v = $db->fetchByAssoc ( $r );
			$this->ev->focus->lead_name = $v ['account_name'];
		}

		parent::display ();
	}
}

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************
?>
