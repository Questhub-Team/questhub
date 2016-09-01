<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInterests extends Model
{
    protected $table = 'user_interests';

    public function user() 
    {
		return $this->belongsTo(User::class);
	}
}
