function InsertConditions(idTable, idSelectFields, fieldLabels, typeFields, optionFields, optionFieldsDb, idSelectRelatedFields, key, typeRelatedFields, optionRelatedFields, optionRelatedFieldsDb, calendar_dateformat) {
				
    var table = document.getElementById(idTable);
    var fields = document.getElementById(idSelectFields);
    //alert(fields);
    var types = typeFields.split("${comma}");
    var options = optionFields.split("${comma}");
    var options_db = optionFieldsDb.split("${comma}");
    var related_fields = document.getElementById(idSelectRelatedFields);
    var related_types = typeRelatedFields.split("\${comma}");
    var related_options = optionRelatedFields.split("\${comma}");
    var related_options_db = optionRelatedFieldsDb.split("\${comma}");
	var fieldsLabelsAlias = fieldLabels.split("${pipe}");
	
    if (fields != null) {
    	InsertConditions_fields_And_related_fields("false", table, fields, types, options, options_db, "",	calendar_dateformat);
    }
    
    if (related_fields != null) {
    	InsertConditions_fields_And_related_fields("true", table, related_fields, related_types, related_options, related_options_db, key, calendar_dateformat);
    }
}

function InsertConditions_fields_And_related_fields(isRelated, table, fields, types, options, options_db, key, calendar_dateformat) {
	
	var param1 = new Array();
    var param2 = new Array();

	for (var i in fields.options) {

        if (fields.options[i].selected) {
        	
        	var rowIndex = document.getElementById("uniqueRowIndexes").value;

            var row = document.createElement("tr");
            var cell_Field = document.createElement("td");
            var cell_OldBean_NewBean_Changed = document.createElement("td");
            var cell_IsChanged = document.createElement("td");
            var cell_Operator = document.createElement("td");
            var cell_First_Parameter = document.createElement("td");
            var cell_Second_Parameter = document.createElement("td");
            var cell_Button = document.createElement("td");
            cell_Button.align = "right";
            
            cell_Field.innerHTML = generate_Name_of_the_Field_HTML(rowIndex, key, fields.options[i].value);
            cell_OldBean_NewBean_Changed.innerHTML = generate_OldBean_NewBean_Changed_HTML_and_Remember_DataBase_if_needed(rowIndex, isRelated, "");
            cell_IsChanged.innerHTML = generate_IsChanged_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
            
			if (types[i].indexOf("int") === 0)
				types[i] = "int";
			
            switch (types[i]) {

            	case "enum":
            		cell_Operator.innerHTML = generate_Operator_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
            		var option_values = options[i].split("|");
                    var option_db_values = options_db[i].split("|");
                    cell_First_Parameter.innerHTML = generate_First_Parameter_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, "", "", option_db_values, option_values);
                    cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_enum_HTML(rowIndex);
                    break;
    				
        		case "int":
                case "double":
                case "currency":
                case "decimal":
                	cell_Operator.innerHTML = generate_Operator_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                	cell_First_Parameter.innerHTML = generate_First_Parameter_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                    cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_int_HTML(rowIndex);
                    break;

                case "datetime":
                case "date":
                	cell_Operator.innerHTML = generate_Operator_for_datetime_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                	var fixed_str = generate_var_fixed_str_for_First_Parameter_for_datetime_HTML_and_Remember_DataBase_if_needed("");
                	cell_First_Parameter.innerHTML = generate_First_Parameter_for_datetime_HTML(rowIndex, "input", "", fixed_str);
                	param1[param1.length] = rowIndex;
                	cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_datetime_HTML(rowIndex, "none", "none", "true", "");
                	param2[param2.length] = rowIndex;
                    break;

                case "tinyint(1)":
                	cell_Operator.innerHTML = generate_Operator_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                	cell_First_Parameter.innerHTML = generate_First_Parameter_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                    cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_tinyint_HTML(rowIndex);
                    break;

                default:
                	cell_Operator.innerHTML = generate_Operator_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                	cell_First_Parameter.innerHTML = generate_First_Parameter_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, "");
                    cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_default_HTML(rowIndex);
                    break;
            }
		
            cell_Button.innerHTML = generate_Button_detele_row_HTML(rowIndex, types[i], key, isRelated, i, options[i], options_db[i]);
           
            row.appendChild(cell_Field);
            row.appendChild(cell_OldBean_NewBean_Changed);
            row.appendChild(cell_IsChanged);
            row.appendChild(cell_Operator);
            row.appendChild(cell_First_Parameter);
            row.appendChild(cell_Second_Parameter);
            row.appendChild(cell_Button);
            table.appendChild(row);

           
            // Initialization: datetime, date
            for (var i in param1) {
            	Calendar.setup ({ inputField : "Param1_"+param1[i] , daFormat : calendar_dateformat, button : "trigger_"+param1[i] , singleClick : true, dateStr : '', step : 1, weekNumbers:false });
            }
            for (var i in param2) {
            	Calendar.setup ({ inputField : "Param2_"+param2[i] , daFormat : calendar_dateformat, button : "trigger2_"+param2[i] , singleClick : true, dateStr : '', step : 1, weekNumbers:false });
            }
            
            document.getElementById("uniqueRowIndexes").value = parseInt(document.getElementById("uniqueRowIndexes").value) + 1;
        }
	}
}

