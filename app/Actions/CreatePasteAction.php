<?php

namespace App\Actions;

use App\Models\Paste;
use Illuminate\Support\Facades\Auth;

class CreatePasteAction
{
    public function execute(array $fields): void
    {
        Paste::create([
            'title' => $fields['title'],
            'body' => $fields['body'],
            'status' => $fields['status'],
            'user_id' => Auth::id()
        ]);
    }
}
