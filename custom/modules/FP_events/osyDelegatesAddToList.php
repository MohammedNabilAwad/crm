<?php

$oEvent = $this->bean;
$oProspectList = BeanFactory::getBean( 'ProspectLists', $_REQUEST['prospect_list_id'] );
if( !empty($oProspectList->id) ) {
    $sQuery = "
        SELECT 'accounts' link, account_id related_id
        FROM fp_events_accounts
        WHERE fp_event_id = '{$oEvent->id}'
        AND invite_status = 'Invited'
        AND accept_status = 'No Response'
        AND deleted = 0
        UNION
        SELECT 'contacts' link, fp_events_contactscontacts_idb related_id
        FROM fp_events_contacts_c
        WHERE fp_events_contactsfp_events_ida = '{$oEvent->id}'
        AND invite_status = 'Invited'
        AND accept_status = 'No Response'
        AND deleted = 0
        UNION
        SELECT 'leads' link, fp_events_leads_1leads_idb related_id
        FROM fp_events_leads_1_c
        WHERE fp_events_leads_1fp_events_ida = '{$oEvent->id}'
        AND invite_status = 'Invited'
        AND accept_status = 'No Response'
        AND deleted = 0
        UNION
        SELECT 'osy_other_contacts_link' link, osy_other_contacts_id related_id
        FROM fp_events_osy_other_contacts
        WHERE fp_event_id = '{$oEvent->id}'
        AND invite_status = 'Invited'
        AND accept_status = 'No Response'
        AND deleted = 0
        UNION
        SELECT 'osy_contactspotentialmember_link' link, osy_contactspotentialmember_id related_id
        FROM fp_events_contactspotentialmember
        WHERE fp_event_id = '{$oEvent->id}'
        AND invite_status = 'Invited'
        AND accept_status = 'No Response'
        AND deleted = 0
    ";

    if( $oRes = $oEvent->db->query( $sQuery ) ) {
        while( $aRow = $oEvent->db->fetchRow( $oRes ) ) {
            $sRelName = $aRow['link'];
            $oProspectList->load_relationship( $sRelName );
            $oProspectList->$sRelName->add( $aRow['related_id'] );
        } 
    }
    echo "completed";
} else {
    echo "empty prospect list";
}
    