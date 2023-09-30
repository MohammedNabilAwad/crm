<?php
/**
 *
 * @package Advanced OpenPortal
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author Salesagility Ltd <support@salesagility.com>
 */

//SET THE job_string number to 3 digits to prevent crashing with sugarcrm pre-define job id.
$job_strings[102] = 'osy_opportunity_send_reminder';
 
function osy_opportunity_send_reminder(){
	require_once('custom/modules/osy_administration_panel/customFunctions.php');
	osy_send_reminder_opp();
	return true;
}

$job_strings[] = 'pollMonitoredInboxesCustomAOP';

$GLOBALS['log']->info('Custom add jobs here loaded');
function getDistributionMethod($ieX){
    global $sugar_config;

    $method = $sugar_config['aop']['distribution_method'];
    //Check if there is a portal setting for the distribution method.
    if($method){
        return $method;

    }else{
        return $ieX->get_stored_options("distrib_method", "");
    }
}

function pollMonitoredInboxesCustomAOP() {

    $_bck_up = array('team_id' => $GLOBALS['current_user']->team_id, 'team_set_id' => $GLOBALS['current_user']->team_set_id);
    $GLOBALS['log']->info('----->Scheduler fired job of type pollMonitoredInboxesCustomAOP()');
    global $dictionary;
    global $app_strings;
    global $sugar_config;

    require_once('modules/Configurator/Configurator.php');
    require_once('modules/Emails/EmailUI.php');

    $ie = new InboundEmail();
    $emailUI = new EmailUI();
    $r = $ie->db->query('SELECT id, name FROM inbound_email WHERE is_personal = 0 AND deleted=0 AND status=\'Active\' AND mailbox_type != \'bounce\'');
    $GLOBALS['log']->debug('Just got Result from get all Inbounds of Inbound Emails');

    while($a = $ie->db->fetchByAssoc($r)) {
        $GLOBALS['log']->debug('In while loop of Inbound Emails');
        $ieX = new InboundEmail();
        $ieX->retrieve($a['id']);
        $GLOBALS['current_user']->team_id = $ieX->team_id;
        $GLOBALS['current_user']->team_set_id = $ieX->team_set_id;
        $mailboxes = $ieX->mailboxarray;
        foreach($mailboxes as $mbox) {
            $ieX->mailbox = $mbox;
            $newMsgs = array();
            $msgNoToUIDL = array();
            $connectToMailServer = false;
            if ($ieX->isPop3Protocol()) {
                $msgNoToUIDL = $ieX->getPop3NewMessagesToDownloadForCron();
                // get all the keys which are msgnos;
                $newMsgs = array_keys($msgNoToUIDL);
            }
            if($ieX->connectMailserver() == 'true') {
                $connectToMailServer = true;
            } // if

            $GLOBALS['log']->debug('Trying to connect to mailserver for [ '.$a['name'].' ]');
            if($connectToMailServer) {
                $GLOBALS['log']->debug('Connected to mailserver');
                if (!$ieX->isPop3Protocol()) {
                    $newMsgs = $ieX->getNewMessageIds();
                }
                if(is_array($newMsgs)) {
                    $current = 1;
                    $total = count($newMsgs);
                    require_once("include/SugarFolders/SugarFolders.php");
                    $sugarFolder = new SugarFolder();
                    $groupFolderId = $ieX->groupfolder_id;
                    $isGroupFolderExists = false;
                    $users = array();
                    if ($groupFolderId != null && $groupFolderId != "") {
                        $sugarFolder->retrieve($groupFolderId);
                        $isGroupFolderExists = true;
                    } // if
                    $messagesToDelete = array();
                    if ($ieX->isMailBoxTypeCreateCase()) {
                        $users[] = $sugarFolder->assign_to_id;
                        $distributionMethod = getDistributionMethod($ieX);
                        if ($distributionMethod == 'singleUser') {
                            $distributionUserId = $sugar_config['aop']['distribution_user_id'];
                        }elseif ($distributionMethod != 'roundRobin') {
                            $counts = $emailUI->getAssignedEmailsCountForUsers($users);
                        } else {
                            $lastRobin = $emailUI->getLastRobin($ieX);
                        }
                        $GLOBALS['log']->debug('distribution method id [ '.$distributionMethod.' ]');
                    }
                    foreach($newMsgs as $k => $msgNo) {
                        $uid = $msgNo;
                        if ($ieX->isPop3Protocol()) {
                            $uid = $msgNoToUIDL[$msgNo];
                        } else {
                            $uid = imap_uid($ieX->conn, $msgNo);
                        } // else
                        if ($isGroupFolderExists) {
                            if ($ieX->importOneEmail($msgNo, $uid)) {
                                // add to folder
                                $sugarFolder->addBean($ieX->email);
                                if ($ieX->isPop3Protocol()) {
                                    $messagesToDelete[] = $msgNo;
                                } else {
                                    $messagesToDelete[] = $uid;
                                }
                                if ($ieX->isMailBoxTypeCreateCase()) {
                                    $userId = "";
                                    if ($distributionMethod == 'singleUser') {
                                        $userId = $distributionUserId;
                                    }elseif ($distributionMethod == 'roundRobin') {
                                        if (sizeof($users) == 1) {
                                            $userId = $users[0];
                                            $lastRobin = $users[0];
                                        } else {
                                            $userIdsKeys = array_flip($users); // now keys are values
                                            $thisRobinKey = $userIdsKeys[$lastRobin] + 1;
                                            if(!empty($users[$thisRobinKey])) {
                                                $userId = $users[$thisRobinKey];
                                                $lastRobin = $users[$thisRobinKey];
                                            } else {
                                                $userId = $users[0];
                                                $lastRobin = $users[0];
                                            }
                                        } // else
                                    } else {
                                        if (sizeof($users) == 1) {
                                            foreach($users as $k => $value) {
                                                $userId = $value;
                                            } // foreach
                                        } else {
                                            asort($counts); // lowest to highest
                                            $countsKeys = array_flip($counts); // keys now the 'count of items'
                                            $leastBusy = array_shift($countsKeys); // user id of lowest item count
                                            $userId = $leastBusy;
                                            $counts[$leastBusy] = $counts[$leastBusy] + 1;
                                        }
                                    } // else
                                    $GLOBALS['log']->debug('userId [ '.$userId.' ]');
                                    $ieX->handleCreateCase($ieX->email, $userId);
                                } // if
                            } // if
                        } else {
                            if($ieX->isAutoImport()) {
                                $ieX->importOneEmail($msgNo, $uid);
                            } else {
                                /*If the group folder doesn't exist then download only those messages
                                 which has caseid in message*/

                                $ieX->getMessagesInEmailCache($msgNo, $uid);
                                $email = new Email();
                                $header = imap_headerinfo($ieX->conn, $msgNo);
                                $email->name = $ieX->handleMimeHeaderDecode($header->subject);
                                $email->from_addr = $ieX->convertImapToSugarEmailAddress($header->from);
                                $email->reply_to_email  = $ieX->convertImapToSugarEmailAddress($header->reply_to);
                                if(!empty($email->reply_to_email)) {
                                    $contactAddr = $email->reply_to_email;
                                } else {
                                    $contactAddr = $email->from_addr;
                                }
                                $mailBoxType = $ieX->mailbox_type;
                                $ieX->handleAutoresponse($email, $contactAddr);
                            } // else
                        } // else
                        $GLOBALS['log']->debug('***** On message [ '.$current.' of '.$total.' ] *****');
                        $current++;
                    } // foreach
                    // update Inbound Account with last robin
                    if ($ieX->isMailBoxTypeCreateCase() && $distributionMethod == 'roundRobin') {
                        $emailUI->setLastRobin($ieX, $lastRobin);
                    } // if

                } // if
                if ($isGroupFolderExists)	 {
                    $leaveMessagesOnMailServer = $ieX->get_stored_options("leaveMessagesOnMailServer", 0);
                    if (!$leaveMessagesOnMailServer) {
                        if ($ieX->isPop3Protocol()) {
                            $ieX->deleteMessageOnMailServerForPop3(implode(",", $messagesToDelete));
                        } else {
                            $ieX->deleteMessageOnMailServer(implode($app_strings['LBL_EMAIL_DELIMITER'], $messagesToDelete));
                        }
                    }
                }
            } else {
                $GLOBALS['log']->fatal("SCHEDULERS: could not get an IMAP connection resource for ID [ {$a['id']} ]. Skipping mailbox [ {$a['name']} ].");
                // cn: bug 9171 - continue while
            } // else
        } // foreach
        imap_expunge($ieX->conn);
        imap_close($ieX->conn, CL_EXPUNGE);
    } // while
    $GLOBALS['current_user']->team_id = $_bck_up['team_id'];
    $GLOBALS['current_user']->team_set_id = $_bck_up['team_set_id'];
    return true;
}

