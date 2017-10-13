{{--@extends('app')--}}
{{--@section('content')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div role="main" class="col-md-6 col-md-offset-3">--}}

                {{--{!! Form::open(['url'=>'/password/email']) !!}--}}
                {{--Email Field--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::label('email', '用户邮箱: ') !!}--}}
                    {{--{!! Form::email('email', old('email'), ['class'=>'form-control']) !!}--}}
                {{--</div>--}}

                {{--{!! Form::submit('发送重置密码邮件', ['class'=>'btn btn-success form-control']) !!}--}}
                {{--{!! Form::close() !!}--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    点击此处重置你的密码：{{ url('password/reset/'.$token) }}
{{--@stop--}}
