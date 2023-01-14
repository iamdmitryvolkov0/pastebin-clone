<?php

namespace App\Http\Controllers;

use App\Actions\PrivateTasksAction;
use App\Actions\PublicTasksAction;
use Illuminate\Http\Request;
use App\Models\Paste;
use App\Actions\AllTasksAction;


class PagesController extends Controller
{
    public function all(AllTasksAction $action)
    {
        return view('pastes_all', [
            'pastes' => $action->execute()
        ]);
    }

    public function public(PublicTasksAction $action)
    {
        return view('pastes_public', [
            'pastes' => $action->execute()
        ]);
    }

    public function private(PrivateTasksAction $action)
    {
        return view('pastes_private', [
            'pastes' => $action->execute()
        ]);
    }

    public function form()
    {
        return view('pastes_create_form');
    }
}
