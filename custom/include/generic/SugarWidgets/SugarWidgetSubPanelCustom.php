<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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

require_once('include/generic/SugarWidgets/SugarWidgetField.php');


class SugarWidgetSubPanelCustom extends SugarWidgetField
{
	public $sListTpl = '%sOpensymbol/SugarWidgetSubPanelCustom_%%s.tpl';
	public $ss;
	public static $sParentBeanGlobalsKey = 'oOsySubPanelParent';
	public static $sLayouDefsGlobalsKey = 'aOsySubPanel_layout_def';

	public static $sLibFileEditPath = 'custom/include/osyFileEdit.php';


	public function __construct(&$layout_manager)
	{
		parent::SugarWidgetField($layout_manager);

		$this->sListTpl = sprintf($this->sListTpl, $GLOBALS['sugar_config']['cache_dir']);
	}

	public function SugarWidgetSubPanelCustom(&$layout_manager)
	{
		$this->__construct($layout_manager);
	}


	// overwritten only because original code doesn't not set $layout_def['name'] if $layout_def['vname'] is empty
	// this really does NOT make sense!
	function displayHeaderCellPlain($layout_def)
	{
		$sHeaderCellText = parent::displayHeaderCellPlain($layout_def);
		return empty($sHeaderCellText) ? $layout_def['name'] : $sHeaderCellText;
	}

	function displayHeaderCell($layout_def)
	{
		if(isset($layout_def['customLabel']) && !empty($layout_def['customLabel']))
		{
			self::loadParentBean();

			$layout_def['name'] = $this->fetchCustomSmarty(
				$layout_def,
				$layout_def['customLabel'],
				sprintf($this->sListTpl, $layout_def['name'].'_'.$layout_def['subpanel_module'].'_LABEL')
			);

			$layout_def['vname'] = '';
		}

		return parent::displayHeaderCell($layout_def);
	}

	public function displayListPlain($layout_def)
	{
		self::loadParentBean();

		// set this inside $GLOBALS to make it available inside the anonymous function
		$GLOBALS[self::$sLayouDefsGlobalsKey][$layout_def['name']] =& $layout_def;

		$sValue = parent::displayListPlain($layout_def);

		if(isset($layout_def['query']) && !empty($layout_def['query']))
		{
			// replace placeholders with appropriate values
			// syntax: @placeholder->value@
			// available placeholders: row, parent, request, layout_def
			$sQuery = preg_replace_callback(
				'/@(row|parent|request|layout_def)\-\>([^@]+)@/',
				create_function(
					'$aMatches',
					sprintf(
						'$sValue = "";
						if($aMatches[1] == "parent"
						   && isset($GLOBALS["%1$s"]->$aMatches[2]))
						{
							$sValue = $GLOBALS["%1$s"]->$aMatches[2];
						}
						else if($aMatches[1] == "request"
							&& isset($GLOBALS["%2$s"]["%3$s"][$aMatches[2]]))
						{
							$sValue = $aTarget[$aMatches[2]];
						}
						else {
							if($aMatches[1] == "row")
							{
								$aTarget = $GLOBALS["%2$s"]["%3$s"]["fields"];
								$aMatches[2] = strtoupper($aMatches[2]);
							}
							else if($aMatches[1] == "layout_def")
							{
								$aTarget = $GLOBALS["%2$s"]["%3$s"];
							}

							if(isset($aTarget[$aMatches[2]]))
							{
								$sValue = $aTarget[$aMatches[2]];
							}
						}
						return $sValue;',
						self::$sParentBeanGlobalsKey,
						self::$sLayouDefsGlobalsKey,
						$layout_def['name']
					)
				),
				$layout_def['query']
			);

			$oRes = $GLOBALS['db']->query($sQuery);
			$aRow = $aRows = array();
			while($aRow = $GLOBALS['db']->fetchByAssoc($oRes))
			{
				$aRows[] = $aRow;
			}

			if(empty($layout_def['return_field']))
			{
				$sValue = $aRows;
			}
			else if(isset($aRows[0][$layout_def['return_field']]))
			{
				$sValue = $aRows[0][$layout_def['return_field']];
			}

			if(empty($sValue) && isset($layout_def['ifnull']) && !empty($layout_def['ifnull']))
			{
				$sValue = $layout_def['ifnull'];
			}
		}

		if(isset($layout_def['customCode']) && !empty($layout_def['customCode']))
		{
			$sValue = $this->fetchCustomSmarty(
				$layout_def,
				$layout_def['customCode'],
				sprintf($this->sListTpl, $layout_def['name'].'_'.$layout_def['subpanel_id']), //.'_'.$GLOBALS[self::$sParentBeanGlobalsKey]->module_dir.'_'.$layout_def['module'])
				$sValue
			);
		}

		return $sValue;
	}

