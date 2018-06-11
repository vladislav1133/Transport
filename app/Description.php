<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Description extends Model
{



    public function buses() {

        return $this->hasMany("App\Comment");
        //return $this->hasMany("App\Bus");
    }

}
