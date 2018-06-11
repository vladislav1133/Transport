<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{

    protected $fillable = [
        "lon",
        "lat"
    ];

    protected $hidden = [
        "token",
        "lon",
        "lat"
    ];

    public function description() {

        return $this->belongsTo("App\Description");
    }

    public function route() {

        return $this->belongsTo("App\Route");
    }


}
