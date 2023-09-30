<?php

if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'modules/AOS_Quotes/views/view.edit.php';


class CustomAOS_QuotesViewEdit extends AOS_QuotesViewEdit
{
    function display()
    {

//         $javascript = <<<'EOT'
//         <script type="text/javascript">

//         // window.onload=function(){

//                 var script = document.createElement("script");  // create a script DOM node
//                 script.src = "./custom/modules/AOS_Quotes/js/editview.js";  // set its src to the provided URL
//                 document.head.appendChild(script);

//         // }

//         </script>
// EOT;

//         echo $javascript;

        parent::display();
        
    }
}
