<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleEventLog extends Model
{

    protected $fillable = [
        "vehicle_id",
        "lon",
        "lat"
    ];

}
