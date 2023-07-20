<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class UserService implements Contracts\UserServiceContract
{
    public function login(array $credentials): JsonResponse
    {
        if (Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User logged in',
                'user' => Auth::user()
            ]);
        }
        return response()->json([
            'message' => 'The provided credentials do not match our records',
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::logout();
        return response()->json([
            'message' => 'Logged out',
        ]);
    }

    public function github(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(): void
    {
        $user = Socialite::driver('github')->user();
        $user = User::firstOrCreate([
            'email' => $user['email'],
        ], [
            'name' => $user['name'],
            'password' => Hash::make(Str::random(10)),
        ]);

        Auth::login($user);
    }

    public function profile(): string|Authenticatable
    {
        return Auth::user() ?? 'Unknown user';
    }
}
