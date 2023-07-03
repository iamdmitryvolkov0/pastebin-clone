<?php

namespace App\Domain\Paste\Actions;

use App\Models\Paste;
use App\Repositories\Contracts\PasteRepositoryContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CreatePasteAction
{
    public function __construct(private readonly PasteRepositoryContract $pasteRepository)
    {
    }

    public function execute(array $fields): void
    {
        $hashingPhrase = $fields['title'] . Auth::id() . time();
        $minutes = isset($fields['hide_in']) ? Carbon::now()->addMinutes($fields['hide_in']) : NULL;
        $language = $fields['language'] ?: null;

        $createData = [
            'title' => $fields['title'],
            'body' => $fields['body'],
            'status' => $fields['status'],
            'user_id' => Auth::id(),
            'hash_link' => Hash::make($hashingPhrase),
            'hide_in' => $minutes,
            'language' => $language
        ];

        $this->pasteRepository->create($createData);
    }
}
