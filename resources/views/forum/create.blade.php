@extends('app')
@section('content')
    @include('editor::head')
    <div class="container">
        <div class="col-md-12" role="'main">
            {!! Form::open(['url'=>'/discussions']) !!}
            <div class="form-group">
                {!! Form::label('title','标题：') !!}
                {!! Form::text('title',null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('body','内容：') !!}
                <div class="editor">
                    {!! Form::textarea('body',null, ['class'=>'form-control','id'=>'myEditor']) !!}
                </div>
            </div>


            <div class="form-group">
                {!! Form::submit('发表', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop



