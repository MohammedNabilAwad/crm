<?php

require_once('modules/Users/views/view.detail.php');

class CustomUsersViewDetail extends UsersViewDetail
{

    public function __construct()
    {
        parent::__construct();
    }

    function display()
    {
        if ($this->bean->portal_only == 1 || $this->bean->is_group == 1) {
            $this->options['show_subpanels'] = false;
            $this->dv->formName = 'DetailViewGroup';
            $this->dv->view = 'DetailViewGroup';
        }

        //handle request to reset the homepage
        if (isset($_REQUEST['reset_homepage'])) {
            $this->bean->resetPreferences('Home');
            global $current_user;
            if ($this->bean->id == $current_user->id) {
                $_COOKIE[$current_user->id . '_activePage'] = '0';
                setcookie($current_user->id . '_activePage', '0', 3000, null, null, false, true);
            }
        }

        if (empty($this->bean->id)) {
            sugar_die($GLOBALS['app_strings']['ERROR_NO_RECORD']);
        }
        $this->dv->process();
        $filename = "cache/themes/".$this->dv->th->ss->_tpl_vars[USER_THEME].'/modules/Users/DetailView.tpl';
        if (file_exists($filename)) {
            unlink($filename);
        }
        echo $this->dv->display();
    }
}