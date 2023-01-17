@extends('layouts.default')

@section('content')
    <div class="container mt-2 d-flex flex-row-reverse">

        @guest('web')
            <form action="{{route('login')}}">
                <button class="btn btn-primary">Login</button>
            </form>
        @endguest

        @auth('web')
            <form action="{{route('logout')}}">
                <p>Hello, <a href="{{route('profile')}}"> {{$user->name}}</a></p>
                <button class="btn btn-primary">Log out</button>
            </form>
        @endauth


    </div>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">All pastes</h1>
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            @auth('web')
                <a href="{{route('private')}}" class="btn btn-outline-primary">Private</a>
            @endauth
            @auth('web')
                <a href="{{route('userPastes')}}" class="btn btn-warning">Your pastes</a>
            @endauth
            <div class="mt-4">
                <a href="{{route('create')}}" class="btn btn-outline-dark">Create new paste</a>
            </div>

            @foreach($pastes as $paste)
                <div class="list-group mb-3 mt-3">
                    <a href="/paste/{{$paste->id}}"
                       {{--Для авторизованных пользователей видны только их приватные посты и все публичные--}}
                       @auth('web')
                           @if($paste->user_id == $user->id | $paste->status->value !==2)
                               class="list-group-item list-group-item-action flex-column align-items-start">
                        <small class="d-flex flex-row-reverse">by {{$paste->author?->name ??'Anonimous'}}</small>
                        <input type="hidden" name="id" value="{{$paste->id}}">
                        @if($paste->status->value == 0)
                            <h6><span class="badge bg-success rounded-pill">Public</span></h6>
                        @endif
                        @if($paste->status->value == 1)
                            <h6><span class="badge bg-primary  rounded-pill">Private</span></h6>
                        @endif
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{$paste->title}}</h5>
                            <small>{{$paste->created_at->format('d-M-Y')}}</small>
                        </div>
                        <p class="mb-1">{{$paste->body}}</p>
                    </a>
                    <div class="mt-3">
                        @if($paste->status->value != 1)
                            <form action="/update" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$paste->id}}">
                                <button type="submit" class="btn btn-outline-success mb-3">Make private</button>
                            </form>
                        @endif

                        <form action="/delete" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$paste->id}}">
                            <button type="submit" class="btn btn-outline-danger mb-3">Delete</button>
                        </form>
                    </div>
                    @endif
                    @endauth
                    {{--Для гостей видны только анонимные публичные посты --}}
                    @guest('web')
                        @if(!is_null($paste->user_id) | $paste->status->value == 0)
                            class="list-group-item list-group-item-action flex-column align-items-start">
                            <small class="d-flex flex-row-reverse">by {{$paste->author?->name ??'Anonimous'}}</small>
                            <input type="hidden" name="id" value="{{$paste->id}}">
                            @if($paste->status->value == 0)
                                <h6><span class="badge bg-success rounded-pill">Public</span></h6>
                            @endif
                            @if($paste->status->value == 1)
                                <h6><span class="badge bg-primary  rounded-pill">Private</span></h6>
                            @endif
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$paste->title}}</h5>
                                <small>{{$paste->created_at->format('d-M-Y')}}</small>
                            </div>
                            <p class="mb-1">{{$paste->body}}</p>
                            </a>
                            <div class="mt-3">
                                @if($paste->status->value != 1)
                                    <form action="/update" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$paste->id}}">
                                        <button type="submit" class="btn btn-outline-success mb-3">Make private</button>
                                    </form>
                                @endif

                                <form action="/delete" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$paste->id}}">
                                    <button type="submit" class="btn btn-outline-danger mb-3">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endguest
                    @endforeach
                </div>
                {{--Пагинация--}}
                <div>
                    {{$pastes->links()}}
                </div>
@endsection
