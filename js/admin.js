function evaluate(){
    var item = $(this);
    var relatedItem = $("#" + item.attr("data-related-item")).parent();

    if(item.is(":checked")){
        relatedItem.fadeIn();
    }else{
        relatedItem.fadeOut();   
    }
}

$('input[type="checkbox"]').click(evaluate).each(evaluate);