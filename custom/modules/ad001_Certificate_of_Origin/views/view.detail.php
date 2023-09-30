<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

require_once('custom/modules/ad001_Certificate_of_Origin/printing_functions.php');

class Customad001_Certificate_of_OriginViewDetail extends ViewDetail
{
    public function display()
    {
        if ($this->bean->type_of_certificate_origin_c == "Arabic") {
            arabicCir($this->bean);
        } else if ($this->bean->type_of_certificate_origin_c == "English")
            arabic_englishCir($this->bean);
        else if ($this->bean->type_of_certificate_origin_c == "Chinese")
            chinaees($this->bean);
        else if ($this->bean->type_of_certificate_origin_c == "European")
            uorpen($this->bean);
        else {

        }

        $javascript = <<<'EOT'
        <script type="text/javascript">
                var script = document.createElement("script");  // create a script DOM node
                script.src = "./custom/modules/ad001_Certificate_of_Origin/js/printPDFC.js";  // set its src to the provided URL
                document.head.appendChild(script);
        </script>
EOT;
        echo $javascript;

        $js = "<script>function printPDFC(){printContent('printedPdf');}</script>";
        echo $js;

        parent::display();

    }
}