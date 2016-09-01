<?php

use Illuminate\Database\Seeder;
use Illuminate\Eloquent\Model;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert(
        	['name' => 'Board Games'],
        	['name' => 'Nightlife'],
        	['name' => 'New in Town'],
        	['name' => 'Software Development'],
        	['name' => 'Linux'],
        	['name' => 'Robotics'],
        	['name' => 'Photography'],
        	['name' => 'Internet Startups'],
        	['name' => 'Javascript'],
        	['name' => 'Film'],
        	['name' => 'Beer'],
        	['name' => 'HTML5'],
        	['name' => 'Sci-Fi'],
        	['name' => 'Python'],
        	['name' => 'Java'],
        	['name' => 'Investing'],
        	['name' => 'Hacking'],
        	['name' => 'Mobile Development'],
        	['name' => 'Pets'],
        	['name' => 'Tabletop Games']
        	);    }
}
