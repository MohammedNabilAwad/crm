<?php

function arabicCir(SugarBean $bean)
{

    $page = <<<EOD

<div style="">
<div id="printedPdf" style="position: relative;   width: 21cm; height: 29.7cm;  ">

    <div dir="rtl" style="position: absolute; top:21.5%; right: 6%; width: 37%; height: 4.7%; overflow-y: hidden; ">
        <div style="display: block;">{$bean->accounts_ad001_certificate_of_origin_1_name} </div>
        <div style="display: block;">{$bean->exporter_address_country_c}-{$bean->exporter_address_city_c}-{$bean->exporter_address_state_c}
        -{$bean->exporter_address_c} </div>
    </div>

    <div dir="rtl" style="position: absolute; top:21.5%; right: 46%; width: 37%; height: 4.7%; overflow-y: hidden; ">
    <div style="display: block;">{$bean->accounts_ad001_certificate_of_origin_2_name}
    </div>
    <div style="display: block;">{$bean->manufacturer_addr_country_c}-{$bean->manufacturer_addr_city_c}-{$bean->manufacturer_addr_state_c}
    -{$bean->manufacturer_addr_c}  </div>
    </div>

    <div dir="rtl" style="position: absolute; top:29%; right: 6%; width: 37%; height: 8.5%; overflow-y: hidden; ">
    <div style="display: block;">{$bean->importer_name_c}
    </div>

    <div style="display: block;">
    {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$bean->importing_country_c]}
    -{$bean->importer_address_c}  </div>
    </div>

    <div dir="rtl" style="position: absolute; top:29%; right: 46%; width: 20%; height: 8.5%; overflow-y: hidden; ">
    <div style="display: block;">
    {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$bean->country_of_origin_c]}
    </div>
    <div style="display: block;"></div>
    </div>

    <div dir="rtl" style="position: absolute; top:41%; right: 6%; width: 27%; height: 8.5%; overflow-y: hidden; ">
        <div style="display: block;">
        {$GLOBALS['app_list_strings']['shipping_method_list'][$bean->shipping_method_c]}
    </div>
    </div>

    <div dir="rtl" style="position: absolute; top:41%; right: 36%; width: 54%; height: 8.5%; overflow-y: hidden; ">
        <div style="display: block;">{$bean->description}</div>
    </div>

    <div dir="rtl" style="position: absolute; top:52%; right: 6%; width: 58%; height: 16.5%; overflow-y: hidden; ">
    <div style="display: block;">نوع البضاعة : {$bean->type_of_goods_c}</div>
    <div style="display: block;">{$bean->number_of_parcels_c}</div>
    <div style="display: block;">{$bean->qty_c}</div>
    <div style="display: block;">{$bean->net_weight_c}</div>
    <div style="display: block;">{$bean->reviews_c}</div>
    <div style="display: block;"></div>
    </div>

    <div dir="rtl" style="position: absolute; top:56%; right: 66%; width: 12%; height: 16.5%; overflow-y: hidden; ">
    <div style="display: block;">{$bean->gross_weight_c}</div>
    <div style="display: block;">وحدة الوزن :  {$bean->unit_weight_c}</div>
    
    </div>
    <div dir="rtl" style="position: absolute; top:56%; right: 79%; width: 12%; height: 16.5%; overflow-y: hidden; ">
        <div style="display: block;">{$bean->invoice_number_c}</div>
        <div style="display: block;">{$bean->invoice_date_c}</div>
    </div>

</div>
</div>
EOD;
    echo $page;
}

