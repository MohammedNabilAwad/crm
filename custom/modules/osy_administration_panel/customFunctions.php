<?php
//OPENSYMBOLMOD isabella.masiero 06/mag/2013
class osyAdministrationPanelCustomFunction {
	function osyBeforeSave (&$focus){
		// ATTENZIONE!!!!
		// in questo modulo deve esserci sempre UNA SOLA RIGA perchè si tratta di un pannello di configurazione

		global $mod_strings;
		
		$focus->name = $mod_strings["LBL_ADMINISTRATION_GENERAL_SETTINGS"];
				
		if(isset($focus->id) && !empty($focus->id)){
			require_once("data/BeanFactory.php");			
			$focus_old = New $focus->object_name();
			$focus_old->retrieve($focus->id);
		}
		//verfico se il record esiste già.
		// se esiste significa che sono in update, 
		// se non esiste, sto creando e devo verificare se esiste già un id a db, e se esiste assegno l'id vecchio a quello nuovo e cancello quelli vecchi
		if((!isset($focus->id) || empty($focus->id)) || (!isset($focus_old->id) || empty($focus_old->id))){
			global $db;
			$q_old = "SELECT id
				FROM $focus->table_name
				ORDER BY date_entered ASC LIMIT 1
			";
			$r_old = $db->query( $q_old );
			$v_old = $db->fetchByAssoc( $r_old );

			if(isset($v_old) && isset($v_old['id']) && !empty($v_old['id'])){
				$q_del_old = "DELETE FROM $focus->table_name WHERE id <> '$focus->id' ";
				$r_del_old = $db->query( $q_del_old );
				$focus->id = $v_old['id'];
			}else{
				//se sono in creazione, alla fine del salvataggio aggiorno tutte le opportunità e le lego il nuovo record
				$focus->update_opportunity=true;
			}
		}
	}
	function osyAfterSave (&$focus){
		if(isset($focus->update_opportunity) && $focus->update_opportunity){
			//se sono in creazione, alla fine del salvataggio aggiorno tutte le opportunità e le lego il nuovo record
			global $db;
			$q_un = "UPDATE opportunities SET osy_administration_panel_id = '{$focus->id}' WHERE osy_administration_panel_id IS NULL";
			$r_un = $db->query( $q_un );
			$q_u = "UPDATE opportunities SET osy_administration_panel_id = '{$focus->id}' WHERE osy_administration_panel_id <> '{$focus->id}'";
			$r_u = $db->query( $q_u );
		}		
	}
}

