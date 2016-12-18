<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\Album;

class AlbumsController extends Controller
{
    public function index(Request $request) {

        $band_id = $request->input('band_id');
        if ( $band_id ) {
            $albums = Album::get()->where('band_id', $band_id);
        } else {
            $albums = Album::get();
        }

        $bands = $this->getBands();

        return view('albums.index', array(
            'albums' => $albums,
            'band_id' => $band_id,
            'bands' => $bands,
            'options' => array(),
        ));
    }

    public function show(Album $album) {
        return view('albums.show', compact('album'));
    }

    public function create() {
        $bands = $this->getBands();

        return view('albums.create', array(
            'bands' => $bands,
            'options' => array(),
        ));
    }

    public function store(Request $request) {
        Album::create($request->all());

        return redirect('albums');
    }

    public function edit(Album $album) {

        $bands = $this->getBands();

        return view('albums.edit', array(
            'album' => $album,
            'options' => array(),
            'bands' => $bands,
        ));

    }

    private function getBands() {
        return Band::pluck('name', 'id')->prepend('Select a band', '');
    }

    public function destroy(Album $album) {
        $album->delete();

        return redirect('albums');
    }
}
