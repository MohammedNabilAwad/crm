<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2023-09-16 15:44:05
$dictionary["guar_guarantees"]["fields"]["accounts_guar_guarantees_1"] = array (
  'name' => 'accounts_guar_guarantees_1',
  'type' => 'link',
  'relationship' => 'accounts_guar_guarantees_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_guar_guarantees_1accounts_ida',
);
$dictionary["guar_guarantees"]["fields"]["accounts_guar_guarantees_1_name"] = array (
  'name' => 'accounts_guar_guarantees_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_guar_guarantees_1accounts_ida',
  'link' => 'accounts_guar_guarantees_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["guar_guarantees"]["fields"]["accounts_guar_guarantees_1accounts_ida"] = array (
  'name' => 'accounts_guar_guarantees_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_guar_guarantees_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_GUAR_GUARANTEES_TITLE',
);


 // created: 2023-09-17 09:16:32
$dictionary['guar_guarantees']['fields']['guaranteed_adjective_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guaranteed_adjective_c']['labelValue']='صفة المضمون';

 

 // created: 2023-09-17 09:15:40
$dictionary['guar_guarantees']['fields']['guaranteed_name_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guaranteed_name_c']['labelValue']='اسم المضمون';

 

 // created: 2023-09-17 09:19:16
$dictionary['guar_guarantees']['fields']['guarantor_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guarantor_c']['labelValue']='جهة الضمان';

 

 // created: 2023-09-17 09:20:06
$dictionary['guar_guarantees']['fields']['nature_of_work_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['nature_of_work_c']['labelValue']='طبيعة العمل';

 

 // created: 2023-09-16 13:48:20
$dictionary['guar_guarantees']['fields']['name']['inline_edit']=true;
$dictionary['guar_guarantees']['fields']['name']['unified_search']=false;

 

 // created: 2023-09-17 09:21:53
$dictionary['guar_guarantees']['fields']['guarantee_type_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guarantee_type_c']['labelValue']='نوع الضمان';

 

 // created: 2023-09-17 09:17:28
$dictionary['guar_guarantees']['fields']['guaranteed_phone_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guaranteed_phone_c']['labelValue']='هاتف المضمون';

 

 // created: 2023-09-17 09:18:28
$dictionary['guar_guarantees']['fields']['guaranteed_id_number_c']['inline_edit']='1';
$dictionary['guar_guarantees']['fields']['guaranteed_id_number_c']['labelValue']='رقم هوية المضمون';

 
?>