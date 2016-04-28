@extends('layouts.master')
@section('content')
<div class="col-lg-8 col-lg-offset-4">
	<form method="POST" action="{{{action('HomeController@check')}}}">
		<input type="text" name="name" id="name">
		<input type="password" name="password" id="password">
		<button class="btn btn-primary">Submit</button>
	</form>
</div>
@stop