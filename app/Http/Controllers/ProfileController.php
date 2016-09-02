<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{

    /**
    * Displays correct profule based on user
    */
    public function getProfile()
    {
        return View::make('user');
    }
    public function index()
    {
        $user = Auth::user();

        return view('users.user', ['user' => $user]);
    }

    public function updateAccount()
    {
      $id = Auth::user()->id;
      $user = Auth::user();
      $user->username = Request::input('username');
      $user->name = Request::input('name');
      $user->email = Request::input('email');
      $user->save();
      return view('profile/index');
  }


}
