@extends('layouts.master')
@section('content')
<div class="text-center">
	<h1>"{{{$reviewtitle}}}"</h1>
	<p class="reviewBody">{{$reviewbody}}</p>
</div>
@stop