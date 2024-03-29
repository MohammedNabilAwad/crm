<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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
require_once('include/formbase.php');


require_once('include/utils/db_utils.php');


global $app_list_strings, $app_strings, $mod_strings;

$site_url = $sugar_config['site_url'];
$web_form_header = $mod_strings['LBL_CONTACT_DEFAULT_HEADER'];
$web_form_description = $mod_strings['LBL_DESCRIPTION_TEXT_CONTACT_FORM'];
$web_form_submit_label = $mod_strings['LBL_DEFAULT_CONTACT_SUBMIT'];
$web_form_required_fileds_msg = $mod_strings['LBL_PROVIDE_WEB_TO_CONTACT_FORM_FIELDS'];
$web_required_symbol = $app_strings['LBL_REQUIRED_SYMBOL'];
$web_not_valid_email_address = $mod_strings['LBL_NOT_VALID_EMAIL_ADDRESS'];
$web_post_url = $site_url . '/index.php?entryPoint=WebToContactCapture';
$web_redirect_url = '';
$web_notify_event = '';
$web_assigned_user = '';
$web_team_user = '';
$web_form_footer = '';
$regex = "/^\w+(['\.\-\+]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+\$/";
//_ppd($web_required_symbol);
if (!empty($_REQUEST['web_header'])) {
    $web_form_header = $_REQUEST['web_header'];
}
if (!empty($_REQUEST['web_description'])) {
    $web_form_description = $_REQUEST['web_description'];
}
if (!empty($_REQUEST['web_submit'])) {
    $web_form_submit_label = to_html($_REQUEST['web_submit']);
}
if (!empty($_REQUEST['post_url'])) {
    $web_post_url = $_REQUEST['post_url'];
}
if (!empty($_REQUEST['redirect_url']) && $_REQUEST['redirect_url'] != "http://") {
    $web_redirect_url = $_REQUEST['redirect_url'];
}
if (!empty($_REQUEST['notify_event'])) {
    $web_notify_event = $_REQUEST['notify_event'];
}
if (!empty($_REQUEST['web_footer'])) {
    $web_form_footer = $_REQUEST['web_footer'];
}
if (!empty($_REQUEST['event_id'])) {
    $web_form_event = $_REQUEST['event_id'];
}
if (!empty($_REQUEST['assigned_user_id'])) {
    $web_assigned_user = $_REQUEST['assigned_user_id'];
}


$contact = new Contact();
$fieldsMetaData = new FieldsMetaData();
$xtpl = new XTemplate ('custom/modules/FP_events/WebToContactForm.html');
$xtpl->assign("MOD", $mod_strings);
$xtpl->assign("APP", $app_strings);
$Web_To_Contact_Form_html = '';
$Web_To_Contact_Form_html .= '<link rel="stylesheet" type="text/css" media="all" href="' . getJSPath(SugarThemeRegistry::current()->getCSSURL('calendar-win2k-cold-1.css')) . '">';

$Web_To_Contact_Form_html .= "<script type=\"text/javascript\" src='" . getJSPath($site_url . '/cache/include/javascript/sugar_grp1.js') . "'></script>";
$Web_To_Contact_Form_html .= '<script type="text/javascript" src="' . getJSPath($site_url . '/cache/include/javascript/calendar.js') . '"></script>';

$Web_To_Contact_Form_html .= "<form action='$web_post_url' name='WebToContactForm' method='POST' id='WebToContactForm'>";
$Web_To_Contact_Form_html .= "<table width='100%' style='border-top: 1px solid;
border-bottom: 1px solid;
padding: 10px 6px 12px 10px;
background-color: rgb(233, 243, 255);
font-size: 12px;
background-repeat: repeat-x;
background-position: center top;'>";

$Web_To_Contact_Form_html .= "<tr align='center' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 18px; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'><b><h2>$web_form_header</h2></b></TD></tr>";
$Web_To_Contact_Form_html .= "<tr align='center' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 2px; font-weight: normal; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>&nbsp</TD></tr>";
$Web_To_Contact_Form_html .= "<tr align='left' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 12px; font-weight: normal; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>$web_form_description</TD></tr>";
$Web_To_Contact_Form_html .= "<tr align='center' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 8px; font-weight: normal; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>&nbsp</TD></tr>";

