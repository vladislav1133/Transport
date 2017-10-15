<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stop extends Model {





    public function buses(){

        return $this->belongsToMany('App\Bus')->withTimestamps();
    }

}
