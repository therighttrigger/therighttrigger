@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
	<h1>"{{{$reviewtitle}}}"</h1>
	<p class="reviewBody">{{$reviewbody}}</p>
	<br><br><br><br><br>
</div>
@stop