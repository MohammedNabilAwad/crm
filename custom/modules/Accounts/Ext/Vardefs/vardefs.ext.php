<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2019-09-06 10:32:30
$dictionary['Account']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2013-04-16 16:57:02

 

 // created: 2019-09-06 10:32:30
$dictionary['Account']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2013-07-15 09:37:53
$dictionary['Account']['fields']['ownership']['len']=100;
$dictionary['Account']['fields']['ownership']['merge_filter']='disabled';

 

 // created: 2013-02-21 17:09:10
$dictionary['Account']['fields']['company_id_or_vat']['required']=false;
$dictionary['Account']['fields']['company_id_or_vat']['merge_filter']='disabled';
$dictionary['Account']['fields']['company_id_or_vat']['massupdate']= 0;

 

 // created: 2013-05-17 09:23:45

 

 // created: 2013-05-24 16:21:06

 

 // created: 2013-04-16 16:47:40

 

 // created: 2013-03-20 16:32:11
$dictionary['Account']['fields']['member_type']['len']=100;
$dictionary['Account']['fields']['member_type']['required']=false;
$dictionary['Account']['fields']['member_type']['massupdate']='1';
$dictionary['Account']['fields']['member_type']['merge_filter']='disabled';
$dictionary['Account']['fields']['member_type']['default']='Direct Company';

 

 // created: 2019-09-06 10:32:30
$dictionary['Account']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

// created: 2023-09-17 09:35:54
$dictionary["Account"]["fields"]["accounts_mem_memos_1"] = array (
  'name' => 'accounts_mem_memos_1',
  'type' => 'link',
  'relationship' => 'accounts_mem_memos_1',
  'source' => 'non-db',
  'module' => 'Mem_Memos',
  'bean_name' => 'Mem_Memos',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_MEM_MEMOS_1_FROM_MEM_MEMOS_TITLE',
);


 // created: 2013-04-26 16:47:10

 

 // created: 2013-04-16 16:59:00

 


$dictionary['Account']['fields']['osy_service'] = array (
		'name' => 'osy_service',
		'type' => 'link',
		'relationship' => 'account_osy_service',
		'module'=>'osy_service',
		'bean_name'=>'osy_service',
		'source'=>'non-db',
		'vname'=>'LBL_OSY_SERVICE',
);

$dictionary['Account']['relationships']['account_osy_service'] = array(
	'lhs_module'=> 'Accounts',
	'lhs_table'=> 'accounts',
	'lhs_key' => 'id',
	'rhs_module'=> 'osy_service',
	'rhs_table'=> 'osy_service',
	'rhs_key' => 'parent_id',
	'relationship_type'=>'one-to-many',
	'relationship_role_column'=>'parent_type',
	'relationship_role_column_value'=>'Accounts',
);

// created: 2023-09-17 09:36:41
$dictionary["Account"]["fields"]["accounts_ad001_certificate_of_origin_1"] = array (
  'name' => 'accounts_ad001_certificate_of_origin_1',
  'type' => 'link',
  'relationship' => 'accounts_ad001_certificate_of_origin_1',
  'source' => 'non-db',
  'module' => 'ad001_Certificate_of_Origin',
  'bean_name' => 'ad001_Certificate_of_Origin',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_1_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);


 // created: 2013-04-26 16:50:10

 

$dictionary['Account']['fields']['lead_source'] = array(
    'name' => 'lead_source',
    'vname' => 'LBL_LEAD_SOURCE',
    'type' => 'enum',
    'options' => 'lead_source_dom',
    'len' => '255',
    'comment' => 'How did the contact come about',
    'popupHelp' => '',
);

$dictionary['Account']['fields']['member_type'] = array(
    'name' => 'member_type',
    'vname' => 'LBL_MEMBER_TYPE',
    'options' => 'osy_member_type_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['company_id_or_vat'] = array(
    'name' => 'company_id_or_vat',
    'vname' => 'LBL_COMPANY_ID_OR_VAT',
    'type' => 'varchar',
    'len' => '50',
    'required' => false,
    'massupdate' => 0,
);

$dictionary['Account']['fields']['other_company_number'] = array(
    'name' => 'other_company_number',
    'vname' => 'LBL_OTHER_COMPANY_NUMBER',
    'type' => 'varchar',
    'len' => '50',
    'required' => false,
    'massupdate' => 0,
);

$dictionary['Account']['fields']['other'] = array(
    'name' => 'other',
    'vname' => 'LBL_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
    'massupdate' => 0,
);

$dictionary['Account']['fields']['billing_address_other'] = array(
    'name' => 'billing_address_other',
    'vname' => 'LBL_BILLING_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
    'massupdate' => 0,
);

$dictionary['Account']['fields']['shipping_address_other'] = array(
    'name' => 'shipping_address_other',
    'vname' => 'LBL_SHIPPING_ADDRESS_OTHER',
    'type' => 'varchar',
    'len' => '255',
    'required' => false,
    'massupdate' => 0,
);

/*
$dictionary['Account']['fields']['industry'] = array (
		'name' => 'industry',
		'vname' => 'LBL_INDUSTRY',
		'options' => 'osy_industries_list',
		'type' => 'enum',
		'len' => '255',
		'required' => false,
);
*/

$dictionary['Account']['fields']['industry'] = array(
    'name' => 'industry',
    'vname' => 'LBL_INDUSTRY',
    'comment' => '',
    'required' => false,
    'type' => 'multienum',
    'massupdate' => 0,
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 300,
    'size' => '300',
    'options' => 'osy_industries_list',
    'studio' => 'visible',
    'isMultiSelect' => true,
    'massupdate' => true,
);

