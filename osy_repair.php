<?php 
define('sugarEntry', TRUE);

//OPENSYMBOLMOD ANTONIO
//file per eseguire i repair in automatico
//questa pagina può venire lanciata da linea di comando  con: php _URL_/osy_QuickRepairAndRebuild.php _AUTOEXECUTE_ +  _SHOW_OUTPUT_ + _RIPARA_RUOLI_ 
//_AUTOEXECUTE_ è un bool che indica se eseguire direttamente le query o aspettare l'ok dell'utente
//_AUTOEXECUTE_ è un bool che indica se eseguire direttamente le query o aspettare l'ok dell'utente
//_RIPARA_RUOLI_ è un bool che indica se repairizzare i ruoli


require_once('include/entryPoint.php');

$ripara_ruoli=false;
$autoexecute=true;
$show_output=false;

if(isset($_SERVER["argv"][1])) 
	$autoexecute=$_SERVER["argv"][1];
elseif(isset($_REQUEST["autoexecute"]))
	$autoexecute=$_REQUEST["autoexecute"];


if(isset($_SERVER["argv"][2])) 
	$show_output=$_SERVER["argv"][2];
elseif(isset($_REQUEST["show_output"]))
	$show_output=$_REQUEST["show_output"];

if(isset($_SERVER["argv"][3])) 
	$ripara_ruoli=$_SERVER["argv"][3];
elseif(isset($_REQUEST["ripara_ruoli"]))
	$ripara_ruoli=$_REQUEST["ripara_ruoli"];
	
if($autoexecute === "1") $autoexecute = true;
if($autoexecute === "0") $autoexecute = false;

if($show_output === "1") $show_output = true;
if($show_output === "0") $show_output = false;

if($ripara_ruoli === "1") $ripara_ruoli = true;
if($ripara_ruoli === "0") $ripara_ruoli = false;

global $db;
global $mod_strings,$current_user;
$current_user->retrieve('1');

if(empty($_SESSION['authenticated_user_language'])) {
	$current_language = $sugar_config['default_language'];
} else {
	$current_language = $_SESSION['authenticated_user_language'];
}

$mod_strings=return_module_language($current_language , 'Administration');

//****************
//ESEGUO IL REPAIR	
	
echo'... Repair in corso ...';

function replace_br($buffer){

	$buffer = str_replace("<br>","\n",$buffer);
	$buffer = str_replace("<BR>","\n",$buffer);
	$buffer = str_replace("<BR/>","\n",$buffer);
	$buffer = str_replace("<br/>","\n",$buffer);
	return $buffer;
}

ob_start("replace_br");

$selectedActions = array(
	'rebuildExtensions',
	'clearTpls',
	'clearJsFiles',
	'clearDashlets',
	'clearVardefs',
	'clearJsLangFiles',
	'rebuildAuditTables',
	'repairDatabase',
);

$installed_modules=array($mod_strings['LBL_ALL_MODULES']);	
require_once('include/SugarObjects/VardefManager.php');
require_once('modules/Administration/QuickRepairAndRebuild.php');

$_REQUEST['osy_repair_silent']="";
$_REQUEST['module']="Administration";
$_REQUEST['action']="";
$_REQUEST['currentmodule']="Administration";


VardefManager::clearVardef();
$rac = new RepairAndClear();
$rac->repairAndClearAll($selectedActions, $installed_modules,$autoexecute, $show_output);
ob_start("replace_br");


if($ripara_ruoli === true){
	echo "Repair Ruoli ...\n";
	include('modules/ACL/install_actions.php');
		
	
	$GLOBALS['log']->debug('----->osy_QuickRepairAndRebuild: Ho riparato i ruoli!');		
}

echo "Repair terminato!\n";	
$GLOBALS['log']->debug('----->osy_QuickRepairAndRebuild: Repair terminato');
//****************


?>
