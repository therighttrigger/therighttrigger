@extends('layouts.master')
@section('content')
	<div id="contactform">
		<h3>Contact the Right Trigger</h3>
		<form method="POST" action="{{{action('HomeController@docontact')}}}" class="form-horizontal">
			<div class="form-group">
				<label for="name">Your Name</label>
				<div class="col-lg-4">
					<input type="text" name="name" id="name">
				</div>
			</div>
			<div class="form-group">
				<label for="email">Your Email (Optional)</label>
				<div class="col-lg-4">
					<input type="text" name="email" id="email">
				</div>
			</div>
			<div class="form-group">
				<label for="message">Message</label>
				<div class="col-lg-4">
					<textarea name="message" id="message"></textarea>
				</div>
			</div>
			<div class="form-group col-lg-4">
				<button class="btn btn-primary" value="submit">Submit</button>
			</div>
		</form>
	</div>
@stop
@section('bottom-script')
<script type="text/javascript">
function jqUpdateSize(){
    // Get the dimensions of the viewport
    var width = $(window).width();
    var height = $(window).height();

    console.log("Width is: " + width);      // Display the width
    console.log("Height is: " + height);    // Display the height
    if(width >= 800) {
    	$("#contactform").attr("class", "commentform col-lg-8 col-lg-offset-4 col-md-8 col-md-offset-5 col-sm-8 col-sm-offset-4");
    } else if (width < 800 && width > 420){
    	$("#contactform").attr("class", "commentformmedium col-sm-8 col-sm-offset-4 col-xs-8 col-xs-offset-4");
    } else if (width <= 420) {
    	$("#contactform").attr("class", "commentformsmall col-xs-8 col-xs-offset-3");
    }
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop