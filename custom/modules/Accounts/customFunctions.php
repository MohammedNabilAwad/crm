<?php

class osyCustomFunctionAccounts
{
    function osyBeforeSave(&$bean)
    {
        // solo in creazione
        if (!isset ($bean->fetched_row ['id']) && empty ($bean->fetched_row ['id'])) {
            if (!empty ($_REQUEST ['action']) && $_REQUEST ['action'] == 'ConvertLead') {
                // Create a lead Object using lead id (record) present in REQUEST
                $lead = new $GLOBALS ['beanList'] ['Leads'] ();
                $lead->retrieve($_REQUEST ['record']);

                // Check wether an oppotunity is linked witth lead or not
                if (!empty ($lead->opportunities_1_id)) {
                    // Load relationship between Accounts and opportunities
                    $bean->load_relationship('opportunities');

                    // Grab associato Opportunity Id and
                    // Add oppotrunity linked with lead to current account
                    $bean->opportunities->add($lead->opportunities_1_id);
                }
                $this->match_accounts($lead, $bean);
            }
        }

        if (isset ($bean->industry) && !empty ($bean->industry)) {
            $bean->load_relationship('contacts');
            $oContactList = $bean->contacts->getBeans();
            foreach ($oContactList as $oContact) {
                if ($oContact->industry != $bean->industry) {
                    // salvo il contact solo se serve, altrimenti rischiamo una ricorsione,
                    // infatti c'è un before save anche per i contact che richiama il save degli account.

                    $q_industry = "UPDATE contacts SET industry = " . $oContact->db->quoted($bean->industry) . " WHERE id = '{$oContact->id}'";
                    $r_industry = $oContact->db->query($q_industry);
                }
            }
        }

        $this->_set_membership_status($bean, true, true);

        if (empty($bean->osy_account_code)) {
            $bean->osy_account_code = $bean->db->getOne("SELECT MAX(osy_account_code) FROM {$bean->table_name} WHERE deleted = 0") + 1;
        }
    }

    function osyAfterSave(&$bean, $event, $arguments)
    {
        if (!isset ($bean->fetched_row ['id']) && empty ($bean->fetched_row ['id']))
            if (!empty ($_REQUEST ['action']) && $_REQUEST ['action'] == 'ConvertLead')
                if (isset ($_REQUEST ['record']) && !empty ($_REQUEST ['record'])) {
                    if (!isset($bean->osyFromConvertLead) || !$bean->osyFromConvertLead) {
                        $bean->new_with_id = false;
                        $this->match_contacts($_REQUEST ['record'], $bean, true); // l'ultimo parametro serve per valorizzare osyFromConvertLead
                    }
                }
    }

