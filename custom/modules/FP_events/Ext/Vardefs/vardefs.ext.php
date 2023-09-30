<?php 
 //WARNING: The contents of this file are auto-generated


$dictionary["FP_events"]["fields"]["num_attended"] = array(
    'name' => 'num_attended',
    'vname' => 'LBL_NUM_ATTENDED',
    'type' => 'int',
    'len' => '11',
    'required' => false,
    'importable' => false,
    'readonly' => true,
);
 

$dictionary["FP_events"]["fields"]["num_declined"] = array(
    'name' => 'num_declined',
    'vname' => 'LBL_NUM_DECLINED',
    'type' => 'int',
    'len' => '11',
    'required' => false,
    'importable' => false,
    'readonly' => true,
);


// created: 2013-04-25 10:18:48
//$dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1"] = array (
//  'name' => 'fp_event_locations_fp_events_1',
//  'type' => 'link',
//  'relationship' => 'fp_event_locations_fp_events_1',
//  'source' => 'non-db',
//  'vname' => 'LBL_FP_EVENT_LOCATIONS_FP_EVENTS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
//  'id_name' => 'fp_event_locations_fp_events_1fp_event_locations_ida',
//);
//$dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1_name"] = array (
//  'name' => 'fp_event_locations_fp_events_1_name',
//  'type' => 'relate',
//  'source' => 'non-db',
//  'vname' => 'LBL_FP_EVENT_LOCATIONS_FP_EVENTS_1_FROM_FP_EVENT_LOCATIONS_TITLE',
//  'save' => true,
//  'id_name' => 'fp_event_locations_fp_events_1fp_event_locations_ida',
//  'link' => 'fp_event_locations_fp_events_1',
//  'table' => 'fp_event_locations',
//  'module' => 'FP_Event_Locations',
//  'rname' => 'name',
//);
//$dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1fp_event_locations_ida"] = array (
//  'name' => 'fp_event_locations_fp_events_1fp_event_locations_ida',
//  'type' => 'link',
//  'relationship' => 'fp_event_locations_fp_events_1',
//  'source' => 'non-db',
//  'reportable' => false,
//  'side' => 'right',
//  'vname' => 'LBL_FP_EVENT_LOCATIONS_FP_EVENTS_1_FROM_FP_EVENTS_TITLE',
//);
unset( $dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1"] );
unset( $dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1_name"] );
unset( $dictionary["FP_events"]["fields"]["fp_event_locations_fp_events_1fp_event_locations_ida"] );
$dictionary["FP_events"]["fields"]["location"] = array (
  'name' => 'location',
  'type' => 'varchar',
  'vname' => 'LBL_LOCATION',
);


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

$dictionary["FP_events"]["fields"]["num_participants"] = array(
    'name' => 'num_participants',
    'vname' => 'LBL_NUM_PARTICIPANTS',
    'type' => 'int',
    'len' => '11',
    'required' => false,
    'importable' => false,
    'readonly' => true,
);
 

$dictionary["FP_events"]["fields"]["num_no_response"] = array(
    'name' => 'num_no_response',
    'vname' => 'LBL_NUM_NO_RESPONSE',
    'type' => 'int',
    'len' => '11',
    'required' => false,
    'importable' => false,
    'readonly' => true,
);
 

$dictionary["FP_events"]["fields"]["num_tot_delegates"] = array(
    'name' => 'num_tot_delegates',
    'vname' => 'LBL_NUM_TOT_DELEGATES',
    'type' => 'int',
    'len' => '11',
    'required' => false,
    'importable' => false,
    'readonly' => true,
);
 

 // created: 2023-07-30 19:04:36
$dictionary['FP_events']['fields']['new_number_no_response_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['new_number_no_response_c']['labelValue']='Number of no response:';

 

 // created: 2023-07-30 19:09:23
$dictionary['FP_events']['fields']['number_participants_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['number_participants_c']['labelValue']='Number of participants:';

 

 // created: 2023-07-30 19:05:35
$dictionary['FP_events']['fields']['number_declined_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['number_declined_c']['labelValue']='Number of declined:';

 

 // created: 2023-07-30 18:59:31
$dictionary['FP_events']['fields']['new_num_attended_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['new_num_attended_c']['labelValue']='Num Attended';

 

 // created: 2023-07-30 19:03:25
$dictionary['FP_events']['fields']['num_to_delegates_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['num_to_delegates_c']['labelValue']='Number of the delegates (globally):';

 

 // created: 2023-07-30 19:06:23
$dictionary['FP_events']['fields']['number_attended_c']['inline_edit']='1';
$dictionary['FP_events']['fields']['number_attended_c']['labelValue']='Number of attended:';

 
?>