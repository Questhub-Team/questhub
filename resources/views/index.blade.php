

@extends('layouts.master')
@section('content')
<?php
$client = DMS\Service\Meetup\MeetupKeyAuthClient::factory(array('key' => '36632b4535b515e32134731e611f5d'));
// Use our __call method (auto-complete provided) 
//CHANGE GAMES TO BE THE SEARCH TERM BEING QUERIED
$response = $client->getFindTopics(array('query' => 'games'));
//var_dump($response);

// Use our __call method (auto-complete provided)
?>
<style>
	.interest_container {
		height: 200px;
		widows: 200px;
	}
</style>
<form class="navbar-form navbar-right" method="GET" >
	<div class="form-group">
		<input type="text" class="form-control" placeholder="Search Interests" name="search" value="{{ isset($searchTerm) ? $searchTerm : '' }}">
	</div>
	<button type="submit" class="btn btn-default"><i class="fa fa-search"></i>Search</button>
</form>

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
	<a href="{{ action('Auth\AuthController@postRegister')}}" class="btn btn-primary btn-lg">Register</a>
	<h2></h2>
</div>
@stop