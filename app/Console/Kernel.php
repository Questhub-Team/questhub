<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use DMS\Service\Meetup\MeetupKeyAuthClient;
use App\Models\Event;

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
                'topic' => 'python,html5,python,newintown,linux,robotics,javascript,film,beer,sci-fi,java,
                investing,hacking,nightlife,',
                'city' => 'San Antonio',
                'country' => 'us',
                'state' => 'tx'
            
            ];
            $response = $client->GetOpenEvents(
                $query
                );
            Event::ungaurd();
            foreach ($response as $item) {
                $event = Event::firstOrCreate([
                    'api_event_id' => $item['id']
                ]);
                $event->name = $item['name'];
                $event->location = implode($item['venue'], ' ');
                $event->description = $item['description'];
                $event->save();
            }
            Event::regaurd();

        })->everyMinute();

    }
}
