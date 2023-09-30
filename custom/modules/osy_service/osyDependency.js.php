<script type="text/javascript">
if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {
	
	    SUGAR.util.doWhen("document.getElementById('footer') && typeof(osyDependency) != 'undefined' ", function() {
		    	
        var oFieldValues = {
			"areas" : {
                field: "service_detail",
                value: "^advice|wrt_adv|cons|cons_on_site$",
                attr: {
                        "type": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['type']; ?>",
                        "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['vname']; ?>",
                        "required": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['required']; ?>",
                        "module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
                }
			},
    			
    			"other_string" : {
                    field: "service_detail",
                    value: "^other$",
                    attr: {
                            "type": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['type']; ?>",
                            "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['vname']; ?>",
                            "required": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['required']; ?>",
                            "module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
                    }
    			},
    			"representation_details" : {
                    field: "service_detail",
                    value: "^rep$",
                    attr: {
                            "type": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['type']; ?>",
                            "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['vname']; ?>",
                            "required": "<?php echo $GLOBALS['FOCUS']->field_defs['service_detail']['required']; ?>",
                            "module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
                    }
    			},
        };
    	osyDependency(oFieldValues);
    });	
}
</script>