<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class AuthController
{
    public function login(Request $request)
    {
        //TODO Сделать валидацию в FormRequest
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

    public function register(Request $request): RedirectResponse
    {
        //TODO вынести в FormRequest
        $data = $request->validate([
            'name' => ['required', 'string', 'min:4'],
            'email' => ['required', 'email', 'string', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8']
        ]);

        //Вынести в action
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if ($user) {
            auth('web')->login($user);
        }
        return redirect('/');
    }
}
