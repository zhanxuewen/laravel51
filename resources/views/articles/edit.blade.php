 @extends('app')
 <script type='text/javascript' src="/js/all.js"></script>
@section('content')
    <div class="container">
        <h1>编辑文章</h1>

        {{--{!! Form::open(['url'=>'article/store']) !!}--}}
        {!! Form::model($article, ['method'=>'PATCH','url'=>'/article/'.$article->id]) !!}
        {!! Form::hidden('id', $article->id) !!}
        <div class="form-group">
            {!! Form::label('title','标题:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('content','正文:') !!}
            {!! Form::textarea('content',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_at', '发布时间') !!}
            {!! Form::input('date','published_at',$article->published_at->format('Y-m-d') ,['class'=>'form-control']) !!}
            {{--    {!! Form::input('date','published_at',datetime('Y-m-d h:i:s'),['class'=>'form-control']) !!}--}}
        </div>

        <div class="form-group">
            {!! Form::label('tag_list','选择标签') !!}
            {!! Form::select('tag_list[]',$tags,null,['class'=>'form-control js-example-basic-multiple','multiple'=>'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('发表文章',['class'=>'btn btn-success form-control']) !!}
        </div>
        {!! Form::close() !!}
        @include('errors.list')
    </div>

@endsection
<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签"
        });
    });
</script>