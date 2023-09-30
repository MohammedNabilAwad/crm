var prodln = 0;



/**
 * Insert product line
 */

function insertProductLine(tableid, groupid) {

    if (!enable_groups) {
        tableid = "product_group0";
    }

    if (document.getElementById(tableid + '_head') !== null) {
        document.getElementById(tableid + '_head').style.display = "";
    }

    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;

    sqs_objects["product_name[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["name", "id", "part_number", "cost", "price", "description", "currency_id"],
        "populate_list": ["product_name[" + prodln + "]", "product_product_id[" + prodln + "]", "product_part_number[" + prodln + "]", "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]"],
        "required_list": ["product_id[" + prodln + "]"],
        "conditions": [{
            "name": "name",
            "op": "like_custom",
            "end": "%",
            "value": ""
        }],
        "order": "name",
        "limit": "30",
        "post_onblur_function": "formatListPrice(" + prodln + ");",
        "no_match_text": "No Match"
    };
    sqs_objects["product_part_number[" + prodln + "]"] = {
        "form": "EditView",
        "method": "query",
        "modules": ["AOS_Products"],
        "group": "or",
        "field_list": ["part_number", "name", "id", "cost", "price", "description", "currency_id"],
        "populate_list": ["product_part_number[" + prodln + "]", "product_name[" + prodln + "]", "product_product_id[" + prodln + "]", "product_product_cost_price[" + prodln + "]", "product_product_list_price[" + prodln + "]", "product_item_description[" + prodln + "]", "product_currency[" + prodln + "]"],
        "required_list": ["product_id[" + prodln + "]"],
        "conditions": [{
            "name": "part_number",
            "op": "like_custom",
            "end": "%",
            "value": ""
        }],
        "order": "name",
        "limit": "30",
        "post_onblur_function": "formatListPrice(" + prodln + ");",
        "no_match_text": "No Match"
    };

    tablebody = document.createElement("tbody");
    tablebody.id = "product_body" + prodln;
    document.getElementById(tableid).appendChild(tablebody);


    var x = tablebody.insertRow(-1);
    x.id = 'product_line' + prodln;

    var a = x.insertCell(0);
    a.innerHTML = "<input type='text' name='product_product_qty[" + prodln + "]' id='product_product_qty" + prodln + "'  value='' title='' tabindex='116' onblur='Quantity_format2Number(" + prodln + ");calculateLine(" + prodln + ",\"product_\");' class='product_qty'>";

    var b = x.insertCell(1);
    b.innerHTML = "<input class='sqsEnabled product_name' autocomplete='off' type='text' name='product_name[" + prodln + "]' id='product_name" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''><input type='hidden' name='product_product_id[" + prodln + "]' id='product_product_id" + prodln + "'  maxlength='50' value=''>";

    var b1 = x.insertCell(2);
    b1.innerHTML = "";
    //b1.innerHTML = "<input class='sqsEnabled product_part_number' autocomplete='off' type='text' name='product_part_number[" + prodln + "]' id='product_part_number" + prodln + "' maxlength='50' value='' title='' tabindex='116' value=''>";

    var b2 = x.insertCell(3);
    b2.innerHTML = "<button title='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_TITLE') + "' accessKey='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_KEY') + "' type='button' tabindex='116' class='button product_part_number_button' value='" + SUGAR.language.get('app_strings', 'LBL_SELECT_BUTTON_LABEL') + "' name='btn1' onclick='openProductPopup(" + prodln + ");'><span class=\"suitepicon suitepicon-action-select\"></span></button>";

    var c = x.insertCell(4);
    c.innerHTML = "<input type='text' name='product_product_list_price[" + prodln + "]' id='product_product_list_price" + prodln + "' maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");' class='product_list_price'><input type='hidden' name='product_product_cost_price[" + prodln + "]' id='product_product_cost_price" + prodln + "' value=''  />";

    if (typeof currencyFields !== 'undefined') {

        currencyFields.push("product_product_list_price" + prodln);
        currencyFields.push("product_product_cost_price" + prodln);

    }

    var d = x.insertCell(5);
    d.innerHTML = "<input type='text' name='product_product_discount[" + prodln + "]' id='product_product_discount" + prodln + "'  maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");' class='product_discount_text'><input type='hidden' name='product_product_discount_amount[" + prodln + "]' id='product_product_discount_amount" + prodln + "' value=''  />";
    d.innerHTML += "<select tabindex='116' name='product_discount[" + prodln + "]' id='product_discount" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");' class='product_discount_amount_select'>" + discount_hidden + "</select>";

    var e = x.insertCell(6);
    e.innerHTML = "<input type='text' name='product_product_unit_price[" + prodln + "]' id='product_product_unit_price" + prodln + "' maxlength='50' value='' title='' tabindex='116' readonly='readonly' onblur='calculateLine(" + prodln + ",\"product_\");' onblur='calculateLine(" + prodln + ",\"product_\");' class='product_unit_price'>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("product_product_unit_price" + prodln);
    }

    var f = x.insertCell(7);
    f.innerHTML = "<input type='text' name='product_vat_amt[" + prodln + "]' id='product_vat_amt" + prodln + "' maxlength='250' value='' title='' tabindex='116' readonly='readonly' class='product_vat_amt_text'>";
    f.innerHTML += "<select tabindex='116' name='product_vat[" + prodln + "]' id='product_vat" + prodln + "' onchange='calculateLine(" + prodln + ",\"product_\");' class='product_vat_amt_select'>" + vat_hidden + "</select>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("product_vat_amt" + prodln);
    }
    var g = x.insertCell(8);
    g.innerHTML = "<input type='text' name='product_product_total_price[" + prodln + "]' id='product_product_total_price" + prodln + "' maxlength='50' value='' title='' tabindex='116' readonly='readonly' class='product_total_price'><input type='hidden' name='product_group_number[" + prodln + "]' id='product_group_number" + prodln + "' value='" + groupid + "'>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("product_product_total_price" + prodln);
    }
    var h = x.insertCell(9);
    h.innerHTML = "<input type='hidden' name='product_currency[" + prodln + "]' id='product_currency" + prodln + "' value=''><input type='hidden' name='product_deleted[" + prodln + "]' id='product_deleted" + prodln + "' value='0'><input type='hidden' name='product_id[" + prodln + "]' id='product_id" + prodln + "' value=''><button type='button' id='product_delete_line" + prodln + "' class='button product_delete_line' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + prodln + ",\"product_\")'><span class=\"suitepicon suitepicon-action-clear\"></span></button><br>";


    enableQS(true);
    //QSFieldsArray["EditView_product_name"+prodln].forceSelection = true;

    var y = tablebody.insertRow(-1);
    y.id = 'product_note_line' + prodln;

    var h1 = y.insertCell(0);
    h1.colSpan = "5";
    h1.style.color = "rgb(68,68,68)";
    h1.innerHTML = "<span style='vertical-align: top;' class='product_item_description_label'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_DESCRIPTION') + " :&nbsp;&nbsp;</span>";
    h1.innerHTML += "<textarea tabindex='116' name='product_item_description[" + prodln + "]' id='product_item_description" + prodln + "' rows='2' cols='23' class='product_item_description'></textarea>&nbsp;&nbsp;";

    var i = y.insertCell(1);
    i.colSpan = "5";
    i.style.color = "rgb(68,68,68)";
    i.innerHTML = "<span style='vertical-align: top;' class='product_description_label'>" + SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NOTE') + " :&nbsp;</span>";
    i.innerHTML += "<textarea tabindex='116' name='product_description[" + prodln + "]' id='product_description" + prodln + "' rows='2' cols='23' class='product_description'></textarea>&nbsp;&nbsp;"

    addToValidate('EditView', 'product_product_id' + prodln, 'id', true, "Please choose a product");

    addAlignedLabels(prodln, 'product');

    prodln++;

    return prodln - 1;
}


