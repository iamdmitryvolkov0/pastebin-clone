<?php

namespace App\Domain\Paste\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;

class GetPastesByStatusAction
{
    public function execute(PasteStatusEnum $status): Collection
    {
        return Paste::query()
            ->where('status', $status)
            ->get();
    }
}
