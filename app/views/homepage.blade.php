@extends('layouts.master')
@section('content')
	<style type="text/css">
		body {
			overflow-y: hidden;
		}
	</style>
	{{-- <body id="landingbody">
		<h1 class="text-center sitename">The Right Trigger Reviews</h1>
		<h3 class="text-center motto">Fair, Biased, Truthful</h3>
	</div> --}}
	<div id="recent" class="carousel slide homecare" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#recent" data-slide-to="0" class="active"></li>
			<li data-target="#recent" data-slide-to="1"></li>
			<li data-target="#recent" data-slide-to="2"></li>
			<li data-target="#recent" data-slide-to="3"></li>
			<li data-target="#recent" data-slide-to="4"></li>
		</ol>

		<div class="carousel-inner" role="listbox">
			@foreach($reviews as $review)
				@if($review->title == $first->title)
					<div class="item active">
				@else
					<div class="item">
				@endif
						<a href="{{{action('HomeController@showreview', $review->slug)}}}"><img class="carim" src="{{{$review->cover}}}"></a>
					</div>
			@endforeach
			{{-- <div class="item active">
				<img class="carim" src="/img/inside.png">
			</div>
			<div class="item">
				<img class="carim" src="/img/fcp.png">
			</div>
			<div class="item">
				<img class="carim" src="/img/nms.png">
			</div>
			<div class="item">
				<img class="carim" src="/img/ox.png">
			</div>
			<div class="item">
				<img class="carim" src="/img/abzu.png">
			</div> --}}
		</div>

		<a class="left carousel-control" href="#recent" role="button" data-slide="prev">
			<span aria-hidden="true"><img class="rightbutton" src="/img/left.png"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#recent" role="button" data-slide="next">
			<span aria-hidden="true"><img class="rightbutton" src="/img/button.png"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
@stop
@section('bottom-script')
<script type="text/javascript">
function jqUpdateSize(){
    // Get the dimensions of the viewport
    var width = $(window).width();
    var height = $(window).height();

    $(".item").css("width", width + "px").css("height", height + "px");
    $(".carim").css("width", width + "px").css("height", height + "px");
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop