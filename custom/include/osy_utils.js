function getFieldsSelected(oForm, grid1, grid2) {
	var oFieldsGrid1 = new Array();
	var oFieldsGrid2 = new Array();

	if(typeof(grid1) != 'undefined'){
		for ( var i = 0; i < grid1.getRecordSet().getLength(); i++) {
			if (grid1.getRecord(i).getData()[1] != null
					&& grid1.getRecord(i).getData()[1] != ' ') {
				oFieldsGrid1[i] = grid1.getRecord(i).getData()[1];
			}
		}
		$('<input />').attr({
			'type' : 'hidden',
			'id' : 'fieldsGrid1Selected',
			'name' : 'fieldsGrid1Selected',
		}).appendTo(oForm) // this
		.val(JSON.stringify(oFieldsGrid1));
	}
	if(typeof(grid2) != 'undefined'){
		for ( var i = 0; i < grid2.getRecordSet().getLength(); i++) {
			if (grid2.getRecord(i).getData()[1] != null
					&& grid2.getRecord(i).getData()[1] != ' ') {
				oFieldsGrid2[i] = grid2.getRecord(i).getData()[1];
			}
		}
		$('<input />').attr({
			'type' : 'hidden',
			'id' : 'fieldsGrid2Selected',
			'name' : 'fieldsGrid2Selected',
		}).appendTo(oForm) // this
		.val(JSON.stringify(oFieldsGrid2));
	}
}

function osy_send_form(select, currentModule, action, no_record_txt,action_module,return_info) {
	return sListView.send_form(select, currentModule, action, no_record_txt,action_module,return_info);
}