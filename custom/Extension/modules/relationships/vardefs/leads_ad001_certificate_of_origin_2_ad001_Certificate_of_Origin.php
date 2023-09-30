<?php
// created: 2023-09-27 10:20:58
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_2"] = array (
  'name' => 'leads_ad001_certificate_of_origin_2',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE',
  'id_name' => 'leads_ad001_certificate_of_origin_2leads_ida',
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_2_name"] = array (
  'name' => 'leads_ad001_certificate_of_origin_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_ad001_certificate_of_origin_2leads_ida',
  'link' => 'leads_ad001_certificate_of_origin_2',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["leads_ad001_certificate_of_origin_2leads_ida"] = array (
  'name' => 'leads_ad001_certificate_of_origin_2leads_ida',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);
