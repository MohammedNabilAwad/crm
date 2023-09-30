<?php
if (!defined('sugarEntry') || !sugarEntry)
    die ('Not A Valid Entry Point');

class osyCustomFunctionProspectLists
{
// 	function osyBeforeRelationshipAdd($bean, $event, $arguments) {
// 		// controllo se è assegnato il group activity
// 		if ((isset ( $bean->osy_service_id ) && ! empty ( $bean->osy_service_id )) && (isset ( $bean->osy_service_name ) && ! empty ( $bean->osy_service_name ))) {
// 			switch (strtolower ( $arguments ['related_module'] )) {
// 				case 'contacts' :
// 					if ($bean->load_relationship ( 'accounts' )) {
// 						$oContact = BeanFactory::getBean ( 'Contacts', $arguments ['related_id'] );
// 						$oAccountList = $bean->accounts->getBeans ();
// 						if (isset ( $oContact->account_id ) && ! empty ( $oContact->account_id ))
// 							if (! isset ( $oAccountList [$oContact->account_id] ) || empty ( $oAccountList [$oContact->account_id] ))
// 								$bean->accounts->add ( BeanFactory::getBean ( 'Accounts', $oContact->account_id ) );
// 					}
// 					break;
// 				case 'osy_contactspotentialmember' :
// 					if ($bean->load_relationship ( 'leads' )) {
// 						$oPotentialContact = BeanFactory::getBean ( 'osy_contactspotentialmember', $arguments ['related_id'] );
// 						$oAccountList = $bean->leads->getBeans ();
// 						if (isset ( $oPotentialContact->lead_id ) && ! empty ( $oPotentialContact->lead_id ))
// 							if (! isset ( $oAccountList [$oPotentialContact->lead_id] ) || empty ( $oAccountList [$oPotentialContact->lead_id] ))
// 								$bean->leads->add ( BeanFactory::getBean ( 'Leads', $oPotentialContact->lead_id ) );
// 					}
// 					break;
// 			}
// 		}
// 	}
    function osyAfterRelationshipAdd($bean, $event, $arguments)
    {
        // OPENSYMBOLMOD - START - davide.dallapozza - 21/mar/2014
        // *************************************************
        // Se aggiungo la un record alla relazione osy_contactspotentialmember e ProspectLists, inserisco un record nella tabella prospect_lists_prospects
        if ($arguments ['related_module'] == 'osy_contactspotentialmember' && $_REQUEST['isDuplicate'] != '1' && empty($_REQUEST['duplicateId'])) {
            global $db;
            $q = "INSERT INTO prospect_lists_prospects (id, prospect_list_id, related_id, related_type, date_modified, deleted) VALUES (UUID(), '" . $arguments ['id'] . "', '" . $arguments ['related_id'] . "', 'osy_contactspotentialmember', NOW(), 0)";
            $db->query($q);
        }

        // OPENSYMBOLMOD - END - davide.dallapozza
        // *************************************************

        if ($bean->load_relationship('accounts')) {
            $oContact = BeanFactory::getBean('Contacts', $arguments ['related_id']);
            $oAccountList = $bean->accounts->getBeans();
            if (isset ($oContact->account_id) && !empty ($oContact->account_id)) {
                global $db;
                $q = "UPDATE prospect_lists_prospects SET account_id ='" . $oContact->account_id . "' WHERE prospect_list_id = '" . $bean->id . "' AND related_id= '" . $oContact->id . "' AND deleted = 0";
                $db->query($q);
            }
        }

        //OPENSYMBOLMOD START rahat.ali (28/mag/2014  10:44:32)
        //*****************************************************
        // Se aggiungo la un record alla relazione osy_other_contacts e ProspectLists, inserisco un record nella tabella prospect_lists_prospects
        if ($arguments ['related_module'] == 'osy_other_contacts'  && $_REQUEST['isDuplicate'] != '1' && empty($_REQUEST['duplicateId'])) {
            global $db;
            $q = "INSERT INTO prospect_lists_prospects (id, prospect_list_id, related_id, related_type, date_modified, deleted) VALUES (UUID(), '" . $arguments ['id'] . "', '" . $arguments ['related_id'] . "', 'osy_other_contacts', NOW(), 0)";
            $db->query($q);
        }
        //*****************************************************
        //OPENSYMBOLMOD END   rahat.ali (28/mag/2014  10:44:36)

    }

