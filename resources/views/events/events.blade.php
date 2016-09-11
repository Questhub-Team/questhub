@extends('layouts.master')
@section('content')
		<h1 class="text-center">Events</h1>
		<div class="col-lg-10 events-container">
			@foreach ($response as $responseItem)
				<div class="col-md-4 events">
					<h4>Name: {{ $responseItem->name }}</a></h4>
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
