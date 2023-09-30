<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

require_once ('modules/osy_service/views/view.list.php');

class Customosy_serviceViewList extends osy_serviceViewList {

        public function getModuleTitle( $show_help = true ) {
            return parent::getModuleTitle(false);
        }

        function preDisplay(){
            parent::preDisplay();
            $this->lv->delete = false;
            $this->lv->massupdate = false;
        }

}
