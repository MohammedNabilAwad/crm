<?php
require_once('modules/Schedulers/views/view.edit.php');

class CustomSchedulersViewEdit extends SchedulersViewEdit {

    function display(){

//        if($this->bean->job == 'function::runMassEmailCampaignCustom'){
//            $this->bean->job = 'function::runMassEmailCampaign';
//        }
        parent::display();
    }
}