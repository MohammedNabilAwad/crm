<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/AOS_Quotes/controller.php';

class CustomAOS_QuotesController extends AOS_QuotesController
{
    public function action_editview()
    { 
        if (isset($_REQUEST['account_id'])) {
            $query = "SELECT * FROM accounts WHERE id = '{$_REQUEST['account_id']}'";
            $result = $this->bean->db->query($query, true);
            $row = $this->bean->db->fetchByAssoc($result);
	        // $this->bean->membership_expiration_date_c = $row['member_till'];
        }

        parent::action_editview();
    }
}