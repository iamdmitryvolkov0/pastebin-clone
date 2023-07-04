<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect(route('all'));
        }

        return redirect(route('login'));
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect(route('all'));
    }

    public function register(CreateUserRequest $request, UserRepositoryContract $userRepository): RedirectResponse
    {
        $userRepository->register($request->validated());

        return redirect(route('all'));
    }
}
