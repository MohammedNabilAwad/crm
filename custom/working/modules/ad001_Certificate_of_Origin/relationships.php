<?php
/**
 *
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.
 *
 * SuiteCRM is an extension to SugarCRM Community Edition developed by SalesAgility Ltd.
 * Copyright (C) 2011 - 2018 SalesAgility Ltd.
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
 * FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more
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
 * reasonably feasible for technical reasons, the Appropriate Legal Notices must
 * display the words "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 */
$relationships = array (
  'leads_ad001_certificate_of_origin_2' => 
  array (
    'id' => '1b390d58-da9e-387b-07c3-651465e12316',
    'relationship_name' => 'leads_ad001_certificate_of_origin_2',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'id',
    'join_table' => 'leads_ad001_certificate_of_origin_2_c',
    'join_key_lhs' => 'leads_ad001_certificate_of_origin_2leads_ida',
    'join_key_rhs' => 'leads_ad0094db_origin_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'accounts_ad001_certificate_of_origin_2' => 
  array (
    'id' => '24be0bd5-8eba-77e0-36c0-651465f87be9',
    'relationship_name' => 'accounts_ad001_certificate_of_origin_2',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'id',
    'join_table' => 'accounts_ad001_certificate_of_origin_2_c',
    'join_key_lhs' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
    'join_key_rhs' => 'accounts_a34fd_origin_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'leads_ad001_certificate_of_origin_1' => 
  array (
    'id' => '81710e9a-4a67-c8d3-c9c6-651465062aa4',
    'relationship_name' => 'leads_ad001_certificate_of_origin_1',
    'lhs_module' => 'Leads',
    'lhs_table' => 'leads',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'id',
    'join_table' => 'leads_ad001_certificate_of_origin_1_c',
    'join_key_lhs' => 'leads_ad001_certificate_of_origin_1leads_ida',
    'join_key_rhs' => 'leads_ad00e13d_origin_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'accounts_ad001_certificate_of_origin_1' => 
  array (
    'id' => 'c7010fe5-69ee-38f1-7859-651465d40d27',
    'relationship_name' => 'accounts_ad001_certificate_of_origin_1',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'id',
    'join_table' => 'accounts_ad001_certificate_of_origin_1_c',
    'join_key_lhs' => 'accounts_ad001_certificate_of_origin_1accounts_ida',
    'join_key_rhs' => 'accounts_a42ac_origin_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'ad001_certificate_of_origin_modified_user' => 
  array (
    'id' => 'cf6275a3-4d3f-9185-fbda-65146580f944',
    'relationship_name' => 'ad001_certificate_of_origin_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'ad001_certificate_of_origin_created_by' => 
  array (
    'id' => 'd003489a-8000-cc81-8d8b-651465fbf358',
    'relationship_name' => 'ad001_certificate_of_origin_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'ad001_certificate_of_origin_assigned_user' => 
  array (
    'id' => 'd0964cba-2fcd-3c36-7fa8-651465979afb',
    'relationship_name' => 'ad001_certificate_of_origin_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
  'securitygroups_ad001_certificate_of_origin' => 
  array (
    'id' => 'd11dc97c-2e0a-b380-04d9-6514659a381c',
    'relationship_name' => 'securitygroups_ad001_certificate_of_origin',
    'lhs_module' => 'SecurityGroups',
    'lhs_table' => 'securitygroups',
    'lhs_key' => 'id',
    'rhs_module' => 'ad001_Certificate_of_Origin',
    'rhs_table' => 'ad001_certificate_of_origin',
    'rhs_key' => 'id',
    'join_table' => 'securitygroups_records',
    'join_key_lhs' => 'securitygroup_id',
    'join_key_rhs' => 'record_id',
    'relationship_type' => 'many-to-many',
    'relationship_role_column' => 'module',
    'relationship_role_column_value' => 'ad001_Certificate_of_Origin',
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => false,
  ),
);