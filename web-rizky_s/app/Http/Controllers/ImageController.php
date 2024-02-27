<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required',
        ]);

        $file = $request->file('file');

        $fileName = time() . '.' . $file->extension();

        $file->move(public_path('images'), $fileName);
        $gallery_id = Gallery::find($id);
        Image::create([
            'gallery_id' => $gallery_id->id,
            'file' => $fileName,
            'title' => $request->title,
        ]);
        return Redirect::back()->with('success', 'Foto berhasil ditambahkan');

    }

    public function destroy($id)
    {
        $image = Image::find($id);


        $image->delete();

        return back()->with('success', 'Foto Berhasil Dihapus');
    }
}
