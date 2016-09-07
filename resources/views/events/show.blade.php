@extends('layouts.master')
@section('content')
	<h4><a href="{{ (isset($responseItem->event_url)) ? $responseItem->event_url : '' }}" target="_BLANK">
						Name: {{ $responseItem->name }}</a></h4>

						<p>Location: {{ (isset($responseItem->venue)) ? implode($responseItem->venue, ' ') : '' }}</p>

						<p>{{ (isset($responseItem->description)) ? strip_tags($responseItem->description) : '' }}</p>
@stop