//$Web_To_Contact_Form_html .= "\n<p>\n";

if (!empty($_REQUEST['colsFirst']) && !empty($_REQUEST['colsSecond'])) {
    if (count($_REQUEST['colsFirst']) < count($_REQUEST['colsSecond'])) {
        $columns = count($_REQUEST['colsSecond']);
    }
    if (count($_REQUEST['colsFirst']) > count($_REQUEST['colsSecond']) || count($_REQUEST['colsFirst']) == count($_REQUEST['colsSecond'])) {
        $columns = count($_REQUEST['colsFirst']);
    }
} else if (!empty($_REQUEST['colsFirst'])) {
    $columns = count($_REQUEST['colsFirst']);
} else if (!empty($_REQUEST['colsSecond'])) {
    $columns = count($_REQUEST['colsSecond']);
}


$required_fields = array();
$bool_fields = array();
for ($i = 0; $i < $columns; $i++) {
    $colsFirstField = '';
    $colsSecondField = '';

    if (!empty($_REQUEST['colsFirst'][$i])) {
        $colsFirstField = $_REQUEST['colsFirst'][$i];
        //_pp($_REQUEST['colsFirst']);
    }
    if (!empty($_REQUEST['colsSecond'][$i])) {
        $colsSecondField = $_REQUEST['colsSecond'][$i];
        //_pp($_REQUEST['colsSecond']);
    }

    // Force email1 and department required
    if ($colsFirstField == 'email1' || $colsFirstField == 'department') {
        $contact->field_defs[$colsFirstField]['required'] = true;
    }
    if ($colsSecondField == 'email1' || $colsSecondField == 'department') {
        $contact->field_defs[$colsSecondField]['required'] = true;
    }

    if (isset($contact->field_defs[$colsFirstField]) && $contact->field_defs[$colsFirstField] != null) {
        $field_vname = preg_replace('/:$/', '', translate($contact->field_defs[$colsFirstField]['vname'], 'Contacts'));
        $field_name = $colsFirstField;
        $field_label = $field_vname . ": ";
        if (isset($contact->field_defs[$colsFirstField]['custom_type']) && $contact->field_defs[$colsFirstField]['custom_type'] != null) {
            $field_type = $contact->field_defs[$colsFirstField]['custom_type'];
        } else {
            $field_type = $contact->field_defs[$colsFirstField]['type'];
        }

        $field_required = '';
        if (isset($contact->field_defs[$colsFirstField]['required']) && $contact->field_defs[$colsFirstField]['required'] != null
            && $contact->field_defs[$colsFirstField]['required'] != 0
        ) {
            $field_required = $contact->field_defs[$colsFirstField]['required'];
            if (!in_array($contact->field_defs[$colsFirstField]['name'], $required_fields)) {
                array_push($required_fields, $contact->field_defs[$colsFirstField]['name']);
            }
        }
        if ($contact->field_defs[$colsFirstField]['name'] == 'last_name') {
            if (!in_array($contact->field_defs[$colsFirstField]['name'], $required_fields)) {
                array_push($required_fields, $contact->field_defs[$colsFirstField]['name']);
            }
        }
        if ($field_type == 'multienum' || $field_type == 'enum' || $field_type == 'radioenum') $field_options = $contact->field_defs[$colsFirstField]['options'];
    }
    //preg_replace('/:$/','',translate($field_def['vname'],'Contacts')
    if (isset($contact->field_defs[$colsSecondField]) && $contact->field_defs[$colsSecondField] != null) {
        $field1_vname = preg_replace('/:$/', '', translate($contact->field_defs[$colsSecondField]['vname'], 'Contacts'));
        $field1_name = $colsSecondField;
        $field1_label = $field1_vname . ": ";
        if (isset($contact->field_defs[$colsSecondField]['custom_type']) && $contact->field_defs[$colsSecondField]['custom_type'] != null) {
            $field1_type = $contact->field_defs[$colsSecondField]['custom_type'];
        } else {
            $field1_type = $contact->field_defs[$colsSecondField]['type'];
        }

        $field1_required = '';
        if (isset($contact->field_defs[$colsSecondField]['required']) && $contact->field_defs[$colsSecondField]['required'] != null
            && $contact->field_defs[$colsSecondField]['required'] != 0
        ) {
            $field1_required = $contact->field_defs[$colsSecondField]['required'];
            if (!in_array($contact->field_defs[$colsSecondField]['name'], $required_fields)) {
                array_push($required_fields, $contact->field_defs[$colsSecondField]['name']);
            }
        }
        if ($contact->field_defs[$colsSecondField]['name'] == 'last_name') {
            if (!in_array($contact->field_defs[$colsSecondField]['name'], $required_fields)) {
                array_push($required_fields, $contact->field_defs[$colsSecondField]['name']);
            }
        }
        if ($field1_type == 'multienum' || $field1_type == 'enum' || $field1_type == 'radioenum') $field1_options = $contact->field_defs[$colsSecondField]['options'];
    }

    $Web_To_Contact_Form_html .= "<tr>";

    if (isset($contact->field_defs[$colsFirstField]) && $contact->field_defs[$colsFirstField] != null) {
        if ($field_type == 'multienum' || $field_type == 'enum' || $field_type == 'radioenum') {
            $contact_options = '';
            if (!empty($contact->$field_name)) {
                $contact_options = get_select_options_with_id($app_list_strings[$field_options], unencodeMultienum($contact->$field_name));
            } else {
                $contact_options = get_select_options_with_id($app_list_strings[$field_options], '');
            }
            if ($field_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            }
            if (isset($contact->field_defs[$colsFirstField]['isMultiSelect']) && $contact->field_defs[$colsFirstField]['isMultiSelect'] == 1) {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><select id='{$field_name}' multiple='true' name='{$field_name}[]' tabindex='1'>$contact_options</select></span sugar='slot'></td>";
            } elseif (ifRadioButton($contact->field_defs[$colsFirstField]['name'])) {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'>";
                foreach ($app_list_strings[$field_options] as $field_option_key => $field_option) {
                    if ($field_option != null) {
                        if (!empty($contact->$field_name) && in_array($field_option_key, unencodeMultienum($contact->$field_name))) {
                            $Web_To_Contact_Form_html .= "<input id='$colsFirstField" . "_$field_option_key' checked name='$colsFirstField' value='$field_option_key' type='radio'>";
                        } else {
                            $Web_To_Contact_Form_html .= "<input id='$colsFirstField" . "_$field_option_key' name='$colsFirstField' value='$field_option_key' type='radio'>";
                        }
                        $Web_To_Contact_Form_html .= "<span ='document.getElementById('" . $contact->field_defs[$colsFirstField] . "_$field_option_key').checked =true style='cursor:default'; onmousedown='return false;'>$field_option</span><br>";
                    }
                }
                $Web_To_Contact_Form_html .= "</span sugar='slot'></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><select id=$field_name name=$field_name tabindex='1'>$contact_options</select></span sugar='slot'></td>";
            }
        }
        if ($field_type == 'bool') {
            if ($field_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            }
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input type='checkbox' id=$field_name name=$field_name></span sugar='slot'></td>";
            if (!in_array($contact->field_defs[$colsFirstField]['name'], $bool_fields)) {
                array_push($bool_fields, $contact->field_defs[$colsFirstField]['name']);
            }
        }
        if ($field_type == 'date') {

            global $timedate;
            $cal_dateformat = $timedate->get_cal_date_format();
            $LBL_ENTER_DATE = translate('LBL_ENTER_DATE', 'Charts');
            if ($field_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            }

            $Web_To_Contact_Form_html .= "
				<td width='35%' style='font-size: 12px; font-weight: normal;'>
				<script type='text/javascript'>
					update{$field_name}Value = function() {
						var format = '{$cal_dateformat}';
						var month = document.getElementById('{$field_name}_month').value;
						var day = document.getElementById('{$field_name}_day').value;
						var year = document.getElementById('{$field_name}_year').value;
						var val = format.replace('%m', month).replace('%d', day).replace('%Y', year);
						if (!parseInt(month) > 0 || !parseInt(year) > 0 || !parseInt(year) > 0)
							val = '';
						document.getElementById('{$field_name}').value = val;
					}
				</script>
				<span sugar='slot'><input type='hidden' id='{$field_name}' name='{$field_name}'/>";
            $order = explode("%", $cal_dateformat);
            foreach ($order as $part) {
                if (!isset($part[0]))
                    continue;
                if (strToUpper($part[0]) == "M")
                    $Web_To_Contact_Form_html .= translate("LBL_MONTH") . ":<input class=\"text\"
					name=\"{$field_name}_month\" size='2' maxlength='2' id='{$field_name}_month' value=''
					onblur=\"update{$field_name}Value()\">";
                else if (strToUpper($part[0]) == "D")
                    $Web_To_Contact_Form_html .= translate("LBL_DAY") . ":<input class=\"text\"
					name=\"{$field_name}_day\" size='2' maxlength='2' id='{$field_name}_day' value=''
					onblur=\"update{$field_name}Value()\">";
                else if (strToUpper($part[0]) == "Y")
                    $Web_To_Contact_Form_html .= translate("LBL_YEAR") . ":<input class=\"text\"
					name=\"{$field_name}_year\" size='4' maxlength='4' id='{$field_name}_year' value=''
					onblur=\"update{$field_name}Value()\">";
            }
            $Web_To_Contact_Form_html .= "</span></td>";
        } // if

        if ($field_type == 'varchar' || $field_type == 'name'
            || $field_type == 'phone' || $field_type == 'currency' || $field_type == 'url' || $field_type == 'int'
        ) {
            if ($field_name == 'last_name' || $field_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            }
            if ($field_name == 'email1' || $field_name == 'email2') {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field_name name=$field_name type='text' onchange='validateEmailAdd();'></span sugar='slot'></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field_name name=$field_name type='text'></span sugar='slot'></td>";
            }
        }
        if ($field_type == 'text') {
            $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span id='ta_replace' sugar='slot'><input id=$field_name name=$field_name type='text'></span sugar='slot'></td>";
        }
        if ($field_type == 'relate' && $field_name == 'account_name') {
            $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field_name name=$field_name type='text'></span sugar='slot'></td>";
        }
        if ($field_type == 'email') {
            if ($field_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field_label</span sugar='slot'></td>";
            }
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field_name name=$field_name type='text' onchange='validateEmailAdd();'></span sugar='slot'></td>";
        }
    } else {
        $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>&nbsp</span sugar='slot'></td>";
        $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'>&nbsp</span sugar='slot'></td>";
    }

    if (isset($contact->field_defs[$colsSecondField]) && $contact->field_defs[$colsSecondField] != null) {
        if ($field1_type == 'multienum' || $field1_type == 'enum' || $field1_type == 'radioenum') {
            $contact1_options = '';
            if (!empty($contact->$field1_name)) {
                $contact1_options = get_select_options_with_id($app_list_strings[$field1_options], unencodeMultienum($contact->$field1_name));
            } else {
                $contact1_options = get_select_options_with_id($app_list_strings[$field1_options], '');
            }
            if ($field1_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            }
            if (isset($contact->field_defs[$colsSecondField]['isMultiSelect']) && $contact->field_defs[$colsSecondField]['isMultiSelect'] == 1) {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><select id='{$field1_name}' name='{$field1_name}[]' multiple='true' tabindex='1'>$contact1_options</select></span sugar='slot'></td>";
            } elseif (ifRadioButton($contact->field_defs[$colsSecondField]['name'])) {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'>";
                foreach ($app_list_strings[$field1_options] as $field_option_key => $field_option) {
                    if ($field_option != null) {
                        if (!empty($contact->$field1_name) && in_array($field_option_key, unencodeMultienum($contact->$field1_name))) {
                            $Web_To_Contact_Form_html .= "<input id='$colsSecondField" . "_$field_option_key' checked name='$colsSecondField' value='$field_option_key' type='radio'>";
                        } else {
                            $Web_To_Contact_Form_html .= "<input id='$colsSecondField" . "_$field_option_key' name='$colsSecondField' value='$field_option_key' type='radio'>";
                        }
                        $Web_To_Contact_Form_html .= "<span ='document.getElementById('" . $contact->field_defs[$colsSecondField] . "_$field_option_key').checked =true style='cursor:default'; onmousedown='return false;'>$field_option</span><br>";
                    }
                }
                $Web_To_Contact_Form_html .= "</span sugar='slot'></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><select id=$field1_name name=$field1_name tabindex='1'>$contact1_options</select></span sugar='slot'></td>";
            }
        }
        if ($field1_type == 'bool') {
            if ($field1_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            }
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field1_name name=$field1_name type='checkbox'></span sugar='slot'></td>";
            if (!in_array($contact->field_defs[$colsSecondField]['name'], $bool_fields)) {
                array_push($bool_fields, $contact->field_defs[$colsSecondField]['name']);
            }
        }
        if ($field1_type == 'date') {
            global $timedate;
            $cal_dateformat = $timedate->get_cal_date_format();
            $LBL_ENTER_DATE = translate('LBL_ENTER_DATE', 'Charts');
            if ($field1_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            }
            $Web_To_Contact_Form_html .= " 
				<td width='35%' style='font-size: 12px; font-weight: normal;'>
				<script type='text/javascript'>
					update{$field1_name}Value = function() {
						var format = '{$cal_dateformat}';
						var month = document.getElementById('{$field1_name}_month').value;
						var day = document.getElementById('{$field1_name}_day').value;
						var year = document.getElementById('{$field1_name}_year').value;
						var val = format.replace('%m', month).replace('%d', day).replace('%Y', year);
						if (!parseInt(month) > 0 || !parseInt(year) > 0 || !parseInt(year) > 0)
							val = '';
						document.getElementById('{$field1_name}').value = val;
					}
				</script>
				<span sugar='slot'><input type='hidden' id='{$field1_name}' name='{$field1_name}'/>";
            $order = explode("%", $cal_dateformat);
            foreach ($order as $part) {
                if (!isset($part[0]))
                    continue;
                if (strToUpper($part[0]) == "M")
                    $Web_To_Contact_Form_html .= translate("LBL_MONTH") . ":<input class=\"text\"
					name=\"{$field1_name}_month\" size='2' maxlength='2' id='{$field1_name}_month' value='' 
					onblur=\"update{$field1_name}Value()\">";
                else if (strToUpper($part[0]) == "D")
                    $Web_To_Contact_Form_html .= translate("LBL_DAY") . ":<input class=\"text\"
					name=\"{$field1_name}_day\" size='2' maxlength='2' id='{$field1_name}_day' value='' 
					onblur=\"update{$field1_name}Value()\">";
                else if (strToUpper($part[0]) == "Y")
                    $Web_To_Contact_Form_html .= translate("LBL_YEAR") . ":<input class=\"text\"
					name=\"{$field1_name}_year\" size='4' maxlength='4' id='{$field1_name}_year' value='' 
					onblur=\"update{$field1_name}Value()\">";
            }
            $Web_To_Contact_Form_html .= "</span></td>";
        } // if
        if ($field1_type == 'varchar' || $field1_type == 'name'
            || $field1_type == 'phone' || $field1_type == 'currency' || $field1_type == 'url' || $field1_type == 'int'
        ) {
            if ($field1_name == 'last_name' || $field1_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            }
            if ($field1_name == 'email1' || $field1_name == 'email2') {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field1_name name=$field1_name type='text' onchange='validateEmailAdd();'></span sugar='slot'></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field1_name name=$field1_name type='text'></span sugar='slot'></td>";
            }

        }
        if ($field1_type == 'text') {
            $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span id='ta_replace' sugar='slot'><input id=$field1_name name=$field1_name type='text'></span sugar='slot'></td>";
        }
        if ($field1_type == 'relate' && $field1_name == 'account_name') {
            $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field1_name name=$field1_name type='text'></span sugar='slot'></td>";
        }
        if ($field1_type == 'email') {
            if ($field1_required) {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'><span class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td>";
            } else {
                $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>$field1_label</span sugar='slot'></td>";
            }
            $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'><input id=$field1_name name=$field1_name type='text' onchange='validateEmailAdd();'></span sugar='slot'></td>";
        }
    } else {
        $Web_To_Contact_Form_html .= "<td width='15%' style='text-align: left; font-size: 12px; font-weight: normal;'><span sugar='slot'>&nbsp</span sugar='slot'></td>";
        $Web_To_Contact_Form_html .= "<td width='35%' style='font-size: 12px; font-weight: normal;'><span sugar='slot'>&nbsp</span sugar='slot'></td>";
    }
    $Web_To_Contact_Form_html .= "</tr>";
}

