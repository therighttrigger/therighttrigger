@extends('layouts.master')
@section('content')
	<h1 class="reviewindexheading text-center">Reviews</h1>
		@foreach($reviews as $review)
		<div class="">
			<h4 class="summary">
				{{-- <div class="row"> --}}
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
						<a href="/reviews/{{{$review->slug}}}"><img class="indeximage" src="{{{$review->cover}}}"></a>
					</div>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="text-center col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
						{{{$review->tagline}}}
					</div>
				</div>
					{{-- </div> --}}
				{{-- 	<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
						{{Str::limit($review->body, 400)}}
					</div>
					<div class="hidden-lg col-md-4 hidden-sm hidden-xs">
						{{Str::limit($review->body, 350)}}
					</div>
					<div class="hidden-lg hidden-md col-sm-4 hidden-xs">
						{{Str::limit($review->body, 250)}}
					</div>
					<div class="hidden-lg hidden-md hidden-sm col-xs-4">
						{{Str::limit($review->body, 100)}}
					</div> --}}
				{{-- </div> --}}
			</h4>
		</div>
		@endforeach
@stop
@section('bottom-script')
<script type="text/javascript">
function jqUpdateSize(){
    // Get the dimensions of the viewport
    var width = $(window).width();
    var height = $(window).height();

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