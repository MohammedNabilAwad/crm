<?php

/*********************************************************************************
 * SugarCRM is a customer relationship management program developed by
 * SugarCRM, Inc. Copyright (C) 2004-2010 SugarCRM Inc.
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
 * The interactive user interfaces in modified source and object code versions
 * of this program must display Appropriate Legal Notices, as required under
 * Section 5 of the GNU Affero General Public License version 3.
 * 
 * Contributor(s): www.synolia.com - sugar@synolia.com
 * You can contact SYNOLIA at 51 avenue Jean Jaures 69007 - LYON FRANCE
 * or at email address contact@synolia.com.
 ********************************************************************************/













if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');



$dashletStrings['TrackerDashlet'] = array('LBL_TITLE'            => 'Rapport de Suivi',
                                          'LBL_DESCRIPTION'      => 'Dashlet pour passer des requêtes sur les données de Suivi',
                                          'LBL_SAVING'           => 'Requête en exécution...',
                                          'LBL_SAVED'            => 'Requête exécutée',
                                          'LBL_CLEAR'            => 'Vider',
                                          'LBL_CLEAR_TOOLTIP'    => 'Vider la valeur du champ date',
                                          'LBL_CONFIGURE_TITLE'  => 'Titre',
                                          'LBL_CONFIGURE_HEIGHT' => 'Hauteur (1 - 300)',
										  'LBL_SELECT_QUERY'     => 'Sélectionner une requête...',
										  'LBL_FILTER'              => 'Filtrer',
										  'LBL_FILTER_TOOLTIP'      => 'Filtrer par une valeur dans le champ date',
										  'LBL_SINCE'            => 'Depuis : ',
										  'LBL_CHOOSE_DATE_TOOLTIP' => 'En sélectionnant un rapport, vous pouvez fournir une date pour filtrer les données.' .
										                               '  La valeur de la date saisie remplacera la valeur de la date par défaut pour ce rapport.' .
										                               '  Par exemple, dans le rapport "Mon activité (Cette semaine)", la' .
										                               ' valeur saisie sera utilisée pour afficher tous les enregistrement créés après cette date' .
										                               ' à la place de la période initialement définie de une semaine.',
);
