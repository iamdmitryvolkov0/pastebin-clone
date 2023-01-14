<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

class PublicPastesAction
{
    public function execute(): Collection //получение Paste со статусом PUBLIC
    {
        return Paste::query()->where('status',PasteStatusEnum::STATUS_PUBLIC)->get();
    }
}