    // OPENSYMBOLMOD - START - davide.dallapozza - 21/mar/2014
    // *************************************************
    // imposto il campo deleted ad 1 in base alla relazione eliminata
    function osyAfterRelationshipDelete($bean, $event, $arguments)
    {
        // Imposto deleted a 1 nella tabella prospect_lists_prospects se rimossa la relazione standard
        if ($arguments ['related_module'] == 'osy_contactspotentialmember') {
            global $db;
            $q = "UPDATE prospect_lists_prospects SET deleted = 1 WHERE related_type = 'osy_contactspotentialmember' AND related_id = '" . $arguments ['related_id'] . "' AND prospect_list_id = '" . $arguments ['id'] . "'";
            $db->query($q);
        }

        //OPENSYMBOLMOD START rahat.ali (28/mag/2014  10:47:24)
        //*****************************************************
        // Imposto deleted a 1 nella tabella prospect_lists_prospects se rimossa la relazione standard
        if ($arguments ['related_module'] == 'osy_other_contacts') {
            global $db;
            $q = "UPDATE prospect_lists_prospects SET deleted = 1 WHERE related_type = 'osy_other_contacts' AND related_id = '" . $arguments ['related_id'] . "' AND prospect_list_id = '" . $arguments ['id'] . "'";
            $db->query($q);
        }
        //*****************************************************
        //OPENSYMBOLMOD END   rahat.ali (28/mag/2014  10:47:29)

        // Imposto deleted a 1 nella tabella prospectlist_osy_contactspotentialmember se rimosso il record nella tabella prospect_lists_prospects
        if ($arguments ['related_module'] == 'osy_gestione_pagamento') {
            global $db;
            $q = "UPDATE prospectlist_osy_contactspotentialmember SET deleted = 1 WHERE prospectlist_id = '" . $arguments ['id'] . "' AND contactpotentialmember_id IN ( SELECT related_id FROM prospect_lists_prospects WHERE related_type='osy_contactspotentialmember' AND id =  '" . $arguments ['related_id'] . "')";
            $db->query($q);
        }
    }

    // OPENSYMBOLMOD - END - davide.dallapozza
    // *************************************************


    function osyAfterSave(&$bean, $event, $arguments)
    {
        if(!empty($_REQUEST['duplicateId']) && $_REQUEST['duplicateSave'] == 'true' && !empty($bean->old_modified_by_name)) {
            global $db;
            //rel osy_other_contacts
            $oProspectLists = BeanFactory::getBean('ProspectLists', $_REQUEST['duplicateId']);
            if ($oProspectLists->load_relationship('osy_other_contacts_link')) {
                $oOsyOtherContactsList = $oProspectLists->osy_other_contacts_link->getBeans();

                foreach($oOsyOtherContactsList as $oOsyOtherContact){
                    $bean->load_relationship('osy_other_contacts_link');
                    $bean->osy_other_contacts_link->add($oOsyOtherContact->id);
                }
            }

            //rel osy_contactspotentialmember
            if ($oProspectLists->load_relationship('osy_contactspotentialmember_link')) {
                $oOsyContactspotentialmembers = $oProspectLists->osy_contactspotentialmember_link->getBeans();

                foreach($oOsyContactspotentialmembers as $oOsyContactspotentialmember){
                    $bean->load_relationship('osy_contactspotentialmember_link');
                    $bean->osy_contactspotentialmember_link->add($oOsyContactspotentialmember->id);
                }
            }

        }
    }
}