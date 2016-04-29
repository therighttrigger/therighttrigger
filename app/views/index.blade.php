@extends('layouts.master')
@section('content')
	<h1 class="reviewindexheading text-center">Reviews</h1>
	<ul>
		@foreach($reviews as $review)
		<div class="summary text-center">
			<li><h4 class="summary">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
						<div class="col-xs-hidden">
							<img src="/img/button.png">
						</div>
						<div class="col-xs-8 col-xs-offset-2">
							<a href="/reviews/{{{$review->slug}}}">{{{$review->title}}}</a>
						</div>
					</div>
				</div>
			</h4></li>
		</div>
		@endforeach
	</ul>
@stop
@section('bottom-script')
<script type="text/javascript">
function jqUpdateSize(){
    // Get the dimensions of the viewport
    var width = $(window).width();
    var height = $(window).height();

    console.log("Width is: " + width);      // Display the width
    console.log("Height is: " + height);    // Display the height
    if(width < 1113) {
	    $("#reviewlist").css("margin-left", "10%").css("margin-right", "10%");
    } else if(width < 862) {
    	$("#reviewlist").removeClass("text-center");
    }
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop