<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    /**
    * Displays correct profule based on user
    */
    public function getProfile()
    {
        return View::make('user');
    }
    
}
