
<script type="text/javascript">

//OPENSYMBOLMOD simo - values of *enum* type additionalFields returned from a relate, are the translated label not keys
var oOsyAppListString = {};
<?php
$aOptionsKeys = $aModuleFieldDefs = array();
if(isset($GLOBALS['FOCUS'])) {
	$aModuleFieldDefs = $GLOBALS['FOCUS']->field_defs;
}
else {
	$sModuleName = '';
	if(isset($_REQUEST['target_module']) && !empty($GLOBALS['beanList'][$_REQUEST['target_module']])) {
		$sModuleName = $GLOBALS['target_module'];
	}
	else if(isset($GLOBALS['module']) && !empty($GLOBALS['beanList'][$GLOBALS['module']])) {
		$sModuleName = $GLOBALS['module'];
	}
	else if(isset($_REQUEST['module']) && !empty($GLOBALS['beanList'][$_REQUEST['module']])) {
		$sModuleName = $_REQUEST['module'];
	}

	if(!empty($sModuleName)) {
		$oBean = new $GLOBALS['beanList'][$sModuleName]();
		$aModuleFieldDefs = $oBean->field_defs;
	}
}

foreach($aModuleFieldDefs as $sFieldName => $aFieldDefs) {
	if(isset($aFieldDefs['options']) && !empty($aFieldDefs['options'])) {
		$aOptionsKeys[$sFieldName] = $aFieldDefs['options'];
	}
}

$oJson = getJSONobj();
printf('oOsyAppListString = %s;', $oJson->encode($aOptionsKeys));
?>

//TODO - check if it is still necessary, it seems that in some case the corret key value is returned for enum fields
function convertDropdownValueToKey(oCollectionExtended, sSqsObjId, bSetValue) {
	// something wrong
	if(typeof(oCollectionExtended) != 'object') {
		return oCollectionExtended;
	}
	if(typeof(bSetValue) == 'undefined') {
		bSetValue = true; // default setting
	}

	// thanks to bugfix in overrideSqsObject(), we can distinguish from popup and sqs
	var bFromPopup = typeof(sSqsObjId) == 'undefined' ? true : false;

	var oCurrentSqsObject = { field_list: [] };

	for(var i in oCollectionExtended) {
		var sRealFieldId = null;

		if(bFromPopup) {
			for(var k in oOsyAppListString) {
				if(i == k) {
					sRealFieldId = k;
					break;
				}
			}
		}
		else {
			if(oCurrentSqsObject['field_list'].length < 1) { // there is always one el at least, else must be populate
				if(typeof(oOsyRelateForms[sSqsObjId]) == 'undefined') {
					var oRelateField = document.getElementById(sSqsObjId);

					if(oRelateField && oRelateField.form) {
						if(oRelateField.form.getAttribute) {
							oOsyRelateForms[sSqsObjId] = oRelateField.form.getAttribute('name');
						}
						else {
							oOsyRelateForms[sSqsObjId] = oRelateField.form.id ? oRelateField.form.id : oRelateField.form.name;
						}
					}
				}

				var sSqsIndex = oOsyRelateForms[sSqsObjId]+'_'+sSqsObjId;
				if(typeof(sqs_objects) != 'undefined') {
					oCurrentSqsObject = sqs_objects[sSqsIndex];
				}
			}

			for(var k = 0; k < oCurrentSqsObject['field_list'].length; k++) {
				if(i == oCurrentSqsObject['field_list'][k] && oCurrentSqsObject['populate_list'][k]) {
					sRealFieldId = oCurrentSqsObject['populate_list'][k];
					break;
				}
			}
		}

		if(sRealFieldId
		   && typeof(oOsyAppListString[sRealFieldId]) != 'undefined'
		   && SUGAR
		   && SUGAR.language
		   && SUGAR.language.languages
		   && SUGAR.language.languages.app_list_strings
		   && SUGAR.language.languages.app_list_strings[oOsyAppListString[sRealFieldId]]
		) {
			var oEl = document.getElementById(sRealFieldId);
			if(!oEl) {
				bSetValue = false;
			}

			var oAppListStrings = SUGAR.language.languages.app_list_strings[oOsyAppListString[sRealFieldId]];
			for(var j in oAppListStrings) {
				if(oCollectionExtended[i] == oAppListStrings[j]) {
					if(bSetValue) {
						// only enum and input types supported for now
						if(oEl.type == 'select-multiple' || oEl.type == 'select-one') {
							for(var k = 0; k < oEl.options.length; k++) {
								if(j == oEl.options[k].value) {
									oEl.options[k].selected = 'selected';
								}
							}
						}
						else {
							oEl.value = j;
						}
					}

					oCollectionExtended[i] = j;
					break;
				}
			}
		}
	}

	return oCollectionExtended;
}
//OPENSYMBOLMOD simo - values of *enum* type additionalFields returned from a relate, are the translated label not keys



