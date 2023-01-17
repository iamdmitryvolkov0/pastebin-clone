<?php
namespace App\Actions;

use App\Models\User;

class GetUserAction
{
    public function execute() //получение Paste со статусом PUBLIC | PRIVATE
    {
        $userId = auth()->id();
        $user = User::query()->where('id', $userId);
        return $user->get()->first();
    }
}

