<?php
/**
 * $content : stringa contenente il codice da cui estrarre la classe
 * $function_name : nome della classe da estrarre
 * return : ritorna il testo contentene la classe
 */
function get_class_text($content,$function_name)
{
    $firstfound=false;
    $numgraffe=0;
    $return="";
    $skip_comment=false;
    $skip_string_single=false;
    $skip_string_double=false;
    $fineriga_fineskip_comment=false;
    $pos=strpos($content,"class ".$function_name);
    for($i=$pos;$i<strlen($content);$i++)
    {
        if(substr($content,$i,2)=="//"){
            $skip_comment=true;$fineriga_fineskip_comment=true;
        }
        if(substr($content,$i,2)=="/*"){
            $skip_comment=true;
        }
        if(substr($content,$i,2)=="*/"){
            $skip_comment=false;
        }
        if(substr($content,$i,1)=="'" && $skip_string_single==false){
            $skip_string_single=true;
        }
        if(substr($content,$i,1)=="'" && $skip_string_single==true){
            $skip_string_single=false;
        }
        if(substr($content,$i,1)=="\"" && $skip_string_double==false){
            $skip_string_double=true;
        }
        if(substr($content,$i,1)=="\"" && $skip_string_double==true){
            $skip_string_double=false;
        }
        if((substr($content,$i,2)=="\n\r" || substr($content,$i,2)=="\r\n" || substr($content,$i,1)=="\n" || substr($content,$i,1)=="\r") && $fineriga_fineskip_comment){
            $skip_comment=false;
        }
        if($skip_comment==false && $skip_string_single==false && $skip_string_double==false && substr($content,$i,1)=='{'){
            $numgraffe++;$firstfound=true;
        }
        if($skip_comment==false && $skip_string_single==false && $skip_string_double==false && substr($content,$i,1)=='}'){
            $numgraffe--;
        }
        $return.=$content[$i];
        if($numgraffe<=0 && $firstfound==true){
            break;
        }
    }
    return $return;
}

/**
* $sTargetFile : file da sovrascrivere
* $aCodeHooks : array con le espressioni regolari e le relative sostituzioni da effettuare nel seguente formato
* array(
* 	array('orig'=>'/.../','new'=>'$1...'),
* 	array('orig'=>'/.../','new'=>'$1...'),
* 	array('orig'=>'/.../','new'=>'$1...'),
* ),
* $sClassName : per leggere dal file di destinazione solo una determinata classe senza sovrascrivere il file intero
* $sPrefix : nel caso si abbiano più di 2 sovrascritture nello stesso file distingue i file di cache per i vari accessi migliorando le prestazioni
* return : ritorna il percorso al file di cache da includere/evalizzare ecc..
*/
function file_edit($sTargetFile, $aCodeHooks, $sClassName = '', $sPrefix = 'main_')
{
    $aCacheRes = osyCacheRegeneration($sTargetFile, serialize($aCodeHooks), $sPrefix);
    if($aCacheRes['need_regeneration'])
    {
        $sCodeOrig = file_get_contents($sTargetFile);

        if(!empty($sClassName))
        {
            $sCodeOrig = "<?php\n".get_class_text($sCodeOrig,$sClassName)."\n?>";
        }

        foreach($aCodeHooks as $aCodeHook)
        {
			$sCodeOrig = preg_replace($aCodeHook['orig'], $aCodeHook['new'], $sCodeOrig, -1, $iCount);
			if($iCount < 1) {
				$GLOBALS['log']->fatal(sprintf('osyFileEdit - a code hook failed for target file: %s - code hooks: %s', $sTargetFile, print_r($aCodeHook, true)));
			}
        }

        if(!@file_put_contents($aCacheRes['file'], $sCodeOrig))
        {
            $GLOBALS['log']->fatal(sprintf('osyFileEdit - Could not create cache file %s', $aCacheRes['file']));
            return false;
        }
    }
    return $aCacheRes['file'];
}



function osyCacheRegeneration($sTargetFile, $sCodeToMD5, $sPrefix = 'main_', $sCacheDir = 'Opensymbol', $sRegistryFile = 'osyRegistry.php')
{
    if(file_exists($sTargetFile)) {
        $iTimestamp = filemtime($sTargetFile);
    }
//     else {
//         $GLOBALS['log']->fatal(sprintf('osyFileEdit - Could not open target file %s', $sTargetFile));
//         return false;
//     }

    if($sCacheDir == 'Opensymbol') {
        $sCacheDir = $GLOBALS['sugar_config']['cache_dir'].$sCacheDir;
    }
    if(!file_exists($sCacheDir) || !is_dir($sCacheDir)) {
        $sFunctionMkdir = function_exists('mkdir_recursive') ? 'mkdir_recursive' : 'mkdir';

        if(!@$sFunctionMkdir($sCacheDir)) {
            $GLOBALS['log']->fatal(sprintf('osyFileEdit - Could not create cache directory %s', $sCacheDir));
            return false;
        }
    }

//     $sCacheFile = $sCacheDir.DIRECTORY_SEPARATOR.$sPrefix.substr($sTargetFile, strrpos($sTargetFile, DIRECTORY_SEPARATOR) + 1);
    $sCacheFile = $sCacheDir.'/'.$sPrefix.substr($sTargetFile, strrpos($sTargetFile, '/') + 1);

    $aOsyRegistry = array();
    $aOsyRegistryMD5 = array();

    $bRegenerateCache = true;

    $sRegistryFile = $sCacheDir.'/'.$sRegistryFile;
    if(file_exists($sRegistryFile)) {
        include_once($sRegistryFile);
        if(isset($aOsyRegistry[$sCacheFile][$sTargetFile])
        && $aOsyRegistry[$sCacheFile][$sTargetFile] == $iTimestamp
        && isset($aOsyRegistryMD5[$sCacheFile][$sTargetFile])
        && $aOsyRegistryMD5[$sCacheFile][$sTargetFile] == md5($sCodeToMD5)
        ) {
            $bRegenerateCache = false;
        }
        else {
            $aOsyRegistry[$sCacheFile][$sTargetFile] = $iTimestamp;
            $aOsyRegistryMD5[$sCacheFile][$sTargetFile] = md5($sCodeToMD5);
        }
    }
    else {
        $aOsyRegistry[$sCacheFile][$sTargetFile] = $iTimestamp;
        $aOsyRegistryMD5[$sCacheFile][$sTargetFile] = md5($sCodeToMD5);
    }
    // rewrite registry only if necessary
    if($bRegenerateCache) {
        if(!@file_put_contents($sRegistryFile, sprintf("<?php\n\n\$aOsyRegistry = %s;\n\$aOsyRegistryMD5 = %s;\n\n?>", var_export($aOsyRegistry, true), var_export($aOsyRegistryMD5, true)))) {
            $GLOBALS['log']->fatal(sprintf('osyFileEdit - Could not write osy Registry file %s', $sRegistryFile));
            return false;
        }
    }

    return array(
        'file' => $sCacheFile,
        'need_regeneration' => ($bRegenerateCache || !file_exists($sCacheFile)) ? true : false,
    );
}

?>