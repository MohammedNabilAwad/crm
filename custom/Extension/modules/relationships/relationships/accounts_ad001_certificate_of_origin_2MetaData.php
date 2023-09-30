<?php
// created: 2023-09-27 10:12:21
$dictionary["accounts_ad001_certificate_of_origin_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'accounts_ad001_certificate_of_origin_2' => 
    array (
      'lhs_module' => 'Accounts',
      'lhs_table' => 'accounts',
      'lhs_key' => 'id',
      'rhs_module' => 'ad001_Certificate_of_Origin',
      'rhs_table' => 'ad001_certificate_of_origin',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'accounts_ad001_certificate_of_origin_2_c',
      'join_key_lhs' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
      'join_key_rhs' => 'accounts_a34fd_origin_idb',
    ),
  ),
  'table' => 'accounts_ad001_certificate_of_origin_2_c',
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
      'name' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'accounts_a34fd_origin_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'accounts_ad001_certificate_of_origin_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'accounts_ad001_certificate_of_origin_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'accounts_ad001_certificate_of_origin_2accounts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'accounts_ad001_certificate_of_origin_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'accounts_a34fd_origin_idb',
      ),
    ),
  ),
);