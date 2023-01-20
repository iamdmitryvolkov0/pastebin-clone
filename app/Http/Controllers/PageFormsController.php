<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageFormsController
{
    public function create(): View
    {
        return view('pastes.pastes_create_form');
    }
}
