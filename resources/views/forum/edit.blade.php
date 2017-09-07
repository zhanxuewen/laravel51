@extends('app')
@section('content')
    <div class="container">
        <div class="col-md-8 col-md-offset-2" role="'main">
            {!! Form::model($discussion,['method'=>'PATCH','url'=>'/discussions/'.$discussion->id]) !!}
            <div class="form-group">
                {!! Form::label('title','标题：') !!}
                {!! Form::text('title',null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('body','内容：') !!}
                {!! Form::textarea('body',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('更新', ['class'=>'btn btn-primary pull-right']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop



