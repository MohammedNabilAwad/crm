<?php

global $mod_strings;

if ($focus->task_type == "php_custom") {
	$focus->task_implementation = htmlspecialchars($focus->task_implementation, ENT_QUOTES, "UTF-8");
}

$focus = new asol_Task();
$focus->retrieve($_REQUEST['record']);

$task_type = (isset($_REQUEST['task_type'])) ? $_REQUEST['task_type'] : $focus->task_type;

$triggerModule = $focus->getContextModule();
$tmpMod = explode("\${mod}", $focus->task_implementation);

$mod = (count($tmpMod) == 2) ? $tmpMod[0] : "";

?>

<link href="modules/asol_Task/css/asol_task_style.css?version=D20130116" rel="stylesheet" type="text/css" />
<link href="modules/asol_Task/css/tabs.css?version=D20130116" rel="stylesheet" type="text/css" />
<link href="modules/asol_Process/css/asol_popupHelp.css?version=D20130116" rel="stylesheet" type="text/css" />

<?php 

$GLOBALS['log']->debug("**********[ASOL][WFM]: \$_REQUEST=[".var_export($_REQUEST,true)."]");

//echo "<body>";

if (($_REQUEST['task_type'] != "create_object") && ($_REQUEST['task_type'] != "modify_object")) {
	
	echo '<div style="display: block" id="task_implementation_field">  </div>';
} else {
	echo '<div style="display: none" id="task_implementation_field">  </div>';
}
	
if (($_REQUEST['task_type'] != "create_object") && ($_REQUEST['task_type'] != "modify_object")) {
	
	echo '<div style="display: none" id="task_implementation_field_create_object">
			<table class="edit view">
				<tr>
	';
} else { 
	echo '<div style="display: block" id="task_implementation_field_create_object">
			<table class="edit view">
				<tr>
	';
}

echo '<tr><td>'.$mod_strings['LBL_ASOL_OBJECT_MODULE'].': ';
require_once ("modules/asol_Task/customFields/task_object_module.php");
echo '</td><td></td></tr>';
echo '<tr><td>';	
require_once ("modules/asol_Task/customFields/module_fields.php");
echo '</td><td>';
require_once ("modules/asol_Task/customFields/module_object_values.php");
echo '</td>';
echo '		</tr>
		</table>
	</div>
';
//echo "</body>";

?>


<!--
Load jQuery only on-demand.
It could be a previous jQuery loaded. And if we define a new one, we will erase jQuery-plugins-functionality(because a new jQuery definition overrides the old one). 

 -->

<script src="modules/asol_Process/js/jquery.js" type="text/javascript"></script>
<link href="modules/asol_Process/css/jquery.ui.css" rel="stylesheet" type="text/css" />
<script src="modules/asol_Process/js/jquery.ui.js" type="text/javascript"></script>

<script>
	function main() {
		//alert('ENTRY function  main');
		
		// jQuery-ui
		$.fx.speeds._default = 500;
		$.extend($.ui.dialog.prototype.options, { width: 500, show: "side", hide: "size"});
		
		$(document).ready(function() {
			//alert("jQuery ready");
			
			// If you choose delay_type=no_delay then time-dropwdowns must be hidden
			function delayVisibility(value) {
				switch (value) {
					case 'no_delay':
						$("#delay_label, #time, #time_amount").css('visibility', 'hidden');
						break;
					case 'on_creation':
					case 'on_modification':
					case 'on_finish_previous_task':
						$("#delay_label, #time, #time_amount").css('visibility', 'visible');
						break;
				}
			}

			delayVisibility($("#delay_type").val());
			
			$("#delay_type").change(function () {
				delayVisibility($(this).val());

				// If you choose delay_type=no_delay then set delay to zero
				if ($("#delay_type").val() == 'no_delay') {
					$("#time").val('minutes');
					$("#time_amount").val('0');
				}
			});
			
			<?php 
				// If you want to remember then remember implementation
				if ( (($focus->task_type == $_REQUEST['task_type']) && ($mod == $_REQUEST['objectModule']) ) || (!isset($_REQUEST['task_type'])) )  {
					
					echo "         selected_option_task(\"task_type\", \"".$focus->task_type."\", \"" . $users_opts . "\", \"". $acl_roles_opts . "\", \"".$timedate->get_cal_date_format()."\"); rememberImplementationField(\"".$focus->task_type."\", \"".$focus->task_implementation."\");                 ";
				} else {
					echo "         selected_option_task(\"task_type\", \"".$focus->task_type."\", \"" . $users_opts . "\", \"". $acl_roles_opts . "\", \"".$timedate->get_cal_date_format()."\");            ";	
				}
			
				// if you dont want to remember then fill mandatory fields 
				if ((!( (($focus->task_type == $_REQUEST['task_type']) && ($mod == $_REQUEST['objectModule']) ) || (!isset($_REQUEST['task_type'])) )) && ($task_type == "create_object")) {
					echo 'fillRequiredFields(\'module_values_Table\', \'fields\', \''.$fields_labels_imploded.'\', \''.$fields_type_imploded.'\', \''.$fields_enum_operators_imploded.'\', \''.$fields_enum_references_imploded.'\', \''.$relate_modules_imploded.'\', \''.$is_required_imploded.'\', \''.$timedate->get_cal_date_format().'\');';
				}
			?>
				
			/*********BEGIN - send_email select all,to,cc,bcc*************/
			function send_email_select_all() {
				$("#a_all").addClass("active");
				$("#a_to").removeClass("active");
				$("#a_cc").removeClass("active");
				$("#a_bcc").removeClass("active");
				
				
				$("#all").addClass("active");
				$("#all").removeClass("inactive");
	
				$("#to").addClass("inactive");
				$("#to").removeClass("active");
	
				$("#cc").addClass("inactive");
				$("#cc").removeClass("active");
	
				$("#bcc").addClass("inactive");
				$("#bcc").removeClass("active");
			}
	
			function send_email_select_to() {
				$("#a_all").removeClass("active");
				$("#a_to").addClass("active");
				$("#a_cc").removeClass("active");
				$("#a_bcc").removeClass("active");
	
				
				$("#all").addClass("inactive");
				$("#all").removeClass("active");
	
				$("#to").addClass("active");
				$("#to").removeClass("inactive");
	
				$("#cc").addClass("inactive");
				$("#cc").removeClass("active");
	
				$("#bcc").addClass("inactive");
				$("#bcc").removeClass("active");
			}
	
			function send_email_select_cc() {
				$("#a_all").removeClass("active");
				$("#a_to").removeClass("active");
				$("#a_cc").addClass("active");
				$("#a_bcc").removeClass("active");
	
	
				$("#all").addClass("inactive");
				$("#all").removeClass("active");
	
				$("#to").addClass("inactive");
				$("#to").removeClass("active");
	
				$("#cc").addClass("active");
				$("#cc").removeClass("inactive");
	
				$("#bcc").addClass("inactive");
				$("#bcc").removeClass("active");
			}
	
			function send_email_select_bcc() {
				$("#a_all").removeClass("active");
				$("#a_to").removeClass("active");
				$("#a_cc").removeClass("active");
				$("#a_bcc").addClass("active");
	
				
				$("#all").addClass("inactive");
				$("#all").removeClass("active");
	
				$("#to").addClass("inactive");
				$("#to").removeClass("active");
	
				$("#cc").addClass("inactive");
				$("#cc").removeClass("active");
	
				$("#bcc").addClass("active");
				$("#bcc").removeClass("inactive");
			}	
			
			function refresh_to_cc_bcc_readonly() {
				var to_cc_bcc = {0:'to', 1:'cc', 2:'bcc'};
				for (var index in to_cc_bcc) {
					var users_roles = {0:'users', 1:'roles'};
					for (var index2 in users_roles) {
						var selected_options = $.map($("#email_"+users_roles[index2]+"_for_"+to_cc_bcc[index]+" option:selected"), function(e) { return $(e).text(); })
						$("#email_"+users_roles[index2]+"_for_"+to_cc_bcc[index]+"_readonly").val(selected_options.join(","));
					}
					$("#email_list_for_"+to_cc_bcc[index]+"_readonly").val($("#email_list_for_"+to_cc_bcc[index]).val());
				}
			}
			
			// initialization when DOM is ready
			send_email_select_all();

			// info_icon
			function fill_info_icon() {

				var task_type_array = ['send_email', 'php_custom', 'continue', 'end', 'call_process'];
				var lbl_asol_info_icon_array = [];
				for (var i in task_type_array) {
					lbl_asol_info_icon_array[task_type_array[i]] = SUGAR.language.get('asol_Task', 'LBL_ASOL_INFO_ICON_'+task_type_array[i].toUpperCase());
				}

				$("#info_icon").attr("qtip_info", lbl_asol_info_icon_array[$("#task_type").val()]);

				
				$('#info_icon').qtip({
					content: {
						attr: 'qtip_info'
					},
					style: {
						classes: 'ui-tooltip-rounded ui-tooltip-shadow myTooltip'
					},
					position: {
						my: 'bottom right',
						at: 'top left'
					}
				});
			}

			// fill_info_icon();
			
			$("#task_type").change(function() {
				if ( $("#task_type").val() == "send_email") {
					send_email_select_all();
				}

				// info_icon
				// fill_info_icon();
			});

			// when clicking the tabs
			$("#a_all").live('click', function() {
				refresh_to_cc_bcc_readonly();
				send_email_select_all();
			});
			$("#a_to").live('click', function() {
				send_email_select_to();
			});
			$("#a_cc").live('click', function() {
				send_email_select_cc();
			});
			$("#a_bcc").live('click', function() {
				send_email_select_bcc();
			});
			/*********END - send_email select all,to,cc,bcc*************/

			// Rewrite the onclick-code of the Save-button (because of ajaxUI-sugarcrm; but in EditView only exist ajax-submit-call-to-javascript-function, not ajaxUI-load-page)
			$("#EditView .primary").each(function() {
				var onclickCode = this.getAttribute("onclick");
				var new_onclickCode = "document.getElementById('task_implementation').value=format_option_task('task_type'); " + onclickCode;
				$(this).removeAttr("onclick");// setAttribute needs removeAttr before. Probably a bug.
				this.setAttribute("onclick", new_onclickCode);
			});
			
			/**
			 **** Old way to collect task_implementation info
				$("#EditView").bind("submit", function () { document.getElementById("task_implementation").value=format_option_task('task_type'); } );
			*/
	 	});
	}
