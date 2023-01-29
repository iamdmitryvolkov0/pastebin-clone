@extends('layouts.default')
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/github-dark.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <h3 class="display-4 mt-5">{{$paste->title}}</h3>
            <p><code class="php"></code> {{$paste->body}} $hello='Hello world'</code>></p>
        </div>
    </div>
@endsection
