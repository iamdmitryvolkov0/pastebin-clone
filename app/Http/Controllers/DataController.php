<?php

namespace App\Http\Controllers;

use App\Actions\GetUserAction;
use App\Models\Paste;
use Illuminate\Http\Request;

class DataController
{
    public function store(Request $request)
    {
        $data = $request->only('title', 'body', 'status');
        $userId=auth()->id();
        $result = Paste::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'status' => $data['status'],
            'user_id' => $userId
        ]);

        if ($result) {
            return redirect('/');
        }
    }

    public function destroy(Request $request)
    {
        $todo = Paste::findOrFail($request->id);

        $todo->delete();

        return redirect()->back();
    }

    public function statusUpdate(Request $request)
    {
        $todo = Paste::findOrFail($request->id);

        $todo->status = 1;
        $todo->save();
        return redirect()->back();
    }
}
