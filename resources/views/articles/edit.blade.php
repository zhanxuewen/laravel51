 @extends('app')

@section('content')
    <div class="container">
        <h1>编辑文章</h1>

        {{--{!! Form::open(['url'=>'article/store']) !!}--}}
        {!! Form::model($article, ['method'=>'PATCH','url'=>'/article/'.$article->id]) !!}
        @include('articles.form')
        {!! Form::close() !!}
        @include('errors.list');
    </div>

@endsection
<script type="text/javascript">
    $(function() {
        $(".js-example-basic-multiple").select2({
            placeholder: "添加标签"
        });
    });
</script>