	// this code should be reusable: may be needed to change the log messages and the smarty assign variables
	public function fetchCustomSmarty(&$layout_def, $sSmartyCode, $sTemplatePath, $sValue = '')
	{
// 		if(!file_exists($sTemplatePath))
// 		{
// 			if(!touch($sTemplatePath))
// 			{
// 				$GLOBALS['log']->fatal(sprintf(
// 					'OPENSYMBOLMOD - could not write tpl file for widget %s (subpanel_id: %s, module: %s, parent_module: %s, parent_id: %s)',
// 					__CLASS__,
// 					$layout_def['subpanel_id'],
// 					$layout_def['module'],
// 					$GLOBALS[self::$sParentBeanGlobalsKey]->module_dir,
// 					$GLOBALS[self::$sParentBeanGlobalsKey]->id
// 				));
// 				return '';
// 			}
// 		}

		require_once(self::$sLibFileEditPath);
		$aCacheRes = osyCacheRegeneration($sTemplatePath, $sSmartyCode, '');
		if($aCacheRes['need_regeneration'] && !file_put_contents($aCacheRes['file'], $sSmartyCode))
		{
			$GLOBALS['log']->fatal(sprintf(
				'OPENSYMBOLMOD - could not write cache file for widget %s (subpanel_id: %s, module: %s, parent_module: %s, parent_id: %s)',
				__CLASS__,
				$layout_def['subpanel_id'],
				$layout_def['module'],
				$GLOBALS[self::$sParentBeanGlobalsKey]->module_dir,
				$GLOBALS[self::$sParentBeanGlobalsKey]->id
			));
			return '';
		}

		$this->ss = self::getSugarSmarty();

		$this->ss->assign('oParent', $GLOBALS[self::$sParentBeanGlobalsKey]);
		$this->ss->assign('aLayoutDefs', $layout_def); // useful here is $layout_def['fields'] that contains all fields of current row bean (in uppercase!)
		$this->ss->assign('sValue', $sValue);

		return $this->ss->fetch($aCacheRes['file']);
	}

	public static function loadParentBean()
	{
		//TODO using $GLOBALS sucks!!! The real bean could be modified but focus(es) inside $GLOBALS don't!
		// using singleton-like method with $GLOBALS because we need to use this inside an anonymous function
		if(!isset($GLOBALS[self::$sParentBeanGlobalsKey]))
		{
			if(isset($GLOBALS['focus']) && $GLOBALS['focus']->module_dir == $_REQUEST['module'])
			{
				$GLOBALS[self::$sParentBeanGlobalsKey] =& $GLOBALS['focus'];
			}
			else if(isset($GLOBALS['FOCUS']) && $GLOBALS['FOCUS']->module_dir == $_REQUEST['module'])
			{
				$GLOBALS[self::$sParentBeanGlobalsKey] =& $GLOBALS['FOCUS'];
			}
			else if(isset($_REQUEST['record']))
			{ // retrieve it
				$bBeanFactoryClassExists = class_exists('BeanFactory');
				if($bBeanFactoryClassExists || file_exists('data/BeanFactory.php'))
				{
					if(!$bBeanFactoryClassExists)
					{
						require_once('data/BeanFactory.php');
					}
					$GLOBALS[self::$sParentBeanGlobalsKey] = BeanFactory::getBean($_REQUEST['module'], $_REQUEST['record']);
				}
				else
				{
					$sClass = $GLOBALS['beanList'][$_REQUEST['module']];
					require_once($GLOBALS['beanFiles'][$sClass]);
					$GLOBALS[self::$sParentBeanGlobalsKey] = new $sClass();
					$GLOBALS[self::$sParentBeanGlobalsKey]->retrieve($_REQUEST['record']);
				}
			}
		}
	}

	public static function &getSugarSmarty()
	{
		static $oSugarSmarty = null;
		if(is_null($oSugarSmarty))
		{
			$oSugarSmarty = new Sugar_Smarty();
		}
		return $oSugarSmarty;
	}
}

?>
