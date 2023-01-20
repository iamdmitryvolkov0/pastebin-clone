<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class GetAllPastesAction
{
    public function execute(): Paginator //получение Paste со статусом PUBLIC | PRIVATE
    {
        $query = Paste::query()
            ->with(['author'])
            ->whereNot('status', PasteStatusEnum::STATUS_UNLISTED);

        $user = Auth::user();

        if (!is_null($user)) {
            $query->where('user_id', $user['id']);
        } else {
            $query->whereNull('user_id');
        }

        return $query->latest()
            ->simplePaginate(10);
    }
}