function arabic_englishCir(SugarBean $bean)
{

    $page = <<<EOD

<div style="">

<div id="printedPdf" style="position: relative;   width: 21cm; height: 29.7cm;  ">
     <div dir="ltr" style="position: absolute; font-size:smaller; top:14.5%; left: 15%; width: 20%; height: 18%; overflow-y: hidden; ">
     08 10
     </div>
     
     <img src="public/arPDF2.jpg" style=" width: 21cm; height: 29.7cm;" alt="" srcset=""/>
     
     <div dir="ltr" style="position: absolute; top:12%; left: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
     0155555E
     </div>
     
     <div dir="rtl" style="position: absolute; top:15.5%; right: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
     2022/08/15
     </div>

     <div dir="rtl" style="position: absolute; top:17.4%; right: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
     0155555
     </div>

     <div dir="rtl" style="position: absolute; top:28%; right: 6%; width: 16%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->type_of_goods_c}</div>
     <div style="display: block;">{$bean->reviews_c}</div>
     </div>
     
     
     <div dir="rtl" style="position: absolute; top:28%; right: 23%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->qty_c}</div>
     </div>
     <div dir="rtl" style="position: absolute; top:28%; right: 32%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">علامات وارقام</div>
     </div>
     
     
     <div dir="rtl" style="position: absolute; top:28%; right: 40%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->net_weight_c}</div>
     </div>
     
     
     <div dir="ltr" style="position: absolute; top:28%; right: 48%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->net_weight_c}</div>
     </div>
     
     
     <div dir="ltr" style="position: absolute; top:28%; right: 57%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">market E numbers</div>
     </div>
     <div dir="ltr" style="position: absolute; top:28%; right: 67%; width: 8%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->qty_c}</div>
     </div>
     <div dir="ltr" style="position: absolute; top:28%; left: 4%; width: 18%; height: 18%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->type_of_goods_c}</div>
     <div style="display: block;">{$bean->reviews_c}</div>
     
     </div>
     
     
     <div dir="rtl" style="position: absolute; top:50%; right: 20%; width: 40%; height: 3%; overflow-y: hidden; ">
     <div style="display: block;">{$bean->accounts_ad001_certificate_of_origin_1_name}</div>
     </div>
     
     <div dir="rtl" style="position: absolute; top:61%; right: 12%; width: 40%; height: 4%; overflow-y: hidden; ">
     
     <div style="display: block;">
        {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$bean->importing_country_c]} -{$bean->importer_address_c} 
     </div>
     
     
     </div>
     <div dir="ltr" style="position: absolute; top:61%; left: 8%; width: 40%; height: 2%; overflow-y: hidden; ">
     
     <div style="display: block;">
        {$GLOBALS['app_list_strings']['accounts_operating_markets_en_list'][$bean->importing_country_c]} -{$bean->importer_address_c} 
     </div>
     
     
     </div>
     
     <div dir="rtl" style="position: absolute; top:66%; right: 18%; width: 30%; height: 4%; overflow-y: hidden; ">
     <div style="display: block;">عن طريق عستا شاش شىىش تتتش تشىشتش شاشلاشتةس </div>
     </div>
     <div dir="ltr" style="position: absolute; top:66%; left: 10%; width: 30%; height: 2%; overflow-y: hidden; ">
     <div style="display: block;">China</div>
     </div>
     </div>

</div>
EOD;
    echo $page;
}

