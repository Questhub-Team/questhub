<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    protected $table = 'events';

    protected $fillable = ['name', 'location', 'description', 'price', 'date'];

    public static function search($search)
	{
		$searchResult = DB::table('events')->select('name', 'description', 'location')
		->where('name', 'LIKE', "%{$search}%")
		->where('description', 'LIKE', "%{$search}%")
		->where('location', 'LIKE', "%{$search}%")->get();
		return $searchResult;
	}
}
