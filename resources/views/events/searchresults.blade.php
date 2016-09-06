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
		<h1>Search Result</h1>
			@foreach ($searchResult as $responseItem)
				<div class="col-md-4 events">
					<h4><a href="{{ (isset($responseItem->event_url)) ? $responseItem->event_url : '' }}" target="_BLANK">
						Name: {{ $responseItem->name }}</a></h4>

						<p>Location: {{ (isset($responseItem->venue)) ? implode($responseItem->venue, ' ') : '' }}</p>

						<p>{{ (isset($responseItem->description)) ? strip_tags($responseItem->description) : '' }}</p>
					<form method="POST" action="{{ action('AppController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
						<input type='hidden' name='event_id' value="{{ $responseItem->id }}">
						<button type='submit' class='btn btn-default'>Like</button>
					</form>
					<form method="POST" action="#">
						{{ csrf_field() }}
						<input type='hidden' name='ignore' value='0'>
						<button type='submit' class='btn btn-default'>Ignore</button>
					</form>
				</div> 
			@endforeach
	</div>
@stop