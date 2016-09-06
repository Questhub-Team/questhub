<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\Middleware;
use DB;
use App\Models\Event;

class AppController extends Controller
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
            'topic' => 'newtech',
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
        $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY', null)));
        $topic = $client->getTopics(array('name' => 'Board Games'))->current();
            
        $interest = new \App\Models\Interest;
        $interest->name = $topic['name'];


        $interest->save();
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

        return redirect()->action('AppController@showAll');
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
        ->orWhere('location', 'LIKE', "%{$search}%")->get();
        // dd($searchResult);
        $data = compact('searchResult');
        return view('events.searchresults')->with($data);
    }
    public function showAll()
    {
        
        $response = DB::select('SELECT * FROM events');
        // dd($response);
        $data = compact('response');
        return view('events.events')->with($data); 
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
