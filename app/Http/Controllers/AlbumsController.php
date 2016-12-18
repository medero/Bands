<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumsController extends Controller
{
    public function index() {

        $albums = Album::get();

        return view('albums.index', compact('albums'));
    }
}
