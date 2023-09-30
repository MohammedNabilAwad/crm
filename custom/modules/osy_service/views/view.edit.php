<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
    die ( 'Not A Valid Entry Point' );

require_once ('include/MVC/View/views/view.edit.php');

class Customosy_serviceViewEdit extends ViewEdit {

    public function getModuleTitle( $show_help = true ) {
        return parent::getModuleTitle(false);
    }

}
