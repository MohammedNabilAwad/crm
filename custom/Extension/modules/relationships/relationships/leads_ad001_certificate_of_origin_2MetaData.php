<?php
// created: 2023-09-27 10:20:58
$dictionary["leads_ad001_certificate_of_origin_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'leads_ad001_certificate_of_origin_2' => 
    array (
      'lhs_module' => 'Leads',
      'lhs_table' => 'leads',
      'lhs_key' => 'id',
      'rhs_module' => 'ad001_Certificate_of_Origin',
      'rhs_table' => 'ad001_certificate_of_origin',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'leads_ad001_certificate_of_origin_2_c',
      'join_key_lhs' => 'leads_ad001_certificate_of_origin_2leads_ida',
      'join_key_rhs' => 'leads_ad0094db_origin_idb',
    ),
  ),
  'table' => 'leads_ad001_certificate_of_origin_2_c',
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
      'name' => 'leads_ad001_certificate_of_origin_2leads_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'leads_ad0094db_origin_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'leads_ad001_certificate_of_origin_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'leads_ad001_certificate_of_origin_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'leads_ad001_certificate_of_origin_2leads_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'leads_ad001_certificate_of_origin_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'leads_ad0094db_origin_idb',
      ),
    ),
  ),
);