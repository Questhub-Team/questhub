@extends('layouts.master')
@section('content')
	<div>
		<h1>Events</h1>
		<?php $i = 0 ?>
			@foreach ($response as $responseItem) 
				
					<h4><a href="{{ $responseItem['link'] }}" target="_BLANK">{{ $responseItem['name'] }}</a></h4>
						{{ (isset($responseItem['description'])) ? strip_tags($responseItem['description']) : '' }}
					<form>
						{{ csrf_field() }}
						<input type='hidden' name='like' value='1'>
						<button type='submit' class='btn btn-default'>Like</button>
					</form>
					<form>
						{{ csrf_field() }}
						<input type='hidden' name='ignore' value='0'>
						<button type='submit' class='btn btn-default'>Ignore</button>
					</form>
				<?php $i++ ?>
			@endforeach
	</div>
@stop