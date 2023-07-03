<?php

namespace App\Domain\Paste\Actions;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class GetSinglePasteAction
{
    public function execute($hash): Model|Builder
    {
        return Paste::query()->where('hash_link',$hash)->firstOrFail();
    }
}