function RememberConditions(idTable, condition_Values, calendar_dateformat) {

    var param1 = new Array();
    var param2 = new Array();

    var table = document.getElementById(idTable);
    //alert(condition_Values);
    condition_Values = condition_Values.replace(/"/g, "&quot;");
    //alert(condition_Values);
    var conditions = condition_Values.split("${pipe}");

    if (condition_Values != "") {

        for (var i in conditions) {
        	
        	var rowIndex = document.getElementById("uniqueRowIndexes").value;

    		var values = conditions[i].split("${dp}");
    		// BEGIN - values array
    		var fieldName = values[0];
    		var OldBean_NewBean_Changed = values[1];
    		var isChanged = values[2];
    		var operator = values[3];
    		var Param1 = values[4];
    		var Param2 = values[5];
    		var fieldType = values[6];
    		var key = values[7];
    		var isRelated = values[8];
    		var fieldIndex = values[9];// index of module_fields, not rowIndex
    		var options_string = values[10];
    		var options = values[10].split("|");
    		var options_db_string = values[11];
            var options_db = values[11].split("|");
    		// END - values array
            var row = document.createElement("tr");
            var cell_Field = document.createElement("td");
            var cell_OldBean_NewBean_Changed = document.createElement("td");
            var cell_IsChanged = document.createElement("td");
            var cell_Operator = document.createElement("td");
            var cell_First_Parameter = document.createElement("td");
            var cell_Second_Parameter = document.createElement("td");
            var cell_Button = document.createElement("td");
            cell_Button.align = "right";

            cell_Field.innerHTML = generate_Name_of_the_Field_HTML(rowIndex, key, fieldName);
            cell_OldBean_NewBean_Changed.innerHTML = generate_OldBean_NewBean_Changed_HTML_and_Remember_DataBase_if_needed(rowIndex, isRelated, OldBean_NewBean_Changed);
            cell_IsChanged.innerHTML = generate_IsChanged_HTML_and_Remember_DataBase_if_needed(rowIndex, isChanged) ;
			
            // initial values of disabled property for selects -> at the end of this function
			
			if (fieldType.indexOf("int") === 0)
				fieldType = "int";
			
            switch (fieldType) {

				case "enum":
					cell_Operator.innerHTML = generate_Operator_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, operator);
					cell_First_Parameter.innerHTML = generate_First_Parameter_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, operator, Param1, options_db, options);
					cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_enum_HTML(rowIndex);
					break;
						
				case "int":
				case "double":
				case "currency":
				case "decimal":
					cell_Operator.innerHTML = generate_Operator_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, operator);
					cell_First_Parameter.innerHTML = generate_First_Parameter_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, Param1);
					cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_int_HTML(rowIndex);
					break;

				case "datetime":
				case "date":
					cell_Operator.innerHTML = generate_Operator_for_datetime_HTML_and_Remember_DataBase_if_needed(rowIndex, operator);
					
					var fixed_str = generate_var_fixed_str_for_First_Parameter_for_datetime_HTML_and_Remember_DataBase_if_needed(Param1);
					
					switch (operator) {
						case "last":
						case "this":
						case "next":
						case "not last":
						case "not this":
						case "not next":
							cell_First_Parameter.innerHTML = generate_First_Parameter_for_datetime_HTML(rowIndex, "select", "", fixed_str);
							param1[param1.length] = rowIndex;
							break;
						default: // [between, not between]
							cell_First_Parameter.innerHTML = generate_First_Parameter_for_datetime_HTML(rowIndex, "input", Param1, fixed_str);
							param1[param1.length] = rowIndex;
							break;
					}
					
					switch (operator) {
						case "between":
						case "not between":
							cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_datetime_HTML(rowIndex, "inline", "inline", "true", Param2);
							param2[param2.length] = rowIndex;
							break;
						case "last":
						case "next":
						case "not last":
						case "not next":
							cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_datetime_HTML(rowIndex, "inline", "none", "false", Param2);
							param2[param2.length] = rowIndex;
							break;
						default: // [this, not this]
							cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_datetime_HTML(rowIndex, "none", "none", "true", Param2);
							param2[param2.length] = rowIndex;
							break;
					}
					
					break;

				case "tinyint(1)":
					cell_Operator.innerHTML = generate_Operator_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, operator);
					cell_First_Parameter.innerHTML = generate_First_Parameter_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, Param1);
					cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_tinyint_HTML(rowIndex);
					break;

				default:
					cell_Operator.innerHTML = generate_Operator_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, operator);
					cell_First_Parameter.innerHTML = generate_First_Parameter_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, Param1);
					cell_Second_Parameter.innerHTML = generate_Second_Parameter_for_default_HTML(rowIndex);
					break;
            }

            cell_Button.innerHTML = generate_Button_detele_row_HTML(rowIndex, fieldType, key, isRelated, fieldIndex, options_string, options_db_string);
            
            row.appendChild(cell_Field);
            row.appendChild(cell_OldBean_NewBean_Changed);
            row.appendChild(cell_IsChanged);
            row.appendChild(cell_Operator);
            row.appendChild(cell_First_Parameter);
            row.appendChild(cell_Second_Parameter);
            row.appendChild(cell_Button);
            table.appendChild(row);
            
            // initial disabled values for selects
            if (isRelated == "true") {	// if is_related
            	cell_OldBean_NewBean_Changed.childNodes[0].style.visibility = "hidden";
            	cell_IsChanged.childNodes[0].style.visibility = "hidden";
				
				cell_Operator.childNodes[0].style.visibility = "visible";
				cell_First_Parameter.style.visibility = "visible";
				cell_Second_Parameter.style.visibility = "visible";
            } else {
                if (OldBean_NewBean_Changed == "changed") {
					cell_IsChanged.childNodes[0].style.visibility = "visible";
					
					cell_Operator.childNodes[0].style.visibility = "hidden";
					cell_First_Parameter.style.visibility = "hidden";
					cell_Second_Parameter.style.visibility = "hidden";
				} else {
					cell_IsChanged.childNodes[0].style.visibility = "hidden";
					
					cell_Operator.childNodes[0].style.visibility = "visible";
					cell_First_Parameter.style.visibility = "visible";
					cell_Second_Parameter.style.visibility = "visible";
				}
            }
            
            document.getElementById("uniqueRowIndexes").value = parseInt(document.getElementById("uniqueRowIndexes").value) + 1;
        }
        
        // Initialization: datetime, date
        for (var i in param1) {
        	Calendar.setup ({ inputField : "Param1_"+param1[i] , daFormat : calendar_dateformat, button : "trigger_"+param1[i] , singleClick : true, dateStr : '', step : 1, weekNumbers:false });
        }
        for (var i in param2) {
        	Calendar.setup ({ inputField : "Param2_"+param2[i] , daFormat : calendar_dateformat, button : "trigger2_"+param2[i] , singleClick : true, dateStr : '', step : 1, weekNumbers:false });
        }
    }
}

