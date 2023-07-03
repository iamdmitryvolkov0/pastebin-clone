<?php

namespace App\Domain\Actions;

use App\Models\User;

class UserRegisterAction
{
    public function execute(array $fields): void
    {
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        if ($user) {
            auth('web')->login($user);
        }
    }
}
