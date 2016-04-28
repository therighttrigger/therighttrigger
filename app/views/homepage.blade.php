@extends('layouts.master')
@section('content')
	<body id="landingbody">
		{{-- <h1 class="text-center sitename">The Right Trigger Reviews</h1>
		<h3 class="text-center motto">Fair, Biased, Truthful</h3> --}}
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
    if(width <= 1300 && width >= 1000) {
    	$("#landingbody").attr("class", "landingpagelarge");
    } else if(width < 1000 && width >= 800) {
    	$("#landingbody").attr("class", "landingpage");
    } else if (width < 800 && width > 420){
    	$("#landingbody").attr("class", "landingpagemedium");
    } else if (width <= 420) {
    	$("#landingbody").attr("class", "landingpagesmall");
    }
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop