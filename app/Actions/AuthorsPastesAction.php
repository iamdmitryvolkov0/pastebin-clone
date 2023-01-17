<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use function PHPUnit\Framework\isNull;

class AuthorsPastesAction
{
    public function execute(): Collection
    {
        $userId = auth()->id(); //получение id пользователя
        $query = Paste::query()
        ->with(['author'])
            ->whereNot('status', PasteStatusEnum::STATUS_UNLISTED)
        ->where('user_id',$userId);



        return $query->latest()
            ->get();
    }
}

