@extends('layouts.master')
@section('content')
{{-- <form method="POST" action="{{{action('HomeController@store')}}}"class="form-horizontal col-lg-8 col-lg-offset-3"> --}}
{{Form::open(array('class' => 'form-horizontal col-lg-8 col-lg-offset-3', 'method' => 'POST', 'action' => 'HomeController@store', 'files' => 'true'))}}
	<div class="form-group">
		<label for="cover">Cover</label>
		<input type="file" name="cover">
	</div>
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
	</div>
	<div class="form-group">
		<label for="slug">Slug</label>
		<input type="text" name="slug" id="slug">
	</div>
	
	<div class="form-group">
		<label for="score">Score</label>
		<input type="text" name="score" id="score">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Submit</button>
	</div>
{{Form::close()}}
@stop
@section('bottom-script')
{{-- <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script src="/ckeditor/ckeditordata/js/ckeditor.js"></script>
<script src="/ckeditor/ckeditordata/js/sf.js"></script>
<script>CKEDITOR.replace( 'editor1' )</script>
<script src="/ckeditor/config.js"></script> --}}
@stop