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

$app_list_strings['moduleList']['ProspectLists'] = 'Listas';
$app_list_strings['moduleList']['Accounts'] = 'Miembros';
$app_list_strings['moduleList']['Leads'] = 'Miembros Potenciales';
$app_list_strings['moduleList']['Campaigns'] = 'Sistema de correos colectivos';


$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_LABEL'] = 'Añadir a la Lista';
$app_strings['LBL_ADD_TO_PROSPECT_LIST_BUTTON_TITLE'] = 'Añadir a la Lista';

//custom/modules/Activities/views/view.popup.php
$app_strings['DATA_TYPE_END'] = 'Final:'; 
$app_strings['DATA_TYPE_ENTERED'] = 'Creado:'; 

$app_strings['LBL_CREATE_CAMPAIGNS'] = 'Preparar correo electrónico';
$app_strings['LBL_NAME_CAMPAIGNS'] = 'Asunto-tipo de servicio';

$app_strings['LBL_STAMPA_FATTURA'] = 'Imprimir Factura';


/* members dropdown */
$GLOBALS['app_list_strings']['osy_nr_employees_list']=array (
		'' => '',
		'From 1 to 10' => 'Del 1 al 10',
		'From 11 to 20' => 'Del 11 al 20',
		'From 21 to 50' => 'Del 21 al 50',
        'From 51 to 100' => 'Del 51 al 100',
		'From 101 to 200' => 'Del 101 al 200',
		'From 201 to 500' => 'Del 201 al 500',
		'From 501 to 1000' => 'Del 501 al 1000',
		'More than 1000' => 'Más de 1000',
);
/*
$GLOBALS['app_list_strings']['osy_contract_list']=array (
		'' => '',
		1 => 'Incluido',
		2 => 'Excluido',
);
*/
$GLOBALS['app_list_strings']['osy_association_member_type_list']=array (
		'' => '',
		1 => 'Sectorial',
		2 => 'Territorial',
		3 => 'Otros',
);

$GLOBALS['app_list_strings']['osy_territorials_list']=array (
		'' => '',
		1 => 'Condado',
		2 => 'Provincia',
		3 => 'Ciudades',
);

$GLOBALS['app_list_strings']['osy_member_categories_list']=array (
		'' => '',
		1 => 'Oro',
		2 => 'Plata',
		3 => 'Bronce',
);

$GLOBALS['app_list_strings']['osy_membership_status_list']=array (
		'' => '',		
		'Active' => 'En orden',
		'Expiring' => 'A punto de vencer',
		'Suspended' => 'Retraso',
		'Elapsed' => 'No pagada',
        'Closed' => 'Cerrado',
);

$GLOBALS['app_list_strings']['osy_levels_list']=array (
		'' => '',
		1 => 'Ordinario',
		2 => 'Subcategorías',
);

/* contacts dropdown */
$GLOBALS['app_list_strings']['osy_categories_list']=array (
		'' => '',
		1 => 'Interno',
		2 => 'Externo',
);
/* opportunities dropdown */

$GLOBALS['app_list_strings']['osy_subscription_type_list']=array (
		'' => '',
		1 => 'suscripción tipo 1',
		2 => 'suscripción tipo 2',
		3 => 'suscripción tipo 3',
);

$GLOBALS['app_list_strings']['osy_subscription_criteria_list']=array (
		'' => '',
		1 => 'criterio de suscripción 1',
		2 => 'criterio de suscripción 2',
		3 => 'criterio de suscripción 3',
);

$GLOBALS['app_list_strings']['osy_subscription_duration_list']=array (
		'' => '',
		1 => 'duración de suscripción 1',
		2 => 'duración de suscripción 2',
		3 => 'duración de suscripción 3',
);

$GLOBALS['app_list_strings']['osy_next_action_list']=array (
		'' => '',
		1 => 'siguiente acción de suscripción 1',
		2 => 'siguiente acción de suscripción 2',
		3 => 'siguiente acción de suscripción 3',
		);

$GLOBALS['app_list_strings']['osy_payment_status_list']=array (
		'' => '',
		1 => 'Pagado',
		2 => 'No Pagado',
);





$app_strings['LBL_TABGROUP_SALES'] = 'Membresía';

$app_strings['LBL_TABGROUP_SUPPORT'] = 'Facturación';

$app_list_strings['moduleList']['Leads']='Miembros Potenciales';
$app_list_strings['moduleListSingular']['Leads']='Miembro Potencial';
$app_list_strings['parent_type_display']['Leads']='Miembro Potencial';


$app_list_strings['parent_type_display']=array (
	'Accounts' => 'Miembro',
	'Leads' => 'Miembro Potencial',
	'ProspectLists' => 'ListadePosibilidades',
	'osy_services_companies' => 'Servicios para empresas individuales',
	'osy_service' => 'Eventos',
);

