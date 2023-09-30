<?php
//OPENSYMBOLMOD isabella.masiero 06/mag/2013
// ITCILO-54 - Importo totale di una Subscription Fee
// ITCILO-56 - Campo calcolato "Partial Payments"

//
//- fare il calcolo all'aperture dell'editview e anche al salvataggio
//
//- i campi total_amount_c e partial_payments_c saranno visibili in edit ma non mmodificabili
//
//- creare nuovo campo total_partial che non sarà visibile a maschera
//
//- (a) calcoli da fare:
//	- il total_partial sarà calcolato cosi: amount + training_pck_amount_c + taxes_c (se previsto)
//	- il partial_payments_c sarà calcolato cosi:
//		- controlla tutti i record legati a quel member_id (se non c'è metto 0 da subito)
//		- in cui lo payment_status = "Not Paid" e expiry_date < $cur.expiry_date
//		- per tutte queste righe sommo il campo total_partial (da creare)
//	- il total_amount_c sarà calcolato cosi: total_partial + partial_payments_c
//
//- (b) una volta salvato il dato, bisogna ricalcolare i tre campi per tutti i record con expiry_date > $cur.expiry_date
//
//nota: se al record in salvataggio è cambiata l'expiry_date, bisogna rifare il pezzo (b) a partire dalla data minore tra le due date(vecchia e nuova)
//nota2: se al record in salvataggio è cambiato l'account, bisogna rifare il pezzo (b) anche per il vecchio account

class OpportunitiesCustomFunction {
	function osyBeforeSave (&$focus){

		//verifiche per ricavare le info:
		//se al record in salvataggio è cambiata l'expiry_date, bisogna rifare il pezzo (b) a partire dalla data minore tra le due date(vecchia e nuova)
		//se al record in salvataggio è cambiato l'account, bisogna rifare il pezzo (b) anche per il vecchio account
		//non lo faccio se is_next_recalculate =true perchè significa che sono dentro il ciclo di ricorsione generato da (b)
		if((!isset($focus->is_next_recalculate) || !$focus->is_next_recalculate) && isset($focus->id) && !empty($focus->id)){
			require_once("data/BeanFactory.php");
			$focus_old = New $focus->object_name();
			$focus_old->retrieve($focus->id);
			if(isset($focus_old->id) && !empty($focus_old->id)){
				if(
					isset($focus_old->account_id) && !empty($focus_old->account_id) &&
					( !isset($focus->account_id) || empty($focus->account_id) || ($focus->account_id != $focus_old->account_id) )
				){
					$focus->old_account_id = $focus_old->account_id;
				}

				$sExpiry_date_db = get_osy_expiry_date_db($focus->expiry_date);
				$sOldExpiry_date_db = get_osy_expiry_date_db($focus_old->expiry_date);
				if(
					isset($sOldExpiry_date_db) && !empty($sOldExpiry_date_db) &&
					( !isset($sExpiry_date_db) || empty($sExpiry_date_db) || ($sExpiry_date_db != $sOldExpiry_date_db) )
				){
					$focus->old_expiry_date = $focus_old->expiry_date;
				}
			}
		}

		$aRet = osyRealculatePartialAndTotal($focus,false);
		foreach($aRet as $sField => $sValue){
		 	$focus->$sField=$sValue;
		}

        require_once 'custom/include/osy_utils.php';
		$settings = osyGetSettings();

		if ($settings->flag_enable_payment_logic)
        {
            $focus->total_paid = osyGetSumTotalPaid($focus);
            $focus->balance = $focus->amount - $focus->total_paid;
        }
	}

    function osyAfterRetrieve(&$focus)
    {
        require_once 'custom/include/osy_utils.php';
        $settings = osyGetSettings();

        if ($settings->flag_enable_payment_logic) {
            global $db;
            $focus->total_paid = osyGetSumTotalPaid($focus);
            $focus->balance = $focus->amount - $focus->total_paid;
            $q = "UPDATE opportunities SET total_paid = '" . $focus->total_paid . "', balance = '" . $focus->balance . "' WHERE id = '" . $focus->id . "'";
            $db->query($q);
        }
    }

	function osyAfterSave (&$focus){
		// una volta salvato il dato, bisogna ricalcolare i tre campi per tutti i record con expiry_date > $cur.expiry_date
		osyNextRealculatePartialAndTotal($focus);
	}


