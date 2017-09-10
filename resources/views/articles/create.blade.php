 @extends('app')
 <script type='text/javascript' src="/js/all.js"></script>
@section('content')
    <div class="container">
        <h1>撰写新文章</h1>

        {{--{!! Form::open(['url'=>'article/store']) !!}--}}
        {!! Form::open(['url'=>'article']) !!}
        @include('articles.form')
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