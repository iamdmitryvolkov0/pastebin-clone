<?php

namespace App\Domain\Actions;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;

class UpdatePasteAction
{
    public function execute(int $id)
    {
        $paste = Paste::findOrFail($id);
        $paste->status = PasteStatusEnum::STATUS_PRIVATE;
        $paste->save();
    }
}
