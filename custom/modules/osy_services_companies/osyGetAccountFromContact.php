<?php
global $db,$current_user;
$aParams = array_map('html_entity_decode', $_REQUEST);

$q="SELECT a.id, a.name FROM accounts a INNER JOIN accounts_contacts ac ON ac.account_id = a.id WHERE ac.contact_id = '".$aParams['contact_id']."' AND ac.deleted = 0 AND a.deleted = 0";
$r=$db->query($q);
$v=$db->fetchByAssoc($r);

echo json_encode($v);