function osy_send_reminder_opp(){
	require_once("data/BeanFactory.php");	
	
	global $db, $timedate;
	$q_old = "SELECT id
		FROM osy_administration_panel
		ORDER BY date_entered ASC LIMIT 1
	";
	$r_old = $db->query( $q_old );
	$v_old = $db->fetchByAssoc( $r_old );
	if(isset($v_old['id']) && !empty($v_old['id'])){
		$oAdminPanel=BeanFactory::getBean('osy_administration_panel',$v_old['id']);
	}
	if(isset($oAdminPanel->id) && !empty($oAdminPanel->id)){
		
		$db_date_now=$timedate->nowDbDate();			

		$oDateNow=$timedate->getNow(); // data di oggi
		$db_DateNow=$timedate->asDbDate($oDateNow, true);
		
		$oDateThreeMonthsAgo = clone $oDateNow;
		date_sub($oDateThreeMonthsAgo, date_interval_create_from_date_string('3 months')); // data di 3 mesi fa
		$db_DateThreeMonthsAgo = $timedate->asDbDate($oDateThreeMonthsAgo, true);
		
		$oDateTwoMonthsAgo = clone $oDateNow;
		date_sub($oDateTwoMonthsAgo, date_interval_create_from_date_string('2 months')); // data di 2 mesi fa
		$db_DateTwoMonthsAgo = $timedate->asDbDate($oDateTwoMonthsAgo, true);
		
		$oDateOneMonthAgo = clone $oDateNow;
		date_sub($oDateOneMonthAgo, date_interval_create_from_date_string('1 months')); // data di un mese fa
		$db_DateOneMonthAgo = $timedate->asDbDate($oDateOneMonthAgo, true);
		
		$oDateThreeWeeksAgo = clone $oDateNow;
		date_sub($oDateThreeWeeksAgo, date_interval_create_from_date_string('21 days')); // data di 3 settimane fa
		$db_DateThreeWeeksAgo = $timedate->asDbDate($oDateThreeWeeksAgo, true);
		
		$oDateTwoWeeksAgo = clone $oDateNow;
		date_sub($oDateTwoWeeksAgo, date_interval_create_from_date_string('14 days')); // data di 2 settimane fa
		$db_DateTwoWeeksAgo = $timedate->asDbDate($oDateTwoWeeksAgo, true);
		
		$oDateOneWeekAgo = clone $oDateNow;
		date_sub($oDateOneWeekAgo, date_interval_create_from_date_string('7 days')); // data di una settimana fa
		$db_DateOneWeekAgo = $timedate->asDbDate($oDateOneWeekAgo, true);
		
		$oDateOneDayAgo = clone $oDateNow;
		date_sub($oDateOneDayAgo, date_interval_create_from_date_string('1 days')); // data di una settimana fa
		$db_DateOneDayAgo = $timedate->asDbDate($oDateOneDayAgo, true);

		if(isset($oAdminPanel->send_reminder_period) && !empty($oAdminPanel->send_reminder_period)){
			$aSendReminderPeriod=explode(',',$oAdminPanel->send_reminder_period);
			foreach($aSendReminderPeriod as &$sValue){
				$sValue = str_replace ( '^', '' , $sValue );	
		
				$aRecordToReminder=array();	
				switch ($sValue) {
					case 'three_months':
						$db_date_check = $db_DateThreeMonthsAgo; 
						break;
					case 'two_months':
						$db_date_check = $db_DateTwoMonthsAgo; 
						break;
					case 'one_month':
						$db_date_check = $db_DateOneMonthAgo; 
						break;
					case 'three_weeks':
						$db_date_check = $db_DateThreeWeeksAgo; 
						break;
					case 'two_weeks':
						$db_date_check = $db_DateTwoWeeksAgo; 
						break;
					case 'one_week':
						$db_date_check = $db_DateOneWeekAgo;
						break;
					case 'day_after_expire':
						$db_date_check = $db_DateOneDayAgo;
						break;
					case 'expire_date':
						$db_date_check = $db_DateNow;
						break;
				}
				if(isset($db_date_check) && !empty($db_date_check)){
					$q_r = "SELECT id
						FROM opportunities
						WHERE expiry_date = '$db_date_check' AND deleted = 0
					";
					$r_r = $db->query( $q_r );
					while( $v_r = $db->fetchByAssoc( $r_r ) ){
						if(isset($v_r['id']) && !empty($v_r['id'])) $aRecordToReminder[]=$v_r['id'];
					}
				}
			}
			
			$aUserObj=array();
			$aAccountObj=array();
			$aOpportunityMemo=array();
			foreach($aRecordToReminder as $sOpportunity_id){
				$oOpportunity=BeanFactory::getBean('Opportunities',$sOpportunity_id);
				
				if(isset($oAdminPanel->flag_reminder_assigned_user) && !empty($oAdminPanel->flag_reminder_assigned_user)){
					// set reminders for the Assigned users of the Subscription Fee
					if(isset($oOpportunity->assigned_user_id) && !empty($oOpportunity->assigned_user_id) ){
						$oUser=BeanFactory::getBean('Users',$oOpportunity->assigned_user_id);
						if(isset($oUser->email1) && !empty($oUser->email1)){
							$aUserObj[$oUser->id]=$oUser;
						}
					}
				}
				if(isset($oAdminPanel->flag_reminder_members) && !empty($oAdminPanel->flag_reminder_members)){
					// set reminders for the Members who has to pay
					$oOpportunity->load_relationships('accounts');
					$aAccount_rel=$oOpportunity->get_linked_beans('accounts','Account');					
					foreach($aAccount_rel as $k=>$oAccount){
						if(isset($oAccount->email1) && !empty($oAccount->email1)){
							$aAccountObj[$oAccount->id] = $oAccount;

							//per salvare l'informazione del numero di reminder fatti (solo per l'account)
							if(!isset($aOpportunityMemo[$oAccount->id]) || !is_array($aOpportunityMemo[$oAccount->id]) ){
								$aOpportunityMemo[$oAccount->id]=array();
							}
							$aOpportunityMemo[$oAccount->id][$sOpportunity_id]=$sOpportunity_id;
						}
					}
				}					
			}
			
			$object_mail = translate('Reminder for Subscription Fee Payment');
			$body_mail = $oAdminPanel->description;
			foreach($aAccountObj as $sId=>$oBean){
				$ret=send_reminder_opp_email($oBean,$object_mail,$body_mail);
				
				//aggiorno il numero di reminder inviati per ogni opportunità di quelle nella lista da lanciare il reminder adesso
				if($ret){
					foreach($aOpportunityMemo[$sId] as $sIdOpp){
						$q_u = "UPDATE opportunities SET nr_reminders = (IFNULL(nr_reminders,0) +1 ) WHERE id = '$sIdOpp' ";
						$r_u = $db->query( $q_u );
					}
				}
			}
			foreach($aUserObj as $sId=>$oBean){
				$ret=send_reminder_opp_email($oBean,$object_mail,$body_mail);
			}
		}
	}
}

