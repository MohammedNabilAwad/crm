<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class guar_guaranteesViewDetail extends ViewDetail
{
    public function display()
    {
        require_once('modules/AOS_PDF_Templates/formLetter.php');
        formLetter::DVPopupHtml('guar_guarantees');

        parent::display();

    }

}
