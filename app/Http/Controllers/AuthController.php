<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

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

    public function github(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect()//: RedirectResponse
    {
        $user = Socialite::driver('github')->user();
        $user = User::firstOrCreate([
            'email' => $user['email'],
        ], [
            'name' => $user['name'],
            'password' => Hash::make(Str::random(10)),
        ]);

        Auth::login($user);

        return redirect(route('all'));
    }

    public function banned(): View
    {
        return view('auth.banned');
    }
}