$dictionary['Account']['fields']['employees'] = array(
    'name' => 'employees',
    'vname' => 'LBL_EMPLOYEES',
    'options' => 'osy_nr_employees_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

/*
$dictionary['Account']['fields']['contract'] = array (
		'name' => 'contract',
		'vname' => 'LBL_CONTRACT',
		'options' => 'osy_contract_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false,
);
*/

$dictionary['Account']['fields']['ownership'] = array(
    'name' => 'ownership',
    'vname' => 'LBL_OWNERSHIP',
    'options' => 'osy_ownership_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['total_salary_wage_bill'] = array(
    'name' => 'total_salary_wage_bill',
    'vname' => 'LBL_TOTAL_SALARY_WAGE_BILL',
    'type' => 'varchar',
    'len' => '50',
    'required' => false,
    'popupHelp' => 'Total money paid by the company in salaries and wages',
    'massupdate' => 0,
);

$dictionary['Account']['fields']['nr_employees_at'] = array(
    'name' => 'nr_employees_at',
    'vname' => 'LBL_NR_EMPLOYEES_AT',
    'type' => 'varchar',
    'len' => '11',
    'required' => false,
    'massupdate' => 0,
);

$dictionary['Account']['fields']['date_employees_at'] = array(
    'name' => 'date_employees_at',
    'vname' => 'LBL_DATE_EMPLOYEES_AT',
    'type' => 'date',
    'required' => false,
);

/*
$dictionary['Account']['fields']['contract_at'] = array (
		'name' => 'contract_at',
		'vname' => 'LBL_CONTRACT_AT',
		'options' => 'osy_contract_list',
		'type' => 'enum',
		'len' => '50',
		'required' => false,
);
*/

$dictionary['Account']['fields']['association_member_type'] = array(
    'name' => 'association_member_type',
    'vname' => 'LBL_ASSOCIATION_MEMBER_TYPE',
    'options' => 'osy_association_member_type_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

/*
$dictionary['Account']['fields']['association_industry'] = array (
		'name' => 'association_industry',
		'vname' => 'LBL_INDUSTRY',
		'options' => 'osy_industries_list',
		'type' => 'enum',
		'len' => '255',
		'required' => false,
		'popupHelp' => '',
);
*/

$dictionary['Account']['fields']['territorial'] = array(
    'name' => 'territorial',
    'vname' => 'LBL_TERRITORIAL',
    'options' => 'osy_territorials_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['nr_company_members'] = array(
    'name' => 'nr_company_members',
    'vname' => 'LBL_NR_COMPANY_MEMBERS',
    'type' => 'varchar',
    'len' => '11',
    'required' => false,
    'massupdate' => 0,
);

/* membership status */

$dictionary['Account']['fields']['member_from'] = array(
    'name' => 'member_from',
    'vname' => 'LBL_MEMBER_FROM',
    'type' => 'date',
    'required' => false,
);

$dictionary['Account']['fields']['member_till'] = array(
    'name' => 'member_till',
    'vname' => 'LBL_MEMBER_TILL',
    'type' => 'date',
    'required' => false,
    'enable_range_search' => true,
    'options' => 'date_range_search_dom',
);

$dictionary['Account']['fields']['membership_status'] = array(
    'name' => 'membership_status',
    'vname' => 'LBL_MEMBERSHIP_STATUS',
    'options' => 'osy_membership_status_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['payment_status'] = array(
    'name' => 'payment_status',
    'source' => 'non-db',
    'vname' => 'LBL_PAYMENT_STATUS',
    'type' => 'varchar',
    'len' => '1',
    'required' => false,
    'massupdate' => false,
    'comment' => 'G=Green, Y=Yellow, R=Red'
);

$dictionary['Account']['fields']['levels'] = array(
    'name' => 'levels',
    'vname' => 'LBL_LEVELS',
    'options' => 'osy_levels_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['categories'] = array(
    'name' => 'categories',
    'vname' => 'LBL_CATEGORIES',
    'options' => 'osy_member_categories_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['annual_nr_rates'] = array(
    'name' => 'annual_nr_rates',
    'vname' => 'LBL_ANNUAL_NR_RATES',
    'type' => 'int',
    'len' => '11',
    'required' => false,
);

$dictionary['Account']['fields']['subscription_fees'] = array(
    'name' => 'subscription_fees',
    'vname' => 'LBL_SUBSCRIPTION_FEES',
    'type' => 'currency',
    'required' => false,
);

$dictionary['Account']['fields']['first_invoice_date'] = array(
    'name' => 'first_invoice_date',
    'vname' => 'LBL_FIRST_INVOICE_DATE',
    'type' => 'date',
    'required' => false,
);

$dictionary['Account']['fields']['last_invoice_date'] = array(
    'name' => 'last_invoice_date',
    'vname' => 'LBL_LAST_INVOICE_DATE',
    'type' => 'date',
    'required' => false,
);

$dictionary['Account']['fields']['subcategories'] = array(
    'name' => 'subcategories',
    'vname' => 'LBL_SUBCATEGORIES',
    'options' => 'accounts_subcategories_list',
    'osy_options' => 'osy_industries_list',
    'type' => 'multienum',
    'len' => 300,
    'size' => '300',
    'required' => false,
    'isMultiSelect' => true,
    'visibility_grid' => array(
        'trigger' => 'industry',
        'values' => array(
            'Agriculture, forestry and fishing' => array(
                'Crop and animal production, hunting and related service activities',
                'Forestry and logging',
                'Fishing and aquaculture'
            ),
            'Mining and quarrying' => array(
                'Mining of coal and lignite',
                'Extraction of crude petroleum and natural gas',
                'Mining of metal ores',
                'Other mining and quarrying',
                'Mining support service activities'
            ),
            'Manufacturing' => array(
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
	    'Electricity, gas, steam and air conditioning supply' => array(
		'Electricity, gas, steam and air conditioning supply',
	    ),
            'Water supply; sewerage, waste management and remediation activities' => array(
                'Water collection, treatment and supply',
                'Sewerage',
                'Waste collection, treatment and disposal activities; materials recovery',
                'Remediation activities and other waste management services'
            ),
            'Construction' => array(
                'Construction of buildings',
                'Civil engineering',
                'Specialized construction activities'
            ),
            'Wholesale and retail trade; repair of motor vehicles and motorcycles' => array(
                'Wholesale and retail trade and repair of motor vehicles and motorcycles',
                'Wholesale based on fees or contract',
                'Wholesale for agricultural raw materials and live animals',
                'Food, beverages and tobacco bulk',
                'Wholesale of textiles, clothing and shoes',
                'Other household goods wholesale',
                'Wholesale of computers and computer peripheral equipment and software',
                'Wholesale of electronic equipment, telecommunications spare parts',
                'Wholesale of agricultural machinery, equipment and supplies',
                'Wholesale of other machinery and equipment',
                'Wholesale of solid, liquid, gaseous fuels and related products',
                'Wholesale of metals and mineral ores',
                'Wholesale of building materials, plumbing, heating equipment and supplies',
                'Wholesale waste, scrap and other products',
                'Non-specialized wholesale trade',
                'Malls & Shopping Centers',
                'Retail Food',
                'Retail Beverage',
                'Tobacco Retail',
                'Retail Automotive Fuel',
                'Retail for computers, terminals, software and telecommunications equipment',
                'Retail for audio and video equipment',
                'Retail Textiles',
                'Retail metalware, paint and glass tools',
                'Fragmentation of carpets, rugs, wall and floor coverings',
                'retail for household electrical appliances, furniture, lighting equipment and Other household items',
                'Retail for books, newspapers and stationery',
                'Retail for music and video recordings',
                'Retail Sports Equipment',
                'Retail for toys and toys',
                'Retail for clothing, footwear and leather items',
                'Retail for pharmaceuticals, medical, cosmetics and toilet tools',
                'Other retail of new goods',
                'Retail for second-hand goods'
            ),
            'Transportation and storage' => array(
                'Rail transport',
                'Road transport of passengers in cities and suburbs',
                'Road freight transport',
                'Land transport and transport via pipelines',
                'Maritime and coastal passenger transport',
                'Sea and coastal freight forwarding of goods',
                'Passenger Inland Water Transport',
                'Water transport',
                'Air passenger transport',
                'Air transport',
                'Storage & Warehouses',
                'TIR-related service activities',
                'Activities of services related to water transport',
                'Air transport related service activities',
                'Cargo Handling',
                'Warehousing and support activities for transportation',
                'Postal activities',
                'Postal and courier activities'
            ),
            'Accommodation and food service activities' => array(
		'Short-term shelter activities',
                'Camping & Parks',
                'Accommodation',
                'Restaurants and mobile food service activities',
                'Catering at events',
                'Food and beverage service activities',
                'Beverage Serving Activities'
            ),

            'Information and communication' => array(
		'Publishing books, periodicals and other publishing activities',
                'Publishing activities',
                'Motion picture, video and television programme production, sound recording and music publishing activities',
                'Audio and music publishing activities',
                'Audio broadcasting',
		'Programming and broadcasting activities',
                'Telecommunications',
                'Computer programming, consultancy and related activities',
                'Information service activities',
            ),
	     'Real estate activities' => array(
		'Real Estate activities',
 	    ),
 	     'Professional, scientific and technical activities' => array(
		'Financial and insurance activities',
                'Financial service activities, except insurance and pension funding',
                'Insurance, reinsurance and pension funding, except compulsory social security',
                'Pension',
                'Activities auxiliary to financial service and insurance activities'
	    ),
            'Legal and accounting activities' => array(
		'Legal and accounting activities',
                'Activities of head offices; management consultancy activities',
                'Architectural and engineering activities; technical testing and analysis',
                'Scientific research and development',
                'Advertising and market research',
                'Other professional, scientific and technical activities',
                'Veterinary activities'
            ),
            'Administrative and support service activities' => array(
                'Rental and leasing activities',
                'Employment activities',
                'Public service activities',
                'Travel agency, tour operator, reservation service and related activities',
                'Security and investigation activities',
                'Services to buildings and landscape activities',
                'Office administrative, office support and other business support activities'
            ),
	   'Public administration and defence; compulsory social security' => array(
		'State administration and economic and social policy of society',
                'Providing services to the community as a whole',
		'Compulsory social security activities',
	    ),
 	    'Education' => array(
		'Pre-primary and primary education',
                'secondary education',
                'Higher Education',
                'Other education',
                'Educational support activities'
	    ),
            'Human health and social work activities' => array(
		'Hospital Activities',
                'Dental practice activities',
                'Human health activities',
		'Nursing Care Facilities',
                'Care activities for mental retardation, mental health and substance abuse',
                'Care activities for the elderly and disabled',
                'Residential care activities',
                'Social work activities without accommodation',
		'Other social work activities without residency'
            ),
            'Arts, entertainment and recreation' => array(
                'Creative, arts and entertainment activities',
                'Library and archives activities',
                'Libraries, archives, museums and other cultural activities',
                'Activities of botanical and animal gardens and nature reserves',
                'Gambling and betting activities',
                'Sports activities and amusement and recreation activities',
                'Other leisure and entertainment activities'
            ),
            'Other service activities' => array(
                'Activities of membership organizations',
                'Repair of computers and personal and household goods',
                'Other personal service activities'
            ),
            'Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use' => array(
                'Activities of households as employers of domestic personnel',
                'Undifferentiated goods- and services-producing activities of private households for own use'
            ),
	    'Activities of extraterritorial organizations and bodies' => array(
		'Activities of extraterritorial organizations and bodies',
		'Undefined'
	    ),
        ),
    ),
);

$dictionary['Account']['fields']['five_main_operating_markets'] = array(
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
    'popupHelp' => 'To select multiple items, press CTRL',
);

$dictionary['Account']['fields']['target_exporting_markets'] = array(
    'name' => 'target_exporting_markets',
    'vname' => 'LBL_TARGET_EXPORTING_MARKETS',
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
    'popupHelp' => 'To select multiple items, press CTRL',
);

$dictionary['Account']['fields']['type_of_business'] = array(
    'name' => 'type_of_business',
    'vname' => 'LBL_TYPE_OF_BUSINESS',
    'options' => 'accounts_type_of_business_list',
    'type' => 'enum',
    'len' => '50',
    'required' => false,
);

$dictionary['Account']['fields']['products_and_services'] = array(
    'name' => 'products_and_services',
    'vname' => 'LBL_PRODUCTS_AND_SERVICES',
    'type' => 'text',
    'required' => false,
    'massupdate' => '0',
    'default' => '',
    'comments' => '',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'size' => '20',
    'studio' => 'visible',
    'rows' => '4',
    'cols' => '20',
);

$dictionary['Account']['fields']['nr_directors'] = array(
    'name' => 'nr_directors',
    'vname' => 'LBL_NR_DIRECTORS',
    'type' => 'int',
    'len' => '11',
    'required' => false,
);
$dictionary['Account']['fields']['nr_permanent'] = array(
    'name' => 'nr_permanent',
    'vname' => 'LBL_NR_PERMANENT',
    'type' => 'int',
    'len' => '11',
    'required' => false,
);
$dictionary['Account']['fields']['nr_casual'] = array(
    'name' => 'nr_casual',
    'vname' => 'LBL_NR_CASUAL',
    'type' => 'int',
    'len' => '11',
    'required' => false,
);
$dictionary['Account']['fields']['nr_seasonal'] = array(
    'name' => 'nr_seasonal',
    'vname' => 'LBL_NR_SEASONAL',
    'type' => 'int',
    'len' => '11',
    'required' => false,
);
$dictionary['Account']['fields']['shipping_address_pobox_c'] = array(
//il campo si chiama "shipping_..._c" per coerenza con il campo relativo "billing_..._c" creato da studio
    'required' => false,
    'name' => 'shipping_address_pobox_c',
    'vname' => 'LBL_SHIPPING_ADDRESS_POBOX',
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
    'size' => '20',
);
$dictionary['Account']['fields']['shipping_address_region_c'] = array(
//il campo si chiama "shipping_..._c" per coerenza con il campo relativo "billing_..._c" creato da studio
    'required' => false,
    'name' => 'shipping_address_region_c',
    'vname' => 'LBL_SHIPPING_ADDRESS_REGION',
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
    'size' => '20',
);

//relazione con modulo osy_services_companies (1-n)
//************************************************************
//link
$dictionary['Account']['fields']['osy_services_companies'] = array(
    'name' => 'osy_services_companies',
    'type' => 'link',
    'relationship' => 'accounts_osy_services_companies',
    'module' => 'osy_services_companies',
    'bean_name' => 'osy_services_companies',
    'source' => 'non-db',
    'vname' => 'LBL_OSY_SERVICES_COMPANIES',
);

//relationship
$dictionary["Account"]["relationships"]["accounts_osy_services_companies"] = array(
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'osy_services_companies',
    'rhs_table' => 'osy_services_companies',
    'rhs_key' => 'osy_account_id',
    'relationship_type' => 'one-to-many',
);
//************************************************************


//link
$dictionary["Account"]["fields"]["tasks"] = array(
    'name' => 'tasks',
    'type' => 'link',
    'relationship' => 'accounts_tasks',
    'source' => 'non-db',
    'vname' => 'LBL_TASKS',
);

//link
$dictionary["Account"]["fields"]["meetings"] = array(
    'name' => 'meetings',
    'type' => 'link',
    'relationship' => 'accounts_meetings',
    'source' => 'non-db',
    'vname' => 'LBL_ACCOUNTS',
);

//link
$dictionary["Account"]["fields"]["calls"] = array(
    'name' => 'calls',
    'type' => 'link',
    'relationship' => 'accounts_calls',
    'source' => 'non-db',
    'vname' => 'LBL_ACCOUNTS',
);

//link
$dictionary["Account"]["fields"]["notes"] = array(
    'name' => 'notes',
    'type' => 'link',
    'relationship' => 'accounts_notes',
    'source' => 'non-db',
    'vname' => 'LBL_NOTES',
);


//Per Subpanel History for potential member
//link
$dictionary["Account"]["fields"]["tasks_for_leads"] = array(
    'name' => 'tasks_for_leads',
    'type' => 'link',
    'relationship' => 'accounts_tasks_for_leads',
    'source' => 'non-db',
    'vname' => 'LBL_TASKS_FOR_LEADS',
);

//link
$dictionary["Account"]["fields"]["meetings_for_leads"] = array(
    'name' => 'meetings_for_leads',
    'type' => 'link',
    'relationship' => 'accounts_meetings_for_leads',
    'source' => 'non-db',
    'vname' => 'LBL_MEETINGS_FOR_LEADS',
);

//link
$dictionary["Account"]["fields"]["calls_for_leads"] = array(
    'name' => 'calls_for_leads',
    'type' => 'link',
    'relationship' => 'accounts_calls_for_leads',
    'source' => 'non-db',
    'vname' => 'LBL_MEETINGS_FOR_LEADS',
);

//link
$dictionary["Account"]["fields"]["notes_for_leads"] = array(
    'name' => 'notes_for_leads',
    'type' => 'link',
    'relationship' => 'accounts_notes_for_leads',
    'source' => 'non-db',
    'vname' => 'LBL_NOTES_FOR_LEADS',
);

$dictionary ['Account'] ['fields'] ['prospect_list_link'] = array(
    'name' => 'prospect_list_link',
    'type' => 'link',
    'relationship' => 'prospectlist_osy_gestione_pagamento',
    'module' => 'ProspectLists',
    'source' => 'non-db',
    'vname' => 'LBL_PROSPECT_LIST_LINK'
);

// OPENSYMBOLMOD - START - davide.dallapozza - 25/feb/2014
// *************************************************

$dictionary['Account']['fields']['committees'] = array(
    'name' => 'committees',
    'vname' => 'LBL_COMMITTEES',
    'comment' => '',
    'required' => false,
    'type' => 'multienum',
    'massupdate' => 0,
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'len' => 300,
    'size' => '300',
    'options' => 'osy_committees',
    'studio' => 'visible',
    'isMultiSelect' => true,
);

// OPENSYMBOLMOD - END - davide.dallapozza
// *************************************************


// OPENSYMBOLMOD - 2016-04-27 Alberto Guiotto (ref ITCILOSUIT-1) - Aggiunto campo incrementale Account_code, da utilizzare nel modulo WebToContacts come id semplice dell'azienda
$dictionary["Account"]["fields"]["osy_account_code"] = array(
    'required' => true,
    'name' => 'osy_account_code',
    'vname' => 'LBL_OSY_ACCOUNT_CODE',
    'type' => 'int',
    'massupdate' => 0,
    'comments' => '',
    'help' => '',
    'importable' => 'true',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'calculated' => false,
//    'auto_increment' => true,
);

$dictionary["Account"]["indices"]["osy_account_code"] = array(
    'name' => 'osy_account_code',
    'type' => 'index',
    'fields' => array(
        'osy_account_code'
    ),
);
// OPENSYMBOLMOD End


$dictionary['Account']['indices'][] = array(
    'name' => 'idx_accnt_membership_membertill_del',
    'type' => 'index',
    'fields' => array(
        0 => 'membership_status',
        1 => 'member_till',
        2 => 'deleted',
    )
);


$dictionary['Account']['fields']['billing_address_street']['massupdate'] = 0;
$dictionary['Account']['fields']['assigned_user_name']['massupdate'] = 0;
$dictionary['Account']['fields']['assigned_user_id']['massupdate'] = 0;
$dictionary['Account']['fields']['annual_revenue']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_street_2']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_street_3']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_street_4']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_city']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_state']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_postalcode']['massupdate'] = 0;
$dictionary['Account']['fields']['billing_address_country']['massupdate'] = 0;
$dictionary['Account']['fields']['rating']['massupdate'] = 0;
$dictionary['Account']['fields']['ticker_symbol']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_street']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_street_2']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_street_3']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_street_4']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_city']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_state']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_postalcode']['massupdate'] = 0;
$dictionary['Account']['fields']['shipping_address_country']['massupdate'] = 0;
$dictionary['Account']['fields']['email1']['massupdate'] = 0;
$dictionary['Account']['fields']['sic_code']['massupdate'] = 0;

$dictionary['Account']['fields']['campaign_id']['importable'] = false;
$dictionary['Account']['fields']['campaign_name']['importable'] = false;
$dictionary['Account']['fields']['created_by']['importable'] = false;
$dictionary['Account']['fields']['date_entered']['importable'] = false;
$dictionary['Account']['fields']['date_modified']['importable'] = false;
$dictionary['Account']['fields']['deleted']['importable'] = false;
$dictionary['Account']['fields']['email_opt_out']['importable'] = false;
$dictionary['Account']['fields']['first_invoice_date']['importable'] = false;
$dictionary['Account']['fields']['invalid_email']['importable'] = false;
$dictionary['Account']['fields']['last_invoice_date']['importable'] = false;
$dictionary['Account']['fields']['modified_by_name']['importable'] = false;
$dictionary['Account']['fields']['modified_user_id']['importable'] = false;
$dictionary['Account']['fields']['nr_casual']['importable'] = false;
$dictionary['Account']['fields']['nr_directors']['importable'] = false;
$dictionary['Account']['fields']['nr_seasonal']['importable'] = false;
$dictionary['Account']['fields']['annual_nr_rates']['importable'] = false;
$dictionary['Account']['fields']['rating']['importable'] = false;
$dictionary['Account']['fields']['sic_code']['importable'] = false;
$dictionary['Account']['fields']['ticker_symbol']['importable'] = false;
$dictionary['Account']['fields']['account_type']['importable'] = false;


