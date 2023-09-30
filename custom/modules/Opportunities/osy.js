// solo dopo il caricamento completo della pagina vengono eseguite le funzioni....
if (typeof (SUGAR) != 'undefined' && typeof (SUGAR.util) != 'undefined' && typeof (SUGAR.util.doWhen) != 'undefined') {
	SUGAR.util.doWhen("typeof(document.getElementsByTagName('body')[0]) != 'undefined'", function () {

		//getNewPaymentInfo();

		getNewPaymentInfoQuickEdit();
		YAHOO.util.Event.addListener('account_id', 'change', getNewPaymentInfo);
		YAHOO.util.Event.addListener('invoice_date', 'change', setDateClose);

	});
}

function dateFormat(date, format) {
	// Calculate date parts and replace instances in format string accordingly
	format = format.replace("DD", (date.getDate() < 10 ? '0' : '') + date.getDate()); // Pad with '0' if needed
	format = format.replace("MM", (date.getMonth() < 9 ? '0' : '') + (date.getMonth() + 1)); // Months are zero-based
	format = format.replace("YYYY", date.getFullYear());
	return format;
}

function setDateClose() {
	var sInvoice_date = document.getElementById("invoice_date").value;
	var invoice_date = new Date(sInvoice_date);
	var month = invoice_date.getMonth() + 3; //Months are zero based

	var date_close = new Date(sInvoice_date);
	date_close.setMonth(month);

	document.getElementById("date_closed").value = dateFormat(date_close, "MM/DD/YYYY");
}

function getNewPaymentInfoQuickEdit() {

	var tpls = document.getElementsByName("tpl");
	if (typeof (tpls[0]) != 'undefined')
		getNewPaymentInfo();

}

function getNewPaymentInfo() {


	var records = document.getElementsByName("record");
	var tpls = document.getElementsByName("tpl");

	var oAccount_id = document.getElementById("account_id");

	if (oAccount_id && (records[0].value == '' || tpls[0].value == 'QuickCreate.tpl')) { // solo per una  nuova opportunità....

		var oCallback = {
			success: function (oResponse) {
				var oRes = {}; // variable returned from the ajax callback

				try {
					eval('oRes = ' + oResponse.responseText);
				}
				catch (e) { }

				//		                for(var i in oRes) {
				//		                	
				//		                	var ol = document.getElementById(i);
				//		                	if(ol) {
				//		                		
				//		                		ol.value = oRes[i];
				//		                	}
				//		                	
				//		                }

				// uso questa tecnica perchè il il byid non va bene anche in quickcreatedefs....
				//document.getElementsByName("name")[0].value=oRes['name'];
				document.getElementsByName("payment_status")[0].value = oRes['payment_status']
				document.getElementsByName("amount")[0].value = oRes['amount'];
				document.getElementsByName("expiry_date")[0].value = oRes['expiry_date'];


				window.setTimeout('ajaxStatus.hideStatus()', 500);
			},
			failure: function (oResponse) { window.setTimeout('ajaxStatus.hideStatus()', 500); },
			//		                 argument: [this], // passes array of arguments both to success and failure funcs
			//		                 scope: this
		};

		ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_LOADING'));
		YAHOO.util.Connect.asyncRequest(
			'POST',
			'index.php?module=Opportunities&action=getNewPaymentInfo&to_pdf=1',
			oCallback,
			'account_id=' + oAccount_id.value
		);
	}

}
