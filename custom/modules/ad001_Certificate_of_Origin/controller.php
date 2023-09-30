<?php

require_once('include/MVC/Controller/SugarController.php');

class ad001_Certificate_of_OriginController extends SugarController
{

    public function action_editview()
    {
        $this->changeValues();

    }


    function changeValues()
    {

        global $mod_string;

        $this->view = 'edit';
        $GLOBALS['view'] = $this->view;

        if (isset($_REQUEST['relate_id'])) {

            $query = "SELECT * FROM accounts WHERE id = '{$_REQUEST['relate_id']}'";
            $result = $this->bean->db->query($query, true);
            $row = $this->bean->db->fetchByAssoc($result);

            $query2 = "SELECT * FROM accounts_cstm WHERE id_c = '{$_REQUEST['relate_id']}'";
            $result2 = $this->bean->db->query($query2, true);
            $row2 = $this->bean->db->fetchByAssoc($result2);

            $query3 = "SELECT * FROM leads WHERE id = '{$_REQUEST['relate_id']}'";
            $result3 = $this->bean->db->query($query3, true);
            $row3 = $this->bean->db->fetchByAssoc($result3);

            $query4 = "SELECT * FROM leads_cstm WHERE id_c = '{$_REQUEST['relate_id']}'";
            $result4 = $this->bean->db->query($query4, true);
            $row4 = $this->bean->db->fetchByAssoc($result4);

            if ($_REQUEST['relate_to'] == 'accounts_ad001_certificate_of_origin_1') {
                $this->bean->exporter_address_c = $row['billing_address_street'];
                $this->bean->exporter_address_city_c = $row['billing_address_city'];
                $this->bean->exporter_address_state_c = $row['billing_address_state'];
                $this->bean->exporter_address_postalcode_c = $row['billing_address_postalcode'];
                $this->bean->exporter_address_country_c = $row['billing_address_country'];
                $this->bean->accounts_ad001_certificate_of_origin_1_name = $row['name'];
                $this->bean->accounts_ad001_certificate_of_origin_1accounts_ida = $row['id'];
                $this->bean->exporter_name_english_c = $row2['english_name_c'];
                $this->bean->exporter_phone_office_c = $row2['phone_office'];
                $this->bean->exporter_phone_mobile_c = $row2['phone_mobile_c'];
                $this->bean->exporter_phone_fax_c = $row2['phone_fax'];
                $this->bean->exporter_email_address_c = $row2['email1'];
            } else if ($_REQUEST['relate_to'] == 'accounts_ad001_certificate_of_origin_2') {
                $this->bean->manufacturer_addr_c = $row['billing_address_street'];
                $this->bean->manufacturer_addr_city_c = $row['billing_address_city'];
                $this->bean->manufacturer_addr_state_c = $row['billing_address_state'];
                $this->bean->manufacturer_addr_postalcode_c = $row['billing_address_postalcode'];
                $this->bean->manufacturer_addr_country_c = $row['billing_address_country'];
                $this->bean->accounts_ad001_certificate_of_origin_2_name = $row['name'];
                $this->bean->accounts_ad001_certificate_of_origin_2accounts_ida = $row['id'];
                $this->bean->manufacturer_name_english_c = $row2['english_name_c'];
                $this->bean->manufacturer_phone_office_c = $row2['phone_office'];
                $this->bean->manufacturer_phone_mobile_c = $row2['phone_mobile_c'];
                $this->bean->manufacturer_phone_fax_c = $row2['phone_fax'];
                $this->bean->manufacturer_email_address_c = $row2['email1'];
            } else if ($_REQUEST['relate_to'] == 'leads_ad001_certificate_of_origin_1') {
                $this->bean->exporter_address_c = $row3['primary_address_street'];
                $this->bean->exporter_address_city_c = $row3['primary_address_city'];
                $this->bean->exporter_address_state_c = $row3['primary_address_state'];
                $this->bean->exporter_address_postalcode_c = $row3['primary_address_postalcode'];
                $this->bean->exporter_address_country_c = $row3['primary_address_region_c'];
                $this->bean->leads_ad001_certificate_of_origin_1_name = $row3['name'];
                $this->bean->leads_ad001_certificate_of_origin_1leads_ida = $row3['id'];
                $this->bean->exporter_name_english_c = $row4['english_name_c'];
                $this->bean->exporter_phone_office_c = $row4['phone_work'];
                $this->bean->exporter_phone_mobile_c = $row4['phone_mobile'];
                $this->bean->exporter_phone_fax_c = $row4['phone_fax'];
                $this->bean->exporter_email_address_c = $row4['email1'];
            } else if ($_REQUEST['relate_to'] == 'leads_ad001_certificate_of_origin_2') {
                $this->bean->manufacturer_addr_c = $row3['primary_address_street'];
                $this->bean->manufacturer_addr_city_c = $row3['primary_address_city'];
                $this->bean->manufacturer_addr_state_c = $row3['primary_address_state'];
                $this->bean->manufacturer_addr_postalcode_c = $row3['primary_address_postalcode'];
                $this->bean->manufacturer_addr_country_c = $row3['primary_address_region_c'];
                $this->bean->leads_ad001_certificate_of_origin_2_name = $row3['name'];
                $this->bean->leads_ad001_certificate_of_origin_2leads_ida = $row3['id'];
                $this->bean->manufacturer_name_english_c = $row4['english_name_c'];
                $this->bean->manufacturer_phone_office_c = $row4['phone_work'];
                $this->bean->manufacturer_phone_mobile_c = $row4['phone_mobile'];
                $this->bean->manufacturer_phone_fax_c = $row4['phone_fax'];
                $this->bean->manufacturer_email_address_c = $row4['email1'];
            }
        }
    }
}