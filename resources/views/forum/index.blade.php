@extends('app')
@section('content')
    <div class="container">

        <!-- Main component for a primary marketing message or call to action -->
        <div class="jumbotron">
            <h1>Hello World !
                <a class="btn btn-lg btn-primary pull-right" href="/discussions/create" role="button">Open Source & Share Mind »</a>
            </h1>
        </div>

    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10" role="main">
                @foreach($disconsions as $discussion)
                    <div class="media">
                        <div class="media-left">
                            <a href="">
                                <img style = 'width: 64px; height: 64px; ' src="{{$discussion->user->avatar}}" alt="64×64" class="media-object img-circle">
                            </a>
                        </div>
                        <div class="media-body">

                            <h4 class="media-heading">
                                <a href="/discussions/{{$discussion->id}}">
                                    {{$discussion->title}}
                                </a>
                                <div class="media-conversation-meta">
                                    <span class="media-conversation-replies">
                                    <a href="/discussion/154#reply">{{ count($discussion->comments) }}</a>
                                    回复
                                    </span>
                                </div>
                            </h4>
                            {{$discussion->user->name}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection