@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <div class="container mt-2 d-flex flex-row-reverse">
                @auth('web')
                    <form action="{{route('logout')}}">
                        <p>Hello, <a href="{{route('profile')}}"> {{$user->name}}</a></p>
                        <button class="btn btn-primary">Log out</button>
                    </form>
            </div>
            @endauth
            <h1 class="display-4">Your pastes</h1>
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            <a href="{{route('private')}}" class="btn btn-outline-primary">Private</a>
            <ul class="list-group mt-4">
                @auth('web')
                    @foreach($pastes as $paste)
                        @if($paste->user_id == \Illuminate\Support\Facades\Auth::id())
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <small>by {{$paste->author?->name ??'Anonimous'}}</small>
                                    <h4>{{$paste->title}}</h4>
                                    <p style="color: #909090">{{$paste->body}}</p>
                                </div>
                                @if($paste->status == \App\Enums\PasteStatusEnum::STATUS_PUBLIC)
                                    <h6><span class="badge bg-success rounded-pill">Public</span></h6>
                                @endif
                                @if($paste->status == \App\Enums\PasteStatusEnum::STATUS_PRIVATE)
                                    <h6><span class="badge bg-primary  rounded-pill">Private</span></h6>
                                @endif
                            </li>
                        @endif

                    @endforeach
                @endauth
            </ul>
        </div>
    </div>
@endsection