//OPENSYMBOLMOD paolo.santacatterina (16/05/16  16.52)
//*************************************************************
$Web_To_Contact_Form_html .= "<tr><td colspan='4'></td></tr><tr><td style='text-align: left; font-size: 12px; font-weight: bold;' width='15%'><span>".translate('LBL_ARE_YOU_A_MEMBER').": </span></td><td style='font-size: 12px; font-weight: normal;' width='35%'>
<span><select id='check_member' type='text' name='check_member'>
<option value='0'>No</option>
<option value='1'>Yes</option>
</select></span></td><td colspan=2>&nbsp;</td></tr>";
//*************************************************************

// OPENSYMBOLMOD - 20160427 Alberto Guiotto - Always add Account textbox, to allow user put given code for its company
$Web_To_Contact_Form_html .= "<tr><td colspan='4'></td></tr><tr><td style='text-align: left; font-size: 12px; font-weight: bold;' width='15%'><span id='label_company_code'>".translate('LBL_COMPANY_CODE').": </span><span id='required_company_code' class='required' style='color: rgb(255, 0, 0);'>$web_required_symbol</span></td><td style='font-size: 12px; font-weight: normal;' width='35%'><span><input id='account_code' type='text' name='account_code'></span></td><td colspan=2>&nbsp;</td></tr>";
// END OPENSYMBOLMOD


