<?php

require_once 'modules/Contacts/Contact.php';

class CustomContact extends Contact {
    function create_new_list_query($order_by, $where,$filter=array(),$params=array(), $show_deleted = 0,$join_type='', $return_array = false,$parentbean=null, $singleSelect = false, $ifListForExport = false) {
        if( $_REQUEST['module'] == 'ProspectLists' && $_REQUEST['action'] == 'Save2' ) {
            $singleSelect = true;
        }
        return parent::create_new_list_query($order_by, $where, $filter, $params, $show_deleted, $join_type, $return_array, $parentbean, $singleSelect, $ifListForExport);
    }   
}