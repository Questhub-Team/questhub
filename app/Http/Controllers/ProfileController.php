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

    public function updateAccount(Request $request)
    {
      $id = Auth::user()->id;
      $user = Auth::user();
      $user->username = $request->input('username');
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $user->save();
      return redirect()->action('ProfileController@index');
  }


}