$Web_To_Contact_Form_html .= "<tr align='center' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 18px; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>&nbsp</TD></tr>";

if (!empty($web_form_footer)) {
    $Web_To_Contact_Form_html .= "<tr align='center' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 18px; font-weight: bold; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>&nbsp</TD></tr>";
    $Web_To_Contact_Form_html .= "<tr align='left' style='color: rgb(0, 105, 225); font-family: Arial,Verdana,Helvetica,sans-serif; font-size: 12px; font-weight: normal; margin-bottom: 0px; margin-top: 0px;'><TD COLSPAN='4'>$web_form_footer</TD></tr>";
}

$Web_To_Contact_Form_html .= "<tr align='center'><td colspan='10'><input type='button' onclick='submit_form();' class='button' name='Submit' value='$web_form_submit_label'/></td></tr>";

if (!empty($web_form_event)) {
    $Web_To_Contact_Form_html .= "<tr><td style='display: none'><input type='hidden' id='event_id' name='event_id' value='$web_form_event'></td></tr>";
}
if (!empty($web_redirect_url)) {
    $Web_To_Contact_Form_html .= "<tr><td style='display: none'><input type='hidden' id='redirect_url' name='redirect_url' value='$web_redirect_url'></td></tr>";
}
if (!empty($web_assigned_user)) {
    $Web_To_Contact_Form_html .= "<tr><td style='display: none'><input type='hidden' id='assigned_user_id' name='assigned_user_id' value='$web_assigned_user'></td></tr>";
}
$req_fields = '';
if (isset($required_fields) && $required_fields != null) {
    foreach ($required_fields as $req) {
        $req_fields = $req_fields . $req . ';';
    }
}
$boolean_fields = '';
if (isset($bool_fields) && $bool_fields != null) {
    foreach ($bool_fields as $boo) {
        $boolean_fields = $boolean_fields . $boo . ';';
    }
}
if (!empty($req_fields)) {
    $Web_To_Contact_Form_html .= "<tr><td style='display: none'><input type='hidden' id='req_id' name='req_id' value='$req_fields'></td></tr>";
}
if (!empty($boolean_fields)) {
    $Web_To_Contact_Form_html .= "<tr><td style='display: none'><input type='hidden' id='bool_id' name='bool_id' value='$boolean_fields'></td></tr>";
}