	function osyCalcolaMemberTill(&$focus){
		global $db;

		$sExpiry_date_db = get_osy_expiry_date_db($focus->expiry_date);
		$q="SELECT MAX(o.expiry_date) expiry_date, o.date_modified FROM opportunities o
				INNER JOIN accounts_opportunities ao ON ao.opportunity_id = o.id
				WHERE ao.account_id = '".$focus->account_id."' AND o.deleted = 0 AND ao.deleted = 0 LIMIT 1";

		$r=$db->query($q);
		$v=$db->fetchByAssoc($r);

		if($sExpiry_date_db >= $v['expiry_date']){
			$qUpdate="UPDATE accounts SET member_till = '".$sExpiry_date_db."' WHERE id = '".$focus->account_id."' AND deleted = 0";
			$db->query($qUpdate);
		}
	}
}

function osyRealculatePartialAndTotal(&$focus,$format=true){
	global $db;

	require_once("data/BeanFactory.php");

	$sExpiry_date_db = get_osy_expiry_date_db($focus->expiry_date);

	$oOsyAdministrationPanel=BeanFactory::getBean('osy_administration_panel',$focus->osy_administration_panel_id);

	//il total_partial sarà calcolato cosi: amount + training_pck_amount_c + taxes_c (se previsto)
	if(!isset($focus->amount) || empty($focus->amount)){
		$focus->amount = 0;
	}
	$total_partial = $focus->amount + $focus->training_pck_amount_c;
	$q_sum_total_partial = " IFNULL(amount,0) + IFNULL(training_pck_amount_c,0) ";

	//se view_tax=1
	if(isset($oOsyAdministrationPanel->view_taxes_payments) && $oOsyAdministrationPanel->view_taxes_payments){
		if(!isset($focus->taxes_perc) || empty($focus->taxes_perc)){
			$focus->taxes_perc = 0;
		}
		$focus->taxes_c= ($focus->taxes_perc * $focus->amount) /100;

		$total_partial = $total_partial + $focus->taxes_c;
		$q_sum_total_partial .= " + IFNULL(taxes_c,0)  ";
	}

	$aOpportunitiesMembers=array();
	if(isset($focus->account_id) && !empty($focus->account_id)){
		$q_opp = "SELECT distinct opportunity_id
			FROM accounts_opportunities
			WHERE deleted=0 AND account_id='{$focus->account_id}'
		";
		if( isset($focus->id) && !empty($focus->id)){
			$q_opp.= "AND opportunity_id <> '{$focus->id}' ";
		}
		$r_opp = $db->query( $q_opp );
		while( $v_opp = $db->fetchByAssoc( $r_opp ) ){
			$aOpportunitiesMembers[]=$v_opp['opportunity_id'];
		}
	}

	//se view_payment=1
	if(isset($oOsyAdministrationPanel->view_partial_payments) && $oOsyAdministrationPanel->view_partial_payments && count($aOpportunitiesMembers)>0 ){
		$partial_payment_c = 0;
		//il partial_payments_c sarà calcolato cosi:
		//	- controlla tutti i record legati a quel member_id (se non c'è metto 0 da subito)
		//	- in cui lo payment_status = "Not Paid"(2) e expiry_date < $cur.expiry_date
		//	- per tutte queste righe sommo il campo total_partial (da creare)
		$q_o = "SELECT SUM(IFNULL(total_partial,0)) partial_payment_c, SUM( {$q_sum_total_partial} ) sum_total_partial
			FROM opportunities o LEFT JOIN opportunities_cstm oc ON oc.id_c=o.id
			WHERE o.id IN('".implode("','",$aOpportunitiesMembers)."')
			AND deleted=0
			AND payment_status = '2'
			AND expiry_date < '{$sExpiry_date_db}'
		";
		$r_o = $db->query( $q_o );
		$v_o = $db->fetchByAssoc( $r_o );
		if(isset($v_o["sum_total_partial"]) && !empty($v_o["sum_total_partial"])){
			$partial_payment_c =$v_o["sum_total_partial"];
		}
	}else{
		$partial_payment_c = 0;
	}

	//- il total_amount_c sarà calcolato cosi: total_partial + partial_payments_c
	$total_amount_c = $total_partial + $partial_payment_c;

	$aRet=array();
	if($format){
		$aRet['total_partial'] = format_number($total_partial);
		$aRet['partial_payment_c'] = format_number($partial_payment_c);
		$aRet['total_amount_c'] = format_number($total_amount_c);
	}else{
		$aRet['total_partial'] = $total_partial;
		$aRet['partial_payment_c'] = $partial_payment_c;
		$aRet['total_amount_c'] = $total_amount_c;
	}
	return $aRet;
}

