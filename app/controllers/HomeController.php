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

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->beforeFilter('')
	// }

	public function homepage() {
		$reviews = Review::orderBy('created_at', 'desc')->paginate(5);
		$first = $reviews->first();
		return View::make('homepage')->with('reviews', $reviews)->with('first', $first);
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
		$imagename = Input::file('cover');
		$originalname = $imagename->getClientOriginalName();
		$imagepath = 'public/img/uploads/';
		$imagename->move($imagepath, $originalname);
		$review->cover = $imagepath . $originalname;
		$score = Input::get('score');
		$review->score = $score;
		if($score == 10) {
			$verdict = "Masterpiece";
		} else if($score < 10 && $score >= 9.5) {
			$verdict = "Absolutely Outstanding";
		} else if($score < 9.5 && $score >= 9.0) {
			$verdict = "Fantastic";
		} else if($score < 9.0 && $score >= 8.5) {
			$verdict = "Quite Good";
		} else if($score < 8.5 && $score >= 8.0) {
			$verdict = "Good";
		} else if($score < 8.0 && $score >= 7.5) {
			$verdict = "Acceptable";
		} else if($score < 7.5 && $score >= 7.0) {
			$verdict = "Ok";
		} else if($score < 7.0 && $score >= 6.5) {
			$verdict = "Fine, I Guess";
		} else if($score < 6.5 && $score >= 6.0) {
			$verdict = "Slightly Above Average";
		} else if($score < 6.0 && $score >= 5.5) {
			$verdict = "Barely Above Average";
		} else if($score < 5.5 && $score >= 5.0) {
			$verdict = "Mediocre";
		} else if($score < 5.0 && $score >= 4.5) {
			$verdict = "Slightly Below Average";
		} else if($score < 4.5 && $score >= 4.0) {
			$verdict = "Below Average";
		} else if($score < 4.0 && $score >= 3.5) {
			$verdict = "Not Good";
		} else if($score < 3.5 && $score >= 3.0) {
			$verdict = "Really Not Good";
		} else if($score < 3.0 && $score >= 2.5) {
			$verdict = "Bad";
		} else if($score < 2.5 && $score >= 2.0) {
			$verdict = "Awful";
		} else if($score < 2.0 && $score >= 1.5) {
			$verdict = "Terrible";
		} else if($score < 1.5 && $score >= 1.0) {
			$verdict = "Unacceptable";
		} else if($score < 1.0 && $score >= 0.5) {
			$verdict = "Borderline Unplayable";
		} else if($score < 0.5 && $score >= 0) {
			$verdict = "Unplayable";
		}
		$review->verdict = $verdict;
		$review->save(); 
		return Redirect::action('HomeController@index');
	}

	public function showsection($slug) {
		if(Auth::check()) {
			return View::make('createsection')->with('slug', $slug);
		} else {
			return Redirect::action('HomeController@verify');
		}
	}

	public function storesection($slug) {
		if(Auth::check()) {
			$review = DB::table('reviews')->where('slug', $slug)->pluck('id');
			$section = new Section();
			$section->review_id = $review;
			$section->body = Input::get('body');
			$imagename = Input::file('image');
			if($imagename != null) {
				$originalname = $imagename->getClientOriginalName();
				$imagepath = 'public/img/uploads/';
				$imagename->move($imagepath, $originalname);
				$section->image = $imagepath . $originalname;
			}
			$section->save();
			return Redirect::action('HomeController@showsection', $slug);
		} else {
			return Redirect::action('HomeController@verify');
		}
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
		$reviews = Review::orderBy('created_at', 'desc')->get();
		return View::make('index')->with('reviews', $reviews);
	}
	public function showreview($slug) {
		$reviewid = DB::table('reviews')->where('slug', $slug)->pluck('id');
		$review = Review::find($reviewid);
		// $reviewtitle = DB::table('reviews')->where('slug', $slug)->pluck('title');
		// $reviewcover = DB::table('reviews')->where('slug', $slug)->pluck('cover');
		// $score = DB::table('reviews')->where('slug', $slug)->pluck('score');
		// $verdict = DB::table('reviews')->where('slug', $slug)->pluck('verdict');
		$width = ($review->score * 10) * 3.7;
		if($review->score >= 7.5) {
			$color = "green";
		} else if($review->score < 7.4 && $review->score >= 5.0) {
			$color = "yellow";
		} else if($review->score < 5.0 && $review->score >= 3.0) {
			$color = "orange";
		} else if($review->score < 3.0) {
			$color = "red";
		}
		$sections = DB::table('sections')->where('review_id', $review->id)->get();
		if($review != null) {
			return View::make('show')->with('review', $review)->with('width', $width)->with('color', $color)->with('sections', $sections);
		} else {
			App::abort(404);
		}
	}

}
