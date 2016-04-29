@extends('layouts.master')
@section('content')
		<div id="formarea">
			<h3>Sign Up for Updates!</h3>
			<form action="{{{action('HomeController@dosubscribe')}}}" method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="name">Your Name</label>
					<input type="text" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="email">Your Email</label>
					<input type="text" name="email" id="email">
				</div>
				<button class="btn btn-primary" value="submit">Subscribe</button>
			</form>
		</div>
	{{-- <div class="col-lg-hidden col-md-hidden col-sm-12 col-sm-offset-5 col-xs-12 col-xs-offset-3">
		<div class="subscriptionformsmall">
			<h3>Sign Up for Updates!</h3>
			<form action="{{{action('HomeController@dosubscribe')}}}" method="POST" class="form-horizontal">
				<div class="form-group">
					<label for="name">Your Name</label>
					<input type="text" name="name" id="name">
				</div>
				<div class="form-group">
					<label for="email">Your Email</label>
					<input type="text" name="email" id="email">
				</div>
				<button class="btn btn-primary" value="submit">Subscribe</button>
			</form>
		</div>
	</div> --}}
@stop
@section('bottom-script')
<script type="text/javascript">
function jqUpdateSize(){
    // Get the dimensions of the viewport
    var width = $(window).width();
    var height = $(window).height();

    if(width >= 800) {
    	$("#formarea").attr("class", "subscriptionform col-lg-8 col-lg-offset-5 col-md-8 col-md-offset-5 col-sm-8 col-sm-offset-4");
    } else if (width < 800 && width > 420){
    	$("#formarea").attr("class", "subscriptionformmedium col-sm-8 col-sm-offset-4 col-xs-10 col-xs-offset-3");
    } else if (width <= 420) {
    	$("#formarea").attr("class", "subscriptionformsmall col-xs-8 col-xs-offset-3");
    }
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop