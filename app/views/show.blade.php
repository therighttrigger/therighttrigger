@extends('layouts.master')
@section('content')
<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
	<img src="../{{{$reviewcover}}}">
	<h1>"{{{$reviewtitle}}}"</h1>
	<p class="reviewBody">{{$reviewbody}}</p>
	<h1>{{{$score}}}/10</h1>
	<div class="visualscore">
		<div style="width: {{{$width}}}px; background-color: {{{$color}}};" class="point text-center">
		</div>
	</div>
	<h1>{{{$verdict}}}</h1>
	{{{$width}}}
	<br><br><br><br><br>
</div>
@stop