@extends('layouts.default')

@section('content')
    <div class=" container mt-2 d-flex flex-row-reverse">

        @guest('web')
            <form action="{{route('login')}}">
                <button class="btn btn-primary">Login</button>
            </form>
        @endguest

        @auth('web')
            <form action="{{route('logout')}}">
                <button class="btn btn-primary">Log out</button>
            </form>
        @endauth


    </div>
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
                @foreach($pastes as $paste)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{$paste->title}}</h4>
                            <p style="color: #909090">{{$paste->body}}</p>
                        </div>
                        @if($paste->status->value == 0)
                            <h4><span class="badge bg-success rounded-pill">Public</span></h4>
                        @endif
                        @if($paste->status->value == 1)
                            <h4><span class="badge bg-primary  rounded-pill">Private</span></h4>
                        @endif
                    </li>
                    <div>
                        <form action="/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$paste->id}}">
                            <button type="submit" class="btn btn-outline-success mt-3 mb-3">Make private</button>
                        </form>

                        <form action="/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$paste->id}}">
                            <button type="submit" class="btn btn-outline-danger mb-3">Delete</button>
                        </form>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