$job_strings[] = 'fp_eventsSendInvitemails';
function fp_eventsSendInvitemails() {
    global $db;
    global $sugar_config;
    global $mod_strings;

    $qap = "SELECT max_delegate_send_num FROM osy_administration_panel LIMIT 1";
    $rap = $db->query($qap);
    $vap = $db->fetchByAssoc($rap);
    $max_send_num = (int) $vap['max_delegate_send_num'];

    if(!isset($max_send_num) || $max_send_num == 0){
        return true;
    }
    $invite_count = 0; //used to count the number of emails sent

    $q = "SELECT id FROM fp_events WHERE schedule_email = 1 AND deleted = 0";
    $r = $db->query($q);
    while($v = $db->fetchByAssoc($r)){
        $event = BeanFactory::getBean('FP_events', $v['id']);
        $event->load_relationship('fp_events_contacts'); // get related contacts
        $event->load_relationship('fp_events_leads_1'); //get related leads
        $event->load_relationship('accounts'); //get related accounts
        $event->load_relationship('osy_contactspotentialmember'); //get related osy_contactspotentialmember
        $event->load_relationship('osy_other_contacts'); //get related osy_contactspotentialmember

        //Count the number of delegates linked to the event that have not yet been invited
        $query = "SELECT count(*) as count FROM fp_events_contacts_c WHERE fp_events_contactsfp_events_ida='".$event->id."' AND (invite_status='Not Invited' OR invite_status='' OR invite_status IS NULL) AND deleted='0'";
        $result = $db->query($query);
        $res = $db->fetchByAssoc($result);
        $contact_count = $res['count'];//count contacts

        $query = "SELECT count(*) as count FROM fp_events_leads_1_c WHERE fp_events_leads_1fp_events_ida='".$event->id."' AND (invite_status='Not Invited' OR invite_status='' OR invite_status IS NULL) AND deleted='0'";
        $result = $db->query($query);
        $res = $db->fetchByAssoc($result);
        $lead_count = $res['count'];//count leads

        $query = "SELECT count(*) as count FROM fp_events_accounts WHERE fp_event_id ='".$event->id."' AND (invite_status='Not Invited' OR invite_status='' OR invite_status IS NULL) AND deleted='0'";
        $result = $db->query($query);
        $res = $db->fetchByAssoc($result);
        $account_count = $res['count'];//count accounts

        $query = "SELECT count(*) as count FROM fp_events_contactspotentialmember WHERE fp_event_id ='".$event->id."' AND (invite_status='Not Invited' OR invite_status='' OR invite_status IS NULL) AND deleted='0'";
        $result = $db->query($query);
        $res = $db->fetchByAssoc($result);
        $contactspotentialmember_count = $res['count'];//count osy_contactspotentialmember

        $query = "SELECT count(*) as count FROM fp_events_osy_other_contacts WHERE fp_event_id ='".$event->id."' AND (invite_status='Not Invited' OR invite_status='' OR invite_status IS NULL) AND deleted='0'";
        $result = $db->query($query);
        $res = $db->fetchByAssoc($result);
        $other_contacts_count = $res['count'];//count osy_other_contacts

        $delegate_count = $contact_count + $lead_count + $account_count + $contactspotentialmember_count + $other_contacts_count;//Total up delegates

        if($delegate_count == 0){
            $q = "UPDATE fp_events SET schedule_email = 0 WHERE id = '".$event->id."'";
            $db->query($q);
            continue;
        }
        $error_count = 0; //used to count the number of failed email attempts

        //loop through related accounts
        foreach ($event->accounts->getBeans() as $contact) {
            //Get accept status of contact
            $query = 'SELECT invite_status FROM fp_events_accounts WHERE fp_event_id= "'.$event->id.'" AND account_id = "'.$contact->id.'"';
            $status = $db->getOne($query);

            if($status == null || $status == '' || $status == 'Not Invited') {
                $send_invite = sendEmailFunc($event,$contact);
                //Send the message, log if error occurs
                if (!$send_invite){
                    $error_count ++;
                }
                else {
                    $invite_count ++;
                    //update contact to invites
                    $query = 'UPDATE fp_events_accounts SET invite_status="Invited" WHERE fp_event_id="'.$event->id.'" AND account_id="'.$contact->id.'"';
                    $db->query($query);
                    if($invite_count >= $max_send_num){
                        return true;
                    }
                }
            }
        }
        //loop through related contacts
        foreach ($event->fp_events_contacts->getBeans() as $contact) {
            //Get accept status of contact
            $query = 'SELECT invite_status FROM fp_events_contacts_c WHERE fp_events_contactsfp_events_ida = "'.$event->id.'" 
            AND fp_events_contactscontacts_idb = "'.$contact->id.'"';
            $status = $db->getOne($query);

            if($status == null || $status == '' || $status == 'Not Invited') {
                $send_invite = sendEmailFunc($event,$contact);
                //Send the message, log if error occurs
                if (!$send_invite){
                    $error_count ++;
                }
                else {
                    $invite_count ++;
                    //update contact to invites
                    $query = 'UPDATE fp_events_contacts_c SET invite_status="Invited" WHERE fp_events_contactsfp_events_ida="'.$event->id.'" 
                    AND fp_events_contactscontacts_idb="'.$contact->id.'"';
                    $db->query($query);
                    if($invite_count >= $max_send_num){
                        return true;
                    }
                }
            }
        }
        //loop through related leads
        foreach ($event->fp_events_leads_1->getBeans() as $contact) {
            //Get accept status of contact
            $query = 'SELECT invite_status FROM fp_events_leads_1_c WHERE fp_events_leads_1fp_events_ida = "'.$event->id.'" 
            AND fp_events_leads_1leads_idb = "'.$contact->id.'"';
            $status = $db->getOne($query);

            if($status == null || $status == '' || $status == 'Not Invited') {
                $send_invite = sendEmailFunc($event,$contact);
                //Send the message, log if error occurs
                if (!$send_invite){
                    $error_count ++;
                }
                else {
                    $invite_count ++;
                    //update contact to invites
                    $query = 'UPDATE fp_events_leads_1_c SET invite_status="Invited" WHERE fp_events_leads_1fp_events_ida="'.$event->id.'" 
                    AND fp_events_leads_1leads_idb="'.$contact->id.'"';
                    $db->query($query);
                    if($invite_count >= $max_send_num){
                        return true;
                    }
                }
            }
        }
        //loop through related osy_contactspotentialmember
        foreach ($event->osy_contactspotentialmember->getBeans() as $contact) {
            //Get accept status of contact
            $query = 'SELECT invite_status FROM fp_events_contactspotentialmember WHERE fp_event_id = "'.$event->id.'" 
            AND osy_contactspotentialmember_id = "'.$contact->id.'"';
            $status = $db->getOne($query);

            if($status == null || $status == '' || $status == 'Not Invited') {
                $send_invite = sendEmailFunc($event,$contact);
                //Send the message, log if error occurs
                if (!$send_invite){
                    $error_count ++;
                }
                else {
                    $invite_count ++;
                    //update contact to invites
                    $query = 'UPDATE fp_events_contactspotentialmember SET invite_status="Invited" WHERE fp_event_id="'.$event->id.'" 
                    AND osy_contactspotentialmember_id="'.$contact->id.'"';
                    $db->query($query);
                    if($invite_count >= $max_send_num){
                        return true;
                    }
                }
            }
        }
        //loop through related osy_other_contacts
        foreach ($event->osy_other_contacts->getBeans() as $contact) {
            //Get accept status of contact
            $query = 'SELECT invite_status FROM fp_events_osy_other_contacts WHERE fp_event_id = "'.$event->id.'" 
            AND osy_other_contacts_id = "'.$contact->id.'"';
            $status = $db->getOne($query);

            if($status == null || $status == '' || $status == 'Not Invited') {
                $send_invite = sendEmailFunc($event,$contact);
                //Send the message, log if error occurs
                if (!$send_invite){
                    $error_count ++;
                }
                else {
                    $invite_count ++;
                    //update contact to invites
                    $query = 'UPDATE fp_events_osy_other_contacts SET invite_status="Invited" WHERE fp_event_id="'.$event->id.'" 
                    AND osy_other_contacts_id="'.$contact->id.'"';
                    $db->query($query);
                    if($invite_count >= $max_send_num){
                        return true;
                    }
                }
            }
        }
    }
    return true;
}