/**
 * this is to override ajax sqs_objects for a field
 * el string, object   can be the id or the js object of the field
 * sOverrideFunctionName string, function   must be a function or a string (in this case must be the name of an existing function)
 *                       to which the sqs_object will be passed as an argument
 * bSoftProcessQS bool   default to true even if not passed, select wheter to re-process the sqs_objects or not
 * bCompleteProcessQS bool   default to false, select wheter to re-create the entire YAHOO AutoComplete object
 */
function overrideSqsObject(el, sOverrideFunctionName, bSoftProcessQS, bCompleteProcessQS) {
	if(typeof(el) == 'string') {
		el = document.getElementById(el);
	}

	if(el && el.form) {
		// this is because if we access directly with el.form.name and it is present an input with id 'name' then that element will be returned!
		if(el.form.getAttribute) {
			oOsyRelateForms[el.id] = el.form.getAttribute('name');
		}
		else {
			oOsyRelateForms[el.id] = el.form.id ? el.form.id : el.form.name;
		}

		var sSqsIndex = oOsyRelateForms[el.id]+'_'+el.id;
		if(typeof(sqs_objects) != 'undefined' && typeof(sqs_objects[sSqsIndex]) != 'undefined') {
			// sugar bug: even if the relate el id should be available for the post_onblur_function as second argument, it is always undefined
			if(typeof(sqs_objects[sSqsIndex].id) == 'undefined') {
				sqs_objects[sSqsIndex].id = el.id;
			}

			// default is false, but this should imply bSoftProcessQS because it is non-sense alone
			if(typeof(bCompleteProcessQS) != 'undefined' && bCompleteProcessQS) {
				// get YAHOO autocomplete object: this is needed to have complete control also over include/QuickSearchDefaults.php (eg: contacts' relate fields, damn Sugar!!!)
				var oYahooAutoComplete = YAHOO.util.Event.getListeners(el.id)[0]['obj'] || null;

				// if this exists sugar won't reinitialize the AutoComplete object
				var oResultContainer = document.getElementById(sSqsIndex+'_results');
				if(oResultContainer && oYahooAutoComplete) {
					oResultContainer.parentNode.removeChild(oResultContainer);

					oYahooAutoComplete.destroy();
				}
			}

			if(typeof(sOverrideFunctionName) == 'function') {
				sqs_objects[sSqsIndex] = sOverrideFunctionName(sqs_objects[sSqsIndex]);
			}
			else if(typeof(sOverrideFunctionName) == 'string') {
				eval('if('+sOverrideFunctionName+') { sqs_objects[sSqsIndex] = '+sOverrideFunctionName+'(sqs_objects[sSqsIndex]); }');
			}

			if(typeof(bSoftProcessQS) == 'undefined' || bSoftProcessQS) {
				if(typeof(QSProcessedFieldsArray) != 'undefined') {
					QSProcessedFieldsArray[sSqsIndex] = false;
				}
				enableQS(false);
			}
		}
	}
}


if(typeof(oOsyRelateTargetFields) == 'undefined') {
	var oOsyRelateTargetFields = {};
}
if(typeof(oOsyRelateForms) == 'undefined') {
	var oOsyRelateForms = {};
}

