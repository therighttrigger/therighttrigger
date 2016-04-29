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

    $("#landingbody").attr("class", "landingpage").css("background-size", width + "px " + height + "px");;
};
$(document).ready(jqUpdateSize);
    // When the page first loads
$(window).resize(jqUpdateSize); 

</script>
@stop