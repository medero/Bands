<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Band;

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

    public function delete(Band $band) {

        $band->delete();

        return redirect('bands');
    }
}
