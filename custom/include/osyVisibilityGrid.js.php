<?php

function osyVisibilityGridInit(&$oContext) {
	$oJson = getJSONobj();

	// could use $oContext->_tpl_vars['fields'] that contains the options array ready to use
	$sRet = '';
	foreach($oContext->_tpl_vars['bean']->field_defs as $sFieldId => $aField) {
		if(isset($aField['visibility_grid'])
			&& isset($aField['visibility_grid']['trigger'])
			&& isset($aField['visibility_grid']['values'])
		) {
				$aGrid = $oJson->encode($aField['visibility_grid']['values']);

				$sRet .= sprintf('var oOVG = new osyVisibilityGrid("%s", "%s", "%s", "%s", %s); oOVG.init();',
					$aField['visibility_grid']['trigger'],
					$sFieldId,
					$oContext->_tpl_vars['fields'][$sFieldId]['value'],
					isset($aField['options']) ? $aField['options'] : '',
					$aGrid
				);
		}
	}

	return $sRet;
}

?>

/*
String.prototype.replaceAll = function( token, newToken, ignoreCase ) {
	var _token;
	var str = this + "";
	var i = -1;

	if ( typeof token === "string" ) {

		if ( ignoreCase ) {

			_token = token.toLowerCase();

			while( (
				i = str.toLowerCase().indexOf(
					token, i >= 0 ? i + newToken.length : 0
				) ) !== -1
			) {
				str = str.substring( 0, i ) +
					newToken +
					str.substring( i + token.length );
			}

		} else {
			return this.split( token ).join( newToken );
		}

	}
	return str;
};
*/

function osyVisibilityGrid(sTriggerId, sTargetId, sTargetValue, sAppListStringKey, oGrid, bEmptyOptionsIfNotInGrid) {
	this.oTrigger = document.getElementById(sTriggerId);
	this.oTarget = document.getElementById(sTargetId);
	this.sAppListStringKey = sAppListStringKey;
	this.oGrid = oGrid;
	this.bEmptyOptionsIfNotInGrid = bEmptyOptionsIfNotInGrid;

	this.init = function() {
		if(typeof(this.oTrigger) == 'undefined' || !this.oTrigger) {
			this.consoleLog('Error - Trigger not found');
			return false;
		}
		if(typeof(this.oTarget) == 'undefined' || !this.oTarget) {
			this.consoleLog('Error - Target not found');
			return false;
		}
		if(typeof(this.bEmptyOptionsIfNotInGrid) == 'undefined') {
			this.bEmptyOptionsIfNotInGrid = true;
		}

		var oOsyVisibilityGrid = this;

		YAHOO.util.Event.on(this.oTrigger, 'change', function() { oOsyVisibilityGrid.apply(); });

		this.apply();
	};

	this.apply = function() {
		var sTriggerValue;

		var aTriggerSelected = new Array();
		var aTotalFilterValue = new Array();
		if(this.oTrigger.type == 'select-multiple'){
			for(var i = 0; i < this.oTrigger.options.length; i++) {
				if(this.oTrigger.options[i].selected && this.oGrid[this.oTrigger.options[i].value]) {
					aTriggerSelected.push(this.oTrigger.options[i].value);
					aTotalFilterValue = [];
					for(var j = 0; j < aTriggerSelected.length; j++){
						for(var k = 0; k < this.oGrid[aTriggerSelected[j]].length; k++){
							aTotalFilterValue.push(this.oGrid[aTriggerSelected[j]][k]);
						}
					}
//                	this.consoleLog('Warning: osyVisibilityGrid used with a select multiple trigger element, id: '+this.oTrigger.id+' - value used: '+this.oTrigger.options[i].value);
//                  sTriggerValue = this.oTrigger.options[i].value;
				}
			}
		}
		else if((this.oTrigger.type == 'checkbox' || this.oTrigger.type == 'radio') && !this.oTrigger.checked) {
			sTriggerValue = '0';
		}
		else {
			sTriggerValue = this.oTrigger.value;
		}

		var bFireOnChangeListener = false;

		//emtpy options
		for(var i = this.oTarget.options.length - 1; i >= 0; i--) {
			this.oTarget.options[i] = null;
		}

		if(this.oTrigger.type == 'select-multiple'){
			for(var i = 0; i < aTotalFilterValue.length; i++) {
				var sLabel = aTotalFilterValue[i];
				if(this.sAppListStringKey && typeof(SUGAR.language.languages.app_list_strings[this.sAppListStringKey][sLabel]) != 'undefined'){
					sLabel = SUGAR.language.languages.app_list_strings[this.sAppListStringKey][sLabel];
				}

				var oOption = new Option(sLabel, aTotalFilterValue[i]);

				/*
				sTargetValue = sTargetValue.replaceAll('^,^', '@');
				sTargetValue = sTargetValue.replaceAll('^', '');

				var aTargetValue = sTargetValue.split("@");
				*/
				var aTargetValue = sTargetValue.replace(/^\^(.*)\^$/, '$1').split('^,^');

				for(var j = 0; j < aTargetValue.length; j++) {
					if(aTotalFilterValue[i] == aTargetValue[j]) {
						oOption.selected = 'selected';
					}
				}
				this.oTarget.options[i] = oOption;
			}
			bFireOnChangeListener = true;
		}
		else {
			if(typeof(this.oGrid[sTriggerValue]) != 'undefined' && this.oGrid[sTriggerValue]) {
				for(var i = 0; i < this.oGrid[sTriggerValue].length; i++) {
					var sLabel = this.oGrid[sTriggerValue][i];
					if(this.sAppListStringKey && typeof(SUGAR.language.languages.app_list_strings[this.sAppListStringKey][sLabel]) != 'undefined') {
						sLabel = SUGAR.language.languages.app_list_strings[this.sAppListStringKey][sLabel];
					}

					var oOption = new Option(sLabel, this.oGrid[sTriggerValue][i]);
					if(this.oGrid[sTriggerValue][i] == sTargetValue) {
						oOption.selected = 'selected';
					}
					this.oTarget.options[i] = oOption;
				}

				bFireOnChangeListener = true;
			}
			else if(!this.bEmptyOptionsIfNotInGrid && this.sAppListStringKey && typeof(SUGAR.language.languages.app_list_strings[this.sAppListStringKey]) != 'undefined') {
				var j = 0;
				for(var i in SUGAR.language.languages.app_list_strings[this.sAppListStringKey]) {
					var oOption = new Option(SUGAR.language.languages.app_list_strings[this.sAppListStringKey][i], i);
					if(i == sTargetValue) {
						oOption.selected = 'selected';
					}
					this.oTarget.options[j] = oOption;
					j++;
				}
				bFireOnChangeListener = true;
			}
		}
		if(bFireOnChangeListener) {
			SUGAR.util.callOnChangeListers(this.oTarget);
		}
	}; //end apply

	this.consoleLog = function(sMessage) {
		if(console && typeof(console.log) != 'undefined') {
			console.log(sMessage);
		}
	};
}
