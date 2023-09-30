<?php
/**
 * Aggiunge dei campi hidden se necessario
 * @param String $button: stringa che definisce il tasto da visualizzare
 * 			come top button in un sottopannello. Tale stringa verrà modificata aggiugendovi dei campi hidden il cui valore
 * 			verrà preso dal bean di cui stiamo visualizzando il dettaglio.
 * @param array $defines
 */
function addAdditionalFormFields(&$button, $defines){
	// additional_form_fields
	if (isset($defines['additional_form_fields']) && is_array($defines['additional_form_fields'])) {
		foreach($defines['additional_form_fields'] as $key => $value) {
			// se inizia per $ è una variabile
			if (substr($value, 0, 1) == '$') {
				$field = substr($value, 1);
				if (! empty($defines['focus']->$field)) {
					$value = $defines['focus']->$field;
				} else {
					$value = '';
				}
			}
			$button .= '<input type="hidden" name="' . $key . '" value=\'' . $value . '\' />' . "\n";
		}
	}
}

?>