<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Paste;
use App\Actions\GetAllPastesAction;
use Illuminate\Support\Facades\Auth;
use App\Enums\PasteStatusEnum;
use App\Http\Requests\CreatePasteRequest;
use Illuminate\Http\RedirectResponse;
use App\Actions\GetPastesByStatusAction;
use App\Actions\CreatePasteAction;


class PagesController extends Controller
{
    public function all(GetAllPastesAction $action): View
    {
        return view('pastes.pastes_all', [
            'pastes' => $action->execute(),
            'user' => Auth::user()
        ]);
    }

    public function public(GetPastesByStatusAction $action): View
    {
        return view('pastes.pastes_public', [
            'pastes_public' => $action->execute(PasteStatusEnum::STATUS_PUBLIC)
        ]);
    }

    public function private(GetPastesByStatusAction $action): View
    {
        return view('pastes.pastes_private', [
            'pastes_private' => $action->execute(PasteStatusEnum::STATUS_PRIVATE),
            'user' => Auth::user()
        ]);
    }

    public function userPastes(GetAllPastesAction $action): View
    {
        return view('pastes.pastes_by_author', [
            'pastes' => $action->execute(),
            'user' => Auth::user()
        ]);
    }

    public function get(int $id): View
    {

        $paste = Paste::findOrFail($id);

        return view('pastes.paste_page', [
            'paste' => $paste,
        ]);
    }

    public function store(CreatePasteRequest $request, CreatePasteAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect(route('all'));
    }

    public function delete(int $id): RedirectResponse
    {
        $paste = Paste::findOrFail($id);
        $paste->delete();

        return redirect(back());
    }

    public function update(int $id):RedirectResponse
    {
        $paste = Paste::findOrFail($id);
        $paste->status = 1;
        $paste->save();

        return redirect()->back();
    }
}
