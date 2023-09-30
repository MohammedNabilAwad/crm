if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {
    SUGAR.util.doWhen("typeof(document.getElementsByTagName('body')[0]) != 'undefined'", function() { 
    	
    	var status = document.getElementById('status').value;
    	var button = document.getElementById('convert_lead_button');
    	if(status != "Final Stage" && status != ""){
    		button.parentNode.removeChild(button);
    	}
    	
    });
}

