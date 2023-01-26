@extends('layouts.default')

@section('content')
    <div class="container mt-5">

        <h1 class="display-4">Create new paste</h1>
        <div class="mt-5">
            <a href="{{route('all')}}" class="btn btn-outline-secondary">All pastes</a>
            <a href="{{route('public')}}" class="btn btn-outline-success">Public</a>
            <a href="{{route('private')}}" class="btn btn-outline-warning">Private</a>
        </div>
    </div>
    <div class="container mt-5">
        <form method="POST" action="{{route('store')}}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" id="status" value="0" checked>
                <label class="form-check-label" for="status">
                    Public (for everyone)
                </label>
            </div>
            @auth('web')
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1">
                    <label class="form-check-label" for="status">
                        Private (only for authorized users)
                    </label>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="radio" name="status" id="status" value="2">
                    <label class="form-check-label" for="status">
                        Unlisted (only with link)
                    </label>
                </div>
            @endauth
            <div class="form-check mt-3">
                <input class="form-check-input" type="checkbox" disabled>
                <label class="form-check-label" for="hide_in">
                    (by default) Don`t delete
                </label>
            </div>
            {{--            10 min,1 hour, 3 hours, 1 day, 1 week, 1month expired options--}}
            {{--VALUE SET IN MINUTES--}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="10">
                <label class="form-check-label" for="hide_in">
                    [Delete in 10 minutes]
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="60">
                <label class="form-check-label" for="hide_in">
                    [Delete in an hour]
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="180">
                <label class="form-check-label" for="hide_in">
                    [Delete in 3 hours]
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="1440">
                <label class="form-check-label" for="hide_in">
                    [Delete in a day]
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="10080">
                <label class="form-check-label" for="hide_in">
                    [Delete in a week]
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hide_in" id="hide_in" value="302400">
                <label class="form-check-label" for="hide_in">
                    [Delete in a month]
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Add new task</button>
        </form>
    </div>
@endsection
