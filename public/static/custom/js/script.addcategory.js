function loadResults(){
    var url = config.path.ajax 
            + "/show-categories";

    var table = $('#allcategories-table');

    var default_tpl = _.template($('#allcategories_show').html());


    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Categories found.</td></tr>');
            } else {
                table.html('');
                // console.log(JSON.stringify(data));
                
                for(var category_list in data){
                    table.append(default_tpl(data[category_list]));
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


    $(document).on("click","#addcategory",function(){


        var form = $(this).parents('form'),
            module_body = $(this).parents('.module-body'),
            sendJSON ={},
            send_flag = true,
            f$ = function(selector) {
                return form.find(selector);
            };

        sendJSON.category = f$('input[data-form-field~=category]').val();

        if(sendJSON.category == ""){
            module_body.prepend(templates.alert_box( {type: 'danger', message: 'Category is missing.'} ));
            send_flag = false;
        }
        
        if(send_flag == true){

            $.ajax({
                type : 'POST',
                data : {
                    add_category_data : JSON.stringify(sendJSON)
                },
                url : config.path.ajax + 'show-categories',
                
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