$GLOBALS['app_list_strings']['accounts_subcategories_list']=array (
		'Crop and animal production, hunting and related service activities' => 'Producción vegetal y animal, caza y actividades de servicios relacionados',
		'Forestry and logging' => 'Silvicultua y tala',
		'Fishing and aquaculture' => 'Pesca y acuicultura',
		'Mining of coal and lignite' => 'Minería de carbón y lignito',
		'Extraction of crude petroleum and natural gas' => 'Extracción de petróleo crudo y gas natural',
		'Mining of metal ores' => 'Minería de metales mineralizados',
		'Other mining and quarrying' => 'Otra minería y canteras',
		'Mining support service activities' => 'Actividades de servicios auxiliares mineros',
		'Manufacture of food products' => 'Elaboración de productos alimenticios',
		'Manufacture of beverages' => 'Elaboración de bebidas',
		'Manufacture of tobacco products' => 'Elaboración de productos de tabaco',
		'Manufacture of textiles' => 'Fabricación de textiles',
		'Manufacture of wearing apparel' => 'Confección de prendas de vestir',
		'Manufacture of leather and related products' => 'Manufactura de cuero y marroquinería',
		'Manufacture of wood and of products of wood and cork, except furniture; manufacture of articles of straw and plaiting materials' => 'Elaboración de madera y de productos de madera y corcho, excepto muebles; confección de artículos de paja y materiales trenzables',
		'Manufacture of paper and paper products' => 'Elaboración de papel y productos de papel',
		'Printing and reproduction of recorded media' => 'Impresión y reproducción de material grabado',
		'Manufacture of coke and refined petroleum products' => 'Producción de coque y productos refinados del petróleo',
		'Manufacture of chemicals and chemical products' => 'Elaboración de sustancias químicas y productos químicos',
		'Manufacture of basic pharmaceutical products and pharmaceutical preparations' => 'Elaboración de productos farmacéuticos básicos y preparados farmacéuticos',
		'Manufacture of rubber and plastics products' => 'Fabricación de productos de caucho y plástico',
		'Manufacture of other non-metallic mineral products' => 'Fabricación de otros productos minerales no metálicos',
		'Manufacture of basic metals' => 'Fabricación de metales básicos',
		'Manufacture of fabricated metal products, except machinery and equipment' => 'Fabricación de productos metálicos, excepto maquinaria y equipo',
		'Manufacture of computer, electronic and optical products' => 'Fabricación de PC, productos ópticos y electrónicos',
		'Manufacture of electrical equipment' => 'Fabricación de equipos eléctricos',
		'Manufacture of machinery and equipment n.e.c.' => 'Fabricación de maquinaria y equipo n.e.c.',
		'Manufacture of motor vehicles, trailers and semi-trailers' => 'Fabricación de vehículos motorizados, trailers y semitrailers',
		'Manufacture of other transport equipment' => 'Fabricación de otros equipos de transporte',
		'Manufacture of furniture' => 'Fabricación de muebles',
		'Other manufacturing' => 'Otras industrias manufactureras',
		'Repair and installation of machinery and equipment' => 'Reparación e instalación de maquinaria y equipo',
		'Water collection, treatment and supply' => 'Recogida, tratamiento y suministro de agua',
		'Sewerage' => 'Alcantarillado',
		'Waste collection, treatment and disposal activities; materials recovery' => 'Actividades de recogida, tratamiento y eliminación de residuos; recuperación de materiales',
		'Remediation activities and other waste management services' => 'Actividades de reparación y otros servicios de gestión de residuos',
		'Construction of buildings' => 'Construcción de edificios',
		'Civil engineering' => 'Ingeniería civil',
		'Specialized construction activities' => 'Actividades de construcción epecializada',
		'Wholesale and retail trade and repair of motor vehicles and motorcycles' => 'Comercio al por mayor y menor y reparación de vehículos motorizados y motocicletas',
		'Wholesale trade, except of motor vehicles and motorcycles' => 'Comercio al por mayor, excepto de vehículos motorizados y motocicletas',
		'Retail trade, except of motor vehicles and motorcycles' => 'Comercio al por menor, excepto de vehículos motorizados y motocicletas',
		'Land transport and transport via pipelines' => 'Transporte terrestre y transporte a través de tuberías',
		'Water transport' => 'Transporte acuático',
		'Air transport' => 'Transporte aéreo',
		'Warehousing and support activities for transportation' => 'Almacenamiento y actividades auxiliares para el transporte',
		'Postal and courier activities' => 'Actividades postales y de correos',
		'Accommodation' => 'Hospedaje',
		'Food and beverage service activities' => 'Actividades de servicio de alimentos y bebidas',
		'Publishing activities' => 'Actividades de edición',
		'Motion picture, video and television programme production, sound recording and music publishing activities' => 'Producción de películas, programas de video y televisión, actividades de grabación de sonido y edición de música',
		'Programming and broadcasting activities' => 'Actividades de programación y radiodifusión',
		'Telecommunications' => 'Telecomunicaciones',
		'Computer programming, consultancy and related activities' => 'Programación de PC, consultoría y actividades relacionadas',
		'Information service activities' => 'Actividades de servicios de información',
		'Financial and insurance activities' => 'Actividades financieras y de seguros',
		'Financial service activities, except insurance and pension funding' => 'Actividades de servicios financieros, excepto seguros y fondos de pensiones',
		'Insurance, reinsurance and pension funding, except compulsory social security' => 'Seguros, reaseguros y fondos de pensiones, excepto la seguridad social obligatoria',
		'Activities auxiliary to financial service and insurance activities' => 'Actividades auxiliares a los servicios financieros y los seguros',
		'Activities of head offices; management consultancy activities' => 'Actividades de las sedes centrales; actividades de consultoría de gestión',
		'Architectural and engineering activities; technical testing and analysis' => 'Actividades de arquitectura e ingeniería; análisis y pruebas técnicas',
		'Scientific research and development' => 'Investigación y desarrollo científico',
		'Advertising and market research' => 'Publicidad e investigación de mercado',
		'Other professional, scientific and technical activities' => 'Otras actividades profesionales, científicas y técnicas',
		'Veterinary activities' => 'Actividades veterinarias',
		'Rental and leasing activities' => 'Actividades de alquiler y arrendamiento con opción de compra',
		'Employment activities' => 'Actividades de trabajo',
		'Travel agency, tour operator, reservation service and related activities' => 'Agencia de viajes, operador turístico, servicios de reservas y otras actividades relacionadas',
		'Security and investigation activities' => 'Actividades de seguridad e investigación',
		'Services to buildings and landscape activities' => 'Actividades de servicio a edificios y jardines',
		'Office administrative, office support and other business support activities' => 'Actividades administrativas, auxiliares de oficina y otras actividades auxiliares a las empresas',
		'Human health activities' => 'Actividades sobre la salud humana',
		'Residential care activities' => 'Actividades de atención residencial',
		'Social work activities without accommodation' => 'Actividades de servicio social sin hospedaje',
		'Creative, arts and entertainment activities' => 'Actividades creativas, de arte y entretenimiento',
		'Libraries, archives, museums and other cultural activities' => 'Bibliotecas, archivos, museos y otras actividades culturales',
		'Gambling and betting activities' => 'Actividades de apuestas y juegos de azar',
		'Sports activities and amusement and recreation activities' => 'Actividades deportivas y actividades de entretenimiento y esparcimiento',
		'Activities of membership organizations' => 'Actividades de organizaciones basadas en la membresía',
		'Repair of computers and personal and household goods' => 'Reparación de PC y bienes personales y domésticos',
		'Other personal service activities' => 'Otras actividades de servicios personales',
		'Activities of households as employers of domestic personnel' => 'Actividades de familias como empleadores de personal doméstico',
		'Undifferentiated goods- and services-producing activities of private households for own use' => 'Bienes y servicios no diferenciados que generan actividades de hogares privados para su propio uso',		
);

