@extends('layouts.master')
@section('content')
	<div>
		<div>
			<h1>User Info</h1>
			<ul>
				<li>Name</li>
				<li>Username</li>
				<li>user@example.com</li>
			</ul>
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-modal">Edit profile</button>

		<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit profile">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" placeholder="name">
						</div>
						<div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="username">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="password">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div>
			</div>
		</div>
		<form>
			<input type="hidden" name="check-in" value="1">
			<button type="submit"><span class="glyphicon glyphicon-check">Quest Check-In</span></button>
		</form>
	</div>
	<div>
		<h2>Liked Events</h2>
		<ul>
		{{-- 
			@foreach ($events as $event)
				<li>{{ $event }}</li>
			@endforeach
		--}}
		</ul>
	</div>
	<div>
		 <h2>Available Quests</h2>
	</div>
@stop