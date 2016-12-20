<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Band;
use App\Album;
use App\Http\Requests\AlbumsRequest;
use Carbon\Carbon;

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

        $bands = $this->getBands();

        $band_name = Band::where('id', $album->band_id)->pluck('name')->first();

        return view('albums.show', array(
            'album' => $album,
            'bands' => $bands,
            'band_name' => $band_name,
            'options' => array(),
        ));
    }

    public function create() {
        $bands = $this->getBands();

        return view('albums.create', array(
            'bands' => $bands,
            'options' => array(),
        ));
    }

    public function store(AlbumsRequest $request) {

        $all = $request->all();

        // Default to today if no value 

        if ( $all['release_date'] == '' ) {
            $all['release_date'] = Carbon::now()->format('Y-m-d');
        }

        if ( $all['recorded_date'] == '' ) {
            $all['recorded_date'] = Carbon::now()->format('Y-m-d');
        }

        if ($all['number_of_tracks'] == '' ) {
            $all['number_of_tracks'] = 0;
        }

        Album::create($all);

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

    public function update($id, AlbumsRequest $request) {

        $band = Album::findOrFail($id);

        $band->update($request->all());

        return redirect('albums');
    }
}
