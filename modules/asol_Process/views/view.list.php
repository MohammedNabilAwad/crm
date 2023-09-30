<?php

require_once('include/MVC/View/views/view.list.php');

class asol_ProcessViewList extends ViewList {

	function asol_ProcessViewList(){
		parent::ViewList();
	}
	function listViewProcess(){
		global $mod_strings;

		$this->processSearchForm();
		$this->lv->searchColumns = $this->searchForm->searchColumns;

		if(!$this->headers)
		return;
		if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
			$this->lv->ss->assign("SEARCH",true);
			$this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
			$savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
			echo $this->lv->display();
			
			echo '<input type="button" value="'.$mod_strings['LBL_ASOL_EXPORT'].'" onClick="return sListView.send_form(true, \'asol_Process\', \'index.php?entryPoint=asol_export\',\''.$mod_strings['LBL_ASOL_EXPORT_PLEASE'].'\')" />';
			
			echo '<input type="button" value="'.'FlowChart'.'" onClick="openAllFlowChartsPopups();" />';
			echo "
				<script>
	
					function openAllFlowChartsPopups() {
						
						sugarListView.get_checks();
						var processes_string = document.MassUpdate.uid.value;
						
						if (processes_string == '') {
							alert('".$mod_strings['LBL_ASOL_FLOWCHART_PLEASE']."');
							return;
						}
						
						var process_ids = processes_string.split(',');
						var top = 100;
						var left = 100;
						for (var i in process_ids) {
							openFlowChartPopup(process_ids[i], left, top);
							top = top + 100;
							left = left + 100;
						}
					}
					
					function openFlowChartPopup(process_id, left, top) {
						var popup = window.open('index.php?entryPoint=asol_flowChart&uid='+process_id, process_id, 'width=500, height=500, top='+top+', left='+left+', location=no, menubar=no, resizable=yes, scrollbars=yes, status=no, titlebar=no, toolbar=no');
						popup.focus();
					}
				</script>
			";
			
			$openWFMVariableGenerator = wfm_reports_utils::managePremiumFeature("openWFMVariableGenerator", "wfm_utils_premium.php", "openWFMVariableGenerator", $extraParams);
			
			echo $openWFMVariableGenerator;
		}
	}
	
	function Display()
	{
		$this->lv->export = true;
		$this->lv->showMassupdateFields = false;
		parent::Display();
	}

}
//return sListView.send_form(true, 'asol_Process', 'index.php?entryPoint=export','Please select at least 1 record to proceed.')
?>

