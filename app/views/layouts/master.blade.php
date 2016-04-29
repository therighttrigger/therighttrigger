<!DOCTYPE html>
<html>
<head>
	<title>The Right Trigger Reviews: Fair, Biased, Truthful</title>
	<link rel="icon" type="image/png" href="/img/button.png">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/righttrigger.css">
	@yield('top-script')
</head>
<body>
	<div class="navbar navbar-fixed-top">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-8">
				<img src="/img/button.png">
				<span class="heading">The Right Trigger</span>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
			</div>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
			<a href="{{{action('HomeController@homepage')}}}">
				<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
					Home
				</div>
			</a>

			<a href="{{{action('HomeController@index')}}}">
				<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
					Reviews
				</div>
			</a>

			<a href="{{{action('HomeController@subscribe')}}}">
				<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
					Subscribe
				</div>
			</a>

			<a href="{{{action('HomeController@showcontact')}}}">
				<div class="navlink col-lg-3 col-md-3 col-sm-3 col-xs-3">
					Contact
				</div>
			</a>
		</div>
	</div>
	@if(Request::url() != "righttrigger.dev/")
		<div class="topofpage"></div>
	@endif
	@if (Session::has('successMessage'))
	    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif
	@yield('content')

	@if(Request::url() !== "righttrigger.dev")
		<div class="bottomofpage"></div>
	@endif
	<div class="footer navbar-fixed-bottom">
		<div class="col-lg-12 text-center">
			<div class="foot">
				<div class="col-lg-6">
					©The Right Trigger Reviews: 2012-2016
				</div>
				<div class="col-lg-6">
					reagan.wilkins@gmail.com
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="/js/jquery.js"></script>
	@yield('bottom-script')
</body>
</html>