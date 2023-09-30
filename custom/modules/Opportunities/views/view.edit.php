<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

//OPENSYMBOLMOD isabella.masiero 06/mag/2013
require_once('modules/Opportunities/views/view.edit.php');

class CustomOpportunitiesViewEdit extends OpportunitiesViewEdit {
 	function CustomOpportunitiesViewEdit(){
 		parent::OpportunitiesViewEdit();
 	}	

 	function display() {
		global $db;
 		$q_record = "SELECT id, view_taxes_payments, view_partial_payments, view_training_package_amount
			FROM osy_administration_panel WHERE deleted=0
			ORDER BY date_entered ASC LIMIT 1 
		";
		$r_record = $db->query( $q_record );
		$v_record = $db->fetchByAssoc( $r_record );
		if(isset($v_record['id']) && !empty($v_record['id'])){
 			$this->ev->focus->osy_administration_panel_id=$v_record['id'];
 			$this->ev->focus->osy_view_taxes_payments=$v_record['view_taxes_payments'];
 			$this->ev->focus->osy_view_partial_payments=$v_record['view_partial_payments'];
 			$this->ev->focus->osy_view_training_package_amount=$v_record['view_training_package_amount'];
		} 		

		if(isset($this->ev->focus->leads_1_id) && $this->ev->focus->leads_1_id != ''){
			$q="SELECT account_name FROM leads WHERE id ='".$this->ev->focus->leads_1_id."' AND deleted = 0";
			$r=$db->query($q);
			$v=$db->fetchByAssoc($r);
			$this->ev->focus->leads_1_name = $v['account_name'];
		}
		
		require_once('custom/modules/Opportunities/customFunctions.php');
		$aRet = osyRealculatePartialAndTotal($this->ev->focus,true);
		foreach($aRet as $sField => $sValue){
			 $this->ev->focus->$sField=$sValue;
		}





		// echo '<script type="text/javascript">

		// console.log("HHHHHHHHHHHHHHHH");
        //         var now = new Date();
        //         // Calendar.setup 
		// 		// ({
        //         //   inputField : "expiry_date",
		// 		//   form : "EditView",
        //         //     // ifFormat : "%d/%m/%Y %I:%M%P",
        //         //     // daFormat : "%d/%m/%Y %I:%M%P",
		// 		// 	flatCallback : date.getFullYear();
        //         //     button : "expiry_date_trigger",
        //         //     singleClick : true,
        //         //     step : 1,
        //         //     weekNumbers: false,
        //         //     startWeekday: 0
        //         //     });

		// 		Calendar.setup({
		// 			inputField: "expiry_date",
		// 			form: "EditView",
		// 			// ifFormat: "%d/%m/%Y %I:%M%P",
		// 			// daFormat: "%d/%m/%Y %I:%M%P",
		// 			button: "expiry_date_trigger",
		// 			singleClick: true,
		// 			step: 1,
		// 			weekNumbers: false,
		// 			startWeekday: 0,
		// 			range: [new Date().getFullYear(), new Date().getFullYear() + 10],
		// 			yearSelect: true
		// 		  });
            //   </script>';


 		parent::display();
 	}    
}
?>