//relazione n-n con FP_events
$dictionary["Account"]["fields"]["fp_events"] = array(
    'name' => 'fp_events',
    'type' => 'link',
    'relationship' => 'fp_events_accounts',
    'source' => 'non-db',
    'vname' => 'LBL_FP_EVENTS_TITLE',
);

$dictionary["Account"]["fields"]["e_invite_status_fields"] =
    array(
        'name' => 'e_invite_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'event_invite_id',
                'invite_status' => 'event_status_name',
            ),
        'vname' => 'LBL_CONT_INVITE_STATUS',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary["Account"]["fields"]["event_status_name"] =
    array(
        'massupdate' => false,
        'name' => 'event_status_name',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS_EVENT',
        'options' => 'fp_event_invite_status_dom',
        'importable' => 'false',
    );
$dictionary["Account"]["fields"]["event_invite_id"] =
    array(
        'name' => 'event_invite_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_INVITE_STATUS',
        'studio' =>
            array(
                'listview' => false,
            ),
    );
$dictionary["Account"]["fields"]["e_accept_status_fields"] =
    array(
        'name' => 'e_accept_status_fields',
        'rname' => 'id',
        'relationship_fields' =>
            array(
                'id' => 'event_status_id',
                'accept_status' => 'event_accept_status',
            ),
        'vname' => 'LBL_CONT_ACCEPT_STATUS',
        'type' => 'relate',
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary["Account"]["fields"]["event_accept_status"] =
    array(
        'massupdate' => false,
        'name' => 'event_accept_status',
        'type' => 'enum',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS_EVENT',
        'options' => 'fp_event_status_dom',
        'importable' => 'false',
    );
$dictionary["Account"]["fields"]["event_status_id"] =
    array(
        'name' => 'event_status_id',
        'type' => 'varchar',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_ACCEPT_STATUS',
        'studio' =>
            array(
                'listview' => false,
            ),
    );

//payment_status
//**************************************
$dictionary['Account']['fields']['payment_status_fields'] =
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
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Account']['fields']['osy_payment_status'] =
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
$dictionary['Account']['fields']['payment_status_id'] =
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
//**************************************

//cost
//**************************************
$dictionary['Account']['fields']['cost_fields'] =
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
        'link' => 'fp_events',
        'link_type' => 'relationship_info',
        'join_link_name' => 'fp_events',
        'source' => 'non-db',
        'importable' => 'false',
        'duplicate_merge' => 'disabled',
        'studio' => false,
    );