$GLOBALS['app_list_strings']['accounts_operating_markets_list'] = array (
	'' => '',
	'AF' => 'AFGANISTÁN',
	'AX' => 'ISLAS ALAND',
	'AL' => 'ALBANIA',
	'DZ' => 'ALGERIA',
	'AS' => 'SAMOA AMERICANA',
	'AD' => 'ANDORRA',
	'AO' => 'ANGOLA',
	'AI' => 'ANGUILA',
	'AQ' => 'ANTÁRTIDA',
	'AG' => 'ANTIGUA y BARBUDA',
	'AR' => 'ARGENTINA',
	'AM' => 'ARMENIA',
	'AW' => 'ARUBA',
	'AU' => 'AUSTRALIA',
	'AT' => 'AUSTRIA',
	'AZ' => 'AZERBAIYÁN',
	'BS' => 'BAHAMAS',
	'BH' => 'BAHREIN',
	'BD' => 'BANGLADESH',
	'BB' => 'BARBADOS',
	'BY' => 'BIELORUSSIA',
	'BE' => 'BÉLGICA',
	'BZ' => 'BELICE',
	'BJ' => 'BENÍN',
	'BM' => 'BERMUDA',
	'BT' => 'BHUTÁN',
	'BO' => 'BOLIVIA, ESTADO PLURINACIONAL DE',
	'BQ' => 'BONAIRE, SAN EUSTAQUIO Y SABA',
	'BA' => 'BOSNIA Y HERZEGOVINA',
	'BW' => 'BOTSWANA',
	'BV' => 'ISLA BOUVET',
	'BR' => 'BRASIL',
	'IO' => 'TERRITORIO BRITÁNICO DEL OCÉANO ÍNDICO',
	'BN' => 'BRUNEI DARUSSALAM',
	'BG' => 'BULGARIA',
	'BF' => 'BURKINA FASO',
	'BI' => 'BURUNDI',
	'KH' => 'CAMBOYA',
	'CM' => 'CAMERÚN',
	'CA' => 'CANADA',
	'CV' => 'CABO VERDE',
	'KY' => 'ISLA CAIMÁN',
	'CF' => 'REPÚBLICA CENTROAFRICANA',
	'TD' => 'CHAD',
	'CL' => 'CHILE',
	'CN' => 'CHINA',
	'CX' => 'ISLA DE NAVIDAD',
	'CC' => 'ISLAS COCOS (KEELING)',
	'CO' => 'COLOMBIA',
	'KM' => 'COMOROS',
	'CG' => 'CONGO',
	'CD' => 'CONGO, LA REPÚBLICA DEMOCRÁTICA DEL',
	'CK' => 'ISLAS COOK',
	'CR' => 'COSTA RICA',
	'CI' => 'COSTA DE MARFIL',
	'HR' => 'CROACIA',
	'CU' => 'CUBA',
	'CW' => 'CURASAO',
	'CY' => 'CHIPRE',
	'CZ' => 'REPÚBLICA CHECA',
	'DK' => 'DINAMARCA',
	'DJ' => 'DJIBOUTI',
	'DM' => 'DOMINICA',
	'DO' => 'REPÚBLICA DOMINICANA',
	'EC' => 'ECUADOR',
	'EG' => 'EGIPTO',
	'SV' => 'EL SALVADOR',
	'GQ' => 'GUINEA ECUATORIAL',
	'ER' => 'ERITREA',
	'EE' => 'ESTONIA',
	'ET' => 'ETIOPÍA',
	'FK' => 'ISLAS FALKLAND (MALVINAS)',
	'FO' => 'ISLAS FAROE',
	'FJ' => 'FIJI',
	'FI' => 'FINLANDIA',
	'FR' => 'FRANCIA',
	'GF' => 'GUAYANA FRANCESA',
	'PF' => 'POLINESIA FRANCESA',
	'TF' => 'TERRITORIOS FRANCESES DEL SUR',
	'GA' => 'GABÓN',
	'GM' => 'GAMBIA',
	'GE' => 'GEORGIA',
	'DE' => 'ALEMANIA',
	'GH' => 'GHANA',
	'GI' => 'GIBRALTAR',
	'GR' => 'GRECIA',
	'GL' => 'GROENLANDIA',
	'GD' => 'GRANADA',
	'GP' => 'GUADALUPE',
	'GU' => 'GUAM',
	'GT' => 'GUATEMALA',
	'GG' => 'GUERNSEY',
	'GN' => 'GUINEA',
	'GW' => 'GUINEA BISSAU',
	'GY' => 'GUYANA',
	'HT' => 'HAITÍ',
	'HM' => 'ISLA HEARD, Y LAS ISLAS MCDONALD',
	'VA' => 'SANTA SEDE (ESTADO DE LA CIUDAD DEL VATICANO)',
	'HN' => 'HONDURAS',
	'HK' => 'HONG KONG',
	'HU' => 'HUNGRÍA',
	'IS' => 'ISLANDIA',
	'IN' => 'INDIA',
	'ID' => 'INDONESIA',
	'IR' => 'IRÁN, REPÚBLICA ISLÁMICA DE',
	'IQ' => 'IRAK',
	'IE' => 'IRLANDA',
	'IM' => 'ISLA DE MAN',
	'IL' => 'ISRAEL',
	'IT' => 'ITALIA',
	'JM' => 'JAMAICA',
	'JP' => 'JAPÓN',
	'JE' => 'JERSEY',
	'JO' => 'JORDÁN',
	'KZ' => 'KAZAJISTÁN',
	'KE' => 'KENIA',
	'KI' => 'KIRIBATI',
	'KP' => 'COREA, REPÚBLICA DEMOCRÁTICA POPULAR DE',
	'KR' => 'COREA, REPÚBLICA DE',
	'KW' => 'KUWAIT',
	'KG' => 'KIRGUISTÁN',
	'LA' => 'LAO, REPÚBLICA DEMOCRÁTICA POPULAR',
	'LV' => 'LATVIA',
	'LB' => 'LÍBANO',
	'LS' => 'LESOTO',
	'LR' => 'LIBERIA',
	'LY' => 'LIBIA',
	'LI' => 'LIECHTENSTEIN',
	'LT' => 'LITUANIA',
	'LU' => 'LUXEMBURGO',
	'MO' => 'MACAO',
	'MK' => 'MACEDONIA, LA ANTIGUA REPÚBLICA YUGOSLAVA DE',
	'MG' => 'MADAGASCAR',
	'MW' => 'MALAWI',
	'MY' => 'MALASIA',
	'MV' => 'MALDIVAS',
	'ML' => 'MALI',
	'MT' => 'MALTA',
	'MH' => 'ISLAS MARSHALL',
	'MQ' => 'MARTINICA',
	'MR' => 'MAURITANIA',
	'MU' => 'MAURICIO',
	'YT' => 'MAYOTTE',
	'MX' => 'MÉXICO',
	'FM' => 'MICRONESIA, ESTADOS FEDERADOS DE',
	'MD' => 'MOLDAVIA, REPÚBLICA DE',
	'MC' => 'MÓNACO',
	'MN' => 'MONGOLIA',
	'ME' => 'MONTENEGRO',
	'MS' => 'MONTSERRAT',
	'MA' => 'MARRUECOS',
	'MZ' => 'MOZAMBIQUE',
	'MM' => 'MYANMAR',
	'NA' => 'NAMIBIA',
	'NR' => 'NAURU',
	'NP' => 'NEPAL',
	'NL' => 'LOS PAÍSES BAJOS',
	'NC' => 'NUEVA CALEDONIA',
	'NZ' => 'NUEVA ZELANDA',
	'NI' => 'NICARAGUA',
	'NE' => 'NIGER',
	'NG' => 'NIGERIA',
	'NU' => 'NIUE',
	'NF' => 'ISLA NORFOLK',
	'MP' => 'ISLAS MARIANAS SEPTENTRIONALES',
	'NO' => 'NORUEGA',
	'OM' => 'OMÁN',
	'PK' => 'PAQUISTÁN',
	'PW' => 'PALAU',
	'PS' => 'TERRITORIO PALESTINO, OCUPADO',
	'PA' => 'PANAMÁ',
	'PG' => 'PAPÚA NUEVA GUINEA',
	'PY' => 'PARAGUAY',
	'PE' => 'PERÚ',
	'PH' => 'FILIPINAS',
	'PN' => 'PITCAIRN',
	'PL' => 'POLONIA',
	'PT' => 'PORTUGAL',
	'PR' => 'PUERTO RICO',
	'QA' => 'QATAR',
	'RE' => 'REUNIÓN',
	'RO' => 'RUMANÍA',
	'RU' => 'FEDERACIÓN RUSA',
	'RW' => 'RUANDA',
	'BL' => 'SAN BARTOLOMÉ',
	'SH' => 'SANTA ELENA, ASCENCIÓN Y TRISTAN DA CUNHA',
	'KN' => 'ST KITTS Y NEVIS',
	'LC' => 'SANTA LUCÍA',
	'MF' => 'SAN MARTÍN (PARTE FRANCESA)',
	'PM' => 'SAN PEDRO Y MIQUELÓN',
	'VC' => 'SAN VICENTE Y LAS GRANADINAS',
	'WS' => 'SAMOA',
	'SM' => 'SAN MARINO',
	'ST' => 'SAN TOMÉ Y PRÍNCIPE',
	'SA' => 'ARABIA SAUDITA',
	'SN' => 'SENEGAL',
	'RS' => 'SERBIA',
	'SC' => 'SEYCHELLES',
	'SL' => 'SIERRA LEONA',
	'SG' => 'SINGAPUR',
	'SX' => 'SAN MARTÍN (PARTE HOLANDESA)',
	'SK' => 'ESLOVAQUIA',
	'SI' => 'ESLOVENIA',
	'SB' => 'ISLAS SALOMÓN' ,
	'SO' => 'SOMALIA',
	'ZA' => 'SUDÁFRICA',
	'GS' => 'ISLAS GEORGIAS DEL SUR Y SANDWICH DEL SUR',
	'SS' => 'SUDÁN MERIDIONAL',
	'ES' => 'ESPAÑA',
	'LK' => 'SRI LANKA',
	'SD' => 'SUDÁN',
	'SR' => 'SURINAM',
	'SJ' => 'SVALBARD Y JAN MAYEN',
	'SZ' => 'SUAZILANDIA',
	'SE' => 'SUECIA',
	'CH' => 'SUIZA',
	'SY' => 'SIRIA, REPÚBLICA ÁRABE',
	'TW' => 'TAIWÁN, PROVINCIA CHINA DE',
	'TJ' => 'TAYIKISTÁN',
	'TZ' => 'TANZANIA, REPÚBLICA UNIDA DE',
	'TH' => 'TAILANDIA',
	'TL' => 'TIMOR LESTE',
	'TG' => 'TOGO',
	'TK' => 'TOKELAU',
	'TO' => 'TONGA',
	'TT' => 'TRINIDAD Y TOBAGO',
	'TN' => 'TÚNEZ',
	'TR' => 'TURQUÍA',
	'TM' => 'TURKMENISTÁN',
	'TC' => 'ISLAS TURCAS Y CAICOS',
	'TV' => 'TUVALU',
	'UG' => 'UGANDA',
	'UA' => 'UCRANIA',
	'AE' => 'EMIRATOS ÁRABES UNIDOS',
	'GB' => 'REINO UNIDO',
	'US' => 'ESTADOS UNIDOS',
	'UM' => 'ISLAS ULTRAMARINAS MENORES DE LOS ESTADOS UNIDOS',
	'UY' => 'URUGUAY',
	'UZ' => 'UZBEKISTÁN',
	'VU' => 'VANUATU',
	'VE' => 'VENEZUELA, REPÚBLICA BOLIVARIANA DE',
	'VN' => 'VIETNAM',
	'VG' => 'ISLAS VIRGENES BRITÁNICAS',
	'VI' => 'ISLAS VIRGENES ESTADOUNIDENSES',
	'WF' => 'WALLIS Y FUTUNA',
	'EH' => 'SAHARA OCCIDENTAL',
	'YE' => 'YEMÉN',
	'ZM' => 'ZAMBIA',
	'ZW' => 'ZIMBABWE',
);
$GLOBALS['app_list_strings']['lead_source_dom'] = array (
	'' => '',
	'word of mouth' => 'de boca a boca',
	'existing user of service' => 'usuario actual del servicio',
	'referred' => 'referido',
	'campaign by eo' => 'campaña por la OE',
	'calls' => 'llamadas',
	'web site' => 'sitio web',
	'PR' => 'RR.PP.',
	'conference' => 'conferencia',
);
$GLOBALS['app_list_strings']['osy_services_companies_mode_of_intervention_list'] = array (
	'Telephone' => 'Teléfono',
	'Mail' => 'Correo',
	'Letter' => 'Carta',
	'Internal meeting' => 'Reunión interna',
	'External meeting' => 'Reunión externa',
	'Representation in court / official meeting' => 'Representación ante el tribunal / reunión oficial',
	'Other' => 'Otros',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_list'] = array (
	'Individual labour law and HR' => 'Derecho laboral individual y RR.HH.',
	'Collective labour law and HR' => 'Derecho laboral colectivo y RR.HH.',
	'Tax' => 'Impuestos',
	'Trade' => 'Comercio',
	'Company management' => 'Gestión empresarial',
	'Data information' => 'Dato informativo',
	'Access to finance' => 'Acceso al financiamiento',
	'Other' => 'Otros',
);

$GLOBALS['app_list_strings']['osy_services_companies_subject_description_list'] = array (
	'Employment contract' => 'Contrato de trabajo',
	'End of contract - Dismissal' => 'Término de contrato - Despido',
	'Disciplinary issues' => 'Temas disciplinarios',
	'Working time' => 'Horas de trabajo',
	'Wage and benefits' => 'Salario y prestaciones',
	'Training' => 'Formación',
	'Holiday entitlements' => 'Derechos de vacaciones',
	'Sickness and other suspensions' => 'Enfermedad y otas suspensiones',
	'Social security' => 'Seguridad social',
	'Open fields' => 'Campos abiertos',		
	'Collective dispute- strike' => 'Conflicto colectivo- huelga',
	'Trade unions issues' => 'Temas sindicales',
	'OSH' => 'OSH',
	'Social security contributions' => 'Aportes a la seguridad social',
	'Wages' => 'Salarios',
	'Outsourcing' => 'Tercerización',
	'Collective agreements' => 'Convenios colectivos',	
	'VAT' => 'IVA',
	'Company tax' => 'Impuesto sobre sociedades',
	'Personal income tax' => 'Impuesto a la renta de personas físicas',	
	'Economic situation' => 'Situación económica',
	'EO matters' => 'Temas de las OE',
	'Social situation' => 'Situación social',
);

