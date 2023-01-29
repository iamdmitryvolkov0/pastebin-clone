<?php

namespace App\Actions;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CreatePasteAction
{
    public function execute(array $fields): void
    {
        $hashingPhrase = $fields['title'] . Auth::id() . time();
        $minutes = $fields['hide_in'] ? Carbon::now()->addMinutes($fields['hide_in']) : null;

        Paste::create([
            'title' => $fields['title'],
            'body' => $fields['body'],
            'status' => $fields['status'],
            'user_id' => Auth::id(),
            'hash_link' => Hash::make($hashingPhrase),
            'hide_in' => $minutes,
        ]);
    }
}
