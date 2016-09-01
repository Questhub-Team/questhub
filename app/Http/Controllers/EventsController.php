<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY')));
        $query = [
            'topic' => 'Social',
            'country' => 'us',
            'state' => 'tx',
            'city' => 'san antonio'
        ];
        $response = $client->getGroups($query);
        foreach ($response as $event) {
            $event = DB::table('events')->insert([
                ['description' => $description],
                ['title' => $title],
                ['location' => $location],
                ['price' => $price],
                ['date' => $date]
            ]);
        }
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
    public function likeOrIgnore()
    {
        Model::unguard();
        $like = Events::firstOrCreate([
            'user_id' => $request->user()->id,
        ]);
        $like->event = $request->input('vote');
        $vote->save();
        Model::reguard();

        $post = $vote->post;
        $post->vote_score = $post->voteScore(); 
        $post->save();
        $data = [
            'vote_score' => $post->vote_score,
            'vote' => $vote->vote
        ];
        return $data;
    }
}
