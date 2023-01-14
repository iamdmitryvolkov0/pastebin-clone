<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

class PrivateTasksAction
{
    public function execute(): Collection //получение Paste со статусом PRIVATE
    {
        return Paste::query()->where('status',PasteStatusEnum::STATUS_PRIVATE)->get();
    }
}
