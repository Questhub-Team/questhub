@extends('layouts.master')
@section('content')
		<h1 class="text-center">Events</h1>
		<div class="col-lg-12 events-container">
			@foreach ($response as $responseItem)
				<div class="col-md-4 events">
					<h4>Name: {{ $responseItem->name }}</a></h4>
						<button class="btn btn-default show">Show Description</button>
						<p style="display: none" id="{{ $responseItem->id }}">{{ (isset($responseItem->description)) ? strip_tags($responseItem->description) : '' }}</p>
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
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
		(function(){
			$( document ).ready(function() {
				var id = {{ $responseItem->id }}
				$('.show').click(function(){
					$(this).next('p').show('slow');
				});
			});	
		})();
	</script>
@stop
