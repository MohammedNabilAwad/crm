<?php
// created: 2013-04-30 14:55:07
$dictionary["fp_events_accounts"] = array (
    'true_relationship_type' => 'many-to-many',
    'from_studio' => true,
    'relationships' =>
        array (
            'fp_events_accounts' =>
                array (
                    'lhs_module' => 'FP_events',
                    'lhs_table' => 'fp_events',
                    'lhs_key' => 'id',
                    'rhs_module' => 'Accounts',
                    'rhs_table' => 'accounts',
                    'rhs_key' => 'id',
                    'relationship_type' => 'many-to-many',
                    'join_table' => 'fp_events_accounts',
                    'join_key_lhs' => 'fp_event_id',
                    'join_key_rhs' => 'account_id',
                ),
        ),
    'table' => 'fp_events_accounts',
    'fields' =>
        array (
            0 =>
                array (
                    'name' => 'id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
            1 =>
                array (
                    'name' => 'date_modified',
                    'type' => 'datetime',
                ),
            2 =>
                array (
                    'name' => 'deleted',
                    'type' => 'bool',
                    'len' => '1',
                    'default' => '0',
                    'required' => true,
                ),
            3 =>
                array (
                    'name' => 'fp_event_id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
            4 =>
                array (
                    'name' => 'account_id',
                    'type' => 'varchar',
                    'len' => 36,
                ),
            5 =>
                array (
                    'name' => 'invite_status',
                    'type' => 'varchar',
                    'len'=>'25',
                    'default'=>'Not Invited',
                ),
            6 =>
                array (
                    'name' => 'accept_status',
                    'type' => 'varchar',
                    'len'=>'25',
                    'default'=>'No Response',
                ),
            7 =>
                array (
                    'name' => 'cost',
                    'type' => 'varchar',
                    'len'=>'25',
                ),
            8 =>
                array (
                    'name' => 'payment_status',
                    'type' => 'varchar',
                    'len'=>'25',
                ),
            9 =>
                array (
                    'name' => 'email_responded',
                    'type' => 'int',
                    'len' => '2',
                    'default' => '0',
                ),
        ),
    'indices' =>
        array (
            0 =>
                array (
                    'name' => 'fp_events_accountsspk',
                    'type' => 'primary',
                    'fields' =>
                        array (
                            0 => 'id',
                        ),
                ),
            1 =>
                array (
                    'name' => 'fp_events_accounts_alt',
                    'type' => 'alternate_key',
                    'fields' =>
                        array (
                            0 => 'fp_event_id',
                            1 => 'account_id',
                        ),
                ),
        ),
);
