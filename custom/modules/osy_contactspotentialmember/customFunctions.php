<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );
	// OPENSYMBOLMOD - START - davide.dallapozza - 31/gen/2014
	// *************************************************
	// Assegno il nome del lead in Popup,listview e nel subpanel del ProspectList
class osyCustomFunctions {
	function processRecord(&$focus, $event, $arguments) {
		if (($_REQUEST ['action'] === 'index' || 		// if ListView
		$_REQUEST ['action'] === 'Popup' || 		// if Popup
		($_REQUEST ['action'] === 'DetailView' && $_REQUEST ['module'] === 'ProspectLists')) && 		// if Subpanel of ProspectLists
		$focus->load_relationship ( 'leads_link' )) {
			$aMember = $focus->leads_link->getBeans ();
			foreach ( $aMember as $oMember )
				$focus->lead_name = $oMember->account_name;
		}
	}
}

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************
?>