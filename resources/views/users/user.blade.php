@extends('layouts.master')
@section('content')
	<div>
		<div>
			<h1>User Info</h1>
			
			<tr>
				<td>Username: {{Auth::user()->username}}</td>
				<br>
				<td>Name: {{Auth::user()->name}}</td>
				<br>
				<td>Email: {{Auth::user()->email}}</td>
			</tr>
			
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">Edit profile</button>

		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit profile">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form>
						<div class="form-group" action="/users/user">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" placeholder="Name">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
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
    @foreach ($response as $responseItem)
        <button class='btn btn-default'>{{ $responseItem['name'] }}</button>
    @endforeach
</div>
@stop