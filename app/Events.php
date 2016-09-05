<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'location', 'description', 'price', 'date'];

    public static function search($search)
	{
		return Event::where('description', 'LIKE', '%' . $search . '%')->with('user');
	}
}
