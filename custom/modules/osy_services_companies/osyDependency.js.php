<script type="text/javascript">
	    $(document).ready(function() {
            var oFieldValues = {
			    "costs_c" : {
                    field: "is_free_of_charge_c",
                    value: "^no$",
                    attr: {
                        "type": "<?php echo $GLOBALS['FOCUS']->field_defs['costs_c']['type']; ?>",
                        "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['costs_c']['vname']; ?>",
                        "required": "<?php echo $GLOBALS['FOCUS']->field_defs['costs_c']['required']; ?>",
                        "module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
                    }
			    },
            };
    	    osyDependency(oFieldValues);
        });
</script>