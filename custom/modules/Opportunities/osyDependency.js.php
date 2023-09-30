<script type="text/javascript">
//OPENSYMBOLMOD isabella.masiero 06/mag/2013
	$(document).ready(function() {
		var oFieldValues = {
			"training_pck_amount_c" : {
				field: "osy_view_training_package_amount",
				value: "^1$",
				attr: {
					"type": "<?php echo $GLOBALS['FOCUS']->field_defs['training_pck_amount_c']['type']; ?>",
					"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['training_pck_amount_c']['vname']; ?>",
					"required": "<?php echo $GLOBALS['FOCUS']->field_defs['training_pck_amount_c']['required']; ?>",
					"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
				},
			},	
			"partial_payment_c" : {
				field: "osy_view_partial_payments",
				value: "^1$",
				attr: {
					"type": "<?php echo $GLOBALS['FOCUS']->field_defs['partial_payment_c']['type']; ?>",
					"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['partial_payment_c']['vname']; ?>",
					"required": "<?php echo $GLOBALS['FOCUS']->field_defs['partial_payment_c']['required']; ?>",
					"module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
				}
			},
			"taxes_c" : {
				field: "osy_view_taxes_payments",
				value: "^1$",
				attr: {
					"type": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_c']['type']; ?>",
					"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_c']['vname']; ?>",
					"required": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_c']['required']; ?>",
					"module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
				}
			},
			"taxes_perc" : {
				field: "osy_view_taxes_payments",
				value: "^1$",
				attr: {
					"type": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_perc']['type']; ?>",
					"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_perc']['vname']; ?>",
					"required": "<?php echo $GLOBALS['FOCUS']->field_defs['taxes_perc']['required']; ?>",
					"module": "<?php echo $GLOBALS['FOCUS']->field_defs->module_dir; ?>",
				}
			},
        };
    	osyDependency(oFieldValues);
    });
</script>