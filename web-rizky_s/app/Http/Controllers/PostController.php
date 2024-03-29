<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'post',
 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Buat post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'user_id' => auth()->id(),
            'status' => $request->status,            
        ]);

        return redirect('/posts')->with('success', 'Post Berhasil Ditambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
        $categories = Category::all();

        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post', 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
       $categories = Category::all();

       return view('admin.posts.edit', [
        'post' => $post,
        'categories' => $categories,
        'title' => 'Edit Post'
       ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
        $post->update([
            'title' => $request->title, 
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,           
        ]);

        return redirect('/posts')->with('success', 'Post Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect('/posts')->with('success', 'Post Berhasil Dihapus');

    }
}
