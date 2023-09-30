<?php
/*********************************************************************************
 * SugarCRM Community Edition is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2013 SugarCRM Inc.

 * SuiteCRM is an extension to SugarCRM Community Edition developed by Salesagility Ltd.
 * Copyright (C) 2011 - 2014 Salesagility Ltd.
 *
 * This program is free software; you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License version 3 as published by the
 * Free Software Foundation with the addition of the following permission added
 * to Section 15 as permitted in Section 7(a): FOR ANY PART OF THE COVERED WORK
 * IN WHICH THE COPYRIGHT IS OWNED BY SUGARCRM, SUGARCRM DISCLAIMS THE WARRANTY
 * OF NON INFRINGEMENT OF THIRD PARTY RIGHTS.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Affero General Public License for more
 * details.
 *
 * You should have received a copy of the GNU Affero General Public License along with
 * this program; if not, see http://www.gnu.org/licenses or write to the Free
 * Software Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA
 * 02110-1301 USA.
 *
 * You can contact SugarCRM, Inc. headquarters at 10050 North Wolfe Road,
 * SW2-130, Cupertino, CA 95014, USA. or at email address contact@sugarcrm.com.
 *
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 *
 * In accordance with Section 7(b) of the GNU Affero General Public License version 3,
 * these Appropriate Legal Notices must retain the display of the "Powered by
 * SugarCRM" logo and "Supercharged by SuiteCRM" logo. If the display of the logos is not
 * reasonably feasible for  technical reasons, the Appropriate Legal Notices must
 * display the words  "Powered by SugarCRM" and "Supercharged by SuiteCRM".
 ********************************************************************************/

$app_list_strings['moduleList']['ProspectLists'] = 'Lists';
$app_list_strings['moduleList']['Accounts'] = 'Members';
$app_list_strings['moduleList']['Opportunities'] = 'Subscription Fees';
$app_list_strings['moduleList']['Leads'] = 'Potential Members';
$app_list_strings['moduleList']['Campaigns'] = 'Collective mail system';


$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL'] = 'Add To List';
$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE'] = 'Add To List';

//custom/modules/Activities/views/view.popup.php
$app_strings['DATA_TYPE_END'] = 'End:'; 
$app_strings['DATA_TYPE_ENTERED'] = 'Created:'; 

$app_strings['LBL_CREATE_CAMPAIGNS'] = 'Send Email';
$app_strings['LBL_NAME_CAMPAIGNS'] = 'Subject-type of service';

$app_strings['LBL_STAMPA_FATTURA'] = 'Print Invoice';


/* members dropdown */

$GLOBALS['app_list_strings']['osy_member_type_list']=array (
		'Direct Company' => 'Direct Company',
		'Association' => 'Association',
		'Indirect Member' => 'Indirect Member',
);

$GLOBALS['app_list_strings']['osy_industries_list']=array (
		'' => '',
		'Agriculture, Hunting, Forestry and Fishing' => 'Agriculture, Hunting, Forestry and Fishing',		
		'Mining and Quarrying' => 'Mining and Quarrying',
		'Manufacturing' => 'Manufacturing',
		'Electricity, Gas and Water' => 'Electricity, Gas and Water',	
		'Construction' => 'Construction',	
		'Wholesale and Retail Trade and Restaurants and Hotels' => 'Wholesale and Retail Trade and Restaurants and Hotels',
		'Transport, Storage and Communication' => 'Transport, Storage and Communication',	
		'Financing, Insurance, Real Estate and Business Services' => 'Financing, Insurance, Real Estate and Business Services',
		'Community, Social and Personal Services' => 'Community, Social and Personal Services',	
		'Others' => 'Others',	
);

$GLOBALS['app_list_strings']['osy_nr_employees_list']=array (
		'' => '',
		'From 1 to 10' => 'From 1 to 10',
		'From 11 to 20' => 'From 11 to 20',
		'From 21 to 50' => 'From 21 to 50',
		'From 51 to 100' => 'From 51 to 100',
		'From 101 to 200' => 'From 101 to 200',
		'From 201 to 500' => 'From 201 to 500',
		'From 501 to 1000' => 'From 501 to 1000',
		'More than 1000' => 'More than 1000',
);
/*
$GLOBALS['app_list_strings']['osy_contract_list']=array (
		'' => '',
		1 => 'Included',
		2 => 'Escluded',
);
*/
$GLOBALS['app_list_strings']['osy_association_member_type_list']=array (
		'' => '',
		1 => 'Sectorial',
		2 => 'Territorial',
		3 => 'Other',
);

$GLOBALS['app_list_strings']['osy_territorials_list']=array (
		'' => '',
		1 => 'County',
		2 => 'Province',
		3 => 'Cities',
);

$GLOBALS['app_list_strings']['osy_member_categories_list']=array (
		'' => '',
		1 => 'Gold',
		2 => 'Silver',
		3 => 'Bronze',
);

$GLOBALS['app_list_strings']['osy_membership_status_list']=array (
		'' => '',
		'Active Member' => 'Active Member',
		'Lost Member' => 'Lost Member',
		'Suspended Member' => 'Suspended Member',
);

$GLOBALS['app_list_strings']['osy_levels_list']=array (
		'' => '',
		1 => 'Ordinary',
		2 => 'Subcategories',
);

/* contacts dropdown */
$GLOBALS['app_list_strings']['osy_categories_list']=array (
		'' => '',
		1 => 'Internal',
		2 => 'External',
);
/* opportunities dropdown */

$GLOBALS['app_list_strings']['osy_subscription_type_list']=array (
		'' => '',
		1 => 'subscription type 1',
		2 => 'subscription type 2',
		3 => 'subscription type 3',
);

$GLOBALS['app_list_strings']['osy_subscription_criteria_list']=array (
		'' => '',
		1 => 'subscription criteria 1',
		2 => 'subscription criteria 2',
		3 => 'subscription criteria 3',
);

$GLOBALS['app_list_strings']['osy_subscription_duration_list']=array (
		'' => '',
		1 => 'subscription duration 1',
		2 => 'subscription duration 2',
		3 => 'subscription duration 3',
);

$GLOBALS['app_list_strings']['osy_next_action_list']=array (
		'' => '',
		1 => 'subscription next_action 1',
		2 => 'subscription next_action 2',
		3 => 'subscription next_action 3',
		);

$GLOBALS['app_list_strings']['osy_payment_status_list']=array (
		'' => '',
		1 => 'Paid',
		2 => 'Not Paid',
);





$app_strings['LBL_TABGROUP_SALES'] = 'Membership';

$app_strings['LBL_TABGROUP_SUPPORT'] = 'Billing';

$app_list_strings['moduleList']['Leads']='Potential Members';
$app_list_strings['moduleListSingular']['Leads']='Potential Member';
$app_list_strings['parent_type_display']['Leads']='Potential Member';


$GLOBALS['app_list_strings']['parent_type_display']=array (
  'Accounts' => 'Member',
  'Leads' => 'Potential Member',
  'ProspectLists' => 'ProspectList',
  'osy_services_companies' => 'Services for individual companies',
);

$GLOBALS['app_list_strings']['accounts_subcategories_list']=array (
		'' => '',
		1 => 'Coal Mining',
		2 => 'Crude Petroleum and Natural Gas Production',
		3 => 'Metal Ore Mining',
		4 => 'Other Mining',
		5 => 'Manufacture of Food, Beverages and Tobacco',
		6 => 'Textile, Wearing Apparel and Leather Industries',
		7 => 'Manufacture of Wood and Wood Products, Including Furniture',
		8 => 'Manufacture of Paper and Paper Products, Printing and Publishing',
		9 => 'Manufacture of Chemicals and Chemical, Petroleum, Coal, Rubber and Plastic Products',
		10 => 'Manufacture of Non-Metallic Mineral Products, except Products of Petroleum and Coal',
		11 => 'Basic Metal Industries (steel – non-ferrous)',
		12 => 'Manufacture of Fabricated Metal Products, Machinery and Equipment',
		13 => 'Other Manufacturing Industries',
		14 => 'Electricity, Gas and Steam',
		15 => 'Water Works and Supply',
		16 => 'Wholesale Trade',
		17 => 'Retail Trade',
		18 => 'Restaurants and Hotels',
		19 => 'Transport and Storage',
		20 => 'Communication',
		21 => 'Financial Institutions',
		22 => 'Insurance',
		23 => 'Real Estate and Business Services',
		
);

