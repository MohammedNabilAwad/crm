<?php
// created: 2023-09-27 10:12:21
$dictionary["ad001_Certificate_of_Origin"]["fields"]["accounts_ad001_certificate_of_origin_2"] = array (
  'name' => 'accounts_ad001_certificate_of_origin_2',
  'type' => 'link',
  'relationship' => 'accounts_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["accounts_ad001_certificate_of_origin_2_name"] = array (
  'name' => 'accounts_ad001_certificate_of_origin_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
  'link' => 'accounts_ad001_certificate_of_origin_2',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["ad001_Certificate_of_Origin"]["fields"]["accounts_ad001_certificate_of_origin_2accounts_ida"] = array (
  'name' => 'accounts_ad001_certificate_of_origin_2accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);
