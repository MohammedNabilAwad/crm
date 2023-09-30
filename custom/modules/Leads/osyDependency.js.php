<script type="text/javascript">

if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {

    	SUGAR.util.doWhen("document.getElementById('footer') && typeof(osyDependency) != 'undefined' ", function() {

        var oFieldValues = {
    			"subcategories" : {
                    field: "industry",
                    value: "Agriculture, forestry and fishing|Mining and quarrying|Manufacturing|Water supply; sewerage, waste management and remediation activities|Construction|Wholesale and retail trade; repair of motor vehicles and motorcycles|Transportation and storage|Accommodation and food service activities|Information and communication|Legal and accounting activities|Administrative and support service activities|Education|Human health and social work activities|Arts, entertainment and recreation|Other service activities|Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use$",
                    attr: {
                            "type": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['type']; ?>",
                            "labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['vname']; ?>",
                            "required": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['required']; ?>",
                            "module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
                    },
				},
			};

    		osyDependency(oFieldValues);

    	});

}
</script>