$GLOBALS['app_list_strings']['accounts_operating_markets_list'] = array (
	'' => '',
	'AF' => 'AFGHANISTAN',
	'AX' => 'ÅLAND ISLANDS',
	'AL' => 'ALBANIA',
	'DZ' => 'ALGERIA',
	'AS' => 'AMERICAN SAMOA',
	'AD' => 'ANDORRA',
	'AO' => 'ANGOLA',
	'AI' => 'ANGUILLA',
	'AQ' => 'ANTARCTICA',
	'AG' => 'ANTIGUA AND BARBUDA',
	'AR' => 'ARGENTINA',
	'AM' => 'ARMENIA',
	'AW' => 'ARUBA',
	'AU' => 'AUSTRALIA',
	'AT' => 'AUSTRIA',
	'AZ' => 'AZERBAIJAN',
	'BS' => 'BAHAMAS',
	'BH' => 'BAHRAIN',
	'BD' => 'BANGLADESH',
	'BB' => 'BARBADOS',
	'BY' => 'BELARUS',
	'BE' => 'BELGIUM',
	'BZ' => 'BELIZE',
	'BJ' => 'BENIN',
	'BM' => 'BERMUDA',
	'BT' => 'BHUTAN',
	'BO' => 'BOLIVIA, PLURINATIONAL STATE OF',
	'BQ' => 'BONAIRE, SINT EUSTATIUS AND SABA',
	'BA' => 'BOSNIA AND HERZEGOVINA',
	'BW' => 'BOTSWANA',
	'BV' => 'BOUVET ISLAND',
	'BR' => 'BRAZIL',
	'IO' => 'BRITISH INDIAN OCEAN TERRITORY',
	'BN' => 'BRUNEI DARUSSALAM',
	'BG' => 'BULGARIA',
	'BF' => 'BURKINA FASO',
	'BI' => 'BURUNDI',
	'KH' => 'CAMBODIA',
	'CM' => 'CAMEROON',
	'CA' => 'CANADA',
	'CV' => 'CAPE VERDE',
	'KY' => 'CAYMAN ISLANDS',
	'CF' => 'CENTRAL AFRICAN REPUBLIC',
	'TD' => 'CHAD',
	'CL' => 'CHILE',
	'CN' => 'CHINA',
	'CX' => 'CHRISTMAS ISLAND',
	'CC' => 'COCOS (KEELING) ISLANDS',
	'CO' => 'COLOMBIA',
	'KM' => 'COMOROS',
	'CG' => 'CONGO',
	'CD' => 'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
	'CK' => 'COOK ISLANDS',
	'CR' => 'COSTA RICA',
	'CI' => 'CÔTE D\'IVOIRE',
	'HR' => 'CROATIA',
	'CU' => 'CUBA',
	'CW' => 'CURAÇAO',
	'CY' => 'CYPRUS',
	'CZ' => 'CZECH REPUBLIC',
	'DK' => 'DENMARK',
	'DJ' => 'DJIBOUTI',
	'DM' => 'DOMINICA',
	'DO' => 'DOMINICAN REPUBLIC',
	'EC' => 'ECUADOR',
	'EG' => 'EGYPT',
	'SV' => 'EL SALVADOR',
	'GQ' => 'EQUATORIAL GUINEA',
	'ER' => 'ERITREA',
	'EE' => 'ESTONIA',
	'ET' => 'ETHIOPIA',
	'FK' => 'FALKLAND ISLANDS (MALVINAS)',
	'FO' => 'FAROE ISLANDS',
	'FJ' => 'FIJI',
	'FI' => 'FINLAND',
	'FR' => 'FRANCE',
	'GF' => 'FRENCH GUIANA',
	'PF' => 'FRENCH POLYNESIA',
	'TF' => 'FRENCH SOUTHERN TERRITORIES',
	'GA' => 'GABON',
	'GM' => 'GAMBIA',
	'GE' => 'GEORGIA',
	'DE' => 'GERMANY',
	'GH' => 'GHANA',
	'GI' => 'GIBRALTAR',
	'GR' => 'GREECE',
	'GL' => 'GREENLAND',
	'GD' => 'GRENADA',
	'GP' => 'GUADELOUPE',
	'GU' => 'GUAM',
	'GT' => 'GUATEMALA',
	'GG' => 'GUERNSEY',
	'GN' => 'GUINEA',
	'GW' => 'GUINEA-BISSAU',
	'GY' => 'GUYANA',
	'HT' => 'HAITI',
	'HM' => 'HEARD ISLAND AND MCDONALD ISLANDS',
	'VA' => 'HOLY SEE (VATICAN CITY STATE)',
	'HN' => 'HONDURAS',
	'HK' => 'HONG KONG',
	'HU' => 'HUNGARY',
	'IS' => 'ICELAND',
	'IN' => 'INDIA',
	'ID' => 'INDONESIA',
	'IR' => 'IRAN, ISLAMIC REPUBLIC OF',
	'IQ' => 'IRAQ',
	'IE' => 'IRELAND',
	'IM' => 'ISLE OF MAN',
	'IL' => 'ISRAEL',
	'IT' => 'ITALY',
	'JM' => 'JAMAICA',
	'JP' => 'JAPAN',
	'JE' => 'JERSEY',
	'JO' => 'JORDAN',
	'KZ' => 'KAZAKHSTAN',
	'KE' => 'KENYA',
	'KI' => 'KIRIBATI',
	'KP' => 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF',
	'KR' => 'KOREA, REPUBLIC OF',
	'KW' => 'KUWAIT',
	'KG' => 'KYRGYZSTAN',
	'LA' => 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC',
	'LV' => 'LATVIA',
	'LB' => 'LEBANON',
	'LS' => 'LESOTHO',
	'LR' => 'LIBERIA',
	'LY' => 'LIBYA',
	'LI' => 'LIECHTENSTEIN',
	'LT' => 'LITHUANIA',
	'LU' => 'LUXEMBOURG',
	'MO' => 'MACAO',
	'MK' => 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
	'MG' => 'MADAGASCAR',
	'MW' => 'MALAWI',
	'MY' => 'MALAYSIA',
	'MV' => 'MALDIVES',
	'ML' => 'MALI',
	'MT' => 'MALTA',
	'MH' => 'MARSHALL ISLANDS',
	'MQ' => 'MARTINIQUE',
	'MR' => 'MAURITANIA',
	'MU' => 'MAURITIUS',
	'YT' => 'MAYOTTE',
	'MX' => 'MEXICO',
	'FM' => 'MICRONESIA, FEDERATED STATES OF',
	'MD' => 'MOLDOVA, REPUBLIC OF',
	'MC' => 'MONACO',
	'MN' => 'MONGOLIA',
	'ME' => 'MONTENEGRO',
	'MS' => 'MONTSERRAT',
	'MA' => 'MOROCCO',
	'MZ' => 'MOZAMBIQUE',
	'MM' => 'MYANMAR',
	'NA' => 'NAMIBIA',
	'NR' => 'NAURU',
	'NP' => 'NEPAL',
	'NL' => 'NETHERLANDS',
	'NC' => 'NEW CALEDONIA',
	'NZ' => 'NEW ZEALAND',
	'NI' => 'NICARAGUA',
	'NE' => 'NIGER',
	'NG' => 'NIGERIA',
	'NU' => 'NIUE',
	'NF' => 'NORFOLK ISLAND',
	'MP' => 'NORTHERN MARIANA ISLANDS',
	'NO' => 'NORWAY',
	'OM' => 'OMAN',
	'PK' => 'PAKISTAN',
	'PW' => 'PALAU',
	'PS' => 'PALESTINIAN TERRITORY, OCCUPIED',
	'PA' => 'PANAMA',
	'PG' => 'PAPUA NEW GUINEA',
	'PY' => 'PARAGUAY',
	'PE' => 'PERU',
	'PH' => 'PHILIPPINES',
	'PN' => 'PITCAIRN',
	'PL' => 'POLAND',
	'PT' => 'PORTUGAL',
	'PR' => 'PUERTO RICO',
	'QA' => 'QATAR',
	'RE' => 'RÉUNION',
	'RO' => 'ROMANIA',
	'RU' => 'RUSSIAN FEDERATION',
	'RW' => 'RWANDA',
	'BL' => 'SAINT BARTHÉLEMY',
	'SH' => 'SAINT HELENA, ASCENSION AND TRISTAN DA CUNHA',
	'KN' => 'SAINT KITTS AND NEVIS',
	'LC' => 'SAINT LUCIA',
	'MF' => 'SAINT MARTIN (FRENCH PART)',
	'PM' => 'SAINT PIERRE AND MIQUELON',
	'VC' => 'SAINT VINCENT AND THE GRENADINES',
	'WS' => 'SAMOA',
	'SM' => 'SAN MARINO',
	'ST' => 'SAO TOME AND PRINCIPE',
	'SA' => 'SAUDI ARABIA',
	'SN' => 'SENEGAL',
	'RS' => 'SERBIA',
	'SC' => 'SEYCHELLES',
	'SL' => 'SIERRA LEONE',
	'SG' => 'SINGAPORE',
	'SX' => 'SINT MAARTEN (DUTCH PART)',
	'SK' => 'SLOVAKIA',
	'SI' => 'SLOVENIA',
	'SB' => 'SOLOMON ISLANDS',
	'SO' => 'SOMALIA',
	'ZA' => 'SOUTH AFRICA',
	'GS' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
	'SS' => 'SOUTH SUDAN',
	'ES' => 'SPAIN',
	'LK' => 'SRI LANKA',
	'SD' => 'SUDAN',
	'SR' => 'SURINAME',
	'SJ' => 'SVALBARD AND JAN MAYEN',
	'SZ' => 'SWAZILAND',
	'SE' => 'SWEDEN',
	'CH' => 'SWITZERLAND',
	'SY' => 'SYRIAN ARAB REPUBLIC',
	'TW' => 'TAIWAN, PROVINCE OF CHINA',
	'TJ' => 'TAJIKISTAN',
	'TZ' => 'TANZANIA, UNITED REPUBLIC OF',
	'TH' => 'THAILAND',
	'TL' => 'TIMOR-LESTE',
	'TG' => 'TOGO',
	'TK' => 'TOKELAU',
	'TO' => 'TONGA',
	'TT' => 'TRINIDAD AND TOBAGO',
	'TN' => 'TUNISIA',
	'TR' => 'TURKEY',
	'TM' => 'TURKMENISTAN',
	'TC' => 'TURKS AND CAICOS ISLANDS',
	'TV' => 'TUVALU',
	'UG' => 'UGANDA',
	'UA' => 'UKRAINE',
	'AE' => 'UNITED ARAB EMIRATES',
	'GB' => 'UNITED KINGDOM',
	'US' => 'UNITED STATES',
	'UM' => 'UNITED STATES MINOR OUTLYING ISLANDS',
	'UY' => 'URUGUAY',
	'UZ' => 'UZBEKISTAN',
	'VU' => 'VANUATU',
	'VE' => 'VENEZUELA, BOLIVARIAN REPUBLIC OF',
	'VN' => 'VIET NAM',
	'VG' => 'VIRGIN ISLANDS, BRITISH',
	'VI' => 'VIRGIN ISLANDS, U.S.',
	'WF' => 'WALLIS AND FUTUNA',
	'EH' => 'WESTERN SAHARA',
	'YE' => 'YEMEN',
	'ZM' => 'ZAMBIA',
	'ZW' => 'ZIMBABWE',
);
$GLOBALS['app_list_strings']['lead_source_dom'] = array (
	'' => '',
	'word of mouth' => 'word of mouth',
	'existing user of service' => 'existing user of service',
	'referred' => 'referred',
	'campaign by eo' => 'campaign by eo',
	'calls' => 'calls',
	'web site' => 'web site',
	'PR' => 'PR',
	'conference' => 'conference',
);

$GLOBALS['app_list_strings']['campaign_type_dom'] = array (
	'' => '',
	'Telesales' => 'Telesales',
	'Email' => 'Email',
	'Web' => 'Web',
	'NewsLetter' => 'Newsletter',
);

$GLOBALS['app_list_strings']['osy_services_companies_mode_of_intervention_list'] = array (
	'Telephone' => 'Telephone',
	'Mail' => 'Mail',
	'Letter' => 'Letter',
	'Internal meeting' => 'Internal meeting',
	'External meeting' => 'External meeting',
	'Representation in court / official meeting' => 'Representation in court / official meeting',
	'Other' => 'Other',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_list'] = array (
	'Individual labour law and HR' => 'Individual labour law and HR',
	'Collective labour law and HR' => 'Collective labour law and HR',
	'Tax' => 'Tax',
	'Trade' => 'Trade',
	'Company management' => 'Company management',
	'Data information' => 'Data information',
	'Access to finance' => 'Access to finance',
	'Other' => 'Other',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_description_list'] = array (
	'Employment contract' => 'Employment contract',
	'End of contract - Dismissal' => 'End of contract - Dismissal',
	'Disciplinary issues' => 'Disciplinary issues',
	'Working time' => 'Working time',
	'Wage and benefits' => 'Wage and benefits',
	'Training' => 'Training',
	'Holiday entitlements' => 'Holiday entitlements',
	'Sickness and other suspensions' => 'Sickness and other suspensions',
	'Social security' => 'Social security',
	'Open fields' => 'Open fields',		
	'Collective dispute- strike' => 'Collective dispute- strike',
	'Trade unions issues' => 'Trade unions issues',
	'OSH' => 'OSH',
	'Social security contributions' => 'Social security contributions',
	'Wages' => 'Wages',
	'Outsourcing' => 'Outsourcing',
	'Collective agreements' => 'Collective agreements',	
	'VAT' => 'VAT',
	'Company tax' => 'Company tax',
	'Personal income tax' => 'Personal income tax',	
	'Economic situation' => 'Economic situation',
	'EO matters' => 'EO matters',
	'Social situation' => 'Social situation',
);

$GLOBALS['app_list_strings']['osy_service_status_dom'] = array (
	'Planned' => 'Planned',
	'In process' =>'In process',
	'Done' => 'Done',
	'Closed' => 'Closed',
);

$app_strings['LBL_GROUPTAB2_1360916369'] = 'Marketing';

$app_list_strings['moduleList']['Contacts']='Member Contacts';
$app_list_strings['moduleListSingular']['Contacts']='Member Contact';
$app_list_strings['moduleList']['ZuckerReports']='Report';
$app_list_strings['moduleListSingular']['ZuckerReports']='Report';

$GLOBALS['app_list_strings']['accounts_type_of_business_list']=array (
  '' => '',
  'Private company' => 'Private company',
  'Public company' => 'Public company',
  'Partly state-owned company' => 'Partly state-owned company',
  'NGO' => 'NGO',
  'Sole proprietorship' => 'Sole proprietorship',
);

$GLOBALS['app_list_strings']['osy_contact_type_list']=array (
  '' => '',
  3 => 'HR',
  4 => 'OSH',
  5 => 'Finance',
  6 => 'Sales',
  7 => 'Production',
  8 => 'Administration',
  9 => 'PR',
  10 => 'Other',
);

$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  '' => '',
  1 => 'President',
  2 => 'CEO',
  3 => 'Vice President',
  4 => 'Director',
  5 => 'Manager',
  6 => 'Assistant',
  'assistant_ceo' => 'Assistant of CEO',
  'assistant_vice' => 'Assistant of President',
  7 => 'Other',
);
$GLOBALS['app_list_strings']['osy_contact_type_list']=array (
  '' => '',
  3 => 'HR',
  4 => 'OSH',
  5 => 'Finance',
  6 => 'Sales',
  7 => 'Production',
  8 => 'Administration',
  9 => 'PR',
  10 => 'Other',
);
$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  '' => '',
  1 => 'President',
  2 => 'CEO',
  3 => 'Vice President',
  4 => 'Director',
  5 => 'Manager',
  6 => 'Assistant',
  'assistant_ceo' => 'Assistant of CEO',
  'assistant_vice' => 'Assistant of President',
  7 => 'Other',
);

$GLOBALS['app_list_strings']['lead_status_dom'] = array (
	'' => '',
	'New' => 'New',
	'In Negotiation' => 'In Negotiation',
	'Final Stage' => 'Final Stage',
	'Converted' => 'Converted',
		'Paid' => 'Paid'
);
$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% foreign-owned',
  '100% national-owned' => '100% national-owned',
  'Mainly foreign-owned' => 'Mainly foreign-owned',
  'Mainly national-owned' => 'Mainly national-owned',
  'Half/half' => 'Half/half',
  'Other' => 'Other',
);
$app_list_strings['moduleList']['osy_service']='Group Activities';
$app_list_strings['moduleListSingular']['osy_service']='Group Activities';=======
		'Paid' => 'Paid'
);

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% foreign-owned',
  '100% national-owned' => '100% national-owned',
  'Mainly foreign-owned' => 'Mainly foreign-owned',
  'Mainly national-owned' => 'Mainly national-owned',
  'Half/half' => 'Half/half',
  'Other' => 'Other',
);

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% foreign-owned',
  '100% national-owned' => '100% national-owned',
  'Mainly foreign-owned' => 'Mainly foreign-owned',
  'Mainly national-owned' => 'Mainly national-owned',
  'Half/half' => 'Half/half',
  'Other' => 'Other',
);
$GLOBALS['app_list_strings']['osy_member_type_list']=array (
  'Direct Company' => 'Direct Company',
  'Association' => 'Association',
  'Indirect Member' => 'Indirect Member',
);

