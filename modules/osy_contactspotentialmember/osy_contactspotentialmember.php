<?PHP
/**
 * *******************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc.
 * Copyright (C) 2004-2012 SugarCRM Inc.
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
 * SugarCRM" logo. If the display of the logo is not reasonably feasible for
 * technical reasons, the Appropriate Legal Notices must display the words
 * "Powered by SugarCRM".
 * ******************************************************************************
 */

/**
 * THIS CLASS IS FOR DEVELOPERS TO MAKE CUSTOMIZATIONS IN
 */
require_once ('modules/osy_contactspotentialmember/osy_contactspotentialmember_sugar.php');
class osy_contactspotentialmember extends osy_contactspotentialmember_sugar implements EmailInterface{
	function osy_contactspotentialmember() {
		parent::osy_contactspotentialmember_sugar ();
	}
	function get_all_related_prospect_lists_contacts() {
		$return_array ['select'] = "SELECT pl.id";
		$return_array ['from'] = " FROM prospect_lists";
		$return_array ['join'] = " JOIN  prospectlist_osy_contactspotentialmember ON  prospectlist_osy_contactspotentialmember.prospectlist_id = prospect_lists.id";
		$return_array ['where'] = "  prospectlist_osy_contactspotentialmember.contactpotentialmember_id = '$this->id' AND (prospect_lists.deleted = 0 AND  prospectlist_osy_contactspotentialmember.deleted = 0)";

		return $return_array;
	}
	function get_all_related_prospect_lists_leads() {
		$return_array ['select'] = " SELECT prospect_lists.id ";
		$return_array ['from'] = " FROM prospect_lists ";
		$return_array ['join'] = " JOIN prospect_lists_prospects ON prospect_lists.id = prospect_lists_prospects.prospect_list_id AND prospect_lists.deleted = 0 AND prospect_lists_prospects.deleted = 0 ";
		$return_array ['join'] .= " JOIN leads ON prospect_lists_prospects.related_id = leads.id AND leads.deleted = 0 ";
		$return_array ['join'] .= " JOIN osy_contactspotentialmember ON osy_contactspotentialmember.lead_id = leads.id AND osy_contactspotentialmember.deleted = 0 ";
		$return_array ['where'] = " osy_contactspotentialmember.id = '$this->id' AND prospect_lists_prospects.related_type = 'Leads'";

		return $return_array;
	}
	// OPENSYMBOLMOD - START - davide.dallapozza - 27/feb/2014
	// *************************************************
	// Override del metodo per mettere in innerjoin il modulo con i leads per i popup (PITCILO-29)

	function create_new_list_query($order_by, $where, $filter = array(), $params = array(), $show_deleted = 0, $join_type = '', $return_array = false, $parentbean = null, $singleSelect = false, $ifListForExport = false) {
		// if Request Popup
		if (isset ( $_REQUEST ['action'] ) && $_REQUEST ['action'] == 'Popup')
			return $this->popup_create_new_list_query ( $order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect );
		else
			return parent::create_new_list_query ( $order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect );
	}
	function popup_create_new_list_query($order_by, $where, $filter = array(), $params = array(), $show_deleted = 0, $join_type = '', $return_array = false, $parentbean = null, $singleSelect = false) {
		$pop_select = "osy_contactspotentialmember.id , LTRIM(RTRIM(CONCAT(IFNULL(osy_contactspotentialmember.first_name,''),' ',IFNULL(osy_contactspotentialmember.last_name,'')))) as name ,osy_contactspotentialmember.first_name , osy_contactspotentialmember.last_name , osy_contactspotentialmember.salutation, leads.account_name, leads.assigned_user_id lead_name_owner  , 'Leads' lead_name_mod, osy_contactspotentialmember.lead_id , osy_contactspotentialmember.role_function , osy_contactspotentialmember.vip , osy_contactspotentialmember.industry , osy_contactspotentialmember.phone_work , osy_contactspotentialmember.title , osy_contactspotentialmember.do_not_call , osy_contactspotentialmember.phone_home , osy_contactspotentialmember.phone_mobile , osy_contactspotentialmember.phone_other , osy_contactspotentialmember.phone_fax , osy_contactspotentialmember.date_entered  , LTRIM(RTRIM(CONCAT(IFNULL(users.first_name,''),' ',IFNULL(users.last_name,'')))) created_by_name , users.created_by created_by_name_owner  , 'Users' created_by_name_mod, osy_contactspotentialmember.assigned_user_id";

		// SELECT
		$select_query = "SELECT " . $pop_select; // Put anything to Select
		$custom_join = $this->custom_fields->getJOIN ();
		// If have custom fields
		if ($custom_join) {
			$select_query .= $custom_join ['select'];
		}
		$ret_array ['select'] = $select_query;

		// FROM
		$from_query = " FROM " . $this->table_name;
		$from_query .= " LEFT JOIN users ON " . $this->table_name . ".assigned_user_id = users.id AND users.deleted = 0";
		$from_query .= " LEFT JOIN leads ON " . $this->table_name . ".lead_id = leads.id AND leads.deleted = 0";
		// If have custom fields
		if ($custom_join) {
			$from_query .= $custom_join ['join'];
		}
		$ret_array ['from'] = $from_query;

		// WHERE
		$where_auto = "1=1";
		if ($show_deleted == 0)
			$where_auto = " " . $this->table_name . ".deleted = 0";
		elseif ($show_deleted == 1)
			$where_auto = " " . $this->table_name . ".deleted = 1";

		if ($where != "")
			$where_query = " WHERE (" . str_replace ( 'lead_name', 'leads.account_name', $where ) . ") AND" . $where_auto;
		else
			$where_query = " WHERE " . $where_auto;

		$ret_array ['where'] = $where_query;

		// ORDER BY
		$orderby_query = '';
		if (! empty ( $order_by ))
			$orderby_query = " ORDER BY " . $this->process_order_by ( $order_by, null );
		$ret_array ['order_by'] = $orderby_query;

		// Return Query
		if ($return_array)
			return $ret_array;

		return $ret_array ['select'] . $ret_array ['from'] . $ret_array ['where'] . $ret_array ['order_by'];
	}

	// OPENSYMBOLMOD - END - davide.dallapozza
	// *************************************************
}
?>