function osyNextRealculatePartialAndTotal(&$focus,$format=true){
	//- una volta salvato il dato, bisogna ricalcolare i tre campi per tutti i record con expiry_date > $cur.expiry_date
	//retieve dell'opportunità legata al stesso account, con MIN(expiry_date)>$cur.expiry_date
	//e save di questa

	global $db;

	require_once("data/BeanFactory.php");

	$sExpiry_date_db = get_osy_expiry_date_db($focus->expiry_date);
	// se al record in salvataggio è cambiata l'expiry_date, bisogna fare il pezzo (b) a partire dalla data minore tra le due date(vecchia e nuova)
	if(isset($focus->old_expiry_date) && !empty($focus->old_expiry_date)){
		$sOldExpiry_date_db = get_osy_expiry_date_db($focus->old_expiry_date);
		if(
			(!empty($sOldExpiry_date_db) && empty($sExpiry_date_db)) ||
			(!empty($sOldExpiry_date_db) && !empty($sExpiry_date_db) && $sOldExpiry_date_db < $sExpiry_date_db )
		){
			$sExpiry_date_db = $sOldExpiry_date_db;
		}
	}

	$aOppIds=array();
	$q_opp = "SELECT ac.opportunity_id
		FROM accounts_opportunities ac
		INNER JOIN opportunities o ON o.id=ac.opportunity_id
		WHERE ac.deleted=0 AND ac.account_id='{$focus->account_id}'
		AND o.expiry_date > '{$sExpiry_date_db}'
		AND o.deleted = 0
	";
	if( isset($focus->id) && !empty($focus->id)){
		$q_opp.= "AND opportunity_id <> '{$focus->id}' ";
	}
	$q_opp.= " ORDER BY o.expiry_date ASC LIMIT 1 ";
	$r_opp = $db->query( $q_opp );
	$v_opp = $db->fetchByAssoc( $r_opp );
	if(isset($v_opp['opportunity_id']) && !empty($v_opp['opportunity_id'])){
		$aOppIds[$v_opp['opportunity_id']]=$v_opp['opportunity_id'];
	}

	// se al record in salvataggio è cambiato l'account, bisogna rifare il pezzo (b) anche per il vecchio account
	if(isset($focus->old_account_id) && !empty($focus->old_account_id)){
		$q_opp = "SELECT ac.opportunity_id
			FROM accounts_opportunities ac
			INNER JOIN opportunities o ON o.id=ac.opportunity_id
			WHERE ac.deleted=0 AND ac.account_id='{$focus->old_account_id}'
			AND o.expiry_date > '{$sExpiry_date_db}'
			AND o.deleted = 0
		";
		if( isset($focus->id) && !empty($focus->id)){
			$q_opp.= "AND opportunity_id <> '{$focus->id}' ";
		}
		$q_opp.= " ORDER BY o.expiry_date ASC LIMIT 1 ";
		$r_opp = $db->query( $q_opp );
		$v_opp = $db->fetchByAssoc( $r_opp );
		if(isset($v_opp['opportunity_id']) && !empty($v_opp['opportunity_id'])){
			$aOppIds[$v_opp['opportunity_id']]=$v_opp['opportunity_id'];
		}
	}

	foreach($aOppIds as $sNewOppId){
		$oOpportunitiesNext=BeanFactory::getBean($focus->module_name,$sNewOppId);
		$oOpportunitiesNext->is_next_recalculate=true;
		$oOpportunitiesNext->save(true);
	}

}

function get_osy_expiry_date_db($date){
	global $timedate;
	$date_db = '';
	if(isset($date) && !empty($date)){
		$check = $timedate->check_matching_format($date, $timedate->dbDayFormat);
		if($check){
			$date_db = $date; //LA DATA È IN FORMATO DATABASE
		}else{
			$date_db = $timedate->to_db_date($date, false); //LA DATA NON È IN FORMATO DATABASE E LA TRASFORMO IN TALE
		}
	}
	return $date_db;
}
