@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">All pastes</h1>
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            <a href="{{route('private')}}" class="btn btn-outline-primary">Private</a>
            <div class="mt-4">
                <a href="{{route('create')}}" class="btn btn-outline-dark">Create new paste</a>
            </div>
            <ul class="list-group mt-4">
                @auth('web')
                    @foreach($pastes_private as $paste)
                        @if($paste->user_id == $user['id'])
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>{{$paste->title}}</h4>
                                    <p style="color: #909090">{{$paste->body}}</p>
                                </div>
                                <h4><span class="badge bg-primary rounded-pill">Private</span></h4>
                            </li>
                        @endif
                    @endforeach
                @endauth
            </ul>
        </div>
    </div>
@endsection
