<?php

namespace App\Domain\Paste\Actions;

use App\Models\Paste;
use App\Repositories\Contracts\PasteRepositoryContract;

class DeletePasteAction
{
    public function __construct(private readonly PasteRepositoryContract $pasteRepository)
    {

    }
    public function execute(int $id):void
    {
        $this->pasteRepository->deleteById($id);
    }
}
