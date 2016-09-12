@extends('layouts.master')
@section('content')
<h1>Profile for {{$user->name}}</h1>
<div class="row">
	<div class="col-md-6">
		<h2 class="fancy-header">User Info</h2>
		<div class="col-md-5">
			<img src="/img/{{ $user->profile_img }}" class="profile-img" alt="user profile image">
		</div>
		<div class="col-md-7">
			<p class="large">Username: {{$user->username}}</p>
			<p class="large">Email: {{$user->email}}</p>
			<p class="large">Joined: {{ $user->created_at->format('m-d-Y') }}</p>
		
			<button type="button" class="btn btn-primary btn-profile" data-toggle="modal" data-target="#edit-modal">Edit profile</button>
			<button class="btn btn-success btn-profile" data-toggle="modal" data-target="#interest-modal">Add Interests</button>
		</div>
	</div>
	<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="edit profile">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="container-fluid">
					<div class="modal-heading">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h2 id="edit-h2">Edit Profile for {{ $user->name }}</h2>
					</div>
					<form method="POST" action="{{ action('UsersController@update') }}" id="edit-profile-form">
						<input type="hidden" name="_method" value="PUT">
						{{ csrf_field() }}

						<div class="form-group">
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
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6">
	<h2 class="fancy-header">Interests</h2>
	@foreach ($user->interests as $interest)
			<form method = 'post' action="{{ action('UsersController@destroy', $interest->id) }}" class="inline">
			<input type="hidden" name="_method" value="DELETE">
				{{ csrf_field() }}
					<span class="remove"><button type="submit" class="btn interest-btn" >{{ $interest->name }}</button></span>
			</form>
	@endforeach
	</div>
</div>

<div class="bar"></div>
<div class="modal fade" id="interest-modal" tabindex="-1" role="dialog" aria-labelledby="edit interests">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="container-fluid">
				<div class="modal-heading">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h2 class="fancy-header">Interest Panel</h2>
				</div>

				<form class="form-inline" role="form" method="POST" action="{{ action('UsersController@updateInterests') }}">
					<input type="hidden" name="_method" value="PUT">
					{{ csrf_field() }}
					<div class="btn-group" data-toggle="buttons"> 
					<div class="form-group">         
						<label class="btn btn-default">
							<input value="1" name="value[]" type="checkbox" autocomplete="off">
							<span>Board Games</span><span class="glyphicon glyphicon-ok"></span>
						</label>
						<label class="btn btn-default">
							<input value="2" name="value[]" type="checkbox" autocomplete="off">
							<span>Nightlife</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="3" name="value[]" type="checkbox" autocomplete="off">
							<span>New in Town</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="4" name="value[]" type="checkbox" autocomplete="off">
							<span>Software Development</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="5" name="value[]" type="checkbox" autocomplete="off">
							<span>Linux</span><span class="glyphicon glyphicon-ok"></span>
						</label>
					</div>
					<div class="form-group">
						<label class="btn btn-default">
							<input value="6" name="value[]" type="checkbox" autocomplete="off">
							<span>Robotics</span><span class="glyphicon glyphicon-ok"></span>
						</label>
						<label class="btn btn-default">
							<input value="7" name="value[]" type="checkbox" autocomplete="off">
							<span>Photography</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="8" name="value[]" type="checkbox" autocomplete="off">
							<span>Internet Startups</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="9" name="value[]" type="checkbox" autocomplete="off">
							<span>Javascript</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="10" name="value[]" type="checkbox" autocomplete="off">
							<span>Film</span><span class="glyphicon glyphicon-ok"></span>
						</label>
					</div>
					<div class="form-group">
						<label class="btn btn-default">
							<input value="11" name="value[]" type="checkbox" autocomplete="off">
							<span>Beer</span><span class="glyphicon glyphicon-ok"></span>
						</label>
						<label class="btn btn-default">
							<input value="12" name="value[]" type="checkbox" autocomplete="off">
							<span>HTML5</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="13" name="value[]" type="checkbox" autocomplete="off">
							<span>Sci-Fi</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="14" name="value[]" type="checkbox" autocomplete="off">
							<span>Python</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="15" name="value[]" type="checkbox" autocomplete="off">
							<span>Java</span><span class="glyphicon glyphicon-ok"></span>
						</label>
					</div>
					<div class="form-group">
						<label class="btn btn-default">
							<input value="16" name="value[]" type="checkbox" autocomplete="off">
							<span>Investing</span><span class="glyphicon glyphicon-ok"></span>
						</label>
						<label class="btn btn-default">
							<input value="17" name="value[]" type="checkbox" autocomplete="off">
							<span>Hacking</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="18" name="value[]" type="checkbox" autocomplete="off">
							<span>Mobile Development</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="19" name="value[]" type="checkbox" autocomplete="off">
							<span>Pets</span><span class="glyphicon glyphicon-ok"></span>
						</label>  
						<label class="btn btn-default">
							<input value="20" name="value[]" type="checkbox" autocomplete="off">
							<span>Tabletop Games</span><span class="glyphicon glyphicon-ok"></span>
						</label>
					</div>
					</div>
					<button type="submit" class="btn btn-primary">Update Interests</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<h2 class="fancy-header">Liked Events</h2>
	@foreach ($userEvents as $userEvent)
		<div class="col-md-4 events">
			<h3><a href="{{ action('EventsController@showOne', $userEvent->id) }}" target="_BLANK">
				Name: {{ $userEvent->name }}</a></h4>

				<p>Location: {{ (isset($userEvent->location)) ? $userEvent->location : '' }}</p>

				<p>{{ (isset($userEvent->description)) ? strip_tags($userEvent->description) : '' }}</p>
			<form method="POST" action="{{ action('EventsController@destroy', $userEvent->id) }}">
				<input type="hidden" name="_method" value="DELETE">
				{{ csrf_field() }}
				<button type='submit' class='btn btn-default'>Ignore</button>
			</form> 
		</div>
	@endforeach
</div>

<div class="row col-lg-12">
	<h2>Available Quests</h2>
	<p>Quests will be available soon!</p>
</div>

@stop