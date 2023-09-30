<?php
/**
 * Created by PhpStorm.
 * User: jennifer.celadon
 * Date: 23/03/18
 * Time: 10.34
 */

class CustomSchedulersJob
{

	function osyBeforeSave(&$bean)
	{
		if($bean->target == 'function::runMassEmailCampaign'){
			$bean->target = 'function::runMassEmailCampaignCustom';
		}
	}
}