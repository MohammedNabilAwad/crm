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
$app_list_strings['moduleList']['ProspectLists'] = 'Listes';
$app_list_strings['moduleList']['Accounts'] = 'Membres';
$app_list_strings['moduleList']['Opportunities'] = 'Cotisations';
$app_list_strings['moduleList']['Leads'] = 'Membres potentiels';
$app_list_strings['moduleList']['Campaigns'] = 'Système de courrier collectif';


$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL'] = 'Ajouter à liste';
$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE'] = 'Ajouter à liste';

//custom/modules/Activities/views/view.popup.php
$app_strings['DATA_TYPE_END'] = 'Fin:'; 
$app_strings['DATA_TYPE_ENTERED'] = 'Créé:'; 

$app_strings['LBL_CREATE_CAMPAIGNS'] = 'Envoyer courriel';
$app_strings['LBL_NAME_CAMPAIGNS'] = 'Objet-type de service';

$app_strings['LBL_STAMPA_FATTURA'] = 'Imprimer facture';


/* members dropdown */

$GLOBALS['app_list_strings']['osy_member_type_list']=array (
		'Direct Company' => 'Société directe',
		'Association' => 'Association',
		'Indirect Member' => 'Membre indirect',
);

$GLOBALS['app_list_strings']['osy_industries_list']=array (
		'' => '',
		'Agriculture, Hunting, Forestry and Fishing' => 'Agriculture, chasse, sylviculture et pêche',		
		'Mining and Quarrying' => 'Industries extractrices',
		'Manufacturing' => 'Fabrication',
		'Electricity, Gas and Water' => 'Electricité, gaz et eau',	
		'Construction' => 'Construction',	
		'Wholesale and Retail Trade and Restaurants and Hotels' => 'Commerce de gros et de détail et restaurants et hôtels',
		'Transport, Storage and Communication' => 'Transport, entreposage et communication',	
		'Financing, Insurance, Real Estate and Business Services' => 'Financement, Assurance, immobilier et services commerciaux',
		'Community, Social and Personal Services' => 'Services communautaires, sociaux et à la personne',	
		'Others' => 'Autres',	
);

$GLOBALS['app_list_strings']['osy_nr_employees_list']=array (
		'' => '',
		'From 1 to 10' => 'Entre 1 et 10',
		'From 11 to 20' => 'Entre 11 et 20',
		'From 21 to 50' => 'Entre 21 et 50',
		'From 51 to 100' => 'Entre 51 et 100',
		'From 101 to 200' => 'Entre 101 et 200',
		'From 201 to 500' => 'Entre 201 et 500',
		'From 501 to 1000' => 'Entre 501 et 1000',
		'More than 1000' => 'Plus de 1000',
);
/*
$GLOBALS['app_list_strings']['osy_contract_list']=array (
		'' => '',
		1 => 'Compris',
		2 => 'Exclus',
);
*/
$GLOBALS['app_list_strings']['osy_association_member_type_list']=array (
		'' => '',
		1 => 'Sectoriel',
		2 => 'Territorial',
		3 => 'Autre',
);

$GLOBALS['app_list_strings']['osy_territorials_list']=array (
		'' => '',
		1 => 'Pays',
		2 => 'Province',
		3 => 'Villes',
);

$GLOBALS['app_list_strings']['osy_member_categories_list']=array (
		'' => '',
		1 => 'Or',
		2 => 'Argent',
		3 => 'Bronze',
);

$GLOBALS['app_list_strings']['osy_membership_status_list']=array (
		'' => '',
		'Active Member' => 'Membre actif',
		'Lost Member' => 'Membre perdu',
		'Suspended Member' => 'Membre suspendu',
);

$GLOBALS['app_list_strings']['osy_levels_list']=array (
		'' => '',
		1 => 'Ordinaire',
		2 => 'Sous-catégories',
);

/* contacts dropdown */
$GLOBALS['app_list_strings']['osy_categories_list']=array (
		'' => '',
		1 => 'Interne',
		2 => 'Externe',
);
/* opportunities dropdown */

$GLOBALS['app_list_strings']['osy_subscription_type_list']=array (
		'' => '',
		1 => 'Type d`abonnement 1',
		2 => 'Type d`abonnement 2',
		3 => 'Type d`abonnement 3',
);

