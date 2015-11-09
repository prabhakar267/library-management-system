var templates = templates || {};

$(function(){
    if($('script#alert_box').length>0) {
        templates.alert_box = _.template($('script#alert_box').html());
    }    
});