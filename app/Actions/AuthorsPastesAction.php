<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class AuthorsPastesAction
{
    public function execute(): Collection
    {
        $user = Auth::user();
        $query = Paste::query()
        ->with(['author'])
            ->whereNot('status', PasteStatusEnum::STATUS_UNLISTED)
        ->where('user_id',$user['id']);

        return $query->latest()
            ->get();
    }
}

