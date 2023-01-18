<?php

namespace App\Http\Controllers;

use App\Actions\AuthorsPastesAction;
use App\Actions\PrivatePastesAction;
use App\Actions\PublicPastesAction;
use Illuminate\View\View;
use App\Models\Paste;
use App\Actions\AllPastesAction;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function all(AllPastesAction $action):View
    {
        return view('pastes.pastes_all', [
            'pastes' => $action->execute(),
            'user' => Auth::user()
        ]);
    }

    public function public(PublicPastesAction $action):View
    {
        return view('pastes.pastes_public', [
            'pastes_public' => $action->execute()
        ]);
    }

    public function private(PrivatePastesAction $action):View
    {
        return view('pastes.pastes_private', [
            'pastes_private' => $action->execute(),
            'user' => Auth::user()
        ]);
    }

    public function userPastes(AuthorsPastesAction $action): View
    {
        return view('pastes.pastes_by_author', [
            'pastes' => $action->execute(),
            'user' => Auth::user()
        ]);
    }

    public function pastePage(int $id): View
    {

        $paste = Paste::findOrFail($id);

        return view('pastes.paste_page', [
            'paste' => $paste,
        ]);
    }

    public function form():View
    {
        return view('pastes.pastes_create_form');
    }

    public function profile():View
    {
        return view('auth.profile', [
            'user' => Auth::user()
        ]);
    }
}
