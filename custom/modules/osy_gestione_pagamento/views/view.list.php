<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

require_once ('include/MVC/View/views/view.list.php');
class Customosy_gestione_pagamentoViewList extends ViewList {

	function Customosy_gestione_pagamentoViewList()
	{
		
		parent::ViewList();


	}

	public function getModuleTitle( $show_help = true ) {
		return parent::getModuleTitle(false);
	}
		
	function listViewProcess(){
		global $db, $mod_strings;
		?>
			<script>
				var ParamName = 'prospect_list_name_basic';
				QS=window.location.toString(); 
			  	// Posizione di inizio della variabile richiesta
			  	var indSta=QS.indexOf(ParamName); 
			  	// Se la variabile passata non esiste o il parametro è vuoto, restituisco null
			  	if (indSta==-1 || ParamName=="") return null; 
			  	// Posizione finale, determinata da una eventuale &amp; che serve per concatenare più variabili
			  	var indEnd=QS.indexOf('&amp;',indSta); 
			  	// Se non c'è una &amp;, il punto di fine è la fine della QueryString
			  	if (indEnd==-1) indEnd=QS.length; 
			  	// Ottengo il solore valore del parametro, ripulito dalle sequenze di escape
			  	var valore = unescape(QS.substring(indSta+ParamName.length+1,indEnd));
			  	SUGAR.util.doWhen("typeof(document.getElementsByTagName(\'body\')[0]) != \'undefined\'"+
						" && typeof(document.getElementById(\'SAVE_FOOTER\')) != \'undefined\'", function()  {
					document.getElementById('prospect_list_name_basic').value=valore;                    
            	});
			</script>
		<?php
		
		$sPos = strpos($_SERVER['QUERY_STRING'], 'prospect_list_name_basic');
		if($sPos){
			$sLen = strlen('prospect_list_name_basic=');
			$start = $sPos + $sLen;
			$end = strpos($_SERVER['QUERY_STRING'], '&', $start);
			if(!$end){
				$value = substr ( $_SERVER['QUERY_STRING'] , $start);
			}
			else{
				$valueLeng = $end - $start;
				$value = substr($_SERVER['QUERY_STRING'] , $start, $valueLeng);
			}
			$_REQUEST['prospect_list_name_basic'] = urldecode($value);
		}		
		
		$this->processSearchForm();
		$this->lv->searchColumns = $this->searchForm->searchColumns;
		
		//************************************************************
		// 		gestione pulsante export START
		require_once("custom/include/osyFileEdit.php");
		
		$div_del_s = "<div style='float:left'>";
		$div_del_e = "</div>";
		
		$sModuleName = $this->seed->module_dir;	

		$sButtonExportGroupActivitiesFees = $div_del_s.'<a onclick="return sListView.send_form(true, \'osy_gestione_pagamento\', \'index.php?entryPoint=osy_exportGroupActivitiesFees&filterListName='.$_REQUEST['prospect_list_name_basic'].'\', \'Please select at least 1 record to proceed.\')" ';
		$sButtonExportGroupActivitiesFees .= 'style="text-align:center;margin-top:5px;margin-bottom:5px;width: 160px" class=\'menuItem\' href="javascript:void(0);">'.$mod_strings['LBL_OSY_EXPORT_GROUP_ACTIVITIES_FEES'].'</a>'.$div_del_e;
	
		$a1CodeHooks=array(
				array
				(
						'orig'=>'/(selectedObjectsSpan[^<]+\<\/td\>)/m',
						'new'=>'$1<td nowrap="nowrap" width=\'2%\' class=\'paginationActionButtons\'>'.$sButtonExportGroupActivitiesFees.'</td>',
				)
		);
		$s1FilePath=file_edit("include/ListView/ListViewPagination.tpl",$a1CodeHooks,"",$sModuleName);
			
		$a2CodeHooks=array(
				array
				(
						'orig'=>'/\{include file\=\'include\/ListView\/ListViewPagination\.tpl\'\}/',
						'new'=>'{include file=\''.$s1FilePath.'\'}',
				)
		);
		
		$s2FilePath=file_edit("include/ListView/ListViewGeneric.tpl",$a2CodeHooks,"",$sModuleName);
		$this->lv->setup($this->seed, $s2FilePath, $this->where, $this->params);
		//gestione pulsante export END
		//************************************************************		
				
		foreach($this->lv->data["data"] as $pos=>$data)
		{
		
			//OPENSYMBOLMOD paolo.santacatterina (04/apr/2014  10:36:51) PITCILO-42
			//unifico il campo member e il member associato al contact quando presente		
			//************************************************************
			$q="SELECT a.name as account_name_related_contact, plp.account_id as account_id FROM accounts a INNER JOIN prospect_lists_prospects plp 
					ON plp.account_id = a.id WHERE plp.id = '".$this->lv->data["data"][$pos]["ID"]."' AND plp.deleted = 0 AND a.deleted = 0";
			$r=$db->query($q);
			$v=$db->fetchByAssoc($r);
						
			if(isset($v['account_name_related_contact']) && !empty($v['account_name_related_contact']) && $v['account_name_related_contact'] != ''){
				$this->lv->data["data"][$pos]["RELATED_NAME_ACCOUNTS"] = '<a href="index.php?module=Accounts&amp;return_module=Accounts&amp;action=DetailView&amp;record='.$v['account_id'].'">
						'.$v['account_name_related_contact'].'</a>';
			}
			//************************************************************
			
			//OPENSYMBOLMOD paolo.santacatterina (10/apr/2014  11:52:27) PITCILO-42
			//mostro il potential member associato al contact potential member		
			//************************************************************
			$q="SELECT l.id as lead_id, l.account_name as lead_name, plp.related_type as related_type 
				FROM osy_contactspotentialmember cpm
				INNER JOIN prospect_lists_prospects plp ON plp.related_id = cpm.id 
				INNER JOIN leads l ON l.id = cpm.lead_id
				WHERE plp.id = '".$this->lv->data["data"][$pos]["ID"]."' AND plp.deleted = 0 AND l.deleted = 0 AND cpm.deleted = 0";
			$r=$db->query($q);
			$v=$db->fetchByAssoc($r);
			
			if(isset($v['related_type']) && !empty($v['related_type']) && $v['related_type'] == 'osy_contactspotentialmember'){
				$this->lv->data["data"][$pos]["RELATED_NAME_LEADS"] = '<a href="index.php?module=Leads&amp;return_module=Leads&amp;action=DetailView&amp;record='.$v['lead_id'].'">
						'.$v['lead_name'].'</a> ';
			}
			//************************************************************
			
			//vengono rimosse dalla visualizzazione i record che puntano a ProspectLists non più esistenti (deleted = 1);
			//************************************************************
			if($this->lv->data["data"][$pos]["PROSPECT_LIST_NAME"] == '' && empty($this->lv->data["data"][$pos]["PROSPECT_LIST_NAME"])){
				unset($this->lv->data["data"][$pos]);
			}
			//************************************************************

			//unset($this->listViewDefs['osy_gestione_pagamento']['RELATED_NAME_ACCOUNTS_MEMBER_CONTACTS']);
			if($this->lv->data["data"][$pos]["RELATED_TYPE"] == '' || $this->lv->data["data"][$pos]["RELATED_TYPE"] == 'Leads'){
				$record = new Lead();
				$lead_bean = $record->retrieve($this->lv->data["data"][$pos]["RELATED_ID"]);
				if(is_object($lead_bean) && $lead_bean->module_dir == 'Leads'){
					$this->lv->data["data"][$pos]["RELATED_NAME_LEADS"] = $lead_bean->account_name;
				}
			}
		}
				
		echo $this->lv->display();			
	}
}
