<?php

require_once('include/MVC/Controller/SugarController.php');

class Mem_MemosController extends SugarController
{

    public function action_editview()
    {
        $this->changeValues();
        
        }

    function changeValues() {
 
        global $mod_string;

        $this->view = 'edit';
        $GLOBALS['view'] = $this->view;
        
        if (isset($_REQUEST['accounts_mem_memos_1accounts_ida'])) {
            $query = "SELECT * FROM accounts_cstm WHERE id_c = '{$_REQUEST['accounts_mem_memos_1accounts_ida']}'";
            $result = $this->bean->db->query($query, true);
            $row = $this->bean->db->fetchByAssoc($result);
        
            $this->bean->commercial_name_english_c=$row['commercial_name_english_c'];
            $this->bean->type_activity_c=$row['type_activity_c'];
            $this->bean->accounts_mem_memos_1accounts_ida=$row['id_c'];
            
            $field_to_update = "commercial_name_english_c";
            $c_english_name=$row['commercial_name_english_c'];
            $field_to_update2 = "type_activity_c";
            $type_activity_c=str_replace("^","",$row['type_activity_c']);
            $field_to_id = "accounts_mem_memos_1accounts_ida";
            $accounts_mem_memos_1accounts_ida=$row['id_c'];
           
            $js=<<<EOQ
            <script>
            
                // Update the status
                document.addEventListener("DOMContentLoaded",function() { 
            
                    document.getElementById("$field_to_update").value = "$c_english_name";
                    document.getElementById("$field_to_update2").value = "$type_activity_c";
                    document.getElementById("$field_to_id").value = "$accounts_mem_memos_1accounts_ida";
            console.log("hisssssssssss Edit view ")
                });
            
            </script>
            EOQ;
            
                echo $js;
        }       
    }
}