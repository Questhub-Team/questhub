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
		<h1>Events</h1>
			@foreach ($response as $key => $responseItem)
				<div class="col-md-4 events">
					<h4><a href="{{ (isset($responseItem[$key]['event_url'])) ? $responseItem[$key]['event_url'] : '' }}" target="_BLANK">
						Name: {{ $responseItem[$key]['name'] }}</a></h4>

						<p>Local: {{ (isset($responseItem[$key]['venue'])) ? implode($responseItem[$key]['venue'], ' ') : '' }}</p>

						<p>Id: {{ $responseItem[$key]['id'] }}</p>

						<p>{{ (isset($responseItem[$key]['description'])) ? strip_tags($responseItem[$key]['description']) : '' }}</p>
					<form method="POST" action="{{ action('AppController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='name' value="">
						<input type='hidden' name='interest_id' value="">
						<input type='hidden' name='price' value="">
						<input type='hidden' name='date' value="">
						<input type='hidden' name='city' value="">
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