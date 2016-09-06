@extends('layouts.master')
@section('content')
<div class="col-lg-10 col-md-8 col-sm-8 col-xs-12">
	<img src="../{{{$reviewcover}}}">
	<h1>"{{{$reviewtitle}}}"</h1>
	<p class="reviewBody">{{$reviewbody}}</p>
	<h2>{{{$score}}}</h2>
	<br><br><br><br><br>
</div>
@stop