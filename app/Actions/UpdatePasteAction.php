<?php

namespace App\Actions;

use App\Models\Paste;

class UpdatePasteAction
{
    public function execute(int $id)
    {
        $paste = Paste::findOrFail($id);
        $paste->status = 1;
        $paste->save();
    }
}
