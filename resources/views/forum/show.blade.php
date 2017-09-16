@extends('app')
@section('content')
    <div class="container">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <div class="media">
                    <div class="media-left">
                        <a href="">
                            <img style = 'width: 64px; height: 64px; ' src="{{$discussion->user->avatar}}" alt="64×64" class="media-object img-circle">
                        </a>
                        @can('show-post',$discussion)
                            <a href="#">编辑文章</a>
                        @endcan
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">
                            {{$discussion->title}}
                            @if(Auth::check() && Auth::user()->id ==$discussion->user_id)
                            <a class="btn btn-lg btn-primary pull-right" href="/discussions/{{$discussion->id}}/edit" role="button">修改帖子»</a>
                            @endif
                        </h4>
                        {{$discussion->user->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10" role="main">
                <div class="blog-post">
                    {!! $html !!}
                </div>

                <hr>
                <div class="social-share" data-initialized="true">
                    <a href="#" class="social-share-icon icon-weibo"></a>
                    <a href="#" class="social-share-icon icon-qq"></a>
                    <a href="#" class="social-share-icon icon-qzone"></a>
                    <a href="#" class="social-share-icon icon-wechat"></a>
                    <a href="#" class="social-share-icon icon-douban"></a>
                </div>
                @foreach($discussion->comments as $comment)
                    <div class="media">
                        <div class="media-left">
                            <a href="">
                                <img style = 'width: 64px; height: 64px; ' src="{{$comment->user->avatar}}" alt="64×64" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">
                                {{ $comment->user->name }}
                            </h4>
                            {{--{{ $comment->body }}--}}
                            {!! $comment->body !!}
{{--                            {!! new Markdown\Markdown(new Parser))->markdown($comment->body) !!}--}}
                        </div>
                    </div>

                @endforeach
                <hr>
                @if(Auth::check())
                {!! Form::open(['url' => '/comment']) !!}
                {!! Form::hidden('discussion_id',$discussion->id) !!}
                <div class="form-group">
                    {!! Form::label('body', '评论： ') !!}
                    {!! Form::textarea('body', null,['class'=>'form-control']) !!}
                </div>
                <div>
                    {!! Form::submit('发表评论',['class'=>'btn btn-success pull-right']) !!}
                </div>
                {!! Form::close() !!}
                @else
                    <a href="/user/login" class="btn btn-block btn-success">登陆参与评论</a>
                @endif
            </div>
        </div>
    </div>
@endsection