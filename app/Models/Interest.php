<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';

    public function events()
    {
    	return $this->belongsToMany('App\Events', 'event_interests', 'event_id', 'interest_id');
    }

    public static function findByName($name){
    	return Interest::Where('name', $name)->first();
    }
}

