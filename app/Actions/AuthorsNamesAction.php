<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class AuthorsNamesAction
{
    public function execute(): Collection //получение Paste со статусом PRIVATE
    {
        return User::query()->where('name')->get();
    }
}
