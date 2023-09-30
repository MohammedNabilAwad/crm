function osyDelegatesAddToList(data) {
    SUGAR.ajaxUI.showLoadingPanel();
    
    var form = $('#formDetailView');
    $.post( "index.php",
        {
            module: form.find('[name=module]').val(),
            record: form.find('[name=record]').val(),
            action: 'osyDelegatesAddToList',
            prospect_list_id: data.name_to_value_array.prospect_list,
            to_pdf: '1'
        }
    )
    .done(function( data ) {
        alert(data);
        SUGAR.ajaxUI.hideLoadingPanel();
    });
}
