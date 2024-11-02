<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Publish;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class TokenIsValidController extends Controller
{
    public function index(){
        return view('TokenCheck');
    }

    public function show(){
        return view('PublishToken');
    }

    public function store(Request $request){
        $request->validate([
            'token' => 'required|min:1'
        ]);

        DB::table('tokens')->insert([
            'user_id' => Auth::id(),
            'token_id' => $request->input('token'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Token Uploaded');
    }
}
