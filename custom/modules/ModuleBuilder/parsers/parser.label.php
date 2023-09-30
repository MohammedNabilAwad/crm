<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
    die ( 'Not A Valid Entry Point' ) ;

require_once ('modules/ModuleBuilder/parsers/ModuleBuilderParser.php') ;
require_once ('modules/ModuleBuilder/parsers/parser.label.php');
class ParserLabelCustom extends ParserLabel
{

    function ParserLabelCustom ($moduleName, $packageName = '' )
    {
        $this->moduleName = $moduleName;
        if (!empty($packageName))
            $this->packageName = $packageName ;
    }

    function handleSave ($params , $language)
    {
        $labels = array ( ) ;
        foreach ( $params as $key => $value )
        {
            if (preg_match ( '/^label_/', $key ) && strcmp ( $value, 'no_change' ) != 0)
            {
                $labels [ strtoupper(substr ( $key, 6 )) ] = SugarCleaner::cleanHtml(from_html($value),false);
            }
        }
        if (!empty($this->packageName)) //we are in Module builder
        {
            return parent::addLabels ( $language, $labels, $this->moduleName, "custom/modulebuilder/packages/{$this->packageName}/modules/{$this->moduleName}/language" ) ;
        } else
        {
            //OPENSYMBOLMOD paolo.santacatterina (16/01/17  11.51)
            //AITCILOSUI-11 modifica label: se si modifica una label poi al save non viene mantenuto il nuovo valore
            //Ho riportato la modifica da una versione sucessiva (6.7.4)
            //*************************************************************
            $addLabelsResult = true;
            $addExtLabelsResult = true;
            $extLabels = array();
            $extFile = "custom/modules/".$this->moduleName."/Ext/Language/".$language.".lang.ext.php";
            if (is_file($extFile)) {
                include($extFile);
                foreach ($labels as $key=>$value) {
                    if (isset($mod_strings[$key])) {
                        $extLabels[$key] = $value;
                        unset($labels[$key]);
                    }
                }
            }
            if (!empty($labels)) {
                $addLabelsResult =  parent::addLabels($language, $labels, $this->moduleName);
            }
            if (!empty($extLabels)) {
                $addExtLabelsResult =  parent::addLabels($language, $extLabels, $this->moduleName, null, true);
            }
            return $addLabelsResult && $addExtLabelsResult;

            //return self::addLabels ( $language, $labels, $this->moduleName ) ;
            //FINE ******************************************************************************
        }
    }
}

?>
