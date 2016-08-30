<?php
$client = DMS\Service\Meetup\MeetupKeyAuthClient::factory(array('key' => '36632b4535b515e32134731e611f5d'));

// Use our __call method (auto-complete provided)
$response = $client->getFindTopics(['query' => 'Games']);


/*
$api_key = "36632b4535b515e32134731e611f5d";
$connection = new MeetupKeyAuthConnection($api_key);
$m = new MeetupEvents($connection);
$events = $m->getEvents( array( 'group_urlname' => '<GROUP URL NAME>') );*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <?php foreach ($response as $data => $responseItem) {
            echo "<p>" . $data[$responseItem]['name'] . "</p>";
            echo "<p>" . $data[$responseItem]['description'] . "</p>";
            echo "<a>" . $data[$responseItem]['link'] . "</a>";
        }  ?>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
