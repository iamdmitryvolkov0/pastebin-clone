<?php

namespace App\Domain\Paste\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Carbon\Carbon;

class HideExpiredPastesAction
{
    public function execute()
    {
        Paste::query()
            ->whereNot('status', PasteStatusEnum::STATUS_HIDDEN)
            ->whereNotNull('hide_in')
            ->where('hide_in', '<', Carbon::now())
            ->update(['status' => PasteStatusEnum::STATUS_HIDDEN]);
    }
}
