<?php
$client = DMS\Service\Meetup\MeetupKeyAuthClient::factory(array('key' => '36632b4535b515e32134731e611f5d'));

// Use our __call method (auto-complete provided)
$response = $client->getTopics(array('topic'));




/*
$api_key = "36632b4535b515e32134731e611f5d";
$connection = new MeetupKeyAuthConnection($api_key);
$m = new MeetupEvents($connection);
$events = $m->getEvents( array( 'group_urlname' => '<GROUP URL NAME>') );*/
?>
@extends('layouts.master')
@section('content')
<div class = "btn btn-default">
	<?php foreach ($response as $responseItem) {
	echo "<p>" . $responseItem['name'] . "</p>";
	}  ?>
</div>
<div class="container">
	<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login-modal">Login</button>

		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login form">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content container">
					<h2>Login to Questhub</h2>
					<form method="POST" action="{{-- action('?') --}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="email">Username or Email</label>
							<input type="text" class="form-control" id="login-email" placeholder="Username or Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="login-password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
					</form>
				</div>
			</div>
		</div>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register-modal">Register</button>

		<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="registration form">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content container">
					<h2>Register for Questhub</h2>
					<form method="POST" action="{{-- action('?') --}}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="reg-name">Name</label>
							<input type="text" class="form-control" id="reg-name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="reg-username">Username</label>
							<input type="text" class="form-control" id="reg-username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="reg-email">Email</label>
							<input type="text" class="form-control" id="reg-email" placeholder="Email">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="reg-password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Register</button>
					</form>
				</div>
			</div>
		</div>

</div>

@stop