$dictionary['Account']['fields']['osy_cost'] =
    array (
        'massupdate' => false,
        'name' => 'osy_cost',
        'type' => 'varchar',
        'studio' => 'false',
        'source' => 'non-db',
        'vname' => 'LBL_LIST_COST',
    );
$dictionary['Account']['fields']['cost_id'] =
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

$dictionary["Account"]["relationships"]['campaignlog_account'] = array (
    'lhs_module'=> 'CampaignLog',
    'lhs_table'=> 'campaign_log',
    'lhs_key' => 'related_id',
    'rhs_module'=> 'Accounts',
    'rhs_table'=> 'accounts',
    'rhs_key' => 'id',
    'relationship_type'=>'one-to-many',
);

$dictionary["Account"]["fields"]['campaign_log'] = array (
    'name' => 'campaign_log',
    'type' => 'link',
    'relationship' => 'campaignlog_account',
    'module' => 'CampaignLog',
    'bean_name' => 'CampaignLog',
    'source' => 'non-db',
    'vname' => 'LBL_CAMPAIGN_LOG',
);
$dictionary["Account"]["fields"]['panel_name'] = array (
    'name' => 'panel_name',
    'type' => 'enum',
    'options' => 'delegate_types_list',
    'source' => 'non-db',
    'vname' => 'LBL_PANEL_NAME',
);