$GLOBALS['app_list_strings']['osy_service_status_dom'] = array (
	'Planned' => 'Planificado',
	'In process' =>'En proceso',
	'Done' => 'Hecho',
	'Closed' => 'Cerrado',
);




$app_strings['LBL_GROUPTAB2_1360916369'] = 'Marketing/Comunicaciones';
$GLOBALS['app_list_strings']['accounts_type_of_business_list']=array (
  '' => '',
  'Private company' => 'Empresa privada',
  'Public company' => 'Empresa pública',
  'Partly state-owned company' => 'Empresa parcialmente estatal',
  'NGO' => 'ONG',
  'Sole proprietorship' => 'Empresa unipersonal',
);
$GLOBALS['app_list_strings']['osy_contact_type_list']=array (
  '' => '',
  3 => 'RR.HH.',
  4 => 'SST',
  5 => 'Financiamiento',
  6 => 'Ventas',
  7 => 'Producción',
  8 => 'Administración',
  9 => 'RR.PP.',
  10 => 'Otros',
);
$GLOBALS['app_list_strings']['osy_role_function_list']=array (
  	'' => '',		
	1 => 'Presidente de la Junta Directiva',
	2 => 'Director Ejecutivo - CEO',
	3 => 'Director General',
	4 => 'Secretario General',
	5 => 'Director / Gerente RRHH',
	6 => 'Gerente de Finanzas',
	7 => 'Especialista SST',
	8 => 'Industrial Relations Manager',
	9 => 'Gerente de RSE',
	10 => 'Comunicacion / Mercadeo', 
	11 => 'Experto Energía y medio Ambiente',
	12 => 'Otro Gerente',
	13 => 'Asesor Legal',
	14 => 'Asistente Director Ejecutivo – CEO',
	15 => 'Asistente',
	16 => 'Otro',
);

