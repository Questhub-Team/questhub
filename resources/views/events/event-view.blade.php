@extends('layouts.master')
@section('content')
	<div>
		<h1>Event Page</h1>
				<div class="col-md-4 events">
					<h4><a href="{{ action('EventsController@showOne', $event->id) }}" target="_BLANK">
						{{ $event->name }}</a></h4>

						<p>Location: {{ (isset($event->location)) ? $event->location : '' }}</p>

						<p>{{ (isset($event->description)) ? strip_tags($event->description) : '' }}</p>
					<form method="POST" action="{{ action('EventsController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
						<input type='hidden' name='event_id' value="{{ $event->id }}">
						<button type='submit' class='btn btn-default'>Like</button>
					</form>
					<form>
						<input type="hidden" name="check-in" value="1">
						<button id="locate" type="button" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Quest Check-In</button>
					</form>
				</div> 
	</div>
@stop
@section('script')
<script src="/js/locationservice.js" type="text/javascript"></script>
@stop