<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Events;
use App\Models\Interest;
use App\EventInterests;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
    Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')
        ->hourly();

        $schedule->call(function () {
            $client = MeetupKeyAuthClient::factory(array('key' => env('MEETUP_KEY', null)));
            $query = [
                'topic' => 'python,html5,newintown,linux,robotics,javascript,
                film,beer,sci-fi,java,
                investing,hacking,nightlife,',
                'city' => 'San Antonio',
                'country' => 'us',
                'state' => 'tx',
                'fields' => 'topics,lat,lon' 

            ];
            $response = $client->GetOpenEvents($query);

            Events::unguard();
            foreach ($response as $item) {
                $event = Events::firstOrCreate([
                    'api_event_id' => $item['id']
                    ]);
                $event->lat = (isset($item['venue']['lat'])) ?$item['venue']['lat']:null;
                $event->lon = (isset($item['venue']['lon'])) ?$item['venue']['lon']:null;
                $event->name = $item['name'];
                $event->location = (isset($item['venue'])) ? implode($item['venue'], ' ') : null;
                $event->description = (isset($item['description'])) ? $item['description'] : null;
                $event->save();

                foreach ($item['group']['topics'] as $topic) {
                $interest = Interest::findByName($topic['name']);
                if ($interest){
                $eventInterest = EventInterests::firstOrCreate(['event_id' => $event->id, 'interest_id' => $interest->id]);}
            } 

            }
            Events::reguard();

    })->everyMinute();

    }
}
