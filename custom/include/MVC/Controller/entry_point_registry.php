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

$entry_point_registry['formLetter'] = array('file' => 'modules/AOS_PDF_Templates/formLetterPdf.php' , 'auth' => '1'); 
$entry_point_registry['generatePdf'] = array('file' => 'modules/AOS_PDF_Templates/generatePdf.php' , 'auth' => '1'); 
$entry_point_registry['Reschedule'] = array('file' => 'modules/Calls_Reschedule/Reschedule_popup.php' , 'auth' => '1'); 
$entry_point_registry['Reschedule2'] = array('file' => 'custom/modules/Calls/Reschedule.php' , 'auth' => '1');
$entry_point_registry['social'] = array('file' => 'include/social/get_data.php' , 'auth' => '1');
$entry_point_registry['social_reader'] = array('file' => 'include/social/get_feed_data.php' , 'auth' => '1');
$entry_point_registry['add_dash_page'] = array('file' => 'modules/Home/AddDashboardPages.php' , 'auth' => '1');
$entry_point_registry['remove_dash_page'] = array('file' => 'modules/Home/RemoveDashboardPages.php' , 'auth' => '1');
$entry_point_registry['rename_dash_page'] = array('file' => 'modules/Home/RenameDashboardPages.php' , 'auth' => '1');

$entry_point_registry ['exportActivities'] = array (
    'file' => 'custom/modules/Accounts/exportActivities.php',
    'auth' => false
);
$entry_point_registry ['exportCSV'] = array (
    'file' => 'custom/modules/Accounts/exportCSV.php',
    'auth' => false
);
$entry_point_registry ['osy_exportOppServCompanies'] = array (
    'file' => 'custom/include/osy_exportOppServCompanies.php',
    'auth' => false
);
$entry_point_registry ['osy_exportGroupActivitiesFees'] = array (
    'file' => 'custom/include/osy_exportGroupActivitiesFees.php',
    'auth' => false
);
$entry_point_registry ['osy_exportLists'] = array (
    'file' => 'custom/include/osy_exportLists.php',
    'auth' => false
);
// Web to contact
$entry_point_registry ['WebToContactCapture'] = array('file' => 'custom/modules/FP_events/WebToContactCapture.php', 'auth' => false);

$entry_point_registry ['osy_exportEvents'] = array (
    'file' => 'custom/include/osy_exportEvents.php',
    'auth' => false
);

$entry_point_registry ['osy_exportEvents'] = array (
    'file' => 'custom/include/osy_exportEvents.php',
    'auth' => false
);

$entry_point_registry ['responseEntryPoint'] = array (
    'file' => 'custom/modules/FP_events/responseEntryPoint.php',
    'auth' => false
);

$entry_point_registry ['WebToPersonCapture'] = array('file' => 'custom/modules/Campaigns/osySetAccount.php', 'auth' => false);
$entry_point_registry ['campaign_trackerv2'] = array('file' => 'custom/modules/Campaigns/Tracker.php', 'auth' => false);

?>