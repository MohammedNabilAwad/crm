<?php
$module_name = 'ad001_Certificate_of_Origin';
$viewdefs [$module_name] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          3 => 'FIND_DUPLICATES',
          4 => 
          array (
            'customCode' => '<input type="button" class="button" onClick="printPDFC();" value="طباعة الشهادة">',
          ),
        ),
      ),
      'maxColumns' => '2',
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'useTabs' => false,
      'tabDefs' => 
      array (
        'DEFAULT' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL4' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL6' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL7' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'default' => 
      array (
        0 => 
        array (
          0 => 'name',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'type_of_certificate_origin_c',
            'studio' => 'visible',
            'label' => 'LBL_TYPE_OF_CERTIFICATE_ORIGIN',
          ),
          1 => 
          array (
            'name' => 'certificate_no_c',
            'label' => 'LBL_CERTIFICATE_NO',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
            'label' => 'LBL_DATE_ENTERED',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
            'label' => 'LBL_DATE_MODIFIED',
          ),
        ),
        3 => 
        array (
          0 => 'assigned_user_name',
          1 => 
          array (
            'name' => 'created_by_name',
            'label' => 'LBL_CREATED',
          ),
        ),
        4 => 
        array (
          0 => '',
          1 => '',
        ),
        5 => 
        array (
          0 => 'description',
        ),
      ),
      'lbl_editview_panel4' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'exporter_member_or_potential_c',
            'studio' => 'visible',
            'label' => 'LBL_EXPORTER_MEMBER_OR_POTENTIAL',
          ),
          1 => 
          array (
            'name' => 'export_type_c',
            'studio' => 'visible',
            'label' => 'LBL_EXPORT_TYPE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accounts_ad001_certificate_of_origin_1_name',
            'label' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_ACCOUNTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'leads_ad001_certificate_of_origin_1_name',
            'label' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_LEADS_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'exporter_name_english_c',
            'label' => 'LBL_EXPORTER_NAME_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'exporter_address_c',
            'label' => 'LBL_EXPORTER_ADDRESS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'exporter_address_state_c',
            'label' => 'LBL_EXPORTER_ADDRESS_STATE',
          ),
          1 => 
          array (
            'name' => 'exporter_address_city_c',
            'label' => 'LBL_EXPORTER_ADDRESS_CITY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'exporter_address_country_c',
            'label' => 'LBL_EXPORTER_ADDRESS_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'exporter_address_postalcode_c',
            'label' => 'LBL_EXPORTER_ADDRESS_POSTALCODE',
          ),
        ),
      ),
      'lbl_editview_panel6' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'manufacturer_member_or_poten_c',
            'studio' => 'visible',
            'label' => 'LBL_MANUFACTURER_MEMBER_OR_POTEN',
          ),
          1 => 
          array (
            'name' => 'country_of_origin_c',
            'studio' => 'visible',
            'label' => 'LBL_COUNTRY_OF_ORIGIN',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'accounts_ad001_certificate_of_origin_2_name',
            'label' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_ACCOUNTS_TITLE',
          ),
          1 => 
          array (
            'name' => 'leads_ad001_certificate_of_origin_2_name',
            'label' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_LEADS_TITLE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'manufacturer_name_english_c',
            'label' => 'LBL_MANUFACTURER_NAME_ENGLISH',
          ),
          1 => 
          array (
            'name' => 'manufacturer_addr_c',
            'label' => 'LBL_MANUFACTURER_ADDR',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'manufacturer_addr_state_c',
            'label' => 'LBL_MANUFACTURER_ADDR_STATE',
          ),
          1 => 
          array (
            'name' => 'manufacturer_addr_city_c',
            'label' => 'LBL_MANUFACTURER_ADDR_CITY',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'manufacturer_addr_country_c',
            'label' => 'LBL_MANUFACTURER_ADDR_COUNTRY',
          ),
          1 => 
          array (
            'name' => 'manufacturer_addr_postalcode_c',
            'label' => 'LBL_MANUFACTURER_ADDR_POSTALCODE',
          ),
        ),
      ),
      'lbl_editview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'importer_name_c',
            'label' => 'LBL_IMPORTER_NAME',
          ),
          1 => 
          array (
            'name' => 'importer_name_english_c',
            'label' => 'LBL_IMPORTER_NAME_ENGLISH',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'importer_address_c',
            'studio' => 'visible',
            'label' => 'LBL_IMPORTER_ADDRESS',
          ),
          1 => 
          array (
            'name' => 'importing_country_c',
            'studio' => 'visible',
            'label' => 'LBL_IMPORTING_COUNTRY',
          ),
        ),
      ),
      'lbl_editview_panel7' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'consignee_name_c',
            'studio' => 'visible',
            'label' => 'LBL_CONSIGNEE_NAME',
          ),
          1 => 
          array (
            'name' => 'shipping_method_c',
            'studio' => 'visible',
            'label' => 'LBL_SHIPPING_METHOD',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'vessel_no_c',
            'label' => 'LBL_VESSEL_NO',
          ),
          1 => 
          array (
            'name' => 'departure_date_c',
            'label' => 'LBL_DEPARTURE_DATE',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'port_of_loading_c',
            'label' => 'LBL_PORT_OF_LOADING',
          ),
          1 => 
          array (
            'name' => 'port_of_discharge_c',
            'label' => 'LBL_PORT_OF_DISCHARGE',
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'invoice_number_c',
            'label' => 'LBL_INVOICE_NUMBER',
          ),
          1 => 
          array (
            'name' => 'invoice_date_c',
            'label' => 'LBL_INVOICE_DATE',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'invoice_payment_c',
            'label' => 'LBL_INVOICE_PAYMENT',
          ),
          1 => 
          array (
            'name' => 'currency_id',
            'studio' => 'visible',
            'label' => 'LBL_CURRENCY',
          ),
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'type_of_goods_c',
            'label' => 'LBL_TYPE_OF_GOODS',
          ),
          1 => 
          array (
            'name' => 'english_type_of_goods_c',
            'label' => 'LBL_ENGLISH_TYPE_OF_GOODS',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'qty_c',
            'label' => 'LBL_QTY',
          ),
          1 => 
          array (
            'name' => 'item_number_c',
            'label' => 'LBL_ITEM_NUMBER',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'number_of_parcels_c',
            'label' => 'LBL_NUMBER_OF_PARCELS',
          ),
          1 => 
          array (
            'name' => 'english_number_of_parcels_c',
            'label' => 'LBL_ENGLISH_NUMBER_OF_PARCELS',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'marks_and_numbers_c',
            'label' => 'LBL_MARKS_AND_NUMBERS',
          ),
          1 => 
          array (
            'name' => 'english_marks_and_numbers_c',
            'label' => 'LBL_ENGLISH_MARKS_AND_NUMBERS',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'gross_weight_c',
            'label' => 'LBL_GROSS_WEIGHT',
          ),
          1 => 
          array (
            'name' => 'english_gross_weight_c',
            'label' => 'LBL_ENGLISH_GROSS_WEIGHT',
          ),
        ),
        5 => 
        array (
          0 => 
          array (
            'name' => 'unit_weight_c',
            'label' => 'LBL_UNIT_WEIGHT',
          ),
          1 => 
          array (
            'name' => 'hs_code_c',
            'label' => 'LBL_HS_CODE',
          ),
        ),
        6 => 
        array (
          0 => 
          array (
            'name' => 'net_weight_c',
            'label' => 'LBL_NET_WEIGHT',
          ),
          1 => 
          array (
            'name' => 'origin_criterion_c',
            'label' => 'LBL_ORIGIN_CRITERION',
          ),
        ),
        7 => 
        array (
          0 => 
          array (
            'name' => 'reviews_c',
            'studio' => 'visible',
            'label' => 'LBL_REVIEWS',
          ),
          1 => 
          array (
            'name' => 'english_reviews_c',
            'studio' => 'visible',
            'label' => 'LBL_ENGLISH_REVIEWS',
          ),
        ),
      ),
    ),
  ),
);
;
?>
