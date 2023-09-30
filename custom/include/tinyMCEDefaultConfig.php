<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if( isset($this) ) {
    foreach( $this->buttonConfigs as &$aButtons ) {
        $aButtons['buttonConfig'] = 'jbimages,separator,'.$aButtons['buttonConfig'];
    }
    $this->defaultConfig['plugins'] .= ',jbimages';
}