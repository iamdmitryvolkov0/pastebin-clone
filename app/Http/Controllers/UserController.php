<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController
{
    //TODO выносим логику с пользователем отдельно
    public function profile():View
    {
        return view('auth.profile', [
            'user' => Auth::user()
        ]);
    }
}
