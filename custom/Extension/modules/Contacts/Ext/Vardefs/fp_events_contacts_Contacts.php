<?php
// created: 2013-04-15 12:13:27
$dictionary["Contact"]["fields"]["fp_events_contacts"] = array (
  'name' => 'fp_events_contacts',
  'type' => 'link',
  'relationship' => 'fp_events_contacts',
  'source' => 'non-db',
  'vname' => 'LBL_FP_EVENTS_CONTACTS_FROM_FP_EVENTS_TITLE',
);


$dictionary['Contact']['fields']['payment_status_fields'] =
    array (
        'name' => 'payment_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array (
                'id' => 'payment_status_id',
                'payment_status' => 'osy_payment_status',
            ),
        'vname' => 'LBL_PAYMENT_STATUS',
        'type' => 'relate',
        'link' => 'fp_events_contacts',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events_contacts',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Contact']['fields']['osy_payment_status'] =
    array (
        'massupdate' => false,
        'name' => 'osy_payment_status',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS',
        'options' => 'osy_payment_status_list',
        'importable' => 'false',
    );
$dictionary['Contact']['fields']['payment_status_id'] =
    array (
        'name' => 'payment_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_PAYMENT_STATUS_ID',
        'studio' =>
            array (
                'listview' => false,
            ),
    );

//cost
//**************************************
$dictionary['Contact']['fields']['cost_fields'] =
    array (
        'name' => 'cost_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array (
                'id' => 'cost_id',
                'cost' => 'osy_cost',
            ),
        'vname' => 'LBL_COST',
        'type' => 'relate',
        'link' => 'fp_events_contacts',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events_contacts',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Contact']['fields']['osy_cost'] =
    array (
        'massupdate' => false,
        'name' => 'osy_cost',
        'type' => 'varchar',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST',
    );
$dictionary['Contact']['fields']['cost_id'] =
    array (
        'name' => 'cost_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST_ID',
        'studio' =>
            array (
                'listview' => false,
            ),
    );
//**************************************