$GLOBALS['app_list_strings']['lead_status_dom'] = array (
	'' => '',
	'New' => 'Nuevo',
	'In Negotiation' => 'En Negociación',
	'Final Stage' => 'Etapa Final',
	//'Converted' => 'Convertido',
	//'Paid' => 'Pagado'
);
$GLOBALS['app_list_strings']['gender_0']=array (
  '' => '',
  'male' => 'Masculino',
  'female' => 'Fememino',
);
$GLOBALS['app_list_strings']['classification_list']=array (
  '' => '',
  'press' => 'Prensa',
  'trade_union' => 'Sindicatos',
  'politicians' => 'Políticos',
  'media' => 'Medios de comunicación/Periodistas',
  'governement' => 'Gobiernos',
  'other_business_org' => 'Otras Organizaciones Empresariales',
  'private_companies' => 'Empresas del Sector Privado',
);
$GLOBALS['app_list_strings']['osy_member_type_list']=array (
  'Direct Company' => 'Miembro Directo',
  'Association' => 'Asociación',
  'Indirect Member' => 'Miembro Indirecto',
);
$GLOBALS['app_list_strings']['is_training_pck_list']=array (
  'no' => 'No',
  'yes' => 'Sí',
);
$GLOBALS['app_list_strings']['unionization_list']=array (
  '' => '',
  'yes' => 'Sí',
  'no' => 'No',
  'in_negotiation' => 'En Negociación',
);
$GLOBALS['app_list_strings']['size_list']=array (
  '' => '',
  'small' => 'Pequeña',
  'medium' => 'Mediana',
  'large' => 'Grande',
);
$app_strings['LBL_GROUPTAB4_1368110304'] = 'Configuraciones';

