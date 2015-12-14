function loadSearchedBooks(string){
    var url = config.path.ajax 
            + "/books/" + string;

    var table = $('#book-results'),
        table_parent_div = table.parents('table'),
        default_tpl = _.template($('#search_book').html());


    table_parent_div.show();

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No such books found in library</td></tr>');
            } else {
                table.html('');
                for(var books in data) {
                    book = data[books];

                    if(book.avaliability){
                        book.avaliability = '<a class="btn btn-success">Available</a>';
                    } else {
                        book.avaliability = '<a class="btn btn-danger">Not Available</a>';
                    }
                    
                    table.append(default_tpl(book));
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

function showFormModule(formid){
    var form = $('body').find("#" + formid),
        module = form.parents('.module');
        parent_div = module.parents('.content');

    parent_div.children(".module").hide();
    module.show();
}

$(document).ready(function(){   
    $(".homepage-form-box").click(function() {
        var formid = $(this).attr('id');

        formid = formid.substring(0, formid.length - 3) + 'form';
        showFormModule(formid);
    });

    $(".homepage-form-submit").click(function() {
        var form = $(this).parents('form')
            mode = form.attr('id');

        mode = mode.substring(4, mode.length - 4);

        switch(mode){
            case 'book' :
                var search_query = form.find('textarea').val();
                loadSearchedBooks(search_query);
                break;

            case 'issue' :
                console.log('aloo3');
                break;

            case 'student' :
                console.log('aloo2');
                break;
        }
        console.log(mode);
        // var search_query = $(this).parents('form').find('textarea').val();

        // if(search_query != '')
            // loadResults(search_query);
    });
});