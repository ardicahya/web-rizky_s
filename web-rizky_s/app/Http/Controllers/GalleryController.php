<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $galleries = Gallery::all();

        return view('admin.galleries.index', [
            'title' => 'Galeri Foto',
            'galleries' => $galleries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $posts = Post::all();

        return view('admin.galleries.create', [
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect('/galleries')->with('success', 'Galeri Foto Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
        return view('admin.galleries.show', [
            'title' => 'Detail Galeri Poto',
            'gallery' => $gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
        $posts = Post::all();

        return view('admin.galleries.edit', [
            'title' => 'Edit Gallery Foto',
            'gallery' => $gallery,
            'posts' => $posts,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
        $gallery->update([
            'posts_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request-> status,
        ]);

        return redirect('/galleries')->with('success', 'Galeri Foto Berhasil Diubah');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
       foreach ($gallery->images as $image) {
        if (file_exists(public_path('images' . $image->file))) {
            unlink(public_path($gallery->file));
        }
       }


        $gallery->images()->delete();

        $gallery->delete();

        return redirect('/galleries')->with('success', 'Galeri Foto Berhasil Dihapus');

    }
}