function chinaees(SugarBean $bean)
{

    $page = <<<EOD

<div style="">

     <div id="printedPdf" style="position: relative; width: 21cm; height: 29.7cm; ">

     <img src="public/chinaPDF.jpg" style=" width: 21cm; height: 29.7cm;" alt="" srcset="">

         <div dir="ltr" style="position: absolute; top:4.5%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
             <div style="display: block;"> {$bean->exporter_name_english_c} </div>
             <div style="display: block;">{$bean->exporter_address_country_c}-{$bean->exporter_address_city_c}-{$bean->exporter_address_state_c}
        -{$bean->exporter_address_c} </div>
        </div>

         <div dir="ltr" style="position: absolute; top:11%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
             <div style="display: block;"> {$bean->manufacturer_name_english_c} </div>
             <div style="display: block;">{$bean->manufacturer_addr_country_c}-{$bean->manufacturer_addr_city_c}-{$bean->manufacturer_addr_state_c}
        -{$bean->manufacturer_addr_c} </div>
         </div>

         <div dir="ltr" style="position: absolute; top:18%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
             <div style="display: block;"> {$bean->consignee_name_c} </div>
             <div style="display: block;"> consder address and country </div>
         </div>

         <div dir="ltr" style="position: absolute; top:18.2%; font-size: small; right: 9%; width: 24%; height: 18px; overflow-y: hidden; ">
        Isuued is jd IO hide Of woerl do in i am II II II 
         </div>

         <div dir="ltr" style="position: absolute; top:25%; font-size: small; left:52%; width: 44%; height: 7%; overflow-y: hidden; ">
             Isuued is jd IO hide Of woerl do in i am II II II jdfab sdfbabsd fjhdf adsfhb dfmnasbdf vadmfbsd
             <div style="display: block;"> consder name here</div>
             <div style="display: block;"> consder address and country </div>
             <div style="display: block;"> consder name here</div>
             <div style="display: block;"> consder address and country </div>
         </div>

         <div dir="ltr" style="position: absolute; top:24.5%; font-size: small; left:6%; width: 44%; height: 4%; overflow-y: hidden; ">
             Isuued is jd IO hide Of woerl do in i am II II II jdfab sdfbabsd fjhdf adsfhb dfmnasbdf vadmfbsd pdfr agg
             <div style="display: block;"> consder name here</div>
             <div style="display: block;"> consder address and country </div>
             <div style="display: block;"> consder name here</div>
             <div style="display: block;"> consder address and country </div>
         </div>

         <div dir="ltr" style="position: absolute; top:28.7%; font-size: x-small; left:16%; width: 12%; height: 10px; overflow-y: hidden; ">
         {$bean->departure_date_c}
         </div>

         <div dir="ltr" style="position: absolute; top:31%; font-size: small; left:25%;  width: 26%; height: 14px; overflow-y: hidden; ">
         {$bean->vessel_no_c}
         </div>

         <div dir="ltr" style="position: absolute; top:33.4%; font-size: small; left:16%;  width: 26%; height: 14px; overflow-y: hidden; ">
         {$bean->port_of_loading_c}
         </div>

         <div dir="ltr" style="position: absolute; top:35.6%; font-size: small; left:17%;  width: 26%; height: 14px; overflow-y: hidden; ">
         {$bean->port_of_discharge_c}
         </div>

         <div dir="ltr" style="position: absolute; top:34.3%; font-size: small; left:52%;  width: 44%; height: 4%; overflow-y: hidden; ">
         {$bean->description}     
         </div>

         <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:4.5%;  width: 6%; height: 14%; overflow-y: hidden; ">
         {$bean->item_number_c}
         </div>

         <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:10.9%;  width: 10%; height: 14%; overflow-y: hidden; ">
         {$bean->marks_and_numbers_c}
         </div>

         <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:24%;  width: 25%; height: 27%; overflow-y: hidden; ">
             8-numbers and goods des
             <div style="display: block;"> Goods type </div>
             <div style="display: block;"> Goods des</div>
         </div>

         <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:51%;  width: 10%; height: 27%; overflow-y: hidden; ">
             <div style="display: block;"> {$bean->hs_code_c} </div>
         </div>

         <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:62%;  width: 10%; height: 27%; overflow-y: hidden; ">
         <div style="display: block;"> {$bean->origin_criterion_c} </div>
         </div>

         <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:73%;  width: 10%; height: 25%; overflow-y: hidden; ">
         <div style="display: block;"> {$bean->gross_weight_c} </div>
         </div>

         <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:85%;  width: 10%; height: 25%; overflow-y: hidden; ">
             <div style="display: block;"> {$bean->invoice_number_c} </div>
             <div style="display: block;"> {$bean->invoice_date_c} </div>
             <div style="display: block;"> {$bean->invoice_payment_c} </div>
         </div>


  </div>
</div>
EOD;
    echo $page;
}


function uorpen(SugarBean $bean)
{

    $page = <<<EOD

<div style="">

<div id="printedPdf" style="position: relative;  width: 21cm; height: 29.7cm;">

    <img src="public/uorpen.jpg" style="width: 21cm; height: 29.7cm;" alt="" srcset="">


    <div dir="ltr" style="position: absolute; top:7%; font-size: small;  left: 11%; width: 36%; height: 5%; overflow-y: hidden; ">
        <div style="display: block;">{$bean->exporter_name_english_c} </div>
        <div style="display: block;">{$bean->exporter_address_country_c}-{$bean->exporter_address_city_c}-{$bean->exporter_address_state_c}
        -{$bean->exporter_address_c} </div>
    </div>

    <div dir="ltr" style="position: absolute; top:15%; font-size: small;  left: 10%; width: 41%; height: 6.5%; overflow-y: hidden; ">
    <div style="display: block;"> {$bean->consignee_name_c} </div>
    <div style="display: block;"> consder address and country </div>
    </div>

    <div dir="ltr" style="position: absolute; top:15%; font-size: small; right: 14%; width: 24%; height: 18px; overflow-y: hidden; ">
        Isuued is jd IO hide Of woerl do in i am II II II
    </div>

    <div dir="ltr" style="position: absolute; top:23%; font-size: small; left:10%; width: 44%; height: 14%; overflow-y: hidden; ">
        <div style="display: block;">
        {$GLOBALS['app_list_strings']['shipping_method_list'][$bean->shipping_method_c]}
    </div>
        <div style="display: block;">Block Line for Means transport</div>
    </div>

    <div dir="ltr" style="position: absolute; top:23%; font-size: small; left:52%; width: 44%; height: 14%; overflow-y: hidden; ">
    for Officeal use
    <div style="display: block;"> Bolck Line for officeall</div>
    </div>

    <div dir="ltr" style="position: absolute; top:43%; font-size: small; left:8.5%;  width: 8%; height: 14%;   overflow-y: hidden; ">
    {$bean->item_number_c}
    </div>

    <div dir="ltr" style="position: absolute; top:43%; font-size: small; left:14%;  width: 10%; height: 14%; overflow-y: hidden; ">
    {$bean->marks_and_numbers_c}
    </div>

    <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:25%;  width: 37%; height: 33%; overflow-y: hidden; ">
        7-numbers and goods des 8-numbers and goods des 8-numbers and goods des 8-numbers and goods des 8-numbers and goods des
        <div style="display: block;"> Goods type </div>
        <div style="display: block;"> Goods des</div>
    </div>

    <div dir="ltr" style="position: absolute; top:44%; font-size: small; left:62%;  width: 10%; height: 27%; overflow-y: hidden; ">
    <div style="display: block;"> {$bean->origin_criterion_c} </div>
    </div>

    <div dir="ltr" style="position: absolute; top:44%; font-size: small; left:73%;  width: 10%; height: 33%; overflow-y: hidden; ">
    <div style="display: block;"> {$bean->gross_weight_c} </div>
    </div>

    <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:85%;  width: 10%; height: 25%; overflow-y: hidden; ">
    <div style="display: block;"> {$bean->invoice_number_c} </div>
    <div style="display: block;"> {$bean->invoice_date_c} </div>
    <div style="display: block;"> {$bean->invoice_payment_c} </div>
    </div>

    <div dir="ltr" style="position: absolute; top:82%; font-size: small; left:62%;  width: 30%; height: 33%; overflow-y: hidden; ">
        <div style="display: block;">
    {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$bean->country_of_origin_c]}
    </div>
    </div>

    <div dir="ltr" style="position: absolute; top:89.2%; font-size: small; left:54%;   width: 30%; height: 33%; overflow-y: hidden; ">
        <div style="display: block;">
    {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$bean->importing_country_c]}
     </div>
    </div>

   </div>

</div>

EOD;
    echo $page;
}



    // function arabicCir()
    // {

    //     $page = <<<EOD

    // <div style="">
    // <div id="printedPdf" style="position: relative;   width: 21cm;
    // height: 29.7cm;  ">


    //     <div dir="rtl" style="position: absolute; top:21.5%; right: 6%; width: 37%; height: 4.7%; overflow-y: hidden; ">
    //         <div style="display: block;">{$this->bean->accounts_ad001_certificate_of_origin_1_name} </div>
    //         <div style="display: block;">{$this->bean->exporter_address_country_c}-{$this->exporter_address_city_c}-{$this->bean->exporter_address_state_c}
    //         -{$this->bean->exporter_address_c} </div>
    //     </div>


    //     <div dir="rtl" style="position: absolute; top:21.5%; right: 46%; width: 37%; height: 4.7%; overflow-y: hidden; ">
    //     <div style="display: block;">{$this->bean->accounts_ad001_certificate_of_origin_2_name}
    //     </div>
    //     <div style="display: block;">{$this->bean->manufacturer_addr_country_c}-{$this->manufacturer_addr_city_c}-{$this->bean->manufacturer_addr_state_c}
    //     -{$this->bean->manufacturer_addr_c}  </div>

    // </div>

    //     <div dir="rtl" style="position: absolute; top:29%; right: 6%; width: 37%; height: 8.5%; overflow-y: hidden; ">

    //     <div style="display: block;">{$this->bean->importer_name_c}
    //     </div>
    //     <div style="display: block;">
    //     {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$this->bean->importing_country_c]}

    //     -{$this->bean->importer_address_c}  </div>


    //     </div>
    //     <div dir="rtl" style="position: absolute; top:29%; right: 46%; width: 20%; height: 8.5%; overflow-y: hidden; ">
    //     <div style="display: block;">
    //     {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$this->bean->country_of_origin_c]}
    //     </div>
    //     <div style="display: block;"></div>

    //     </div>



    //     <div dir="rtl" style="position: absolute; top:41%; right: 6%; width: 27%; height: 8.5%; overflow-y: hidden; ">
    //         <div style="display: block;">
    //         {$GLOBALS['app_list_strings']['shipping_method_list'][$this->bean->shipping_method_c]}
    //     </div>
    //     </div>


    //     <div dir="rtl" style="position: absolute; top:41%; right: 36%; width: 54%; height: 8.5%; overflow-y: hidden; ">
    //         <div style="display: block;">{$this->bean->description}</div>
    //     </div>

    //     <div dir="rtl" style="position: absolute; top:52%; right: 6%; width: 58%; height: 16.5%; overflow-y: hidden; ">
    //     <div style="display: block;">نوع البضاعة : {$this->bean->type_of_goods_c}</div>
    //     <div style="display: block;">{$this->bean->number_of_parcels_c}</div>
    //     <div style="display: block;">{$this->bean->qty_c}</div>
    //     <div style="display: block;">{$this->bean->net_weight_c}</div>
    //     <div style="display: block;">{$this->bean->reviews_c}</div>
    //     <div style="display: block;"></div>
    //     </div>

    //     <div dir="rtl" style="position: absolute; top:56%; right: 66%; width: 12%; height: 16.5%; overflow-y: hidden; ">
    //     <div style="display: block;">{$this->bean->gross_weight_c}</div>
    //     <div style="display: block;">وحدة الوزن :  {$this->bean->unit_weight_c}</div>

    //     </div>
    //     <div dir="rtl" style="position: absolute; top:56%; right: 79%; width: 12%; height: 16.5%; overflow-y: hidden; ">
    //         <div style="display: block;">{$this->bean->invoice_number_c}</div>
    //         <div style="display: block;">{$this->bean->invoice_date_c}</div>
    //     </div>
    // </div>
    // </div>
    // EOD;
    //     echo $page;
    // }

    // function arabic_englishCir()
    // {

    //     $page = <<<EOD

    // <div style="">

    // <div id="printedPdf" style="position: relative;   width: 21cm;
    //              height: 29.7cm;  ">
    //      <div dir="ltr" style="position: absolute; font-size:smaller; top:14.5%; left: 15%; width: 20%; height: 18%; overflow-y: hidden; ">
    //      08 10
    //      </div>

    //      <img src="public/arPDF2.jpg" style=" width: 21cm;
    //      height: 29.7cm;" alt="" srcset=""/>


    //      <div dir="ltr" style="position: absolute; top:12%; left: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
    //      0155555E
    //      </div>

    //      <div dir="rtl" style="position: absolute; top:15.5%; right: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
    //      2022/08/15
    //      </div>
    //      <div dir="rtl" style="position: absolute; top:17.4%; right: 12%; width: 20%; height: 18%; overflow-y: hidden; ">
    //      0155555
    //      </div>
    //      <div dir="rtl" style="position: absolute; top:28%; right: 6%; width: 16%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->type_of_goods_c}</div>
    //      <div style="display: block;">{$this->bean->reviews_c}</div>

    //      </div>


    //      <div dir="rtl" style="position: absolute; top:28%; right: 23%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->qty_c}</div>
    //      </div>
    //      <div dir="rtl" style="position: absolute; top:28%; right: 32%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">علامات وارقام</div>
    //      </div>


    //      <div dir="rtl" style="position: absolute; top:28%; right: 40%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->net_weight_c}</div>
    //      </div>


    //      <div dir="ltr" style="position: absolute; top:28%; right: 48%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->net_weight_c}</div>
    //      </div>


    //      <div dir="ltr" style="position: absolute; top:28%; right: 57%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">market E numbers</div>
    //      </div>
    //      <div dir="ltr" style="position: absolute; top:28%; right: 67%; width: 8%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->qty_c}</div>
    //      </div>
    //      <div dir="ltr" style="position: absolute; top:28%; left: 4%; width: 18%; height: 18%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->type_of_goods_c}</div>
    //      <div style="display: block;">{$this->bean->reviews_c}</div>

    //      </div>


    //      <div dir="rtl" style="position: absolute; top:50%; right: 20%; width: 40%; height: 3%; overflow-y: hidden; ">
    //      <div style="display: block;">{$this->bean->accounts_ad001_certificate_of_origin_1_name}</div>
    //      </div>

    //      <div dir="rtl" style="position: absolute; top:61%; right: 12%; width: 40%; height: 4%; overflow-y: hidden; ">

    //      <div style="display: block;">
    //         {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$this->bean->importing_country_c]} -{$this->bean->importer_address_c} 
    //      </div>


    //      </div>
    //      <div dir="ltr" style="position: absolute; top:61%; left: 8%; width: 40%; height: 2%; overflow-y: hidden; ">

    //      <div style="display: block;">
    //         {$GLOBALS['app_list_strings']['accounts_operating_markets_en_list'][$this->bean->importing_country_c]} -{$this->bean->importer_address_c} 
    //      </div>


    //      </div>

    //      <div dir="rtl" style="position: absolute; top:66%; right: 18%; width: 30%; height: 4%; overflow-y: hidden; ">
    //      <div style="display: block;">عن طريق عستا شاش شىىش تتتش تشىشتش شاشلاشتةس </div>
    //      </div>
    //      <div dir="ltr" style="position: absolute; top:66%; left: 10%; width: 30%; height: 2%; overflow-y: hidden; ">
    //      <div style="display: block;">China</div>
    //      </div>
    //      </div>

    // </div>
    // EOD;
    //     echo $page;
    // }

    // function chinaees()
    // {

    //     $page = <<<EOD

    // <div style="">

    //      <div id="printedPdf" style="position: relative; width: 21cm; height: 29.7cm; ">

    //      <img src="public/chinaPDF.jpg" style=" width: 21cm; height: 29.7cm;" alt="" srcset="">

    //          <div dir="ltr" style="position: absolute; top:4.5%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
    //              <div style="display: block;"> {$this->bean->exporter_name_english_c} </div>
    //              <div style="display: block;">{$this->bean->exporter_address_country_c}-{$this->exporter_address_city_c}-{$this->bean->exporter_address_state_c}
    //         -{$this->bean->exporter_address_c} </div>
    //         </div>

    //          <div dir="ltr" style="position: absolute; top:11%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
    //              <div style="display: block;"> {$this->bean->manufacturer_name_english_c} </div>
    //              <div style="display: block;">{$this->bean->manufacturer_addr_country_c}-{$this->manufacturer_addr_city_c}-{$this->bean->manufacturer_addr_state_c}
    //         -{$this->bean->manufacturer_addr_c} </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:18%; font-size: small;  left: 6%; width: 36%; height: 4%; overflow-y: hidden; ">
    //              <div style="display: block;"> {$this->bean->consignee_name_c} </div>
    //              <div style="display: block;"> consder address and country </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:18.2%; font-size: small; right: 9%; width: 24%; height: 18px; overflow-y: hidden; ">
    //         Isuued is jd IO hide Of woerl do in i am II II II 
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:25%; font-size: small; left:52%; width: 44%; height: 7%; overflow-y: hidden; ">
    //              Isuued is jd IO hide Of woerl do in i am II II II jdfab sdfbabsd fjhdf adsfhb dfmnasbdf vadmfbsd
    //              <div style="display: block;"> consder name here</div>
    //              <div style="display: block;"> consder address and country </div>
    //              <div style="display: block;"> consder name here</div>
    //              <div style="display: block;"> consder address and country </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:24.5%; font-size: small; left:6%; width: 44%; height: 4%; overflow-y: hidden; ">
    //              Isuued is jd IO hide Of woerl do in i am II II II jdfab sdfbabsd fjhdf adsfhb dfmnasbdf vadmfbsd pdfr agg
    //              <div style="display: block;"> consder name here</div>
    //              <div style="display: block;"> consder address and country </div>
    //              <div style="display: block;"> consder name here</div>
    //              <div style="display: block;"> consder address and country </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:28.7%; font-size: x-small; left:16%; width: 12%; height: 10px; overflow-y: hidden; ">
    //          {$this->bean->departure_date_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:31%; font-size: small; left:25%;  width: 26%; height: 14px; overflow-y: hidden; ">
    //          {$this->bean->vessel_no_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:33.4%; font-size: small; left:16%;  width: 26%; height: 14px; overflow-y: hidden; ">
    //          {$this->bean->port_of_loading_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:35.6%; font-size: small; left:17%;  width: 26%; height: 14px; overflow-y: hidden; ">
    //          {$this->bean->port_of_discharge_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:34.3%; font-size: small; left:52%;  width: 44%; height: 4%; overflow-y: hidden; ">
    //          {$this->bean->description}     
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:4.5%;  width: 6%; height: 14%; overflow-y: hidden; ">
    //          {$this->bean->item_number_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:10.9%;  width: 10%; height: 14%; overflow-y: hidden; ">
    //          {$this->bean->marks_and_numbers_c}
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:24%;  width: 25%; height: 27%; overflow-y: hidden; ">
    //              8-numbers and goods des
    //              <div style="display: block;"> Goods type </div>
    //              <div style="display: block;"> Goods des</div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:51%;  width: 10%; height: 27%; overflow-y: hidden; ">
    //              <div style="display: block;"> {$this->bean->hs_code_c} </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:62%;  width: 10%; height: 27%; overflow-y: hidden; ">
    //          <div style="display: block;"> {$this->bean->origin_criterion_c} </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:73%;  width: 10%; height: 25%; overflow-y: hidden; ">
    //          <div style="display: block;"> {$this->bean->gross_weight_c} </div>
    //          </div>

    //          <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:85%;  width: 10%; height: 25%; overflow-y: hidden; ">
    //              <div style="display: block;"> {$this->bean->invoice_number_c} </div>
    //              <div style="display: block;"> {$this->bean->invoice_date_c} </div>
    //              <div style="display: block;"> {$this->bean->invoice_payment_c} </div>
    //          </div>


    //   </div>
    // </div>
    // EOD;
    //     echo $page;
    // }

    // function uorpen()
    // {

    //     $page = <<<EOD

    // <div style="">

    // <div id="printedPdf" style="position: relative;  width: 21cm; height: 29.7cm;">

    //     <img src="public/uorpen.jpg" style="width: 21cm; height: 29.7cm;" alt="" srcset="">


    //     <div dir="ltr" style="position: absolute; top:7%; font-size: small;  left: 11%; width: 36%; height: 5%; overflow-y: hidden; ">
    //         <div style="display: block;">{$this->bean->exporter_name_english_c} </div>
    //         <div style="display: block;">{$this->bean->exporter_address_country_c}-{$this->exporter_address_city_c}-{$this->bean->exporter_address_state_c}
    //         -{$this->bean->exporter_address_c} </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:15%; font-size: small;  left: 10%; width: 41%; height: 6.5%; overflow-y: hidden; ">
    //     <div style="display: block;"> {$this->bean->consignee_name_c} </div>
    //     <div style="display: block;"> consder address and country </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:15%; font-size: small; right: 14%; width: 24%; height: 18px; overflow-y: hidden; ">
    //         Isuued is jd IO hide Of woerl do in i am II II II
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:23%; font-size: small; left:10%; width: 44%; height: 14%; overflow-y: hidden; ">
    //         <div style="display: block;">
    //         {$GLOBALS['app_list_strings']['shipping_method_list'][$this->bean->shipping_method_c]}
    //     </div>
    //         <div style="display: block;">Block Line for Means transport</div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:23%; font-size: small; left:52%; width: 44%; height: 14%; overflow-y: hidden; ">
    //     for Officeal use
    //     <div style="display: block;"> Bolck Line for officeall</div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:43%; font-size: small; left:8.5%;  width: 8%; height: 14%;   overflow-y: hidden; ">
    //     {$this->bean->item_number_c}
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:43%; font-size: small; left:14%;  width: 10%; height: 14%; overflow-y: hidden; ">
    //     {$this->bean->marks_and_numbers_c}
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:42%; font-size: small; left:25%;  width: 37%; height: 33%; overflow-y: hidden; ">
    //         7-numbers and goods des 8-numbers and goods des 8-numbers and goods des 8-numbers and goods des 8-numbers and goods des
    //         <div style="display: block;"> Goods type </div>
    //         <div style="display: block;"> Goods des</div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:44%; font-size: small; left:62%;  width: 10%; height: 27%; overflow-y: hidden; ">
    //     <div style="display: block;"> {$this->bean->origin_criterion_c} </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:44%; font-size: small; left:73%;  width: 10%; height: 33%; overflow-y: hidden; ">
    //     <div style="display: block;"> {$this->bean->gross_weight_c} </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:45%; font-size: small; left:85%;  width: 10%; height: 25%; overflow-y: hidden; ">
    //     <div style="display: block;"> {$this->bean->invoice_number_c} </div>
    //     <div style="display: block;"> {$this->bean->invoice_date_c} </div>
    //     <div style="display: block;"> {$this->bean->invoice_payment_c} </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:82%; font-size: small; left:62%;  width: 30%; height: 33%; overflow-y: hidden; ">
    //         <div style="display: block;">
    //     {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$this->bean->country_of_origin_c]}
    //     </div>
    //     </div>

    //     <div dir="ltr" style="position: absolute; top:89.2%; font-size: small; left:54%;   width: 30%; height: 33%; overflow-y: hidden; ">
    //         <div style="display: block;">
    //     {$GLOBALS['app_list_strings']['accounts_operating_markets_list'][$this->bean->importing_country_c]}
    //      </div>
    //     </div>

    //    </div>

    // </div>

    // EOD;
    //     echo $page;
    // }

?>