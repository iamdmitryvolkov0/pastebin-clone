@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">All pastes</h1>
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            <a href="{{route('private')}}" class="btn btn-outline-primary">Private</a>
            <ul class="list-group mt-4">

                @auth('web')
                @foreach($pastes as $paste)

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <small >by {{$paste->author?->name ??'Anonimous'}}</small>
                            <h4>{{$paste->title}}</h4>
                            <p style="color: #909090">{{$paste->body}}</p>
                        </div>
                        @if($paste->status->value == 0)
                            <h6><span class="badge bg-success rounded-pill">Public</span></h6>
                        @endif
                        @if($paste->status->value == 1)
                            <h6><span class="badge bg-primary  rounded-pill">Private</span></h6>
                        @endif
                    </li>
                @endforeach

                @endauth
                @guest('web')
                        @foreach($pastes_private as $paste)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h4>{{$paste->title}}</h4>
                                    <p style="color: #909090">{{$paste->body}}</p>
                                </div>
                                <h4><span class="badge bg-primary rounded-pill">Private</span></h4>
                            </li>
                        @endforeach
                    @endguest
            </ul>
        </div>
    </div>
@endsection
