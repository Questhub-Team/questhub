<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'location', 'description'];

    public function getDistance($userLat, $userLon)
    {

        $earth_radius = 3960;

        $dLat = deg2rad($this->lat - $userLat);
        $dLon = deg2rad($this->lon - $userLon);

        $a = sin($dLat / 2) * sin($dLat / 2) + cos(deg2rad($userLat)) * cos(deg2rad($this->lat)) * sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * asin(sqrt($a));
        $distance = $earth_radius * $c;

        return $distance;
    }


}


 