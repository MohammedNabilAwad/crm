<?php
// created: 2012-12-10 10:14:52
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

$subpanel_layout ['list_fields'] = array (
		'name' => array (
				'name' => 'name',
				'vname' => 'LBL_LIST_NAME',
				'widget_class' => 'SubPanelDetailViewLink',
				'module' => 'Contacts',
				'width' => '43%',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 10:48:15
		// *************************************************

		'role_function' => array (
				'type' => 'enum',
				'vname' => 'LBL_ROLE_FUNCTION',
				'width' => '10%',
				'default' => true
		),

		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'primary_address_city' => array (
				'name' => 'primary_address_city',
				'vname' => 'LBL_LIST_CITY',
				'width' => '20%',
				'default' => true
		),
		'email1' => array (
				'name' => 'email1',
				'vname' => 'LBL_LIST_EMAIL',
				'widget_class' => 'SubPanelEmailLink',
				'width' => '30%',
				'sortable' => false,
				'default' => true
		),
		'phone_work' => array (
				'name' => 'phone_work',
				'vname' => 'LBL_LIST_PHONE',
				'width' => '15%',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 10:49:09
		// *************************************************
		/*

		'category' => array (
				'type' => 'enum',
				'vname' => 'LBL_CATEGORY',
				'width' => '10%',
				'default' => true
		),
		'contact_type' => array (
				'type' => 'enum',
				'vname' => 'LBL_CONTACT_TYPE',
				'width' => '10%',
				'default' => true
		),

		*/
		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'edit_button' => array (
				'vname' => 'LBL_EDIT_BUTTON',
				'widget_class' => 'SubPanelEditButton',
				'module' => 'Contacts',
				'width' => '5%',
				'default' => true
		),
		'remove_button' => array (
				'vname' => 'LBL_REMOVE',
				'widget_class' => 'SubPanelRemoveButton',
				'module' => 'Contacts',
				'width' => '5%',
				'default' => true
		),
		'first_name' => array (
				'name' => 'first_name',
				'usage' => 'query_only'
		),
		'last_name' => array (
				'name' => 'last_name',
				'usage' => 'query_only'
		),
		'salutation' => array (
				'name' => 'salutation',
				'usage' => 'query_only'
		)
);