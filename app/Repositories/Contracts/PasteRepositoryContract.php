<?php

namespace App\Repositories\Contracts;

use App\Enums\PasteStatusEnum;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PasteRepositoryContract
{
    public function create(array $data): void;

    public function get(): Paginator;

    public function getByStatus(PasteStatusEnum $status): Collection;

    public function getSingle(string $hash): Model|Builder;

    public function hideExpired(): void;

    public function updateStatus(int $id): void;

    public function deleteById(int $id): void;

    public function reportById(int $id): void;
}
