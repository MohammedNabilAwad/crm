<?php

    global $db;
    global $sugar_config;
    /*contacts variables*/
    $first_name = "";
    $last_name = "";
    $contact_id = "";
    $primary_address_street = "";
    $primary_address_city = "";
    $primary_address_state = "";
    $primary_address_postalcode = "";
    $primary_address_country = "";
    $email = "";
    $email_id = "";
    $check = "";
    /*account variables*/
    $billing_address_street ="";
    $billing_address_city="";
    $billing_address_state="";
    $billing_address_postalcode="";
    $billing_address_country="";
    $email_account="";
    $account_email_id="";
    $account_id="";

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        /*update contact record*/
        if(!empty($_POST['contact_id'])) {
            $contact_id = $_POST['contact_id'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $primary_address_street = $_POST['primary_address_street'];
            $primary_address_city = $_POST['primary_address_city'];
            $primary_address_state = $_POST['primary_address_state'];
            $primary_address_postalcode = $_POST['primary_address_postalcode'];
            $primary_address_country = $_POST['primary_address_country'];
            $email = $_POST['email1'];
            $email_id = $_POST['email_id'];

            $query = "UPDATE contacts SET first_name ='" . $first_name . "', last_name ='" . $last_name . "',";
            $query .= "primary_address_street = '" . $primary_address_street . "',";
            $query .= "primary_address_city = '" . $primary_address_city . "',";
            $query .= "primary_address_state = '" . $primary_address_state . "',";
            $query .= "primary_address_postalcode = '" . $primary_address_postalcode . "',";
            $query .= "primary_address_country = '" . $primary_address_country . "',";
            $query .= "osy_form_html_date_modified = SYSDATE() ";
            $query .= "WHERE id ='" . $contact_id . "'";
            $update = $db->query($query);
        }
        if(!empty($email_id)) {
            $query = "UPDATE email_addresses set email_address = '" . $email . "' WHERE id = '" . $email_id . "'";
            $update = $db->query($query);
        } else if ($email != "")
        {
            if ($email_id == "")
            {
                $query = "SELECT UUID() as id FROM dual";
                $result = $db->fetchOne($query);
                $email_id = $result['id'];
            }


            $query = "INSERT INTO emails_beans (id,email_id,bean_id,bean_module) 
                      VALUES (UUID(),'{$email_id}','{$contact_id}','Contacts')";
            $db->query($query);

            $query = "INSERT INTO email_addr_bean_rel (id,email_address_id,bean_id,bean_module,primary_address) 
                      VALUES (UUID(),'{$email_id}','{$contact_id}','Contacts',1)";
            $db->query($query);

            $query = "INSERT INTO email_addresses (id,email_address,email_address_caps) 
                      VALUES ('{$email_id}','{$email}',UPPER('{$email}'))";
            $db->query($query);
        }

        /*update account record*/
        if(!empty($_POST['account_id'])) {
            $billing_address_street = $_POST['billing_address_street'];
            $billing_address_city = $_POST['billing_address_city'];
            $billing_address_state = $_POST['billing_address_state'];
            $billing_address_postalcode = $_POST['billing_address_postalcode'];
            $billing_address_country = $_POST['billing_address_country'];
            $email_account = $_POST['email_account'];
            $account_email_id = $_POST['account_email_id'];
            $account_id = $_POST['account_id'];

            $query = "UPDATE accounts set billing_address_street = '" . $billing_address_street . "',";
            $query .= "billing_address_city = '" . $billing_address_city . "', billing_address_state = '" . $billing_address_state . "',";
            $query .= "billing_address_postalcode = '" . $billing_address_postalcode . "', billing_address_country='" . $billing_address_country . "',";
            $query .= "billing_address_country = '" . $billing_address_country . "',";
            $query .= "osy_form_html_date_modified_c = SYSDATE() ";
            $query .= "WHERE id = '" . $account_id . "'";
            $update = $db->query($query);
        }
        if(!empty($account_email_id)) {
            $query = "UPDATE email_addresses set email_address = '" . $email_account . "' WHERE id = '" . $account_email_id . "'";
            $update = $db->query($query);
        }else if ($email_account != "")
        {
            if ($account_email_id == "")
            {
                $query = "SELECT UUID() as id FROM dual";
                $result = $db->fetchOne($query);
                $account_email_id = $result['id'];
            }

            $query = "INSERT INTO emails_beans (id,email_id,bean_id,bean_module) 
                      VALUES (UUID(),'{$account_email_id}','{$account_id}','Accounts')";
            $db->query($query);

            $query = "INSERT INTO email_addr_bean_rel (id,email_address_id,bean_id,bean_module,primary_address) 
                      VALUES (UUID(),'{$account_email_id}','{$account_id}','Accounts',1)";
            $db->query($query);

            $query = "INSERT INTO email_addresses (id,email_address,email_address_caps) 
                      VALUES ('{$account_email_id}','{$email_account}',UPPER('{$email_account}'))";
            $db->query($query);
        }

        /*redirect*/
        $redirect_URL = $sugar_config['site_url']."/custom/modules/Campaigns/WebToLeadForm.html?end_submit=1";
        sugar_cleanup();
        $header_URL = "Location: $redirect_URL";
        SugarApplication::headerRedirect($header_URL);

    }
    else
    {

        /*query to populate web to lead form*/
        $identifier = $_GET['identifier'];
        $query="        SELECT cl.target_id, c.first_name, c.last_name, c.id, c.primary_address_street, c.primary_address_city,
                       c.primary_address_state, c.primary_address_postalcode, c.primary_address_country, ea.email_address as email,
                       ea.id as email_id, cstm.main_representative_c as check_contact,
                       a.billing_address_street,a.billing_address_city,a.billing_address_state,
                       a.billing_address_postalcode, a.billing_address_country, ea2.email_address as email_account,
                       a.id as account_id, ea2.id as account_email_id
                FROM campaign_log cl
                LEFT JOIN contacts c ON ( c.id = cl.target_id AND c.deleted = 0)
                LEFT JOIN contacts_cstm cstm ON ( cstm.id_c = c.id)
		        LEFT JOIN email_addr_bean_rel eb ON (eb.bean_id = c.id AND eb.deleted = 0)
		        LEFT JOIN email_addresses ea ON (ea.id = eb.email_address_id)
                LEFT JOIN accounts_contacts ac ON c.id = ac.contact_id and ac.deleted = 0
                LEFT JOIN accounts a ON a.id = ac.account_id and a.deleted = 0
                LEFT JOIN email_addr_bean_rel eb2 ON (eb2.bean_id = ac.account_id AND eb2.deleted = 0)
                LEFT JOIN email_addresses ea2 ON (ea2.id = eb2.email_address_id)
                 WHERE target_tracker_key = '" . $identifier . "'";

        $result=$db->query($query);



            while (($row=$db->fetchByAssoc($result)) != null) {
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $contact_id = $row['id'];
                $primary_address_street = $row['primary_address_street'];
                $primary_address_city = $row['primary_address_city'];
                $primary_address_state = $row['primary_address_state'];
                $primary_address_postalcode = $row['primary_address_postalcode'];
                $primary_address_country = $row['primary_address_country'];
                $email = $row['email'];
                $email_id = $row['email_id'];
                $check = $row['check_contact'];
                $billing_address_street =$row['billing_address_street'];
                $billing_address_city=$row['billing_address_city'];
                $billing_address_state=$row['billing_address_state'];
                $billing_address_postalcode=$row['billing_address_postalcode'];
                $billing_address_country=$row['billing_address_country'];
                $email_account=$row['email_account'];
                $account_email_id=$row['account_email_id'];
                $account_id = $row['account_id'];
            }

        /*params to pass with url*/
		$params = "?identifier=".$_GET['identifier']."&first_name=".urlencode($first_name)."&last_name=".urlencode($last_name)."&contact_id=".urlencode($contact_id);
		$params .= "&primary_address_street=".urlencode($primary_address_street)."&primary_address_city=".urlencode($primary_address_city);
		$params .= "&primary_address_state=".urlencode($primary_address_state)."&primary_address_postalcode=".urlencode($primary_address_postalcode);
		$params .= "&primary_address_country=".urlencode($primary_address_country)."&email=".urlencode($email)."&email_id=".urlencode($email_id)."&check=".urlencode($check);
		$params .= "&billing_address_street=".urlencode($billing_address_street)."&billing_address_city=".urlencode($billing_address_city)."&billing_address_state=".urlencode($billing_address_state);
		$params .= "&billing_address_postalcode=".urlencode($billing_address_postalcode)."&billing_address_country=".urlencode($billing_address_country);
		$params .= "&email_account=".urlencode($email_account)."&account_email_id=".urlencode($account_email_id)."&account_id=".urlencode($account_id);
		$params .= "&site_url=".urlencode($sugar_config['site_url']);


        /*redirect*/
        $redirect_URL = $sugar_config['site_url']."/custom/modules/Campaigns/WebToLeadForm.html".$params;
        sugar_cleanup();
        $header_URL = "Location: $redirect_URL";
        SugarApplication::headerRedirect($header_URL);
    }
