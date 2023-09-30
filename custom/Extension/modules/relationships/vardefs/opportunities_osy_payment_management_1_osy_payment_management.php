<?php
// created: 2020-03-13 09:57:04
$dictionary["osy_payment_management"]["fields"]["opportunities_osy_payment_management_1"] = array (
  'name' => 'opportunities_osy_payment_management_1',
  'type' => 'link',
  'relationship' => 'opportunities_osy_payment_management_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_OPPORTUNITIES_OSY_PAYMENT_MANAGEMENT_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_osy_payment_management_1opportunities_ida',
);
$dictionary["osy_payment_management"]["fields"]["opportunities_osy_payment_management_1_name"] = array (
  'name' => 'opportunities_osy_payment_management_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_OPPORTUNITIES_OSY_PAYMENT_MANAGEMENT_1_FROM_OPPORTUNITIES_TITLE',
  'save' => true,
  'id_name' => 'opportunities_osy_payment_management_1opportunities_ida',
  'link' => 'opportunities_osy_payment_management_1',
  'table' => 'opportunities',
  'module' => 'Opportunities',
  'rname' => 'name',
);
$dictionary["osy_payment_management"]["fields"]["opportunities_osy_payment_management_1opportunities_ida"] = array (
  'name' => 'opportunities_osy_payment_management_1opportunities_ida',
  'type' => 'link',
  'relationship' => 'opportunities_osy_payment_management_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_OPPORTUNITIES_OSY_PAYMENT_MANAGEMENT_1_FROM_OSY_PAYMENT_MANAGEMENT_TITLE',
);
