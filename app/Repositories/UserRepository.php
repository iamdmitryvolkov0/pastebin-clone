<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserRepository implements Contracts\UserRepositoryContract
{
    public function register(array $fields): Model
    {
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);
        if ($user) {
            Auth::login($user);
        }
        return $user;
    }

}
