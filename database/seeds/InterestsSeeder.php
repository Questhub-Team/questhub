<?php

use Illuminate\Database\Seeder;
use Illuminate\Eloquent\Model;

use App\Models\Interest;

class InterestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$interests = [
			'Board Games',
			'Nightlife',
			'New in Town',
			'Software Development',
			'Linux',
			'Robotics',
			'Photography',
			'Internet Startups',
			'Javascript',
			'Film',
			'Beer',
			'HTML5',
			'Sci-Fi',
			'Python',
			'Java',
			'Investing',
			'Hacking',
			'Mobile Development',
			'Pets',
			'Tabletop Games'
		];
        foreach ($interests as $interest) {
        	$new_interest = new Interest;
        	$new_interest->name = $interest;
        	$new_interest->save();
        }
    }


    
}
