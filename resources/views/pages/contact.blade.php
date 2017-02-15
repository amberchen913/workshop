@extends('app')

@section('content')
<h1>Hi, {{ $first }} {{ $last }} ~~</h1>

@stop

@section('footer')
    <script>
        alert('Contact from scripts');
    </script>
@stop