$GLOBALS['app_list_strings']['osy_subscription_criteria_list']=array (
		'' => '',
		1 => 'Critère d`abonnement 1',
		2 => 'Critère d`abonnement 2',
		3 => 'Critère d`abonnement 3',
);

$GLOBALS['app_list_strings']['osy_subscription_duration_list']=array (
		'' => '',
		1 => 'Durée abonnement 1',
		2 => 'Durée abonnement 2',
		3 => 'Durée abonnement 3',
);

$GLOBALS['app_list_strings']['osy_next_action_list']=array (
		'' => '',
		1 => 'Abonnement-action suivante 1',
		2 => 'Abonnement-action suivante 2',
		3 => 'Abonnement-action suivante 3',
		);

$GLOBALS['app_list_strings']['osy_payment_status_list']=array (
		'' => '',
		1 => 'Payé',
		2 => 'Non payé',
);





$app_strings['LBL_TABGROUP_SALES'] = 'Affiliation';

$app_strings['LBL_TABGROUP_SUPPORT'] = 'Facturation';

$app_list_strings['moduleList']['Leads']='Membres potentiels';
$app_list_strings['moduleListSingular']['Leads']='Membre potentiel';
$app_list_strings['parent_type_display']['Leads']='Membre potentiel';


$GLOBALS['app_list_strings']['parent_type_display']=array (
  'Accounts' => 'Membre',
  'Leads' => 'Membre potentiel',
  'ProspectLists' => 'Liste membres potentiels',
  'osy_services_companies' => 'Services aux sociétés individuelles',
);

$GLOBALS['app_list_strings']['accounts_subcategories_list']=array (
		'' => '',
		1 => 'Extraction de charbon',
		2 => 'Production de pétrole brut et de gaz naturel',
		3 => 'Extraction de minerais métalliques',
		4 => 'Autre extraction',
		5 => 'Fabrication d`aliments, boissons et tabac',
		6 => 'Industries du textile, de l`habillement et du cuir',
		7 => 'Fabrication de bois et produits en bois, y compris meubles',
		8 => 'Fabrication de papier et produits en papier, impression et édition',
		9 => 'Fabrication de produits chimiques, du pétrole, du charbon, en caoutchouc et en plastique',
		10 => 'Fabrication de produits minéraux non métalliques, à l`exception des produits du pétrole et du charbon',
		11 => 'Industries métallurgiques (acier – non-ferreux)',
		12 => 'Fabrication de produits métalliques usinés, machines et équipements',
		13 => 'Autres industries manufacturières',
		14 => 'Electricité, gaz et vapeur',
		15 => 'Services des eaux et distribution d`eau',
		16 => 'Commerce de gros',
		17 => 'Commerce de détail',
		18 => 'Restaurants et hôtels',
		19 => 'Transport et entreposage',
		20 => 'Communication',
		21 => 'Institutions financières',
		22 => 'Assurance',
		23 => 'Immobilier et services commerciaux',
		
);

$GLOBALS['app_list_strings']['accounts_operating_markets_list'] = array (
	'' => '',
	'AF' => 'AFGHANISTAN',
	'AX' => 'ILES ÅLAND',
	'AL' => 'ALBANIE',
	'DZ' => 'ALGERIE',
	'AS' => 'SAMOA AMERICAINES',
	'AD' => 'ANDORRE',
	'AO' => 'ANGOLA',
	'AI' => 'ANGUILLA',
	'AQ' => 'ANTARCTIQUE',
	'AG' => 'ANTIGUA-ET-BARBUDA',
	'AR' => 'ARGENTINE',
	'AM' => 'ARMENIE',
	'AW' => 'ARUBA',
	'AU' => 'AUSTRALIE',
	'AT' => 'AUTRICHE',
	'AZ' => 'AZERBAIDJAN',
	'BS' => 'BAHAMAS',
	'BH' => 'BAHREIN',
	'BD' => 'BANGLADESH',
	'BB' => 'BARBADE',
	'BY' => 'BELARUS',
	'BE' => 'BELGIQUE',
	'BZ' => 'BELIZE',
	'BJ' => 'BENIN',
	'BM' => 'BERMUDE',
	'BT' => 'BOUTAN',
	'BO' => 'BOLIVIE, ETAT PLURINATIONAL DE',
	'BQ' => 'BONAIRE, SINT EUSTATIUS ET SABA',
	'BA' => 'BOSNIE-HERZEGOVINE',
	'BW' => 'BOTSWANA',
	'BV' => 'ILE BOUVET',
	'BR' => 'BRESIL',
	'IO' => 'TERRITOIRE BRITANNIQUE DE L`OCEAN INDIEN',
	'BN' => 'BRUNEI DARUSSALAM',
	'BG' => 'BULGARIE',
	'BF' => 'BURKINA FASO',
	'BI' => 'BURUNDI',
	'KH' => 'CAMBODGE',
	'CM' => 'CAMEROUN',
	'CA' => 'CANADA',
	'CV' => 'CAP-VERT',
	'KY' => 'ILES CAIMANS',
	'CF' => 'REPUBLIQUE CENTRAFRICAINE',
	'TD' => 'TCHAD',
	'CL' => 'CHILI',
	'CN' => 'CHINE',
	'CX' => 'ILE CHRISTMAS',
	'CC' => 'ILES COCOS (KEELING)',
	'CO' => 'COLOMBIE',
	'KM' => 'COMORES',
	'CG' => 'CONGO',
	'CD' => 'CONGO, REPUBLIQUE DEMOCRATIQUE DU',
	'CK' => 'ILES COOK',
	'CR' => 'COSTA RICA',
	'CI' => 'CÔTE D`IVOIRE',
	'HR' => 'CROATIE',
	'CU' => 'CUBA',
	'CW' => 'CURAÇAO',
	'CY' => 'CHYPRE',
	'CZ' => 'REPUBLIQUE TCHEQUE',
	'DK' => 'DANEMARK',
	'DJ' => 'DJIBOUTI',
	'DM' => 'DOMINIQUE',
	'DO' => 'REPUBLIQUE DOMINICAINE',
	'EC' => 'EQUATEUR',
	'EG' => 'EGYPTE',
	'SV' => 'EL SALVADOR',
	'GQ' => 'GUINEE EQUATORIALE',
	'ER' => 'ERITHREE',
	'EE' => 'ESTONIE',
	'ET' => 'ETHIOPIE',
	'FK' => 'ILES FALKLAND (MALOUINES)',
	'FO' => 'ILES FEROE',
	'FJ' => 'FIDJI',
	'FI' => 'FINLANDE',
	'FR' => 'FRANCE',
	'GF' => 'GUYANE FRANCAISE',
	'PF' => 'POLYNESIE FRANCAISE',
	'TF' => 'TERRES AUSTRALES ET ANTARCTIQUES FRANCAISES',
	'GA' => 'GABON',
	'GM' => 'GAMBIE',
	'GE' => 'GEORGIE',
	'DE' => 'ALLEMAGNE',
	'GH' => 'GHANA',
	'GI' => 'GIBRALTAR',
	'GR' => 'GRECE',
	'GL' => 'GROENLAND',
	'GD' => 'GRENADE',
	'GP' => 'GUADELOUPE',
	'GU' => 'GUAM',
	'GT' => 'GUATEMALA',
	'GG' => 'GUERNSEY',
	'GN' => 'GUINEE',
	'GW' => 'GUINEE-BISSAU',
	'GY' => 'GUYANE',
	'HT' => 'HAITI',
	'HM' => 'ILES HEARD ET MCDONALD',
	'VA' => 'SAINT-SIEGE (ETAT DE LA CITE DU VATICAN)',
	'HN' => 'HONDURAS',
	'HK' => 'HONG-KONG',
	'HU' => 'HONGRIE',
	'IS' => 'ISLANDE',
	'IN' => 'INDE',
	'ID' => 'INDONESIE',
	'IR' => 'IRAN, REPUBLIQUE ISLAMIQUE D',
	'IQ' => 'IRAQ',
	'IE' => 'IRLANDE',
	'IM' => 'ILE DE MAN',
	'IL' => 'ISRAEL',
	'IT' => 'ITALIE',
	'JM' => 'JAMAIQUE',
	'JP' => 'JAPON',
	'JE' => 'JERSEY',
	'JO' => 'JORDANIE',
	'KZ' => 'KAZAKHSTAN',
	'KE' => 'KENYA',
	'KI' => 'KIRIBATI',
	'KP' => 'COREE, REPUBLIQUE POPULAIRE DEMOCRATIQUE DE',
	'KR' => 'COREE, REPUBLIQUE DE',
	'KW' => 'KOWEIT',
	'KG' => 'KIRGHIZSTAN',
	'LA' => 'LAOS (REPUBLIQUE DEMOCRATIQUE POPULAIRE LAO)',
	'LV' => 'LETTONIE',
	'LB' => 'LIBAN',
	'LS' => 'LESOTHO',
	'LR' => 'LIBERIA',
	'LY' => 'LIBYE',
	'LI' => 'LIECHTENSTEIN',
	'LT' => 'LITUANIE',
	'LU' => 'LUXEMBOURG',
	'MO' => 'MACAO',
	'MK' => 'MACEDOINE, ANCIENNE REPUBLIQUE YOUGOSLAVE DE',
	'MG' => 'MADAGASCAR',
	'MW' => 'MALAWI',
	'MY' => 'MALAISIE',
	'MV' => 'MALDIVES',
	'ML' => 'MALI',
	'MT' => 'MALTE',
	'MH' => 'ILES MARSHALL',
	'MQ' => 'MARTINIQUE',
	'MR' => 'MAURITANIE',
	'MU' => 'MAURICE',
	'YT' => 'MAYOTTE',
	'MX' => 'MEXIQUE',
	'FM' => 'MICRONESIE, ETATS FEDERES DE',
	'MD' => 'MOLDAVIE, REPUBLIQUE DE',
	'MC' => 'MONACO',
	'MN' => 'MONGOLIE',
	'ME' => 'MONTENEGRO',
	'MS' => 'MONTSERRAT',
	'MA' => 'MAROC',
	'MZ' => 'MOZAMBIQUE',
	'MM' => 'MYANMAR',
	'NA' => 'NAMIBIE',
	'NR' => 'NAURU',
	'NP' => 'NEPAL',
	'NL' => 'PAYS-BAS',
	'NC' => 'NOUVELLE-CALEDONIE',
	'NZ' => 'NOUVELLE-ZELANDE',
	'NI' => 'NICARAGUA',
	'NE' => 'NIGER',
	'NG' => 'NIGERIA',
	'NU' => 'NIUE',
	'NF' => 'ILE NORFOLK',
	'MP' => 'ILES MARIANNES DU NORD',
	'NO' => 'NORVEGE',
	'OM' => 'OMAN',
	'PK' => 'PAKISTAN',
	'PW' => 'PALAU',
	'PS' => 'TERRITOIRE PALESTINIEN OCCUPE',
	'PA' => 'PANAMA',
	'PG' => 'PAPOUASIE - NOUVELLE-GUINEE',
	'PY' => 'PARAGUAY',
	'PE' => 'PEROU',
	'PH' => 'PHILIPPINES',
	'PN' => 'ILES PITCAIRN',
	'PL' => 'POLOGNE',
	'PT' => 'PORTUGAL',
	'PR' => 'PUERTO RICO',
	'QA' => 'QATAR',
	'RE' => 'RÉUNION',
	'RO' => 'ROUMANIE',
	'RU' => 'FEDERATION DE RUSSIE',
	'RW' => 'RWANDA',
	'BL' => 'SAINT-BARTHÉLEMY',
	'SH' => 'SAINTE-HELENE, ASCENSION ET TRISTAN DA CUNHA',
	'KN' => 'SAINT-CHRISTOPHE-ET-NIEVES',
	'LC' => 'SAINTE-LUCIE',
	'MF' => 'SAINT-MARTIN',
	'PM' => 'SAINT-PIERRE-ET-MIQUELON',
	'VC' => 'SAINT-VINCENT-ET-LES-GRENADINES',
	'WS' => 'SAMOA',
	'SM' => 'SAINT-MARIN',
	'ST' => 'SAO TOME-ET-PRINCIPE',
	'SA' => 'ARABIE SAOUDITE',
	'SN' => 'SENEGAL',
	'RS' => 'SERBIE',
	'SC' => 'SEYCHELLES',
	'SL' => 'SIERRA LEONE',
	'SG' => 'SINGAPOUR',
	'SX' => 'SINT-MAARTEN',
	'SK' => 'SLOVAQUIE',
	'SI' => 'SLOVENIE',
	'SB' => 'ILES SALOMON',
	'SO' => 'SOMALIE',
	'ZA' => 'AFRIQUE DU SUD',
	'GS' => 'ILES GEORGIE DU SUD ET SANDWICH DU SUD',
	'SS' => 'SOUDAN DU SUD',
	'ES' => 'ESPAGNE',
	'LK' => 'SRI LANKA',
	'SD' => 'SOUDAN',
	'SR' => 'SURINAME',
	'SJ' => 'SVALBARD ET JAN MAYEN',
	'SZ' => 'SWAZILAND',
	'SE' => 'SUEDE',
	'CH' => 'SUISSE',
	'SY' => 'SYRIE (REPUBLIQUE ARABE SYRIENNE)',
	'TW' => 'TAIWAN, PROVINCE DE CHINE',
	'TJ' => 'TADJIKISTAN',
	'TZ' => 'TANZANIE, REPUBLIQUE UNIE DE',
	'TH' => 'THAILANDE',
	'TL' => 'TIMOR-ORIENTAL',
	'TG' => 'TOGO',
	'TK' => 'TOKELAU',
	'TO' => 'TONGA',
	'TT' => 'TRINITE-ET-TOBAGO',
	'TN' => 'TUNISIE',
	'TR' => 'TURQUE',
	'TM' => 'TURKMENISTAN',
	'TC' => 'ILES TURCS-ET-CAICOS',
	'TV' => 'TUVALU',
	'UG' => 'OUGANDA',
	'UA' => 'UKRAINE',
	'AE' => 'EMIRATS ARABES UNIS',
	'GB' => 'ROYAUME-UNI',
	'US' => 'ETATS-UNIS',
	'UM' => 'ILES MINEURES ELOIGNEES DES ETATS-UNIS',
	'UY' => 'URUGUAY',
	'UZ' => 'OUZBEKISTAN',
	'VU' => 'VANUATU',
	'VE' => 'VENEZUELA, REPUBLIQUE BOLIVARIENNE DU',
	'VN' => 'VIET NAM',
	'VG' => 'ILES VIERGES BRITANNIQUES',
	'VI' => 'ILES VIERGES AMERICAINES',
	'WF' => 'WALLIS-ET-FUTUNA',
	'EH' => 'SAHARA OCCIDENTAL',
	'YE' => 'YEMEN',
	'ZM' => 'ZAMBIE',
	'ZW' => 'ZIMBABWE',
);
$GLOBALS['app_list_strings']['lead_source_dom'] = array (
	'' => '',
	'word of mouth' => 'bouche-à-oreille',
	'existing user of service' => 'utilisateur du service existant',
	'referred' => 'mentionné',
	'campaign by eo' => 'campagne par administrateur',
	'calls' => 'appels',
	'web site' => 'site web',
	'PR' => 'RP',
	'conference' => 'conférence',
);

$GLOBALS['app_list_strings']['campaign_type_dom'] = array (
	'' => '',
	'Telesales' => 'Téléventes',
	'Email' => 'Courriel',
	'Web' => 'Web',
	'NewsLetter' => 'Bulletin',
);

$GLOBALS['app_list_strings']['osy_services_companies_mode_of_intervention_list'] = array (
	'Telephone' => 'Téléphone',
	'Mail' => 'Courrier',
	'Letter' => 'Lettre',
	'Internal meeting' => 'Réunion interne',
	'External meeting' => 'Réunion externe',
	'Representation in court / official meeting' => 'Représentation au tribunal / réunion officielle',
	'Other' => 'Autre',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_list'] = array (
	'Individual labour law and HR' => 'Droit du travail individuel et RH',
	'Collective labour law and HR' => 'Droit du travail collectif et RH',
	'Tax' => 'Fiscalité',
	'Trade' => 'Commerce',
	'Company management' => 'Gestion de société',
	'Data information' => 'Informations-données',
	'Access to finance' => 'Accès au financement',
	'Other' => 'Autre',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_description_list'] = array (
	'Employment contract' => 'Contrat de travail',
	'End of contract - Dismissal' => 'Fin de contrat - Licenciement',
	'Disciplinary issues' => 'Problèmes disciplinaires',
	'Working time' => 'Temps de travail',
	'Wage and benefits' => 'Salaire et avantages sociaux',
	'Training' => 'Formation',
	'Holiday entitlements' => 'Droit à des vacances',
	'Sickness and other suspensions' => 'Maladie et autres suspensions',
	'Social security' => 'Sécurité sociale',
	'Open fields' => 'Champs ouverts',		
	'Collective dispute- strike' => 'Conflit collectif-grève',
	'Trade unions issues' => 'Questions syndicales',
	'OSH' => 'SST',
	'Social security contributions' => 'Cotisations sociales',
	'Wages' => 'Salaires',
	'Outsourcing' => 'Externalisation',
	'Collective agreements' => 'Accords collectifs',	
	'VAT' => 'TVA',
	'Company tax' => 'Impôt sur les sociétés',
	'Personal income tax' => 'Impôt sur le revenu',	
	'Economic situation' => 'Situation économique',
	'EO matters' => 'Questions administrateur',
	'Social situation' => 'Situation sociale',
);

$GLOBALS['app_list_strings']['osy_service_status_dom'] = array (
	'Planned' => 'Planifié',
	'In process' =>'En cours',
	'Done' => 'Fait',
	'Closed' => 'Clôturé',
);

$app_strings['LBL_GROUPTAB2_1360916369'] = 'Marketing';

$app_list_strings['moduleList']['Contacts']='Contacts de membre';
$app_list_strings['moduleListSingular']['Contacts']='Contact de membre';
$app_list_strings['moduleList']['ZuckerReports']='Rapport';
$app_list_strings['moduleListSingular']['ZuckerReports']='Rapport';

$GLOBALS['app_list_strings']['accounts_type_of_business_list']=array (
  '' => '',
  'Private company' => 'Société privée',
  'Public company' => 'Société publique',
  'Partly state-owned company' => 'Société en partie détenue par l`Etat',
  'NGO' => 'ONG',
  'Sole proprietorship' => 'Société individuelle',
);

$GLOBALS['app_list_strings']['osy_contact_type_list']=array (
  '' => '',
  3 => 'RH',
  4 => 'SST',
  5 => 'Finances',
  6 => 'Ventes',
  7 => 'Production',
  8 => 'Administration',
  9 => 'RP',
  10 => 'Autre',
);

$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  '' => '',
  1 => 'Président',
  2 => 'Directeur général',
  3 => 'Vice-président',
  4 => 'Directeur',
  5 => 'Gestionnaire',
  6 => 'Assistant',
  'assistant_ceo' => 'Assistant du directeur général',
  'assistant_vice' => 'Assistant du président',
  7 => 'Autre',
);
$GLOBALS['app_list_strings']['osy_contact_type_list']=array (
  '' => '',
  3 => 'RH',
  4 => 'SST',
  5 => 'Finances',
  6 => 'Ventes',
  7 => 'Production',
  8 => 'Administration',
  9 => 'RP',
  10 => 'Autre',
);
$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  '' => '',
 1 => 'Président',
  2 => 'Directeur général',
  3 => 'Vice-président',
  4 => 'Directeur',
  5 => 'Gestionnaire',
  6 => 'Assistant',
  'assistant_ceo' => 'Assistant du directeur général',
  'assistant_vice' => 'Assistant du président',
  7 => 'Autre',
);

$GLOBALS['app_list_strings']['lead_status_dom'] = array (
	'' => '',
	'New' => 'Nouveau',
	'In Negotiation' => 'Négociation en cours',
	'Final Stage' => 'Phase finale',
	'Converted' => 'Converti',
		'Paid' => 'Payé'
);
$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% étrangère',
  '100% national-owned' => '100% nationale',
  'Mainly foreign-owned' => 'Principalement étrangère',
  'Mainly national-owned' => 'Principalement nationale',
  'Half/half' => 'Moitié/moitié',
  'Other' => 'Autre',
);
$app_list_strings['moduleList']['osy_service']='Activités de groupe';
$app_list_strings['moduleListSingular']['osy_service']='Activité de groupe';=======
		'Paid' => 'Payé'
);

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
   '100% foreign-owned' => '100% étrangère',
  '100% national-owned' => '100% nationale',
  'Mainly foreign-owned' => 'Principalement étrangère',
  'Mainly national-owned' => 'Principalement nationale',
  'Half/half' => 'Moitié/moitié',
  'Other' => 'Autre',
);

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
   '100% foreign-owned' => '100% étrangère',
  '100% national-owned' => '100% nationale',
  'Mainly foreign-owned' => 'Principalement étrangère',
  'Mainly national-owned' => 'Principalement nationale',
  'Half/half' => 'Moitié/moitié',
  'Other' => 'Autre',
);
$GLOBALS['app_list_strings']['osy_member_type_list']=array (
  'Direct Company' => 'Société directe',
  'Association' => 'Association',
  'Indirect Member' => 'Membre indirect',
);

