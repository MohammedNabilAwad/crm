<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class Mem_MemosViewDetail extends ViewDetail
{
    public function display()
    {
        require_once('modules/AOS_PDF_Templates/formLetter.php');
        formLetter::DVPopupHtml('Mem_Memos');

        parent::display();

    }

}
