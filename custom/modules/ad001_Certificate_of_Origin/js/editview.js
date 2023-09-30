

$(document).ready(function () {

    $('input').each(function () {

        $(this).attr('dir', 'auto');
    });
});

// Will show the parent element
function show_parent(l) {

    l.forEach(function (element) {

        pNode = document.querySelector('div[data-label="' + element + '"]').parentNode;
        pNode.style.display = '';

    });
}

// Will hide the parent element
function hide_parent(l) {

    l.forEach(function (element) {

        pNode = document.querySelector('div[data-label="' + element + '"]').parentNode;
        pNode.style.display = 'none';

    });
}



// Initial flags
var type_of_certificate_origin = null;
var exporter_member_or_potential = null;
var manufacturer_member_or_potential = null;

function toggle_type_of_certificate_origin() {

    var manufacturer = ["LBL_MANUFACTURER_MEMBER_OR_POTEN", "LBL_MANUFACTURER_ADDR", "LBL_MANUFACTURER_ADDR_STATE", "LBL_MANUFACTURER_ADDR_CITY", "LBL_MANUFACTURER_ADDR_COUNTRY", "LBL_MANUFACTURER_ADDR_POSTALCODE", "LBL_MANUFACTURER_PHONE_OFFICE", "LBL_MANUFACTURER_PHONE_MOBILE", "LBL_MANUFACTURER_PHONE_FAX", "LBL_MANUFACTURER_EMAIL_ADDRESS"];
    var importer = ["LBL_IMPORTER_ADDRESS", "LBL_IMPORTER_NAME", "LBL_TYPE_OF_GOODS"];
    var country = ["LBL_IMPORTING_COUNTRY", "LBL_COUNTRY_OF_ORIGIN"];
    var consignee = ["LBL_CONSIGNEE_NAME", "LBL_ITEM_NUMBER", "LBL_ORIGIN_CRITERION"];
    var marks_and_numbers = ["LBL_MARKS_AND_NUMBERS"];
    var goods_information_english = ["LBL_ENGLISH_TYPE_OF_GOODS", "LBL_ENGLISH_NUMBER_OF_PARCELS", "LBL_ENGLISH_MARKS_AND_NUMBERS", "LBL_ENGLISH_GROSS_WEIGHT", "LBL_ENGLISH_REVIEWS"];

    var certificate_origin_arabic = ["LBL_QTY", "LBL_UNIT_WEIGHT", "LBL_NET_WEIGHT"];
    var certificate_origin_english = ["LBL_IMPORTER_NAME_ENGLISH"];
    var exporter_english_name = ["LBL_EXPORTER_NAME_ENGLISH"];
    var certificate_origin_european = [""];
    var certificate_origin_chinese = ["LBL_PORT_OF_DISCHARGE", "LBL_MANUFACTURER_NAME_ENGLISH", "LBL_DEPARTURE_DATE", "LBL_PORT_OF_LOADING", "LBL_PORT_OF_LOADING", "LBL_VESSEL_NO", "LBL_HS_CODE"];

    if (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'English' || type_of_certificate_origin == 'European') {
        show_parent(country);
    } else {
        hide_parent(country);
    }
    if (type_of_certificate_origin == 'English' || type_of_certificate_origin == 'Chinese' || type_of_certificate_origin == 'European') {
        show_parent(exporter_english_name);
    } else {
        hide_parent(exporter_english_name);
    }
    if (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese') {
        show_parent(manufacturer);
    } else {
        hide_parent(manufacturer);
    }
    if (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'English') {
        show_parent(importer);
    } else {
        hide_parent(importer);
    }
    if (type_of_certificate_origin == 'Chinese' || type_of_certificate_origin == 'European') {
        show_parent(consignee);
    } else {
        hide_parent(consignee);
    }
    if (type_of_certificate_origin == 'Arabic') {
        show_parent(certificate_origin_arabic);
        hide_parent(marks_and_numbers);
    } else {
        hide_parent(certificate_origin_arabic);
        show_parent(marks_and_numbers);
    }
    if (type_of_certificate_origin == 'English') {
        show_parent(certificate_origin_english);
        show_parent(goods_information_english);
    } else {
        hide_parent(certificate_origin_english);
        hide_parent(goods_information_english);
    }
    // if(type_of_certificate_origin == 'European') {
    //     show_parent(certificate_origin_european);
    // } else {
    //     hide_parent(certificate_origin_european);
    // }
    if (type_of_certificate_origin == 'Chinese') {
        show_parent(certificate_origin_chinese);
    } else {
        hide_parent(certificate_origin_chinese);
    }
}

function toggle_exporter_member_or_potential() {

    var exporter_member = ["LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE"];
    var exporter_potential_member = ["LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE"];

    // if (exporter_member_or_potential == 'Member') {
    //     show_parent(exporter_member);
    // } else {
    //     hide_parent(exporter_member);
    // }
    if (exporter_member_or_potential == 'Potential_Member') {
        hide_parent(exporter_member);
        show_parent(exporter_potential_member);
    } else {
        hide_parent(exporter_potential_member);
        show_parent(exporter_member);
    }
}

function toggle_manufacturer_member_or_potential() {

    var manufacturer_member = ["LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE"];
    var manufacturer_potential_member = ["LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE"];

    if ((manufacturer_member_or_potential == 'Member') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese')) {
        show_parent(manufacturer_member);
    } else {
        hide_parent(manufacturer_member);
    }
    if ((manufacturer_member_or_potential == 'Potential_Member') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese')) {
        show_parent(manufacturer_potential_member);
    } else {
        hide_parent(manufacturer_potential_member);
    }
}






var dropDown = document.querySelectorAll('[type="enum"');

dropDown.forEach(function (element) {

    var certificate_origin_enum = element.querySelectorAll('[id="type_of_certificate_origin_c"');

    certificate_origin_enum.forEach(function (element) {

        element.onclick = function () {
            type_of_certificate_origin = element.value;
            // Show hide the type choices
            toggle_type_of_certificate_origin();
            toggle_manufacturer_member_or_potential();
        }

        // If it's checked
        if (element.checked) {
            type_of_certificate_origin = element.value;
            // Show/hide the type choices
            toggle_type_of_certificate_origin();
            toggle_manufacturer_member_or_potential();
        }
    });

    var exporter_member_or_potential_enum = element.querySelectorAll('[id="exporter_member_or_potential_c"');

    exporter_member_or_potential_enum.forEach(function (element) {

        element.onclick = function () {
            exporter_member_or_potential = element.value;
            // Show hide the type choices
            toggle_exporter_member_or_potential();
        }

        // If it's checked
        if (element.checked) {
            exporter_member_or_potential = element.value;
            // Show/hide the type choices
            toggle_exporter_member_or_potential();
        }
    });

    var manufacturer_member_or_potential_enum = element.querySelectorAll('[id="manufacturer_member_or_poten_c"');

    manufacturer_member_or_potential_enum.forEach(function (element) {

        element.onclick = function () {

            manufacturer_member_or_potential = element.value;
            // Show hide the type choices
            toggle_manufacturer_member_or_potential();

        }

        // If it's checked
        if (element.checked) {

            manufacturer_member_or_potential = element.value;
            // Show/hide the type choices
            toggle_manufacturer_member_or_potential();

        }
    });

});

toggle_exporter_member_or_potential();
toggle_manufacturer_member_or_potential();
toggle_type_of_certificate_origin();
