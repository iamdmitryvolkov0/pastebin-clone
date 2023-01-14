<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

class AllTasksAction
{
    public function execute(): Collection //получение Paste со статусом PUBLIC | PRIVATE
    {
        return Paste::query()->whereNot('status',PasteStatusEnum::STATUS_UNLISTED)->get();
    }
}