$dictionary['Account']['fields']['parent_name']['mandatory'] = 'ifElse(eq($member_type,"Indirect Member"),true,false)';
$dictionary['Account']['fields']['parent_name']['dependency'] = 'ifElse(eq($member_type,"Indirect Member"),true,false)';
$dictionary['Account']['fields']['association_member_type']['dependency'] = 'ifElse(eq($member_type,"Association"),true,false)';
$dictionary['Account']['fields']['five_main_operating_markets']['dependency'] = 'ifElse(eq($member_type,"Association"),false,true)';
$dictionary['Account']['fields']['target_exporting_markets']['dependency'] = 'ifElse(eq($member_type,"Association"),false,true)';
$dictionary['Account']['fields']['ownership']['dependency'] = 'ifElse(eq($member_type,"Association"),false,true)';
$dictionary['Account']['fields']['total_salary_wage_bill']['dependency'] = 'ifElse(eq($member_type,"Association"),false,true)';

$dictionary['Account']['fields']['osy_form_html_date_modified_c'] = array (
    'name' => 'osy_form_html_date_modified_c',
    'label' => 'LBL_OSY_FORM_HTML_DATE_MODIFIED',
    'default_value' => '',
    'default' => '',
    'display_default' => NULL,
    'len' => '',
    'required' => false,
    'type' => 'datetimecombo',
    'audited' => 0,
    'inline_edit' => '1',
    'massupdate' => 0,
    'options' => 'date_range_search_dom',
    'help' => '',
    'comments' => '',
    'importable' => 'true',
    'duplicate_merge' => '0',
    'duplicate_merge_dom_value' => NULL,
    'merge_filter' => NULL,
    'reportable' => true,
    'ext2' => '',
    'ext4' => '',
    'ext3' => '',
    'labelValue' => 'Date form update',
    'unified_search' => 0,
    'full_text_search' => NULL,
    'enable_range_search' => '1',
    'vname' => 'LBL_OSY_FORM_HTML_DATE_MODIFIED',
    'dependency' => '',
);

$dictionary['Account']['fields']['total_balance'] = array(
    'name' => 'total_balance',
    'vname' => 'LBL_TOTAL_BALANCE',
    'type' => 'currency',
    'required' => false,
);

$dictionary['Account']['fields']['mark_as_closed'] = array(
    'name' => 'mark_as_closed',
    'vname' => 'LBL_MARK_AS_CLOSED',
    'type' => 'bool',
    'default' => '0',
    'reportable' => false,
);


// created: 2023-09-16 15:44:05
$dictionary["Account"]["fields"]["accounts_guar_guarantees_1"] = array (
  'name' => 'accounts_guar_guarantees_1',
  'type' => 'link',
  'relationship' => 'accounts_guar_guarantees_1',
  'source' => 'non-db',
  'module' => 'guar_guarantees',
  'bean_name' => 'guar_guarantees',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_GUAR_GUARANTEES_1_FROM_GUAR_GUARANTEES_TITLE',
);


// created: 2023-09-27 10:12:21
$dictionary["Account"]["fields"]["accounts_ad001_certificate_of_origin_2"] = array (
  'name' => 'accounts_ad001_certificate_of_origin_2',
  'type' => 'link',
  'relationship' => 'accounts_ad001_certificate_of_origin_2',
  'source' => 'non-db',
  'module' => 'ad001_Certificate_of_Origin',
  'bean_name' => 'ad001_Certificate_of_Origin',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_AD001_CERTIFICATE_OF_ORIGIN_2_FROM_AD001_CERTIFICATE_OF_ORIGIN_TITLE',
);


 // created: 2013-04-18 14:58:49

 

 // created: 2019-09-06 10:32:30
$dictionary['Account']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2013-03-13 14:54:13
$dictionary['Account']['fields']['five_main_operating_markets']['default']='^^';
$dictionary['Account']['fields']['five_main_operating_markets']['merge_filter']='disabled';

 

 // created: 2013-04-16 16:47:24

 

 // created: 2013-04-18 14:59:16

 

 // created: 2013-04-26 16:57:37
$dictionary['Account']['fields']['other_company_number']['merge_filter']='disabled';
$dictionary['Account']['fields']['other_company_number']['massupdate']= 0;

 

 // created: 2013-04-26 16:58:05
$dictionary['Account']['fields']['short_company_name_c']['popupHelp'] = 'Use this field to write a shorter name for your member. It will be easier to search for it';
 

 // created: 2013-03-27 08:34:04
 /*
$dictionary['Account']['fields']['association_industry']['len']=100;
$dictionary['Account']['fields']['association_industry']['merge_filter']='disabled';
*/
 

 // created: 2023-09-22 17:19:01
