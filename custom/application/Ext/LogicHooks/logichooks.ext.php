<?php 
 //WARNING: The contents of this file are auto-generated

 

/*class osyMaxResultsDisplayed
{
	function after_ui_frame()
	{
		if( !isset($_REQUEST['to_pdf']) && !isset($_REQUEST['sugar_body_only']) && $_REQUEST['action']!='modulelistmenu' ) {
			echo "<script type='text/javascript'>
			SUGAR.util.doWhen(\"typeof(YAHOO.widget.AutoComplete) != 'undefined'\", function() {
				YAHOO.widget.AutoComplete.prototype.maxResultsDisplayed = 20;
			});
			</script>
			<style type=\"text/css\">
			div.yui-ac-container
			{
				position:fixed;
			}
			</style>
			";
		}
	}
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
$hook_array['after_ui_frame'][] = Array(1,'custom', __FILE__,'osyMaxResultsDisplayed', 'after_ui_frame');*/




if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_ui_frame']) || !is_array($hook_array['after_ui_frame'])) {
    $hook_array['after_ui_frame'] = array();
}
$hook_array['after_ui_frame'][] = Array(99, 'osySuiteLogics', 'custom/include/osySuiteLogics/osySuiteLogics.php', 'osySuiteLogics', 'init');


/**
 * Advanced OpenWorkflow, Automating SugarCRM.
 * @package Advanced OpenWorkflow for SugarCRM
 * @copyright SalesAgility Ltd http://www.salesagility.com
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU AFFERO GENERAL PUBLIC LICENSE as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU AFFERO GENERAL PUBLIC LICENSE
 * along with this program; if not, see http://www.gnu.org/licenses
 * or write to the Free Software Foundation,Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301  USA
 *
 * @author SalesAgility <info@salesagility.com>
 */

if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_save']) || !is_array($hook_array['after_save'])) {
    $hook_array['after_save'] = array();
}
$hook_array['after_save'][] = Array(99, 'AOW_Workflow', 'modules/AOW_WorkFlow/AOW_WorkFlow.php','AOW_WorkFlow', 'run_bean_flows');
 

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


if (!isset($hook_array) || !is_array($hook_array)) {
    $hook_array = array();
}
if (!isset($hook_array['after_save']) || !is_array($hook_array['after_save'])) {
    $hook_array['after_save'] = array();
}
$hook_array['after_save'][] = array(1, 'fts', 'include/SugarSearchEngine/SugarSearchEngineQueueManager.php', 'SugarSearchEngineQueueManager', 'populateIndexQueue');
?>