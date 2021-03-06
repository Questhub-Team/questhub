<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\Middleware;
use DB;
use App\Events;
use App\User;
use App\Models\UserEvents;
use Auth;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY', null)));
        $query = [
        'topic' => 'linux',
        'zip' => '78247',
        'country' => 'us',
        'state' => 'tx',
        'city' => 'san antonio'
        ];
        $response = $client->getGroups($query);
        $data = compact('response');
        return view('index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = \App\Models\UserEvents::firstOrCreate([
            'user_id' => $request->input('user_id'),
            'event_id' => $request->input('event_id')
            ]);
        $event->user_id = $request->input('user_id');
        $event->event_id = $request->input('event_id');
        $event->save();
        $request->session()->flash('message', 'Event has been saved to profile');

        return redirect()->action('EventsController@showAll');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->input('search');
        $searchResult = DB::table('events')->select('id', 'name', 'description', 'location')
        ->where('name', 'LIKE', "%{$search}%")
        ->orWhere('description', 'LIKE', "%{$search}%")
        ->orWhere('location', 'LIKE', "%{$search}%")->paginate(20);
        $data = compact('searchResult');
        return view('events.searchresults')->with($data);
    }
    public function userEvents(Request $request)
    {
        //rather than a complicated join eager load the User interest and tie in events
        $user_with_interests_and_events = User::with('interests.events')->find($request->user()->id);
        $data = ['user' => $user_with_interests_and_events];
        return view('events.user-events')->with($data);
    }
    public function showAll()
    {        
        $response = Events::paginate(20);
        $data = compact('response');
        return view('events.events')->with($data); 
    }
    public function showOne($id)
    {
        $oneEvent = Events::findOrFail($id);
        $data = compact('oneEvent');
        return view('events.event-view')->with($data);
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
    public function destroy(Request $request, $id)
    {
        $event = UserEvents::where('event_id', $id)->where('user_id', Auth::user()->id)->first();
        $event->delete();
        $request->session()->flash('message', 'Event has been ignored');
        return redirect()->action('UsersController@show', Auth::user()->id);
    }

    public function compareDistance(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $event = Events::findOrFail($request->input('event_id'));

        $distance_between = $event->getDistance($latitude, $longitude);

        if($distance_between <= 2){
            
            $quest = \App\Models\UserQuests::firstOrCreate([
            'user_id' => $request->user()->id,
            'event_id' => $request->input('event_id'),
            'completed' => '1']);
            $quest->event_id = $request->input('event_id');
            $quest->save();
        } 
        return $distance_between;

        
    }
}
