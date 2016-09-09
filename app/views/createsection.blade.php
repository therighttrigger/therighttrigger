@extends('layouts.master')
@section('content')

{{Form::open(array('class' => 'form-horizontal col-lg-8 col-lg-offset-3', 'method' => 'POST', 'action' => array('HomeController@storesection', $slug), 'files' => 'true'))}}
<div class="form-group">
	<label for="image">Image</label>
	<input type="file" name="image">
</div>
<div class="form-group">
	<textarea name="body" id="editor1"></textarea>
</div>
<div class="form-group">
	<button class="btn btn-primary" type="submit">Submit</button>
</div>
{{Form::close()}}
@stop

@section('bottom-script')
<script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
<script src="/ckeditor/ckeditordata/js/ckeditor.js"></script>
<script src="/ckeditor/ckeditordata/js/sf.js"></script>
<script>CKEDITOR.replace( 'editor1' )</script>
<script src="/ckeditor/config.js"></script>
@stop