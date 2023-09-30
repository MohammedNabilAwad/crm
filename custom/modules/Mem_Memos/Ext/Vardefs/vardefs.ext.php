<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2023-09-17 09:35:54
$dictionary["Mem_Memos"]["fields"]["accounts_mem_memos_1"] = array (
  'name' => 'accounts_mem_memos_1',
  'type' => 'link',
  'relationship' => 'accounts_mem_memos_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'vname' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_mem_memos_1accounts_ida',
);
$dictionary["Mem_Memos"]["fields"]["accounts_mem_memos_1_name"] = array (
  'name' => 'accounts_mem_memos_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_mem_memos_1accounts_ida',
  'link' => 'accounts_mem_memos_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Mem_Memos"]["fields"]["accounts_mem_memos_1accounts_ida"] = array (
  'name' => 'accounts_mem_memos_1accounts_ida',
  'type' => 'link',
  'relationship' => 'accounts_mem_memos_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_MEM_MEMOS_TITLE',
);


 // created: 2023-09-17 09:43:35
$dictionary['Mem_Memos']['fields']['type_activity_c']['inline_edit']='1';
$dictionary['Mem_Memos']['fields']['type_activity_c']['labelValue']='نوع النشاط';

 

 // created: 2023-09-17 09:45:26
$dictionary['Mem_Memos']['fields']['passport_number_c']['inline_edit']='1';
$dictionary['Mem_Memos']['fields']['passport_number_c']['labelValue']='رقم الجواز';

 

 // created: 2023-09-17 09:44:43
$dictionary['Mem_Memos']['fields']['commercial_name_english_c']['inline_edit']='1';
$dictionary['Mem_Memos']['fields']['commercial_name_english_c']['labelValue']='الإسم التجاري انجليزي';

 
?>