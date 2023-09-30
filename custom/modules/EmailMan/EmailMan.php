<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/EmailMan/EmailMan.php';

/*
 * OPENSYMBOLMOD Alberto 
 * PITCILOUS-1 Rendere le modifiche upgrade safe SuiteCRM
 * 
 * Risposta di SalesAgility:
 * There's no real way to change the bean in an upgrade safe manner unfortunately. I can see that you're changing the create_ref_email method which is only used in sendEmail, this is itself only used in `modules/EmailMan/EmailManDelivery.php`
 * In this case I would create a copy of the bean in `custom/modules/EmailMan/` and perhaps rename it to avoid conflicts.
 * Then you can copy `modules/EmailMan/EmailManDelivery.php` and place it in `custom/modules/EmailMan/EmailManDelivery.php` and edit it (around line 86 in the copy I have) so that it uses the new bean.
 * This should mean that everywhere that that method can be called will go through your custom version of the method though, obviously, I would advise testing this.
 * 
 */

class CustomEmailMan extends EmailMan {
    /**
     * Function finds the reference email for the campaign. Since a campaign can have multiple email templates
     * the reference email has same id as the marketing id.
     * this function will create an email if one does not exist. also the function will load these relationships leads, accounts, contacts
     * users and targets
     *
     * @param varchar marketing_id message id
     * @param string $subject email subject
     * @param string $body_text Email Body Text
     * @param string $body_html Email Body HTML
     * @param string $campaign_name Campaign Name
     * @param string from_address Email address of the sender, usually email address of the configured inbox.
     * @param string sender_id If of the user sending the campaign.
     * @param array  macro_nv array of name value pair, one row for each replacable macro in email template text.
     * @param string from_address_name The from address eg markeing <marketing@sugar.net>
     * @return
     */
    function create_ref_email($marketing_id,$subject,$body_text,$body_html,$campagin_name,$from_address,$sender_id,$notes,$macro_nv,$newmessage,$from_address_name) {

        //OPENSYMBOLMOD START Alberto Dal Sasso ASSITCILOC-16 Bug Giugno 2016
        // salva related_type
        if( !in_array( $this->related_type, array('Users','Prospects','Contacts','Leads','Accounts') ) ) {
            $related_type = $this->related_type;
            $this->related_type = null;
        }

        $ret = parent::create_ref_email($marketing_id,$subject,$body_text,$body_html,$campagin_name,$from_address,$sender_id,$notes,$macro_nv,$newmessage,$from_address_name);
        
        // ripristina related_type
        if (!empty($this->related_id ) && !empty($related_type)) {
            $this->related_type = $related_type;

            $rel_name = $this->related_type;
            $this->ref_email->load_relationship($rel_name);
            if( !empty($this->ref_email->$rel_name) ) {
                //serialize data to be passed into Link2->add() function
                $campaignData = serialize($macro_nv);
                //required for one email per campaign per marketing message.
                $this->ref_email->$rel_name->add($this->related_id,array('campaign_data'=>$this->db->quote($campaignData)));
            } else {
                $GLOBALS['log']->fatal( __METHOD__.": relazione non definita '$rel_name'");
            }
        }

        return $ret;
        //OPENSYMBOLMOD END Alberto Dal Sasso ASSITCILOC-16 Bug Giugno 2016
    }
}
