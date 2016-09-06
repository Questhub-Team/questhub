<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    protected $table = 'interests';

    public static function findByName($name){
    	return Interest::Where('name', $name)->first();
    }
}

