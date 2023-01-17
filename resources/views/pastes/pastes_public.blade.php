@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">All pastes</h1>
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            @auth('web')
                <a href="{{route('private')}}" class="btn btn-outline-primary">Private</a>
            @endauth
            <div class="mt-4">
                <a href="{{route('create')}}" class="btn btn-outline-dark">Create new paste</a>
            </div>
            <ul class="list-group mt-4">
                @foreach($pastes_public as $paste)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{$paste->title}}</h4>
                            <p style="color: #909090">{{$paste->body}}</p>
                        </div>
                        <h4><span class="badge bg-success rounded-pill">Public</span></h4>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
