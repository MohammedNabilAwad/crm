<?php 

class osyAdjustUI
{
    function after_ui_frame()
    {
        if( isset($_REQUEST['to_pdf']) || isset($_REQUEST['sugar_body_only']) || $_REQUEST['action']=='modulelistmenu' ) return;

        if( $_REQUEST['action'] == 'DetailView' ) {
            echo '<style>.favorite_icon_outline { display: none }</style>';
        }
        
        echo '<script type="text/javascript">$(document).ready(function(){';
        
        if( $_REQUEST['module'] != 'Home' && $_REQUEST['action'] == 'index' ) {
            echo '
                $(".selectActionsDisabled a").text("");
                        
                var first = $("#actionLinkTop .sugar_action_button a").first();
                $("#actionLinkTop .sugar_action_button ul").append( $("<li>").append( first.clone() ) );
                first.attr({onclick:"", id:""}).text("");

                var first = $("#actionLinkBottom .sugar_action_button a").first();
                $("#actionLinkBottom .sugar_action_button ul").append( $("<li>").append( first.clone() ) );
                first.attr({onclick:"", id:""}).text("");
            ';
        }
        echo '});</script>';
    }
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
//$hook_array['after_ui_frame'][] = Array(1,'custom', __FILE__,'osyAdjustUI', 'after_ui_frame');
