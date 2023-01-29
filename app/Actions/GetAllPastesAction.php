<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class GetAllPastesAction
{
    public function execute(): Paginator
    {
        $query = Paste::query()->where('status', PasteStatusEnum::STATUS_PUBLIC);

        $userId = Auth::id();

        if ($userId) {
            $query->orWhere('user_id', $userId);
        }

        return $query->latest()->simplePaginate(10);
    }
}
