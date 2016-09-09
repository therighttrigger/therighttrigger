@extends('layouts.master')
@section('content')
<img class="showreviewcover" src="../{{{$review->cover}}}">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	@foreach($sections as $section)
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<p class="reviewBody">{{$section->body}}</p>
		</div>
		@if($section->image != null)
			<div class="col-lg-4">
				<img class="reviewimage" src="../{{{$section->image}}}">
			</div>
		@endif
	@endforeach
	<div id="results">
		<h1>{{{$review->score}}}/10</h1>
		<div class="visualscore">
			<div style="width: {{{$width}}}px; background-color: {{{$color}}};" class="point text-center">
			</div>
		</div>
		<h1>{{{$review->verdict}}}</h1>
	</div>
	<br><br><br><br><br>
</div>
@stop