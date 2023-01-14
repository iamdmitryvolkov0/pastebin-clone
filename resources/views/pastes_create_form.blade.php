@extends('layouts.default')

@section('content')
    <div class="container mt-5">

        <h1 class="display-4">Create new paste</h1>
        <div class="mt-5">
            <a href="/" class="btn btn-outline-secondary">All pastes</a>
            <a href="/public" class="btn btn-outline-success">Public</a>
            <a href="/private" class="btn btn-outline-warning">Private</a>
        </div>
    </div>
    <div class="container mt-5">
        <form method="POST" action="/store">
            @csrf
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="body" id="body"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add new task</button>
        </form>
    </div>
    </form>
@endsection
