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
						<h4><a href="{{ action('EventsController@showOne', $event->id) }}" target="_BLANK">Name: {{ $event->name }}</a></h4>

							<p>{{ (isset($event->description)) ? strip_tags($event->description) : '' }}</p>
						<form method="POST" action="{{ action('EventsController@store') }}">
							{{ csrf_field() }}
							<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
							<input type='hidden' name='event_id' value="{{ $event->id }}">
							<button type='submit' class='btn btn-default'>Like</button>
						</form>
						<form method="POST" action="#">
							{{ csrf_field() }}
							<input type='hidden' name='ignore' value='0'>
							<button type='submit' class='btn btn-default'>Ignore</button>
						</form>
					</div> 
				@endforeach
			@endforeach
	</div>
@stop