<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    public function albums() 
    {

        return $this->hasMany(Album::class);

        /* alternative 
        return $this->hasMany('App\Album');
         */
    }
}
