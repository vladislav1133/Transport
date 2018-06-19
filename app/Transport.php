<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{

    public function vehicles() {

        return $this->hasMany("App\Vehicle");
    }

    public function type() {
        return $this->belongsTo('App\TransportType');
    }
}
