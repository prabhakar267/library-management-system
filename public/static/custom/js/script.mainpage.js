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
                    console.log(book.avaliability);
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

function loadIssue(issueID, module_box){
    var url = config.path.ajax 
            + "/books/" + issueID + '/edit';

    var default_tpl = _.template($('#search_issue').html());

    module_box.html('');
    
    $.ajax({
        url : url,
        success : function(data){
            module_box.append(default_tpl(data));
        },
        error: function(xhr, status, error){
            var err = eval("(" + xhr.responseText + ")");
            module_box.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
        },
        beforeSend : function(){
            module_box.css({'opacity' : 0.4});
        },
        complete : function() {
            module_box.css({'opacity' : 1.0});
        }
    });
}

function loadStudent(studentID, module_box){
    var url = config.path.ajax 
            + "/student/" + studentID;

    var default_tpl = _.template($('#search_student').html());

    module_box.html('');
    
    $.ajax({
        url : url,
        success : function(data){
            module_box.append(default_tpl(data));
        },
        error: function(xhr, status, error){
            var err = eval("(" + xhr.responseText + ")");
            module_box.prepend(templates.alert_box( {type: 'danger', message: err.error.message} ));
        },
        beforeSend : function(){
            module_box.css({'opacity' : 0.4});
        },
        complete : function() {
            module_box.css({'opacity' : 1.0});
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
                if(search_query != '')
                    loadSearchedBooks(search_query);
                break;

            case 'issue' :
                var searched_book = form.find('input').val(),
                    module_box = form.parents('.module').find('#module-body-results');

                if(searched_book != '')
                    loadIssue(searched_book, module_box);
                break;

            case 'student' :
                var searched_student = form.find('input').val(),
                    module_box = form.parents('.module').find('#module-body-results');

                if(searched_student != '')
                    loadStudent(searched_student, module_box);
                break;
        }
    });
});