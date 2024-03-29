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

$listViewDefs ['Contacts'] = array (
		'NAME' => array (
				'width' => '20%',
				'label' => 'LBL_LIST_NAME',
				'link' => true,
				'contextMenu' => array (
						'objectType' => 'sugarPerson',
						'metaData' => array (
								'contact_id' => '{$ID}',
								'module' => 'Contacts',
								'return_action' => 'ListView',
								'contact_name' => '{$FULL_NAME}',
								'parent_id' => '{$ACCOUNT_ID}',
								'parent_name' => '{$ACCOUNT_NAME}',
								'return_module' => 'Contacts',
								'parent_type' => 'Account',
								'notes_parent_type' => 'Account'
						)
				),
				'orderBy' => 'name',
				'default' => true,
				'related_fields' => array (
						0 => 'first_name',
						1 => 'last_name',
						2 => 'salutation',
						3 => 'account_name',
						4 => 'account_id'
				)
		),
		'ACCOUNT_NAME' => array (
				'width' => '34%',
				'label' => 'LBL_LIST_ACCOUNT_NAME',
				'module' => 'Accounts',
				'id' => 'ACCOUNT_ID',
				'link' => true,
				'contextMenu' => array (
						'objectType' => 'sugarAccount',
						'metaData' => array (
								'return_module' => 'Contacts',
								'return_action' => 'ListView',
								'module' => 'Accounts',
								'parent_id' => '{$ACCOUNT_ID}',
								'parent_name' => '{$ACCOUNT_NAME}',
								'account_id' => '{$ACCOUNT_ID}',
								'account_name' => '{$ACCOUNT_NAME}'
						)
				),
				'default' => true,
				'sortable' => true,
				'ACLTag' => 'ACCOUNT',
				'related_fields' => array (
						0 => 'account_id'
				)
		),
		'ROLE_FUNCTION' => array (
				'type' => 'enum',
				'label' => 'LBL_ROLE_FUNCTION',
				'width' => '10%',
				'default' => true
		),
		'VIP' => array (
				'type' => 'bool',
				'label' => 'LBL_VIP',
				'width' => '10%',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 12:09:52
		// *************************************************

		// 'CATEGORY' => array (
		// 'type' => 'enum',
		// 'label' => 'LBL_CATEGORY',
		// 'width' => '10%',
		// 'default' => true
		// ),

		// 'CONTACT_TYPE' => array (
		// 'type' => 'enum',
		// 'label' => 'LBL_CONTACT_TYPE',
		// 'width' => '10%',
		// 'default' => true
		// ),

		'INDUSTRY' => array (
				'type' => 'multienum',
				'label' => 'LBL_INDUSTRY',
				'width' => '20%',
				'default' => true
		),
		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'EMAIL1' => array (
				'width' => '15%',
				'label' => 'LBL_LIST_EMAIL_ADDRESS',
				'sortable' => false,
				'link' => true,
				'default' => true
		),
		'PHONE_WORK' => array (
				'width' => '15%',
				'label' => 'LBL_OFFICE_PHONE',
				'default' => true
		),
		// OPENSYMBOLMOD - START - davide.dallapozza - 12:11:44
		// *************************************************
		/*
		 * 'ASSIGNED_USER_NAME' => array ( 'width' => '10%', 'label' => 'LBL_LIST_ASSIGNED_USER', 'module' => 'Employees', 'id' => 'ASSIGNED_USER_ID', 'default' => true ), 'DATE_ENTERED' => array ( 'width' => '10%', 'label' => 'LBL_DATE_ENTERED', 'default' => true ),
		 */
		// OPENSYMBOLMOD - END - davide.dallapozza
		// *************************************************
		'DEPARTMENT' => array (
				'width' => '10%',
				'label' => 'LBL_DEPARTMENT',
				'default' => false
		),
		'TITLE' => array (
				'width' => '15%',
				'label' => 'LBL_LIST_TITLE',
				'default' => false
		),
		'DO_NOT_CALL' => array (
				'width' => '10%',
				'label' => 'LBL_DO_NOT_CALL',
				'default' => false
		),
		'PHONE_HOME' => array (
				'width' => '10%',
				'label' => 'LBL_HOME_PHONE',
				'default' => false
		),
		'PHONE_MOBILE' => array (
				'width' => '10%',
				'label' => 'LBL_MOBILE_PHONE',
				'default' => false
		),
		'PHONE_OTHER' => array (
				'width' => '10%',
				'label' => 'LBL_OTHER_PHONE',
				'default' => false
		),
		'PHONE_FAX' => array (
				'width' => '10%',
				'label' => 'LBL_FAX_PHONE',
				'default' => false
		),
		'EMAIL2' => array (
				'width' => '15%',
				'label' => 'LBL_LIST_EMAIL_ADDRESS',
				'sortable' => false,
				'customCode' => '{$EMAIL2_LINK}{$EMAIL2}</a>',
				'default' => false
		),
		'PRIMARY_ADDRESS_STREET' => array (
				'width' => '10%',
				'label' => 'LBL_PRIMARY_ADDRESS_STREET',
				'default' => false
		),
		'PRIMARY_ADDRESS_CITY' => array (
				'width' => '10%',
				'label' => 'LBL_PRIMARY_ADDRESS_CITY',
				'default' => false
		),
		'PRIMARY_ADDRESS_STATE' => array (
				'width' => '10%',
				'label' => 'LBL_PRIMARY_ADDRESS_STATE',
				'default' => false
		),
		'PRIMARY_ADDRESS_POSTALCODE' => array (
				'width' => '10%',
				'label' => 'LBL_PRIMARY_ADDRESS_POSTALCODE',
				'default' => false
		),
		'ALT_ADDRESS_COUNTRY' => array (
				'width' => '10%',
				'label' => 'LBL_ALT_ADDRESS_COUNTRY',
				'default' => false
		),
		'ALT_ADDRESS_STREET' => array (
				'width' => '10%',
				'label' => 'LBL_ALT_ADDRESS_STREET',
				'default' => false
		),
		'ALT_ADDRESS_CITY' => array (
				'width' => '10%',
				'label' => 'LBL_ALT_ADDRESS_CITY',
				'default' => false
		),
		'ALT_ADDRESS_STATE' => array (
				'width' => '10%',
				'label' => 'LBL_ALT_ADDRESS_STATE',
				'default' => false
		),
		'ALT_ADDRESS_POSTALCODE' => array (
				'width' => '10%',
				'label' => 'LBL_ALT_ADDRESS_POSTALCODE',
				'default' => false
		),
		'CREATED_BY_NAME' => array (
				'width' => '10%',
				'label' => 'LBL_CREATED',
				'default' => false
		),
		'MODIFIED_BY_NAME' => array (
				'width' => '10%',
				'label' => 'LBL_MODIFIED',
				'default' => false
		),
		'SYNC_CONTACT' => array (
				'type' => 'bool',
				'label' => 'LBL_SYNC_CONTACT',
				'width' => '10%',
				'default' => false,
				'sortable' => false
		)
);
?>
