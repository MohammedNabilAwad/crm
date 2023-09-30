<?PHP
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2012 SugarCRM Inc.
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
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 ********************************************************************************/

/**
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN osy_contactspotentialmember
 */

require_once('include/SugarObjects/templates/person/Person.php');

class osy_contactspotentialmember_sugar extends Person {
	var $new_schema = true;
	var $module_dir = 'osy_contactspotentialmember';
	var $object_name = 'osy_contactspotentialmember';
	var $table_name = 'osy_contactspotentialmember';
	var $importable = true;
	var $disable_row_level_security = true ; // to ensure that modules created and deployed under CE will continue to function under team security if the instance is upgraded to PRO
		var $id;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $annual_revenue;
		var $salutation;
		var $first_name;
		var $last_name;
		var $full_name;
		var $title;
		var $department;
		var $do_not_call;
		var $phone_home;
		var $email;
		var $phone_mobile;
		var $phone_work;
		var $phone_other;
		var $phone_fax;
		var $email1;
		var $email2;
		var $invalid_email;
		var $email_opt_out;
		var $primary_address_street;
		var $primary_address_street_2;
		var $primary_address_street_3;
		var $primary_address_city;
		var $primary_address_state;
		var $primary_address_postalcode;
		var $primary_address_country;
		var $alt_address_street;
		var $alt_address_street_2;
		var $alt_address_street_3;
		var $alt_address_city;
		var $alt_address_state;
		var $alt_address_postalcode;
		var $alt_address_country;
		var $assistant;
		var $assistant_phone;
		var $email_addresses_primary;
		var $email_addresses;
		function osy_contactspotentialmember_sugar(){	
		parent::Person();
	}
	
	function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}
		
}
?>