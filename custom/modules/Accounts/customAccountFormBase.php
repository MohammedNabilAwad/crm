<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('custom/include/osyFileEdit.php');
$aCodeHooks = array(
 array(
 'orig' => '/select id, name, website, billing_address_city  from /',
 'new' => 'select id, name, website, billing_address_city, company_id_or_vat from ',
 ),
 array(
 'orig' => '/(\$query[\s\t]*=[\s\t]*\$baseQuery.*name[\s\t]*like.*\$_POST\[\$prefix\.\'name\'\][^\}]*\})/m',
 'new' => '$1
	if(!empty(\\$_POST[\\$prefix."company_id_or_vat"])){
		\\$query = \\$baseQuery ."  company_id_or_vat like \'".\\$_POST[\\$prefix."company_id_or_vat"]."%\'";
	}',
 ),
);

$sFilePath = file_edit('modules/Accounts/AccountFormBase.php', $aCodeHooks, 'AccountFormBase', 'accounts');
if(file_exists($sFilePath)) {
 require_once($sFilePath);
}

class customAccountFormBase extends AccountFormBase {

}
?>