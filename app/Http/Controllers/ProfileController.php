<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\UserInterests;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
{

    /**
    * Displays correct profule based on user
    */
    // 
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

    public function updateInterests(Request $request){
      UserInterests::unguard();
      foreach ($request->input('value') as $interest_id)
      {
        $user_interests = UserInterests::firstOrCreate([
            'interest_id' => $interest_id,
            'user_id' => $request->user()->id
        ]);
      }
      UserInterests::reguard();

      return redirect()->action('ProfileController@index');
    }
    public function destroy(Request $request, $id)
  {
    $user_interest = \App\Models\UserInterests::where('interest_id', $id)->first();
    $user_interest->delete();
    $request->session()->flash('message', 'Interest has been deleted');
    return redirect()->action('ProfileController@index');
  }




  }
