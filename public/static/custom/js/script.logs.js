function loadResults(){
    var url = config.path.ajax 
            + "/issue-log";

    var table = $('#issue-logs-table');
    
    var default_tpl = _.template($('#all_logs_display').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Logs</td></tr>');
            } else {
                table.html('');
                for (var log in data) {
                    table.append(default_tpl(data[log]));
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

function issueBook(bookID, studentID, selectedForm){
    var url = config.path.ajax + '/issue-log',
        data = {};

    data.bookID = bookID;
    data.studentID = studentID;
    
    $.ajax({
        type : 'POST',
        data : { 
            data : data
        },
        url : url,
        success: function(data) {
            selectedForm.prepend(templates.alert_box( {type: 'success', message: data} ));
        },
        error: function(xhr, status, error){

            console.log(xhr);

            var err = jQuery.parseJSON(xhr.responseText).error;
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: err.message} ));
        },
        beforeSend: function() {
            selectedForm.css({'opacity' : '0.4'});
        },
        complete: function() {
            selectedForm.css({'opacity' : '1.0'});
        }
    });
}

function togglePlanStatus(studentID, flag, btn) {
    var module_body = btn.parents('.module-body'),
        table = $('#students-table');

    flag = (parseInt(flag) + 1) % 2;
    $.ajax({
        type : 'POST',
        data : { 
            _method : "PUT", 
            flag : flag
        },
        url : config.path.ajax + '/student/' + studentID,
        success: function(data) {

            module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
            if(flag == 1) {
                btn.html('<a class="btn btn-success">Approved</a>');
                btn.attr('data-status',0);
            } else {
                btn.html('<a class="btn btn-danger">Not Approved</a>');
                btn.attr('data-status',1);
            }
        },
        error: function(xhr, msg){
            module_body.prepend(templates.alert_box( {type: 'danger', message: msg} ));     
        },
        beforeSend: function() {
            table.css({'opacity' : '0.4'});
        },
        complete: function() {
            table.css({'opacity' : '1.0'});
        }
    });
}

$(document).ready(function(){

    $("#branch_select").change(function(){
        loadResults();
    });

    $("#category_select").change(function(){
        loadResults();
    });

    $("#year_select").change(function(){
        loadResults();
    });

    $(document).on("click","#issuebook",function(){
        var selectedForm = $(this).parents('form'),
            studentID = selectedForm.find("input[data-form-field~=student-issue-id]").val(),
            bookID = selectedForm.find("input[data-form-field~=book-issue-id]").val();
        
        if(studentID == "" || bookID == ""){
            selectedForm.prepend(templates.alert_box( {type: 'danger', message: "Invalid Data"} ));
        } else {
            issueBook(bookID, studentID, selectedForm);
        }
    });
    
    loadResults();

});