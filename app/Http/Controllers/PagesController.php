<?php

namespace App\Http\Controllers;

use App\Actions\DeletePasteAction;
use App\Actions\GetSinglePasteAction;
use App\Actions\UpdatePasteAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

    public function get(string $hash,GetSinglePasteAction $action): View
    {
        return view('pastes.paste_page',
            [
                'paste' => $action->execute($hash),
            ]);
    }

    public function store(CreatePasteRequest $request, CreatePasteAction $action): RedirectResponse
    {
        $action->execute($request->validated());

        return redirect(route('all'));
    }

    public function delete(Request $request, DeletePasteAction $action): RedirectResponse
    {
        $action->execute($request->id);

        return redirect(route('all'));
    }

    public function update(Request $request, UpdatePasteAction $action): RedirectResponse
    {
        $action->execute($request->id);

        return redirect(route('all'));
    }
}
