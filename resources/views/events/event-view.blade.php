@extends('layouts.master')
@section('content')
<style>
#map-canvas {
	width: 400px;
	height: 400px;
	position: relative;
	left: 35%;
	border: solid 1px darkgrey;
}
</style>
	<div class="row">
		<div class="col-lg-8 col-lg-offset-2">
			<h1 class="fancy-header">Event Page</h1>
		</div>

		<div class="col-lg-8 col-lg-offset-2">
			<h4>
				<a href="{{ action('EventsController@showOne', $oneEvent->id) }}" target="_BLANK">
				{{ $oneEvent->name }}</a>
			</h4>
				<p>{{ (isset($oneEvent->description)) ? strip_tags($oneEvent->description) : '' }}</p>
			<form method="POST" action="{{ action('EventsController@store') }}">
				{{ csrf_field() }}
				<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
				<input type='hidden' name='event_id' value="{{ $oneEvent->id }}">
				<button type='submit' class='btn btn-default'>Like</button>
			</form>

			<button disabled id="locate" type="submit" data-event-id="{{ $oneEvent->id }}" class="btn btn-success check-in"><span class="glyphicon glyphicon-check"></span> Quest Check-In</button>

		</div> 
		<input type="hidden" name="check-in-url" id="check-in-url" value="{{ action('EventsController@compareDistance') }}">
	</div>
		<p>Event Location:</p>
		<div id="map-canvas"></div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzTSysv46TsCqOcDsv061aupuHUPAVBUE"></script>
<scrip src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script>
$(document).ready(function initMap() {
	"use strict";
	//google map API
	var lt = parseFloat({{ $oneEvent->lat }});
	var ln = parseFloat({{ $oneEvent->lon }});
	var mapOptions = {
		zoom: 10,
		center: new google.maps.LatLng(lt, ln),

	};

	var eventLocation = {lat: parseFloat(lt), lng: parseFloat(ln) };
	var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
	var marker = new google.maps.Marker({
		draggable: true,
		position: eventLocation,
		map: map,
	});
});

</script>
@stop
