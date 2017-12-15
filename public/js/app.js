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

    try {
        var i, et = document.getElementById('tags').childNodes;
        for (i in et) {
            et[i].nodeName == 'A' && et[i].addEventListener('click', function (e) {
                e.preventDefault();
            });
        }

        TagCanvas.Start('myCanvas', 'tags', {
            textColour: '#777',
            outlineColour: '#777',
            reverse: true,
            depth: 1,
            dragControl: true,
            decel:0.95,
            maxSpeed: 0.05,
            initial: [-0.2, 0]
        });
    } catch (e) {
        // something went wrong, hide the canvas container
        //document.getElementById('myCanvasContainer').style.display = 'none';
    }

})