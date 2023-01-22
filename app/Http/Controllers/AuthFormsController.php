<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthFormsController
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }
}