$app_list_strings['moduleList']['ZuckerReports']='Informe de Facturación';
$app_list_strings['moduleList']['KReports']='Informe General';
$app_list_strings['moduleListSingular']['ZuckerReports']='Informe de Facturación';
$app_list_strings['moduleListSingular']['KReports']='Informe General';
$GLOBALS['app_list_strings']['osy_industries_list']=array (
  'Agriculture, forestry and fishing' => 'Agricultura, silvicultura y pesca',
  'Mining and quarrying' => 'Minería y canteras',
  'Manufacturing' => 'Industrias manufactureras',
  'Electricity, gas, steam and air conditioning supply' => 'Suministro de electricidad, gas, vapor y aire acondicionado',
  'Water supply; sewerage, waste management and remediation activities' => 'Suministro de agua; alcantarillado, gestión de residuos y actividades de reparación',
  'Construction' => 'Construcción',
  'Wholesale and retail trade; repair of motor vehicles and motorcycles' => 'Comercio al por mayor y menor; reparación de vehículos motorizados y motocicleta',
  'Transportation and storage' => 'Transporte y almacenamiento',
  'Accommodation and food service activities' => 'Actividades de hospedaje y servicio de alimentos',
  'Information and communication' => 'Información y comunicaciones',
  'Real estate activities' => 'Actividades de bienes raíces',
  'Professional, scientific and technical activities' => 'Actividades profesionales, científicas y técnicas',
  'Legal and accounting activities' => 'Actividades legales y contables',
  'Administrative and support service activities' => 'Actividades administrativas y de servicios auxiliares',
  'Public administration and defence; compulsory social security' => 'Administración pública y defensa; seguridad social obligatoria',
  'Education' => 'Educacioón',
  'Human health and social work activities' => 'Actividades de la salud humana y servicio social',
  'Arts, entertainment and recreation' => 'Arte, entretenimiento y esparcimiento',
  'Other service activities' => 'Otras actividades de servicio',
  'Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use' => 'Actividades de familias como empleadores; bienes no diferenciados- y actividades generadoras de servicios de familias para su propio uso',
  'Activities of extraterritorial organizations and bodies' => 'Actividades de organismos y organizaciones extraterritoriales',
);

