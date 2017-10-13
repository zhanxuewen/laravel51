@extends('app')
<link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>
@section('content')

    <div class="container">
        <div class="jumbotron">
            <h1>Article
                <a class="btn btn-lg btn-primary pull-right" href="/article/create" role="button">Create Article »</a>
            </h1>
        </div>
        <hr>
    </div>
    @foreach($articles as $article)
        <div class="container">
            <article class="format-image group ">
                <h2 class="post-title pad">
                    <a href="article/{{ $article->id }}"> {{ $article->title }}</a>
                    {{--<a href=" {{ url('article', $article->id) }}"> {{ $article->title }}</a>--}}
                </h2>
                <ul class="post-meta pad group">
                    <li><i class="fa fa-clock-o"></i>{{ $article->published_at->diffForHumans() }}</li>
                    @if($article->tags)
                        @foreach($article->tags as $tag)
                            <li><i class="fa fa-tag"></i>{{ $tag->name }}</li>
                        @endforeach
                    @endif
                </ul>
                <div class="post-inner">
                    <div class="post-deco">
                        <div class="hex hex-small">
                            <div class="hex-inner"><i class="fa"></i></div>
                            <div class="corner-1"></div>
                            <div class="corner-2"></div>
                        </div>
                    </div>
                    <div class="post-content pad">
                        <div class="entry custome">
                            {{ $article->intro }}
                        </div>
                        <a class="more-link-custom" href="article/{{ $article->id }}"><span><i>更多</i></span></a>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
    <div class = 'container'>
        {!! $articles->render() !!}
    </div>
@endsection