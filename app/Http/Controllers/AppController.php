<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\Middleware;
use DB;

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
        // $events = new Events();
        // $events->name = 
        // $events->location = 
        // $events->description = 
        // $events->price = 
        // $events->date = 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('events.events')->with($data);
    }
    public function showAll()
    {
        // $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY', null)));
        // $query = [
        //     'topic' => 'python,html5,python,newintown,linux,robotics,javascript,film,beer,sci-fi,java,
        //         investing,hacking,nightlife,',
        //     'city' => 'San Antonio',
        //     'country' => 'us',
        //     'state' => 'tx'
            
        // ];
        // $response = $client->GetOpenEvents(
        //     $query
        //     );
        // // dd($response)->daily();
        // $data = compact('response');

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
    public function search(Post $post, Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $results = Post::searchPosts($search);
            $data = compact('results');
        }
        return redirect()->action('AppController@show')->with($data);
    }
}
