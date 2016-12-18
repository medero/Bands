<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Band;
use App\Http\Requests\BandsRequest;

class BandsController extends Controller
{

    public function index() {

        $bands = Band::get();

        return view('bands.index', compact('bands'));
    }

    public function edit(Band $band) {

        # Typehinting is more succinct, leaving this for reference
        # $band = Band::find($band);

        return view('bands.edit', compact('band'));

    }

    public function create() {
        return view('bands.create');
    }

    public function store(BandsRequest $request) {
        Band::create($request->all());

        return redirect('bands');
    }

    public function update($id, BandsRequest $request) {

        $band = Band::findOrFail($id);

        $band->update($request->all());

        return redirect('bands');
    }

    public function delete(Band $band) {

        $band->delete();

        return redirect('bands');
    }
}
