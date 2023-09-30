<?php
require_once('include/QuickSearchDefaults.php');

// OPENSYMBOLMOD Alberto Guiotto 2016-04-22 - Extends QuickSearchDefaults with extra custom functions
 
class osy_QuickSearchDefaults extends QuickSearchDefaults
{
	/* Override del metodo default (ritorna un osy_QuickSearchDefaults anzichè la QuickSearchDefaults)*/
	static public function getQuickSearchDefaults(array $lookup = array())
	{
		$lookup['custom/include/QuickSearchDefaults.php'] = 'QuickSearchDefaultsCustom';
		foreach ($lookup as $file => $class)
		{
			if (file_exists($file))
			{
				require_once($file);
				return new $class();
			}
		}
		return new osy_QuickSearchDefaults();
	}
	
	function getQSEvents($e_name = 'event_name', $e_id = 'event_id') {
        global $app_strings;

        $qsEvent = array('form' => $this->form_name,
        					'method' => 'query',
                            'modules'=> array('FP_events'),
                            'group' => 'or',
                            'field_list' => array('name', 'id'),
                            'populate_list' => array($e_name, $c_id),
                            'conditions' => array(array('name'=>'name','op'=>'like_custom','end'=>'%','value'=>'')),
                            'required_list' => array('event_id'),
                            'order' => 'name',
                            'limit' => '30',
                            'no_match_text' => $app_strings['ERR_SQS_NO_MATCH']);
        return $qsEvent;
    }
	
}