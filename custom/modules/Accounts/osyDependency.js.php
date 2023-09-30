<script type="text/javascript">
debugger;
if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {

	$(document).ready(function(){
		SUGAR.util.doWhen("typeof(osyDependency) != 'undefined' ", function() {
			var oFieldValues = {

				"nr_permanent" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_permanent']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_permanent']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_permanent']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"nr_directors" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_directors']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_directors']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_directors']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"nr_casual" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_casual']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_casual']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_casual']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"type_of_business" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['type_of_business']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['type_of_business']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['type_of_business']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"industry" : {
					field: "member_type",
					value: "^Association|Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['industry']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['industry']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['industry']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"subcategories" : {
					field: "industry",
					value: "Agriculture, forestry and fishing|Mining and quarrying|Manufacturing|Electricity, gas, steam and air conditioning supply|Water supply; sewerage, waste management and remediation activities|Construction|Wholesale and retail trade; repair of motor vehicles and motorcycles|Transportation and storage|Accommodation and food service activities|Information and communication|Real estate activities|Professional, scientific and technical activities|Legal and accounting activities|Administrative and support service activities|Public administration and defence; compulsory social security|Education|Human health and social work activities|Arts, entertainment and recreation|Other service activities|Activities of households as employers; undifferentiated goods- and services-producing activities of households for own use|Activities of extraterritorial organizations and bodies$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['subcategories']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},

				"employees" : {
					field: "member_type",
					value: "^Association|Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['employees']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['employees']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['employees']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},

				"nr_employees_at" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_employees_at']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_employees_at']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_employees_at']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"date_employees_at" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['date_employees_at']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['date_employees_at']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['date_employees_at']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"contract" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['contract']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['contract']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['contract']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"contract_at" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['contract_at']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['contract_at']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['contract_at']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"ownership" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['ownership']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['ownership']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['ownership']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"total_salary_wage_bill" : {
					field: "member_type",
					value: "^Direct Company|Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['total_salary_wage_bill']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['total_salary_wage_bill']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['total_salary_wage_bill']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"association_member_type" : {
					field: "member_type",
					value: "^Association$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['association_member_type']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['association_member_type']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['association_member_type']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"association_industry" : {
					field: "association_member_type",
					value: "^1$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['association_industry']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['association_industry']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['association_industry']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"territorial" : {
					field: "association_member_type",
					value: "^2$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"territorial" : {
					field: "member_type",
					value: "^Association$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['territorial']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"other" : {
					field: "member_type",
					value: "^Association$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"other" : {
					field: "association_member_type",
					value: "^3$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['other']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},
				"nr_company_members" : {
					field: "member_type",
					value: "^Association$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_company_members']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_company_members']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['nr_company_members']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},

				/*"parent_name" : {
					field: "member_type",
					value: "^Indirect Member$",
					attr: {
						"type": "<?php /*echo $GLOBALS['FOCUS']->field_defs['parent_name']['type']; */?>",
						"labelKey": "<?php /*echo $GLOBALS['FOCUS']->field_defs['parent_name']['vname']; */?>",
						"required": "<?php /*echo $GLOBALS['FOCUS']->field_defs['parent_name']['required']; */?>",
						"module": "<?php /*echo $GLOBALS['FOCUS']->module_dir; */?>",
						},
					},*/
				"parent_id" : {
					field: "member_type",
					value: "^Indirect Member$",
					attr: {
						"type": "<?php echo $GLOBALS['FOCUS']->field_defs['parent_id']['type']; ?>",
						"labelKey": "<?php echo $GLOBALS['FOCUS']->field_defs['parent_id']['vname']; ?>",
						"required": "<?php echo $GLOBALS['FOCUS']->field_defs['parent_id']['required']; ?>",
						"module": "<?php echo $GLOBALS['FOCUS']->module_dir; ?>",
						},
					},


				};

			osyDependency(oFieldValues);

			});
	});
}
</script>
