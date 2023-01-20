<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AuthFormsController
{
    //TODO выносим формы в отдельные контроллеры
    public function login(): View
    {
        return view('auth.login');
    }

    public function register(): View
    {
        return view('auth.register');
    }
}
