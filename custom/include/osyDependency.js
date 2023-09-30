function osyDependency(oFieldValues, sMultiValueSeparator, bHiddenOnload, bIsEditView) {

    if(typeof(bHiddenOnload) == 'undefined') {
        bHiddenOnload = true;
    }
    if(typeof(sMultiValueSeparator) == 'undefined') {
        sMultiValueSeparator = '^,^';
    }

    var oTrCollection = {};

    for(var sTargetId in oFieldValues) {
        var oEl = document.getElementById(sTargetId);
        if(oEl) {
            if(typeof(bIsEditView) == 'undefined') {
                bIsEditView = oEl.form ? true : false;
            }


            var oFieldEl = document.getElementById(oFieldValues[sTargetId]['field']);
            if(oFieldEl) {
                if(typeof(oFieldEl.osyDependency) == 'undefined') {
                    oFieldEl.osyDependency = true;
                    YAHOO.util.Event.on(oFieldEl, 'change', function() { osyDependency(oFieldValues, sMultiValueSeparator); });
                }

                var sValue = '';
                if(oFieldEl.type == 'select-multiple') {
                    for(var j = 0; j < oFieldEl.options.length; j++) {
                        if(oFieldEl.options[j].selected) {
                            sValue += sMultiValueSeparator+oFieldEl.options[j].value;
                        }
                    }
                    if(sValue.length > 0) {
                        sValue += sMultiValueSeparator;
                    }
                }
                else if(oFieldEl.type == 'checkbox' || oFieldEl.type == 'radio') {
                    sValue = oFieldEl.checked ? oFieldEl.value : '';
                }
                else {
                    sValue = oFieldEl.value;
                }

                var oRegExp = new RegExp(oFieldValues[sTargetId]['value']);

                bHiddenOnload = (oRegExp && oRegExp.test(sValue)) ? false : true;
            }

            var sDisplay = bHiddenOnload ? 'none' : '';

            if (sDisplay == "none")
                $( 'div[field='+sTargetId+']' ).parent().hide();
            else
                $( 'div[field='+sTargetId+']' ).parent().show();

            // set display attribute
            var aElsToSetDisplay = oEl.parentNode.childNodes;
            var aChildToRemove = []; // better not to modify array taht you are using in a for cycle!
            for(var i = 0; i < aElsToSetDisplay.length; i++) {
                if(aElsToSetDisplay[i] && aElsToSetDisplay[i].nodeType === 1) { // 1 == Node.ELEMENT_NOD
                    aElsToSetDisplay[i].style.display = sDisplay;
                }
                else if(bHiddenOnload && aElsToSetDisplay[i] && aElsToSetDisplay[i].nodeType === 3) {  // 3 == Node.TEXT_NODE
                    aChildToRemove.push(aElsToSetDisplay[i]);
                }
            }
            for(var i = 0; i < aChildToRemove.length; i++) {
                aChildToRemove[i].parentNode.removeChild(aChildToRemove[i]);
            }

            // try to manage label element
            var sLabelId = typeof(oFieldValues[sTargetId]['label']) != 'undefined' ? oFieldValues[sTargetId]['label'] : sTargetId+'_label';
            var oLabelEl = document.getElementById(sLabelId);
            if(!oLabelEl) { // chances are that we are in DetailView
                var oLabelEl = oEl;
                while(oLabelEl && oLabelEl.tagName && oLabelEl.tagName.toLowerCase() != 'td') {
                    oLabelEl = oLabelEl.parentNode;
                }

                //oLabelEl = oEl.parentNode;
                do {
                    oLabelEl = oLabelEl.previousSibling;
                } while(oLabelEl && oLabelEl.nodeType !== 1); // 1 == Node.ELEMENT_NOD
            }

            var oContainer = document.getElementById(sLabelId+'_osyDependency');
            if(!oContainer) {
                var oContainer = document.createElement('DIV');
                oContainer.id = sLabelId+'_osyDependency';
                oLabelEl.parentNode.appendChild(oContainer);

                for(var k = oLabelEl.childNodes.length - 1; k > -1; k--) {
                    oContainer.insertBefore(oLabelEl.childNodes[k], oContainer.firstChild);
                }

                oLabelEl.appendChild(oContainer);
            }

            oContainer.style.display = sDisplay;


            // collect parent <tr> to hide them if necessary and to check wheter there are fields without osy dependency
            var oTr = oEl;
            do {
                oTr = oTr.parentNode;
            } while(oTr && oTr.tagName && oTr.tagName.toLowerCase() != 'tr');
            // in element's row, set an array attribute where we'll put field's visibility values
            if(typeof(oTr.id) == 'undefined' || !oTr.id) {
                var oDate = new Date();
                var sId = Math.random() + oDate.valueOf();

                oTr.id = sId;
            }
            oTrCollection[oTr.id] = oTr;

            // set osyDependency attribute to the parent <td>
            var aTdEls = [ oEl, oLabelEl ];
            for(var i = 0; i < aTdEls.length; i++) {
                var oTd = aTdEls[i];
                while(oTd && oTd.tagName && oTd.tagName.toLowerCase() != 'td') {
                    oTd = oTd.parentNode;
                }

                oTd.osyDependency = bHiddenOnload;
            }


            // manage required
            if(typeof(oFieldValues[sTargetId]['attr']) == 'object' && bIsEditView) {
                var sFormName;
                if(typeof(oEl.form) != 'undefined'){
                    if(oEl.form.getAttribute) {
                        sFormName = oEl.form.getAttribute('name');
                    }
                    else if(oEl.form.id) {
                        sFormName = oEl.form.id;
                    }
                    else {
                        sFormName = oEl.form.name;
                    }
                }

                if(checkValidate && checkValidate(sFormName, oEl.name)) {
                    removeFromValidate(sFormName, oEl.name);
                }
                else if(oFieldValues[sTargetId]['attr']['required'] && !bHiddenOnload && addToValidate) {
                    addToValidate(
                        sFormName,
                        oEl.name,
                        oFieldValues[sTargetId]['attr']['type'],
                        true,
                        SUGAR.language.get(oFieldValues[sTargetId]['attr']['module'], oFieldValues[sTargetId]['attr']['labelKey'])
                    );
                }
            }
        }
    }

    // hide <tr> if necessary
    var bRowIsHidden;
    for(var i in oTrCollection) {
        bRowIsHidden = true;

        for(var k = 0; k < oTrCollection[i].childNodes.length; k++) {
            var oCurrentTd = oTrCollection[i].childNodes[k];

            if(oCurrentTd.nodeType == 1
                && oCurrentTd.children
                && oCurrentTd.children.length > 0 // get rid of non-fields (eg. rows with less fields than others)
                && oCurrentTd.tagName
                && oCurrentTd.tagName.toLowerCase() == 'td'
                && (typeof(oCurrentTd.osyDependency) == 'undefined'
                    || !oCurrentTd.osyDependency)
            ) {
                bRowIsHidden = false;
                break;
            }
        }

        oTrCollection[i].style.display = bRowIsHidden ? 'none' : '';
    }
}