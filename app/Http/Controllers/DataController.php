<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataController
{
    public function store(Request $request):RedirectResponse
    {
        $data = $request->only('title', 'body', 'status');
        $result = Paste::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'status' => $data['status'],
            'user_id' => Auth::id()
        ]);

        if ($result) {
            return redirect('/');
        }
    }

    public function destroy(Request $request): RedirectResponse
    {
        $paste = Paste::findOrFail($request->id);
        $paste->delete();
        return redirect()->back();
    }

    public function statusUpdate(Request $request): RedirectResponse
    {
        $paste = Paste::findOrFail($request->id);
        $paste->status = 1;
        $paste->save();
        return redirect()->back();
    }
}
