<?php
if (! defined ( 'sugarEntry' ) || ! sugarEntry)
	die ( 'Not A Valid Entry Point' );

global $mod_strings, $app_strings, $sugar_config;

//nascondo il pulsante CREA dal menu
unset ( $module_menu[0] );