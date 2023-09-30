<?php
class osyCustomFunctionContacts {
	function osyBeforeSave(&$bean) {
		// Aggiungo il campo committees del contact all'account associato se non lo è già presente
		if($bean->committees != '') {
			if ($bean->load_relationship('accounts')) {
				$add = false;
				$oContactCommitteesList = explode(",", $bean->committees);
				$oAccountList = $bean->accounts->getBeans();
				foreach ($oAccountList as $oAccount) {
					$oAccountCommitteesList = explode(",", $oAccount->committees);
					foreach ($oContactCommitteesList as $oContactCommittees) {
						if ($oAccount->committees != '') {
							if (!in_array($oContactCommittees, $oAccountCommitteesList)) {
								$addString = '';
								if (count($oAccountCommitteesList) > 0)
									$addString = ',';
								$addString .= $oContactCommittees;
								$oAccount->committees .= $addString;
								$add = true;
							}
						} else {
							$addString = '';
							$addString .= $oContactCommittees;
							$oAccount->committees .= $addString;
							$add = true;
						}
					}
					if ($add) {
						$oAccount->osyFromConvertLead = isset($bean->osyAccountFromConvertLead) ? $bean->osyAccountFromConvertLead : false;
//						$oAccount->save();

						global $db;
						$q = "UPDATE accounts SET committees = '".$oAccount->committees."' WHERE id = '".$oAccount->id."' AND deleted = 0";
						$db->query($q);
					}
				}
			}
		}
	}
}