$GLOBALS['app_list_strings']['type_of_potential_members_list']=array (
	'Potential Direct Member' => 'Miembro Potencial Directo',
	'Potential Indirect Member' => 'Miembro Potencial Indirecto',
	'Potential Association' => 'Asociación Potencial',
);


$app_strings['LBL_TABGROUP_ACTIVITIES'] = 'Actividades';

$GLOBALS['app_list_strings']['osy_ownership_list']=array (
  '' => '',
  '100% foreign-owned' => '100% propiedad extranjera',
  '100% national-owned' => '100% propiedad nacional',
  'Mainly foreign-owned' => 'Principalmente propiedad extranjera',
  'Mainly national-owned' => 'Principalmente propiedad nacional',
  'Half/half' => 'Mitad/mitad',
  'Other' => 'Otros',
);
$GLOBALS['app_list_strings']['service_status_list']=array (
  '' => '',
  'in_progress' => 'En Progreso',
  'completed' => 'Terminado',
);
$GLOBALS['app_list_strings']['campaign_status_dom']=array (
  '' => '',
  'Planning' => 'Planificación',
  'Active' => 'En Progreso',
  'Complete' => 'Completar',
);
$GLOBALS['app_list_strings']['prospect_list_type_dom']=array (
		'default' => 'De Forma Predeterminada',
		'test' => 'Prueba',
);
$GLOBALS['app_list_strings']['service_status_0']=array (
  '' => '',
  'in_progress' => 'En Progreso',
  'completed' => 'Terminado',
);
$app_strings['LBL_GROUPTAB5_1378463078'] = 'Informe';

$GLOBALS['app_list_strings']['payment_status_list']=array (
  '' => '',
  'paid' => 'Pagado',
  'not_paid' => 'No Pagado',
);
$app_list_strings['moduleList']['osy_contactspotentialmember']='Contactos - Miembros Potenciales';
$app_list_strings['moduleList']['osy_gestione_pagamento']='Pago Eventos';
$app_list_strings['moduleListSingular']['osy_contactspotentialmember']='Contactos - Miembros Potenciales';
$app_list_strings['moduleListSingular']['osy_gestione_pagamento']='Pago Eventos';
$app_list_strings['moduleList']['Contacts']='Contactos - Miembros';
$app_list_strings['moduleListSingular']['Contacts']='Contacto - Miembro';
$app_list_strings['moduleList']['osy_services_companies']='Servicios personalizados';
$app_list_strings['moduleListSingular']['osy_services_companies']='Servicios personalizados';
$app_list_strings['parent_type_display']['osy_services_companies']='Servicios personalizados';
$app_list_strings['moduleList']['osy_service']='Eventos';
$app_list_strings['moduleListSingular']['osy_service']='Evento';
$app_list_strings['moduleListSingular']['Opportunities']='Cuota de afiliación';

$app_list_strings['moduleList']['Opportunities']='Cuotas de afiliación';
$GLOBALS['app_list_strings']['pdf_template_type_dom']=array (
  'AOS_Quotes' => 'Cotizaciones',
  'AOS_Invoices' => 'Facturas',
  'Accounts' => 'Cuentas',
  'Contacts' => 'Contactos',
  'Leads' => 'Oportunidades',
  'AOS_Contracts' => 'Contracts',
  'Opportunities' => 'Opportunities',
);
$GLOBALS['app_list_strings']['campaign_type_dom']=array (
  '' => '',
  'Email' => 'Correo electrónico',
  'NewsLetter' => 'Boletín Informativo',
);
$app_list_strings['moduleList']['Opportunities']='Cuotas de afiliación';

$app_list_strings['moduleList']['FP_events']='Eventos';
$app_list_strings['moduleListSingular']['FP_events']='Evento';
$app_strings['LBL_GENERATE_WEB_TO_CONTACT_FORM'] = 'Generar Formulario';
$app_strings['LBL_SAVE_WEB_TO_CONTACT_FORM'] = 'Guardar Web al Formulario de Contacto';
$app_strings['LBL_ARE_YOU_A_MEMBER'] = '¿es usted un miembro de nuestra organización';
$app_strings['LBL_COMPANY_CODE'] = 'Codigo de compañia';
$app_strings['LBL_GENERATE_LETTER'] = 'Generate Letter';