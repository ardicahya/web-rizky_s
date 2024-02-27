<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $gallery = Post::where('title', 'Slider')->first()->galleries->where('status', 'aktif')->first();

        $sliders = $gallery->images;

        $posts = post::whereHas('category', function ($query) {
            $query->where('title', 'Galeri Sekolah');
        })->where('title', '!=', 'Slider')->get();


        $agendas = post::whereHas('category', function ($query) {
            $query->where('title', 'Agenda Sekolah');
        })->get();

        $information = post::whereHas('category', function ($query) {
            $query->where('title', 'Agenda Sekolah');
        })->first();

        $map = post::whereHas('category', function ($query) {
            $query->where('title', 'Peta');
        })->first();


        return view('welcome', [
            'sliders' => $sliders,
            'posts' => $posts,
            'agendas' => $agendas,
            'information' => $information,
            'map' => $map,
        ]);
    }
}
