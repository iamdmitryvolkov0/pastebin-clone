@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <h3>Welcome, {{$user->name}}</h3>
        <h3>Your email -> {{$user->email}}</h3>
    </div>

@endsection
