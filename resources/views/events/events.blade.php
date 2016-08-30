@extends('layouts.master')
@section('content')
	<div>
		<h1>Events</h1>
		{{--
		@foreach ($events as $event)
				<h2><a href="">{{ $event->name }}</a></h2>
				<p>{{ $event->location }}</p>
				<p>{{ $event->time }}</p>
				<form>
					<input type="hidden" name="like" value="1">
					<button type="submit" class="btn btn-default">Like</button>
				</form>
				<form>
					<input type="hidden" name="ignore" value="1">
					<button type="submit" class="btn btn-default">Ignore</button>
				</form>
		@endforeach
		--}}

	</div>
@stop