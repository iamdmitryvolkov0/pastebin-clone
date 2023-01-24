<?php

namespace App\Actions;

use App\Models\Paste;

class GetSinglePasteAction
{
    public function execute($hash)
    {
        return Paste::query()->where('hash_link',$hash)->firstOrFail();
    }
}
