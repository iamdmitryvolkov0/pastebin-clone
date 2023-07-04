<?php

namespace App\Repositories\Contracts;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


interface PasteRepositoryContract
{
    public function create(array $data): Paste|Model;

    public function get(): Paginator;

    public function deleteById(int $id): void;

    public function getByStatus(PasteStatusEnum $status): Collection;

    public function getSingle(string $hash): Model | Builder;

}