$dictionary['Account']['fields']['billing_address_postalcode']['inline_edit']=true;
$dictionary['Account']['fields']['billing_address_postalcode']['comments']='The postal code used for billing address';
$dictionary['Account']['fields']['billing_address_postalcode']['merge_filter']='disabled';

 

 // created: 2023-08-02 13:38:00
$dictionary['Account']['fields']['delegate_c']['inline_edit']='1';
$dictionary['Account']['fields']['delegate_c']['labelValue']='Delegate';

 

 // created: 2023-07-17 21:38:15
$dictionary['Account']['fields']['facility_name_c']['inline_edit']='1';
$dictionary['Account']['fields']['facility_name_c']['labelValue']='Facility Name';

 

 // created: 2023-07-17 15:53:42
$dictionary['Account']['fields']['target_exporting_markets']['default']='^^';
$dictionary['Account']['fields']['target_exporting_markets']['inline_edit']=true;
$dictionary['Account']['fields']['target_exporting_markets']['merge_filter']='disabled';

 

 // created: 2023-08-16 11:09:08
$dictionary['Account']['fields']['type_activity_c']['inline_edit']='1';
$dictionary['Account']['fields']['type_activity_c']['labelValue']='Type Activity';

 

 // created: 2023-08-16 10:12:18
$dictionary['Account']['fields']['id_card_number_c']['inline_edit']='1';
$dictionary['Account']['fields']['id_card_number_c']['labelValue']='ID Card Number';

 

 // created: 2023-07-17 22:20:09
$dictionary['Account']['fields']['directorate_c']['inline_edit']='1';
$dictionary['Account']['fields']['directorate_c']['labelValue']='Directorate';

 

 // created: 2023-07-17 21:21:59
$dictionary['Account']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 

 // created: 2023-08-30 15:01:26
$dictionary['Account']['fields']['phone_mobile_c']['inline_edit']='1';
$dictionary['Account']['fields']['phone_mobile_c']['labelValue']='Phone Mobile';

 

 // created: 2023-08-16 11:03:08
$dictionary['Account']['fields']['front_address_c']['inline_edit']='1';
$dictionary['Account']['fields']['front_address_c']['labelValue']='Front Address';

 

 // created: 2023-07-26 14:54:13
$dictionary['Account']['fields']['id_card_passport_c']['inline_edit']='1';
$dictionary['Account']['fields']['id_card_passport_c']['labelValue']=' ID Card / Passport';

 

 // created: 2023-09-27 15:38:41
$dictionary['Account']['fields']['no_guarantees_allowed_c']['inline_edit']='1';
$dictionary['Account']['fields']['no_guarantees_allowed_c']['labelValue']='عدد الضمانات المسموحة في الشهر';

 

 // created: 2023-08-30 17:37:01
$dictionary['Account']['fields']['commercial_registration_no_c']['inline_edit']='1';
$dictionary['Account']['fields']['commercial_registration_no_c']['labelValue']='Commercial Registration No';

 

 // created: 2023-08-16 09:41:47
$dictionary['Account']['fields']['gender_c']['inline_edit']='1';
$dictionary['Account']['fields']['gender_c']['labelValue']='Gender';

 

 // created: 2023-08-16 09:48:49
$dictionary['Account']['fields']['role_function_c']['inline_edit']='1';
$dictionary['Account']['fields']['role_function_c']['labelValue']='Role Function';

 

 // created: 2023-08-16 10:16:34
$dictionary['Account']['fields']['english_name_c']['inline_edit']='1';
$dictionary['Account']['fields']['english_name_c']['labelValue']='English Name';

 

 // created: 2023-07-17 21:21:59
$dictionary['Account']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2023-08-16 09:54:49
$dictionary['Account']['fields']['finders_name_c']['inline_edit']='1';
$dictionary['Account']['fields']['finders_name_c']['labelValue']='Finders Name';

 

 // created: 2023-07-19 15:02:35
$dictionary['Account']['fields']['membership_number_c']['inline_edit']='1';
$dictionary['Account']['fields']['membership_number_c']['labelValue']='Membership Number';

 

 // created: 2023-08-16 10:58:54
$dictionary['Account']['fields']['front_address_city_c']['inline_edit']=1;

 

 // created: 2023-09-22 17:25:57
$dictionary['Account']['fields']['billing_address_state']['inline_edit']=true;
$dictionary['Account']['fields']['billing_address_state']['comments']='The state used for billing address';
$dictionary['Account']['fields']['billing_address_state']['merge_filter']='disabled';

 

 // created: 2023-07-17 21:22:00
$dictionary['Account']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:22:00
$dictionary['Account']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2023-07-17 21:50:53
$dictionary['Account']['fields']['short_company_name_c']['inline_edit']='1';
$dictionary['Account']['fields']['short_company_name_c']['labelValue']='Short Company Name';

 

 // created: 2023-08-16 09:40:59
$dictionary['Account']['fields']['commercial_name_arabic_c']['inline_edit']='1';
$dictionary['Account']['fields']['commercial_name_arabic_c']['labelValue']='Commercial Name Arabic';

 

 // created: 2023-08-02 13:50:58
$dictionary['Account']['fields']['signature_matches_c']['inline_edit']='1';
$dictionary['Account']['fields']['signature_matches_c']['labelValue']='signature matches';

 

 // created: 2023-08-01 19:08:34
$dictionary['Account']['fields']['copy_commercial_register_c']['inline_edit']='1';
$dictionary['Account']['fields']['copy_commercial_register_c']['labelValue']='A copy of the commercial registration';

 

 // created: 2023-08-12 12:57:53
$dictionary['Account']['fields']['lease_ownership_contract_c']['inline_edit']='1';
$dictionary['Account']['fields']['lease_ownership_contract_c']['labelValue']='عقد إيجار / ملكية';

 

 // created: 2023-08-16 10:17:28
$dictionary['Account']['fields']['issue_authority_c']['inline_edit']='1';
$dictionary['Account']['fields']['issue_authority_c']['labelValue']='Issue Authority ID Card';

 

 // created: 2023-08-16 09:51:38
