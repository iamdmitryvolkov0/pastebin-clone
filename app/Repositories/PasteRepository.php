<?php

namespace App\Repositories;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Model;

class PasteRepository implements Contracts\PasteRepositoryContract
{
    public function create(array $data): Paste|Model
    {
        return Paste::query()->create($data);
    }

    public function deleteById(int $id): void
    {
        $paste = Paste::query()->findOrFail($id);
        $paste->delete();
    }
}
