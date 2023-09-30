<?php
$layout_defs["Campaigns"]["subpanel_setup"]["osy_other_contacts_subpanels"] = array (
    'order' => 190,
    'sort_order' => 'desc',
    'sort_by' => 'name',
    'module' => 'osy_other_contacts',
    'get_subpanel_data' => 'osy_other_contacts',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_CAMPAIGN_OSY_OTHER_CONTACTS_SUBPANELS_TITLE',
    'top_buttons' => array(),
);

$layout_defs["Campaigns"]["subpanel_setup"]["osy_contactspotentialmember_subpanels"] = array (
    'order' => 190,
    'sort_order' => 'desc',
    'sort_by' => 'name',
    'module' => 'osy_contactspotentialmember',
    'get_subpanel_data' => 'osy_contactspotentialmember',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_CAMPAIGN_OSY_CONTACTSPOTENTIALMEMBER_SUBPANELS_TITLE',
    'top_buttons' => array(),
);



$layout_defs["Campaigns"]["subpanel_setup"]["emailmarketing"] = array(
    'top_buttons' => array(
        array(
            'widget_class' => 'SubPanelTopCreateCampaignMarketingEmailButtonCustom',
            'func' => 'createEmailMarketing'
        ),
    ),
    'order' => 20,
    'sort_order' => 'desc',
    'sort_by' => 'date_start',
    'module' => 'EmailMarketing',
    'get_subpanel_data' => 'emailmarketing',
    'subpanel_name' => 'default',
    'title_key' => 'LBL_EMAIL_MARKETING_SUBPANEL_TITLE',
);

