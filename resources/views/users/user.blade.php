@extends('layouts.master')
@section('content')
	<div>
		<div>
			<h1>User Info</h1>
			
			<tr>
				<td>Username: {{$user->username}}</td>
				<br>
				<td>Name: {{$user->name}}</td>
				<br>
				<td>Email: {{$user->email}}</td>
			</tr>
			
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">Edit profile</button>

		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit profile">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="container-fluid">
						<h2>Edit Profile for {{ $user->name }}</h2>
						<form method="POST" action="{{ action('UsersController@update') }}" id="edit-profile-form">
						{{ csrf_field() }}
							<div class="form-group" action="/users/user">
								<label for="name">Name</label>
								<input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}" placeholder="Username">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							</div>
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<form>
			<input type="hidden" name="check-in" value="1">
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Quest Check-In</button>
		</form>
	</div>
	<div>
		<h2>Liked Events</h2>
	</div>
	<div>
		 <h2>Available Quests</h2>
	</div>
	<div class = "col-sm-4">
    @foreach ($user->interests as $interest)
        <button class='btn btn-default'>{{ $interest->name }}</button>
    @endforeach
</div>
@stop