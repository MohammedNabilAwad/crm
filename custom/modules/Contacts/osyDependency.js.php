<script type="text/javascript">
if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {

    	SUGAR.util.doWhen("document.getElementById('footer') && typeof(osyDependency) != 'undefined' ", function() {
    		
        var oFieldValues = {
                "contact_type" : {
                    field: "role_function",
                    value: "^3|4|5|6|7$",
                    attr: {
                            "type": "<?php echo $GLOBALS['FOCUS']->field_defs['contact_type']['type']; ?>",
                            "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['contact_type']['vname']; ?>",
                            "required": "<?php echo $GLOBALS['FOCUS']->field_defs['contact_type']['required']; ?>",
                            "module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
                    },
				},
								
			};
    		
    		osyDependency(oFieldValues);
    		SUGAR.util.callOnChangeListers('role_function');

    	});
    		
}
</script>