/**
 * Insert Service Line
 */

function insertServiceLine(tableid, groupid) {

    if (!enable_groups) {
        tableid = "service_group0";
    }
    if (document.getElementById(tableid + '_head') !== null) {
        document.getElementById(tableid + '_head').style.display = "";
    }

    var vat_hidden = document.getElementById("vathidden").value;
    var discount_hidden = document.getElementById("discounthidden").value;

    tablebody = document.createElement("tbody");
    tablebody.id = "service_body" + servln;
    document.getElementById(tableid).appendChild(tablebody);

    var x = tablebody.insertRow(-1);
    x.id = 'service_line' + servln;

    var a = x.insertCell(0);
    a.colSpan = "4";
    a.innerHTML = "<textarea name='service_name[" + servln + "]' id='service_name" + servln + "'  cols='64' title='' tabindex='116' class='service_name'></textarea><input type='hidden' name='service_product_id[" + servln + "]' id='service_product_id" + servln + "'  maxlength='50' value='0'>";

    var a1 = x.insertCell(1);
    a1.innerHTML = "<input type='text' name='service_product_list_price[" + servln + "]' id='service_product_list_price" + servln + "' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");' class='service_list_price'>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("service_product_list_price" + servln);
    }

    var a2 = x.insertCell(2);
    a2.innerHTML = "<input type='text' name='service_product_discount[" + servln + "]' id='service_product_discount" + servln + "'  maxlength='50' value='' title='' tabindex='116' onblur='calculateLine(" + servln + ",\"service_\");' onblur='calculateLine(" + servln + ",\"service_\");' class='service_discount_text'><input type='hidden' name='service_product_discount_amount[" + servln + "]' id='service_product_discount_amount" + servln + "' value=''/>";
    a2.innerHTML += "<select tabindex='116' name='service_discount[" + servln + "]' id='service_discount" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");' class='service_discount_select'>" + discount_hidden + "</select>";

    var b = x.insertCell(3);
    b.innerHTML = "<input type='text' name='service_product_unit_price[" + servln + "]' id='service_product_unit_price" + servln + "' maxlength='50' value='' title='' tabindex='116'   onblur='calculateLine(" + servln + ",\"service_\");' class='service_unit_price'>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("service_product_unit_price" + servln);
    }
    var c = x.insertCell(4);
    c.innerHTML = "<input type='text' name='service_vat_amt[" + servln + "]' id='service_vat_amt" + servln + "' maxlength='250' value='' title='' tabindex='116' readonly='readonly' class='service_vat_text'>";
    c.innerHTML += "<select tabindex='116' name='service_vat[" + servln + "]' id='service_vat" + servln + "' onchange='calculateLine(" + servln + ",\"service_\");' class='service_vat_select'>" + vat_hidden + "</select>";
    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("service_vat_amt" + servln);
    }

    var e = x.insertCell(5);
    e.innerHTML = "<input type='text' name='service_product_total_price[" + servln + "]' id='service_product_total_price" + servln + "' maxlength='50' value='' title='' tabindex='116' readonly='readonly' class='service_total_price'><input type='hidden' name='service_group_number[" + servln + "]' id='service_group_number" + servln + "' value='" + groupid + "'>";

    if (typeof currencyFields !== 'undefined') {
        currencyFields.push("service_product_total_price" + servln);
    }
    var f = x.insertCell(6);
    f.innerHTML = "<input type='hidden' name='service_deleted[" + servln + "]' id='service_deleted" + servln + "' value='0'><input type='hidden' name='service_id[" + servln + "]' id='service_id" + servln + "' value=''><button type='button' class='button service_delete_line' id='service_delete_line" + servln + "' value='" + SUGAR.language.get(module_sugar_grp1, 'LBL_REMOVE_PRODUCT_LINE') + "' tabindex='116' onclick='markLineDeleted(" + servln + ",\"service_\")'><span class=\"suitepicon suitepicon-action-clear\"></span></button><br>";

    addAlignedLabels(servln, 'service');

    servln++;

    return servln - 1;
}


