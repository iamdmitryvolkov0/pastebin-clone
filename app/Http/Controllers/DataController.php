<?php

namespace App\Http\Controllers;

use App\Models\Paste;
use Illuminate\Http\Request;

class DataController
{
    public function store(Request $request)
    {
        $data = $request->only('title', 'body', 'status');
        $result = Paste::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'status' => $data['status']
        ]);

        if ($result) {
            return redirect('/');
        }
    }

    public function destroy(Request $request)
    {
        $todo = Paste::find($request->id);

        if (!$todo) {
            return abort('404');
        }

        $todo->delete();

        return redirect()->back();
    }

    public function statusUpdate(Request $request)
    {
        $todo = Paste::find($request->id);

        if (!$todo) {
            return abort('404');
        }

        $todo->status = 1;
        $todo->save();
        return redirect()->back();
    }
}