    public function match_accounts($oLead, $oAccount)
    {
        $oAccount->phone_office = $oLead->phone_work;
        $oAccount->lead_source = $oLead->lead_source;
        $oAccount->member_type = $oLead->member_type;
        $oAccount->company_id_or_vat = $oLead->potential_company_id_c;
        $oAccount->other_company_number = $oLead->other_company_number_c;
        $oAccount->other = $oLead->other;
        $oAccount->industry = $oLead->industry;
        $oAccount->employees = $oLead->employees;
        $oAccount->ownership = $oLead->ownership;
        $oAccount->total_salary_wage_bill = $oLead->total_salary_wage_bill;
        $oAccount->nr_employees_at = $oLead->nr_employees_at;
        $oAccount->date_employees_at = $oLead->date_employees_at;
        $oAccount->association_member_type = $oLead->association_member_type;
        $oAccount->territorial = $oLead->territorial;
        $oAccount->nr_company_members = $oLead->nr_company_members;
        $oAccount->membership_status = $oLead->membership_status;
        $oAccount->payment_status = $oLead->payment_status;
        $oAccount->type_of_potential_members = $oLead->type_of_potential_members;
        $oAccount->type_of_potential_members = $oLead->other_company_number_c;
        $oAccount->annual_revenue = $oLead->annual_revenue;
        $oAccount->unionization_c = $oLead->unionization_c;
        $oAccount->size_c = $oLead->size_c;
        $oAccount->male_employees_c = $oLead->nr_male_employees_c;
        $oAccount->female_employees_c = $oLead->nr_female_employees_c;
        $oAccount->nr_permanent = $oLead->nr_permanent;
        $oAccount->nr_no_permanent_c = $oLead->nr_no_permanent_c;
        $oAccount->other_info_employees_c = $oLead->other_info_about_staff_c;
        $oAccount->type_of_business = $oLead->type_of_business;
        $oAccount->products_and_services = $oLead->products_and_services;
        $oAccount->five_main_operating_markets = $oLead->five_main_operating_markets;
        $oAccount->target_exporting_market = $oLead->target_exporting_market_c;
        $oAccount->billing_address_street = $oLead->primary_address_street;
        $oAccount->billing_address_city = $oLead->primary_address_city;
        $oAccount->billing_address_state = $oLead->primary_address_state;
        $oAccount->billing_address_pobox_c = $oLead->primary_address_pobox_c;
        $oAccount->billing_address_region_c = $oLead->primary_address_region_c;
        $oAccount->billing_address_postalcode = $oLead->primary_address_postalcode;
        $oAccount->billing_address_other = $oLead->primary_address_other;
        $oAccount->shipping_address_street = $oLead->alt_address_street;
        $oAccount->shipping_address_city = $oLead->alt_address_city;
        $oAccount->shipping_address_state = $oLead->alt_address_state;
        $oAccount->shipping_address_pobox_c = $oLead->alt_address_pobox_c;
        $oAccount->shipping_address_region_c = $oLead->alt_address_region_c;
        $oAccount->shipping_address_postalcode = $oLead->alt_address_postalcode;
        $oAccount->shipping_address_other = $oLead->alt_address_other;
    }

    public function match_contacts($lead_id, $oAccount, $osyFromConvertLead = false)
    {
        global $db;
        $query = "SELECT osy.id FROM leads l INNER JOIN osy_contactspotentialmember osy ON l.id = osy.lead_id WHERE l.deleted = 0 AND osy.deleted = 0 AND l.id = '$lead_id'";
        $r = $db->query($query);
        while ($v = $db->fetchByAssoc($r)) {
            $contact = new $GLOBALS ['beanList'] ['Contacts'] ();
            $oPotential = new $GLOBALS ['beanList'] ['osy_contactspotentialmember'] ();
            $oPotential->retrieve($v ["id"]);

            $contact->description = $oPotential->description;
            $contact->salutation = $oPotential->salutation;
            $contact->first_name = $oPotential->first_name;
            $contact->last_name = $oPotential->last_name;
            $contact->do_not_call = $oPotential->do_not_call;
            $contact->phone_work = $oPotential->phone_work;
            $contact->phone_fax = $oPotential->phone_fax;
            $contact->primary_address_street = $oPotential->primary_address_street;
            $contact->primary_address_city = $oPotential->primary_address_city;
            $contact->primary_address_state = $oPotential->primary_address_state;
            $contact->primary_address_postalcode = $oPotential->primary_address_postalcode;
            $contact->alt_address_street = $oPotential->alt_address_street;
            $contact->alt_address_city = $oPotential->alt_address_city;
            $contact->alt_address_state = $oPotential->alt_address_state;
            $contact->alt_address_postalcode = $oPotential->alt_address_postalcode;
            $contact->role_function = $oPotential->role_function;
            $contact->other_role_function = $oPotential->other_role_function;
            $contact->vip = $oPotential->vip;
            $contact->category = $oPotential->category;
            $contact->contact_type = $oPotential->contact_type;
            $contact->primary_address_other = $oPotential->primary_address_other;
            $contact->alt_address_other = $oPotential->alt_address_other;
            $contact->alt_address_pobox_c = $oPotential->alt_address_pobox_c;
            $contact->primary_address_pobox_c = $oPotential->primary_address_pobox_c;
            $contact->primary_address_region_c = $oPotential->primary_address_region_c;
            $contact->alt_address_region_c = $oPotential->alt_address_region_c;
            $contact->assigned_user_id = $oPotential->assigned_user_id;
            $contact->email1 = $oPotential->email1;
            $contact->email2 = $oPotential->email2;
            $contact->account_id = $oAccount->id;
            $contact->account_name = $oAccount->name;
            $contact->osyAccountFromConvertLead = $osyFromConvertLead;
            $contact->save();
            $oPotential->deleted = 1;
            $oPotential->save();
        }
    }

