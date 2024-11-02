<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo');
    }

    public function store(Request $request)
    {

        $request->validate([
            'tasktitle' => 'required|min:1',
            'priority' => 'nullable|min:1',
        ]);

        DB::table('todos')->insert([
            'user_id' => Auth::id(),
            'title' => $request->input('tasktitle'),
            'created_at' => now(),
            'updated_at' => now(),
            'description' => $request->input('description'),
            'remainder_at' => $request->input('datetime'),
            'priority' => $request->input('priority')
        ]);

        return redirect()->back()->with('upload', 'Task saved');
    }
}
