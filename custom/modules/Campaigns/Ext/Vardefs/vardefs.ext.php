<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2013-07-15 10:18:52
$dictionary['Campaign']['fields']['end_date']['required']=false;
$dictionary['Campaign']['fields']['end_date']['comments']='Ending date of the campaign';
$dictionary['Campaign']['fields']['end_date']['merge_filter']='disabled';

 

$dictionary['Campaign']['fields']['osy_other_contacts'] = array(
    'name' => 'osy_other_contacts',
    'type' => 'link',
    'relationship' => 'campaign_osy_other_contacts',
    'source' => 'non-db',
    'vname' => 'LBL_OSY_OTHER_CONTACTS',
    'link_class' => 'ProspectLink',
    'link_file' => 'modules/Campaigns/ProspectLink.php',
);
$dictionary['Campaign']['fields']['osy_contactspotentialmember'] = array(
    'name' => 'osy_contactspotentialmember',
    'type' => 'link',
    'relationship' => 'campaign_osy_contactspotentialmember',
    'source' => 'non-db',
    'vname' => 'LBL_OSY_CONTACTSPOTENTIALMEMBER',
    'link_class' => 'ProspectLink',
    'link_file' => 'modules/Campaigns/ProspectLink.php',
);

 // created: 2013-07-15 10:17:49
$dictionary['Campaign']['fields']['status']['comments']='Status of the campaign';
$dictionary['Campaign']['fields']['status']['merge_filter']='disabled';
$dictionary['Campaign']['fields']['status']['required']=false;

 
?>