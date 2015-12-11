function loadResults(){
    var url = config.path.ajax 
            + "/student?branch=" + $('#branch_select').val();

    if($('#year_select').val() != 0){
        url += "&year=" + $('#year_select').val();
    }

    if($('#category_select').val() != 0){
        url += "&category=" + $('#category_select').val();
    }

    var table = $('#approval-table');
    
    var default_tpl = _.template($('#approvalstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Students for approval for these filters</td></tr>');
            } else {
                table.html('');
                for (var student in data) {
                    table.append(default_tpl(data[student]));
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

function approveStudent(studentID, flag, btn) {
    var module_body = btn.parents('.module-body'),
        table = $('#approval-table');

    console.log(flag);

    $.ajax({
        type : 'POST',
        data : { 
            _method : "PUT", 
            flag : flag
        },
        url : config.path.ajax + '/student/' + studentID,
        success: function(data) {
            module_body.prepend(templates.alert_box( {type: 'success', message: data} ));
            loadResults();
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

    $(document).on("click",".student-status",function(){
        var selectedRow = $(this).parents('tr'),
            studentID = selectedRow.data('student-id')
            flag = $(this).data('status');
        
        console.log(studentID);
        console.log(flag);
        
        approveStudent(studentID, flag, $(this));
    });
    
    loadResults();

});