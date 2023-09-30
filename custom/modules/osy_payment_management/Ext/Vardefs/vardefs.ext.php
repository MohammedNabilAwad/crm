<?php 
 //WARNING: The contents of this file are auto-generated


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


 // created: 2019-09-26 12:15:03
$dictionary['osy_payment_management']['fields']['paid_amount_1_c']['inline_edit']='';
$dictionary['osy_payment_management']['fields']['paid_amount_1_c']['options']='numeric_range_search_dom';
$dictionary['osy_payment_management']['fields']['paid_amount_1_c']['labelValue']='Paid amount';
$dictionary['osy_payment_management']['fields']['paid_amount_1_c']['enable_range_search']='1';

 

 // created: 2019-09-26 12:15:16
$dictionary['osy_payment_management']['fields']['payment_date_c']['inline_edit']='';
$dictionary['osy_payment_management']['fields']['payment_date_c']['options']='date_range_search_dom';
$dictionary['osy_payment_management']['fields']['payment_date_c']['labelValue']='Payment date';
$dictionary['osy_payment_management']['fields']['payment_date_c']['enable_range_search']='1';

 

 // created: 2023-07-30 22:10:07
$dictionary['osy_payment_management']['fields']['paid_amount_c']['inline_edit']='1';
$dictionary['osy_payment_management']['fields']['paid_amount_c']['labelValue']='Paid amount:';

 

 // created: 2023-07-30 22:10:24
$dictionary['osy_payment_management']['fields']['payment_date_c']['inline_edit']='1';
$dictionary['osy_payment_management']['fields']['payment_date_c']['options']='date_range_search_dom';
$dictionary['osy_payment_management']['fields']['payment_date_c']['labelValue']='Payment date:';
$dictionary['osy_payment_management']['fields']['payment_date_c']['enable_range_search']='1';

 

 // created: 2023-07-30 22:10:08
$dictionary['osy_payment_management']['fields']['currency_id']['inline_edit']=1;

 
?>