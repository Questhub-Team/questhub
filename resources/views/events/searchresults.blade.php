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
					<h4>Name: {{ $responseItem->name }}</h4>

						<p>Location: {{ (isset($responseItem->venue)) ? implode($responseItem->venue, ' ') : '' }}</p>

						<p>{{ (isset($responseItem->description)) ? strip_tags($responseItem->description) : '' }}</p>
				</div> 
			@endforeach
	</div>
@stop