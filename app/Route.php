<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{

    public function stops(){

        return $this->belongsToMany('App\Stop');
    }

    public function transports(){

        return $this->hasMany('App\Transport');
    }
}
