function loadResults(){
    var url = config.path.ajax 
            + "/student?branch=" + $('#branch_select').val();

    if($('#year_select').val() != 0){
        url += "&year=" + $('#year_select').val();
    }

    if($('#category_select').val() != 0){
        url += "&category=" + $('#category_select').val();
    }

    var table = $('#students-table');
    
    var default_tpl = _.template($('#allstudents_show').html());

    $.ajax({
        url : url,
        success : function(data){
            if($.isEmptyObject(data)){
                table.html('<tr><td colspan="99">No Students for these filters</td></tr>');
            } else {
                table.html('');
                for (var plan in data) {
                    table.append(default_tpl(data[plan]));
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

    $(document).on("click",".student-status",function(){
        var selectedRow = $(this).parents('tr'),
            studentID = selectedRow.data('student-id'),
            student_flag = $(this).attr('data-status');
        
        console.log(studentID);
        console.log(student_flag);
        
        togglePlanStatus(studentID, student_flag, $(this));
    });
    
    loadResults();

});