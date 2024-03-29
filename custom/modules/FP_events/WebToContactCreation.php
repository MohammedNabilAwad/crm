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

/*********************************************************************************

 * Description:  TODO: To be written.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/


require_once('include/EditView/EditView2.php');

//require_once('modules/FP_events/utils.php'); // IGNORED IMPORT


global $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map;
global $import_file_name, $theme;$app_list_strings;
$contact = new Contact();
$fields = array();

$xtpl=new XTemplate ('custom/modules/FP_events/WebToContactCreation.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
if(isset($_REQUEST['module']))
{
    $xtpl->assign("MODULE", $_REQUEST['module']);
}
if(isset($_REQUEST['return_module']))
{
    $xtpl->assign("RETURN_MODULE", $_REQUEST['return_module']);
}
if(isset($_REQUEST['return_id']))
{
    $xtpl->assign("RETURN_ID", $_REQUEST['return_id']);
}
if(isset($_REQUEST['return_id']))
{
    $xtpl->assign("RETURN_ACTION", $_REQUEST['return_action']);
}
if(isset($_REQUEST['record']))
{
    $xtpl->assign("RECORD", $_REQUEST['record']);
}

global $theme;
global $currentModule;

$ev = new EditView;

$xtpl->assign("TITLE1",
    $this->getModuleTitle(
        true,
        array(
            $this->_getModuleTitleListParam(),
            $mod_strings['LBL_WEB_TO_CONTACT_FORM_TITLE1']
        )
    )
);

$xtpl->assign("TITLE2",
    $this->getModuleTitle(
        true,
        array(
            $this->_getModuleTitleListParam(),
            $mod_strings['LBL_WEB_TO_CONTACT_FORM_TITLE2']
        )
    )
);

$site_url = $sugar_config['site_url'];
$web_post_url = $site_url.'/index.php?entryPoint=WebToContactCapture';
$json = getJSONobj();
// Users Popup
$popup_request_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'WebToContactCreation',
    'field_to_name_array' => array(
        'id' => 'assigned_user_id',
        'user_name' => 'assigned_user_name',
    ),
);
$xtpl->assign('encoded_users_popup_request_data', $json->encode($popup_request_data));

//Events popup
$popup_request_data = array(
    'call_back_function' => 'set_return',
    'form_name' => 'WebToContactCreation',
    'field_to_name_array' => array(
        'id' => 'event_id',
        'name' => 'event_name',
    ),
);
$encoded_users_popup_request_data = $json->encode($popup_request_data);
$xtpl->assign('encoded_events_popup_request_data' , $json->encode($popup_request_data));

//create the cancel button
$cancel_buttons_html = "<input class='button' onclick=\"this.form.action.value='".$_REQUEST['return_action']."'; this.form.module.value='".$_REQUEST['return_module']."';\" type='submit' name='cancel' value='".$app_strings['LBL_BACK']."'/>";
$xtpl->assign("CANCEL_BUTTON", $cancel_buttons_html );

$field_defs_js = "var field_defs = {'Contacts':[";

// Force email1 and department required
if(isset($contact->field_defs['email1'])) {
    $contact->field_defs['email1']['required'] = true;
}
if (isset($contact->field_defs['department'])) {
    $contact->field_defs['department']['required'] = true;
}

    $count = 0;
    foreach ($contact->field_defs as $field_def) {
        $email_fields = false;
        if ($field_def['name'] == 'email1' || $field_def['name'] == 'email2') {
            $email_fields = true;
        }
        if ($field_def['name'] != 'account_name') {
            if (($field_def['type'] == 'relate' && empty($field_def['custom_type']))
                || $field_def['type'] == 'assigned_user_name' || $field_def['type'] == 'link'
                || (isset($field_def['source']) && $field_def['source'] == 'non-db' && !$email_fields) || $field_def['type'] == 'id'
            ) {
                continue;
            }
        }
        if ($field_def['name'] == 'deleted' || $field_def['name'] == 'converted' || $field_def['name'] == 'date_entered'
            || $field_def['name'] == 'date_modified' || $field_def['name'] == 'modified_user_id'
            || $field_def['name'] == 'assigned_user_id' || $field_def['name'] == 'created_by'
            || $field_def['name'] == 'team_id'
        ) {
            continue;
        }


        $field_def['vname'] = preg_replace('/:$/', '', translate($field_def['vname'], 'Contacts'));

        //$cols_name = "{'".$field_def['vname']."'}";
        $col_arr = array();
        if ((isset($field_def['required']) && $field_def['required'] != null && $field_def['required'] != 0)
            || $field_def['name'] == 'last_name'
        ) {
            $cols_name = $field_def['vname'] . ' ' . $app_strings['LBL_REQUIRED_SYMBOL'];
            $col_arr[0] = $cols_name;
            $col_arr[1] = $field_def['name'];
            $col_arr[2] = true;
        } else {
            $cols_name = $field_def['vname'];
            $col_arr[0] = $cols_name;
            $col_arr[1] = $field_def['name'];
        }
        if (!in_array($cols_name, $fields)) {
            array_push($fields, $col_arr);
        }
        $count++;
    }
    
    $xtpl->assign("WEB_POST_URL",$web_post_url);
//$xtpl->assign("CONTACT_SELECT_FIELDS",'MOD.LBL_SELECT_CONTACT_FIELDS');

    require_once('custom/include/osy_QuickSearchDefaults.php');
    $qsd = osy_QuickSearchDefaults::getQuickSearchDefaults();
    $sqs_objects = array(
        'account_name' => $qsd->getQSParent(),
        'assigned_user_name' => $qsd->getQSUser(),
        'event_name' => $qsd->getQSEvents(),
    );
    $quicksearch_js = '<script type="text/javascript" language="javascript">sqs_objects = ' . $json->encode($sqs_objects) . '</script>';
    $xtpl->assign("JAVASCRIPT", $quicksearch_js);



    if (empty($focus->assigned_user_id) && empty($focus->id))  $focus->assigned_user_id = $current_user->id;
    if (empty($focus->assigned_name) && empty($focus->id))  $focus->assigned_user_name = $current_user->user_name;
    $xtpl->assign("ASSIGNED_USER_OPTIONS", get_select_options_with_id(get_user_array(TRUE, "Active", $focus->assigned_user_id), $focus->assigned_user_id));
    $xtpl->assign("ASSIGNED_USER_NAME", $focus->assigned_user_name);
    $xtpl->assign("ASSIGNED_USER_ID", $focus->assigned_user_id );

    $xtpl->assign("REDIRECT_URL_DEFAULT",'http://');

//required fields on Webtocontact form
    $event= new FP_events();

    $javascript = new javascript();
    $javascript->setFormName('WebToContactCreation');
    $javascript->setSugarBean($contact);
    $javascript->addAllFields('');
//$javascript->addFieldGeneric('redirect_url', '', 'LBL_REDIRECT_URL' ,'true');
    $javascript->addFieldGeneric('event_name', '', 'LBL_RELATED_EVENT' ,'true');
    $javascript->addFieldGeneric('assigned_user_name', '', 'LBL_ASSIGNED_TO' ,'true');
    $javascript->addToValidateBinaryDependency('event_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $mod_strings['LBL_CONTACT_NOTIFY_EVENT'], 'false', '', 'event_id');
    $javascript->addToValidateBinaryDependency('assigned_user_name', 'alpha', $app_strings['ERR_SQS_NO_MATCH_FIELD'] . $app_strings['LBL_ASSIGNED_TO'], 'false', '', 'assigned_user_id');
    echo $javascript->getScript();

    $json = getJSONobj();
    $contact_fields = $json->encode($fields);
    $xtpl->assign("CONTACT_FIELDS",$contact_fields);
    $classname = "SUGAR_GRID";
    $xtpl->assign("CLASSNAME",$classname);
    $xtpl->assign("DRAG_DROP_CHOOSER_WEB_TO_CONTACT",constructDDWebToContactFields($fields,$classname));

    $xtpl->parse("main");
    $xtpl->out("main");

    function constructDDWebToContactFields($fields,$classname){
        require_once("include/templates/TemplateDragDropChooser.php");
        global $mod_strings;
        $d2 = array();
        //now call function that creates javascript for invoking DDChooser object
        $dd_chooser = new TemplateDragDropChooser();
        $dd_chooser->args['classname']  = $classname;
        $dd_chooser->args['left_header']  = $mod_strings['LBL_AVALAIBLE_FIELDS_HEADER'];
        $dd_chooser->args['mid_header']   = $mod_strings['LBL_CONTACT_FORM_FIRST_HEADER'];
        $dd_chooser->args['right_header'] = $mod_strings['LBL_CONTACT_FORM_SECOND_HEADER'];
        $dd_chooser->args['left_data']    = $fields;
        $dd_chooser->args['mid_data']     = $d2;
        $dd_chooser->args['right_data']   = $d2;
        $dd_chooser->args['title']        =  ' ';
        $dd_chooser->args['left_div_name']      = 'ddgrid2';
        $dd_chooser->args['mid_div_name']       = 'ddgrid3';
        $dd_chooser->args['right_div_name']     = 'ddgrid4';
        $dd_chooser->args['gridcount'] = 'three';
        $str = $dd_chooser->displayScriptTags();
        $str .= $dd_chooser->displayDefinitionScript();
        $str .= $dd_chooser->display();
        $str .= "<script>
	           //function post rows
	           function postMoveRows(){
			    	//Call other function when this is called
	           }
	        </script>";
        $str .= "<script>
		       function displayAddRemoveDragButtons(Add_All_Fields,Remove_All_Fields){
				    var addRemove = document.getElementById('contact_add_remove_button');
				    if(" . $dd_chooser->args['classname'] . "_grid0.getDataModel().getTotalRowCount() ==0) {
				     addRemove.setAttribute('value',Remove_All_Fields);
				     addRemove.setAttribute('title',Remove_All_Fields);
				    }
				    else if(" . $dd_chooser->args['classname'] . "_grid1.getDataModel().getTotalRowCount() ==0 && " . $dd_chooser->args['classname'] . "_grid2.getDataModel().getTotalRowCount() ==0){
				     addRemove.setAttribute('value',Add_All_Fields);
				     addRemove.setAttribute('title',Add_All_Fields);
				    }
              }
            </script>";

        return $str;
    }


    function get_webtocontact_title(
        $module,
        $image_name,
        $module_title,
        $show_help
    )
    {
        return $GLOBALS['current_view']->getModuleTitle($show_help);
    }
