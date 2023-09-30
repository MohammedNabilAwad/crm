<?php
// created: 2023-09-17 12:14:43
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_1"] = array (
  'name' => 'leads_ad001_certificate_of_origin_1',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_ad001_certificate_of_origin_1leads_ida',
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_1_name"] = array (
  'name' => 'leads_ad001_certificate_of_origin_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_ad001_certificate_of_origin_1leads_ida',
  'link' => 'leads_ad001_certificate_of_origin_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_1leads_ida"] = array (
  'name' => 'leads_ad001_certificate_of_origin_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);