</script>

<script>

	// Load jQuery-source-file only if jQuery has not been loaded yet (function-$-jQuery is already defined)
	// *** What if previous jQuery exists but it is an old version and this version is not compatible with jQuery-ui(for example) ===> then override always jQuery
	if (typeof jQuery === "undefined") {
		console.log("[WFM] jQuery undefined");
		
	    var jQuery_script_tag = document.createElement("script");
	    jQuery_script_tag.setAttribute("type", "text/javascript");
	    jQuery_script_tag.setAttribute("src", "modules/asol_Process/js/jquery.js");
	    document.getElementsByTagName("head")[0].appendChild(jQuery_script_tag);
	    
	    jQuery_script_tag.onload = load_jQuery_plugins;

	} else if ((false) && (typeof $().ui === "undefined")) {
		console.log("[WFM] jQuery-plugins undefined");
		
		load_jQuery_plugins();
		
 	} else {
 	 	console.log("[WFM] jQuery and jQuery-plugins defined")
 		main();
 	}

 	function load_jQuery_qTip() {
		console.log('[WFM] ENTRY function load_jQuery_qTip');
		
		var jQuery_qTip_css_tag = document.createElement("link");         
	    jQuery_qTip_css_tag.type = 'text/css';
	    jQuery_qTip_css_tag.rel = 'stylesheet';
	    jQuery_qTip_css_tag.href = 'modules/asol_Process/css/jquery.qtip.css';
	    jQuery_qTip_css_tag.media = 'screen';
	
		document.getElementsByTagName("head")[0].appendChild(jQuery_qTip_css_tag);
		
		var jQuery_qTip_script_tag = document.createElement("script");
	    jQuery_qTip_script_tag.setAttribute("type","text/javascript");
	    jQuery_qTip_script_tag.setAttribute("src", "modules/asol_Process/js/jquery.qtip.js");
	    document.getElementsByTagName("head")[0].appendChild(jQuery_qTip_script_tag);

	    // Load following js
	    jQuery_qTip_script_tag.onload = load_jQuery_ui; 
	}

	function load_jQuery_ui() {
		console.log("[WFM] ENTRY function load_jQuery_ui");
		
		var jQuery_ui_css_tag = document.createElement("link");         
	    jQuery_ui_css_tag.type = 'text/css';
	    jQuery_ui_css_tag.rel = 'stylesheet';
	    jQuery_ui_css_tag.href = 'modules/asol_Process/css/jquery.ui.css';
	    jQuery_ui_css_tag.media = 'screen';
	
		document.getElementsByTagName("head")[0].appendChild(jQuery_ui_css_tag);
		
		var jQuery_ui_script_tag = document.createElement("script");
	    jQuery_ui_script_tag.setAttribute("type","text/javascript");
	    jQuery_ui_script_tag.setAttribute("src", "modules/asol_Process/js/jquery.ui.js");
	    document.getElementsByTagName("head")[0].appendChild(jQuery_ui_script_tag);

	 	// Load following js
	    jQuery_ui_script_tag.onload = main; 
	}

	function load_jQuery_plugins() {
		console.log("[WFM] ENTRY function load_jQuery_plugins");
		load_jQuery_ui(); // This will load another js and so on.
	}

</script>
