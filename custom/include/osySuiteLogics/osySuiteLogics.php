<?php

/**
 * @licence osyQCRMLogics v1.0 - OpenSymbol Srl
 * @author Alberto Dal Sasso, Nicola Rossato
 */

/**
 * Generate logics for desktop app
 * @param $oContext
 * @return string
 */
class osySuiteLogics {
    function init( $oContext = null ) {
        if( $_REQUEST['action'] == 'EditView' || $_REQUEST['action'] == 'DetailView' ) {
            $oContext = $_REQUEST['module'];
        } else if( $_REQUEST['action'] == 'SubpanelCreates' ) {
            $oContext = $_REQUEST['target_module'];
        } else {
            return;
        }

        $oBean = BeanFactory::newBean($oContext);

        $aRet = array();
        foreach ($oBean->field_defs as $sFieldId => $aField) {
            if (!empty($aField['dependency'])) {
                $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                    $oBean->module_dir,
                    $sFieldId,
                    $aField['dependency'],
                    'setVisibility'
                );
            }
            if (!empty($aField['visibility_grid']) && $_REQUEST['action'] == 'EditView') {
                $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                    $oBean->module_dir,
                    $sFieldId,
                    $this->visibilityGrid($aField['visibility_grid'], $aField['options']),
                    'setOptions'
                );
            }
            if( $_REQUEST['action'] != 'DetailView' ) {
                if (!empty($aField['formula'])) {
                    $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                        $oBean->module_dir,
                        $sFieldId,
                        $aField['formula'],
                        'setValue'
                    );
                }
                if (!empty($aField['mandatory'])) {
                    $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                        $oBean->module_dir,
                        $sFieldId,
                        $aField['mandatory'],
                        'setRequired'
                    );
                }
                if (!empty($aField['set_readonly'])) {
                    $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                        $oBean->module_dir,
                        $sFieldId,
                        $aField['set_readonly'],
                        'setReadOnly'
                    );
                }
                if (!empty($aField['validate'])) {
                    $aRet[] = sprintf('(new osySuiteLogics(\'%s\',\'%s\', \'%s\', \'%s\')).fire();',
                        $oBean->module_dir,
                        $sFieldId,
                        $aField['validate'],
                        'checkValidate'
                    );
                }
            }
        }

        if( count( $aRet ) > 0 ) {
            echo '
                <script type="text/javascript" src="custom/include/osySuiteLogics/jsep.js"></script>
                <script type="text/javascript" src="custom/include/osySuiteLogics/osySuiteLogics.js"></script>
                <script type="text/javascript">YAHOO.util.Event.onDOMReady(function() {'.
                implode( "\n", $aRet ).
                ' } );</script>';
        }
    }

    /**
     * Resolve visibilityGrid entry in formula
     * @param $aGrid
     * @param $list
     * @return string
     */
    function visibilityGrid($aGrid, $list)
    {
        $ret = sprintf('options("%s",ifElse(', $list);
        foreach ($aGrid['values'] as $k => $v) {
            $ret .= sprintf('eq($%s,"%s"),createList("%s"),',
                $aGrid['trigger'],
                $k,
                implode('","', $v)
            );
        }
        $ret .= 'createList()))';
        return $ret;
    }
}
