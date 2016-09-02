<?php  
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use Illuminate\Support\Facades\Auth;
use App\Controllers\Auth\AuthController;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\UserInterests;
use Hash;

class UsersController extends Controller
    {
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        $user->username = $request->input('username');
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        foreach ($request->input('value') as $interest_id)
        {
            $user_interests = new UserInterests();
            $user_interests->interest_id = $interest_id;
            $user_interests->user_id = $user->id;
            $user_interests->save();
        }

        return redirect()->action('AppController@index');

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $resquest, $id)
    {
        $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY')));
        $query = [
            'topic' => 'newtech',
            'country' => 'us',
            'state' => 'tx',
            'city' => 'san antonio'
        ];
        
        $response = $client->getGroups(
            $query
        );

        $user = User::findOrFail($id);
        $data = compact('user', 'response');
        return view('users.user')->with($data);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
