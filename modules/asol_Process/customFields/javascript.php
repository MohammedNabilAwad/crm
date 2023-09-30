<?php 
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

wfm_utils::wfm_log('debug', "ENTRY", __FILE__);

?>

<link href="modules/asol_Process/___common_WFM/css/asol_popupHelp.css?version=<?php wfm_utils::echoVersionWFM(); ?>" rel="stylesheet" type="text/css" />
<script src="modules/asol_Process/___common_WFM/js/jquery.min.js?version=<?php wfm_utils::echoVersionWFM(); ?>" type="text/javascript"></script>
<link href="modules/asol_Process/___common_WFM/plugins_js_css_images/jquery.ui/css/jquery.ui.min.css?version=<?php wfm_utils::echoVersionWFM(); ?>" rel="stylesheet" type="text/css" />
<script src="modules/asol_Process/___common_WFM/plugins_js_css_images/jquery.ui/js/jquery.ui.min.js?version=<?php wfm_utils::echoVersionWFM(); ?>" type="text/javascript"></script>

<script>

	var asol_var = new Array();
	asol_var['_REQUEST'] = Array();
	asol_var['_REQUEST']['action'] = "<?php echo $_REQUEST['action']; ?>";

	
	main();
	
	function main() {
		//alert("JQuery is now loaded");
		
		// jQuery-ui
		$.fx.speeds._default = 500;
		$.extend($.ui.dialog.prototype.options, {width: 500, show: "side", hide: "size"});
		
		$(document).ready(function() {
			
		});
	}

	function onChange_alternativeDatabase(dropdownlist) {
		window.onbeforeunload = function () {
			return;
		};
		
		dropdownlist.form.action.value = asol_var['_REQUEST']['action'];
		dropdownlist.form.submit();
	}
	
</script>	