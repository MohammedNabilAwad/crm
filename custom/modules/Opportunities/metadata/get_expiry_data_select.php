<?php


function getExDataSelect() {
  
  $years = '';
  
  for ($i = date('2000'); $i <= date('2200'); $i++) {
    $years .= '<option  value="12/31/' . $i . '"> ' . $i . '</option>';
  }
  return $years;
  }


?>