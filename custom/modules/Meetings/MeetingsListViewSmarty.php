<?php
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

require_once('include/ListView/ListViewSmarty.php');

// custom/modules/Meetings/MeetingsListViewSmarty.php

class MeetingsListViewSmarty extends ListViewSmarty {

    function MeetingsListViewSmarty() {

//        parent::ListViewSmarty();
        parent::__construct();
    }

    function buildExportLink($id = 'export_link') {

        global $app_strings;
        global $sugar_config;

        if (preg_match('/^6\.[2-4]/', $sugar_config['sugar_version'])) { // Older v6.2-6.4

            $script = "<a href='#' style='width: 150px' class='menuItem' onmouseover='hiliteItem(this,\"yes\");' " .
                    "onmouseout='unhiliteItem(this);' onclick=\"return sListView.send_form(true, '{$_REQUEST['module']}', " .
                    "'index.php?entryPoint=export','{$app_strings['LBL_LISTVIEW_NO_SELECTED']}')\">{$app_strings['LBL_EXPORT']}</a>" .
                    "<a href='#' style='width: 150px' class='menuItem' onmouseover='hiliteItem(this,\"yes\");' " .
                    "onmouseout='unhiliteItem(this);' onclick=\"return sListView.send_form(true, 'jjwg_Maps', " .
                    "'index.php?entryPoint=jjwg_Maps&display_module={$_REQUEST['module']}', " .
                    "'{$app_strings['LBL_LISTVIEW_NO_SELECTED']}')\">{$app_strings['LBL_MAP']}</a>";
                    
        } else { // Newer v6.5+
            
            $script = "<a href='javascript:void(0)' id='export_listview_top' ".
                    "onclick=\"return sListView.send_form(true, '{$_REQUEST['module']}', " .
                    "'index.php?entryPoint=export', " . 
                    "'{$app_strings['LBL_LISTVIEW_NO_SELECTED']}')\">{$app_strings['LBL_EXPORT']}</a>" .
                    "</li><li>". // List item hack
                    "<a href='javascript:void(0)' id='map_listview_top' " .
                    " onclick=\"return sListView.send_form(true, 'jjwg_Maps', " .
                    "'index.php?entryPoint=jjwg_Maps&display_module={$_REQUEST['module']}', " .
                    "'{$app_strings['LBL_LISTVIEW_NO_SELECTED']}')\">{$app_strings['LBL_MAP']}</a>";
        }

        return $script;
    }

}

?>
