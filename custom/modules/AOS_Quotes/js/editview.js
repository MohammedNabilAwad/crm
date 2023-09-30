

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
var service_type = null;
var type_of_certificate_origin = null;
var exporter_member_or_potential = null;
var manufacturer_member_or_potential = null;

function toggle_service_type() {

    var certificate_origin = ["LBL_TYPE_OF_CERTIFICATE_ORIGIN", "LBL_EXPORTER_MEMBER_OR_POTENTIAL", "LBL_INVOICE_PAYMENT", "LBL_SHIPPING_METHOD", "LBL_EXPORT_TYPE", "LBL_INVOICE_NUMBER", "LBL_INVOICE_DATE", "LBL_CURRENCY", "LBL_QTY", "LBL_UNIT_WEIGHT", "LBL_REVIEWS", "LBL_GROSS_WEIGHT", "LBL_NUMBER_OF_PARCELS", "LBL_NET_WEIGHT", "LBL_TYPE_OF_GOODS"];
    var guarantee = ["LBL_GUARANTEE_TYPE", "LBL_NATURE_OF_WORK", "LBL_GUARANTOR", "LBL_GUARANTEED_NAME", "LBL_GUARANTEED_ADJECTIVE", "LBL_GUARANTEED_ID_NUMBER", "LBL_GUARANTEED_PHONE"];
    var exporter_address = ["LBL_EXPORTER_ADDRESS", "LBL_EXPORTER_ADDRESS_CITY", "LBL_EXPORTER_ADDRESS_STATE", "LBL_EXPORTER_ADDRESS_POSTALCODE", "LBL_EXPORTER_ADDRESS_COUNTRY"];
    var membership_expiration_date = ["LBL_MEMBERSHIP_EXPIRATION_DATE"];
    var note = ["LBL_COMMERCIAL_NAME_ENGLISH", "LBL_TYPE_ACTIVITY", "LBL_PASSPORT_NUMBER"];

    if (service_type == 'Certificate_of_origin') {
        show_parent(certificate_origin);
        show_parent(exporter_address);
    } else {
        hide_parent(certificate_origin);
        hide_parent(exporter_address);
    }
    if (service_type == 'Guarantee') {
        show_parent(guarantee);
    } else {
        hide_parent(guarantee);
    }
    if (service_type == 'Note') {
        show_parent(note);
    } else {
        hide_parent(note);
    }
    // if (service_type == 'Renewal_Subscription' || service_type == 'Guarantee') {
    //     show_parent(membership_expiration_date);
    // } else {
    //     hide_parent(membership_expiration_date);
    // }
}

function toggle_type_of_certificate_origin() {

    var manufacturer = ["LBL_MANUFACTURER_MEMBER_OR_POTEN", "LBL_MANUFACTURER_ADDR", "LBL_MANUFACTURER_ADDR_STATE", "LBL_MANUFACTURER_ADDR_CITY", "LBL_MANUFACTURER_ADDR_COUNTRY", "LBL_MANUFACTURER_ADDR_POSTALCODE"];
    var importer = ["LBL_IMPORTER_ADDRESS", "LBL_IMPORTER_NAME"];
    var country = ["LBL_IMPORTING_COUNTRY", "LBL_COUNTRY_OF_ORIGIN"];
    var consignee = ["LBL_CONSIGNEE_NAME"];

    var certificate_origin_arabic = [""];
    var certificate_origin_english = ["LBL_EXPORTER_NAME_ENGLISH", "LBL_IMPORTER_NAME_ENGLISH"];
    var certificate_origin_european = [""];
    var certificate_origin_chinese = ["LBL_PORT_OF_DISCHARGE", "LBL_DEPARTURE_DATE", "LBL_PORT_OF_LOADING", "LBL_PORT_OF_LOADING", "LBL_VESSEL_NO"];

    if ((service_type == 'Certificate_of_origin') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese')) {
        show_parent(manufacturer);
    } else {
        hide_parent(manufacturer);
    }
    if (service_type == 'Certificate_of_origin' && type_of_certificate_origin != 'Chinese') {
        show_parent(country);
    } else {
        hide_parent(country);
    }
    if ((service_type == 'Certificate_of_origin') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'English')) {
        show_parent(importer);
    } else {
        hide_parent(importer);
    }
    if ((service_type == 'Certificate_of_origin') && (type_of_certificate_origin == 'Chinese' || type_of_certificate_origin == 'European')) {
        show_parent(consignee);
    } else {
        hide_parent(consignee);
    }
    // if(service_type == 'Certificate_of_origin' && type_of_certificate_origin == 'Arabic') {
    //     show_parent(certificate_origin_arabic);
    // } else {
    //     hide_parent(certificate_origin_arabic);
    // }
    if (service_type == 'Certificate_of_origin' && type_of_certificate_origin == 'English') {
        show_parent(certificate_origin_english);
    } else {
        hide_parent(certificate_origin_english);
    }
    // if(service_type == 'Certificate_of_origin' && type_of_certificate_origin == 'European') {
    //     show_parent(certificate_origin_european);
    // } else {
    //     hide_parent(certificate_origin_european);
    // }
    if (service_type == 'Certificate_of_origin' && type_of_certificate_origin == 'Chinese') {
        show_parent(certificate_origin_chinese);
    } else {
        hide_parent(certificate_origin_chinese);
    }
}

function toggle_exporter_member_or_potential() {

    var exporter_member = ["LBL_BILLING_ACCOUNT"];
    var exporter_potential_member = ["LBL_EXPORTER_NAME_POTENTIAL_MEMB"];

    // if (exporter_member_or_potential == 'Member') {
    //     show_parent(exporter_member);
    // } else {
    //     hide_parent(exporter_member);
    // }
    if (service_type == 'Certificate_of_origin' && exporter_member_or_potential == 'Potential_Member') {
        hide_parent(exporter_member);
        show_parent(exporter_potential_member);
    } else {
        hide_parent(exporter_potential_member);
        show_parent(exporter_member);
    }
}

function toggle_manufacturer_member_or_potential() {

    var manufacturer_member = ["LBL_MANUFACTURER_NAME_MEMBER"];
    var manufacturer_potential_member = ["LBL_MANUFACTURER_NAME_POTENTIAL"];

    if ((service_type == 'Certificate_of_origin' && manufacturer_member_or_potential == 'Member') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese')) {
        show_parent(manufacturer_member);
    } else {
        hide_parent(manufacturer_member);
    }
    if ((service_type == 'Certificate_of_origin' && manufacturer_member_or_potential == 'Potential_Member') && (type_of_certificate_origin == 'Arabic' || type_of_certificate_origin == 'Chinese')) {
        show_parent(manufacturer_potential_member);
    } else {
        hide_parent(manufacturer_potential_member);
    }
}

var dropDown = document.querySelectorAll('[type="enum"');

dropDown.forEach(function (element) {

    var service_type_enum = element.querySelectorAll('[id="service_type_c"');

    service_type_enum.forEach(function (element) {

        element.onclick = function () {

            service_type = element.value;
            // Show hide the type choices
            toggle_service_type();
            toggle_exporter_member_or_potential();
            toggle_manufacturer_member_or_potential();
            toggle_type_of_certificate_origin();
        }

        // If it's checked
        if (element.checked) {

            service_type = element.value;
            // Show/hide the type choices
            toggle_service_type();
            toggle_exporter_member_or_potential();
            toggle_manufacturer_member_or_potential();
            toggle_type_of_certificate_origin();
        }
    });

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

toggle_service_type();
toggle_exporter_member_or_potential();
toggle_manufacturer_member_or_potential();
toggle_type_of_certificate_origin();
