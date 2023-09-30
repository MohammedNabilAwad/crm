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

$popupMeta = array (
    'moduleMain' => 'Contact',
    'varName' => 'CONTACT',
    'orderBy' => 'contacts.first_name, contacts.last_name',
    'whereClauses' => array (
  'first_name' => 'contacts.first_name',
  'last_name' => 'contacts.last_name',
  'account_name' => 'accounts.name',
  'primary_address_city' => 'contacts.primary_address_city',
  'billing_address_region_c' => 'contacts_cstm.billing_address_region_c',
  'gender_c' => 'contacts_cstm.gender_c',
  'role_function' => 'contacts.role_function',
  'category' => 'contacts.category',
  'vip' => 'contacts.vip',
  'email' => 'contacts.email',
  'assigned_user_id' => 'contacts.assigned_user_id',
  'committees' => 'contacts.committees',
  'industry' => 'contacts.industry',
),
    'searchInputs' => array (
  0 => 'first_name',
  1 => 'last_name',
  2 => 'account_name',
  3 => 'email',
  4 => 'primary_address_city',
  5 => 'billing_address_region_c',
  6 => 'gender_c',
  7 => 'role_function',
  8 => 'category',
  9 => 'vip',
  10 => 'assigned_user_id',
  11 => 'committees',
  12 => 'industry',
),
    'create' => array (
  'formBase' => 'ContactFormBase.php',
  'formBaseClass' => 'ContactFormBase',
  'getFormBodyParams' =>
  array (
    0 => '',
    1 => '',
    2 => 'ContactSave',
  ),
  'createButton' => 'LNK_NEW_CONTACT',
),
    'searchdefs' => array (
  'first_name' =>
  array (
    'name' => 'first_name',
    'width' => '10%',
  ),
  'last_name' =>
  array (
    'name' => 'last_name',
    'width' => '10%',
  ),
  'account_name' =>
  array (
    'name' => 'account_name',
    'type' => 'varchar',
    'width' => '10%',
  ),
  'primary_address_city' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_PRIMARY_ADDRESS_CITY',
    'width' => '10%',
    'name' => 'primary_address_city',
  ),
  'billing_address_region_c' =>
  array (
    'type' => 'varchar',
    'label' => 'LBL_BILLING_ADDRESS_REGION',
    'width' => '10%',
    'name' => 'billing_address_region_c',
  ),
  'vip' =>
  array (
    'type' => 'bool',
    'label' => 'LBL_VIP',
    'width' => '10%',
    'name' => 'vip',
  ),
  'gender_c' =>
  array (
    'type' => 'enum',
    'studio' => 'visible',
    'label' => 'LBL_GENDER',
    'width' => '10%',
    'name' => 'gender_c',
  ),
  'role_function' =>
  array (
    'type' => 'enum',
    'label' => 'LBL_ROLE_FUNCTION',
    'width' => '10%',
    'name' => 'role_function',
  ),
  'industry' =>
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_INDUSTRY',
    'width' => '10%',
    'name' => 'industry',
  ),
  'category' =>
  array (
    'type' => 'enum',
    'label' => 'LBL_CATEGORY',
    'width' => '10%',
    'name' => 'category',
  ),
  'committees' =>
  array (
    'type' => 'multienum',
    'studio' => 'visible',
    'label' => 'LBL_COMMITTEES',
    'width' => '10%',
    'name' => 'committees',
  ),
  'email' =>
  array (
    'name' => 'email',
    'width' => '10%',
  ),
  'assigned_user_id' =>
  array (
    'name' => 'assigned_user_id',
    'type' => 'enum',
    'label' => 'LBL_ASSIGNED_TO',
    'function' =>
    array (
      'name' => 'get_user_array',
      'params' =>
      array (
        0 => false,
      ),
    ),
    'width' => '10%',
  ),
),
    'listviewdefs' => array (
  'NAME' =>
  array (
    'width' => '20%',
    'label' => 'LBL_LIST_NAME',
    'link' => true,
    'default' => true,
    'related_fields' =>
    array (
      0 => 'first_name',
      1 => 'last_name',
      2 => 'salutation',
      3 => 'account_name',
      4 => 'account_id',
    ),
  ),
  'ACCOUNT_NAME' =>
  array (
    'width' => '25',
    'label' => 'LBL_LIST_ACCOUNT_NAME',
    'module' => 'Accounts',
    'id' => 'ACCOUNT_ID',
    'default' => true,
    'sortable' => true,
    'ACLTag' => 'ACCOUNT',
    'related_fields' =>
    array (
      0 => 'account_id',
    ),
  ),
  'TITLE' =>
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_TITLE',
    'default' => true,
  ),
  'LEAD_SOURCE' =>
  array (
    'width' => '15%',
    'label' => 'LBL_LEAD_SOURCE',
    'default' => true,
  ),
    		'COMMITTEES' =>
    		array (
    			'width' => '10',
    			'label' => 'LBL_COMMITTEES',
    			'default' => true,
    		),
),
);
