<?php
function get_related_contacts($params)
{
    $bean = $GLOBALS['app']->controller->bean;

    $return_array['select'] = " SELECT fp_events.id ";
    $return_array['from'] = " FROM fp_events ";
    $return_array['join'] = " INNER JOIN  fp_events_contacts_c ON fp_events_contacts_c.fp_events_contactsfp_events_ida = fp_events.id AND fp_events_contacts_c.deleted = 0 ";
    $return_array['join'] .= " INNER JOIN accounts_contacts ac ON ac.contact_id = fp_events_contacts_c.fp_events_contactscontacts_idb AND ac.account_id = '".$bean->id."' AND ac.deleted = 0";
    return $return_array;
}
function get_related_accounts($params)
{
    $bean = $GLOBALS['app']->controller->bean;

    $return_array['select'] = " SELECT fp_events.id ";
    $return_array['from'] = " FROM fp_events ";
    $return_array['join'] = " JOIN  fp_events_accounts fpe_a ON fpe_a.fp_event_id = fp_events.id ";
    $return_array['where'] = " fpe_a.account_id = '" . $bean->id ."' AND fpe_a.deleted = 0";
    return $return_array;
}