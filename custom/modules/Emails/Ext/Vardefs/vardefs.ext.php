<?php 
 //WARNING: The contents of this file are auto-generated

 

$dictionary["Email"]["fields"]['osy_other_contacts'] = array (
	'name'			=> 'osy_other_contacts',
	'vname'			=> 'LBL_EMAILS_ACCOUNTS_REL',
	'type'			=> 'link',
	'relationship'	=> 'emails_osy_other_contacts_rel',
	'module'		=> 'osy_other_contacts',
	'bean_name'		=> 'osy_other_contacts',
	'source'		=> 'non-db',
);
$dictionary["Email"]["fields"]['osy_contactspotentialmember'] = array (
	'name'			=> 'osy_other_contacts',
	'vname'			=> 'LBL_EMAILS_ACCOUNTS_REL',
	'type'			=> 'link',
	'relationship'	=> 'emails_osy_contactspotentialmember_rel',
	'module'		=> 'osy_contactspotentialmember',
	'bean_name'		=> 'osy_contactspotentialmember',
	'source'		=> 'non-db',
);



$dictionary['Email']['fields']['SecurityGroups'] = array (
  	'name' => 'SecurityGroups',
    'type' => 'link',
	'relationship' => 'securitygroups_emails',
	'module'=>'SecurityGroups',
	'bean_name'=>'SecurityGroup',
    'source'=>'non-db',
	'vname'=>'LBL_SECURITYGROUPS',
);





?>