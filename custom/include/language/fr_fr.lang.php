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

///////////////////////////////////
///// riporto da italiano a francese

$GLOBALS['app_list_strings']['accounts_type_of_business_list']=array (
  '' => '',
  'Private company' => 'Société privée',
  'Public company' => 'Société publique',
  'Partly state-owned company' => 'Société en partie détenue par l&#39;Etat',
  'NGO' => 'ONG',
  'Sole proprietorship' => 'Actionnaire privé unique',
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
  'president_ceo' => 'Président/directeur général',
);
$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  '' => '',
  1 => 'Président',
  2 => 'Directeur général',
  3 => 'Vice-président',
  4 => 'Directeur',
  5 => 'Gestionnaire',
  6 => 'Assistant',
  7 => 'Autre',
  'assistant_ceo' => 'Assistant du directeur général',
  'assistant_vice' => 'Assistant du vice-président',
);
$app_strings['LBL_TABGROUP_SALES'] = 'Membre';

$app_strings['LBL_TABGROUP_ACTIVITIES'] = 'Activités';

$app_strings['LBL_TABGROUP_SUPPORT'] = 'Facturation';

$GLOBALS['app_list_strings']['test_field_list']=array (
  'item' => 'élément',
  'item1' => 'élément1',
);
$GLOBALS['app_list_strings']['test_field_c_list']=array (
);

$GLOBALS['app_list_strings']['lead_status_dom']=array (
  '' => '',
  'New' => 'Nouveau',
  'Négociation en cours' => 'Negotiation en cours',
  'Final Stage' => 'Phase finale',
  'Paid' => 'Payé',
);
$GLOBALS['app_list_strings']['prospect_list_type_dom']=array (
  'default' => 'Par défaut',
  'test' => 'Test',
);

///////////////////////////////////
///// riporto da inglese a francese

$app_list_strings['moduleList']['ProspectLists'] = 'Listes';
$app_list_strings['moduleList']['Accounts'] = 'Membres';
$app_list_strings['moduleList']['Opportunities'] = 'Cotisations';
$app_list_strings['moduleList']['Leads'] = 'Membres potentiels';
$app_list_strings['moduleList']['Campaigns'] = 'Campagnes marketing';


$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL'] = 'Ajouter à liste';
$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE'] = 'Ajouter à liste';

//custom/modules/Activities/views/view.popup.php
$app_strings['DATA_TYPE_END'] = 'Fin:'; 
$app_strings['DATA_TYPE_ENTERED'] = 'Créé:'; 

$app_strings['LBL_CREATE_CAMPAIGNS'] = 'Préparer email';
$app_strings['LBL_NAME_CAMPAIGNS'] = 'Objet-type de service';

$app_strings['LBL_STAMPA_FATTURA'] = 'Imprimer facture';


/* members dropdown */
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


$app_list_strings['parent_type_display']=array (
	'Accounts' => 'Membre',
	'Leads' => 'Membre potentiel',
	'ProspectLists' => 'Liste membres potentiels',
	'osy_services_companies' => 'Services individuels',
	'osy_service' => 'Activité de groupe',
);

$GLOBALS['app_list_strings']['accounts_subcategories_list']=array (
		'Crop and animal production, hunting and related service activities' => 'Cultures agricoles et élevage d`animaux, chasse et activités apparentées',
		'Forestry and logging' => 'Sylviculture et exploitation forestière',
		'Fishing and aquaculture' => 'Pêche et aquaculture',
		'Mining of coal and lignite' => 'Extraction de charbon et lignite',
		'Extraction of crude petroleum and natural gas' => 'Extraction de pétrole brut et gaz naturel',
		'Mining of metal ores' => 'Extraction de minerais métalliques',
		'Other mining and quarrying' => 'Autres industries extractrices',
		'Mining support service activities' => 'Activités de soutien à l`extraction minière',
		'Manufacture of food products' => 'Fabrication de produits alimentaires',
		'Manufacture of beverages' => 'Fabrication de boissons',
		'Manufacture of tobacco products' => 'Fabrication de produits du tabac',
		'Manufacture of textiles' => 'Fabrication de textiles',
		'Manufacture of wearing apparel' => 'Fabrication de produits de l`habillement',
		'Manufacture of leather and related products' => 'Fabrication de cuir et produits apparentés',
		'Manufacture of wood and of products of wood and cork, except furniture; manufacture of articles of straw and plaiting materials' => 'Fabrication de bois et produits en bois et en liège, à l`exception des meubles; fabrication d`articles en paille et matières à tresser',
		'Manufacture of paper and paper products' => 'Fabrication de papier et produits en papier',
		'Printing and reproduction of recorded media' => 'Impression et reproduction de supports enregistrés',
		'Manufacture of coke and refined petroleum products' => 'Fabrication de coke et produits pétroliers raffinés',
		'Manufacture of chemicals and chemical products' => 'Fabrication de produits chimiques',
		'Manufacture of basic pharmaceutical products and pharmaceutical preparations' => 'Fabrication de préparations et produits pharmaceutiques de base',
		'Manufacture of rubber and plastics products' => 'Fabrication de produits en caoutchouc et en plastique',
		'Manufacture of other non-metallic mineral products' => 'Fabrication d`autres produits minéraux non métalliques',
		'Manufacture of basic metals' => 'Fabrication de métaux de base',
		'Manufacture of fabricated metal products, except machinery and equipment' => 'Fabrication de produits métalliques usinés, à l`exception des machines et équipements',
		'Manufacture of computer, electronic and optical products' => 'Fabrication de produits informatiques, électroniques et optiques',
		'Manufacture of electrical equipment' => 'Fabrication d`équipements électriques',
		'Manufacture of machinery and equipment n.e.c.' => 'Fabrication de machines et équipements n.c.a.',
		'Manufacture of motor vehicles, trailers and semi-trailers' => 'Fabrication de véhicules à moteur, remorques et semi-remorques',
		'Manufacture of other transport equipment' => 'Fabrication d`autres équipements de transport',
		'Manufacture of furniture' => 'Fabrication de meubles',
		'Other manufacturing' => 'Autre fabrication',
		'Repair and installation of machinery and equipment' => 'Réparation et installation de machines et équipements',
		'Water collection, treatment and supply' => 'Collecte, traitement et distribution d`eau',
		'Sewerage' => 'Egouts',
		'Waste collection, treatment and disposal activities; materials recovery' => 'Activités de collecte, traitement et évacuation de l`eau; récupération de matériaux',
		'Remediation activities and other waste management services' => 'Activités de remédiation et autres services de gestion des déchets',
		'Construction of buildings' => 'Construction de bâtiments',
		'Civil engineering' => 'Génie civil',
		'Specialized construction activities' => 'Activités de construction spéciales',
		'Wholesale and retail trade and repair of motor vehicles and motorcycles' => 'Commerce de gros et de détail et réparation de véhicules à moteur et motos',
		'Wholesale trade, except of motor vehicles and motorcycles' => 'Commerce de gros, autre que de véhicules à moteur et motos',
		'Retail trade, except of motor vehicles and motorcycles' => 'Commerce de détail, autre que de véhicules à moteur et motos',
		'Land transport and transport via pipelines' => 'Transport terrestre et transport par canalisations',
		'Water transport' => 'Transport par eau',
		'Air transport' => 'Transport aérien',
		'Warehousing and support activities for transportation' => 'Entreposage et activités de soutien au transport',
		'Postal and courier activities' => 'Activités postales et de messagerie',
		'Accommodation' => 'Hébergement',
		'Food and beverage service activities' => 'Activités de service d`aliments et de boissons',
		'Publishing activities' => 'Activités d`édition',
		'Motion picture, video and television programme production, sound recording and music publishing activities' => 'Activités de production cinématographique, vidéo et télévisée, d`enregistrement de sons et d`édition de musique',
		'Programming and broadcasting activities' => 'Activités de programmation et de diffusion',
		'Telecommunications' => 'Télécommunications',
		'Computer programming, consultancy and related activities' => 'Programmation d`ordinateurs, conseils informatiques et activités connexes',
		'Information service activities' => 'Activités de service d`information',
		'Financial and insurance activities' => 'Activités financières et d`assurance',
		'Financial service activities, except insurance and pension funding' => 'Activités financières, autres que les assurances et le financement des retraites',
		'Insurance, reinsurance and pension funding, except compulsory social security' => 'Assurance, réassurance et financement des retraites, autres que sécurité sociale obligatoire',
		'Activities auxiliary to financial service and insurance activities' => 'Activités auxiliaires des activités et services financiers',
		'Activities of head offices; management consultancy activities' => 'Activités des sièges sociaux; activités de conseil en gestion',
		'Architectural and engineering activities; technical testing and analysis' => 'Activités d`architecture et d`ingénierie; analyses et tests techniques',
		'Scientific research and development' => 'Recherche et développement scientifiques',
		'Advertising and market research' => 'Publicité et étude de marché',
		'Other professional, scientific and technical activities' => 'Autres activités professionnelles, scientifiques et techniques',
		'Veterinary activities' => 'Activités vétérinaires',
		'Rental and leasing activities' => 'Activités de location et crédit-bail',
		'Employment activities' => 'Activités liées à l`emploi',
		'Travel agency, tour operator, reservation service and related activities' => 'Agences de voyage, organisateurs de voyages, service de réservation et activités connexes',
		'Security and investigation activities' => 'Activités liées à la sécurité et aux enquêtes',
		'Services to buildings and landscape activities' => 'Services pour bâtiments et activités paysagères',
		'Office administrative, office support and other business support activities' => 'Service administratifde bureau, soutien de bureau et autres activités d`assistance commerciale',
		'Human health activities' => 'Activités liées à la santé humaine',
		'Residential care activities' => 'Activités de soins en établissement',
		'Social work activities without accommodation' => 'Activités de travail social sans hébergement',
		'Creative, arts and entertainment activities' => 'Activités créatives, artistiques et de divertissement',
		'Libraries, archives, museums and other cultural activities' => 'Bibliothèques, archives, musées et autres activités culturelles',
		'Gambling and betting activities' => 'Activités de paris et de jeux d`argent',
		'Sports activities and amusement and recreation activities' => 'Activités sportives, récréatives et de loisirs',
		'Activities of membership organizations' => 'Activités d`organisations membres',
		'Repair of computers and personal and household goods' => 'Réparation d`ordinateurs et de produits personnels et ménagers',
		'Other personal service activities' => 'Autres activités de service à la personne',
		'Activities of households as employers of domestic personnel' => 'Activités de ménages comme employeurs de personnel domestique',
		'Undifferentiated goods- and services-producing activities of private households for own use' => 'Activités de production de produits- et services- non différenciés de ménages privés pour leur propre usage',		
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
$GLOBALS['app_list_strings']['osy_services_companies_mode_of_intervention_list'] = array (
	'Telephone' => 'Téléphone',
	'Mail' => 'Email',
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




$app_strings['LBL_GROUPTAB2_1360916369'] = 'Marketing/Communications';

$app_list_strings['moduleList']['Contacts']='Contacts de membre';
$app_list_strings['moduleListSingular']['Contacts']='Contact de membre';
$GLOBALS['app_list_strings']['accounts_type_of_business_list']=array (
  '' => '',
  'Private company' => 'Société privée',
  'Public company' => 'Société publique',
  'Partly state-owned company' => 'Société en partie détenue par l`Etat',
  'NGO' => 'ONG',
  'Sole proprietorship' => 'Actionnaire privé unique',
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
	'Final Stage' => 'Phase finale'
	//'Converted' => 'Converti',
	//'Paid' => 'Payé'
);

$app_list_strings['moduleList']['osy_service']='Activités de groupe';
$app_list_strings['moduleListSingular']['osy_service']='Activité de groupe';
$GLOBALS['app_list_strings']['gender_0']=array (
  '' => '',
  'male' => 'Homme',
  'female' => 'Femme',
);
$GLOBALS['app_list_strings']['classification_list']=array (
  '' => '',
  'press' => 'Presse',
  'trade_union' => 'Syndicats',
  'politicians' => 'Politiques',
  'media' => 'Médias/Journalistes',
  'governement' => 'Gouvernement',
  'other_business_org' => 'Autres organisations professionnelles',
  'private_companies' => 'Sociétés du secteur privé',
);
$GLOBALS['app_list_strings']['osy_member_type_list']=array (
  'Direct Company' => 'Membre direct',
  'Association' => 'Association',
  'Indirect Member' => 'Membre indirect',
);
$GLOBALS['app_list_strings']['is_training_pck_list']=array (
  'no' => 'Non',
  'yes' => 'Oui',
);
$GLOBALS['app_list_strings']['unionization_list']=array (
  '' => '',
  'yes' => 'Oui',
  'no' => 'Non',
  'in_negotiation' => 'Négotiation en cours',
);
$GLOBALS['app_list_strings']['size_list']=array (
  '' => '',
  'small' => 'Petite',
  'medium' => 'Moyenne',
  'large' => 'Grande',
);
$app_strings['LBL_GROUPTAB4_1368110304'] = 'Settings';

$app_list_strings['moduleList']['ZuckerReports']='Rapport de facturation';
$app_list_strings['moduleList']['KReports']='Rapport général';
$app_list_strings['moduleListSingular']['ZuckerReports']='Rapport de facturation';
$app_list_strings['moduleListSingular']['KReports']='Rapport général';
$GLOBALS['app_list_strings']['osy_industries_list']=array (
  'Agriculture, forestry and fishing' => 'Agriculture, sylviculture et pêche',
  'Mining and quarrying' => 'Industries extractrices',
  'Manufacturing' => 'Fabrication',
  'Electricity, gas, steam and air conditioning supply' => 'Fourniture d`électricité, gaz, vapeur et climatisation',
  'Water supply; sewerage, waste management and remediation activities' => 'Distribution d`eau; égouts, gestion des déchets et activités de remédiation',
  'Construction' => 'Construction',
  'Wholesale and retail trade; repair of motor vehicles and motorcycles' => 'Commerce de gros et de détail; réparation de véhicules à moteur et motos',
  'Transportation and storage' => 'Transport et entreposage',
  'Accommodation and food service activities' => 'Activités liées à l`hébergement et au service d`aliments',
  'Information and communication' => 'Information et communication',
  'Real estate activities' => 'Activités immobilières',
  'Professional, scientific and technical activities' => 'Activités professionnelles, scientifiques et techniques',
  'Legal and accounting activities' => 'Activités juridiques et comptables',
  'Administrative and support service activities' => 'Activités administratives et de services d`assistance',
  'Public administration and defence; compulsory social security' => 'Administration publique et défense; sécurité sociale obligatoire',
  'Education' => 'Education',
  'Human health and social work activities' => 'Activités liées à la santé humaine et au travail social',
  'Arts, entertainment and recreation' => 'Arts, divertissements et loisirs',
  'Other service activities' => 'Autres activités de service',
  'Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use' => 'Activités de ménages comme employeurs; activités de production de produits- et services- non différenciés de ménages pour leur propre usage',
  'Activities of extraterritorial organizations and bodies' => 'Activités d`organisations et organes extraterritoriaux',
);

$GLOBALS['app_list_strings']['type_of_potential_members_list']=array (
	'Potential Direct Member' => 'Membre potentiel direct',
	'Potential Indirect Member' => 'Membre potentiel indirect',
	'Potential Association' => 'Association potentielle',
);


$app_strings['LBL_TABGROUP_ACTIVITIES'] = 'Activités';

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% étrangère',
  '100% national-owned' => '100% nationale',
  'Mainly foreign-owned' => 'Principalement étrangère',
  'Mainly national-owned' => 'Principalement nationale',
  'Half/half' => 'Moitié/moitié',
  'Other' => 'Autre',
);
$GLOBALS['app_list_strings']['service_status_list']=array (
  '' => '',
  'in_progress' => 'En cours',
  'completed' => 'Terminé',
);
$GLOBALS['app_list_strings']['campaign_status_dom']=array (
  '' => '',
  'Planning' => 'Planifiée',
  'Active' => 'En cours',
  'Complete' => 'Terminée',
);
$GLOBALS['app_list_strings']['prospect_list_type_dom']=array (
		'default' => 'Par défaut',
		'test' => 'Test',
);
$GLOBALS['app_list_strings']['service_status_0']=array (
  '' => '',
  'in_progress' => 'En cours',
  'completed' => 'Terminé',
);
$app_strings['LBL_GROUPTAB5_1378463078'] = 'Rapports';

$GLOBALS['app_list_strings']['payment_status_list']=array (
  '' => '',
  'paid' => 'Payé',
  'not_paid' => 'Non payé',
);



// ﻿ELENCO LABEL MANCANTI in FRANCESE
$GLOBALS['app_list_strings']['osy_contact_type_list']['7']='Production';
$GLOBALS['app_list_strings']['osy_contact_type_list']['8']='Administration';
$GLOBALS['app_list_strings']['osy_member_type_list']['Association']='Association';
$GLOBALS['app_list_strings']['osy_industries_list']['Construction']='Construction';
$GLOBALS['app_list_strings']['osy_industries_list']['Education']='Éducation';
$GLOBALS['app_list_strings']['osy_gender_list']['male']='Homme';
$GLOBALS['app_list_strings']['osy_gender_list']['female']='Femme';
$GLOBALS['app_list_strings']['service_detail_list']['pub']='Publications';
$GLOBALS['app_list_strings']['wfm_process_status_list']['active']='Actif';
$GLOBALS['app_list_strings']['wfm_process_status_list']['inactive']='Inactif';
$GLOBALS['app_list_strings']['wfm_trigger_type_list']['logic_hook']='Crochet Logique';
$GLOBALS['app_list_strings']['wfm_trigger_type_list']['scheduled']='Planifié';
$GLOBALS['app_list_strings']['wfm_trigger_type_list']['subprocess']='Sous-processus';
$GLOBALS['app_list_strings']['wfm_trigger_event_list']['on_create']='À Créer';
$GLOBALS['app_list_strings']['wfm_trigger_event_list']['on_modify']='À Modifier';
$GLOBALS['app_list_strings']['wfm_trigger_event_list']['on_modify__before_save']='À Modifier Avant de Sauvegarder';
$GLOBALS['app_list_strings']['wfm_trigger_event_list']['on_delete']='À Eliminer';
$GLOBALS['app_list_strings']['wfm_trigger_event_list_not_users']['on_create']='À Créer / En Création';
$GLOBALS['app_list_strings']['wfm_trigger_event_list_not_users']['on_modify']='À Modifier / En Modification';
$GLOBALS['app_list_strings']['wfm_trigger_event_list_not_users']['on_modify__before_save']= 'À Modifier Avant de Sauvegarder';
$GLOBALS['app_list_strings']['wfm_trigger_event_list_not_users']['on_delete']='À Eliminer';
$GLOBALS['app_list_strings']['wfm_events_type_list']['start']='Début';
$GLOBALS['app_list_strings']['wfm_events_type_list']['intermediate']='Intermédiaire';
$GLOBALS['app_list_strings']['wfm_events_type_list']['cancel']='Annuler';
$GLOBALS['app_list_strings']['wfm_scheduled_type_list']['sequential']='Séquentiel';
$GLOBALS['app_list_strings']['wfm_scheduled_type_list']['parallel']='Parallèle';
$GLOBALS['app_list_strings']['wfm_working_node_priority']['logic_hook']='Array';
$GLOBALS['app_list_strings']['wfm_working_node_priority']['subprocess']='-1';
$GLOBALS['app_list_strings']['wfm_working_node_priority']['scheduled']='-4';
$GLOBALS['app_list_strings']['wfm_activity_type_list']['foreach_ingroup']='Pour Chacun dans le Groupe';
$GLOBALS['app_list_strings']['wfm_task_delay_type_list']['no_delay']='Sans Délai';
$GLOBALS['app_list_strings']['wfm_task_delay_type_list']['on_creation']='En Création';
$GLOBALS['app_list_strings']['wfm_task_delay_type_list']['on_modification']='En Modification';
$GLOBALS['app_list_strings']['wfm_task_delay_type_list']['on_finish_previous_task']='Fin tâche précédente';
$GLOBALS['app_list_strings']['wfm_task_type_list']['send_email']='Envoyer Courrier Électronique';
$GLOBALS['app_list_strings']['wfm_task_type_list']['php_custom']='PHP Adapter';
$GLOBALS['app_list_strings']['wfm_task_type_list']['continue']='Continuer';
$GLOBALS['app_list_strings']['wfm_task_type_list']['end']='Fin';
$GLOBALS['app_list_strings']['wfm_task_type_list']['create_object']='Créer Objet';
$GLOBALS['app_list_strings']['wfm_task_type_list']['modify_object']='Modifier Objet';
$GLOBALS['app_list_strings']['wfm_task_type_list']['call_process']='Call Process';
$GLOBALS['app_list_strings']['wfm_task_type_list']['add_custom_variables']='Ajouter Variables Personnalisées';
$GLOBALS['app_list_strings']['wfm_login_audit_action_list']['login_failed']='Accès Refusé';
$GLOBALS['app_list_strings']['wfm_login_audit_action_list']['after_login']='Connexion';
$GLOBALS['app_list_strings']['wfm_login_audit_action_list']['before_logout']='Déconnexion';

$GLOBALS['app_list_strings']['wfm_add_custom_variables_type']['sql']='SQL';
$GLOBALS['app_list_strings']['wfm_add_custom_variables_type']['php_eval']='PHP eval';
$GLOBALS['app_list_strings']['wfm_add_custom_variables_type']['literal']='Littéral';
$GLOBALS['app_list_strings']['wfm_delay_time']['minutes']='Minutes';
$GLOBALS['app_list_strings']['wfm_delay_time']['hours']='Heures';
$GLOBALS['app_list_strings']['wfm_delay_time']['days']='Jours';
$GLOBALS['app_list_strings']['wfm_delay_time']['weeks']='Semaines';
$GLOBALS['app_list_strings']['wfm_delay_time']['months']='Mois';
$GLOBALS['app_list_strings']['wfm_delay_time_amount']['minutes']='60';
$GLOBALS['app_list_strings']['wfm_delay_time_amount']['hours']='24';
$GLOBALS['app_list_strings']['wfm_delay_time_amount']['days']='31';
$GLOBALS['app_list_strings']['wfm_delay_time_amount']['weeks']='4';
$GLOBALS['app_list_strings']['wfm_delay_time_amount']['months']='12';
$GLOBALS['app_list_strings']['wfm_working_node_status']['not_started']='Non Initié';
$GLOBALS['app_list_strings']['wfm_working_node_status']['executing']='Mise en œuvre';
$GLOBALS['app_list_strings']['wfm_working_node_status']['delayed_by_activity']='Délai Par Activité';
$GLOBALS['app_list_strings']['wfm_working_node_status']['delayed_by_task']='Délai Par Tâche';
$GLOBALS['app_list_strings']['wfm_working_node_status']['in_progress']='En Cours';
$GLOBALS['app_list_strings']['wfm_working_node_status']['terminated']='Complété';
$GLOBALS['app_list_strings']['wfm_working_node_status']['held']='Tenu';

// Valori di dropdown mancanti:
$GLOBALS['app_list_strings']['osy_membership_status_list']=array ();
$GLOBALS['app_list_strings']['osy_membership_status_list']['Active']='Actif';
$GLOBALS['app_list_strings']['osy_membership_status_list']['Expiring']='Expirant';
$GLOBALS['app_list_strings']['osy_membership_status_list']['Suspended']='Suspendu';
$GLOBALS['app_list_strings']['osy_membership_status_list']['Elapsed']='Caduc';
$GLOBALS['app_list_strings']['osy_membership_status_list']['Closed']='Fermé';
$GLOBALS['app_list_strings']['osy_role_function_list']['President_of_the_Board']='Président du Conseil';
$GLOBALS['app_list_strings']['osy_role_function_list']['CEO']='PDG';
$GLOBALS['app_list_strings']['osy_role_function_list']['Director_General']='Directeur Général';
$GLOBALS['app_list_strings']['osy_role_function_list']['Secretary_General']='Secrétaire Général';
$GLOBALS['app_list_strings']['osy_role_function_list']['HR_Manager_Director']='Responsable RH';
$GLOBALS['app_list_strings']['osy_role_function_list']['Finance_Manager']='Responsable Finances';
$GLOBALS['app_list_strings']['osy_role_function_list']['OSH_Manager']='Responsable SST';
$GLOBALS['app_list_strings']['osy_role_function_list']['Industrial_Relations_Manager']='Responsable Relations Sociales';
$GLOBALS['app_list_strings']['osy_role_function_list']['CSR_Manager']='Responsable RSE';
$GLOBALS['app_list_strings']['osy_role_function_list']['Communication_PR']='Communication / RP';
$GLOBALS['app_list_strings']['osy_role_function_list']['Environment_and_Energy_Manager']='Responsable Environnement et Énergie';
$GLOBALS['app_list_strings']['osy_role_function_list']['Other_Manager']='Autre Responsable';
$GLOBALS['app_list_strings']['osy_role_function_list']['Legal_Advisor']='Conseiller Juridique';
$GLOBALS['app_list_strings']['osy_role_function_list']['Assistant_CEO']='Assistant du PDG';
$GLOBALS['app_list_strings']['osy_role_function_list']['Assistant_generic']='Assistant (générique)';
$GLOBALS['app_list_strings']['osy_role_function_list']['Other']='Autre';

$GLOBALS['app_list_strings']['moduleList']['Emails']='Email général';
$GLOBALS['app_list_strings']['moduleList']['osy_contactspotentialmember']='Contacts de membres potentiels';
$GLOBALS['app_list_strings']['moduleList']['osy_gestione_pagamento']='Honoraires des activités de groupe';
$GLOBALS['app_list_strings']['industry_dom']['Education']='éducation';
$GLOBALS['app_list_strings']['industry_dom']['Finance']='Finance';

$GLOBALS['app_list_strings']['activity_dom']['Call']='Appels';
$GLOBALS['app_list_strings']['activity_dom']['Meeting']='Réunions';
$GLOBALS['app_list_strings']['activity_dom']['Task']='Tache';
$GLOBALS['app_list_strings']['activity_dom']['Email']='Email général';
$GLOBALS['app_list_strings']['activity_dom']['Note']='Note';
$GLOBALS['app_list_strings']['salutation_dom']['Dr.']='Dr.';
$GLOBALS['app_list_strings']['salutation_dom']['Prof.']='Prof.';
$GLOBALS['app_list_strings']['record_type_display']['Leads']='Membre Potentiel';
$GLOBALS['app_list_strings']['record_type_display']['Contacts']='Contacts';
$GLOBALS['app_list_strings']['record_type_display_notes']['Contacts']='Contact';
$GLOBALS['app_list_strings']['record_type_display_notes']['Emails']='Email général';
$GLOBALS['app_list_strings']['campainglog_target_type_dom']['Leads']='Membre Potentiel';

$GLOBALS['app_list_strings']['osy_committees']['1']='Conseil';
$GLOBALS['app_list_strings']['osy_committees']['2']='Comité exécutif';
$GLOBALS['app_list_strings']['osy_committees']['3']='Comité directeur';
$GLOBALS['app_list_strings']['osy_committees']['4']='Affaires sociales';
$GLOBALS['app_list_strings']['osy_committees']['5']='Dialogue Social';
$GLOBALS['app_list_strings']['osy_committees']['6']='éducation';
$GLOBALS['app_list_strings']['osy_committees']['7']='Emploi';
$GLOBALS['app_list_strings']['osy_committees']['8']='SST';
$GLOBALS['app_list_strings']['osy_committees']['9']='Protection Sociale';
$GLOBALS['app_list_strings']['osy_committees']['10']='Relations industrielles';
$GLOBALS['app_list_strings']['osy_committees']['11']='Infrastructure';
$GLOBALS['app_list_strings']['osy_committees']['12']='Affaires juridiques';
$GLOBALS['app_list_strings']['osy_committees']['13']='PME';
$GLOBALS['app_list_strings']['osy_committees']['14']='Affaires publiques';
$GLOBALS['app_list_strings']['osy_committees']['15']='Relations internationales';
$GLOBALS['app_list_strings']['osy_committees']['16']='Fiscalité';


$GLOBALS['app_list_strings']['osy_association_member_type_list']['2']='Territorial';
$GLOBALS['app_list_strings']['osy_territorials_list']['2']='Province';
$GLOBALS['app_list_strings']['osy_member_categories_list']['3']='Bronze';
$GLOBALS['app_list_strings']['osy_contact_type_list']['7']='Production';
$GLOBALS['app_list_strings']['osy_contact_type_list']['8']='Administration';
$GLOBALS['app_list_strings']['osy_member_type_list']['Association']='Association';
$GLOBALS['app_list_strings']['osy_industries_list']['Construction']='Construction';

$app_strings['LBL_CONTACT']='Contact';
$app_strings['LBL_CONTACTS']='Contacts';
$app_strings['LBL_DOCUMENTS']='Documents';

$app_strings['LBL_IMPORT']='Importer';
$app_strings['LBL_LEADS']='Membre Potentiel';
$app_strings['LBL_OSY_RETURN_CAMPAIGN']='Retour aux Campagnes marketing';

$app_strings['LBL_GROUPTAB2_1360916369']='Marketing/Communications';
$app_strings['LBL_GROUPTAB4_1368110304']='Paramètres';
$app_strings['LBL_GENERATE_EXPORT_FILE']='Exporter';
$app_strings['LBL_CANCEL_EXPORT']='Annuler';
$app_strings['MSG_JS_ALERT_MTG_REMINDER_LOC']='Lieu:';

$GLOBALS['app_list_strings']['pdf_template_type_dom']=array (
  'AOS_Quotes' => 'Offres',
  'AOS_Invoices' => 'Factures',
  'Accounts' => 'Comptes',
  'Contacts' => 'Contacts',
  'Leads' => 'Leads',
  'AOS_Contracts' => 'Contracts',
  'Opportunities' => 'Opportunities',
);
$GLOBALS['app_list_strings']['campaign_type_dom']=array (
  '' => '',
  'Email' => 'Email',
  'NewsLetter' => 'Newsletter',
);

$app_strings['LBL_GENERATE_WEB_TO_CONTACT_FORM'] = 'Générer Forme';
$app_strings['LBL_SAVE_WEB_TO_CONTACT_FORM'] = 'Enregistrer le Formulaire Web'; 
$app_strings['LBL_ARE_YOU_A_MEMBER'] = 'êtes -vous membre de notre organisation?';
$app_strings['LBL_COMPANY_CODE'] = 'Code de membre';
$app_strings['LBL_GENERATE_LETTER'] = 'Generate Letter';
$app_strings['LBL_EMAIL_OPT_OUT'] = 'Ne veut pas recevoir d&#39;email';

$app_list_strings['moduleList']['FP_events']='Evénements';
$app_list_strings['moduleListSingular']['FP_events']='Evénement';
$app_list_strings['moduleListSingular']['osy_payment_management']='Gestion du Paiement';
$app_list_strings['moduleList']['osy_payment_management']='Gestion des Paiements';
$app_list_strings['moduleList']['Surveys']='Sondages';
$app_list_strings['moduleListSingular']['Surveys']='Sondage';
$GLOBALS['app_list_strings']['survey_status_list']=array (
    'Draft' => 'Brouillon',
    'Public' => 'Publié',
    'Closed' => 'Fermé',
);


$app_strings['LBL_BULK_ACTION_BUTTON_LABEL'] = 'ACTION DE MASSE';
$app_strings['LBL_PRINT_AS_PDF'] = 'Imprimer en PDF';
$app_strings['LNK_BASIC_FILTER'] = 'Filtre rapide';
$app_strings['LBL_QUICK_FILTER'] = 'Filtre rapide';
$mod_strings['LBL_SELECT_DELEGATES'] = 'Sélectionner les participants';
$mod_strings['LBL_SELECT_DELEGATES_TITLE'] = 'Sélectionner les participants:-';
$mod_strings['LBL_MANAGE_DELEGATES'] = 'Gestion des participants';
$mod_strings['LBL_MANAGE_DELEGATES_TITLE'] = 'Gestion des participants:-';
$app_strings['LBL_YES'] = 'Oui';
$app_strings['LBL_NO'] = 'Non';

$app_strings['LBL_FILTER_HEADER_TITLE'] = 'Filtre';
$app_strings['LBL_EMAIL_OPT_OUT'] = 'Ne veut pas recevoir d&#39;email';