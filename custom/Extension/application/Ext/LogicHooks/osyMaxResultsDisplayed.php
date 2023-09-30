<?php 

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
