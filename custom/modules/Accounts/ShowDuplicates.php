<?php

if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/osyFileEdit.php');
$aCodeHooks = array(
 array(
 'orig' => '/select id, name, website, billing_address_city  from accounts /',
 'new' => 'select id, name, company_id_or_vat, website, billing_address_city  from accounts ',
 ),
);

$sFilePath = file_edit('modules/Accounts/ShowDuplicates.php', $aCodeHooks, '', 'accounts');
if(file_exists($sFilePath)) {
 require_once($sFilePath);
}

?>