<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2019-09-06 10:32:31
$dictionary['Lead']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2013-05-16 18:08:06

 

 // created: 2013-05-16 18:08:29

 

 // created: 2019-09-06 10:32:31
$dictionary['Lead']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2013-02-22 10:31:42

 

// created: 2023-09-17 12:14:43
$dictionary["Lead"]["fields"]["leads_ad001_certificate_of_origin_1"] = array (
  'name' => 'leads_ad001_certificate_of_origin_1',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_1',
  'source' => 'non-db',
  'module' => 'ad001_Certificate_of_Origin',
  'bean_name' => 'ad001_Certificate_of_Origin',
  'side' => 'right',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);


// created: 2023-09-27 10:20:58
$dictionary["Lead"]["fields"]["leads_ad001_certificate_of_origin_2"] = array (
  'name' => 'leads_ad001_certificate_of_origin_2',
  'type' => 'link',
  'relationship' => 'leads_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'module' => 'ad001_Certificate_of_Origin',
  'bean_name' => 'ad001_Certificate_of_Origin',
  'side' => 'right',
  'vname' => 'LBL_LEADS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);


 // created: 2013-05-16 18:05:29

 

 // created: 2013-05-16 18:09:25

 

 // created: 2013-02-22 10:33:21
$dictionary['Lead']['fields']['last_name']['required']=false;
$dictionary['Lead']['fields']['last_name']['comments']='Last name of the contact';
$dictionary['Lead']['fields']['last_name']['merge_filter']='disabled';

 

 // created: 2019-09-06 10:32:32
$dictionary['Lead']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2013-05-16 18:06:07

 

 // created: 2013-03-24 11:48:11
$dictionary['Lead']['fields']['account_name']['required']=true;
$dictionary['Lead']['fields']['account_name']['comments']='Account name for lead';
$dictionary['Lead']['fields']['account_name']['merge_filter']='disabled';
$dictionary['Lead']['fields']['account_name']['full_text_search']=NULL;
$dictionary['Lead']['fields']['account_name']['duplicate_merge']='enabled';
$dictionary['Lead']['fields']['account_name']['duplicate_merge_dom_value']='1';

 

 // created: 2013-05-16 18:04:57

 

$dictionary ['Lead'] ['audited'] = false; // Per rimuovere i pulsanti "View change log"

$dictionary ['Lead'] ['fields'] ['annual_revenue'] ['popupHelp'] = '';

$dictionary ['Lead'] ["fields"] ["osy_service"] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'osy_service_leads',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_SERVICE'
);

$dictionary ['Lead'] ['fields'] ['industry'] = array (
		'name' => 'industry',
		'vname' => 'LBL_INDUSTRY',
		'options' => 'osy_industries_list',
		'type' => 'multienum',
		'len' => '300',
		'required' => false,
		'isMultiSelect' => true
);

$dictionary ['Lead'] ['fields'] ['employees'] = array (
		'name' => 'employees',
		'vname' => 'LBL_EMPLOYEES',
		'options' => 'osy_nr_employees_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['ownership'] = array (
		'name' => 'ownership',
		'vname' => 'LBL_OWNERSHIP',
		'options' => 'osy_ownership_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false,
		'popupHelp' => ''
);

$dictionary ['Lead'] ['fields'] ['total_salary_wage_bill'] = array (
		'name' => 'total_salary_wage_bill',
		'vname' => 'LBL_TOTAL_SALARY_WAGE_BILL',
		'type' => 'varchar',
		'len' => '50',
		'required' => false,
		'popupHelp' => ''
);