$Web_To_Contact_Form_html .= "</table >";
$Web_To_Contact_Form_html .= "</form>";

$Web_To_Contact_Form_html .= "<script type='text/javascript'>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('account_code').style.display = 'none';
        document.getElementById('label_company_code').style.display = 'none';
        var style_required = document.getElementById('required_company_code').style;
        document.getElementById('required_company_code').style.display = 'none';
        var temp = document.getElementById('req_id').value;
        var check_memberEl = document.getElementById('check_member');
            check_memberEl.addEventListener('change', function() {                
                if(this.value == 1){
                    document.getElementById('account_code').removeAttribute('style');
                    document.getElementById('label_company_code').removeAttribute('style');                   
                    document.getElementById('required_company_code').style = style_required;             
                    document.getElementById('req_id').value += 'account_code;';
                }
                else{
                    document.getElementById('account_code').style.display = 'none';
                    document.getElementById('label_company_code').style.display = 'none';
                    document.getElementById('required_company_code').style.display = 'none';
                    document.getElementById('req_id').value = temp;
                }
         });
    }, false);

 function submit_form(){
 	if(typeof(validateCaptchaAndSubmit)!='undefined'){
 		validateCaptchaAndSubmit();
 	}else{
 		check_webtocontact_fields();
 	}
 }
 function check_webtocontact_fields(){
     if(document.getElementById('bool_id') != null){
        var reqs=document.getElementById('bool_id').value;
        bools = reqs.substring(0,reqs.lastIndexOf(';'));
        var bool_fields = new Array();
        var bool_fields = bools.split(';');
        nbr_fields = bool_fields.length;
        for(var i=0;i<nbr_fields;i++){
          if(document.getElementById(bool_fields[i]).value == 'on'){
             document.getElementById(bool_fields[i]).value = 1;
          }
          else{
             document.getElementById(bool_fields[i]).value = 0;
          }
        }
      }
    if(document.getElementById('req_id') != null){
        var reqs=document.getElementById('req_id').value;
        reqs = reqs.substring(0,reqs.lastIndexOf(';'));
        var req_fields = new Array();
        var req_fields = reqs.split(';');
        nbr_fields = req_fields.length;
        var req = true;
        for(var i=0;i<nbr_fields;i++){
          if(document.getElementById(req_fields[i]).value.length <=0 || document.getElementById(req_fields[i]).value==0){
           req = false;
           break;
          }
        }
        if(req){
            document.WebToContactForm.submit();
            return true;
        }
        else{
          alert('$web_form_required_fileds_msg');
          return false;
         }
        return false
   }
   else{
    document.WebToContactForm.submit();
   }
}
function validateEmailAdd(){
	if(document.getElementById('email1') && document.getElementById('email1').value.length >0) {
		if(document.getElementById('email1').value.match($regex) == null){
		  alert('$web_not_valid_email_address');
		}
	}
	if(document.getElementById('email2') && document.getElementById('email2').value.length >0) {
		if(document.getElementById('email2').value.match($regex) == null){
		  alert('$web_not_valid_email_address');
		}
	}
}
</script>";

