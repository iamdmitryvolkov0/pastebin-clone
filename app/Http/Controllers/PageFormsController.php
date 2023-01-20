<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageFormsController
{
    //TODO выносим формы в отдельные контроллеры
    public function create(): View
    {
        return view('pastes.pastes_create_form');
    }
}
