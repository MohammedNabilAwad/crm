<?php
// created: 2013-04-29 16:01:12
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

global $app_strings;
$subpanel_layout['list_fields'] = array(
    'checkbox' =>
        array(
            'vname' =>  'LBL_Blank',
            'widget_type' => 'checkbox',
            'widget_class' => 'SubPanelCheck',
            'checkbox_value' => true,
            'width' => '5%',
            'sortable' => false,
            'default' => true,
        ),
    'panel_name' =>
        array(
            'name' => 'panel_name',
            'vname' => 'LBL_PANEL_NAME',
            'width' => '8%',
            'default' => true,
        ),
    'name' =>
        array(
            'vname' => 'LBL_LIST_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'sort_order' => 'asc',
            'sort_by' => 'last_name',
            'module' => 'Leads',
            'width' => '20%',
            'default' => true,
        ),
    'phone_work' =>
        array(
            'vname' => 'LBL_LIST_PHONE',
            'width' => '10%',
            'default' => true,
        ),
    'email1' =>
        array(
            'vname' => 'LBL_LIST_EMAIL_ADDRESS',
            'width' => '10%',
            'widget_class' => 'SubPanelEmailLink',
            'sortable' => false,
            'default' => true,
        ),
    'event_status_name' =>
        array(
            'vname' => 'LBL_STATUS',
            'width' => '10%',
            'sortable' => false,
            'default' => true,
        ),
    'event_accept_status' =>
        array(
            'width' => '10%',
            'sortable' => false,
            'default' => true,
            'vname' => 'LBL_ACCEPT_STATUS',
        ),
    'osy_payment_status' =>
        array(
            'vname' => 'LBL_PAYMENT_STATUS',
            'sortable' => false,
            'default' => true,
        ),
    'osy_cost' =>
        array(
            'vname' => 'LBL_COST',
            'width' => '10%',
            'sortable' => false,
            'default' => true,
        ),
    'edit_button' =>
        array(
            'vname' => 'LBL_EDIT_BUTTON',
            'widget_class' => 'SubPanelEditButton',
            'module' => 'Leads',
            'width' => '4%',
            'default' => true,
        ),
    'remove_button' =>
        array(
            'vname' => 'LBL_REMOVE',
            'widget_class' => 'SubPanelRemoveButton',
            'module' => 'Leads',
            'width' => '4%',
            'default' => true,
        ),
    'e_accept_status_fields' =>
        array(
            'usage' => 'query_only',
        ),
    'event_status_id' =>
        array(
            'usage' => 'query_only',
        ),
    'e_invite_status_fields' =>
        array(
            'usage' => 'query_only',
        ),
    'event_invite_id' =>
        array(
            'usage' => 'query_only',
        ),
    'payment_status_fields' =>
        array(
            'usage' => 'query_only',
        ),
    'payment_status_id' =>
        array(
            'usage' => 'query_only',
        ),
    'cost_fields' =>
        array(
            'usage' => 'query_only',
        ),
    'cost_id' =>
        array(
            'usage' => 'query_only',
        ),

    'first_name' =>
        array(
            'usage' => 'query_only',
        ),
    'last_name' =>
        array(
            'usage' => 'query_only',
        ),
    'salutation' =>
        array(
            'name' => 'salutation',
            'usage' => 'query_only',
        ),
);