<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publish;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PublishController extends Controller
{

    public function store(Request $request)
    {
        // Validate the textarea input
        $request->validate([
            'title' => 'required|min:1',
            'content' => 'required|min:1',
        ]);

        // Save the data to the database
        DB::table('publishes')->insert([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),  // or any valid user id from the users table
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect after successful submission
        return redirect()->back()->with('success', 'Task saved successfully!');
    }
}
