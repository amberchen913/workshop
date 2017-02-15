@extends('app')

@section('content')
    <h1>Articles</h1>
    <hr>

    @foreach($articles as $article)
        <article>
            <h2>
                {{-- <a href="/articles/{{ $article->id }}">{{ $article->title }}</a> --}}
                {{-- <a href="{{ action('ArticlesController@show', [$article->id]) }}">{{ $article->title }}</a> --}}
                <a href="{{ url('/articles', $article->id) }}">{{ $article->title }}</a>
            </h2>
            <p>{{ $article->body }}</p>
        </article>
    @endforeach
@stop