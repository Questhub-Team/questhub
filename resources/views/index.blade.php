@extends('layouts.master')
@section('content')
<div class="container-fluid">
	<h2 class="fancy-header text-center">Welcome To Questhub</h2>
	<p class="text-center">
		After you register on our website you can get information based on the interests you select about all the groups that meet in town.
	</p>

			<h4 class="text-center fancy-header">Sample Groups</h4> 
	<?php $i=0 ?>
	@foreach ($response as $responseItem)
		<div class="col-md-4">
			<h4><a href="{{ $responseItem['link'] }}" target="_BLANK">{{ $responseItem['name'] }}</a></h4>
			{{ (isset($responseItem['description'])) ? strip_tags($responseItem['description']) : '' }}
			{{ $responseItem['id'] }}
		</div>
			<?php $i++ ?>
			<?php if ($i==3) { ?>
				<?php break; ?>
			<?php } ?>
	@endforeach
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
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<a href="{{ action('Auth\AuthController@getRegister')}}" class="btn btn-primary btn-lg">Register</a>
</div>
@stop