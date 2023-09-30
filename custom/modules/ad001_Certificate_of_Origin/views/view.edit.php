<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


class Customad001_Certificate_of_OriginViewEdit extends ViewEdit
{
    function display()
    {

        $javascript = <<<'EOT'
        <script type="text/javascript">

        // window.onload=function(){

                var script = document.createElement("script");  // create a script DOM node
                script.src = "./custom/modules/ad001_Certificate_of_Origin/js/editview.js";  // set its src to the provided URL
                document.head.appendChild(script);

        // }

        </script>
EOT;

        echo $javascript;

        parent::display();
        
    }
}
