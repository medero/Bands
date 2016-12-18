<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
#use App\Band;

class Album extends Model
{
    public function band() {
        return $this->belongsTo('App\Band');
    }
}
