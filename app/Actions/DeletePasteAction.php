<?php

namespace App\Actions;

use App\Models\Paste;

class DeletePasteAction
{
    public function execute(int $id):void
    {
        $paste = Paste::findOrFail($id);
        $paste->delete();
    }
}
