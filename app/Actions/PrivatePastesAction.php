<?php

namespace App\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

class PrivatePastesAction
{
    public function execute(): Collection //получение Paste со статусом PRIVATE
    {
        $query = Paste::query()
            ->where('status',PasteStatusEnum::STATUS_PRIVATE);
        return $query->get();
    }
}
