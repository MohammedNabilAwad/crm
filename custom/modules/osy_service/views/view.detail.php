<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

require_once ('include/MVC/View/views/view.detail.php');

class Customosy_serviceViewDetail extends ViewDetail {

        public function getModuleTitle( $show_help = true ) {
            return parent::getModuleTitle(false);
        }
        
}
