@extends('layouts.master')
@section('content')
		<h1 class="fancy-header text-center">Events</h1>
			<p class="text-center">Here are some events based on the interests you selected.</p>
				<div class="col-lg-12 events-container">
					@foreach($user->interests as $interest)
						@foreach ($interest->events as $event)
							<div class="col-md-4 events">
								<h4>Name: {{ $event->name }}</h4>
									<button class="btn btn-default show">Show Description</button>
									<p style="display: none">{{ (isset($event->description)) ? strip_tags($event->description) : '' }}</p>
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
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<script>
		(function(){
			$( document ).ready(function() {
				$('.show').click(function(){
					$(this).next('p').show('slow');
				});
			});	
		})();
	</script>
@stop