$dictionary ['Lead'] ['fields'] ['nr_employees_at'] = array (
		'name' => 'nr_employees_at',
		'vname' => 'LBL_NR_EMPLOYEES_AT',
		'type' => 'varchar',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['date_employees_at'] = array (
		'name' => 'date_employees_at',
		'vname' => 'LBL_DATE_EMPLOYEES_AT',
		'type' => 'date',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['type_of_business'] = array (
		'name' => 'type_of_business',
		'vname' => 'LBL_TYPE_OF_BUSINESS',
		'options' => 'accounts_type_of_business_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false,
		'popupHelp' => ''
);

$dictionary ['Lead'] ['fields'] ['association_member_type'] = array (
		'name' => 'association_member_type',
		'vname' => 'LBL_ASSOCIATION_MEMBER_TYPE',
		'options' => 'osy_association_member_type_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false
);

// $dictionary['Lead']['fields']['association_industry'] = array (
// 'name' => 'association_industry',
// 'vname' => 'LBL_INDUSTRY',
// 'options' => 'osy_industries_list',
// 'type' => 'enum',
// 'len' => '255',
// 'required' => false,
// 'popupHelp' => '',
// );

$dictionary ['Lead'] ['fields'] ['territorial'] = array (
		'name' => 'territorial',
		'vname' => 'LBL_TERRITORIAL',
		'options' => 'osy_territorials_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['nr_company_members'] = array (
		'name' => 'nr_company_members',
		'vname' => 'LBL_NR_COMPANY_MEMBERS',
		'type' => 'varchar',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['subcategories'] = array (
		'name' => 'subcategories',
		'vname' => 'LBL_SUBCATEGORIES',
		'options' => 'accounts_subcategories_list',
		'type' => 'multienum',
		'len' => '300',
		'required' => false,
		'visibility_grid' => array (
				'trigger' => 'industry',
				'values' => array (
						'Agriculture, forestry and fishing' => array (
								'Crop and animal production, hunting and related service activities',
								'Forestry and logging',
								'Fishing and aquaculture'
						),
						'Mining and quarrying' => array (
								'Mining of coal and lignite',
								'Extraction of crude petroleum and natural gas',
								'Mining of metal ores',
								'Other mining and quarrying',
								'Mining support service activities'
						),
						'Manufacturing' => array (
								'Manufacture of food products',
								'Manufacture of beverages',
								'Manufacture of tobacco products',
								'Manufacture of textiles',
								'Manufacture of wearing apparel',
								'Manufacture of leather and related products',
								'Manufacture of wood and of products of wood and cork, except furniture; manufacture of articles of straw and plaiting materials',
								'Manufacture of paper and paper products',
								'Printing and reproduction of recorded media',
								'Manufacture of coke and refined petroleum products',
								'Manufacture of chemicals and chemical products',
								'Manufacture of basic pharmaceutical products and pharmaceutical preparations',
								'Manufacture of rubber and plastics products',
								'Manufacture of other non-metallic mineral products',
								'Manufacture of basic metals',
								'Manufacture of fabricated metal products, except machinery and equipment',
								'Manufacture of computer, electronic and optical products',
								'Manufacture of electrical equipment',
								'Manufacture of machinery and equipment n.e.c.',
								'Manufacture of motor vehicles, trailers and semi-trailers',
								'Manufacture of other transport equipment',
								'Manufacture of furniture',
								'Other manufacturing',
								'Repair and installation of machinery and equipment'
						),
						// 'Electricity, gas, steam and air conditioning supply' => array(
						// '',
						// ),
						'Water supply; sewerage, waste management and remediation activities' => array (
								'Water collection, treatment and supply',
								'Sewerage',
								'Waste collection, treatment and disposal activities; materials recovery',
								'Remediation activities and other waste management services'
						),
						'Construction' => array (
								'Construction of buildings',
								'Civil engineering',
								'Specialized construction activities'
						),
						'Wholesale and retail trade; repair of motor vehicles and motorcycles' => array (
								'Wholesale and retail trade and repair of motor vehicles and motorcycles',
								'Wholesale trade, except of motor vehicles and motorcycles',
								'Retail trade, except of motor vehicles and motorcycles'
						),
						'Transportation and storage' => array (
								'Land transport and transport via pipelines',
								'Water transport',
								'Air transport',
								'Warehousing and support activities for transportation',
								'Postal and courier activities'
						),
						'Accommodation and food service activities' => array (
								'Accommodation',
								'Food and beverage service activities'
						),

						'Information and communication' => array (
								'Publishing activities',
								'Motion picture, video and television programme production, sound recording and music publishing activities',
								'Programming and broadcasting activities',
								'Telecommunications',
								'Computer programming, consultancy and related activities',
								'Information service activities',
								'Financial and insurance activities',
								'Financial service activities, except insurance and pension funding',
								'Insurance, reinsurance and pension funding, except compulsory social security',
								'Activities auxiliary to financial service and insurance activities'
						),
						// 'Real estate activities' => array(
						// '',
						// ),
						// 'Professional, scientific and technical activities' => array(
						// '',
						// ),
						'Legal and accounting activities' => array (
								'Activities of head offices; management consultancy activities',
								'Architectural and engineering activities; technical testing and analysis',
								'Scientific research and development',
								'Advertising and market research',
								'Other professional, scientific and technical activities',
								'Veterinary activities'
						),
						'Administrative and support service activities' => array (
								'Rental and leasing activities',
								'Employment activities',
								'Travel agency, tour operator, reservation service and related activities',
								'Security and investigation activities',
								'Services to buildings and landscape activities',
								'Office administrative, office support and other business support activities'
						),
						// 'Public administration and defence; compulsory social security' => array(
						// '',
						// ),
						// 'Education' => array(
						// '',
						// ),
						'Human health and social work activities' => array (
								'Human health activities',
								'Residential care activities',
								'Social work activities without accommodation'
						),
						'Arts, entertainment and recreation' => array (
								'Creative, arts and entertainment activities',
								'Libraries, archives, museums and other cultural activities',
								'Gambling and betting activities',
								'Sports activities and amusement and recreation activities'
						),
						'Other service activities' => array (
								'Activities of membership organizations',
								'Repair of computers and personal and household goods',
								'Other personal service activities'
						),
						'Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use' => array (
								'Activities of households as employers of domestic personnel',
								'Undifferentiated goods- and services-producing activities of private households for own use'
						)
				// 'Activities of extraterritorial organizations and bodies' => array(
				// '',
				// ),
								)
		)
);

$dictionary ['Lead'] ['fields'] ['other'] = array (
		'name' => 'other',
		'vname' => 'LBL_OTHER',
		'type' => 'varchar',
		'len' => '255',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['lead_source'] = array (
		'name' => 'lead_source',
		'vname' => 'LBL_LEAD_SOURCE',
		'type' => 'enum',
		'options' => 'lead_source_dom',
		'len' => '255',
		'comment' => 'How did the contact come about',
		'popupHelp' => ''
);

$dictionary ['Lead'] ['fields'] ['five_main_operating_markets'] = array (
		'name' => 'five_main_operating_markets',
		'vname' => 'LBL_FIVE_MAIN_OPERATING_MARKETS',
		'comment' => '',
		'required' => false,
		'type' => 'multienum',
		'massupdate' => 0,
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => false,
		'reportable' => true,
		'len' => 255,
		'size' => '255',
		'options' => 'accounts_operating_markets_list',
		'studio' => 'visible',
		'popupHelp' => ''
);

$dictionary ['Lead'] ['fields'] ['products_and_services'] = array (
		'name' => 'products_and_services',
		'vname' => 'LBL_PRODUCTS_AND_SERVICES',
		'type' => 'varchar',
		'len' => '255',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['nr_directors'] = array (
		'name' => 'nr_directors',
		'vname' => 'LBL_NR_DIRECTORS',
		'type' => 'int',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['nr_permanent'] = array (
		'name' => 'nr_permanent',
		'vname' => 'LBL_NR_PERMANENT',
		'type' => 'int',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['nr_casual'] = array (
		'name' => 'nr_casual',
		'vname' => 'LBL_NR_CASUAL',
		'type' => 'int',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['nr_seasonal'] = array (
		'name' => 'nr_seasonal',
		'vname' => 'LBL_NR_SEASONAL',
		'type' => 'int',
		'len' => '11',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['interested_on'] = array (
		'name' => 'interested_on',
		'vname' => 'LBL_INTERESTED_ON',
		'type' => 'varchar',
		'len' => '255',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['interested_from'] = array (
		'name' => 'interested_from',
		'vname' => 'LBL_INTERESTED_FROM',
		'type' => 'date',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['interested_to'] = array (
		'name' => 'interested_to',
		'vname' => 'LBL_INTERESTED_TO',
		'type' => 'date',
		'required' => false
);
$dictionary ['Lead'] ['fields'] ['alt_address_pobox_c'] = array (
		// il campo si chiama "alt_..._c" per coerenza con il campo relativo "primary_..._c" creato da studio
		'required' => false,
		'name' => 'alt_address_pobox_c',
		'vname' => 'LBL_ALT_ADDRESS_POBOX',
		'type' => 'varchar',
		'massupdate' => '0',
		'default' => '',
		'no_default' => false,
		'comments' => '',
		'help' => '',
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => false,
		'reportable' => true,
		'unified_search' => false,
		'merge_filter' => 'disabled',
		'len' => '255',
		'size' => '20'
);
$dictionary ['Lead'] ['fields'] ['alt_address_region_c'] = array (
		// il campo si chiama "alt_..._c" per coerenza con il campo relativo "primary_..._c" creato da studio
		'required' => false,
		'name' => 'alt_address_region_c',
		'vname' => 'LBL_ALT_ADDRESS_REGION',
		'type' => 'varchar',
		'massupdate' => '0',
		'default' => '',
		'no_default' => false,
		'comments' => '',
		'help' => '',
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => false,
		'reportable' => true,
		'unified_search' => false,
		'merge_filter' => 'disabled',
		'len' => '255',
		'size' => '20'
);
$dictionary ['Lead'] ['fields'] ['primary_address_pobox_c'] = array (
		// il campo si chiama "alt_..._c" per coerenza con gli altri moduli
		'required' => false,
		'name' => 'primary_address_pobox_c',
		'vname' => 'LBL_PRIMARY_ADDRESS_POBOX',
		'type' => 'varchar',
		'massupdate' => '0',
		'default' => '',
		'no_default' => false,
		'comments' => '',
		'help' => '',
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => false,
		'reportable' => true,
		'unified_search' => false,
		'merge_filter' => 'disabled',
		'len' => '255',
		'size' => '20'
);
$dictionary ['Lead'] ['fields'] ['primary_address_region_c'] = array (
		// il campo si chiama "primary_..._c" per coerenza con gli altri moduli
		'required' => false,
		'name' => 'primary_address_region_c',
		'vname' => 'LBL_PRIMARY_ADDRESS_REGION',
		'type' => 'varchar',
		'massupdate' => '0',
		'default' => '',
		'no_default' => false,
		'comments' => '',
		'help' => '',
		'importable' => 'true',
		'duplicate_merge' => 'disabled',
		'duplicate_merge_dom_value' => '0',
		'audited' => false,
		'reportable' => true,
		'unified_search' => false,
		'merge_filter' => 'disabled',
		'len' => '255',
		'size' => '20'
);
$dictionary ['Lead'] ['fields'] ['primary_address_other'] = array (
		'name' => 'primary_address_other',
		'vname' => 'LBL_PRIMARY_ADDRESS_OTHER',
		'type' => 'varchar',
		'len' => '255',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['alt_address_other'] = array (
		'name' => 'alt_address_other',
		'vname' => 'LBL_ALT_ADDRESS_OTHER',
		'type' => 'varchar',
		'len' => '255',
		'required' => false
);

$dictionary ['Lead'] ['fields'] ['type_of_potential_members'] = array (
		'name' => 'type_of_potential_members',
		'vname' => 'LBL_TYPE_OF_POTENTIAL_MEMBERS',
		'options' => 'type_of_potential_members_list',
		'type' => 'enum',
		'len' => '255',
		'required' => false
);

/*
 * //Relazione 1-1 con modulo Opportunities (Subscription Fees) $dictionary["Lead"]["fields"]["leads_opportunities_1"] = array ( 'name' => 'leads_opportunities_1', 'type' => 'link', 'relationship' => 'leads_opportunities_1', 'source' => 'non-db', 'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE', 'id_name' => 'opportunities_1_id', ); $dictionary["Lead"]["fields"]["opportunities_1_name"] = array ( 'name' => 'opportunities_1_name', 'type' => 'relate', 'source' => 'non-db', 'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE', 'save' => true, 'id_name' => 'opportunities_1_id', 'link' => 'leads_opportunities_1', 'table' => 'opportunities', 'module' => 'Opportunities', 'rname' => 'name', ); $dictionary["Lead"]["fields"]["opportunities_1_id"] = array ( 'name' => 'opportunities_1_id', 'type' => 'link', 'relationship' => 'leads_opportunities_1', 'source' => 'non-db', 'reportable' => false, 'side' => 'left', 'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE', );
 */

// relazione con modulo osy_services_companies (1-n)
// ************************************************************
// link
$dictionary ['Lead'] ['fields'] ['osy_services_companies'] = array (
		'name' => 'osy_services_companies',
		'type' => 'link',
		'relationship' => 'leads_osy_services_companies',
		'module' => 'osy_services_companies',
		'bean_name' => 'osy_services_companies',
		'source' => 'non-db',
		'vname' => 'LBL_OSY_SERVICES_COMPANIES'
);

// relationship
$dictionary ["Lead"] ["relationships"] ["leads_osy_services_companies"] = array (
		'lhs_module' => 'Leads',
		'lhs_table' => 'leads',
		'lhs_key' => 'id',
		'rhs_module' => 'osy_services_companies',
		'rhs_table' => 'osy_services_companies',
		'rhs_key' => 'lead_id',
		'relationship_type' => 'one-to-many'
);
// ************************************************************

// OPENSYMBOLMOD - START - davide.dallapozza - 09:54:05
// *************************************************
// Relazione 1-n con ContactsPotentialMember

$dictionary ['Lead'] ['fields'] ['osy_contactpotentialmember_link'] = array (
		'name' => 'osy_contactpotentialmember_link',
		'type' => 'link',
		'relationship' => 'osy_contactspotentialmember_lead',
		'source' => 'non-db',
		'vname' => 'LBL_CONTACT_POTENTIAL_MEMBER'
);

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************


$dictionary['Lead']['fields']['accept_status_id']['importable'] = false;
$dictionary['Lead']['fields']['alt_address_street_2']['importable'] = false;
$dictionary['Lead']['fields']['alt_address_street_3']['importable'] = false;
$dictionary['Lead']['fields']['assistant_phone']['importable'] = false;
$dictionary['Lead']['fields']['assistant']['importable'] = false;
$dictionary['Lead']['fields']['birthdate']['importable'] = false;
$dictionary['Lead']['fields']['converted']['importable'] = false;
$dictionary['Lead']['fields']['created_by']['importable'] = false;
$dictionary['Lead']['fields']['date_entered']['importable'] = false;
$dictionary['Lead']['fields']['date_modified']['importable'] = false;
$dictionary['Lead']['fields']['deleted']['importable'] = false;
$dictionary['Lead']['fields']['department']['importable'] = false;
$dictionary['Lead']['fields']['do_not_call']['importable'] = false;
$dictionary['Lead']['fields']['email_opt_out']['importable'] = false;
$dictionary['Lead']['fields']['email']['importable'] = false;
$dictionary['Lead']['fields']['phone_home']['importable'] = false;
$dictionary['Lead']['fields']['interested_from']['importable'] = false;
$dictionary['Lead']['fields']['interested_on']['importable'] = false;
$dictionary['Lead']['fields']['interested_to']['importable'] = false;
$dictionary['Lead']['fields']['invalid_email']['importable'] = false;
$dictionary['Lead']['fields']['phone_mobile']['importable'] = false;
$dictionary['Lead']['fields']['modified_user_id']['importable'] = false;
$dictionary['Lead']['fields']['modified_by_name']['importable'] = false;
$dictionary['Lead']['fields']['nr_casual']['importable'] = false;
$dictionary['Lead']['fields']['nr_company_members']['importable'] = false;
$dictionary['Lead']['fields']['nr_directors']['importable'] = false;
$dictionary['Lead']['fields']['nr_seasonal']['importable'] = false;
$dictionary['Lead']['fields']['email2']['importable'] = false;
$dictionary['Lead']['fields']['phone_other']['importable'] = false;
$dictionary['Lead']['fields']['other']['importable'] = false;
$dictionary['Lead']['fields']['portal_app']['importable'] = false;
$dictionary['Lead']['fields']['portal_name']['importable'] = false;
$dictionary['Lead']['fields']['first_name']['importable'] = false;
$dictionary['Lead']['fields']['last_name']['importable'] = false;
$dictionary['Lead']['fields']['full_name']['importable'] = false;
$dictionary['Lead']['fields']['account_description']['importable'] = false;
$dictionary['Lead']['fields']['lead_source_description']['importable'] = false;
$dictionary['Lead']['fields']['primary_address_street_2']['importable'] = false;
$dictionary['Lead']['fields']['primary_address_street_3']['importable'] = false;
$dictionary['Lead']['fields']['refered_by']['importable'] = false;
$dictionary['Lead']['fields']['reports_to_id']['importable'] = false;
$dictionary['Lead']['fields']['report_to_name']['importable'] = false;
$dictionary['Lead']['fields']['salutation']['importable'] = false;
$dictionary['Lead']['fields']['status_description']['importable'] = false;
$dictionary['Lead']['fields']['opportunity_amount']['importable'] = false;
$dictionary['Lead']['fields']['territorial']['importable'] = false;
$dictionary['Lead']['fields']['title']['importable'] = false;
$dictionary['Lead']['fields']['association_member_type']['importable'] = false;
$dictionary['Lead']['fields']['campaign_id']['importable'] = false;
$dictionary['Lead']['fields']['assigned_user_name']['importable'] = false;
$dictionary['Lead']['fields']['assigned_user_id']['importable'] = false;
$dictionary['Lead']['fields']['association_member_type']['importable'] = false;
$dictionary['Lead']['fields']['opportunity_name']['importable'] = false;
$dictionary['Lead']['fields']['opportunity_id']['importable'] = false;

$dictionary['Lead']['fields']['payment_status_fields'] =
    array (
		'name' => 'payment_status_fields',
		'rname' => 'id',
		'relationship_fields' =>
			array (
				'id' => 'payment_status_id',
				'payment_status' => 'osy_payment_status',
			),
		'vname' => 'LBL_PAYMENT_STATUS',
		'type' => 'relate',
		'link' => 'fp_events_leads_1',
		'link_type' => 'relationship_info',
		'join_link_name' => 'fp_events_leads_1',
		'source' => 'non-db',
		'importable' => 'false',
		'duplicate_merge' => 'disabled',
		'studio' => false,
	);
$dictionary['Lead']['fields']['osy_payment_status'] =
    array (
		'massupdate' => false,
		'name' => 'osy_payment_status',
		'type' => 'enum',
		'studio' => 'false',
		'source' => 'non-db',
		'vname' => 'LBL_LIST_PAYMENT_STATUS',
		'options' => 'osy_payment_status_list',
		'importable' => 'false',
	);
    $dictionary['Lead']['fields']['payment_status_id'] =
    array (
		'name' => 'payment_status_id',
		'type' => 'varchar',
		'source' => 'non-db',
		'vname' => 'LBL_LIST_PAYMENT_STATUS_ID',
		'studio' =>
			array (
				'listview' => false,
			),
	);

//cost
//**************************************
$dictionary['Lead']['fields']['cost_fields'] =
	array (
		'name' => 'cost_fields',
		'rname' => 'id',
		'relationship_fields' =>
			array (
				'id' => 'cost_id',
				'cost' => 'osy_cost',
			),
		'vname' => 'LBL_COST',
		'type' => 'relate',
		'link' => 'fp_events_leads_1',
		'link_type' => 'relationship_info',
		'join_link_name' => 'fp_events_leads_1',
		'source' => 'non-db',
		'importable' => 'false',
		'duplicate_merge' => 'disabled',
		'studio' => false,
	);
$dictionary['Lead']['fields']['osy_cost'] =
	array (
		'massupdate' => false,
		'name' => 'osy_cost',
		'type' => 'varchar',
		'studio' => 'false',
		'source' => 'non-db',
		'vname' => 'LBL_LIST_COST',
	);
$dictionary['Lead']['fields']['cost_id'] =
	array (
		'name' => 'cost_id',
		'type' => 'varchar',
		'source' => 'non-db',
		'vname' => 'LBL_LIST_COST_ID',
		'studio' =>
			array (
				'listview' => false,
			),
	);
//**************************************

$dictionary["Lead"]["fields"]['campaign_log'] = array (
    'name' => 'campaign_log',
    'type' => 'link',
    'relationship' => 'campaignlog_lead',
    'module' => 'CampaignLog',
    'bean_name' => 'CampaignLog',
    'source' => 'non-db',
    'vname' => 'LBL_CAMPAIGN_LOG',
);

//$dictionary["Lead"]["fields"]['name'] = array(
//      'name' => 'name',
//      'vname' => 'LBL_NAME',
//      'type' => 'varchar',
////      'link' => true,
////      'fields' => 
////      array (
////        0 => 'account_name',
////      ),
////      'sort_on' => 'account_name',
//      'source' => 'non-db',
////      'group' => 'account_name',
////      'len' => '255',
////      'db_concat_fields' => 
////      array (
////        0 => 'account_name',
////      ),
////      'importable' => 'false',
//);
$dictionary["Lead"]["fields"]['panel_name'] = array (
    'name' => 'panel_name',
    'type' => 'enum',
    'options' => 'delegate_types_list',
    'source' => 'non-db',
    'vname' => 'LBL_PANEL_NAME',
);


//OPENSYMBOLMOD paolo.santacatterina (07/feb/2013  18:00:55)
//inserito campo annual_revenue per modulo Leads
$dictionary["Lead"]["fields"]['annual_revenue'] = array (
    'name' => 'annual_revenue',
    'vname' => 'LBL_ANNUAL_REVENUE',
    'type' => 'varchar',
    'len' => 100,
    'comment' => 'Annual revenue for this person',
    'merge_filter' => 'enabled',
);
//************************************************************

$dictionary['Lead']['fields']['association_member_type']['dependency'] = 'ifElse(eq($type_of_potential_members,"Potential Association"),true,false)';


 // created: 2013-06-28 17:48:29
$dictionary['Lead']['fields']['status']['comments']='Status of the lead';
$dictionary['Lead']['fields']['status']['merge_filter']='disabled';

 

 // created: 2019-09-06 10:32:31
$dictionary['Lead']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2013-05-16 18:11:19

 

 // created: 2013-05-16 18:07:40

 

 // created: 2023-08-30 13:12:28
$dictionary['Lead']['fields']['type_activity_c']['inline_edit']='1';
$dictionary['Lead']['fields']['type_activity_c']['labelValue']='Type Activity';

 

 // created: 2023-08-30 12:59:16
$dictionary['Lead']['fields']['id_card_number_c']['inline_edit']='1';
$dictionary['Lead']['fields']['id_card_number_c']['labelValue']='ID Card Number';

 

 // created: 2023-08-30 12:51:30
$dictionary['Lead']['fields']['trade_name_arabic_c']['inline_edit']='1';
$dictionary['Lead']['fields']['trade_name_arabic_c']['labelValue']='Trade Name Arabic';

 

 // created: 2023-07-17 21:22:00
$dictionary['Lead']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2023-08-30 12:52:14
$dictionary['Lead']['fields']['trade_name_english_c']['inline_edit']='1';
$dictionary['Lead']['fields']['trade_name_english_c']['labelValue']='Trade Name English';

 

 // created: 2023-08-30 13:06:00
$dictionary['Lead']['fields']['front_address_c']['inline_edit']='1';
$dictionary['Lead']['fields']['front_address_c']['labelValue']='Front Address';

 

 // created: 2023-08-30 17:35:42
$dictionary['Lead']['fields']['commercial_registration_no_c']['inline_edit']='1';
$dictionary['Lead']['fields']['commercial_registration_no_c']['labelValue']='Commercial Registration No';

 

 // created: 2023-08-30 13:02:49
$dictionary['Lead']['fields']['gender_c']['inline_edit']='1';
$dictionary['Lead']['fields']['gender_c']['labelValue']='Gender';

 

 // created: 2023-08-30 13:04:29
$dictionary['Lead']['fields']['role_function_c']['inline_edit']='1';
$dictionary['Lead']['fields']['role_function_c']['labelValue']='Role Function';

 

 // created: 2023-08-30 14:45:24
$dictionary['Lead']['fields']['english_name_c']['inline_edit']='1';
$dictionary['Lead']['fields']['english_name_c']['labelValue']='English Name';

 

 // created: 2023-07-17 21:22:00
$dictionary['Lead']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2023-08-30 12:48:28
$dictionary['Lead']['fields']['member_name_english_c']['inline_edit']='1';
$dictionary['Lead']['fields']['member_name_english_c']['labelValue']='Member Name English';

 

 // created: 2023-08-30 13:09:07
$dictionary['Lead']['fields']['finders_name_c']['inline_edit']='1';
$dictionary['Lead']['fields']['finders_name_c']['labelValue']='Finders Name';

 

 // created: 2023-07-17 21:22:00
$dictionary['Lead']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:22:00
$dictionary['Lead']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2023-08-30 14:40:54
$dictionary['Lead']['fields']['commercial_name_arabic_c']['inline_edit']='1';
$dictionary['Lead']['fields']['commercial_name_arabic_c']['labelValue']='Commercial Name Arabic';

 

 // created: 2023-09-15 10:50:40
$dictionary['Lead']['fields']['status']['comments']='Status of the lead';
$dictionary['Lead']['fields']['status']['merge_filter']='disabled';
$dictionary['Lead']['fields']['status']['default']='Final Stage';
$dictionary['Lead']['fields']['status']['inline_edit']=true;

 

 // created: 2023-08-30 13:00:11
$dictionary['Lead']['fields']['issue_authority_c']['inline_edit']='1';
$dictionary['Lead']['fields']['issue_authority_c']['labelValue']='Issue Authority';

 

 // created: 2023-09-30 13:02:56
$dictionary['Lead']['fields']['primary_address_state']['inline_edit']=true;
$dictionary['Lead']['fields']['primary_address_state']['comments']='State for primary address';
$dictionary['Lead']['fields']['primary_address_state']['merge_filter']='disabled';

 

 // created: 2023-08-30 13:15:43
$dictionary['Lead']['fields']['female_foreign_worker_c']['inline_edit']='1';
$dictionary['Lead']['fields']['female_foreign_worker_c']['labelValue']='Female Foreign Worker';

 

 // created: 2023-09-30 13:01:07
$dictionary['Lead']['fields']['member_number_system_c']['inline_edit']='1';
$dictionary['Lead']['fields']['member_number_system_c']['labelValue']='رقم العضو في النظام';

 

 // created: 2023-08-30 13:08:19
$dictionary['Lead']['fields']['was_detected_c']['inline_edit']='1';
$dictionary['Lead']['fields']['was_detected_c']['labelValue']='Was Detected';

 

 // created: 2023-07-30 20:48:37
$dictionary['Lead']['fields']['industry_description_c']['inline_edit']='1';
$dictionary['Lead']['fields']['industry_description_c']['labelValue']='Industry Description:';

 

 // created: 2023-07-30 20:40:37
$dictionary['Lead']['fields']['nr_female_employees_c']['inline_edit']='1';
$dictionary['Lead']['fields']['nr_female_employees_c']['labelValue']='Nr. of Female Employees:';

 

 // created: 2023-08-30 13:15:03
$dictionary['Lead']['fields']['male_foreign_worker_c']['inline_edit']='1';
$dictionary['Lead']['fields']['male_foreign_worker_c']['labelValue']='Male Foreign Worker';

 

 // created: 2023-08-30 16:45:03
$dictionary['Lead']['fields']['company_id_or_vat_c']['inline_edit']='1';
$dictionary['Lead']['fields']['company_id_or_vat_c']['labelValue']='company id or vat';

 

 // created: 2023-08-30 13:16:41
$dictionary['Lead']['fields']['capital_c']['inline_edit']='1';
$dictionary['Lead']['fields']['capital_c']['labelValue']='Capital';

 

 // created: 2023-08-30 13:10:46
$dictionary['Lead']['fields']['work_field_c']['inline_edit']='1';
$dictionary['Lead']['fields']['work_field_c']['labelValue']='Work Field';

 

 // created: 2023-08-30 14:41:51
$dictionary['Lead']['fields']['commercial_name_english_c']['inline_edit']='1';
$dictionary['Lead']['fields']['commercial_name_english_c']['labelValue']='Commercial Name English';

 

 // created: 2023-07-30 20:36:16
$dictionary['Lead']['fields']['nr_male_employees_c']['inline_edit']='1';
$dictionary['Lead']['fields']['nr_male_employees_c']['labelValue']='Nr. of Male Employees:';

 

 // created: 2023-08-30 13:06:30
$dictionary['Lead']['fields']['beside_address_c']['inline_edit']='1';
$dictionary['Lead']['fields']['beside_address_c']['labelValue']='Beside Address';

 

 // created: 2023-08-30 12:55:24
$dictionary['Lead']['fields']['release_side_c']['inline_edit']='1';
$dictionary['Lead']['fields']['release_side_c']['labelValue']='Release Side';

 

 // created: 2023-08-30 13:16:41
$dictionary['Lead']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2023-07-30 20:43:21
$dictionary['Lead']['fields']['other_information_about_staf_c']['inline_edit']='1';
$dictionary['Lead']['fields']['other_information_about_staf_c']['labelValue']='Other information about staff (Disabilities, expats, etc.):';

 

 // created: 2023-08-30 13:01:29
$dictionary['Lead']['fields']['issue_date_id_card_c']['inline_edit']='1';
$dictionary['Lead']['fields']['issue_date_id_card_c']['labelValue']='Issue Date ID Card';

 

 // created: 2023-08-30 12:57:02
$dictionary['Lead']['fields']['date_issuance_register_c']['inline_edit']='1';
$dictionary['Lead']['fields']['date_issuance_register_c']['labelValue']='Date Issuance Register';

 

 // created: 2023-08-30 12:57:56
$dictionary['Lead']['fields']['registration_expiry_date_c']['inline_edit']='1';
$dictionary['Lead']['fields']['registration_expiry_date_c']['labelValue']='Registration Expiry Date';

 

 // created: 2023-07-30 20:25:54
$dictionary['Lead']['fields']['company_id_number_c']['inline_edit']='1';
$dictionary['Lead']['fields']['company_id_number_c']['labelValue']='Company ID Number/VAT:';

 

 // created: 2023-07-30 20:26:19
$dictionary['Lead']['fields']['other_company_number_c']['inline_edit']='1';
$dictionary['Lead']['fields']['other_company_number_c']['labelValue']='Other Company Number:';

 
?>