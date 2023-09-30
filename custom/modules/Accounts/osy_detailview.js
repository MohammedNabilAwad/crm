if(typeof(SUGAR) != 'undefined' &&  typeof(SUGAR.util) != 'undefined' &&  typeof(SUGAR.util.doWhen) != 'undefined') {
    SUGAR.util.doWhen("typeof(document.getElementsByTagName('body')[0]) != 'undefined'", function() {
        SUGAR.util.doWhen("document.getElementById('detailpanel_4') ", function() {
        	ShowPanelCategoria();
         });
    });
}

function ShowPanelCategoria() {
    var member_type = document.getElementById("member_type").value;
    if(member_type == "Indirect Member") {
    	document.getElementById('detailpanel_4').style.display="none";
    }
}