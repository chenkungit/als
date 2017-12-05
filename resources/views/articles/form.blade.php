<div class="form-group">
    {!! Form::label('title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content') !!}
    {!! Form::textarea('content',null,['class'=>'form-control']) !!}
</div>
<div class="form-group ">
    {!! Form::label('published_at') !!}
    {!! Form::input('date','published_at',date('Y-m-d'),['class'=>'form-control']) !!}
</div>
<div class="form-group ">
    {!! Form::label('category') !!}
    {!! Form::select('category', ['T' => '技术分享', 'N' => '生活随笔'],null,['class'=>'form-control'])!!}
</div>
<div class="form-group ">
    {!! Form::label('Tags (多个标签用逗号隔开)') !!}
    {!! Form::input('text','tags',null,['class'=>'form-control'])!!}
</div>
<script>

    $(document).ready(function(){
       var ck_obj = CKEDITOR.replace('content', {
            //filebrowserBrowseUrl: '{{url('uploads/images/')}}',
            filebrowserUploadUrl: '{{url('/articles/image')}}?_token={{csrf_token()}}',
            allowedContent: true,
           toolbarCanCollapse: true,
           toolbarStartupExpanded: false,
            height:500
        });
//        alert(ck_obj);
//        ck_obj.setData($('#pre_content').html());
//        $('#pre_content').remove();
    });
</script>