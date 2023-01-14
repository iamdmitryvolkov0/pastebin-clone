@extends('layouts.default')

@section('content')
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Log in</h1>
        </div>
        <form method="post" action="{{route('login_process')}}">
            @csrf
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email"  class="form-control" id="email" name="email"
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
            <div>
                <a href="#">Forgot password?</a>
            </div>

            <div class="mb-3">
                <a href="{{route('register')}}">Register now</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