function sendEmailFunc ($event,$contact){
    global $sugar_config, $mod_strings;

    $sModuleName = strtolower($contact->module_dir);

    //set email links
    $event->link = "<a href='".$sugar_config['site_url']."/index.php?entryPoint=responseEntryPoint&event=".$event->id."&delegate=".$contact->id."&type=".$sModuleName."&response=accept'>Accept</a>";
    $event->link_declined = "<a href='".$sugar_config['site_url']."/index.php?entryPoint=responseEntryPoint&event=".$event->id."&delegate=".$contact->id."&type=".$sModuleName."&response=decline'>Decline</a>";

    //Get the TO name and e-mail address for the message
    $rcpt_name = $contact->first_name . ' ' . $contact->last_name;
    $rcpt_email = $contact->email1;

    $emailTemp = new EmailTemplate();
    $emailTemp->disable_row_level_security = true;
    $emailTemp->retrieve($event->invite_templates);  //Use the ID value of the email template record

    //parse the lead varibales first
    $firstpass = $emailTemp->parse_template_bean($emailTemp->body_html, 'Contacts', $contact);

    $email_subject = $emailTemp->parse_template_bean($emailTemp->subject, 'FP_events', $event);
    $email_body = from_html($emailTemp->parse_template_bean($firstpass, 'FP_events', $event));
    $alt_emailbody = wordwrap($emailTemp->parse_template_bean($firstpass, 'FP_events', $event), 900);
    
    //get attachments
    $attachmentBean = new Note();
    $attachment_list = $attachmentBean->get_full_list('',"notes.parent_type = 'Emails' AND notes.parent_id = '".$event->invite_templates."'");

    $attachments = array();

    if($attachment_list != null){

        foreach ($attachment_list as $attachment) {
            $attachments[] = $attachment;
        }
    }
    //send the email
    $send_invite = sendEmail($rcpt_email, $email_subject, $rcpt_name, $email_body, $alt_emailbody, $contact, $attachments);
    if (!$send_invite){
        $GLOBALS['log']->fatal('ERROR: Invite email failed to send to: '.$rcpt_name.' at '.$rcpt_email);
    }
    return $send_invite;
}

