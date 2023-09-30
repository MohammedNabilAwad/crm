<?php
//relazione n-n con Accounts
$dictionary["FP_events"]["fields"]["accounts"] = array(
    'name' => 'accounts',
    'type' => 'link',
    'relationship' => 'fp_events_accounts',
    'source' => 'non-db',
    'vname' => 'LBL_ACCOUNTS_TITLE',
);

//relazione n-n con osy_contactspotentialmember
$dictionary["FP_events"]["fields"]["osy_contactspotentialmember"] = array(
    'name' => 'osy_contactspotentialmember',
    'type' => 'link',
    'relationship' => 'fp_events_osy_contactspotentialmember',
    'source' => 'non-db',
    'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER_TITLE',
);

//relazione n-n con osy_other_contacts
$dictionary["FP_events"]["fields"]["osy_other_contacts"] = array(
    'name' => 'osy_other_contacts',
    'type' => 'link',
    'relationship' => 'fp_events_osy_other_contacts',
    'source' => 'non-db',
    'vname' => 'LBL_OSY_OTHER_CONTACTS_TITLE',
);


//Fields used on delegates export
$dictionary["FP_events"]["fields"]["name_for_export"] = array(
    'name' => 'name_for_export',
    'vname' => 'LBL_NAME_FOR_EXPORT',
    'type' => 'varchar',
    'source' => 'non-db',
);
$dictionary["FP_events"]["fields"]["module_type_export"] = array(
    'name' => 'module_type_export',
    'vname' => 'LBL_MODULE_TYPE_EXPORT',
    'type' => 'varchar',
    'source' => 'non-db',
);
$dictionary["FP_events"]["fields"]["contact_name_export"] = array(
    'name' => 'contact_name_export',
    'vname' => 'LBL_CONTACT_NAME_EXPORT',
    'type' => 'varchar',
    'source' => 'non-db',
);

$dictionary["FP_events"]["fields"]["schedule_email"] = array(
    'name' => 'schedule_email',
    'vname' => 'LBL_SCHEDULE_EMAIL',
    'type' => 'bool',
    'default' => '0',
);