/**
 * Insert product Header
 */

function insertProductHeader(tableid) {
    tablehead = document.createElement("thead");
    tablehead.id = tableid + "_head";
    tablehead.style.display = "none";
    document.getElementById(tableid).appendChild(tablehead);

    var x = tablehead.insertRow(-1);
    x.id = 'product_head';

    var a = x.insertCell(0);
    a.style.color = "rgb(68,68,68)";
    a.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_QUANITY');

    var b = x.insertCell(1);
    b.style.color = "rgb(68,68,68)";
    b.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_PRODUCT_NAME');

    var b1 = x.insertCell(2);
    b1.colSpan = "2";
    // b1.style.color="rgb(68,68,68)";
    // b1.innerHTML=SUGAR.language.get(module_sugar_grp1, 'LBL_PART_NUMBER');

    var c = x.insertCell(3);
    c.style.color = "rgb(68,68,68)";
    c.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_LIST_PRICE');

    var d = x.insertCell(4);
    d.style.color = "rgb(68,68,68)";
    d.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_DISCOUNT_AMT');

    var e = x.insertCell(5);
    e.style.color = "rgb(68,68,68)";
    e.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_UNIT_PRICE');

    var f = x.insertCell(6);
    f.style.color = "rgb(68,68,68)";
    f.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var g = x.insertCell(7);
    g.style.color = "rgb(68,68,68)";
    g.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');

    var h = x.insertCell(8);
    h.style.color = "rgb(68,68,68)";
    h.innerHTML = '&nbsp;';
}



/**
 * Insert service Header
 */

function insertServiceHeader(tableid) {
    tablehead = document.createElement("thead");
    tablehead.id = tableid + "_head";
    tablehead.style.display = "none";
    document.getElementById(tableid).appendChild(tablehead);

    var x = tablehead.insertRow(-1);
    x.id = 'service_head';

    var a = x.insertCell(0);
    a.colSpan = "4";
    a.style.color = "rgb(68,68,68)";
    a.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_NAME');

    var b = x.insertCell(1);
    b.style.color = "rgb(68,68,68)";
    b.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_LIST_PRICE');

    var c = x.insertCell(2);
    c.style.color = "rgb(68,68,68)";
    c.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_DISCOUNT');

    var d = x.insertCell(3);
    d.style.color = "rgb(68,68,68)";
    d.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_SERVICE_PRICE');

    var e = x.insertCell(4);
    e.style.color = "rgb(68,68,68)";
    e.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_VAT_AMT');

    var f = x.insertCell(5);
    f.style.color = "rgb(68,68,68)";
    f.innerHTML = SUGAR.language.get(module_sugar_grp1, 'LBL_TOTAL_PRICE');

    var g = x.insertCell(6);
    g.style.color = "rgb(68,68,68)";
    g.innerHTML = '&nbsp;';
}