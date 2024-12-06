<?php

namespace App\Http\Controllers;

use App\Models\BlogUser;
use App\Models\User;
use Illuminate\Http\Request;

class BlogUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('users.showbloguser');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BlogUser $user, string $id)
    {
        $userdetails = BlogUser::where('user_id', $id)->first();
        $username = User::select('name')->find($id);
        return view('users.showbloguser', compact(['userdetails','username']));
        // var_dump($userdetails);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogUser $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogUser $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogUser $user)
    {
        //
    }
}
