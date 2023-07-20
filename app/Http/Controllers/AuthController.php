<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Repositories\Contracts\UserRepositoryContract;
use App\Services\Contracts\UserServiceContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController
{
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect(route('all'));
        }

        return redirect(route('login'));
    }

    public function logout(UserServiceContract $userService): RedirectResponse
    {
        $userService->logout();

        return redirect(route('all'));
    }

    public function register(CreateUserRequest $request, UserRepositoryContract $userRepository): RedirectResponse
    {
        $userRepository->register($request->validated());

        return redirect(route('all'));
    }

    public function github(UserServiceContract $userService): RedirectResponse
    {
        return $userService->github();
    }

    public function githubRedirect(UserServiceContract $userService): RedirectResponse
    {
        $userService->githubRedirect();

        return redirect(route('all'));
    }

    public function banned(): View
    {
        return view('auth.banned');
    }
}
