@extends('app')

@section('content')
    @if( isset($user) )
        <h1>{!! $user->username !!}'s Articles</h1>
    @else
        <h1>Articles List</h1>
    @endif

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