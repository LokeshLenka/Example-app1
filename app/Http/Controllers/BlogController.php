<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Profile_Controller;

use function PHPUnit\Framework\countOf;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs in descending order
        return view('blog.blog', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.createblog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'blogtitle' => 'required|min:1',
            'blogcontent' => 'required|min:1'
        ]);

        DB::table('blogs')->insert([
            'author_id' => Auth::id(),
            'created_at' => now(),
            'updated_at' => now(),
            'category' => 'nullable',
            'blogtitle' => $request->input('blogtitle'),
            'blogcontent' => $request->input('blogcontent'),
            'photo' => 'nullable',
        ]);

        if (!$this->updateblogpostcount()) {
            echo '<h1><center>Something Went Wrong</center></h1>';
            return redirect('/');
        }
        return redirect()->back()->with('publish', 'Published  ✅');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::find($id);
        return view('blog.showblog', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    private function updateblogpostcount(): bool
    {
        DB::table('blogusers')->where('user_id', Auth::id())->increment('blogpostcount');
        return true;
    }
}
