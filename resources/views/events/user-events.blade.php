@extends('layouts.master')
@section('content')
<style type="text/css">
	.events {
		height: 400px;
		width: 250px;
		overflow-y: auto;
	}
</style>
	<div>
		<h1 class="fancy-header">Events</h1>
			<span>These are your events based on the interest selected</span>
			@foreach($user->interests as $interest)
				@foreach ($interest->events as $event)
					<div class="col-md-4 events">
						<h4>Name: {{ $event->name }}</h4>

							<p>{{ (isset($event->description)) ? strip_tags($event->description) : '' }}</p>
						<form method="POST" action="{{ action('EventsController@store') }}">
							{{ csrf_field() }}
							<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
							<input type='hidden' name='event_id' value="{{ $event->id }}">
							<button type='submit' class='btn btn-default'>Like</button>
						</form>
					</div> 
				@endforeach
			@endforeach
	</div>
@stop