function send_reminder_opp_email($oBean,$object_mail,$body_mail){
	// ho preso questo codice unendo le funzioni
	// $oBean->send_assignment_notifications($notify_user, $admin);
	// e
	// $notify_mail = $this->create_notification_email($notify_user);
	// e togliendo i pezzi che non servivano
	// è necessario che il bean che viene passato abbia il campo email1 valorizzato e anche il campo name

	if(
		!isset($oBean->email1) || empty($oBean->email1) ||
		( ( !isset($oBean->name) || empty($oBean->name) ) && ( !isset($oBean->full_name) || empty($oBean->full_name) ) )
	){
		$GLOBALS['log']->fatal("ERROR send_reminder_opp_email: è necessario che il bean che viene passato abbia il campo email1 valorizzato e anche il campo name");
		return false;
	}
	require_once('include/SugarPHPMailer.php');
	require_once("modules/Administration/Administration.php");

	global $current_user;
	global $sugar_version;
	global $sugar_config;
	global $app_list_strings;
	global $locale;
	global $beanList;
	
	$admin = new Administration();
	$admin->retrieveSettings();

	$sendToEmail = $oBean->email1;

	$OBCharset = $locale->getPrecedentPreference('default_email_charset');
	
	$notify_address = $oBean->email1;
	if(isset($oBean->full_name) && !empty($oBean->full_name)){
		$notify_name = $oBean->full_name;
	}else{
		$notify_name = $oBean->name;
	}
			
	$GLOBALS['log']->debug("Notifications: user has e-mail defined");
	
	$notify_mail = new SugarPHPMailer();
	$notify_mail->AddAddress($notify_address,$locale->translateCharsetMIME(trim($notify_name), 'UTF-8', $OBCharset));
	
	$notify_mail->Body = from_html($body_mail);
	$notify_mail->Subject = from_html($object_mail);
	
	// cn: bug 8568 encode notify email in User's outbound email encoding
	$notify_mail->prepForOutbound();
	
	$notify_mail->setMailerForSystem();

	if(empty($admin->settings['notify_send_from_assigning_user'])) {
		$notify_mail->From = $admin->settings['notify_fromaddress'];
		$notify_mail->FromName = (empty($admin->settings['notify_fromname'])) ? "" : $admin->settings['notify_fromname'];
	} else {
		// Send notifications from the current user's e-mail (if set)
		$fromAddress = $current_user->emailAddress->getReplyToAddress($current_user);
		$fromAddress = !empty($fromAddress) ? $fromAddress : $admin->settings['notify_fromaddress'];
		$notify_mail->From = $fromAddress;
		//Use the users full name is available otherwise default to system name
		$from_name = !empty($admin->settings['notify_fromname']) ? $admin->settings['notify_fromname'] : "";
		$from_name = !empty($current_user->full_name) ? $current_user->full_name : $from_name;
		$notify_mail->FromName = $from_name;
	}

	$oe = new OutboundEmail();
	$oe = $oe->getUserMailerSettings($current_user);
	//only send if smtp server is defined

	$smtpVerified = false;

	//first check the user settings
	if(!empty($oe->mail_smtpserver)){
		$smtpVerified = true;
	}

	//if still not verified, check against the system settings
	if (!$smtpVerified){
		$oe = $oe->getSystemMailerSettings();
		if(!empty($oe->mail_smtpserver)){
			$smtpVerified = true;
		}
	}
	//if smtp was not verified against user or system, then do not send out email
	if (!$smtpVerified){
		$GLOBALS['log']->fatal("Notifications: error sending e-mail, smtp server was not found ");
		//break out
		return;
	}

	if(!$notify_mail->Send()) {
		$GLOBALS['log']->fatal("Notifications: error sending e-mail (method: {$notify_mail->Mailer}), (error: {$notify_mail->ErrorInfo})");
	}else{
		$GLOBALS['log']->info("Notifications: e-mail successfully sent");
		return true;
	}
}

	