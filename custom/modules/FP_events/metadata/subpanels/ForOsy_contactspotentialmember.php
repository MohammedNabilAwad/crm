<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

$module_name='FP_events';
$subpanel_layout = array(
    'top_buttons' => array(
        array('widget_class' => 'SubPanelTopCreateButton'),
        array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
    ),

    'where' => '',

    'list_fields' => array(
        'name'=>array(
            'vname' => 'LBL_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'width' => '45%',
        ),
        'date_modified'=>array(
            'vname' => 'LBL_DATE_MODIFIED',
            'width' => '45%',
        ),
        'payment_status' => array (
            'vname' => 'LBL_PAYMENT_STATUS',
            'width' => '10%',
            'widget_class' => 'SubPanelCustom',
            'sortable' => false,
            'customCode' => '
							{php}
								$idParent = $this->_tpl_vars["oParent"]->id;
								$q="SELECT payment_status FROM fp_events_contactspotentialmember WHERE fp_event_id = \'".$this->_tpl_vars["aLayoutDefs"]["fields"][ID]."\' AND osy_contactspotentialmember_id = \'".$idParent."\' AND deleted = 0";
								global $db;
								$r=$db->query($q);
								$v=$db->fetchByAssoc($r);
								echo $GLOBALS ["app_list_strings"] ["osy_payment_status_list"][$v["payment_status"]];
							{/php}
						'
        ),
        'cost' => array (
            'vname' => 'LBL_COST',
            'width' => '10%',
            'widget_class' => 'SubPanelCustom',
            'sortable' => false,
            'customCode' => '
							{php}
								$idParent = $this->_tpl_vars["oParent"]->id;
								$q="SELECT cost FROM fp_events_contactspotentialmember WHERE fp_event_id = \'".$this->_tpl_vars["aLayoutDefs"]["fields"][ID]."\' AND osy_contactspotentialmember_id = \'".$idParent."\' AND deleted = 0";
								global $db;
								$r=$db->query($q);
								$v=$db->fetchByAssoc($r);
								echo $v["cost"];
							{/php}
						'
        ),
        'edit_button'=>array(
            'vname' => 'LBL_EDIT_BUTTON',
            'widget_class' => 'SubPanelEditButton',
            'module' => $module_name,
            'width' => '4%',
        ),
        'remove_button'=>array(
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'module' => $module_name,
            'width' => '5%',
        ),
    ),
);

?>