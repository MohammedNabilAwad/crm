<?php
include ('custom/include/osyRelateUtils.js.php');
?>
<script type="text/javascript">
$( document ).ready(function() {
	changeSqsObject('lead_name_basic', 'lead_name_basic', 'lead_id_basic');
	changeSqsObject('lead_name_advanced', 'lead_name_advanced', 'lead_id_advanced');
});
	function changeSqsObject(field_name, name, id)
	{
		overrideSqsObject(
				field_name,
			function(oSqsObject) {
				oSqsObject['field_list'] = ["account_name", "id"];
				oSqsObject['populate_list'] = [name, id];
				oSqsObject['conditions'][0]['name'] = "account_name";
				return oSqsObject;
			});
	};
</script>
