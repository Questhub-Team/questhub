<?php
$client = DMS\Service\Meetup\MeetupKeyAuthClient::factory(array('key' => '36632b4535b515e32134731e611f5d'));

// Use our __call method (auto-complete provided) 
//CHANGE GAMES TO BE THE SEARCH TERM BEING QUERIED
$response = $client->getFindTopics(array('query' => 'games', 'page' => '15'));
//var_dump($response);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
        .interest_container {
                text-align: center;
                margin: 5px;
        }

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
    <div class = "interest_container">
        <?php
        $i = 0; 
        while($response->offsetExists($i)) {
            $responseItem = $response->offsetGet($i);
            echo "<button class='btn btn-default'>" . $responseItem['name'] . "</button>";
            $i++;
        }  ?>
    </div>
        <div class="container">
            <div class="content">
                <div class="title">Laravel 5</div>
            </div>
        </div>
    </body>
</html>
