

@extends('layouts.master')
@section('content')
<div class="container">
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login form">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="container-fluid">
					<h2>Login to Questhub</h2>
					<form method="POST" action="{{ action('Auth\AuthController@postLogin')}}" id="login-modal">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text"
								class="form-control"
								id="login-email"
								placeholder="Email"
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
	</div>
	<a href="{{ action('Auth\AuthController@getRegister')}}" class="btn btn-primary btn-lg">Register</a>
</div>
@stop