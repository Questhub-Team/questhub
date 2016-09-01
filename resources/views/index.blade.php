

@extends('layouts.master')
@section('content')
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
				<form method="POST" action="{{ action('Auth\AuthController@postLogin')}}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="email">Username or Email</label>
						<input type="text"
							class="form-control"
							id="login-email"
							placeholder="Username or Email"
							name="email">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password"
							name="password"
							class="form-control"
							id="login-password"
							placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
				</form>
			</div>
		</div>
	</div>
	<a href="{{ action('Auth\AuthController@postRegister')}}" class="btn btn-primary btn-lg">Register</a>
</div>
@stop