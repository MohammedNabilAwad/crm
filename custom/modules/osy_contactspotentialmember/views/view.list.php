<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

require_once ('include/MVC/View/views/view.list.php');
class Customosy_contactspotentialmemberViewList extends ViewList {
	public function Display() {
		parent::Display ();
		include ('custom/modules/osy_contactspotentialmember/osy_includejs.php');
		$this->lv->targetList = true;
	}
}
