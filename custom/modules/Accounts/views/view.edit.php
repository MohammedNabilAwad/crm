<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('modules/Accounts/views/view.edit.php');


class CustomAccountsViewEdit extends AccountsViewEdit
{
    function display()
    {

        $javascript = <<<'EOT'
        <script type="text/javascript">

                var script = document.createElement("script");  // create a script DOM node
                script.src = "./custom/modules/Accounts/js/editview.js";  // set its src to the provided URL
                document.head.appendChild(script);

        </script>
EOT;

        echo $javascript;

        parent::display();
        
    }
}
