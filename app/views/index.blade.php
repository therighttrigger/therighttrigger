@extends('layouts.master')
@section('content')
<div class="text-center">
	<h1>Reviews</h1>
	@foreach($reviews as $review)
	<div class="summary">
		<a href="/reviews/{{{$review->slug}}}">{{{$review->title}}}</a>
		<br>
			{{{Str::limit($review->body, 300)}}}
	</div>
	@endforeach
</div>
@stop