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
			@foreach ($response as $responseItem)
				<div class="col-md-4 events">
					<h4><a href="{{ $responseItem['link'] }}" target="_BLANK">{{ $responseItem['name'] }}</a></h4>
						{{ (isset($responseItem['description'])) ? strip_tags($responseItem['description']) : '' }}
						<p>Group ID: {{ $responseItem['id'] }}</p>
						<p>Group Members: {{ $responseItem['members'] }}</p>
						<p>Locarion: {{ $responseItem['city'] }}</p>
					<form method="POST" action="{{ action('AppController@store') }}">
						{{ csrf_field() }}
						<input type='hidden' name='like' value='1'>
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