@extends('layouts.master')
@section('content')
<div class="text-center">
	<h1>Reviews</h1>
	<ul>
		@foreach($reviews as $review)
		<div class="summary">
			<li><h4 class="summary"><a href="/reviews/{{{$review->slug}}}">{{{$review->title}}}</a></h4></li>
		</div>
		@endforeach
	</ul>
</div>
@stop