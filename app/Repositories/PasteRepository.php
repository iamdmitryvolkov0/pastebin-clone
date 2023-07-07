<?php

namespace App\Repositories;

use App\Enums\PasteStatusEnum;
use App\Models\Paste;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasteRepository implements Contracts\PasteRepositoryContract
{
    public function create(array $data): array
    {
        $hashingPhrase = $data['title'] . Auth::id() . time();
        $minutes = isset($data['hide_in']) ? Carbon::now()->addMinutes($data['hide_in']) : null;
        $language = $data['language'] ?: null;

        $createData = [
            'title' => $data['title'],
            'body' => $data['body'],
            'status' => $data['status'],
            'user_id' => Auth::id(),
            'hash_link' => Hash::make($hashingPhrase),
            'hide_in' => $minutes,
            'language' => $language ?? 'language-plaintext',
        ];

        return Paste::create($createData);
    }

    public function get(): Paginator
    {
        $query = Paste::query()->where('status', PasteStatusEnum::STATUS_PUBLIC);

        $userId = Auth::id();

        if ($userId) {
            $query->orWhere('user_id', $userId);
        }

        return $query->simplePaginate(10);
    }

    public function getByStatus(PasteStatusEnum $status): Collection
    {
        return Paste::query()
            ->where('status', $status)
            ->get();
    }

    public function getSingle(string $hash): Model|Builder
    {
        return Paste::query()->where('hash_link', $hash)->firstOrFail();
    }

    public function getById(int $id): Model|Builder
    {
        return Paste::query()->where('id', $id)->firstOrFail();
    }

    public function hideExpired(): void
    {
        Paste::query()
            ->whereNot('status', PasteStatusEnum::STATUS_HIDDEN)
            ->whereNotNull('hide_in')
            ->where('hide_in', '<', Carbon::now())
            ->update(['status' => PasteStatusEnum::STATUS_HIDDEN]);
    }

    public function updateStatus(int $id): void
    {
        $paste = Paste::findOrFail($id);
        $paste->status = PasteStatusEnum::STATUS_PRIVATE;
        $paste->save();
    }

    public function deleteById(int $id): void
    {
        $paste = Paste::query()->findOrFail($id);
        $paste->delete();
    }

    public function reportById(int $id): void
    {
        $paste = Paste::query()->findOrFail($id);
        $report = new Report();
        $report->paste_id = $paste->id;
        $report->reason = request('reason');
        $report->save();
    }
}