$dictionary['Account']['fields']['female_foreign_worker_c']['inline_edit']='1';
$dictionary['Account']['fields']['female_foreign_worker_c']['labelValue']='Female Foreign Worker';

 

 // created: 2023-09-03 09:21:22
$dictionary['Account']['fields']['member_number_system_c']['inline_edit']='1';
$dictionary['Account']['fields']['member_number_system_c']['labelValue']='Member number in the system';

 

 // created: 2023-09-29 16:22:32
$dictionary['Account']['fields']['test_c']['inline_edit']='1';
$dictionary['Account']['fields']['test_c']['labelValue']='test';

 

 // created: 2023-08-16 09:54:05
$dictionary['Account']['fields']['was_detected_c']['inline_edit']='1';
$dictionary['Account']['fields']['was_detected_c']['labelValue']='Was Detected';

 

 // created: 2023-07-30 20:54:58
$dictionary['Account']['fields']['industry_description_c']['inline_edit']='1';
$dictionary['Account']['fields']['industry_description_c']['labelValue']='Industry Description:';

 

 // created: 2023-07-26 14:31:31
$dictionary['Account']['fields']['nr_female_employees_c']['inline_edit']='1';
$dictionary['Account']['fields']['nr_female_employees_c']['labelValue']='Nr. of Female Employees:';

 

 // created: 2023-08-16 09:50:24
$dictionary['Account']['fields']['male_foreign_worker_c']['inline_edit']='1';
$dictionary['Account']['fields']['male_foreign_worker_c']['labelValue']='Male Foreign Worker';

 

 // created: 2023-08-16 10:58:54
$dictionary['Account']['fields']['front_address_country_c']['inline_edit']=1;

 

 // created: 2023-07-26 14:14:14
$dictionary['Account']['fields']['member_photo_c']['inline_edit']='1';
$dictionary['Account']['fields']['member_photo_c']['labelValue']='Member Photo';

 

 // created: 2023-08-02 22:49:31
$dictionary['Account']['fields']['subcategories']['inline_edit']=true;
$dictionary['Account']['fields']['subcategories']['merge_filter']='disabled';

 

 // created: 2023-08-16 10:58:54
$dictionary['Account']['fields']['front_address_state_c']['inline_edit']=1;

 

 // created: 2023-08-02 13:56:51
$dictionary['Account']['fields']['capital_c']['inline_edit']='1';
$dictionary['Account']['fields']['capital_c']['labelValue']='capital';

 

 // created: 2023-08-02 19:42:31
$dictionary['Account']['fields']['member_from']['display_default']='now';
$dictionary['Account']['fields']['member_from']['inline_edit']=true;
$dictionary['Account']['fields']['member_from']['merge_filter']='disabled';
$dictionary['Account']['fields']['member_from']['enable_range_search']=false;

 

 // created: 2023-08-01 19:44:27
$dictionary['Account']['fields']['work_field_c']['inline_edit']='1';
$dictionary['Account']['fields']['work_field_c']['labelValue']='Work Field';

 

 // created: 2023-08-16 09:40:13
$dictionary['Account']['fields']['commercial_name_english_c']['inline_edit']='1';
$dictionary['Account']['fields']['commercial_name_english_c']['labelValue']='Commercial Name English';

 

 // created: 2023-07-26 14:30:17
$dictionary['Account']['fields']['nr_male_employees_c']['inline_edit']='1';
$dictionary['Account']['fields']['nr_male_employees_c']['labelValue']='Nr. of Male Employees:';

 

 // created: 2023-08-16 11:03:33
$dictionary['Account']['fields']['beside_address_c']['inline_edit']='1';
$dictionary['Account']['fields']['beside_address_c']['labelValue']='Beside Address';

 

 // created: 2023-08-02 13:39:37
$dictionary['Account']['fields']['registration_validity_c']['inline_edit']='1';
$dictionary['Account']['fields']['registration_validity_c']['labelValue']='Registration Validity';

 

 // created: 2023-08-16 10:05:07
$dictionary['Account']['fields']['release_side_c']['inline_edit']='1';
$dictionary['Account']['fields']['release_side_c']['labelValue']='Release Side';

 

 // created: 2023-08-02 13:56:51
$dictionary['Account']['fields']['currency_id']['inline_edit']=1;

 

 // created: 2023-07-26 14:34:34
$dictionary['Account']['fields']['other_information_about_staf_c']['inline_edit']='1';
$dictionary['Account']['fields']['other_information_about_staf_c']['labelValue']='Other information about staff (Disabilities, expats, etc.):';

 

 // created: 2023-08-16 10:15:59
$dictionary['Account']['fields']['issue_date_id_card_c']['inline_edit']='1';
$dictionary['Account']['fields']['issue_date_id_card_c']['labelValue']='Issue Date Id Card';

 

 // created: 2023-08-02 08:45:24
$dictionary['Account']['fields']['signature_c']['inline_edit']='1';
$dictionary['Account']['fields']['signature_c']['labelValue']='signature';

 

 // created: 2023-07-26 14:57:54
$dictionary['Account']['fields']['id_card_c']['inline_edit']='1';
$dictionary['Account']['fields']['id_card_c']['labelValue']='ID Card';

 

 // created: 2023-08-01 19:25:34
$dictionary['Account']['fields']['date_issuance_register_c']['inline_edit']='1';
$dictionary['Account']['fields']['date_issuance_register_c']['labelValue']='Date of issuance of the commercial registration';

 

 // created: 2023-08-01 19:28:05
$dictionary['Account']['fields']['registration_expiry_date_c']['inline_edit']='1';
$dictionary['Account']['fields']['registration_expiry_date_c']['labelValue']='Commercial Registration Expiry Date';

 

 // created: 2023-09-10 15:05:40
$dictionary['Account']['fields']['subscription_type_c']['inline_edit']='1';
$dictionary['Account']['fields']['subscription_type_c']['labelValue']='Subscription Type';

 

 // created: 2023-08-16 10:58:54
$dictionary['Account']['fields']['front_address_postalcode_c']['inline_edit']=1;

 
?>