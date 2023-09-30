<?php 
//*******************
//OPENSYMBOLMOD START isabella.masiero 30/giu/2014

$testo_info="
<br> script per avere la lista delle label che non sono ancora state tradotte in una certa lingua
<br> lanciare su brower: path_sugar/osy_label_non_tradotte.php?language_base=en_us&language_find=fr_fr
<br> se non vengono passati, in automatico prende language_base=en_us e language_find=fr_fr
<br> ";
define('sugarEntry', TRUE);
require_once('include/entryPoint.php');

require_once('include/utils.php');

global $sugar_config,$moduleList;
$sLanguageBase = 'en_us';
if(isset($_REQUEST['language_base']) && !empty($_REQUEST['language_base'])){
	$sLanguageBase=$_REQUEST['language_base'];	
}
$sLanguageFind = 'fr_fr';
if(isset($_REQUEST['language_find']) && !empty($_REQUEST['language_find'])){
	$sLanguageFind=$_REQUEST['language_find'];	
}

$aListLabelOk=array();
$sLanguageMatch="{$sLanguageFind}_{$sLanguageBase}";
$aListLabelOk[$sLanguageMatch]=array();
require_once('osy_label_non_tradotte_lists.php');

$aLabelErrorList=array();
$aLabelTotal=array();

$aLabelTotal['app_list_strings'][$sLanguageBase]=return_app_list_strings_language($sLanguageBase );
$aLabelTotal['app_list_strings'][$sLanguageFind]=return_app_list_strings_language($sLanguageFind );


$aLabelTotal['app_strings'][$sLanguageBase]=return_application_language($sLanguageBase );
$aLabelTotal['app_strings'][$sLanguageFind]=return_application_language($sLanguageFind );

foreach($moduleList as $sModule){
	$aLabelTotal[$sModule][$sLanguageBase]=return_module_language($sLanguageBase , $sModule);
	$aLabelTotal[$sModule][$sLanguageFind]=return_module_language($sLanguageFind , $sModule);
}


$aLabelErrorList=array();

foreach($aLabelTotal as $sModule=>$aLabels){
	foreach($aLabels[$sLanguageBase] as $kLabel => $vLabel){
		if(is_array($vLabel)){
			foreach($vLabel as $kLabelDD => $vLabelDD){
				if( !isset( $aListLabelOk[$sLanguageMatch][$sModule][$kLabel][$kLabelDD] ) || $aListLabelOk[$sLanguageMatch][$sModule][$kLabel][$kLabelDD]!=1 ){
					if( (!isset($aLabels[$sLanguageFind][$kLabel][$kLabelDD]) || empty($aLabels[$sLanguageFind][$kLabel][$kLabelDD])) && !empty($vLabelDD) ){
						$aLabelErrorList[$sModule]['LabelDdNotFound'][$kLabel][$kLabelDD]=$vLabelDD;
					}else if( (isset($aLabels[$sLanguageFind][$kLabel][$kLabelDD]) && !empty($aLabels[$sLanguageFind][$kLabel][$kLabelDD])) && $aLabels[$sLanguageFind][$kLabel][$kLabelDD] == $vLabelDD ){
						$aLabelErrorList[$sModule]['LabelDdEqual'][$kLabel][$kLabelDD]=$vLabelDD;
					}
				}
			}
		}else{
			if( !isset( $aListLabelOk[$sLanguageMatch][$sModule][$kLabel] ) || $aListLabelOk[$sLanguageMatch][$sModule][$kLabel]!=1 ){			
				if( (!isset($aLabels[$sLanguageFind][$kLabel]) || empty($aLabels[$sLanguageFind][$kLabel])) && !empty($vLabel) ){
					$aLabelErrorList[$sModule]['LabelNotFound'][$kLabel]=$vLabel;
				}else if( (isset($aLabels[$sLanguageFind][$kLabel]) && !empty($aLabels[$sLanguageFind][$kLabel])) && $aLabels[$sLanguageFind][$kLabel] == $vLabel ){
					$aLabelErrorList[$sModule]['LabelEqual'][$kLabel]=$vLabel;
				}
			}
		}
	}
}
echo "<h3>Lista Label da sistemare</h3><br>";
echo"<table>";
foreach($aLabelTotal as $sModule=>$aLabels){
	echo "<tr>
			<td colspan='6'><h4>{$sModule}</h4></td>
		</tr>";
	if($sModule=='app_list_strings'){
		$sNameStringLabel = "\$GLOBALS['app_list_strings']";
	}else if($sModule=='app_strings'){
		$sNameStringLabel = "\$GLOBALS['app_strings']";
	}else{
		$sNameStringLabel="\$mod_strings";
	}
	if(isset($aLabelErrorList[$sModule])){
		foreach($aLabelErrorList[$sModule] as $sErrorType=>$sList1){	
			$sTitle1='';
			if($sErrorType == 'LabelDdNotFound') $sTitle1="Dropdown - label non trovate";
			else if($sErrorType == 'LabelDdEqual') $sTitle1="Dropdown - label non tradotte";
			else if($sErrorType == 'LabelNotFound') $sTitle1="label non trovate";
			else if($sErrorType == 'LabelEqual') $sTitle1="label non tradotte";
			else $sTitle1 = $sErrorType; 		



			echo "<tr>
					<td colspan='6'><h5>{$sTitle1}</h5></td>
				</tr>";
			echo "<tr>
					<td><b>Testo da sistemare</b></td>
					<td><b>Chiave</b></td>
					<td><b>Label da tradurre</b></td>
					<td><b>Chiave Padre</b></td>
					<td><b>Modulo</b></td>
					<td><b>Testo da non tradurre</b></td>
				</tr>";
				foreach($sList1 as $kLabel=>$vLabel){
					if($sErrorType == 'LabelDdNotFound' || $sErrorType == 'LabelDdEqual'){
						foreach($vLabel as $kLabelDD => $vLabelDD){
							echo "<tr>
								<td>{$sModule}/{$sNameStringLabel}['{$kLabel}']['{$kLabelDD}']='{$vLabelDD}';</td>
								<td>{$kLabelDD}</td>
								<td>{$vLabelDD}</td>
								<td>{$kLabel}</td>
								<td>{$sModule}</td>
								<td>\$aListLabelOk['{$sLanguageMatch}']['{$sModule}']['{$kLabel}']['{$kLabelDD}']=1;</td>
							</tr>";
						}					
					}else{
						echo "<tr>
							<td>{$sModule}/{$sNameStringLabel}['{$kLabel}']='{$vLabel}';</td>
							<td>{$kLabel}</td>
							<td>{$vLabel}</td>
							<td>&nbsp;</td>
							<td>{$sModule}</td>
							<td>\$aListLabelOk['$sLanguageMatch']['{$sModule}']['{$kLabel}']=1;</td>
						</tr>";
					}
				}	
			echo "<tr><td colspan='6'>&nbsp;</td></tr>";
		}
	}
	echo "<tr><td colspan='6'>&nbsp;</td></tr>";
}
echo "</table>";
 
//OPENSYMBOLMOD END isabella.masiero 22/gen/2013
//*******************
?>
