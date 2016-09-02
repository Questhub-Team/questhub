<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Session\Middleware;

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
    
        $events = new Events();
        $events->name = $request->input('name');
        $events->location = $responseItem['city'];
        $events->description = $responseItem['description'];
        $events->interest_id = $responseItem['id']

        $events->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showAll()
    {
        $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY')));
        $query = [
        'topic' => 'Games',
        'zip' => '78247',
        'country' => 'us',
        'state' => 'tx',
        'city' => 'san antonio'
        ];
        $query1 = [
        'topic' => 'social',
        'zip' => '78247',
        'country' => 'us',
        'state' => 'tx',
        'city' => 'san antonio'
        ];
        $query2 = [
        'topic' => 'newtech',
        'zip' => '78247',
        'country' => 'us',
        'state' => 'tx',
        'city' => 'san antonio'
        ];
        $response = $client->getGroups(
            $query
            );
        $response1 = $client->getGroups(
            $query1
            );
        $response2 = $client->getGroups(
            $query2
            );
        $response = array_merge($response->getData(), $response1->getData(), $response2->getData());
       
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
