<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Contracts\Pagination\Paginator;

class AllPastesAction
{
    public function execute(): Paginator //получение Paste со статусом PUBLIC | PRIVATE
    {
        $query = Paste::query()
            ->with(['author'])
            ->whereNot('status', PasteStatusEnum::STATUS_UNLISTED);
        $userId = auth()->id();
        if (!is_null($userId)) {
            $query->whereOr('user_id', $userId);
        } else {
            $query->whereNull('user_id');
        }
        return $query->latest()
            ->simplePaginate(10);
    }
}
