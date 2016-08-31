<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $response = $client->getFindTopics(array('query' => 'games', 'page' => '15'));
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
        //
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
            'topic' => 'newtech',
            'country' => 'us',
            'state' => 'tx',
            'city' => 'san antonio'
        ];
        
        $response = $client->getGroups(//[
            
            $query
         );
        
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