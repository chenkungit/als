function changestatue(sx) {

    $("li.active").removeClass('active');
    $(sx).addClass('active');

}

$(function () {

    $('#collapse_panel').click(function () {
        if($('#collapse_span').attr('class')=='glyphicon glyphicon-chevron-up')
        {
            $('#collapse_span').removeClass();
            $('#collapse_span').addClass('glyphicon glyphicon-chevron-down');
        }else
        {
            $('#collapse_span').removeClass();
            $('#collapse_span').addClass('glyphicon glyphicon-chevron-up');
        }
    })


})