    function osyAfterRetrieve(&$bean, $event, $arguments)
    {
        if ($_REQUEST["action"] == "DetailView") {
            $this->_set_membership_status($bean, true, true);
            $this->osyCalculateBalance($bean, $event, $arguments);
        }
    }

    function osyCalculateBalance($bean, $event, $arguments)
    {
        global $db;
        require_once 'custom/include/osy_utils.php';
        $total_balance = osyGetTotalBalance($bean);
        $bean->total_balance = $total_balance;
        $q = "UPDATE accounts SET total_balance = '" . $bean->total_balance . "' WHERE id = '" . $bean->id . "'";
        $db->query($q);
    }

    /**
     * Questa funzione si occupa di controllare se il campo membership_status del bean sia
     * corretto rispetto al campo member_till. Esso contiene la data fino a cui l'account
     * è un membro. Allo scadere di tale data va modificato il valore del campo membership_status
     * @param object $bean
     * @param bool $bSetPaymentStatusImage , se true imposta l'img del semaforo da visualizzare
     * @param bool $bUpdateAccount , se true esegue subito una query a db per aggiornare il campo membership_status
     */
    function _set_membership_status(&$bean, $bSetPaymentStatusImage = FALSE, $bUpdateAccount = FALSE)
    {

        if ($bean->mark_as_closed) {
            $sImage = '&lt;img src="b.png" border="0" /&gt;';
            $bean->membership_status = "Closed";
            $qu_membership_status = "UPDATE accounts SET membership_status = 'Closed' WHERE id = '" . $bean->id . "'";
            $bean->payment_status = $sImage;
        } else if ($bean->member_till != '') {

            $date = date("Y-m-d");
            $oggi = new DateTime($date);
            $member_till_date_db_format = $GLOBALS["timedate"]->to_db_date($bean->member_till, false);
            $scadenza = new DateTime($member_till_date_db_format);
            $v = round(($oggi->format('U') - $scadenza->format('U')) / (60 * 60 * 24));

            $sImage = '';
            $qu_membership_status = '';

            if ($v < -30) {
                $sImage = '&lt;img src="G_new.png" border="0" /&gt;';
                if ($bean->membership_status != "Active") {
                    $bean->membership_status = "Active";
                    $qu_membership_status = "UPDATE accounts SET membership_status = 'Active' WHERE id = '" . $bean->id . "'";
                }
            } elseif ($v <= 0 && $v >= -30) {
                $sImage = '&lt;img src="Y_new.png" border="0" /&gt;';
                if ($bean->membership_status != "Expiring") {
                    $bean->membership_status = "Expiring";
                    $qu_membership_status = "UPDATE accounts SET membership_status = 'Expiring' WHERE id = '" . $bean->id . "'";
                }
            } elseif ($v > 0 && $v <= 90) {
                $sImage = '&lt;img src="O_new.png" border="0" /&gt;';
                if ($bean->membership_status != "Suspended") {
                    $bean->membership_status = "Suspended";
                    $qu_membership_status = "UPDATE accounts SET membership_status = 'Suspended' WHERE id = '" . $bean->id . "'";
                }
            } elseif ($v > 90) {
                $sImage = '&lt;img src="R_new.png" border="0" /&gt;';
                if ($bean->membership_status != "Elapsed") {
                    $bean->membership_status = "Elapsed";
                    $qu_membership_status = "UPDATE accounts SET membership_status = 'Elapsed' WHERE id = '" . $bean->id . "'";
                }
            }

            if ($bSetPaymentStatusImage) {
                $bean->payment_status = $sImage;
            }
            if ($bUpdateAccount && !empty($qu_membership_status)) {
                global $db;
                $db->query($qu_membership_status);
            }
        }
    }
}

?>