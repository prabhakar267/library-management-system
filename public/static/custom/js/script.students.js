function loadResults(){
    var url = config.path.ajax 
            + "/student/create?branch=" + $('#branch_select').val();

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
    
    loadResults();

});