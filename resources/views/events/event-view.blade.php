@extends('layouts.master')
@section('content')

	<div>
		<h1>Event Page</h1>
				<div class="col-md-4 events">
					<h4><a href="{{ action('AppController@showOne', $response->id) }}" target="_BLANK">
						{{ $response->name }}</a></h4>

						<p>Location: {{ (isset($response->venue)) ? implode($response->venue, ' ') : '' }}</p>

						<p>{{ (isset($response->description)) ? strip_tags($response->description) : '' }}</p>
					<form method="POST" action="{{ action('AppController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
						<input type='hidden' name='event_id' value="{{ $response->id }}">
						<button type='submit' class='btn btn-default'>Like</button>
					</form>
					<form>
						<input type="hidden" name="check-in" value="1">
						<button onclick="geodata()" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Quest Check-In</button>
					</form>
				</div> 
	</div>
@stop
@section('script')
<script src="/js/locationservice.js" type="text/javascript"></script>
@stop