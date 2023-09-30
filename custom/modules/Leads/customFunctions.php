<?php
class osyCustomFunctionLeads {
	function osyBeforeSave(&$bean) {
		
		if (isset ( $bean->converted ) && ! empty ( $bean->converted ) && $bean->converted == '1') {
			$bean->deleted = 2;
		}

		if (isset ( $bean->industry ) && ! empty ( $bean->industry )) {
			$bean->load_relationship ( 'osy_contactpotentialmember_link' );
			$oContactList = $bean->osy_contactpotentialmember_link->getBeans ();
			foreach ( $oContactList as $oContact ) {
//				$oContact->industry = $bean->industry;
//				$oContact->save ();
				$q_industry = "UPDATE osy_contactspotentialmember SET industry = ".$oContact->db->quoted($bean->industry)." WHERE id = '{$oContact->id}'";
				$r_industry = $oContact->db->query($q_industry);
			}
		}
                
                $bean->last_name = $bean->account_name;
	}
	function osyAfterSave(&$bean) {
		if (isset ( $bean->converted ) && ! empty ( $bean->converted ) && $bean->converted == '1') {

			if (isset ( $bean->account_id ) && $bean->account_id != '' && ! empty ( $bean->account_id )) {

				$bean->load_relationship ( "calls" );
				$array_calls = $bean->calls->getBeans ();

				$bean->load_relationship ( "notes" );
				$array_notes = $bean->notes->getBeans ();

				$bean->load_relationship ( "tasks" );
				$array_tasks = $bean->tasks->getBeans ();

				$bean->load_relationship ( "meetings" );
				$array_meetings = $bean->meetings->getBeans ();

				$bean->load_relationship ( "osy_services_companies" );
				$array_osy_services_companies = $bean->osy_services_companies->getBeans ();

				require_once ("modules/Accounts/Account.php");
				$Account = new Account ();
				$recordAccount = $Account->retrieve ( $bean->account_id );

				$recordAccount->load_relationship ( "notes_for_leads" );
				$recordAccount->notes_for_leads->add ( $array_notes );

				$recordAccount->load_relationship ( "meetings_for_leads" );
				$recordAccount->meetings_for_leads->add ( $array_meetings );

				$recordAccount->load_relationship ( "tasks_for_leads" );
				$recordAccount->tasks_for_leads->add ( $array_tasks );

				$recordAccount->load_relationship ( "calls_for_leads" );
				$recordAccount->calls_for_leads->add ( $array_calls );

				$recordAccount->load_relationship ( "osy_services_companies" );
				$recordAccount->osy_services_companies->add ( $array_osy_services_companies );

// 				$recordAccount->save ();
			}
		}
	}
}