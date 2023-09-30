<?php
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