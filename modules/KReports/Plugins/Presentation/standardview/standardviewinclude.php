<?php

/* * *******************************************************************************
 * This file is part of KReporter. KReporter is an enhancement developed
 * by Christian Knoll. All rights are (c) 2012 by Christian Knoll
 *
 * This Version of the KReporter is licensed software and may only be used in
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of Christian Knoll
 *
 * You can contact us at info@kreporter.org
 * ****************************************************************************** */
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('modules/KReports/Plugins/prototypes/kreportpresentationplugin.php');

class kreportpresentationstandard extends kreportpresentationplugin {

//function standarddetailviewdisplay(&$thisview) {
    public function display($thisReport) {
        global $app_list_strings, $mod_strings, $current_language, $current_user;

        
        // build the Field List for the JSON Reader
        $arrayList = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES), true);
        $fieldArray = '[';

        foreach ($arrayList as $thisList) {
            if ($fieldArray != '[')
                $fieldArray .= ',';
            $fieldArray .= '{name : \'' . trim($thisList['fieldid'], ':') . '\'}';

            // see if we nee to add a field for the currency_id to the store 2010-12-25 
            // change to check if set to avoid php notice
            if ((isset($thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type']) && $thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['type'] == 'currency') || (isset($thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype']) && $thisReport->fieldNameMap[$thisList['fieldid']]['fields_name_map_entry']['kreporttype'] == 'currency'))
                $fieldArray .= ',{name : \'' . trim($thisList['fieldid'], ':') . '_curid\'}';
        }

        //$fieldArray .= trim($fieldArray, ',');
        $fieldArray .= "]";
        // $fieldArray = htmlentities($fieldArray, ENT_QUOTES, 'UTF-8');
        $viewJS .= '<script type="text/javascript">FieldsArray = ' . htmlentities($fieldArray) . ';</script>';
        // $thisview->ss->assign('listfieldarray', $fieldArray);
        // build the Field List for the JSON Reader
        $arrayList = json_decode(html_entity_decode($thisReport->listfields, ENT_QUOTES), true);
        $columnArray = array();
        foreach ($arrayList as $thisList) {
            $thisColumn = array(
                //2013-03-05 html entities to support special chars in Text
                'text' => '\'' . htmlentities($thisList['name'], ENT_QUOTES) . '\'',
                'width' => ((isset($thisList['width']) && $thisList['width'] != '' && $thisList['width'] != '0') ? $thisList['width'] : '150'),
                'sortable' => ($thisList['sort'] != '' && $thisList['sort'] != '-' ? 'true' : 'false'),
                'dataIndex' => '\'' . trim($thisList['fieldid'], ':') . '\'',
                'hidden' => ($thisList['display'] != 'yes' ? true : false)
            );

            // see if we have renderer we need to process
            $renderer = $thisReport->getXtypeRenderer($thisReport->getFieldTypeById($thisList['fieldid']), $thisList['fieldid']);
            if ($renderer != '')
                $thisColumn['renderer'] = "'" . $renderer . "'";
            //2012-12-01 add default renderer for buuilding links
            else
                $thisColumn['renderer'] = "'fieldRenderer'";

            // see if we have alignment we need to process
            $alignment = $thisReport->getXtypeAlignment($thisReport->getFieldTypeById($thisList['fieldid']), $thisList['fieldid']);
            if ($alignment != '')
                $thisColumn['align'] = "'" . $alignment . "'";

            // pass back the column Array
            $columnArray[] = $thisColumn;
        }
        
        // TODO .. JSON Encode with Bitmask ... need Doku
        // $thisview->ss->assign('columnmodeldarray', str_replace('"', '', json_encode($columnArray)));
        // include the js file 

        $viewJS .= '<script type="text/javascript">ColumnsArray = ' . str_replace('"', '', json_encode($columnArray)) . ';</script>';
        $viewJS .= '<script type="text/javascript" src="modules/KReports/Plugins/Presentation/standardview/js/viewstandard' . ($GLOBALS['sugar_config']['KReports']['debug'] ? '_debug' : '') . '.js"></script>';
        
        return $viewJS;
        // $thisview->ss->assign('viewJS', $viewJS);
    }
}
?>
