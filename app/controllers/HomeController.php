<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function homepage() {
		return View::make('homepage');
	}

	public function verify() {
		return View::make('verification');
	}

	public function check() {
		$name = Input::get('name');
		$password = Input::get('password');
		if(Auth::attempt(array('name' => $name, 'password' => $password))) {
			return Redirect::action('HomeController@create');
		} else {
			Session::flash('errorMessage', "You are not authorized to post a review");
			return Redirect::action('HomeController@homepage');
		}

		
	}
	public function create() {
		if(Auth::check()) {
			return View::make('create');
		} else {
			return Redirect::action('HomeController@verify');
		}
	}
	public function store() {
		$review = new Review();
		$review->title = Input::get('title');
		$review->slug = Input::get('slug');
		$review->body = Input::get('body');
		$review->save(); 
		return Redirect::action('HomeController@index');
	}

	public function edit($slug) {
		if(Auth::check()) {
			$review = DB::table('reviews')->where('slug', $slug)->pluck('id');
			$reviewtoedit = Review::find($review);
			return View::make('edit')->with('reviewtoedit', $reviewtoedit);
		} else {
			Session::flash('errorMessage', 'You are not authorized to edit this post');
			return Redirect::action('HomeController@homepage');
		}
	}
	public function update($slug) {
		if(Auth::check()) {
			$review = DB::table('reviews')->where('slug', $slug)->pluck('id');
			$reviewtoupdate = Review::find($review);
			$reviewtoupdate->title = Input::get('title');
			$reviewtoupdate->slug = Input::get('slug');
			$reviewtoupdate->body = Input::get('body');
			$reviewtoupdate->save();
			Session::flash('successMessage', 'Review sucessfully edited');
			return Redirect::action('HomeController@index');
		} else {
			Session::flash('errorMessage', 'You are not authorized to edit this post');
			return Redirect::action('HomeController@homepage');
		}

	}
	public function subscribe() {
		return View::make('subscribe');
	}

	public function dosubscribe() {
		$validator = Validator::make(Input::all(), Subscriber::$rules);

		$name = Input::get('name');
		$email = Input::get('email');
		$checkdbforemail = DB::table('subscribers')->where('email', $email)->pluck('email');
		if($validator->fails()) {
			Session::flash('errorMessage', 'There was a problem submitting your request. Please try again.');
			return Redirect::back()->withInput();
		} else {
			if($checkdbforemail == null) {
				$subscriber = new Subscriber();
				$subscriber->name = $name;
				$subscriber->email = $email;
				$subscriber->save();
				Session::flash('successMessage', 'You have successfully subscribed!');
				return Redirect::action('HomeController@homepage');
			} else {
				Session::flash('errorMessage', 'This email is already in use!');
				return Redirect::back()->withInput();
			}
		}
	}

	public function showcontact() {
		return View::make('contact');
	}

	public function docontact() {
		$validator = Validator::make(Input::all(), Comment::$rules);
		$comment = new Comment();
		$comment->name = Input::get('name');
		$comment->email = Input::get('email');
		$comment->message = Input::get('message');
		if($validator->fails()) {
			Session::flash('errorMessage', 'The name and message fields must be filled, and a valid email address must be provided');
			return Redirect::back()->withInput();
		} else {
			$comment->save();
			Session::flash('successMessage', 'Thank you for your input! I\'ll get back with you as soon as I can!');
			return Redirect::action('HomeController@homepage');
		}
	}
	
	public function index() {
		$reviews = Review::all();
		return View::make('index')->with('reviews', $reviews);
	}
	public function showreview($slug) {
		$reviewtitle = DB::table('reviews')->where('slug', $slug)->pluck('title');
		$reviewbody = DB::table('reviews')->where('slug', $slug)->pluck('body');
		if($reviewtitle != null) {
			return View::make('show')->with('reviewtitle', $reviewtitle)->with('reviewbody', $reviewbody);
		} else {
			App::abort(404);
		}
	}

}
