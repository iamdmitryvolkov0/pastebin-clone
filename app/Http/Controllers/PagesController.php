<?php

namespace App\Http\Controllers;

use App\Actions\AuthorsPastesAction;
use App\Actions\GetUserAction;
use App\Actions\PrivatePastesAction;
use App\Actions\PublicPastesAction;
use Illuminate\Contracts\View\View;
use App\Models\Paste;
use App\Actions\AllPastesAction;


class PagesController extends Controller
{
    public function all(AllPastesAction $action, GetUserAction $getUserAction)
    {
        return view('pastes.pastes_all', [
            'pastes' => $action->execute(),
            'user' => $getUserAction->execute()
        ]);
    }

    public function public(PublicPastesAction $action)
    {
        return view('pastes.pastes_public', [
            'pastes_public' => $action->execute()
        ]);
    }

    public function private(PrivatePastesAction $action, GetUserAction $getUserAction)
    {
        return view('pastes.pastes_private', [
            'pastes_private' => $action->execute(),
            'user' => $getUserAction->execute()
        ]);
    }

    public function userPastes(AuthorsPastesAction $action, GetUserAction $getUserAction)
    {
        return view('pastes.pastes_by_author', [
            'pastes' => $action->execute(),
            'user' => $getUserAction->execute()
        ]);
    }

    public function pastePage(int $id): View
    {

        $paste = Paste::findOrFail($id);

        return view('pastes.paste_page', [
            'paste' => $paste,
        ]);
    }

    public function form()
    {
        return view('pastes.pastes_create_form');
    }

    public function profile(GetUserAction $getUserAction)
    {
        return view('auth.profile', [
            'user' => $getUserAction->execute()
        ]);
    }
}
