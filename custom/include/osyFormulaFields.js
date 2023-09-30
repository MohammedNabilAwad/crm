// NOTE: num_grp_sep, dec_sep, formatNumber, unformatNumber   vars come from Sugar

function osyFormulaFields(sTargetId, formula, sEvent, bIsCurrency) {
        this.oTarget = document.getElementById(sTargetId);
        // formula can be a (complex) formula with fields' ids as operands, they have to be enclosed between { }
        // can be easily customized (maybe $field_name as in the SugarLogic?)
        this.formula = formula;
        this.bIsCurrency = bIsCurrency ? bIsCurrency : false;
        this.sEvent = sEvent ? sEvent : 'blur';

        this.oTriggers = {};
        this.oFormulaRegExp = /{([^{}]*)}/g;


        this.init = function() {
                if(typeof(this.oTarget) === 'undefined') {
                        if(console && typeof(console.log) !== 'undefined') {
                                console.log('Error - Target not found');
                        }
                        return false;
                }

                this.oTriggers = this.getElementsById(this.getElementsIdFrom(this.formula));

                var osyFormulaFields = this;
                for(var i in this.oTriggers) {
                        YAHOO.util.Event.on(this.oTriggers[i], this.sEvent, function(e) { osyFormulaFields.apply(e); });
                }
        };

        this.apply = function(e) {
                var sEval = this.getParsedFormula();

                res = eval(sEval);
                if(this.bIsCurrency) {
                        res = formatNumber(res, num_grp_sep, dec_sep);
                }

                this.oTarget.value = res;

                // fire event also on target!
                if(document.createEventObject) {
                        // dispatch for IE
                        var evt = document.createEventObject();
                        this.oTarget.fireEvent('on'+e.type, evt);
                }
                else {
                        // dispatch for firefox + others
                    var evt = document.createEvent('HTMLEvents');
                    evt.initEvent(e.type, true, false); // event type,bubbling,cancelable
                    this.oTarget.dispatchEvent(evt);
            }

            return true;
    };

    this.getElementsById = function(aElementsId) {
            if(aElementsId.length < 1) {
                    return {};
            }
            var oEls = {};

            for(var i = 0; i < aElementsId.length; i++) {
                    var oEl = document.getElementById(aElementsId[i]);
                    if(typeof(oEl) === 'undefined') {
                            if(console && typeof(console.log) !== 'undefined') {
                                    console.log('Error - Trigger field not found: '+aElementsId[i]);
                            }
                    }
                    else {
                            oEls[aElementsId[i]] = oEl;
                    }
            }

            return oEls;
    };

    this.getElementsIdFrom = function(sString) {
            var aMatches, aRes = [];
            while((aMatches = this.oFormulaRegExp.exec(sString)) != null ) {
                    aRes.push(aMatches[1]);
            }

            return aRes;
    };

    this.getParsedFormula = function() {
            var sParsedFormula = this.formula;
            var osyFormulaFields = this;

            // from ECMA-262 3rd and 5th editions (section 15.5.4.11)
            // replace accept a function as second argument and its arguments are:
            // 1. substring that matched
            // (if replace is used with regexp)
            // 2. all of the captures in the MatchResult
            // 3. the offset within string where the match occurred
            // 4. the whole string
            return sParsedFormula.replace(this.oFormulaRegExp,
                    function(sMatch, sCapture, iOffset, sOrigString) {
                            var sValue = osyFormulaFields.oTriggers[sCapture].value;

                            if(osyFormulaFields.bIsCurrency) {
                                    sValue = unformatNumber(sValue, num_grp_sep, dec_sep);
                            }
                            if(sValue.length < 1 || isNaN(sValue)) {
                                    sValue = '0';
                            }

//                          return (typeof sValue === 'string' || typeof sValue === 'number') ? sValue : sMatch;
                            return parseFloat(sValue);
                    }
            );
    };
}