function osyRelatePostOnblur(oCollectionExtended, sSqsObjId) {
	oCollectionExtended = convertDropdownValueToKey(oCollectionExtended, sSqsObjId);

	for(var i in oOsyRelateTargetFields) {
		SUGAR.util.callOnChangeListers(oOsyRelateTargetFields[i]);
	}
}
function osyRelatePopup(popup_reply_data) {
	set_return(popup_reply_data);

	osyRelatePostOnblur(popup_reply_data['name_to_value_array']);
}

function osyRelateInit(oRelateField, oFilterParams, sCallback, aTargetFieldIds, bFireCallback, bAddCallbackToClearBtnClick) {
	// register all fields that needs dependencies to be fired
	if(typeof(aTargetFieldIds) != 'undefined' && aTargetFieldIds && aTargetFieldIds.length) {
		for(var i = 0; i < aTargetFieldIds.length; i++) {
			var oTargetField = document.getElementById(aTargetFieldIds[i]);
			if(oTargetField) {
				oOsyRelateTargetFields[oTargetField.id] = oTargetField;
			}
			else if(typeof(console) != 'undefined' && console.log) {
				console.log('osyRelateInit - field not found: '+aTargetFieldIds[i]);
			}
		}
	}

	if(typeof(oRelateField) == 'string') {
		var oRelateField = document.getElementById(oRelateField);
	}
	if(!oRelateField) {
		return false;
	}

	if(typeof(sCallback) != 'undefined' && sCallback) {
		if(typeof(sCallback) == 'function') {
			eval('var fOsyRelateCallback = '+sCallback+';');
			sCallback = 'fOsyRelateCallback';
		}

		if(typeof(bFireCallback) != 'undefined' && bFireCallback) { // default: DO NOT to fire
			// fire first time here to resolve the sugar logic bug on new records
			eval(sCallback+'();');
		}

		if(typeof(bAddCallbackToClearBtnClick) == 'undefined' || bAddCallbackToClearBtnClick) { // default: addListener
			var oClearBtn = document.getElementById('btn_clr_'+oRelateField.id);
			if(oClearBtn) {
				YAHOO.util.Event.addListener(oClearBtn, 'click', function() { eval(sCallback+'();'); });
			}
		}
	}

	// filter the popup
	if(typeof(oFilterParams) != 'undefined' && oFilterParams && oFilterParams['popup']) {
		var oBtnRelateField = document.getElementById('btn_'+oRelateField.id);
		if(oBtnRelateField) {
			var sOnclick = oBtnRelateField.onclick.toString().replace('\n', '');
			eval('oBtnRelateField.onclick = '+sOnclick.replace(/open_popup\s*\(\s*["']{1}([^"']+)["']{1}\s*,\s*(\d+)\s*,\s*(\d+)\s*,\s*["']{1}([^"']*)["']{1}/, 'open_popup("$1",$2,$3,"$4'+oFilterParams['popup']+'"')+';');
		}
	}

	overrideSqsObject(oRelateField, function(oSqsObject) {
		 // filter ajax autocompletion
		if(typeof(oFilterParams) != 'undefined' && oFilterParams && oFilterParams['sqs']) {
			if(typeof(oSqsObject['osyOldWhereExtra']) == 'undefined') {
				if(typeof(oSqsObject['whereExtra']) == 'undefined' || oSqsObject['whereExtra'].length < 1) {
					oSqsObject['whereExtra'] = '';
				}
				oSqsObject['osyOldWhereExtra'] = oSqsObject['whereExtra'];
			}

			oSqsObject['whereExtra'] = oFilterParams['sqs'];
			if(oSqsObject['osyOldWhereExtra'].length > 0) {
				oSqsObject['whereExtra'] += ' AND '+oSqsObject['osyOldWhereExtra'];
			}
		}

		if(typeof(sCallback) != 'undefined' && sCallback) {
			oSqsObject['post_onblur_function'] = sCallback;
		}

		return oSqsObject;
	});
}

</script>