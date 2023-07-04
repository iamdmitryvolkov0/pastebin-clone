@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <h3 class="display-4 mt-5">{{$paste->title}}</h3>
            <p>
                <pre>
                <code class="{{$paste->language}}">{{$paste->body}}</code>
                </pre>
            </p>
        </div>
    </div>
@endsection
