function loadResults(){

    var url = config.path.ajax 
            + "/books?category_id=" + $('#category_fill').val();

    var table = $('#all-books');
    
    var default_tpl = _.template($('#allbooks_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Books in this category</td></tr>');
            } else {
                table.html('');
                for (var book in data) {
                    table.append(default_tpl(data[book]));
                }
            }
        },
        beforeSend : function(){
            table.css({'opacity' : 0.4});
        },
        complete : function() {
            table.css({'opacity' : 1.0});
        }
    });
}

$(document).ready(function(){

    $("#category_fill").change(function(){
        loadResults();
    });

    $(document).on("click","#addbooks",function(){

        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        sendJSON.title = f$('input[data-form-field~=title]').val();
        sendJSON.author = f$('input[data-form-field~=author]').val();
        sendJSON.description = f$('textarea[data-form-field~=description]').val();
        sendJSON.category = f$('select[data-form-field~=category]').val();
        sendJSON.number = parseInt(f$('input[data-form-field~=number]').val());

        if(sendJSON.title == "" || sendJSON.author == "" || sendJSON.description == "" || sendJSON.number == null){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Book Details Not Complete'} ));
            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                    add_book_data : JSON.stringify(sendJSON)
                },
                url : config.path.ajax + '/books',
                success: function(data) {                    
                    module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
                },
                error: function(xhr,status,error){
                    var err = eval("(" + xhr.responseText + ")");
                    module_body.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
                },
                beforeSend: function() {
                    form.css({'opacity' : '0.4'});
                },
                complete: function() {
                    form.css({'opacity' : '1.0'});
                }
            });
        }
    }); // add books to database


    loadResults();

});