function format_conditions(idConditionsTable) {

    //Escapar caracteres conflictivos
	
	var uniqueRowIndexes = parseInt(document.getElementById("uniqueRowIndexes").value);
	
    var parsed_string = "";

    for (var rowIndex=0; rowIndex<uniqueRowIndexes; rowIndex++) {

    	if (document.getElementById('fieldName_'+rowIndex) !== null) {	
    	
    		// j == 0
			parsed_string += document.getElementById('fieldName_'+rowIndex).innerHTML;
			parsed_string += "${dp}";
    			
    		// j==1   -> OldBean_NewBean_Changed
			parsed_string += document.getElementById('OldBean_NewBean_Changed_'+rowIndex).value.replace(/[\\]/g , "\\\\").replace(/[']/g , "\\\'").replace(/[%]/g , "\\\%").replace(/[_]/g , "\\\_");
			parsed_string += "${dp}";
    			
			// j==2   -> isChanged
			parsed_string += document.getElementById('isChanged_'+rowIndex).value.replace(/[\\]/g , "\\\\").replace(/[']/g , "\\\'").replace(/[%]/g , "\\\%").replace(/[_]/g , "\\\_");
			parsed_string += "${dp}";
    		
			// j==3   -> operator
			parsed_string += document.getElementById('operator_'+rowIndex).value.replace(/[\\]/g , "\\\\").replace(/[']/g , "\\\'").replace(/[%]/g , "\\\%").replace(/[_]/g , "\\\_");
			parsed_string += "${dp}";
    		
			// j==4   -> Param1 o Param1_select
			var Param1 = document.getElementById('Param1_'+rowIndex);
			var operator = document.getElementById('operator_'+rowIndex);
			
			if (Param1 == "[object HTMLSelectElement]") { // field_type == enum
			
                var options = Param1.options;
                var values = "";
                for ( var k = 0; k < options.length; k++) {
                	if (Param1.options[k].selected == true)
                		values += Param1.options[k].value + "${dollar}";
                }
                values = values.slice(0, -9);

                parsed_string += values;
                
			} else if (  (operator.value == "last") || (operator.value == "this") || (operator.value == "next" ) || (operator.value == "not last") || (operator.value == "not this") || (operator.value == "not next")  ) {// part of datetime
				 
				parsed_string += document.getElementById('Param1_select_'+rowIndex).value;
			} else { // part of datetime, varchar, tinyint, int ...   -----> all but enum and part of datetime
				parsed_string += Param1.value.replace(/[\\]/g , "\\\\").replace(/[']/g , "\\\'").replace(/[%]/g , "\\\%").replace(/[_]/g , "\\\_");
			}
			
			parsed_string += "${dp}";

    		// j==5 Param2
			parsed_string += document.getElementById('Param2_'+rowIndex).value.replace(/[\\]/g , "\\\\").replace(/[']/g , "\\\'").replace(/[%]/g , "\\\%").replace(/[_]/g , "\\\_");
 			parsed_string += "${dp}";
    			 
            // j == 6
            parsed_string += document.getElementById('value_type_'+rowIndex).value + "${dp}";
            parsed_string += document.getElementById('key_'+rowIndex).value + "${dp}";
            parsed_string += document.getElementById('is_related_'+rowIndex).value + "${dp}";
            parsed_string += document.getElementById('index_'+rowIndex).value + "${dp}";
            parsed_string += document.getElementById('options_'+rowIndex).value + "${dp}";
            parsed_string += document.getElementById('options_db_'+rowIndex).value;
    	
            parsed_string += "${pipe}";
    	}
    }

    parsed_string = parsed_string.slice(0, -7);
    //alert(parsed_string);
    return parsed_string;
}

////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////

function generate_Name_of_the_Field_HTML(rowIndex, key, value) {
	
	return "<b><span id='fieldName_"+rowIndex+"' name='fieldName_"+rowIndex+"' title='"+key+"'>" + value + "</span></b>";
}

function generate_OldBean_NewBean_Changed_HTML_and_Remember_DataBase_if_needed(rowIndex, isRelated, cell_OldBean_NewBean_Changed_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_asol_old_bean = SUGAR.language.get('asol_Events', 'LBL_ASOL_OLD_BEAN');
	var lbl_asol_new_bean = SUGAR.language.get('asol_Events', 'LBL_ASOL_NEW_BEAN');
	var lbl_asol_changed = SUGAR.language.get('asol_Events', 'LBL_ASOL_CHANGED');
	// END - Language Labels
	
	var visibility = (isRelated == "true") ? " visibility: hidden;" : "";
	var cell_OldBean_NewBean_Changed_HTML = 
		"<select id='OldBean_NewBean_Changed_"+rowIndex+"' name='OldBean_NewBean_Changed_"+rowIndex+"' style='width:90px;"+visibility+"' " +
			"onChange='" +
				"if (this.selectedIndex == 2) {" +
					"document.getElementById(\"isChanged_"+rowIndex+"\").style.visibility=\"visible\";" +
					"document.getElementById(\"operator_"+rowIndex+"\").style.visibility=\"hidden\";" +
					"document.getElementById(\"Param1_"+rowIndex+"\").parentNode.style.visibility=\"hidden\";" +
					"document.getElementById(\"Param2_"+rowIndex+"\").style.visibility=\"hidden\"; " +
				"} else {" +
					"document.getElementById(\"isChanged_"+rowIndex+"\").style.visibility=\"hidden\";" +
					"document.getElementById(\"operator_"+rowIndex+"\").style.visibility=\"visible\";" +
					"document.getElementById(\"Param1_"+rowIndex+"\").parentNode.style.visibility=\"visible\";" +
					"document.getElementById(\"Param2_"+rowIndex+"\").style.visibility=\"visible\";" +
				"}" +
			"'" +
		">";
	 
	var cell_OldBean_NewBean_Changed_Values = ["old_bean","new_bean","changed"];
	var cell_OldBean_NewBean_Changed_Labels = [lbl_asol_old_bean,lbl_asol_new_bean,lbl_asol_changed];
	for (var x in cell_OldBean_NewBean_Changed_Values) {
		var selected = (cell_OldBean_NewBean_Changed_SelectedValue == cell_OldBean_NewBean_Changed_Values[x]) ? " selected" : "";
		cell_OldBean_NewBean_Changed_HTML +=  "<option value='"+cell_OldBean_NewBean_Changed_Values[x]+"'"+selected+">"+cell_OldBean_NewBean_Changed_Labels[x]+"</option>";
	}
	 
	cell_OldBean_NewBean_Changed_HTML += "</select> ";
	 
	return cell_OldBean_NewBean_Changed_HTML;
}

function generate_IsChanged_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_IsChanged_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_asol_true = SUGAR.language.get('asol_Events', 'LBL_ASOL_TRUE');
	var lbl_asol_false = SUGAR.language.get('asol_Events', 'LBL_ASOL_FALSE');
	// END - Language Labels
	
	var cell_IsChanged_HTML = "<select id='isChanged_"+rowIndex+"' name='isChanged_"+rowIndex+"' style='width:65px; visibility: hidden;'>";
    
    var cell_IsChanged_Values = ["true","false"];
    var cell_IsChanged_Labels = [lbl_asol_true,lbl_asol_false];
    for (var x in cell_IsChanged_Values) {
		var selected = (cell_IsChanged_SelectedValue == cell_IsChanged_Values[x]) ? " selected" : "";
		cell_IsChanged_HTML +=  "<option value='"+cell_IsChanged_Values[x]+"'"+selected+">"+cell_IsChanged_Labels[x]+"</option>";
    }
    
    cell_IsChanged_HTML += "</select> ";
    
    return cell_IsChanged_HTML;
}

function generate_Operator_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_Operator_for_enum_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_EQUALS');
	var lbl_not_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_EQUALS');
	var lbl_one_of = SUGAR.language.get('asol_Events', 'LBL_EVENT_ONE_OF');
	var lbl_not_one_of = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_ONE_OF');
	// END - Language Labels
	
	var cell_Operator_for_enum_HTML = 
		"<select id='operator_"+rowIndex+"' name='operator_"+rowIndex+"' style='width:90px' " +
			"onChange='" +
				"if (this.selectedIndex >= 2){" +
					"document.getElementById(\"Param1_"+rowIndex+"\").multiple=true;" +
					"document.getElementById(\"Param1_"+rowIndex+"\").size=3;" +
				"} else {" +
					"document.getElementById(\"Param1_"+rowIndex+"\").multiple=false;" +
					"document.getElementById(\"Param1_"+rowIndex+"\").size=1;" +
				"}" +
			"'" +
		">";
    
    var cell_Operator_for_enum_Values = ["equals","not equals","one of","not one of"];
    var cell_Operator_for_enum_Labels = [lbl_equals,lbl_not_equals,lbl_one_of,lbl_not_one_of];
    for (var x in cell_Operator_for_enum_Values) {
		var selected = (cell_Operator_for_enum_SelectedValue == cell_Operator_for_enum_Values[x]) ? " selected" : "";
		cell_Operator_for_enum_HTML +=  "<option value='"+cell_Operator_for_enum_Values[x]+"'"+selected+">"+cell_Operator_for_enum_Labels[x]+"</option>";
    }
    
    cell_Operator_for_enum_HTML += "</select> ";
    
    return cell_Operator_for_enum_HTML;
}

function generate_First_Parameter_for_enum_HTML_and_Remember_DataBase_if_needed(rowIndex, operator, Param1, options_db, options) {
	
	var options_First_Paramenter_HTML = "";
	var options_selected_First_Parameter = Param1.split("${dollar}");
	for (var y in options_db) {
		var selected = "";
		for (var z in options_selected_First_Parameter) {
			if (options_db[y] == options_selected_First_Parameter[z]) {
				selected = " selected";
				break;
			}
		}
		options_First_Paramenter_HTML += "<option"+selected+" value='"+options_db[y]+"'>"+options[y].replace(/\${sq}/g, "\'" )+"</option>";
	}
	
	var multiple = "";
	if ((operator == "one of") || (operator == "not one of")) {
		multiple = " multiple size=3";
	}
	var cell_First_Parameter_for_enum_HTML = "<select id='Param1_"+rowIndex+"' name='Param1_"+rowIndex+"' style='width:140px' "+multiple+">"+options_First_Paramenter_HTML+"</select>";
	
	return cell_First_Parameter_for_enum_HTML;
}

function generate_Second_Parameter_for_enum_HTML(rowIndex) {
	
	return  "<input type='text' id='Param2_"+rowIndex+"' name='Param2_"+rowIndex+"' value='' style='display:none; width:140px'>";
}

function generate_Operator_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_Operator_for_int_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_EQUALS');
	var lbl_not_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_EQUALS');
	var lbl_less_than = SUGAR.language.get('asol_Events', 'LBL_EVENT_LESS_THAN');
	var lbl_more_than = SUGAR.language.get('asol_Events', 'LBL_EVENT_MORE_THAN');
	// END - Language Labels
	
	var cell_Operator_for_int_HTML = "<select id='operator_"+rowIndex+"' name='operator_"+rowIndex+"' style='width:90px'>";
    
    var cell_Operator_for_int_Values = ["equals","not equals","less than","more than"];
    var cell_Operator_for_int_Labels = [lbl_equals,lbl_not_equals,lbl_less_than,lbl_more_than];
    for (var x in cell_Operator_for_int_Values) {
		var selected = (cell_Operator_for_int_SelectedValue == cell_Operator_for_int_Values[x]) ? " selected" : "";
		cell_Operator_for_int_HTML +=  "<option value='"+cell_Operator_for_int_Values[x]+"'"+selected+">"+cell_Operator_for_int_Labels[x]+"</option>";
    }
    
    cell_Operator_for_int_HTML += "</select> ";
    
    return cell_Operator_for_int_HTML;
}

function generate_First_Parameter_for_int_HTML_and_Remember_DataBase_if_needed(rowIndex, value) {
	
	return "<input type='text' name='Param1_"+rowIndex+"' id='Param1_"+rowIndex+"' style='width:140px' value='"+value+"'>";
}

function generate_Second_Parameter_for_int_HTML(rowIndex) {
	
	return "<input type='text' name='Param2_"+rowIndex+"' id='Param2_"+rowIndex+"' value='' style='display:none; width:140px'>";
}

function generate_Operator_for_datetime_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_Operator_for_datetime_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_EQUALS');
	var lbl_not_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_EQUALS');
	var lbl_before_date = SUGAR.language.get('asol_Events', 'LBL_EVENT_BEFORE_DATE');
	var lbl_after_date = SUGAR.language.get('asol_Events', 'LBL_EVENT_AFTER_DATE');
	var lbl_between = SUGAR.language.get('asol_Events', 'LBL_EVENT_BETWEEN');
	var lbl_not_between = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_BETWEEN');
	var lbl_last = SUGAR.language.get('asol_Events', 'LBL_EVENT_LAST');
	var lbl_not_last = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_LAST');
	var lbl_this = SUGAR.language.get('asol_Events', 'LBL_EVENT_THIS');
	var lbl_not_this = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_THIS');
	var lbl_next = SUGAR.language.get('asol_Events', 'LBL_EVENT_NEXT');
	var lbl_not_next = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_NEXT');
	// END - Language Labels
	
	var cell_Operator_for_datetime_HTML = 
		"<select id='operator_"+rowIndex+"' name='operator_"+rowIndex+"' style='width:90px' " +
			"onChange='" +
				"if ((this.selectedIndex == 4) || (this.selectedIndex == 5)) {" +
					"document.getElementById(\"Param2_"+rowIndex+"\").value = \"\";" +
					"document.getElementById(\"Param1_select_"+rowIndex+"\").style.display =\"none\";" +
					"document.getElementById(\"Param1_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"trigger_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"Param2_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"trigger2_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"Param2_"+rowIndex+"\").disabled=true;" +
				"} else {" +
					"document.getElementById(\"Param1_select_"+rowIndex+"\").style.display =\"none\";" +
					"document.getElementById(\"Param1_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"trigger_"+rowIndex+"\").style.display =\"inline\";" +
					"document.getElementById(\"Param2_"+rowIndex+"\").style.display =\"none\";" +
					"document.getElementById(\"trigger2_"+rowIndex+"\").style.display =\"none\";" +
					"if(this.selectedIndex >= 6) {" +
						"document.getElementById(\"Param1_"+rowIndex+"\").style.display =\"none\";" +
						"document.getElementById(\"trigger_"+rowIndex+"\").style.display =\"none\";" +
						"document.getElementById(\"Param1_select_"+rowIndex+"\").style.display =\"inline\";" +
						"if ((this.selectedIndex == 6) || (this.selectedIndex == 7) || (this.selectedIndex == 10) || (this.selectedIndex == 11)) {" +
							"document.getElementById(\"Param2_"+rowIndex+"\").style.display = \"inline\";" +
							"document.getElementById(\"Param2_"+rowIndex+"\").value = \"\"" +
						"};" +
					"};" +
					"document.getElementById(\"Param2_"+rowIndex+"\").disabled=false;" +
				"}" +
			"'" +
		">";
    
    var cell_Operator_for_datetime_Values = ["equals","not equals","before date","after date", "between", "not between", "last", "not last", "this", "not this", "next", "not next"];
    var cell_Operator_for_datetime_Labels = [lbl_equals,lbl_not_equals,lbl_before_date,lbl_after_date,lbl_between,lbl_not_between,lbl_last,lbl_not_last,lbl_this,lbl_not_this,lbl_next,lbl_not_next];
    for (var x in cell_Operator_for_datetime_Values) {
		var selected = (cell_Operator_for_datetime_SelectedValue == cell_Operator_for_datetime_Values[x]) ? " selected" : "";
		cell_Operator_for_datetime_HTML +=  "<option value='"+cell_Operator_for_datetime_Values[x]+"'"+selected+">"+cell_Operator_for_datetime_Labels[x]+"</option>";
    }
    
    cell_Operator_for_datetime_HTML += "</select> ";
    
    return cell_Operator_for_datetime_HTML;
}

function generate_var_fixed_str_for_First_Parameter_for_datetime_HTML_and_Remember_DataBase_if_needed(var_fixed_str_for_First_Paremeter_for_datetime_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_day = SUGAR.language.get('asol_Events', 'LBL_EVENT_DAY');
	var lbl_week = SUGAR.language.get('asol_Events', 'LBL_EVENT_WEEK');
	var lbl_month = SUGAR.language.get('asol_Events', 'LBL_EVENT_MONTH');
	var lbl_nquarter = SUGAR.language.get('asol_Events', 'LBL_EVENT_NQUARTER');
	var lbl_fquarter = SUGAR.language.get('asol_Events', 'LBL_EVENT_FQUARTER');
	var lbl_nyear = SUGAR.language.get('asol_Events', 'LBL_EVENT_NYEAR');
	var lbl_fyear = SUGAR.language.get('asol_Events', 'LBL_EVENT_FYEAR');
	// END - Language Labels
	
	var var_fixed_str_for_First_Paremeter_for_datetime_HTML = "";
	
    var var_fixed_str_for_First_Paremeter_for_datetime_Values = ["day","week","month","Nquarter","Fquarter","Nyear","Fyear"];
    var var_fixed_str_for_First_Paremeter_for_datetime_Labels = [lbl_day,lbl_week,lbl_month,lbl_nquarter,lbl_fquarter,lbl_nyear,lbl_fyear];
    for (var x in var_fixed_str_for_First_Paremeter_for_datetime_Values) {
		var selected = (var_fixed_str_for_First_Paremeter_for_datetime_SelectedValue == var_fixed_str_for_First_Paremeter_for_datetime_Values[x]) ? " selected" : "";
		var_fixed_str_for_First_Paremeter_for_datetime_HTML +=  "<option value='"+var_fixed_str_for_First_Paremeter_for_datetime_Values[x]+"'"+selected+">"+var_fixed_str_for_First_Paremeter_for_datetime_Labels[x]+"</option>";
    }
    
    return var_fixed_str_for_First_Paremeter_for_datetime_HTML;
}

function generate_First_Parameter_for_datetime_HTML(rowIndex, show_InputOrSelect, value, fixed_str) {
	
	var displayInput = "";
	var displaySelect = "";
	
	if (show_InputOrSelect == "input") {
		displayInput = "inline";
		displaySelect = "none";
	} else {
		displayInput = "none";
		displaySelect = "inline";
	}
	
	var cell_First_Parameter_HTML =
	"<input type='text' id='Param1_"+rowIndex+"' name='Param1_"+rowIndex+"' style='display:"+displayInput+"; width:120px;' disabled='' value='"+value+"'>"
	+ "<img id='trigger_"+rowIndex+"' style='display:"+displayInput+"' border='0' align='absmiddle' src='themes/default/images/jscalendar.gif?s=9006669fd2606c8bf6e2569fac9b1f65&amp;c=1&amp;developerMode=732502144' alt='Enter Date'>"
	+ "<span></span>"
	+ "<select id='Param1_select_"+rowIndex+"' name='Param1_select_"+rowIndex+"'style='display:"+displaySelect+"; width:140px''>"
	+ fixed_str	+ "</select>";
	
	return cell_First_Parameter_HTML;
}

function generate_Second_Parameter_for_datetime_HTML(rowIndex, displayModeInput, displayModeImg, isDisabled, value) {
	
	var displayInput = (displayModeInput == "inline") ? "inline" : "none";
	var displayImg = (displayModeImg == "inline") ? "inline" : "none";
	var disabled = (isDisabled == "true") ? " disabled=''" : "";
	
	var cell_Second_Parameter_HTML = 
		"<input type='text' id='Param2_"+rowIndex+"' name='Param2_"+rowIndex+"' style='display:"+displayInput+"; width:120px'"+disabled+" value='"+value+"'>"
		+ "<img id='trigger2_"+rowIndex+"' name='trigger2_"+rowIndex+"' style='display:"+displayImg+"' border='0' align='absmiddle' src='themes/default/images/jscalendar.gif?s=9006669fd2606c8bf6e2569fac9b1f65&amp;c=1&amp;developerMode=732502144' alt='Enter Date'>";

	return cell_Second_Parameter_HTML;
}

function generate_Operator_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_Operator_for_tinyint_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_EQUALS');
	var lbl_not_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_EQUALS');
	// END - Language Labels
	
	var cell_Operator_for_tinyint_HTML = "<select id='operator_"+rowIndex+"' name='operator_"+rowIndex+"' style='width:90px'>";
    
    var cell_Operator_for_tinyint_Values = ["equals","not equals"];
    var cell_Operator_for_tinyint_Labels = [lbl_equals,lbl_not_equals];
    for (var x in cell_Operator_for_tinyint_Values) {
		var selected = (cell_Operator_for_tinyint_SelectedValue == cell_Operator_for_tinyint_Values[x]) ? " selected" : "";
		cell_Operator_for_tinyint_HTML +=  "<option value='"+cell_Operator_for_tinyint_Values[x]+"'"+selected+">"+cell_Operator_for_tinyint_Labels[x]+"</option>";
    }
    
    cell_Operator_for_tinyint_HTML += "</select> ";
    
    return cell_Operator_for_tinyint_HTML;
}

function generate_First_Parameter_for_tinyint_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_First_Parameter_for_tinyint_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_true = SUGAR.language.get('asol_Events', 'LBL_EVENT_TRUE');
	var lbl_false = SUGAR.language.get('asol_Events', 'LBL_EVENT_FALSE');
	// END - Language Labels
	
	var cell_First_Parameter_for_tinyint_HTML = "<select id='Param1_"+rowIndex+"' name='Param1_"+rowIndex+"' style='width:140px'>";
    
    var cell_First_Parameter_for_tinyint_Values = ["true","false"];
    var cell_First_Parameter_for_tinyint_Labels = [lbl_true,lbl_false];
    for (var x in cell_First_Parameter_for_tinyint_Values) {
		var selected = (cell_First_Parameter_for_tinyint_SelectedValue == cell_First_Parameter_for_tinyint_Values[x]) ? " selected" : "";
		cell_First_Parameter_for_tinyint_HTML +=  "<option value='"+cell_First_Parameter_for_tinyint_Values[x]+"'"+selected+">"+cell_First_Parameter_for_tinyint_Labels[x]+"</option>";
    }
    
    cell_First_Parameter_for_tinyint_HTML += "</select> ";
    
    return cell_First_Parameter_for_tinyint_HTML;
}

function generate_Second_Parameter_for_tinyint_HTML(rowIndex) {
	
	return "<input type='text' id='Param2_"+rowIndex+"' name='Param2_"+rowIndex+"' value='' style='display:none; width:140px'>";
}

function generate_Operator_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, cell_Operator_for_default_SelectedValue) {
	
	// BEGIN - Language Labels
	var lbl_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_EQUALS');
	var lbl_not_equals = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_EQUALS');
	var lbl_like = SUGAR.language.get('asol_Events', 'LBL_EVENT_LIKE');
	var lbl_not_like = SUGAR.language.get('asol_Events', 'LBL_EVENT_NOT_LIKE');
	// END - Language Labels
	
	var cell_Operator_for_default_HTML = "<select id='operator_"+rowIndex+"' name='operator_"+rowIndex+"' style='width:90px'>";
    
    var cell_Operator_for_default_Values = ["equals","not equals","like","not like"];
    var cell_Operator_for_default_Labels = [lbl_equals,lbl_not_equals,lbl_like,lbl_not_like];
    for (var x in cell_Operator_for_default_Values) {
		var selected = (cell_Operator_for_default_SelectedValue == cell_Operator_for_default_Values[x]) ? " selected" : "";
		cell_Operator_for_default_HTML +=  "<option value='"+cell_Operator_for_default_Values[x]+"'"+selected+">"+cell_Operator_for_default_Labels[x]+"</option>";
    }
    
    cell_Operator_for_default_HTML += "</select> ";
    
    return cell_Operator_for_default_HTML;
}

function generate_First_Parameter_for_default_HTML_and_Remember_DataBase_if_needed(rowIndex, value) {
	
	return "<input type='text' name='Param1_"+rowIndex+"' id='Param1_"+rowIndex+"' style='width:140px' value='"+value.replace(/\'/g, "\'")+"'>";
}

function generate_Second_Parameter_for_default_HTML(rowIndex) {
	
	return "<input type='text' name='Param2_"+rowIndex+"' id='Param2_"+rowIndex+"' value='' style='display:none; width:140px'>";
}

function generate_Button_detele_row_HTML(rowIndex, value_type, key, is_related, index, options, options_db) {
	
	// BEGIN - Language Labels
	var lbl_asol_delete_button = SUGAR.language.get('asol_Events', 'LBL_ASOL_DELETE_BUTTON');
	var lbl_asol_delete_row_alert = SUGAR.language.get('asol_Events', 'LBL_ASOL_DELETE_ROW_ALERT');
	// END - Language Labels
	
	var cell_Button_HTML = 
    	"<img border='0' src='themes/default/images/minus_inline.gif' title=\""+lbl_asol_delete_button+"\" OnMouseOver='this.style.cursor=\"pointer\"' OnMouseOut='this.style.cursor=\"default\"' onClick='if(confirm(\""+lbl_asol_delete_row_alert+"\")) { this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); } ' name='del_button_"+rowIndex+"''>"
        + "<input type='hidden' id='value_type_"+rowIndex+"' name='value_type_"+rowIndex+"' value='" + value_type + "'>"
        + "<input type='hidden' id='key_"+rowIndex+"' name='key_"+rowIndex+"' value='" + key + "'>"
        + "<input type='hidden' id='is_related_"+rowIndex+"' name='is_related_"+rowIndex+"' value='"+is_related+"'>"
        + "<input type='hidden' id='index_"+rowIndex+"' name='index_"+rowIndex+"' value='" + index + "'>" 
        + "<input type='hidden' id='options_"+rowIndex+"' name='options_"+rowIndex+"' value='" + options + "'>" 
        + "<input type='hidden' id='options_db_"+rowIndex+"' name='options_db_"+rowIndex+"' value='" + options_db + "'>";
	
	return cell_Button_HTML;
}