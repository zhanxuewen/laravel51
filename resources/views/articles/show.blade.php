
@extends('app')
<link rel='stylesheet' href="/css/all.css" type='text/css' media='all'/>
@section('content')

    <div class="container">
        <section class="content">
            <div class="pad group">
                <div class="container">
                <article class="format-image group">
                    <h2 class="post-title pad">
                        <a href="/articles/{{ $article->id }}" rel="bookmark"> {{ $article->title }}</a>
                    </h2>
                    <div class="post-inner">
                        <div class="post-content pad">
                            <div class="entry custome">
                                {!! $content !!}
                            </div>
                        </div>
                    </div>
                </article>
                </div>
            </div>
        </section>
    </div>
@endsection
