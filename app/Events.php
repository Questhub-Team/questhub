<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'location', 'description'];
}
 