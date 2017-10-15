<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{

    public function bus() {

        return $this->belongsTo('App\Bus');
    }
}
