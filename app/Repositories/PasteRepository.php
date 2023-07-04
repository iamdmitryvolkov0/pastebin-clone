<?php

namespace App\Repositories;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PasteRepository implements Contracts\PasteRepositoryContract
{
    public function create(array $data): Paste|Model
    {
        //TODO: Fix
        return Paste::query()->create($data);
    }

    public function get(): Paginator
    {
        $query = Paste::query()->where('status', PasteStatusEnum::STATUS_PUBLIC);

        $userId = Auth::id();

        if ($userId) {
            $query->orWhere('user_id', $userId);
        }

        return $query->latest()->simplePaginate(10);
    }

    public function deleteById(int $id): void
    {
        //TODO: Fix
        $paste = Paste::query()->findOrFail($id);
        $paste->delete();
    }

    public function hideExpired()
    {
//        Paste::query()
//            ->whereNot('status', PasteStatusEnum::STATUS_HIDDEN)
//            ->whereNotNull('hide_in')
//            ->where('hide_in', '<', Carbon::now())
//            ->update(['status' => PasteStatusEnum::STATUS_HIDDEN]);
    }

    public function getByStatus(PasteStatusEnum $status): Collection
    {
        return Paste::query()
            ->where('status', $status)
            ->get();
    }

    public function getSingle(string $hash): Model|Builder
    {
        return Paste::query()->where('hash_link',$hash)->firstOrFail();
    }
}
