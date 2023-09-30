var osySuiteLogicsValidate = {};

function osySuiteLogics(module, field, formula, operation) {
    //debugger;
    this.module = module;
    this.field = field;
    this.trigger = [];
    this.formula = formula;
    this.operation = operation;
    this.root = jsep(formula);

    this.getField = function (field) {
        var $el = $('#' + this.module + field);

        if ($el.length == 0) {
            $el = $('#' + field);
        }

        if ($el.length == 0) {
            $el = $('[name=' + field + ']').first();
        }

        if ($el.length == 0 && field == 'email1') {
            $el = $('[name$="0emailAddress0"]').first();
        }

        return $el;
    },

        this.$el = this.getField(field);
    this.formName = this.$el.closest('form').attr('name');

    this.fire = function () {
        var ret = this.eval();

        this[this.operation](ret);

        return ret;
    },

    this.eval = function (node) {
        var self = this;

        if (typeof node == 'undefined') node = this.root;

        if (typeof node.name != 'undefined') {
            if (node.name.substr(0, 1) == '$') {
                var trigger = node.name.substr(1);
                if (this.trigger.indexOf(trigger) == -1) {
                    this.trigger.push(trigger);
                    this.getField(trigger).on('change', function () {
                        self.fire();
                    });
                    YAHOO.util.Event.on(this.getField(trigger).get(0), 'change', function () {
                        self.fire();
                    });
                }
                ;
                return this.getField(node.name.substr(1)).val();
            }
            return node.name;

        } else if (typeof node.callee != 'undefined') {
            var args = [];
            for (var i in node.arguments) {
                args.push(this.eval(node.arguments[i]));
            }
            var func = this.eval(node.callee);
            return this[func].apply(null, args);

        } else if (typeof node.value != 'undefined') {
            return node.value;

        } else if (typeof node.operator != 'undefined') {
            return node.value;
        } else {
            debugger;
        }
    },

    this.removeFromValidate = function () {
        if( typeof validate == 'undefined' || typeof validate[this.formName] == 'undefined' ) {
            return;
        }
        
        if (typeof osySuiteLogicsValidate[this.formName] == 'undefined') {
            osySuiteLogicsValidate[this.formName] = {};
        }
        if (typeof osySuiteLogicsValidate[this.formName][this.field] == 'undefined') {
            osySuiteLogicsValidate[this.formName][this.field] = [];
            for (var i in validate[this.formName]) {
                if (validate[this.formName][i][0] == this.$el.attr('name')) {
                    osySuiteLogicsValidate[this.formName][this.field].push( validate[this.formName][i] );
                }
            }
        }
        removeFromValidate(this.formName, this.$el.attr('name'));
    },

    this.addToValidate = function (required) {
        //debugger;
        if (typeof osySuiteLogicsValidate[this.formName] != 'undefined' && typeof osySuiteLogicsValidate[this.formName][this.field] != 'undefined') {
            for (var i in osySuiteLogicsValidate[this.formName][this.field]) {            
                var args = osySuiteLogicsValidate[this.formName][this.field][i];                
                if (typeof required != 'undefined') args[2] = required;
                /*args.unshift( this.formName );
                addToValidate.apply( null, args );*/
                validate[this.formName].push(args);
            }
        }
    },

    // operations
    this.setValue = function (value) {
        //debugger;
        var oldvalue = this.$el.val();
        this.$el.val(value).attr('value', value);
        if (oldvalue != null)
            if (value.toString() != oldvalue.toString()) {
                //debugger;
                SUGAR.util.callOnChangeListers(this.$el.get(0));
            }
    },

        this.setVisibility = function (value) {
            //debugger;
            if (action_sugar_grp1 == "EditView" || action_sugar_grp1 == "ConvertLead") {
                this.removeFromValidate();
                var field = this.field;
                if (value) {
                    if (!this.$el.is(':checkbox')) {
                        this.addToValidate();
                        this.$el.find('option[abusivo="abusivo"]').remove();
                        if (this.$el.attr('id') == 'currency_id_select')
                            this.$el.parent().parent().parent().show();
                        else
                            this.$el.parent().parent().show();
                    }
                    else {
                        this.$el.parent().parent().show();
                    }

                    //$('#holding')[0].checked = true;
                } else {
                    if (!this.$el.is(':checkbox')) {
                        if (this.$el.find('option[value=""]').length == 0) {
                            this.$el.append($('<option></option>').attr('value', "").attr('abusivo', "abusivo").text(""));
                        }
                        this.$el.val('');
                        if (this.$el.attr('id') == 'currency_id_select')
                            this.$el.parent().parent().parent().hide();
                        else
                            this.$el.parent().parent().hide();
                    }
                    else
                        this.$el.parent().parent().hide();

                    //$('#holding')[0].checked = false;
                }
            }
            else if (action_sugar_grp1 == "DetailView") {
                //debugger;
                if (value)
                    $("div[field='" + this.field + "']").parent().show();
                else {
                    $("div[field='" + this.field + "']").parent().hide();
                    $("div[field='" + this.field + "']").parent().parent().children().find(".col-2-label").addClass(".col-1-label").removeClass("col-2-label");
                }
            }
        },

    this.setRequired = function (value) {
        var $label = $('[for=' + this.$el.attr('id') + ']');
        if ($label.length == 0 && this.$el.attr('class') == 'date_input') {
            $label = this.$el.parents('span.dateTime').parent().parent().find('div').first();
        }
        if ($label.length == 0) {
            $label = $('[field=' + this.field + ']').prev();
        }
        if ($label.length == 0) {
            $label = this.$el.parent().parent().find('div').first();
        }
        $label.find('.required').remove();
        if (value) {
            $label.append($('<span>', {class: 'required'}).text('*'));
        }

        this.removeFromValidate();
        this.addToValidate(value ? true : false);
    },

    this.setReadOnly = function (value) {
        //debugger;
        if (value) {
            this.$el.attr('readonly', true);
            if (this.$el.is('select'))
                $("#" + this.$el.attr('id')).attr("disabled", true);
            if (this.$el.is('input')) {
                $("#" + this.$el.attr('id')).css({"background": "#F8F8F8", "border": "1px solid #E2E7EB"});
                //check if is a relate field
                if ($("#btn_" + this.$el.attr('id')).length) {
                    $("#btn_" + this.$el.attr('id')).attr("disabled", true);
                    $("#btn_clr_" + this.$el.attr('id')).attr("disabled", true);
                }
            }
        }

    },

    this.checkValidate = function (value) {
        var self = this;        
        
        var str = SUGAR.language.translate( this.module, value );
        if( typeof str == 'undefined' ) {
            str = SUGAR.language.translate( 'app_strings', value );
        }
        if( typeof str == 'undefined' ) {
            str = value;
        }

        for (var i in validate[this.formName]) {
            if (validate[this.formName][i][0] == this.$el.attr('name') && validate[this.formName][i][1] == 'function') {
                validate[this.formName][i][3] = str;
                return;
            }
        }
        addToValidateCallback(this.formName, this.field, 'function', false, str, function (formname, nameIndex) {
            return self.eval() == "";
        });
    },

    this.setOptions = function (options) {
        //debugger;
        var self = this;
        var visible = false;
        var prevValue = this.$el.val();
        this.$el.empty();
        this.$el.val('');
        $.each(options, function (value, key) {
            visible = true;
            self.$el.append($('<option></option>').attr('value', value).text(key));
            if (value === prevValue) {
                self.$el.val(value);
            }
        });
        this.setVisibility(visible);
        SUGAR.util.callOnChangeListers(this.$el.get(0));
    },


    // functions
    this.concat = function () {
        var ret = '';
        for (var i in arguments) {
            ret += arguments[i];
        }

        return ret;
    },

    this.sum = function () {
        var ret = 0;
        for (var i in arguments) {
            ret += parseFloat(arguments[i]) || 0;
        }

        return ret;
    },

    this.mul = function () {
        var ret = 1;
        for (var i in arguments) {
            ret *= parseFloat(arguments[i]) || 0;
        }

        return ret;
    },

    this.not = function (a) {
        return !a;
    },

    this.eq = function (a, b) {
        return a == b;
    },

    this.and = function (a, b) {
        return a && b;
    },

    this.or = function (a, b) {
        return a || b;
    },

    this.gt = function (a, b) {
        return a > b;
    },

    this.lt = function (a, b) {
        return a < b;
    },

    this.ge = function (a, b) {
        return a >= b;
    },

    this.le = function (a, b) {
        return a <= b;
    },

    this.ifElse = function () {
        //debugger;
        var ret;
        var args = [].slice.call(arguments);
        while (args.length >= 2) {
            if (args[0]) {
                return args[1];
            }
            args.shift();
            args.shift();
        }
        return args.length > 0 ? args[0] : false;
    },

    this.inList = function (a, b) {
        return b.indexOf(a) >= 0;
    },

    this.createList = function () {
        return [].slice.call(arguments);
    },

    this.getAppListLabel = function (value, list) {
        return SUGAR.language.languages.app_list_strings[list][value];
    },

    this.options = function (list, values) {
        //debugger;
        var options = SUGAR.language.languages.app_list_strings[list] || {};
        var ret = {};

        for (var i in values) {
            if (typeof options[values[i]] != 'undefined') {
                ret[values[i]] = options[values[i]];
            }
        }

        return ret;
    }

    this.subStr = function (a, b, c) {
        //debugger;
        if (a != undefined) {
            var n1 = a.indexOf(b);
            if (c != "")
                var n2 = a.indexOf(c);

            if (n1 == n2) {
                n2 = a.lastIndexOf(c);
                return a.substring(n1 + 1, n2);
            }
            else if (c == "") {
                if (n1 != -1)
                    return a.substring(0, n1);
                else
                    return a;
            }
            else {
                n2 = a.lastIndexOf(c);
                if (b == "last")
                    return a.substring(n2 + 2);
                else
                    return a.substring(0, n2);
            }
        }
    }

    this.toDate = function (a) {
        //debugger;
        return getDateObject( a );
    }

    this.today = function () {
        return new Date((new Date()).toDateString());
    }

    this.now = function () {
        return new Date();
    }

    this.translate = function (module,str) {     
        return SUGAR.language.translate( module, str );
    }

}
