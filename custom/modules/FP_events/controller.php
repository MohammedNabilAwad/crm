<?php
if (!defined('sugarEntry'))
    define('sugarEntry', true);
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

require_once 'modules/FP_events/controller.php';

class customFP_eventsController extends FP_eventsController
{
    public function action_markasinvited()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {
                //update contacts query
                $query = 'UPDATE fp_events_contacts_c SET invite_status="Invited" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $res = $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Invited" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $res = $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Invited" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $res = $db->query($query3);
                $query4 = 'UPDATE fp_events_accounts SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);
            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET invite_status="Invited" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $res = $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Invited" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $res = $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Invited" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $res = $db->query($query3);
            $query4 = 'UPDATE fp_events_accounts SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Invited" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_markasnotinvited()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {
                $query = 'UPDATE fp_events_contacts_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $res = $db->query($query3);
                $query4 = 'UPDATE fp_events_accounts SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);

            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Not Invited", email_responded="0" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $res = $db->query($query3);

            $query4 = 'UPDATE fp_events_accounts SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Not Invited", email_responded="0" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_markasattended()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {

                $query = 'UPDATE fp_events_contacts_c SET invite_status="Attended" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Attended" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Attended" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $db->query($query3);
                $query4 = 'UPDATE fp_events_accounts SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);
            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET invite_status="Attended" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Attended" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Attended" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $res = $db->query($query3);

            $query4 = 'UPDATE fp_events_accounts SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_markasnotattended()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {

                $query = 'UPDATE fp_events_contacts_c SET invite_status="Not Attended" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Not Attended" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Not Attended" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $res = $db->query($query3);

                $query4 = 'UPDATE fp_events_accounts SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);
            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET invite_status="Not Attended" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET invite_status="Not Attended" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET invite_status="Not Attended" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $db->query($query3);

            $query4 = 'UPDATE fp_events_accounts SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET invite_status="Not Attended" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_markasaccepted()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {

                $query = 'UPDATE fp_events_contacts_c SET accept_status="Accepted" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET accept_status="Accepted" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET accept_status="Accepted" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $res = $db->query($query3);
                $query4 = 'UPDATE fp_events_accounts SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);
            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET accept_status="Accepted" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET accept_status="Accepted" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET accept_status="Accepted" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $res = $db->query($query3);
            $query4 = 'UPDATE fp_events_accounts SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET accept_status="Accepted" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_markasdeclined()
    {
        global $db;

        $ids = $_POST['id'];
        $entire_list = $_POST['entire_list'];
        $event_id = $_POST['event_id'];

        if ($entire_list != '1') {

            $contacts = explode(',', $ids);

            foreach ($contacts as $contact) {

                $query = 'UPDATE fp_events_contacts_c SET accept_status="Declined" WHERE fp_events_contactsfp_events_ida="' . $event_id . '" AND fp_events_contactscontacts_idb="' . $contact . '"';
                $db->query($query);
                //update Leads query
                $query2 = 'UPDATE fp_events_leads_1_c SET accept_status="Declined" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '" AND fp_events_leads_1leads_idb="' . $contact . '"';
                $res = $db->query($query2);
                $db->query($query2);
                //update targets query
//                $query3 = 'UPDATE fp_events_prospects_1_c SET accept_status="Declined" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'" AND fp_events_prospects_1prospects_idb="'.$contact.'"';
//                $res = $db->query($query3);

                $query4 = 'UPDATE fp_events_accounts SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '" AND account_id="' . $contact . '"';
                $db->query($query4);
                $query5 = 'UPDATE fp_events_osy_other_contacts SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '" AND osy_other_contacts_id="' . $contact . '"';
                $db->query($query5);
                $query6 = 'UPDATE fp_events_contactspotentialmember SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '" AND osy_contactspotentialmember_id="' . $contact . '"';
                $db->query($query6);
            }
        } else if ($entire_list == '1') { //updates all records

            //update contacts query
            $query = 'UPDATE fp_events_contacts_c SET accept_status="Declined" WHERE fp_events_contactsfp_events_ida="' . $event_id . '"';
            $db->query($query);
            //update Leads query
            $query2 = 'UPDATE fp_events_leads_1_c SET accept_status="Declined" WHERE fp_events_leads_1fp_events_ida="' . $event_id . '"';
            $db->query($query2);
            //update targets query
//            $query3 = 'UPDATE fp_events_prospects_1_c SET accept_status="Declined" WHERE fp_events_prospects_1fp_events_ida="'.$event_id.'"';
//            $res = $db->query($query3);

            $query4 = 'UPDATE fp_events_accounts SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query4);
            $query5 = 'UPDATE fp_events_osy_other_contacts SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query5);
            $query6 = 'UPDATE fp_events_contactspotentialmember SET accept_status="Declined" WHERE fp_event_id="' . $event_id . '"';
            $db->query($query6);
        }
    }

    public function action_set_pay_costs()
    {
        global $db;
        $aIds = explode(',', $_POST['id']);
        $entire_list = $_POST['entire_list'];
        $aTargetModules = explode(',', $_POST['osy_target_module']);

        $sSet = '';
        $aSet = array();
        if ($_POST['payment_status'] != '') {
            $aSet[] = ' payment_status = ' . $_POST['payment_status'];
        }
        if ($_POST['costs'] != '') {
            $aSet[] = ' cost = ' . $_POST['costs'];
        }
        if (!empty($aSet)) {
            $sSet = implode(',', $aSet);
        }
        if ($sSet != '') {
            if ($entire_list != '1') {
                for ($i = 0; $i <= count($aIds) - 1; $i++) {
                    switch ($aTargetModules[$i]) {
                        case 'Accounts':
                            $q = "UPDATE fp_events_accounts SET " . $sSet . " WHERE account_id = '" . $aIds[$i] . "' AND fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                            $db->query($q);
                            break;
                        case 'Leads':
                            $q = "UPDATE fp_events_leads_1_c SET " . $sSet . " WHERE fp_events_leads_1leads_idb = '" . $aIds[$i] . "' AND fp_events_leads_1fp_events_ida = '" . $_POST['event_id'] . "' AND deleted = 0";
                            $db->query($q);
                            break;
                        case 'Contacts':
                            $q = "UPDATE  fp_events_contacts_c SET " . $sSet . " WHERE fp_events_contactscontacts_idb = '" . $aIds[$i] . "' AND fp_events_contactsfp_events_ida = '" . $_POST['event_id'] . "' AND deleted = 0";
                            $db->query($q);
                            break;
                        case 'osy_contactspotentialmember':
                            $q = "UPDATE  fp_events_contactspotentialmember SET " . $sSet . " WHERE osy_contactspotentialmember_id = '" . $aIds[$i] . "' AND fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                            $db->query($q);
                            break;
                        case 'osy_other_contacts':
                            $q = "UPDATE  fp_events_osy_other_contacts SET " . $sSet . " WHERE osy_other_contacts_id = '" . $aIds[$i] . "' AND fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                            $db->query($q);
                            break;
                    }
                }
            }
            else if ($entire_list == '1') { //updates all records
                $q = "UPDATE fp_events_accounts SET " . $sSet . " WHERE fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                $db->query($q);

                $q = "UPDATE fp_events_leads_1_c SET " . $sSet . " WHERE fp_events_leads_1fp_events_ida = '" . $_POST['event_id'] . "' AND deleted = 0";
                $db->query($q);

                $q = "UPDATE fp_events_contacts_c SET " . $sSet . " WHERE fp_events_contactsfp_events_ida = '" . $_POST['event_id'] . "' AND deleted = 0";
                $db->query($q);

                $q = "UPDATE fp_events_contactspotentialmember SET " . $sSet . " WHERE fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                $db->query($q);

                $q = "UPDATE fp_events_osy_other_contacts SET " . $sSet . " WHERE fp_event_id = '" . $_POST['event_id'] . "' AND deleted = 0";
                $db->query($q);
            }
        }
    }

    public function action_add_to_list()
    {

        $ids = $_POST['subpanel_id'];
        $event_id = $_POST['return_id'];
        $type = $_POST['pop_up_type'];


        if (!is_array($ids)) {

            $ids = array($ids);

        }
        if ($type == 'target_list') {

            foreach ($ids as $list) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('accounts');
                $event->load_relationship('fp_events_contacts');
                $event->load_relationship('fp_events_leads_1');
                $event->load_relationship('osy_contactspotentialmember');
                $event->load_relationship('osy_other_contacts');

                $target_list = new ProspectList();
                $target_list->retrieve($list);
                $target_list->load_relationship('accounts');
                $target_list->load_relationship('contacts');
                $target_list->load_relationship('leads');
                $target_list->load_relationship('osy_contactspotentialmember_link');
                $target_list->load_relationship('osy_other_contacts_link');


                //add prospects/targets
                foreach ($target_list->accounts->getBeans() as $contact) {

                    $contact_id_list = $event->accounts->get();

                    if (!in_array($contact->id, $contact_id_list)) { //check if its already related

                        $event->accounts->add($contact->id);
                    }
                }
                //add contacts
                foreach ($target_list->contacts->getBeans() as $contact) {

                    $contact_id_list = $event->fp_events_contacts->get();

                    if (!in_array($contact->id, $contact_id_list)) {

                        $event->fp_events_contacts->add($contact->id);
                    }
                }
                //add leads
                foreach ($target_list->leads->getBeans() as $contact) {

                    $contact_id_list = $event->fp_events_leads_1->get();

                    if (!in_array($contact->id, $contact_id_list)) {

                        $event->fp_events_leads_1->add($contact->id);
                    }
                }
                //add osy_contactspotentialmember
                foreach ($target_list->osy_contactspotentialmember_link->getBeans() as $contact) {

                    $contact_id_list = $event->osy_contactspotentialmember->get();

                    if (!in_array($contact->id, $contact_id_list)) {

                        $event->osy_contactspotentialmember->add($contact->id);
                    }
                }
                //add osy_other_contacts
                foreach ($target_list->osy_other_contacts_link->getBeans() as $contact) {

                    $contact_id_list = $event->osy_other_contacts->get();

                    if (!in_array($contact->id, $contact_id_list)) {

                        $event->osy_other_contacts->add($contact->id);
                    }
                }
            }
        } elseif ($type == 'accounts') {

            foreach ($ids as $account) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('accounts');

                $contact_id_list = $event->accounts->get();//get array of currently linked targets

                if (!in_array($account, $contact_id_list)) { //check if its already in the array

                    $event->accounts->add($account);//if not add relationship
                }
            }
        } elseif ($type == 'osy_contactspotentialmember') {

            foreach ($ids as $osy_contactspotentialmember) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('osy_contactspotentialmember');

                $contact_id_list = $event->osy_contactspotentialmember->get();//get array of currently linked targets

                if (!in_array($osy_contactspotentialmember, $contact_id_list)) { //check if its already in the array

                    $event->osy_contactspotentialmember->add($osy_contactspotentialmember);//if not add relationship
                }
            }
        } elseif ($type == 'osy_other_contacts') {

            foreach ($ids as $osy_other_contacts) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('osy_other_contacts');

                $contact_id_list = $event->osy_other_contacts->get();//get array of currently linked targets

                if (!in_array($osy_other_contacts, $contact_id_list)) { //check if its already in the array

                    $event->osy_other_contacts->add($osy_other_contacts);//if not add relationship
                }
            }
        } //leads
        elseif ($type == 'leads') {

            foreach ($ids as $lead) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('fp_events_leads_1');

                $contact_id_list = $event->fp_events_leads_1->get();//get array of currently linked leads

                if (!in_array($lead, $contact_id_list)) { //check if its already in the array

                    $event->fp_events_leads_1->add($lead);//if not add relationship
                }
            }
        } //contacts
        elseif ($type == 'contacts') {

            foreach ($ids as $contact) {

                $event = new FP_events();
                $event->retrieve($event_id);
                $event->load_relationship('fp_events_contacts');

                $contact_id_list = $event->fp_events_contacts->get(); //get array of currently linked contacts

                if (!in_array($contact, $contact_id_list)) {

                    $event->fp_events_contacts->add($contact);
                }
            }
        }

        die();
    }

    public function action_sendinvitemails()
    {
        global $db;
        global $sugar_config;
        global $mod_strings;

        $id = $_GET['record'];
        //get event
        $event = BeanFactory::getBean('FP_events',$id);

        $emailTemp = new EmailTemplate();
        $emailTemp->disable_row_level_security = true;
        $emailTemp->retrieve($event->invite_templates);  //Use the ID value of the email template record

        //check email template is set, if not return error
        if($emailTemp->id == '')
        {
            SugarApplication::appendErrorMessage($mod_strings['LBL_ERROR_MSG_5']);
            SugarApplication::redirect("index.php?module=FP_events&return_module=FP_events&action=DetailView&record=".$event->id);
            die();
        }
        
        $q = "UPDATE fp_events SET schedule_email = 1 WHERE id = '".$event->id."'";
        $db->query($q);

        //Redirect with error message if all linked contacts have already been invited
        SugarApplication::appendErrorMessage($mod_strings['LBL_SCHEDULED_SUCCESS_MSG']);
        SugarApplication::redirect("index.php?module=FP_events&return_module=FP_events&action=DetailView&record=".$event->id);
    }
}