//handles sending the emails
function sendEmail($emailTo, $emailSubject, $emailToname, $emailBody, $altemailBody, SugarBean $relatedBean = null, $attachments = array()){

    $emailObj = new Email();
    $defaults = $emailObj->getSystemDefaultEmail();
    $mail = new SugarPHPMailer();
    $mail->setMailerForSystem();
    $mail->From = $defaults['email'];
    $mail->FromName = $defaults['name'];
    $mail->ClearAllRecipients();
    $mail->ClearReplyTos();
    $mail->Subject=from_html($emailSubject);
    $mail->Body=$emailBody;
    $mail->AltBody = $altemailBody;
    $mail->handleAttachments($attachments);
    $mail->prepForOutbound();
    $mail->AddAddress($emailTo);

    //now create email
    if (@$mail->Send()) {
        $emailObj->to_addrs= '';
        $emailObj->type= 'out';
        $emailObj->deleted = '0';
        $emailObj->name = $mail->Subject;
        $emailObj->description = $mail->AltBody;
        $emailObj->description_html = $mail->Body;
        $emailObj->from_addr = $mail->From;
        if ( $relatedBean instanceOf SugarBean && !empty($relatedBean->id) ) {
            $emailObj->parent_type = $relatedBean->module_dir;
            $emailObj->parent_id = $relatedBean->id;
        }
        $emailObj->date_sent = TimeDate::getInstance()->nowDb();
        $emailObj->modified_user_id = '1';
        $emailObj->created_by = '1';
        $emailObj->status = 'sent';
        $emailObj->save();

        return true;
    }
    else {
        return false;
    }
}

function runMassEmailCampaignCustom()
{
    if (!class_exists('LoggerManager')) {

    }
    $GLOBALS['log'] = LoggerManager::getLogger('emailmandelivery');
    $GLOBALS['log']->debug('Called:runMassEmailCampaign');

    if (!class_exists('DBManagerFactory')) {
        require('include/database/DBManagerFactory.php');
    }

    global $beanList;
    global $beanFiles;
    require("config.php");
    require('include/modules.php');
    if (!class_exists('AclController')) {
        require('modules/ACL/ACLController.php');
    }

    require('custom/modules/EmailMan/EmailManDelivery.php');
    return true;
}