if (isset($Web_To_Contact_Form_html)) $xtpl->assign("BODY", $Web_To_Contact_Form_html); else $xtpl->assign("BODY", "");
if (isset($Web_To_Contact_Form_html)) $xtpl->assign("BODY_HTML", $Web_To_Contact_Form_html); else $xtpl->assign("BODY_HTML", "");


require_once('include/SugarTinyMCE.php');
$tiny = new SugarTinyMCE();
$tiny->defaultConfig['height'] = 400;
$tiny->defaultConfig['apply_source_formatting'] = true;
$tiny->defaultConfig['cleanup'] = false;
$ed = $tiny->getInstance('body_html');
$xtpl->assign("tiny", $ed);

$xtpl->parse("main.textarea");

$xtpl->assign("INSERT_VARIABLE_ONCLICK", "insert_variable_html(document.EditView.variable_text.value)");
$xtpl->parse("main.variable_button");


$xtpl->parse("main");
$xtpl->out("main");

function ifRadioButton($customFieldName)
{
    $custRow = null;
    $query = "select id,type from fields_meta_data where deleted = 0 and name = '$customFieldName'";
    $result = $GLOBALS['db']->query($query);
    $row = $GLOBALS['db']->fetchByAssoc($result);
    if ($row != null && $row['type'] == 'radioenum') {
        return $custRow = $row;
    }
    return $custRow;
}

?>
