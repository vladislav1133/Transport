<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{

    protected $fillable = [
        'lon',
        'lat'
    ];

    protected $hidden = [
        'token'
    ];

    public function stops(){

        return $this->belongsToMany('App\Stop')->withTimestamps();
    }

    public function description() {

        return $this->hasOne('App\Description');
    }
}
