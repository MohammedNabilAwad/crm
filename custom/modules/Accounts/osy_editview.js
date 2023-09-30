

function HideViewFields() {

	var member_type = document.getElementById('member_type').value;
	var panel2 = document.getElementById('detailpanel_2');
	var panel3 = document.getElementById('detailpanel_3');
	var panel4 = document.getElementById('detailpanel_4');
	var panel5 = document.getElementById('detailpanel_5');

	SUGAR.util.callOnChangeListers('association_member_type');
	var sRequired = "<span class='required'>*</span>";
	switch (member_type) {

		case 'Direct Company':
			if (document.getElementById('association_member_type').selectedIndex > 0) {
				document.getElementById('association_member_type').selectedIndex = 0;
				SUGAR.util.callOnChangeListers('association_member_type');
			}
			panel2.style.display = 'block';
			panel3.style.display = 'block';
			panel4.style.display = 'block';
			panel5.style.display = 'block';
			document.getElementById('name_label').innerHTML = SUGAR.language.get('Accounts', 'LBL_NAME') + sRequired;
			break;

		case 'Association':

			panel2.style.display = 'block';
			panel3.style.display = 'block';
			panel4.style.display = 'block';
			panel5.style.display = 'block';
			document.getElementById('name_label').innerHTML = SUGAR.language.get('Accounts', 'LBL_NAME_WITH_ASSOCIATION') + sRequired;
			break;

		case 'Indirect Member':

			if (document.getElementById('association_member_type').selectedIndex > 0) {
				document.getElementById('association_member_type').selectedIndex = 0;
				SUGAR.util.callOnChangeListers('association_member_type');
			}
			panel2.style.display = 'block';
			panel3.style.display = 'block';
			panel4.style.display = 'none';
			panel5.style.display = 'block';
			document.getElementById('name_label').innerHTML = SUGAR.language.get('Accounts', 'LBL_NAME') + sRequired;
			break;

		default:

			panel2.style.display = 'none';
			panel3.style.display = 'none';
			panel4.style.display = 'none';
			panel5.style.display = 'none';
			document.getElementById('name_label').innerHTML = SUGAR.language.get('Accounts', 'LBL_NAME') + sRequired;

	}

}

