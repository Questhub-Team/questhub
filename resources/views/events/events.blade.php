@extends('layouts.master')
@section('content')
	<div class="row">
		<h1>Events</h1>
			@foreach ($response as $responseItem)
				<div class="col-md-4 events">
					<h4><a href="{{ action('EventsController@showOne', $responseItem->id) }}" target="_BLANK">
						Name: {{ $responseItem->name }}</a></h4>

						<p>{{ (isset($responseItem->description)) ? strip_tags($responseItem->description) : '' }}</p>
					<form method="POST" action="{{ action('EventsController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
						<input type='hidden' name='event_id' value="{{ $responseItem->id }}">
						<button type='submit' class='btn btn-default'>Like</button>
					</form>
				</div> 
			@endforeach
	</div>
	<div class="pagination center-block" id="event-pagination">{!! $response->render() !!}</div>
@stop