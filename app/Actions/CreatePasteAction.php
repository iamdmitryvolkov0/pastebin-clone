<?php

namespace App\Actions;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreatePasteAction
{
    //TODO выносим метод создания
    public function execute(array $fields): void
    {
        $hashingPhrase = $fields['title'] . Auth::id() . time();

        Paste::create([
            'title' => $fields['title'],
            'body' => $fields['body'],
            'status' => $fields['status'],
            'user_id' => Auth::id(),
            'hash_link' => Hash::make($hashingPhrase),
        ]);
    }
}
