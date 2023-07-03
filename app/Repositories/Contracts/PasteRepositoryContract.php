<?php

namespace App\Repositories\Contracts;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Model;

interface PasteRepositoryContract
{
    public function create(array $data): Paste|Model;

    public function deleteById(int $id): void;

}
