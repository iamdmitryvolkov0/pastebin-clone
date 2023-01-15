<?php

namespace App\Http\Controllers;

use App\Actions\PrivatePastesAction;
use App\Actions\PublicPastesAction;
use Illuminate\Http\Request;
use App\Models\Paste;
use App\Actions\AllPastesAction;


class PagesController extends Controller
{
    public function all(AllPastesAction $action)
    {
        return view('pastes_all', [
            'pastes' => $action->execute()
        ]);
    }

    public function public(PublicPastesAction $action)
    {
        return view('pastes_public', [
            'pastes_public' => $action->execute()
        ]);
    }

    public function private(PrivatePastesAction $action)
    {
        return view('pastes_private', [
            'pastes_private' => $action->execute()
        ]);
    }

    public function pastePage($id)
    {

        $paste = Paste::find($id);
        if (!$paste) {
            abort('404');
        }

        return view('paste_page', [
            'paste' => $paste,
        ]);
    }

    public function form()
    {
        return view('pastes_create_form');
    }
}
