<?php

namespace App\Http\Controllers;

use App\Domain\User\Actions\UserRegisterAction;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(Request $request)
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

        return redirect('/');
    }

    public function register(CreateUserRequest $request, UserRegisterAction $action): RedirectResponse
    {
        $action->execute($request->validated());
        return redirect('/');
    }
}
