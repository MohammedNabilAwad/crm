<?php 
 //WARNING: The contents of this file are auto-generated



//global $mod_strings;

$admin_option_defs=array();
$admin_option_defs['Administration']['asol_wfm'] = array('asolAdministration','LBL_ASOL_WORKFLOWMANAGER','LBL_ASOL_WORKFLOWMANAGER_DESC','./index.php?module=asol_Process&action=index');
$admin_option_defs['Administration']['asol_wfm_2'] = array('asolAdministration','LBL_ASOL_CLEANUP','LBL_ASOL_CLEANUP_DESC','./index.php?module=asol_Process&action=cleanup');
$admin_option_defs['Administration']['asol_wfm_3'] = array('asolAdministration','LBL_ASOL_MONITOR','LBL_ASOL_MONITOR_DESC','./index.php?module=asol_WorkingNodes&action=index');
$admin_option_defs['Administration']['asol_wfm_4'] = array('asolAdministration','LBL_ASOL_REBUILD','LBL_ASOL_REBUILD_DESC','./index.php?module=asol_Process&action=rebuild');
$admin_option_defs['Administration']['asol_wfm_5'] = array('asolAdministration','LBL_ASOL_CHECKCONFIGURATIONDEFS','LBL_ASOL_CHECKCONFIGURATIONDEFS_DESC','./index.php?module=asol_Process&action=CheckConfigurationDefs');

$admin_group_header[]= array('LBL_ASOL_WFM_PANEL','',false,$admin_option_defs, 'LBL_ASOL_WFM_PANEL_DESC');



/*********************************************************************************
 * This file is part of QuickCRM Mobile CE.
 * QuickCRM Mobile CE is a mobile client for SugarCRM
 *
 * Author : NS-Team (http://www.ns-team.fr)
 *
 * QuickCRM Mobile CE is licensed under GNU General Public License v3 (GPLv3)
 *
 * You can contact NS-Team at NS-Team - 55 Chemin de Mervilla - 31320 Auzeville - France
 * or via email at infos@ns-team.fr
 *
 ********************************************************************************/

$admin_option_defs=array();
$admin_option_defs['Administration']['quickcrm_update']= array('Administration','LBL_UPDATE_QUICKCRM_TITLE','LBL_UPDATE_QUICKCRM','./index.php?module=Administration&action=updatequickcrm');


$admin_option_defs['Administration'] = array_merge((array)$admin_group_header[1][3]['Administration'],(array)$admin_option_defs['Administration']);

$admin_group_header[1]= array('LBL_ADMINISTRATION_HOME_TITLE','',false,$admin_option_defs, 'LBL_ADMINISTRATION_HOME_DESC');





/*********************************************************************************
 * This file is part of QuickCRM Mobile Pro.
 * QuickCRM Mobile Pro is a mobile client for SugarCRM
 * 
 * Author : NS-Team (http://www.quickcrm.fr/mobile)
 * All rights (c) 2011 by NS-Team
 *
 * This Version of the QuickCRM Mobile Pro is licensed software and may only be used in 
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * witten consent of NS-Team
 * 
 * You can contact NS-Team at NS-Team - 55 Chemin de Mervilla - 31320 Auzeville - France
 * or via email at quickcrm@ns-team.fr
 * 
 ********************************************************************************/

$admin_option_defs=array();
$admin_option_defs['Administration']['quickcrm_update']= array('Administration','LBL_UPDATE_QUICKCRM_TITLE','LBL_UPDATE_QUICKCRM','./index.php?module=Administration&action=updatequickcrm');


$admin_option_defs['Administration'] = array_merge((array)$admin_group_header[1][3]['Administration'],(array)$admin_option_defs['Administration']);

$admin_group_header[1]= array('LBL_ADMINISTRATION_HOME_TITLE','',false,$admin_option_defs, 'LBL_ADMINISTRATION_HOME_DESC');




if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$admin_option_defs=array();
$admin_option_defs['Administration']['ZuckerReports2Config']= array('zuckerreports','LBL_MANAGE_ZUCKERREPORTS2CONFIG','LBL_ZUCKERREPORTS2CONFIG','./index.php?module=Configurator&action=ZuckerReports2Config');
$admin_group_header[]=array('LBL_ZUCKERREPORTS2CONFIG_TITLE','',false,$admin_option_defs, 'LBL_ZUCKERREPORTS2CONFIG_DESC');



?>