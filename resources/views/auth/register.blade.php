@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Register</h1>
        </div>
        <form action="{{route('register_process')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="InputName" class="form-label">Your Name</label>
                <input type="text" placeholder="John Coffey" class="form-control" id="name" name="name">
            </div>
            <div>
                @error('name')
                <p color="#fa8e47"><span style="color: red; "/>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email" placeholder="dear_user@welcome.com" class="form-control" id="email" name="email"
                       aria-describedby="emailHelp">
            </div>
            <div>
                @error('email')
                <p color="#fa8e47"><span style="color: red; "/>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
            <div>
                @error('password')
                <p color="#fa8e47"><span style="color: red; "/>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password confirmation</label>
                <input type="password" class="form-control" id="Password" name="password_confirmation">
            </div>
            <div>
                @error('password_confirmation')
                <p color="#fa8e47"><span style="color: red; "/>{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                Have an account? <a href="{{route('login')}}">Log in</a>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
