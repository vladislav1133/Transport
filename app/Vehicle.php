<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $hidden = ["token"];

    protected $fillable = [
        "lon",
        "lat"
    ];

    public function transport() {

        return $this->belongsTo("App\Transport");
    }
}
